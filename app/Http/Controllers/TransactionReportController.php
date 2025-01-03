<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Party;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionReportController extends Controller
{
    public function exportPDF(Request $request)
    {
        // Initial query to fetch transactions for a specific party
        $query = Transaction::where('party_id', $request->party_id)
            ->where('active_id', true);

        // Apply search term filter if provided
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('trans_type', 'like', '%' . $request->search . '%')
                    ->orWhere('payment_method', 'like', '%' . $request->search . '%')
                    ->orWhere('bill_no', 'like', '%' . $request->search . '%')
                    ->orWhere('desc', 'like', '%' . $request->search . '%')
                    ->orWhere('date', 'like', '%' . $request->search . '%')
                    ->orWhere('amount', 'like', '%' . $request->search . '%');
            });
        }

        // Apply the date filter
        if ($request->dateFilter != 'all') {
            switch ($request->dateFilter) {
                case 'today':
                    $query->whereDate('date', Carbon::today());
                    break;
                case 'yesterday':
                    $query->whereDate('date', Carbon::yesterday());
                    break;
                case 'last_15_days':
                    $query->whereDate('date', '>=', Carbon::now()->subDays(15));
                    break;
                case 'last_30_days':
                    $query->whereDate('date', '>=', Carbon::now()->subDays(30));
                    break;
                case 'last_90_days':
                    $query->whereDate('date', '>=', Carbon::now()->subDays(90));
                    break;
                case 'last_180_days':
                    $query->whereDate('date', '>=', Carbon::now()->subDays(180));
                    break;
                case 'custom_range':
                    // Apply custom date range filter if start_date and end_date are provided
                    if ($request->start_date && $request->end_date) {
                        $startDate = Carbon::parse($request->start_date)->startOfDay();
                        $endDate = Carbon::parse($request->end_date)->endOfDay();
                        $query->whereBetween('date', [$startDate, $endDate]);
                    }
                    break;
            }
        }

        // Retrieve the filtered transactions
        $transactions = $query->orderBy('date', 'asc')->get()->map(function ($transaction) {
            $items = json_decode($transaction->items, true) ?? [];
            $itemTotal = 0;

            // Calculate item totals for each transaction
            foreach ($items as $item) {
                $itemTotal += ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0);
            }

            $transaction->item_total = $itemTotal;
            return $transaction;
        });

        // Get the party details
        $party = Party::find($request->party_id);
        if (!$party) {
            return response()->json(['error' => 'Party not found'], 404);
        }

        // Load the PDF view and pass the necessary data
        $pdf = PDF::loadView('pdf.transactionReport', [
            'transactions' => $transactions,
            'party' => $party,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'search' => $request->search,  // Pass search term
            'dateFilter' => $request->dateFilter // Pass selected date filter
        ]);

        // Return the generated PDF for download
        return $pdf->download('transactions_report.pdf');
    }



}

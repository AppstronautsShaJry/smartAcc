<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransController extends Controller
{
//    public function generatePDF(Request $request, $partyId)
//    {
//        $party = Party::find($partyId);
//
//        // Get query parameters
//        $searchTerm = $request->query('searchTerm');
//        $dateFilter = $request->query('dateFilter', 'all');
//        $startDate = $request->query('startDate');
//        $endDate = $request->query('endDate');
//
//        // Build the query for transactions
//        $query = Transaction::where('party_id', $partyId);
//
//        if ($searchTerm) {
//            $query->where(function ($q) use ($searchTerm) {
//                $q->where('trans_type', 'like', '%' . $searchTerm . '%')
//                    ->orWhere('payment_method', 'like', '%' . $searchTerm . '%')
//                    ->orWhere('bill_no', 'like', '%' . $searchTerm . '%')
//                    ->orWhere('desc', 'like', '%' . $searchTerm . '%')
//                    ->orWhere('date', 'like', '%' . $searchTerm . '%')
//                    ->orWhere('amount', 'like', '%' . $searchTerm . '%');
//            });
//        }
//
//        if ($dateFilter != 'all') {
//            switch ($dateFilter) {
//                case 'today':
//                    $query->whereDate('date', Carbon::today());
//                    break;
//                case 'yesterday':
//                    $query->whereDate('date', Carbon::yesterday());
//                    break;
//                case 'last_15_days':
//                    $query->whereDate('date', '>=', Carbon::now()->subDays(15));
//                    break;
//                case 'last_30_days':
//                    $query->whereDate('date', '>=', Carbon::now()->subDays(30));
//                    break;
//                case 'last_90_days':
//                    $query->whereDate('date', '>=', Carbon::now()->subDays(90));
//                    break;
//                case 'last_180_days':
//                    $query->whereDate('date', '>=', Carbon::now()->subDays(180));
//                    break;
//                case 'custom_range':
//                    if ($startDate && $endDate) {
//                        $startDate = Carbon::parse($startDate)->startOfDay();
//                        $endDate = Carbon::parse($endDate)->endOfDay();
//                        $query->whereBetween('date', [$startDate, $endDate]);
//                    }
//                    break;
//            }
//        }
//
//        // Fetch transactions and map items to each transaction
//        $transactions = $query->orderBy('date', 'asc')->get()->map(function ($transaction) {
//            $items = collect(json_decode($transaction->items, true))->map(function ($item) {
//                $item['item_amount'] = $item['item_quantity'] * $item['item_price']; // Calculate item amount
//                return $item;
//            });
//
//            $transaction->items = $items->toArray();
//            $transaction->item_amount_total = $items->sum('item_amount'); // Sum of item amounts for the transaction
//
//            // Include item_amount_total in credit or debit
//            if ($transaction->trans_type == 'Receive') {
//                $transaction->credit = $transaction->amount + $transaction->item_amount_total;
//                $transaction->debit = 0;
//            } elseif ($transaction->trans_type == 'Pay') {
//                $transaction->debit = $transaction->amount + $transaction->item_amount_total;
//                $transaction->credit = 0;
//            } else {
//                $transaction->credit = 0;
//                $transaction->debit = 0;
//            }
//
//            return $transaction;
//        });
//
//        // Calculate cumulative balance row by row
//        $cumulativeBalance = 0;
//        foreach ($transactions as $transaction) {
//            $cumulativeBalance += $transaction->credit - $transaction->debit;
//            $transaction->balance = $cumulativeBalance;
//        }
//
//        // Calculate totals for Credit, Debit, and Balance
//        $totalCredit = $transactions->sum('credit');
//        $totalDebit = $transactions->sum('debit');
//        $totalBalance = $transactions->last()->balance ?? 0; // Last row's balance
//
//        // Generate the PDF
//        $pdf = Pdf::loadView('pdf.transactionReport', [
//            'transactions' => $transactions,
//            'party' => $party,
//            'totalCredit' => $totalCredit,
//            'totalDebit' => $totalDebit,
//            'totalBalance' => $totalBalance,
//        ]);
//
//        return $pdf->stream('transactions.pdf');
//    }


    public function generatePDF(Request $request, $partyId)
    {
        $party = Party::find($partyId);

        // Get query parameters
        $searchTerm = $request->query('searchTerm');
        $dateFilter = $request->query('dateFilter', 'all');
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');

        // Build the query for transactions
        $query = Transaction::where('party_id', $partyId);

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('trans_type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('payment_method', 'like', '%' . $searchTerm . '%')
                    ->orWhere('bill_no', 'like', '%' . $searchTerm . '%')
                    ->orWhere('desc', 'like', '%' . $searchTerm . '%')
                    ->orWhere('date', 'like', '%' . $searchTerm . '%')
                    ->orWhere('amount', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($dateFilter != 'all') {
            switch ($dateFilter) {
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
                    if ($startDate && $endDate) {
                        $startDate = Carbon::parse($startDate)->startOfDay();
                        $endDate = Carbon::parse($endDate)->endOfDay();
                        $query->whereBetween('date', [$startDate, $endDate]);
                    }
                    break;
            }
        }

        // Fetch transactions and map items to each transaction
        $transactions = $query->get()->map(function ($transaction) {
            $items = collect(json_decode($transaction->items, true))->map(function ($item) {
                $item['item_amount'] = $item['item_quantity'] * $item['item_price']; // Calculate item amount
                return $item;
            });

            $transaction->items = $items->toArray();
            $transaction->item_amount_total = $items->sum('item_amount'); // Sum of item amounts for the transaction

            // Include item_amount_total in credit or debit
            if ($transaction->trans_type == 'Receive') {
                $transaction->credit = $transaction->amount + $transaction->item_amount_total;
                $transaction->debit = 0;
            } elseif ($transaction->trans_type == 'Pay') {
                $transaction->debit = $transaction->amount + $transaction->item_amount_total;
                $transaction->credit = 0;
            } else {
                $transaction->credit = 0;
                $transaction->debit = 0;
            }

            return $transaction;
        });

        // Calculate cumulative balance row by row
        $transactions = $transactions->values();
        $cumulativeBalance = 0;
        foreach ($transactions as $transaction) {
            $cumulativeBalance += $transaction->credit - $transaction->debit;
            $transaction->balance = $cumulativeBalance;
        }

        // Calculate totals for Credit, Debit, and Balance
        $totalCredit = $transactions->sum('credit');
        $totalDebit = $transactions->sum('debit');
        $totalBalance = $transactions->last()->balance ?? 0; // Last row's balance

        // Generate the PDF
        $pdf = Pdf::loadView('pdf.transactionReport', [
            'transactions' => $transactions,
            'party' => $party,
            'totalCredit' => $totalCredit,
            'totalDebit' => $totalDebit,
            'totalBalance' => $totalBalance,
        ]);

        return $pdf->stream('transactions.pdf');
    }


}

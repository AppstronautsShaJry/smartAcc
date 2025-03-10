<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SupplierReportController extends Controller
{
    public function exportPDF(Request $request)
    {
        $query = Party::where('is_active', true)
            ->where('party_type', 2);

        // Apply search filter
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%')
                    ->orWhere('adrs_1', 'like', '%' . $request->search . '%')
                    ->orWhere('party_type', 'like', '%' . $request->search . '%');
            });
        }

        // Apply date filter
        if ($request->start_date && $request->end_date) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Fetch data
        $list = $query->get();

        // Initialize totals
        $totalCreditSum = 0;
        $totalDebitSum = 0;
        $balanceSum = 0;

        // Calculate totals and balances
        foreach ($list as $party) {
            $totalCredit = 0;
            $totalDebit = 0;

            // Fetch transactions related to the party
            $transactions = Transaction::where('party_id', $party->id)->get();

            foreach ($transactions as $transaction) {
                $items = json_decode($transaction->items, true) ?? [];
                $itemTotal = 0;

                foreach ($items as $item) {
                    $itemTotal += ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0);
                }

                if ($transaction->trans_type == 'Amount Received') {
                    $totalCredit += $transaction->amount + $itemTotal;
                } elseif ($transaction->trans_type == 'Item Out') {
                    $totalDebit += $transaction->amount + $itemTotal;
                }
            }

            // Assign calculated values
            $party->totalCredit = $totalCredit;
            $party->totalDebit = $totalDebit;
            $party->balance = $totalCredit - $totalDebit;

            // Sum totals
            $totalCreditSum += $totalCredit;
            $totalDebitSum += $totalDebit;
            $balanceSum += $party->balance;
        }

        // Generate PDF
        $pdf = PDF::loadView('pdf.customerReport', [
            'list' => $list,
            'totalCreditSum' => $totalCreditSum,
            'totalDebitSum' => $totalDebitSum,
            'balanceSum' => $balanceSum,
        ]);

        return $pdf->stream('customers.pdf');
    }

//    public function exportPDF(Request $request)
//    {
//        $query = Party::where('is_active', true)
//            ->where('party_type', 2);
//
//        // Apply search filter
//        if ($request->search) {
//            $query->where(function ($q) use ($request) {
//                $q->where('name', 'like', '%' . $request->search . '%')
//                    ->orWhere('email', 'like', '%' . $request->search . '%')
//                    ->orWhere('phone', 'like', '%' . $request->search . '%')
//                    ->orWhere('adrs_1', 'like', '%' . $request->search . '%')
//                    ->orWhere('party_type', 'like', '%' . $request->search . '%');
//            });
//        }
//
//        // Apply date filter
//        if ($request->start_date && $request->end_date) {
//            $startDate = Carbon::parse($request->start_date)->startOfDay();
//            $endDate = Carbon::parse($request->end_date)->endOfDay();
//            $query->whereBetween('created_at', [$startDate, $endDate]);
//        }
//
//        // Fetch data
//        $list = $query->get();
//
//        // Calculate totals and balances
//        foreach ($list as $party) {
//            $totalCredit = 0;
//            $totalDebit = 0;
//
//            $transactions = Transaction::where('party_id', $party->id)->get();
//            foreach ($transactions as $transaction) {
//                $items = json_decode($transaction->items, true) ?? [];
//                $itemTotal = 0;
//
//                foreach ($items as $item) {
//                    $itemTotal += ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0);
//                }
//
//                if ($transaction->trans_type == 'Receive') {
//                    $totalCredit += $transaction->amount + $itemTotal;
//                } elseif ($transaction->trans_type == 'Pay') {
//                    $totalDebit += $transaction->amount + $itemTotal;
//                }
//            }
//
//            $party->totalCredit = $totalCredit;
//            $party->totalDebit = $totalDebit;
//            $party->balance = $totalCredit - $totalDebit;
//        }
//
//        // Load Blade view into PDF
//        $pdf = PDF::loadView('pdf.customerReport', ['list' => $list]);
//        return $pdf->stream('customers.pdf');
//    }

}

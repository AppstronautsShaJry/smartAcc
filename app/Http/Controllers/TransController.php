<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransController extends Controller
{
    public function generateTransactionReport($partyId, Request $request)
    {
        // Get the start and end dates from the request
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : null;
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : null;

        $transactions = Transaction::where('party_id', $partyId)
            ->where('active_id', true);

        if ($startDate) {
            $transactions->where('date', '>=', $startDate);
        }

        if ($endDate) {
            $transactions->where('date', '<=', $endDate);
        }

        $transactions = $transactions->get();

        $pdf = PDF::loadView('pdf.transactions', compact('transactions'));

        return $pdf->download('transaction_report.pdf');
    }
}

<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $transactions;

    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * Prepare the data for export.
     */
    public function collection()
    {
        $data = [];
        $totalCredit = 0;
        $totalDebit = 0;

        foreach ($this->transactions as $index => $transaction) {
            $items = json_decode($transaction->items, true) ?? [];
            $itemTotal = 0;

            // Calculate item total
            foreach ($items as $item) {
                $itemTotal += ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0);
            }

            // Calculate debit and credit
            $debit = $transaction->trans_type == 'Item Out' ? $transaction->amount + $itemTotal : 0;
            $credit = $transaction->trans_type == 'Amount Received' ? $transaction->amount + $itemTotal : 0;

            $totalDebit += $debit;
            $totalCredit += $credit;

            // Add row data
            $data[] = [
                'Serial' => $index + 1,
                'Name' => $transaction->party_id, // Replace with actual name if available
                'Items' => collect($items)->pluck('item_name')->implode(', '),
                'Quantity' => collect($items)->sum('item_quantity'),
                'Debit' => $debit ? '₹ ' . number_format($debit, 2) : '',
                'Credit' => $credit ? '₹ ' . number_format($credit, 2) : '',
                'Balance' => '₹ ' . number_format($totalCredit - $totalDebit, 2),
                'Date' => $transaction->date,
            ];
        }

        // Add total row
        $data[] = [
            'Serial' => '',
            'Name' => 'Total',
            'Items' => '',
            'Quantity' => '',
            'Debit' => '',
            'Credit' => '',
            'Balance' => '₹ ' . number_format($totalCredit - $totalDebit, 2),
            'Date' => '',
        ];

        return collect($data);
    }

    /**
     * Define headings for the Excel file.
     */
    public function headings(): array
    {
        return [
            'Serial',
            'Name',
            'Items',
            'Quantity',
            'Debit',
            'Credit',
            'Balance',
            'Date',
        ];
    }
}

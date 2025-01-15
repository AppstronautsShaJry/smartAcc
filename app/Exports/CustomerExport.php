<?php

namespace App\Exports;

use App\Models\Party;
use App\Models\Transaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CustomerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $list;
    protected $totalCreditSum;
    protected $totalDebitSum;
    protected $balanceSum;

    public function __construct($list, $totalCreditSum, $totalDebitSum, $balanceSum)
    {
        $this->list = $list;
        $this->totalCreditSum = $totalCreditSum;
        $this->totalDebitSum = $totalDebitSum;
        $this->balanceSum = $balanceSum;
    }

    /**
     * Export collection.
     */
    public function collection()
    {
        $data = [];

        foreach ($this->list as $index => $party) {
            $data[] = [
                'Serial' => $index + 1,
                'Supplier Name' => $party->name,
                'Total Credit' => '₹ ' . number_format($party->totalCredit, 2),
                'Total Debit' => '₹ ' . number_format($party->totalDebit, 2),
                'Balance' => '₹ ' . number_format($party->balance, 2),
            ];
        }

        // Add total row
        $data[] = [
            'Serial' => '',
            'Supplier Name' => 'Total',
            'Total Credit' => '₹ ' . number_format($this->totalCreditSum, 2),
            'Total Debit' => '₹ ' . number_format($this->totalDebitSum, 2),
            'Balance' => '₹ ' . number_format($this->balanceSum, 2),
        ];

        return collect($data);
    }

    /**
     * Excel headings.
     */
    public function headings(): array
    {
        return [
            'Serial',
            'Supplier Name',
            'Total Credit',
            'Total Debit',
            'Balance',
        ];
    }
}

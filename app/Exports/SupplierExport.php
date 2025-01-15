<?php

namespace App\Exports;

use App\Models\Party;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SupplierExport implements FromCollection, WithHeadings, WithMapping
{
    protected $suppliers;
    protected $totalCreditSum;
    protected $totalDebitSum;
    protected $balanceSum;

    public function __construct($suppliers, $totalCreditSum, $totalDebitSum, $balanceSum)
    {
        $this->suppliers = $suppliers;
        $this->totalCreditSum = $totalCreditSum;
        $this->totalDebitSum = $totalDebitSum;
        $this->balanceSum = $balanceSum;
    }

    public function collection()
    {
        return $this->suppliers;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Phone',
            'Other',
            'Total Credit',
            'Total Debit',
            'Balance',
        ];
    }

    public function map($supplier): array
    {
        return [
            $supplier->id,
            $supplier->name,
            $supplier->phone,
            $supplier->other,
            number_format($supplier->totalCredit, 2),
            number_format($supplier->totalDebit, 2),
            number_format($supplier->balance, 2),
        ];
    }
}

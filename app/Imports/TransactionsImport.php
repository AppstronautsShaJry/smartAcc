<?php

namespace App\Imports;

use App\Models\Transaction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Transaction([
            'party_id' => $row['party_id'] ?? 1,
            'amount' => $row['amount'] ?? 0.00,
            'trans_type' => $row['trans_type'] ?? 'Pay',
            'desc' => $row['desc'] ?? '',
            'date' => $row['date'] ?? now(),
            'image' => $row['image'] ?? null,
            'items' => isset($row['items']) ? json_decode($row['items'], true) : null,
            'active_id' => $row['active_id'] ?? '1',
        ]);
    }
}

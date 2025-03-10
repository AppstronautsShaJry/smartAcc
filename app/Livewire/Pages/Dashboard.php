<?php

namespace App\Livewire\Pages;

use App\Models\Party;
use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $customerTotalCredit = 0;
    public $customerTotalDebit = 0;
    public $supplierTotalCredit = 0;
    public $supplierTotalDebit = 0;

    public function render()
    {
        $customers = Party::where('party_type', 1)
            ->where('user_id', auth()->id())
            ->where('is_active', true)
            ->get()
            ->map(function ($customer) {
                $transactions = Transaction::where('party_id', $customer->id)->get();

                $totalCredit = 0;
                $totalDebit = 0;

                foreach ($transactions as $transaction) {
                    $items = json_decode($transaction->items, true) ?? [];
                    $itemTotal = array_sum(array_map(fn($item) => ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0), $items));

                    if ($transaction->trans_type == 'Amount Received') {
                        $totalCredit += $transaction->amount + $itemTotal;
                    } elseif ($transaction->trans_type == 'Item Out') {
                        $totalDebit += $transaction->amount + $itemTotal;
                    }
                }

                $customer->totalCredit = $totalCredit;
                $customer->totalDebit = $totalDebit;
                $customer->balance = $totalCredit - $totalDebit;

                return $customer;
            });

        $suppliers = Party::where('party_type', 2)
            ->where('user_id', auth()->id())
            ->where('is_active', true)
            ->get()
            ->map(function ($supplier) {
                $transactions = Transaction::where('party_id', $supplier->id)->get();

                $totalCredit = 0;
                $totalDebit = 0;

                foreach ($transactions as $transaction) {
                    $items = json_decode($transaction->items, true) ?? [];
                    $itemTotal = array_sum(array_map(fn($item) => ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0), $items));

                    if ($transaction->trans_type == 'Amount Received') {
                        $totalCredit += $transaction->amount + $itemTotal;
                    } elseif ($transaction->trans_type == 'Item Out') {
                        $totalDebit += $transaction->amount + $itemTotal;
                    }
                }

                $supplier->totalCredit = $totalCredit;
                $supplier->totalDebit = $totalDebit;
                $supplier->balance = $totalCredit - $totalDebit;

                return $supplier;
            });

        $customerBalance = $customers->sum('balance');
        $supplierBalance = $suppliers->sum('balance');

        return view('livewire.pages.dashboard')->layout('layouts.web')->with([
            'customers' => $customers,
            'suppliers' => $suppliers,
            'customerTotalCredit' => $this->customerTotalCredit,
            'customerTotalDebit' => $this->customerTotalDebit,
            'customerBalance' => $customerBalance,
            'supplierTotalCredit' => $this->supplierTotalCredit,
            'supplierTotalDebit' => $this->supplierTotalDebit,
            'supplierBalance' => $supplierBalance,
        ]);
    }

}

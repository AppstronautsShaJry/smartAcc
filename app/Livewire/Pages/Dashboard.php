<?php

namespace App\Livewire\Pages;

use App\Models\Party;
use Livewire\Component;

//use App\Models\Party;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $customerTotalCredit = 0;
    public $customerTotalDebit = 0;
    public $customerBalance = 0;

    public $supplierTotalCredit = 0;
    public $supplierTotalDebit = 0;
    public $supplierBalance = 0;

    public function mount()
    {
        // Fetch active customers and suppliers for the authenticated user
        $parties = Party::where('user_id', Auth::id())
            ->where('is_active', true) // Only active records
            ->whereIn('party_type', [1, 2]) // Customers (1) & Suppliers (2)
            ->get();

        // Initialize totals
        $customerCredit = $customerDebit = $supplierCredit = $supplierDebit = 0;

        foreach ($parties as $party) {
            $totalCredit = 0;
            $totalDebit = 0;

            $transactions = Transaction::where('party_id', $party->id)->get();
            foreach ($transactions as $transaction) {
                $items = json_decode($transaction->items, true) ?? [];
                $itemTotal = array_sum(array_map(fn($item) => ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0), $items));

                if ($transaction->trans_type == 'Amount Received') {
                    $totalCredit += $transaction->amount + $itemTotal;
                } elseif ($transaction->trans_type == 'Item Out') {
                    $totalDebit += $transaction->amount + $itemTotal;
                }
            }

            if ($party->party_type == 1) { // Customer
                $customerCredit += $totalCredit;
                $customerDebit += $totalDebit;
            } else { // Supplier
                $supplierCredit += $totalCredit;
                $supplierDebit += $totalDebit;
            }
        }

        // Assign calculated values
        $this->customerTotalCredit = $customerCredit;
        $this->customerTotalDebit = $customerDebit;
        $this->customerBalance = $customerCredit - $customerDebit;

        $this->supplierTotalCredit = $supplierCredit;
        $this->supplierTotalDebit = $supplierDebit;
        $this->supplierBalance = $supplierCredit - $supplierDebit;
    }

    public function render()
    {
        $customers = Party::where('party_type', 1)->where('user_id', auth()->id())->where('is_active', true)->get();
        $suppliers = Party::where('party_type', 2)->where('user_id', auth()->id())->where('is_active', true)->get();
        return view('livewire.pages.dashboard')->layout('layouts.web')->with(
            [
                'customers' => $customers,
                'suppliers' => $suppliers,
                'customerTotalCredit' => $this->customerTotalCredit,
                'customerTotalDebit' => $this->customerTotalDebit,
                'customerBalance' => $this->customerBalance,
                'supplierTotalCredit' => $this->supplierTotalCredit,
                'supplierTotalDebit' => $this->supplierTotalDebit,
                'supplierBalance' => $this->supplierBalance,
            ]
        );
    }
}

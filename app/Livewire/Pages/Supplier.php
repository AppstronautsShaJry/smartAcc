<?php

namespace App\Livewire\Pages;

use App\Models\Party;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Supplier extends Component
{

    use WithPagination;

    public $showEditModal = false;
    public bool $showDeleteModal = false;
    public $vid = '';
    public $party_type = 2;
    public $name = '';
    public $phone = '';
    public $other = '';
    public $is_active = true;
    public $search = '';
    public $start_date;
    public $end_date;

    #region[rules]
    public function rules(): array
    {
        return [
            'party_type' => 'required|string',
            'name' => 'required|string,name',
            'phone' => 'nullable|string',
            'other' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ];
    }

    public $transaction_id;
    public $amount;

    public function messages()
    {
        return [
            'party_type.required' => ':attribute is required.',
            'name.required' => ':attribute is required.',
            'phone.nullable' => ':attribute is required.',
            'other.nullable' => ':attribute is required.',
            'is_active.boolean' => ':attribute must be true or false.',
        ];
    }

    public function validationAttributes()
    {
        return [
            'party_type' => 'Party Type',
            'name' => 'Name',
            'other' => 'Status',
            'is_active' => 'Active Status',
        ];
    }

    #endregion


    public function save()
    {
        $this->showEditModal = true;
    }

    public function getSave()
    {
        if ($this->name != '') {

            if ($this->other == 'Closed') {
                $this->is_active = 0;
            }

            if ($this->vid == "") {
                Party::create([
                    'party_type' => $this->party_type,
                    'name' => $this->name,
                    'phone' => $this->phone ?: '-',
                    'other' => $this->other ?: 'New',
                    'user_id' => auth()->id(),
                    'is_active' => $this->is_active ?: 1,
                ]);
                $message = "Saved";
            } else {
                $obj = Party::find($this->vid);
                $obj->party_type = $this->party_type;
                $obj->name = $this->name;
                $obj->phone = $this->phone;
                $obj->other = $this->other;
                $obj->user_id = auth()->id();
                $obj->is_active = $this->is_active;
                $obj->save();
                $message = "Updated";
            }

            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        $this->clearFields();
        $this->showEditModal = false;
    }


    public function edit($id): void
    {
        $this->clearFields();
        $this->getObj($id);
        $this->showEditModal = true;
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Party::find($id);
            if ($obj) {
                $this->vid = $obj->id;
                $this->party_type = $obj->party_type;
                $this->name = $obj->name;
                $this->phone = $obj->phone;
                $this->other = $obj->other;
                $this->is_active = $obj->is_active;
                return $obj;
            }
        }
        return null;
    }

    #region[Clear-Fields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->party_type = 2;
        $this->name = '';
        $this->phone = '';
        $this->other = '';
        $this->is_active = true;
    }

#endregion

    public function getDelete($id): void
    {
        if ($id) {
            $this->clearFields();
            $this->getObj($id);
            $this->showDeleteModal = true;
        }
    }

    public function trashData()
    {
        if ($this->vid) {
            $obj = $this->getObj($this->vid);
            $obj->delete();
            $this->showDeleteModal = false;
            $this->clearFields();
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function applyDateFilter()
    {
        $this->render();
    }

    public function export()
    {
        $query = Party::where('is_active', true)
            ->where('party_type', 2)
            ->where('user_id', auth()->id())
            ->get();

        $totalCreditSum = 0;
        $totalDebitSum = 0;
        $balanceSum = 0;

        foreach ($query as $party) {
            $totalCredit = 0;
            $totalDebit = 0;

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

            $party->totalCredit = $totalCredit;
            $party->totalDebit = $totalDebit;
            $party->balance = $totalCredit - $totalDebit;

            $totalCreditSum += $totalCredit;
            $totalDebitSum += $totalDebit;
            $balanceSum += $party->balance;
        }

        $fileName = 'customer_balances_' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\SupplierExport($query, $totalCreditSum, $totalDebitSum, $balanceSum),
            $fileName
        );
    }

    public function render()
    {
        $query = Party::where('user_id', auth()->id())
            ->where('party_type', 2);

        if ($this->is_active === false) {
            $query->where('is_active', false);
        } else {
            $query->where('is_active', true);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('other', 'like', '%' . $this->search . '%')
                    ->orWhere('party_type', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->start_date && $this->end_date) {
            $startDate = Carbon::parse($this->start_date)->startOfDay();
            $endDate = Carbon::parse($this->end_date)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $list = $query->paginate(10);
        $totalCreditSum = 0;
        $totalDebitSum = 0;
        $balanceSum = 0;

        foreach ($list as $party) {
            $totalCredit = 0;
            $totalDebit = 0;
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
            $party->totalCredit = $totalCredit;
            $party->totalDebit = $totalDebit;
            $party->balance = $totalCredit - $totalDebit;
            $totalCreditSum += $totalCredit;
            $totalDebitSum += $totalDebit;
            $balanceSum += $party->balance;
        }
        // Return the view with the necessary data
        return view('livewire.pages.supplier')->layout('layouts.web')->with([
            'list' => $list,
            'totalCreditSum' => $totalCreditSum,
            'totalDebitSum' => $totalDebitSum,
            'balanceSum' => $balanceSum,
        ]);
    }

    public function toggleInactiveFilter()
    {
        $this->is_active = !$this->is_active;
    }

}

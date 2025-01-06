<?php

namespace App\Livewire\Supplier;

use App\Models\Party;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showEditModal = false;
    public bool $showDeleteModal = false;

    public $vid = '';
    public $party_type = 2;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $adrs_1 = '';
    public $adrs_2 = '';
    public $pincode = '';
    public $city = '';
    public $state = '';
    public $country = '';
    public $is_active = 1;
    public $search = '';
    public $start_date;
    public $end_date;


    #region[rules]
    public function rules(): array
    {
        return [
            'party_type' => 'required|string',
            'name' => 'required|unique:companies,name',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'nullable|string',
            'adrs_1' => 'required|string',
            'adrs_2' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|string',
            'country' => 'nullable|string',
            'is_active' => 'nullable|boolean', // Assuming is_active is a boolean flag
        ];
    }

    public $transaction_id;
    public $amount;

    public function messages()
    {
        return [
            'party_type.required' => ':attribute is required.',
            'name.required' => ':attribute is required.',
            'email.required' => ':attribute is required.',
            'email.email' => ':attribute must be a valid email address.',
            'email.unique' => ':attribute is already taken.',
            'phone.string' => ':attribute must be a string.',
            'adrs_1.required' => ':attribute is required.',
            'adrs_2.string' => ':attribute must be a string.',
            'city.required' => ':attribute is required.',
            'state.required' => ':attribute is required.',
            'pincode.required' => ':attribute is required.',
            'country.string' => ':attribute must be a string.',
            'is_active.boolean' => ':attribute must be true or false.',
        ];
    }

    public function validationAttributes()
    {
        return [
            'party_type' => 'Party Type',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'adrs_1' => 'Address Line 1',
            'adrs_2' => 'Address Line 2',
            'city' => 'City',
            'state' => 'State',
            'pincode' => 'Pincode',
            'country' => 'Country',
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

            if ($this->vid == "") {
                Party::create([
                    'party_type' => $this->party_type,
                    'name' => $this->name,
                    'email' => $this->email ?: '-',
                    'phone' => $this->phone ?: '-',
                    'adrs_1' => $this->adrs_1 ?: '-',
                    'adrs_2' => $this->adrs_2 ?: '-',
                    'pincode' => $this->pincode ?: '-',
                    'city' => $this->city ?: '-',
                    'state' => $this->state ?: '-',
                    'country' => $this->country ?: '-',
                    'is_active' => $this->is_active ?: 1,
                ]);
                $message = "Saved";

            } else {
                $obj = Party::find($this->vid);
                $obj->party_type = $this->party_type;
                $obj->name = $this->name;
                $obj->email = $this->email;
                $obj->phone = $this->phone;
                $obj->adrs_1 = $this->adrs_1;
                $obj->adrs_2 = $this->adrs_2;
                $obj->pincode = $this->pincode;
                $obj->city = $this->city;
                $obj->state = $this->state;
                $obj->country = $this->country;
                $obj->is_active = $this->is_active;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
//        session()->flash('success', '"' . $this->name . '"  has been ' . $message . ' .');
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
                $this->email = $obj->email;
                $this->phone = $obj->phone;
                $this->adrs_1 = $obj->adrs_1;
                $this->adrs_2 = $obj->adrs_2;
                $this->pincode = $obj->pincode;
                $this->city = $obj->city;
                $this->state = $obj->state;
                $this->country = $obj->country;
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
        $this->party_type = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->adrs_1 = '';
        $this->adrs_2 = '';
        $this->pincode = '';
        $this->city = '';
        $this->state = '';
        $this->country = '';
        $this->is_active = 1;
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
        $this->resetPage(); // Reset pagination when searching
    }

    public function applyDateFilter()
    {
        $this->render();
    }

    public function render()
    {
        $query = Party::where('is_active', true)
            ->where('party_type', 2);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('adrs_1', 'like', '%' . $this->search . '%')
                    ->orWhere('party_type', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->start_date && $this->end_date) {
            $startDate = Carbon::parse($this->start_date)->startOfDay();
            $endDate = Carbon::parse($this->end_date)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $list = $query->paginate(10);

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

                if ($transaction->trans_type == 'Receive') {
                    $totalCredit += $transaction->amount + $itemTotal;
                } elseif ($transaction->trans_type == 'Pay') {
                    $totalDebit += $transaction->amount + $itemTotal;
                }
            }

            // Store the totals and balance on the party
            $party->totalCredit = $totalCredit;
            $party->totalDebit = $totalDebit;
            $party->balance = $totalCredit - $totalDebit;
        }

        return view('livewire.supplier.index')->layout('layouts.app')->with([
            'list' => $list,
        ]);
    }

}

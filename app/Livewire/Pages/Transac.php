<?php

namespace App\Livewire\Pages;

use App\Exports\TransactionsExport;
use App\Imports\TransactionsImport;
use App\Models\Party;
use App\Models\Transaction;
use App\Models\TransType;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Transac extends Component
{
    use WithPagination;
    use \Livewire\Features\SupportFileUploads\WithFileUploads;

    public $file;
    public $showEditModal = false;
    public bool $showDeleteModal = false;
    public $vid;
    public $party_id = '';      // Refers to 'party_id' from the table, might relate to the party's primary key
    public $trans_type = 'Item Out';    // Refers to 'trans_type' (e.g., 'Pay' or 'Receive')
    public $desc = '';          // Refers to 'desc' (description of the transaction)
    public $date = '';          // Refers to 'date' (transaction date)
    public $image = '';         // Refers to 'image' (could be a file path or base64 encoded image)
    public $dateFilter = 'all'; // Default option
    public $start_date;
    public $end_date;

    public $active_id = true;
    public $party_type = true;
    public $items = [];
    public $grandTotal = 0;
    public $amount = 0;
    public $searchTerm = '';
//    public $list;

    public function rules(): array
    {
        return [
            'party_id' => 'nullable|exists:parties,id',
            'trans_type' => 'required|string|in:Pay,Receive',
            'desc' => 'nullable|string', // Description can be null or a string
            'date' => 'required|date', // Ensure the date is a valid date
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg', // Validation for image file types
            'amount' => 'required|numeric|min:0', // Ensure the amount is a positive number (no negative transactions)
            'active_id' => 'nullable|boolean', // Assuming is_active is a boolean flag, can be true or false
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'items' => 'nullable|array',
            'items.*.item_no' => 'required|string|max:255',
            'items.*.item_name' => 'required|string|max:255',
            'items.*.item_quantity' => 'required|integer|min:1',
            'items.*.item_price' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'party_id.exists' => 'The selected party is invalid.',
            'trans_type.required' => ':attribute is required.',
            'trans_type.in' => ':attribute must be either "Pay" or "Receive".',
            'desc.string' => ':attribute must be a string.',
            'date.required' => ':attribute is required.',
            'date.date' => ':attribute must be a valid date.',
            'image.mimes' => ':attribute must be an image file (jpeg, png, jpg, gif, svg).',
            'amount.required' => ':attribute is required.',
            'amount.numeric' => ':attribute must be a numeric value.',
            'amount.min' => ':attribute must be a positive number.',
            'active_id.boolean' => ':attribute must be true or false.',
        ];
    }

    public function validationAttributes()
    {
        return [
            'party_id' => 'Party ID',
            'trans_type' => 'Transac Type',
            'desc' => 'Description',
            'date' => 'Date',
            'image' => 'Image',
            'amount' => 'Amount',
            'active_id' => 'Active Status',
        ];
    }

    public $party;
    public $transaction_type;

    public function mount($id)
    {
        $this->party_id = $id;
        $this->party = Party::find($this->party_id);
        $this->party_type = $this->party->party_type ?? 'unknown';
        $this->transaction_type = TransType::all();
    }

    public function addItem()
    {
        $this->items[] = [
            'item_no' => '',
            'item_name' => '',
            'item_quantity' => 0,
            'item_price' => 0.00,
            'item_total' => 0.00,
        ];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function save()
    {
        $this->showEditModal = true;
    }

    public function getSave()
    {
        if ($this->amount != '') {
            if ($this->vid == "") {
                Transaction::create([
                    'party_id' => $this->party_id,
                    'trans_type' => $this->trans_type ,
                    'desc' => $this->desc ?: '-',
                    'date' => $this->date ? Carbon::parse($this->date) : Carbon::now(),
                    'amount' => $this->amount,
                    'items' => json_encode($this->items),
                    'active_id' => $this->active_id ?? 1,
                    'image' => $this->image ?? null,
                ]);
                $message = "Saved";
            } else {
                $obj = Transaction::find($this->vid);
                $obj->party_id = $this->party_id;
                $obj->trans_type = $this->trans_type;
                $obj->desc = $this->desc ?: '-';
                $obj->date = $this->date ? Carbon::parse($this->date) : Carbon::now();
                $obj->amount = $this->amount;
                $obj->items = json_encode($this->items);
                $obj->active_id = $this->active_id ?? 1;
                $obj->image = $this->image ?? null;
                $obj->save();
                $message = "Updated";
            }

            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        session()->flash('success', '"' . $this->trans_type . '" has been ' . $message . ' .');
        $this->clearFields();
        $this->showEditModal = false;
        if ($this->party_type == 1) {
            return $this->redirect(route('customers.index'));
        } else {
            return $this->redirect(route('suppliers.index'));
        }
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
            $obj = Transaction::find($id);
            if ($obj) {
                $this->vid = $obj->id;
                $this->party_id = $obj->party_id;
                $this->trans_type = $obj->trans_type;
                $this->desc = $obj->desc;
                $this->date = $obj->date;
                $this->items = json_decode($obj->items, true) ?? [];
                $this->image = $obj->image ? Carbon::parse($this->date) : Carbon::now();
                $this->amount = $obj->amount;
                $this->active_id = $obj->active_id;
                return $obj;
            }
        }
        return null;
    }

#region[Clear-Fields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->party_id = '';
        $this->desc = '';
        $this->date = '';
        $this->image = '';
        $this->amount = '';
        $this->active_id = 1;
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

    public function applyDateFilter()
    {
        $this->render();
    }

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new TransactionsImport, $this->file->getRealPath());

        session()->flash('message', 'Transactions imported successfully!');
    }

    public function export()
    {
        $transactions = Transaction::where('party_id', $this->party_id)
            ->where('active_id', true)
            ->orderBy('date', 'asc')
            ->get();

        $fileName = 'transactions_' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(new TransactionsExport($transactions), $fileName);
    }

    public function render()
    {
        $query = Transaction::where('party_id', $this->party_id)
            ->where('active_id', true);

        if ($this->searchTerm) {
            $query->where(function ($query) {
                $query->where('trans_type', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('desc', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('date', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('amount', 'like', '%' . $this->searchTerm . '%');
            });
        }

        if ($this->dateFilter != 'all') {
            switch ($this->dateFilter) {
                case 'today':
                    $query->whereDate('date', Carbon::today());
                    break;
                case 'yesterday':
                    $query->whereDate('date', Carbon::yesterday());
                    break;
                case 'last_15_days':
                    $query->whereDate('date', '>=', Carbon::now()->subDays(15));
                    break;
                case 'last_30_days':
                    $query->whereDate('date', '>=', Carbon::now()->subDays(30));
                    break;
                case 'last_90_days':
                    $query->whereDate('date', '>=', Carbon::now()->subDays(90));
                    break;
                case 'last_180_days':
                    $query->whereDate('date', '>=', Carbon::now()->subDays(180));
                    break;
                case 'custom_range':
                    if ($this->start_date && $this->end_date) {
                        $startDate = Carbon::parse($this->start_date)->startOfDay();
                        $endDate = Carbon::parse($this->end_date)->endOfDay();
                        $query->whereBetween('date', [$startDate, $endDate]);
                    }
                    break;
            }
        }

        $transactions = $query->orderBy('date', 'asc')->get()->map(function ($transaction) {
            $items = json_decode($transaction->items, true) ?? [];
            $itemTotal = 0;

            foreach ($items as $item) {
                $itemTotal += ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0);
            }

            $transaction->item_total = $itemTotal;
            return $transaction;
        });

        return view('livewire.pages.transac')->layout('layouts.web')->with([
            'party' => Party::find($this->party_id) ?: new Party(),
            'list' => $transactions,
        ]);
    }

}

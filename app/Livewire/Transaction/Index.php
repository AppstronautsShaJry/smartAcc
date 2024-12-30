<?php

namespace App\Livewire\Transaction;

use App\Models\Party;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
//use function Termwind\render;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $showEditModal = false;
    public bool $showDeleteModal = false;

    public $vid;
    public $party_id = '';      // Refers to 'party_id' from the table, might relate to the party's primary key
    public $trans_type = '';    // Refers to 'trans_type' (e.g., 'Pay' or 'Receive')
    public $payment_method = ''; // Refers to 'payment_method' (e.g., 'Cash', 'Card', etc.)
    public $bill_no = '';       // Refers to 'bill_no' (the transaction or bill number)
    public $desc = '';          // Refers to 'desc' (description of the transaction)
    public $date = '';          // Refers to 'date' (transaction date)
    public $image = '';         // Refers to 'image' (could be a file path or base64 encoded image)
    public $amount = 0.00;      // Refers to 'amount' (transaction amount, stored as decimal)
    public $start_date = '';
    public $end_date = '';

    public $active_id = true;

    public function rules(): array
    {
        return [
            'party_id' => 'nullable|exists:parties,id', // Assuming the party_id is a foreign key to the 'parties' table
            'trans_type' => 'required|string|in:Pay,Receive', // Validation for transaction type (Pay or Receive)
            'payment_method' => 'required|string', // Assuming a required string for the payment method
            'bill_no' => 'required|string|unique:transactions,bill_no', // Assuming 'transactions' table for bill_no uniqueness
            'desc' => 'nullable|string', // Description can be null or a string
            'date' => 'required|date', // Ensure the date is a valid date
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg', // Validation for image file types
            'amount' => 'required|numeric|min:0', // Ensure the amount is a positive number (no negative transactions)
            'active_id' => 'nullable|boolean', // Assuming is_active is a boolean flag, can be true or false
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ];
    }

    public function messages()
    {
        return [
            'party_id.exists' => 'The selected party is invalid.',
            'trans_type.required' => ':attribute is required.',
            'trans_type.in' => ':attribute must be either "Pay" or "Receive".',
            'payment_method.required' => ':attribute is required.',
            'bill_no.required' => ':attribute is required.',
            'bill_no.unique' => ':attribute must be unique.',
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
            'trans_type' => 'Transaction Type',
            'payment_method' => 'Payment Method',
            'bill_no' => 'Bill Number',
            'desc' => 'Description',
            'date' => 'Date',
            'image' => 'Image',
            'amount' => 'Amount',
            'active_id' => 'Active Status',
        ];
    }

    public $list;
    public function mount($id)
    {
        $this->party_id = $id;
        $this->render();

        // Filter by start date and end date if provided
        $query = Transaction::where('party_id', $this->party_id)->where('active_id', true);

        if ($this->start_date) {
            $query->where('date', '>=', $this->start_date);
        }

        if ($this->end_date) {
            $query->where('date', '<=', $this->end_date);
        }

        $this->list = $query->orderBy('date', 'asc')->get();
    }

    public function save()
    {
        $this->showEditModal = true;
    }

    public function getSave()
    {
        if ($this->amount !== '') {

            if ($this->vid == "") {
                $transactionData = [
                    'party_id' => $this->party_id,
                    'trans_type' => $this->trans_type,
                    'payment_method' => $this->payment_method ?: '-',
                    'bill_no' => $this->bill_no >'-',
                    'desc' => $this->desc ?: '-',
                    'date' => $this->date ? Carbon::parse($this->date) : Carbon::now(),
                    'amount' => $this->amount ?: '-',
                    'active_id' => $this->active_id ?? 1,
                ];

                if ($this->image) {
                    $transactionData['image'] = $this->image;
                } else {
                    $transactionData['image'] = null;
                }

                Transaction::create($transactionData);
                $message = "Saved";

            } else {
                // Editing an existing record
                $obj = Transaction::find($this->vid);
                $obj->party_id = $this->party_id;  // Update party_id if needed
                $obj->trans_type = $this->trans_type;
                $obj->payment_method = $this->payment_method;
                $obj->bill_no = $this->bill_no;
                $obj->desc = $this->desc;
                $obj->date = $this->date ? Carbon::parse($this->date) : Carbon::now();   // Defaults to current time if not provided
                $obj->amount = $this->amount;
                $obj->active_id = $this->active_id ?? 1;

                if ($this->image) {
                    $obj->image = $this->image;
                } elseif ($this->image === null) {
                    $obj->image = null;
                }

                $obj->save();
                $message = "Updated";
            }

            $this->dispatch('notify', ['type' => 'success', 'content' => $message . ' Successfully']);
        }

        session()->flash('success', '"' . $this->bill_no . '" has been ' . $message . ' .');
        $this->clearFields();
        $this->showEditModal = false;
//        $this->emit('refreshComponent');
//        $this->rerender();
    }

//    public function refresh()
//    {
//        $this->reset();
//        $this->mount($this->party_id);
//    }

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
                $this->payment_method = $obj->payment_method;
                $this->bill_no = $obj->bill_no;
                $this->desc = $obj->desc;
                $this->date = $obj->date;
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
        $this->trans_type = '';
        $this->payment_method = '';
        $this->bill_no = '';
        $this->desc = '';
        $this->date = '';
        $this->image = '';
        $this->amount = '';
        $this->active_id = 1;  // Assuming 1 means active by default
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


    public function downloadTransactionReport($partyId)
    {
        // Create the URL with additional query parameters (start_date and end_date)
        $pdfUrl = route('transactions.report', [
            'partyId' => $partyId,
            'start_date' => $this->start_date, // Pass the start date filter
            'end_date' => $this->end_date,     // Pass the end date filter
        ]);

        // Redirect to the PDF generation route
        return redirect()->to($pdfUrl);
    }



    public function rerender()
    {
        return $this->redirect(route('transactions.index', ['party_id' => $this->party_id]));
    }


    public function render()
    {
        // Apply the filters and get the filtered list

        return view('livewire.transaction.index')->layout('layouts.app')->with([
            'party' => Party::find($this->party_id) ?: new Party(),
        ]);
    }

}

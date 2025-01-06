<div>
    <x-slot name="header">Supplier</x-slot>
    <div class="flex justify-between py-5">
        <div class="w-1/2">
            <x-input.floating wire:model.live.debounce.300ms="search"
                              type="text"
                              label="search ..."
                              placeholder="Search by Name, Email, Phone, Address,Date or Party Type"
            />
        </div>
        <div class="flex gap-x-5">
            <button class="px-4 py-2 bg-green-600 text-white rounded-md font-lex " wire:click="save">New</button>
            <a href="{{ route('supplier.pdf', ['search' => $search, 'start_date' => $start_date, 'end_date' => $end_date]) }}"
               class="bg-purple-600 text-white px-2 flex items-center justify-center text-center rounded-md">
                Download PDF
            </a>


        </div>
    </div>
    <div class="flex space-x-4">
        <x-input.floating label="Start Date" type="date" wire:model="start_date"/>
        <x-input.floating label="End Date" type="date" wire:model="end_date"/>
        <button class="max-w-max px-4 py-2 bg-blue-600 text-white rounded-md" wire:click="applyDateFilter">Filter</button>
    </div>


    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <!-- Caption -------------------------------------------------------------------------------------------------->

        <div class="flex gap-3">
            <x-table.caption caption="Customer">
                {{$list->count()}}
            </x-table.caption>
        </div>

        <x-table.form>

            <!-- Table Header ----------------------------------------------------------------------------------------->

            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="5%"/>
                <x-table.header-text sortIcon="none" center width="30%">
                    Customer Details
                </x-table.header-text>
                <x-table.header-text sortIcon="none" center width="30%">
                    Date
                </x-table.header-text>
                <x-table.header-text sortIcon="none" center>
                    Balance
                </x-table.header-text>
                <x-table.header-action/>
            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)
                    <x-table.row>

                        <x-table.cell-text><a href="{{route('transactions.index',[$row->id])}}">{{$index+1}}</a>
                        </x-table.cell-text>

                        <x-table.cell-text left><span class="capitalize"><a
                                    href="{{route('transactions.index',[$row->id])}}">
                                    <div class="text-xs font-lex text-start text-gray-500 space-y-1">

                                    <div class="text-blue-600 font-merri font-semibold text-sm">{{$row->name}}</div>
                                        <div class="text-green-600"><span>Cr:</span> <span
                                                class="text-gray-500 pl-4">₹ {{number_format($row->totalCredit,2)}}</span></div>
                                    <div class="text-red-600"><span>Db:</span> <span
                                            class="text-gray-500 pl-4">₹ {{ number_format($row->totalDebit, 2)}}</span></div>
                                    <div>  {{$row->phone}}</div>
                                        <div class="">{{$row->email}}</div>
                                        <div> {{$row->adrs_1}}</div>
                                    </div>

                                </a></span></x-table.cell-text>
                        <x-table.cell-text>
                            <a href="{{route('transactions.index',[$row->id])}}" class="text-gray-500 font-semibold">
                                {{\Carbon\Carbon::parse($row->created_at)->format('d-M-Y')}}
                            </a>
                        </x-table.cell-text>
                        <x-table.cell-text>
                            <a href="{{route('transactions.index',[$row->id])}}">
                              <span
                                  class="font-semibold @if($row->balance < 0) text-red-600 @else text-green-600 @endif">
                             ₹ {{ number_format($row->balance, 2) }}
                                </span>
                            </a>
                        </x-table.cell-text>
                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach

            </x-slot:table_body>

        </x-table.form>

        <x-modal.delete/>

        <div>{{$list->links()}}</div>

    </x-forms.m-panel>


    <x-forms.create :id="$vid">
        <div class="w-full flex gap-5">
            <div class="w-full flex flex-col gap-5">
                <div class="flex gap-5">
                    <x-radio.btn value="1" wire:model="party_type" checked>Customer</x-radio.btn>
                    <x-radio.btn value="2" wire:model="party_type">Supplier</x-radio.btn>
                </div>
                <x-input.floating label="Name" wire:model="name"/>
                @error('name')
                <span class="text-red-600 text-xs font-lex">{{ $message }}</span>
                @enderror
                <x-input.floating label="Email" wire:model="email"/>
                <x-input.floating label="Phone" wire:model="phone"/>
                <x-input.floating label="Address/Category" wire:model="adrs_1"/>

            </div>
        </div>
    </x-forms.create>
</div>

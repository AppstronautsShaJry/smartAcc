<div class="space-y-10">
    <x-slot name="header">Customer</x-slot>
    <div class="bg-white p-4 rounded-lg shadow-sm transition-all duration-300 hover:shadow-md">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="w-full md:w-1/2 mb-4 md:mb-0">
                <x-input.floating
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    label="search ..."
                    placeholder="Search by Name, Email, Phone, Address,Date or Party Type"
                />
                <div class="mt-4 flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4 items-end">
                    <div class="w-full md:w-auto">
                        <x-input.floating
                            label="Start Date"
                            type="date"
                            wire:model="start_date"
                        />
                    </div>

                    <div class="w-full md:w-auto">
                        <x-input.floating
                            label="End Date"
                            type="date"
                            wire:model="end_date"
                        />
                    </div>

                    <button
                        class="w-full md:w-auto
                   px-4
                   py-2
                   bg-blue-600
                   text-white
                   rounded-md
                   hover:bg-blue-700
                   transition-colors
                   flex
                   items-center
                   justify-center"
                        wire:click="applyDateFilter">
                        Filter
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 justify-end">
                <button wire:click="export" class="bg-green-600 rounded-md text-white max-w-max px-4">
                    Excel
                </button>


                <a href="{{ route('customers.pdf', ['search' => $search, 'start_date' => $start_date, 'end_date' => $end_date]) }}" target="_blank"
                   class="bg-purple-600
                      text-white
                      px-4
                      py-2
                      flex
                      items-center
                      justify-center
                      rounded-md
                      hover:bg-purple-700
                      transition-colors">
                    PDF
                </a>
            </div>
        </div>


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
                <x-table.header-text sortIcon="none" center width="70%">
                    Customer Details
                </x-table.header-text>
{{--                <x-table.header-text sortIcon="none" center width="30%">--}}
{{--                    Date--}}
{{--                </x-table.header-text>--}}
                <x-table.header-text sortIcon="none" center >
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
                                    </div>
                                </a></span></x-table.cell-text>
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
                    <x-table.row>
                        <x-table.cell-text colspan="2" class="font-bold ">
                            Total :
                        </x-table.cell-text>
                        <x-table.cell-text colspan="1" class="font-bold text-blue-600 ">
                            ₹ {{ number_format($balanceSum, 2) }}
                        </x-table.cell-text>
                        <x-table.cell-text colspan="1" class="font-bold">
                            &nbsp;
                        </x-table.cell-text>
                    </x-table.row>

            </x-slot:table_body>

        </x-table.form>

        <x-modal.delete/>

        <div>{{$list->links()}}</div>

    </x-forms.m-panel>

<div class="h-16 w-full"></div>
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
                <x-input.floating label="Phone" wire:model="phone"/>
                <x-input.floating label="Address/Category" wire:model="other"/>

            </div>
        </div>
    </x-forms.create>

    <div class="fixed bottom-0 left-0 h-20 w-full bg-gray-100 mt-10 flex justify-between items-center px-10">
        <div class="w-2/3 mx-auto flex flex-col justify-center items-center">
            <div class="max-w-max  py-1 font-bold text-sm">
            <span>Total :</span><span class="text-blue-600">₹ {{ number_format($balanceSum, 2) }}</span>
            </div>
            <div class="text-xs flex gap-x-5 border-t pt-1 border-gray-600 max-w-max">
                <div><span>CR :</span><span class="text-green-600">₹ {{ number_format($totalCreditSum, 2) }}</span></div>
                <div><span>Db :</span><span class="text-red-600">₹ {{ number_format($totalDebitSum, 2) }}</span></div>
            </div>
        </div>
        <div class="w-1/3 mx-auto flex justify-end" ><button
                class="px-4 py-2
                       bg-green-600
                       text-white
                       rounded-md
                       font-lex
                       hover:bg-green-700
                       transition-colors
                       flex items-center
                       gap-2"
                wire:click="save">
                Add Customer
            </button></div>
    </div>
</div>

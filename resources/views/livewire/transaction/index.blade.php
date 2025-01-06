<div class="space-y-10">
    <x-slot name="header">Transactions</x-slot>
    <div class="w-full bg-gradient-to-r from-blue-50 to-blue-100
            flex flex-col gap-5 p-6
            shadow-md hover:shadow-xl
            transition-all duration-300
            rounded-lg
            animate-fade-in">

        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-merri font-semibold
                   text-blue-800
                   tracking-wide
                   hover:text-blue-600
                   transition-colors">
                {{$party->name}}
            </h2>
            <div class="text-sm text-gray-500
                    bg-blue-100
                    px-3 py-1
                    rounded-full">
                Contact Details
            </div>
        </div>

        <div class="flex flex-wrap gap-x-5
                text-gray-600
                font-lex
                items-center">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
                <span class="hover:text-blue-700 transition-colors">
                {{$party->email}}
            </span>
            </div>

            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.61 18 2 12.39 2 6V3z"/>
                </svg>
                <span class="hover:text-blue-700 transition-colors">
                {{$party->phone}}
            </span>
            </div>
        </div>

    </div>

    <div class="bg-gray-50 p-4 rounded-lg shadow-sm transition-all duration-300 hover:shadow-md">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 gap-x-5">
            <div class="flex flex-col md:flex-row items-center justify-start w-full gap-4">
                <div class="w-full md:w-auto">
                    <x-input.floating
                        type="text"
                        wire:model.live="searchTerm"
                        placeholder="Search transactions..."
                    />
                </div>
            </div>

            <div class="flex flex-wrap justify-end gap-4">
                <button
                    class="px-4 py-2
                       bg-green-600
                       text-white
                       rounded-md
                       font-lex
                       hover:bg-green-700
                       transition-colors"
                    wire:click="save">
                    New Transaction
                </button>

{{--                <a href="{{ route('transactions.pdf', ['partyId' => $party_id]--}}
{{--                ,['startDate'=>$start_date],['endDate'=>$end_date],['searchTerm'=>$searchTerm],['dateFilter'=>$dateFilter]) }}"--}}
{{--                  target="_blank" class="bg-purple-600--}}
{{--                      text-white--}}
{{--                      px-4--}}
{{--                      py-2--}}
{{--                      flex--}}
{{--                      items-center--}}
{{--                      justify-center--}}
{{--                      rounded-md--}}
{{--                      hover:bg-purple-700--}}
{{--                      transition-colors">--}}
{{--                    Download PDF--}}
{{--                </a>--}}

{{--                <a href="{{ route('transactions.pdf', ['partyId' => $party_id]) }}?startDate={{ $start_date }}&endDate={{ $end_date }}&searchTerm={{ $searchTerm }}&dateFilter={{ $dateFilter }}"--}}
{{--                   target="_blank"--}}
{{--                   class="bg-purple-600 text-white px-4 py-2 flex items-center justify-center rounded-md hover:bg-purple-700 transition-colors">--}}
{{--                    Download PDF--}}
{{--                </a>--}}

                <a href="{{ route('transactions.pdf', ['partyId' => $party_id]) }}?searchTerm={{ $searchTerm }}&dateFilter={{ $dateFilter }}&startDate={{ $start_date }}&endDate={{ $end_date }}"
                   target="_blank"
                   class="bg-purple-600 text-white px-4 py-2 flex items-center justify-center rounded-md hover:bg-purple-700 transition-colors">
                    Download PDF
                </a>


            </div>
        </div>

        <div class="mt-4 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
            <div class="w-full md:w-auto">
                <x-input.select
                    wire:model="dateFilter"
                    class="w-full md:w-auto">
                    <option value="all">All Dates</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="last_15_days">Last 15 Days</option>
                    <option value="last_30_days">Last 30 Days</option>
                    <option value="last_90_days">Last 90 Days</option>
                    <option value="last_180_days">Last 180 Days</option>
                    <option value="custom_range">Custom Range</option>
                </x-input.select>
            </div>

            @if ($dateFilter == 'custom_range')
                <div class="flex flex-col md:flex-row gap-4 w-full">
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
                </div>
            @endif

            <div class="w-full md:w-auto">
                <button
                    class="w-full md:w-auto
                       px-4
                       py-2
                       bg-blue-600
                       text-white
                       rounded-md
                       hover:bg-blue-700
                       transition-colors"
                    wire:click="applyDateFilter">
                    Filter
                </button>
            </div>
        </div>
    </div>


    <x-forms.create :id="$vid" :max-width="'3xl'">
        <div class="w-full flex flex-col gap-16">
            <div class="mt-5 text-xs space-y-3 h-80 overflow-y-auto pr-6">
                <h3 class="text-lg  font-semibold">Items</h3>
                <table class="table-auto w-full ">
                    <thead class="pb-12">
                    <tr class="border-b border-gray-400 bg-gray-100">
                        <th class="py-8">Item No</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th width="12%" class="text-center">Total</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="">
                    @foreach($items as $index => $item)
                        <tr class="">
                            <td class="py-6">
                                {{$index + 1}}
                            </td>
                            <td>
                                <x-input.floating label="Item Name" wire:model="items.{{ $index }}.item_name"/>
                            </td>

                            <td>
                                <x-input.floating label="Quantity" type="number"
                                                  wire:model.lazy="items.{{ $index }}.item_quantity"/>

                            </td>
                            <td>
                                <x-input.floating label="Price" type="number"
                                                  wire:model.lazy="items.{{ $index }}.item_price"/>
                            </td>
                            <td class="text-end pr-3">
                                <!-- Display Row Total -->
                                <span>₹ {{ number_format($item['item_quantity'] * $item['item_price'],2) }}</span>
                            </td>
                            <td>
                                <button class="text-[9px] text-white bg-red-600 rounded-sm px-1"
                                        wire:click.prevent="removeItem({{ $index }})" cla>Remove
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4" class="text-right font-bold px-12">Grand Total:</td>
                        <td colspan="1" class="text-end font-bold pr-3">
                            ₹ {{ number_format(collect($items)->sum(function ($item) {
                                return ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0);
                            }), 2) }}
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    </tfoot>
                </table>
                <button class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md" wire:click.prevent="addItem">Add Item
                </button>
            </div>
            <div class="flex gap-5">
                <div class="w-full flex flex-col gap-5">
                    <x-input.floating label="Amount" wire:model="amount"/>
                    <div class="flex gap-x-5">
                        <x-radio.btn value="Receive" wire:model="trans_type">Receive</x-radio.btn>
                        <x-radio.btn value="Pay" wire:model="trans_type" checked>Pay</x-radio.btn>
                    </div>
                    <x-input.floating label="Payment Method" wire:model="payment_method"/>
                </div>
                <div class="w-full flex flex-col gap-5">
                    <x-input.floating label="Bill No" wire:model="bill_no"/>
                    <x-input.floating label="Description" wire:model="desc"/>
                    <x-input.floating type="date" label="Transaction Date" wire:model="date"/>
                    <x-input.floating label="Transaction Image" wire:model="image" type="file"/>
                </div>
            </div>
        </div>


    </x-forms.create>
    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <!-- Caption -------------------------------------------------------------------------------------------------->

        <div class="flex gap-3">
            <x-table.caption caption="Transactions">
                {{$list->count()}}
            </x-table.caption>
        </div>

        <x-table.form>
            <!-- Table Header ----------------------------------------------------------------------------------------->
            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="5%"/>

                <x-table.header-text sortIcon="none" left>
                    Bill Details
                </x-table.header-text>


                <x-table.header-text sortIcon="none" left>
                    Items
                </x-table.header-text>


                <x-table.header-text sortIcon="none" left>
                    Credit
                </x-table.header-text>
                <x-table.header-text sortIcon="none" left>
                    Debit
                </x-table.header-text>
                <x-table.header-text sortIcon="none" left>
                    Balance
                </x-table.header-text>
                <x-table.header-action/>
            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">
                @php
                    $totalCredit = 0;
                    $totalDebit = 0;
                @endphp
                @foreach($list as $index => $row)
                    <x-table.row>
                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>

                        <x-table.cell-text left>
                            <div class="font-lex text-xs">
                                {{--                                <div class="capitalize font-merri text-blue-600 text-sm">--}}
                                {{--                                    {{$row->party->name}}--}}
                                {{--                                </div>--}}
                                {{--                                <div--}}
                                {{--                                    class="text-gray-400 text-[9px]">{{\Carbon\Carbon::parse($row->date)->format('d-M-Y')}}</div>--}}
                                <div class="">B.No: {{$row->bill_no}} - Trans: {{$row->payment_method}}</div>
                                <span class="text-blue-600">{{\Carbon\Carbon::parse($row->date)->format('d-M-Y')}}</span>
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text left="">
                            <div class="flex justify-start">
                                @php
                                    $items = json_decode($row->items, true) ?? [];
                                    $itemTotal = 0;
                                    if (!empty($items)) {
                                        foreach ($items as $item) {
                                            $itemTotal += ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0);
                                        }
                                    }
                                @endphp
                                @if(!empty($items))
                                    <ul class="list-disc list-inside text-start">
                                        @foreach($items as $item)
                                            <li>
                                                <strong>Name:</strong> {{ $item['item_name'] ?? 'N/A' }},
                                                <strong>Qty:</strong> {{ $item['item_quantity'] ?? 0 }},
                                                <strong>Price:</strong>
                                                ₹ {{ number_format($item['item_price'] ?? 0, 2) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-500">No Items</span>
                                @endif
                            </div>
                        </x-table.cell-text>

                        <x-table.cell-text right class="text-green-600 font-semibold">
                            @if($row->trans_type == 'Receive')
                                @php
                                    $totalCredit += $row->amount + $itemTotal;
                                @endphp
                                ₹ {{ number_format($row->amount + $itemTotal, 2) }}
                            @endif
                        </x-table.cell-text>

                        <x-table.cell-text right class="text-red-400 font-semibold">
                            @if($row->trans_type == 'Pay')
                                @php
                                    $totalDebit += $row->amount + $itemTotal;
                                @endphp
                                ₹ {{ number_format($row->amount + $itemTotal, 2) }}
                            @endif
                        </x-table.cell-text>

                        <x-table.cell-text right>
                            {{-- Don't recalculate balance for each row, only display total balance at the end --}}
                            ₹ {{ number_format($totalCredit - $totalDebit, 2) }}
                        </x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach

                <x-table.row class="bg-slate-100">
                    <x-table.cell-text colspan="5" class="text-blue-600 font-semibold">Total Balance</x-table.cell-text>

                    <x-table.cell-text right class="font-semibold">
                        ₹ {{ number_format($totalCredit - $totalDebit, 2) }}
                    </x-table.cell-text>

                    <x-table.cell-text>&nbsp;</x-table.cell-text>
                </x-table.row>
            </x-slot:table_body>
        </x-table.form>

        <x-modal.delete/>

    </x-forms.m-panel>


</div>

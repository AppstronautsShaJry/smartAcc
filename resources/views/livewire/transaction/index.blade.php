<div class="space-y-5">
    <x-slot name="header">Transactions</x-slot>
    <div class="bg-gray-50 border p-4 rounded-lg shadow-sm transition-all duration-300 hover:shadow-md">
        <div class="mt-4 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 justify-between">
            <div class="w-2/3 flex gap-x-5 ">
                <div class="w-1/2">
                    <x-input.floating
                        type="search"
                        wire:model.live="searchTerm"
                        label="Search"
                        placeholder="Search transactions..."
                    />
                </div>
                <div class="w-full md:w-auto">
                    <x-input.select
                        wire:model.live="dateFilter"
                        class="w-40 md:w-40" label="Sort BY Date">
                        <option value="custom_range">Custom Range</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="last_15_days">Last 15 Days</option>
                        <option value="last_30_days">Last 30 Days</option>
                        <option value="last_90_days">Last 90 Days</option>
                        <option value="last_180_days">Last 180 Days</option>
                        <option value="all">All Dates</option>
                    </x-input.select>
                </div>
                @if ($dateFilter == 'custom_range')
                    <div class="flex flex-col md:flex-row gap-4 w-full">
                        <div class="w-full md:w-auto">
                            <x-input.floating
                                label="Start Date"
                                type="date"
                                wire:model.live="start_date"
                            />
                        </div>
                        <div class="w-full md:w-auto">
                            <x-input.floating
                                label="End Date"
                                type="date"
                                wire:model.live="end_date"
                            />
                        </div>
                    </div>
                @endif
                <div class="w-full md:w-auto flex gap-x-5">
                    <button
                        class="w-full md:w-auto
                       px-4
                       py-2
                       bg-blue-600
                       text-white
                       rounded-md
                       hover:bg-blue-700
                       transition-colors hidden"
                        wire:click="applyDateFilter">
                        Filter
                    </button>
                </div>
            </div>
            <div class="flex flex-wrap justify-end gap-4">
                <button wire:click="export" class="bg-green-600 rounded-md text-white max-w-max px-4"> Excel</button>

                <a href="{{ route('transactions.pdf', ['partyId' => $party_id]) }}?searchTerm={{ $searchTerm }}&dateFilter={{ $dateFilter }}&startDate={{ $start_date }}&endDate={{ $end_date }}"
                   target="_blank"
                   class="bg-purple-600 text-white px-4 py-2 flex items-center justify-center rounded-md hover:bg-purple-700 transition-colors">
                    PDF
                </a>

            </div>
        </div>
    </div>

    <x-forms.create :id="$vid" :max-width="'2xl'">
        <div class="w-full flex flex-col gap-16">
            <div class="flex gap-5">
                <div class="w-full flex-col flex gap-5">
                <!-- Dropdown to select transaction type -->
                <x-input.modal-select wire:model.live="trans_type" label="Transaction Type" class="w-full">
                    <option value="" disabled>Select Transaction Type</option>
                    @foreach($transaction_type as $type)
                        <option value="{{ $type->name }}">{{ $type->name }}</option>
                    @endforeach
                </x-input.modal-select>
                <x-input.floating label="Amount" wire:model="amount"/>
                </div>
                <div class="w-full flex-col flex gap-5">

                <x-input.floating type="date" label="Transaction Date" wire:model="date"/>
                <x-input.floating label="Transaction Image" wire:model="image" type="file"/>
                </div>
            </div>
            @if($trans_type == 'Item Out')

                <div class="mt-5 text-xs space-y-3 h-80 overflow-y-auto pr-6">
                    <h3 class="text-lg font-semibold">Items</h3>
                    <table class="table-auto w-full">
                        <thead class="pb-12">
                        <tr class="border-b border-gray-400 bg-gray-100">
                            <th width="5%" class="py-4">No</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th width="15%" class="text-center">Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $index => $item)
                            <tr>
                                <td class="py-6">{{ $index + 1 }}</td>
                                <td>
                                    <x-input.product-float label="Item Name" wire:model="items.{{ $index }}.item_name"/>
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
                                    <span>₹ {{ number_format($item['item_quantity'] * $item['item_price'], 2) }}</span>
                                </td>
                                <td>
                                    <button class="text-xs text-white bg-red-600 rounded-full p-1"
                                            wire:click.prevent="removeItem({{ $index }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
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
                    <button class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md" wire:click.prevent="addItem">Add
                        Item
                    </button>
                </div>
            @endif
        </div>
    </x-forms.create>

    <div class="w-full flex justify-start gap-x-5 font-lex p-5 bg-gradient-to-r from-green-200 to-blue-200  h-auto rounded-lg shadow">
        <div class="text-xl font-merri capitalize"></div>
        <div class="flex gap-x-5">
        <div>{{$party->adrs_1}}</div>
        <div>{{$party->phone}}</div>
        </div>
    </div>

    <x-forms.m-panel>
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
                    Name
                </x-table.header-text>
                <x-table.header-text sortIcon="none" left>
                    Qty
                </x-table.header-text>
                {{--                <x-table.header-text sortIcon="none" left>--}}
                {{--                    Price--}}
                {{--                </x-table.header-text>--}}
                <x-table.header-text sortIcon="none" left>
                    Debit
                </x-table.header-text>
                <x-table.header-text sortIcon="none" left>
                    Credit
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
                                    <div class="flex flex-col">
                                        @foreach($items as $index => $item)
                                            <div class="flex items-center gap-x-2 text-xs font-semibold">
                                                <div class="w-2 h-2 rounded-full bg-gray-400"></div>
                                                <div class="capitalize">&nbsp;{{ $item['item_name'] ?? 'N/A' }},</div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-gray-500 text-xs">No Items</span>
                                @endif
                                <span class="text-xs px-5">{{$row->date}}</span>
                            </div>
                        </x-table.cell-text>
                        <x-table.cell-text left="">
                            <div class="flex justify-start">
                                @if(!empty($items))
                                    <div class="text-start text-xs font-semibold">
                                        @foreach($items as $item)
                                            <div class="flex flex-col">
                                                <div>{{ $item['item_quantity'] ?? 0 }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-gray-500">No Items</span>
                                @endif
                            </div>
                        </x-table.cell-text>
                        <x-table.cell-text right class="text-red-400 font-semibold">
                            @if($row->trans_type == 'Item Out')
                                @php
                                    $totalDebit += $row->amount + $itemTotal;
                                @endphp
                                ₹ {{ number_format($row->amount + $itemTotal, 2) }}
                            @endif
                        </x-table.cell-text>
                        <x-table.cell-text right class="text-green-600 font-semibold">
                            @if($row->trans_type == 'Amount Received')
                                @php
                                    $totalCredit += $row->amount + $itemTotal;
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

    <div class="h-16 w-full"></div>

    <div class="fixed bottom-0 left-0 h-20 w-full bg-gray-100 mt-10 flex justify-between items-center px-10">
        <div class="w-full flex justify-end">
            <button
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
                New Transaction
            </button>
        </div>
    </div>

</div>

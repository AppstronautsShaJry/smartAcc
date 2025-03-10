<div>
    <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
        {{--        <h1 class="text-xl font-semibold ">Dashboard</h1>--}}
        <x-forms.head header="Transaction"/>
        <!-- Search & Filter Container -->
        <div class="flex items-center gap-4">
            <!-- Search Bar -->
            <x-filter.search wire:model.live="searchTerm"/>
            <!-- Filter Button -->
            <x-filter.btn/>

            <x-button.excel wire:click="export">Excel</x-button.excel>
            <a href="{{ route('transactions.pdf', ['partyId' => $party_id]) }}?searchTerm={{ $searchTerm }}&dateFilter={{ $dateFilter }}&startDate={{ $start_date }}&endDate={{ $end_date }}"
               target="_blank">
                <x-button.pdf>Pdf</x-button.pdf>
            </a>

        </div>
    </div>

    <x-filter.drop-section>
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
            <div class="w-28 border rounded-md md:w-auto">
                <div class="w-full md:w-auto">
                    <x-input.floating
                        label="Start Date"
                        type="date"
                        wire:model.live="start_date"
                    />
                </div>
                <div class="w-28 border rounded-md md:w-auto">
                    <x-input.floating
                        label="End Date"
                        type="date"
                        wire:model.live="end_date"
                    />
                </div>
            </div>
        @endif
        <div>
            <x-button.filter wire:click="applyDateFilter">Filter</x-button.filter>
        </div>
    </x-filter.drop-section>

    <div class="w-1/3  grid grid-cols-1 md-grid-cols-1 gap-4 mb-6">
        <x-cards.card1
            :title="$party->name . ' ' . ($party->party_type == 1 ? ' (Customer)' : ' (Supplier)')"
            :value="$party->phone . ' ' . $party->adrs_1">

            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-home-link">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M20.085 11.085l-8.085 -8.085l-9 9h2v7a2 2 0 0 0 2 2h4.5"/>
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 1.807 1.143"/>
                    <path d="M21 21m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                    <path d="M21 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                    <path d="M16 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
                    <path d="M21 16l-5 3l5 2"/>
                </svg>
            </x-slot>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-pay">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5"/>
                <path d="M3 10h18"/>
                <path d="M16 19h6"/>
                <path d="M19 16l3 3l-3 3"/>
                <path d="M7.005 15h.005"/>
                <path d="M11 15h2"/>
            </svg>

        </x-cards.card1>

    </div>

    <x-forms.create :id="$vid" :max-width="'2xl'">
        <div class="w-full flex flex-col gap-4">
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

                <div class="mt-5 text-xs space-y-3 h-72 overflow-y-auto pr-6">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 18 18 6M6 6l12 12"/>
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

    <!-- Transactions Table -->
    <x-table.temp title="Transaction">
        <x-slot name="head">
            {{--                <th class="p-2 text-left">#</th>--}}
            {{--            <x-table.th>#</x-table.th>--}}
            <th class="p-2 text-left">#</th>
            <th class="p-2 text-left">Name</th>
            <th class="p-2 text-left">Qty</th>
            <th class="p-2 text-left">Debit</th>
            <th class="p-2 text-left">Credit</th>
            <th class="p-2 text-left">Balance</th>
            <th class="p-2 text-left">Actions</th>
        </x-slot>

        @php
            $totalCredit = 0;
            $totalDebit = 0;
        @endphp
        @foreach($list as $index => $row)
            <tr class="border-t font-lex font-semibold tracking-wider">
                <td class="p-2">{{$index+1}}</td>
                <td class="p-2">
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
                </td>
                <td class="p-2 text-green-500">
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
                </td>
                <td class="p-2 text-red-500">
                    @if($row->trans_type == 'Item Out')
                        @php
                            $totalDebit += $row->amount + $itemTotal;
                        @endphp
                        ₹ {{ number_format($row->amount + $itemTotal, 2) }}
                    @endif
                </td>
                <td class="p-2 text-green-500">
                    @if($row->trans_type == 'Amount Received')
                        @php
                            $totalCredit += $row->amount + $itemTotal;
                        @endphp
                        ₹ {{ number_format($row->amount + $itemTotal, 2) }}
                    @endif
                </td>
                <td class="p-2">
                    ₹ {{ number_format($totalCredit - $totalDebit, 2) }}
                </td>
                <td class="p-2">
                    <span><x-button.edit wire:click="edit({{$row->id}})"/></span>
                    <span><x-button.delete wire:click="getDelete({{$row->id}})"/></span>
                </td>
            </tr>
        @endforeach

        <tr class="border-t font-lex font-semibold tracking-wider">
            <td class="p-2" colspan="5">Total Balance</td>
            <td class="p-2 text-green-500">
                ₹ {{ number_format($totalCredit - $totalDebit, 2) }}
            </td>
            <td class="p-2">
                &nbsp;
            </td>
        </tr>
    </x-table.temp>
    <x-modal.delete/>

    <div class="my-5 mb-12">{{$list->links()}}</div>

    <div class="fixed bottom-1 right-6 max-w-max py-4 ">
        <x-button.add wire:click="save">Add Transaction</x-button.add>
    </div>
</div>

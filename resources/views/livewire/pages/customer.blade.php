<div>
    <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
        {{--        <h1 class="text-xl font-semibold ">Dashboard</h1>--}}
        <x-forms.head header="Customer"/>
        <!-- Search & Filter Container -->
        <div class="flex items-center gap-4">
            <!-- Search Bar -->
            <x-filter.search wire:model.live.debounce.300ms="search"/>
            <!-- Filter Button -->
            <x-filter.btn/>

            <x-button.excel wire:click="export">Excel</x-button.excel>

            <a href="{{ route('customers.pdf', ['search' => $search, 'start_date' => $start_date, 'end_date' => $end_date]) }}">
                <x-button.pdf>Pdf</x-button.pdf>
            </a>
        </div>
    </div>

    <x-filter.drop-section>
        <div class="w-28 border rounded-md md:w-auto">
            <x-input.floating
                label="Start Date"
                type="date"
                wire:model="start_date"
            />
        </div>
        <div class="w-28 border rounded-md md:w-auto">
            <x-input.floating
                label="End Date"
                type="date"
                wire:model="end_date"
            />
        </div>
        <div>
            <x-button.filter wire:click="applyDateFilter">Filter</x-button.filter>
        </div>
    </x-filter.drop-section>

    <!-- Transactions Table -->
    <x-table.temp title="Customer">
        <x-slot name="head">
            {{--                <th class="p-2 text-left">#</th>--}}
            {{--            <x-table.th>#</x-table.th>--}}
            <th class="p-2 text-left" width="5%">#</th>
            <th class="p-2 text-left" width="auto">Customer Details</th>
            <th class="p-2 text-left" width="15%">Balance</th>
            <th class="p-2 text-left" width="15%">Status</th>
            <th class="p-2 text-center" width="15%">Actions</th>
        </x-slot>

        @foreach($list as $index=>$row)
            <tr class="border-t font-lex font-semibold tracking-wider">
                <td class="p-2"><a href="{{route('transaction.page',[$row->id])}}">{{$index+1}}</td>
                <td class="p-2 inline-flex items-center">
                    <div class="flex items-center gap-x-3">
                        <div class="capitalize">{{$row->name}}</div>
                        <div class="inline-flex items-center text-xs pt-1 gap-x-2 ">
                            <span class="text-gray-500 font-semibold">Cr:</span>
                            <span
                                class="text-gray-500 pl-2">₹ {{number_format($row->totalCredit,2)}}</span>
                        </div>
                        <div class="inline-flex items-center text-xs pt-1 gap-x-2 ">
                            <span class="text-gray-500 font-semibold">Db :</span>
                            <span
                                class="text-gray-500 pl-2">₹ {{ number_format($row->totalDebit, 2)}}</span>
                        </div>
                    </div>
                </td>
                <td class="p-2 text-green-500 text-left">
                    <a href="{{route('transactions.index',[$row->id])}}">
                        <span class="font-semibold
                        @if($row->balance < 0)
                                text-red-600
                            @else @endif">
                            ₹ {{ number_format($row->balance, 2) }}
                            </span>
                    </a></td>
                <td class="p-2 text-left">
                    <div class="">
                        @if($row->other == 'New')
                            <x-badge.success>new</x-badge.success>
                        @elseif($row->other == 'Pending')
                            <x-badge.success>pending</x-badge.success>
                        @elseif($row->other == 'Closed')
                            <x-badge.success>closed</x-badge.success>
                        @endif
                    </div>
                </td>
                <td class="p-2 text-center">
                    <span><x-button.edit wire:click="edit({{$row->id}})"/></span>
                    <span><x-button.delete wire:click="getDelete({{$row->id}})"/></span>
                </td>
            </tr>
        @endforeach

    </x-table.temp>
    <x-modal.delete/>

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
                {{--                <x-input.floating label="Status" wire:model="other"/>--}}
                <x-input.modal-select label="Status" wire:model="other">
                    <option value="New">New</option>
                    <option value="Pending">Pending</option>
                    <option value="Closed">Closed</option>
                </x-input.modal-select>
            </div>
        </div>
    </x-forms.create>

    <div
        class="fixed bottom-0 bg-white p-4 font-lex  shadow rounded-lg mt-4 max-w-max mb-4 flex items-center justify-start gap-x-6">
        <div class="inline-flex items-center ">
            <span class="text-gray-400 font-semibold">Total Balance : </span>
            <span class="font-semibold  text-blue-500 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/>
                    <path d="M7 9l11 0"/>
                </svg>
               <span class="text-blue-600"> {{ number_format($balanceSum, 2) }}</span>
            </span>
        </div>
        <div class="inline-flex items-center">
            <span class="text-gray-400 font-semibold">Total Credit :</span>
            <span class="font-semibold  text-green-500 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/>
                    <path d="M7 9l11 0"/>
                </svg>
                <span class="text-green-600">{{ number_format($totalCreditSum, 2) }}</span>
            </span>
        </div>
        <div class="inline-flex items-center">
            <span class="text-gray-400 font-semibold">Total Debit :</span>
            <span class="font-semibold  text-red-500 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/>
                    <path d="M7 9l11 0"/>
                </svg>
                <span class="text-red-600"> {{ number_format($totalDebitSum, 2) }}</span>
            </span>
        </div>
    </div>
    <div class="fixed bottom-1 right-6 max-w-max py-4 ">
        {{--        <x-button.add wire:click="hello">Add Customer</x-button.add>--}}
        {{--        <button wire:click="hello">Click</button>--}}
        <button wire:click="save"
                class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-md
        flex items-center gap-2 hover:scale-105 transition-transform">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none"
                                                                                          d="M0 0h24v24H0z"
                                                                                          fill="none"/><path
                        d="M12 5l0 14"/><path d="M5 12l14 0"/>
                </svg>
            </span>
            <span class="text-lg font-semibold">Add Customer</span>
        </button>
    </div>
</div>

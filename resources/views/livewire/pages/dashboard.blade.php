{{--<x-layouts.master>--}}
<div>
    <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
        {{--        <h1 class="text-xl font-semibold ">Dashboard</h1>--}}
        <x-forms.head header="Dashboard"/>
        <!-- Search & Filter Container -->
        <div class="flex items-center gap-4">
            <!-- Search Bar -->
            <x-filter.search/>
            <!-- Filter Button -->
            {{--            <x-filter.btn/>--}}
        </div>
    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-2 md-grid-cols-3 gap-4 mb-6">

        <x-cards.card1 title="Total Customers" value="{{($customers->count())}}">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-brand-days-counter">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M20.779 10.007a9 9 0 1 0 -10.77 10.772"/>
                    <path d="M13 21h8v-7"/>
                    <path d="M12 8v4l3 3"/>
                </svg>
            </x-slot>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"/>
                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                <path d="M17 10h2a2 2 0 0 1 2 2v1"/>
                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                <path d="M3 13v-1a2 2 0 0 1 2 -2h2"/>
            </svg>
        </x-cards.card1>

        <x-cards.card1 title="Total Suppliers" value="{{($suppliers->count())}}">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-brand-days-counter">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M20.779 10.007a9 9 0 1 0 -10.77 10.772"/>
                    <path d="M13 21h8v-7"/>
                    <path d="M12 8v4l3 3"/>
                </svg>
            </x-slot>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="icon icon-tabler icons-tabler-outline icon-tabler-moneybag">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path
                    d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5z"/>
                <path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"/>
            </svg>
        </x-cards.card1>

        <a href="{{route('customer.page')}}">
            <x-cards.card1 title="Customer Total" value="{{ number_format($customerBalance, 2) }}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/>
                        <path d="M7 9l11 0"/>
                    </svg>
                </x-slot>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-refund">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5"/>
                    <path d="M3 10h18"/>
                    <path d="M7 15h.01"/>
                    <path d="M11 15h2"/>
                    <path d="M16 19h6"/>
                    <path d="M19 16l-3 3l3 3"/>
                </svg>
            </x-cards.card1>
        </a>

        <a href="{{route('supplier.page')}}">
            <x-cards.card1 title="Supplier Total" value="{{ number_format($supplierBalance, 2) }}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/>
                        <path d="M7 9l11 0"/>
                    </svg>
                </x-slot>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-door-exit">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M13 12v.01"/>
                    <path d="M3 21h18"/>
                    <path d="M5 21v-16a2 2 0 0 1 2 -2h7.5m2.5 10.5v7.5"/>
                    <path d="M14 7h7m-3 -3l3 3l-3 3"/>
                </svg>
            </x-cards.card1>
        </a>
    </div>

    <!-- Transactions Table -->
    <x-table.temp title="Recent Transactions">
        <x-slot name="head">
            {{--                <th class="p-2 text-left">#</th>--}}
            {{--            <x-table.th>#</x-table.th>--}}
            <th class="p-2 text-left">Party Name</th>
            <th class="p-2 text-left">Party Type</th>
            <th class="p-2 text-left">Amount</th>
            <th class="p-2 text-left">Status</th>
            <th class="p-2 text-center ">Actions</th>
        </x-slot>

        @foreach($customers->take(5) as $index=>$row)
            <tr class="border-t font-lex font-semibold tracking-wider">
                {{--                <td class="p-2"><a href="{{route('transaction.page',[$row->id])}}">{{$index+1}}</td>--}}
                <td class="p-2 inline-flex items-center">
                    <div class="flex items-center gap-x-3">
                        <div class="capitalize">{{$row->name}}</div>
                        <div class="inline-flex items-center text-xs pt-1 gap-x-2">
                            <span class="text-gray-500 font-semibold">Cr:</span>
                            <span class="{{ $row->totalCredit > 0 ? 'text-green-500' : 'text-gray-400' }} pl-2">
                              ₹ {{ number_format($row->totalCredit, 2) }}
                              </span>
                        </div>
                        <div class="inline-flex items-center text-xs pt-1 gap-x-2">
                            <span class="text-gray-500 font-semibold">Db:</span>
                            <span class="{{ $row->totalDebit > 0 ? 'text-red-500' : 'text-gray-400' }} pl-2">
                             ₹ {{ number_format($row->totalDebit, 2) }}
                            </span>
                        </div>
                    </div>
                </td>
                <td class="p-2 text-left">
                    <div class="">
                        @if($row->party_type == '1')
                            <div>Customer</div>
                        @elseif($row->party_type == '2')
                            <div>Supplier</div>
                        @endif
                    </div>
                </td>
                <td class="p-2 text-green-500 text-left">
                    <a href="{{route('transaction.page',[$row->id])}}">
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
                            <x-badge.new-badge>New</x-badge.new-badge>
                        @elseif($row->other == 'Pending')
                            <x-badge.pending-badge>Pending</x-badge.pending-badge>
                        @elseif($row->other == 'Closed')
                            <x-badge.closed-badge>Closed</x-badge.closed-badge>
                        @endif
                    </div>
                </td>
                <td class="p-2 text-center">
                <span
                    class="bg-gradient-to-br from-indigo-500 to-fuchsia-500 text-white px-3 py-1 w-auto rounded-md inline-flex items-center">
                <a href="{{route('customer.page')}}"
                   class="">
                    view
                </a>
                    </span>
                </td>
            </tr>
        @endforeach

        @foreach($suppliers->take(5) as $index=>$row)
            <tr class="border-t font-lex font-semibold tracking-wider">
                {{--                <td class="p-2"><a href="{{route('transaction.page',[$row->id])}}">{{$index+1}}</td>--}}
                <td class="p-2 inline-flex items-center">
                    <div class="flex items-center gap-x-3">
                        <div class="capitalize">{{$row->name}}</div>
                        <div class="inline-flex items-center text-xs pt-1 gap-x-2">
                            <span class="text-gray-500 font-semibold">Cr:</span>
                            <span class="{{ $row->totalCredit > 0 ? 'text-green-500' : 'text-gray-400' }} pl-2">
                              ₹ {{ number_format($row->totalCredit, 2) }}
                              </span>
                        </div>
                        <div class="inline-flex items-center text-xs pt-1 gap-x-2">
                            <span class="text-gray-500 font-semibold">Db:</span>
                            <span class="{{ $row->totalDebit > 0 ? 'text-red-500' : 'text-gray-400' }} pl-2">
                             ₹ {{ number_format($row->totalDebit, 2) }}
                            </span>
                        </div>
                    </div>
                </td>
                <td class="p-2 text-left">
                    <div class="">
                        @if($row->party_type == '1')
                            <div>Customer</div>
                        @elseif($row->party_type == '2')
                            <div>Supplier</div>
                        @endif
                    </div>
                </td>
                <td class="p-2 text-green-500 text-left">
                    <a href="{{route('transaction.page',[$row->id])}}">
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
                            <x-badge.new-badge>New</x-badge.new-badge>
                        @elseif($row->other == 'Pending')
                            <x-badge.pending-badge>Pending</x-badge.pending-badge>
                        @elseif($row->other == 'Closed')
                            <x-badge.closed-badge>Closed</x-badge.closed-badge>
                        @endif
                    </div>
                </td>
                <td class="p-2 text-center">
                <span
                    class="bg-gradient-to-br from-indigo-500 to-fuchsia-500 text-white px-3 py-1 w-auto rounded-md inline-flex items-center">
                <a href="{{route('supplier.page')}}"
                   class="">
                    view
                </a>
                    </span>
                </td>
            </tr>
        @endforeach

    </x-table.temp>
    {{--</x-layouts.master>--}}
</div>

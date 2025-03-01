<x-layouts.master>
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

{{--    <x-filter.drop-section>--}}
{{--        <div class="w-28 border rounded-md md:w-auto">--}}
{{--            <x-input.floating--}}
{{--                label="Start Date"--}}
{{--                type="date"--}}
{{--            />--}}
{{--        </div>--}}
{{--        <div class="w-28 border rounded-md md:w-auto">--}}
{{--            <x-input.floating--}}
{{--                label="End Date"--}}
{{--                type="date"--}}
{{--            />--}}
{{--        </div>--}}
{{--    </x-filter.drop-section>--}}

    <!-- Cards Section -->
    <div class="grid grid-cols-3 md-grid-cols-3 gap-4 mb-6">
        <x-cards.card1 title="Total Bal" value="12,000">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/>
                    <path d="M7 9l11 0"/>
                </svg>
            </x-slot>
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="icon icon-tabler icons-tabler-outline icon-tabler-chart-bar">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 13a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/>
                <path d="M15 9a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/>
                <path d="M9 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/>
                <path d="M4 20h14"/>
            </svg>
        </x-cards.card1>

        <x-cards.card1 title="Customer" value="3,80,000">
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

        <x-cards.card1 title="Supplier" value="5,00,000">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="icon icon-tabler icons-tabler-outline icon-tabler-moneybag">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path
                    d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5z"/>
                <path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"/>
            </svg>
        </x-cards.card1>

        <x-cards.card1 title="Total Credit" value="12,000">
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

        <x-cards.card1 title="Total Debit" value="3,80,000">
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
    </div>

    <!-- Transactions Table -->
    <x-table.temp title="Recent Transactions">
        <x-slot name="head">
            {{--                <th class="p-2 text-left">#</th>--}}
            <x-table.th>#</x-table.th>
            <th class="p-2 text-left">Party Name</th>

            <th class="p-2 text-left">Type</th>
            <th class="p-2 text-left">Amount</th>
            <th class="p-2 text-left">Date</th>
            <th class="p-2 text-left">Actions</th>
        </x-slot>

        <tr class="border-t font-lex font-semibold tracking-wider">
            <td class="p-2">1</td>
            <td class="p-2">John Doe</td>
            <td class="p-2">Customer</td>
            <td class="p-2 text-green-500">₹10,000</td>
            <td class="p-2">2025-02-25</td>
            <td class="p-2">
                <span
                    class="bg-gradient-to-br from-indigo-500 to-fuchsia-500 text-white px-3 py-1 w-auto rounded-md inline-flex items-center">
                <a href="{{route('customer.page')}}"
                   class="">
                    view
                </a>
                    </span>
            </td>
        </tr>
        <tr class="border-t font-lex font-semibold tracking-wider">
            <td class="p-2">2</td>
            <td class="p-2">Jane Smith</td>
            <td class="p-2">Supplier</td>
            <td class="p-2 text-red-500">₹5,000</td>
            <td class="p-2">2025-02-26</td>
            <td class="p-2">
                <span
                    class="bg-gradient-to-br from-indigo-500 to-fuchsia-500 text-white px-3 py-1 w-auto rounded-md inline-flex items-center">
                <a href="{{route('supplier.page')}}"
                   class="">
                    view
                </a>
                    </span>
            </td>
        </tr>
    </x-table.temp>

</x-layouts.master>

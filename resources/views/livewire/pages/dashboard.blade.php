{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Account Book</title>--}}
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
{{--    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}
{{--</head>--}}
{{--<body class="bg-gray-100">--}}
{{--<div class="flex flex-col h-screen"--}}
{{--     x-data="{ sidebarOpen: true, dateFilter: 'Custom Range', startDate: '', endDate: '' }">--}}
{{--    <div class="flex flex-1">--}}
{{--        <!-- Sidebar -->--}}
{{--        <x-menu.sidemenu />--}}

{{--        <div class="flex-1 p-6" x-data="{ showFilter: false, startDate: '', endDate: '' }">--}}
{{--            <!-- Top Navbar -->--}}
{{--            <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">--}}
{{--                <h1 class="text-xl font-semibold">Dashboard</h1>--}}
{{--                --}}
{{--                <!-- Search & Filter Container -->--}}
{{--                <div class="flex items-center gap-4">--}}
{{--                    <!-- Search Bar -->--}}
{{--                    <div class="relative w-80">--}}
{{--                        <input type="text" placeholder="Search Transactions..."--}}
{{--                               class="p-2 pl-10 border rounded-lg w-full focus:ring-indigo-500 focus:border-indigo-100">--}}
{{--                        <span class="absolute left-3 top-2 text-indigo-500">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
{{--                         stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">--}}
{{--                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>--}}
{{--                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>--}}
{{--                        <path d="M21 21l-6 -6"/>--}}
{{--                    </svg>--}}
{{--                    </span>--}}
{{--                    </div>--}}
{{--                    <!-- Filter Button -->--}}
{{--                    <div>--}}
{{--                        <span class="rounded-md border flex justify-center items-center px-3 py-1 gap-1 cursor-pointer"--}}
{{--                              @click="showFilter = !showFilter">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                                 stroke-width="1.5" stroke="currentColor" class="size-5 text-indigo-500">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                      d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"/>--}}
{{--                            </svg>--}}
{{--                            <span class="text-gray-400">Filter</span>--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="bg-white p-4 shadow rounded-lg mt-4 w-full mb-4"--}}
{{--                 x-show="showFilter" x-transition:enter="transform ease-out duration-300"--}}
{{--                 x-transition:enter-start="opacity-0 translate-y-[-10px]"--}}
{{--                 x-transition:enter-end="opacity-100 translate-y-0"--}}
{{--                 x-transition:leave="transform ease-in duration-200"--}}
{{--                 x-transition:leave-start="opacity-100 translate-y-0"--}}
{{--                 x-transition:leave-end="opacity-0 translate-y-[-10px]">--}}

{{--                <div class="flex justify-end flex-col md:flex-row gap-4 w-full">--}}
{{--                    <div class="w-28 border rounded-md md:w-auto">--}}
{{--                        <x-input.floating--}}
{{--                            label="Start Date"--}}
{{--                            type="date"--}}
{{--                            wire:model.live="start_date"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                    <div class="w-28 border rounded-md md:w-auto">--}}
{{--                        <x-input.floating--}}
{{--                            label="End Date"--}}
{{--                            type="date"--}}
{{--                            wire:model.live="start_date"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                    <div class="w-full md:w-auto">--}}
{{--                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>--}}
{{--                        <input--}}
{{--                            type="date"--}}
{{--                            id="end_date"--}}
{{--                            name="end_date"--}}
{{--                            class="mt-1 block w-full border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Cards Section -->--}}
{{--            <div class="grid grid-cols-3 md-grid-cols-3 gap-4 mb-6">--}}
{{--                <x-cards.card1 title="Total Bal" value="12,000">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                         width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                         class="icon icon-tabler icons-tabler-outline icon-tabler-chart-bar">--}}
{{--                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>--}}
{{--                        <path d="M3 13a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/>--}}
{{--                        <path d="M15 9a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/>--}}
{{--                        <path d="M9 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"/>--}}
{{--                        <path d="M4 20h14"/>--}}
{{--                    </svg>--}}
{{--                </x-cards.card1>--}}

{{--                <x-cards.card1 title="Customer" value="3,80,000">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                         class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">--}}
{{--                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>--}}
{{--                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>--}}
{{--                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"/>--}}
{{--                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>--}}
{{--                        <path d="M17 10h2a2 2 0 0 1 2 2v1"/>--}}
{{--                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>--}}
{{--                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2"/>--}}
{{--                    </svg>--}}
{{--                </x-cards.card1>--}}

{{--                <x-cards.card1 title="Supplier" value="5,00,000">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                         class="icon icon-tabler icons-tabler-outline icon-tabler-moneybag">--}}
{{--                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>--}}
{{--                        <path--}}
{{--                            d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5z"/>--}}
{{--                        <path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"/>--}}
{{--                    </svg>--}}
{{--                </x-cards.card1>--}}

{{--                <x-cards.card1 title="Total Credit" value="12,000">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                         class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-refund">--}}
{{--                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>--}}
{{--                        <path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5"/>--}}
{{--                        <path d="M3 10h18"/>--}}
{{--                        <path d="M7 15h.01"/>--}}
{{--                        <path d="M11 15h2"/>--}}
{{--                        <path d="M16 19h6"/>--}}
{{--                        <path d="M19 16l-3 3l3 3"/>--}}
{{--                    </svg>--}}
{{--                </x-cards.card1>--}}

{{--                <x-cards.card1 title="Total Debit" value="3,80,000">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                         class="icon icon-tabler icons-tabler-outline icon-tabler-door-exit">--}}
{{--                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>--}}
{{--                        <path d="M13 12v.01"/>--}}
{{--                        <path d="M3 21h18"/>--}}
{{--                        <path d="M5 21v-16a2 2 0 0 1 2 -2h7.5m2.5 10.5v7.5"/>--}}
{{--                        <path d="M14 7h7m-3 -3l3 3l-3 3"/>--}}
{{--                    </svg>--}}
{{--                </x-cards.card1>--}}

{{--            </div>--}}

{{--            <!-- Transactions Table -->--}}
{{--            <div class="bg-white p-4 shadow rounded-lg">--}}
{{--                <h2 class="text-lg font-semibold mb-4">Recent Transactions</h2>--}}
{{--                <table class="w-full border-collapse">--}}
{{--                    <thead>--}}
{{--                    <tr class="bg-indigo-500 text-white">--}}
{{--                        <th class="p-2 text-left">#</th>--}}
{{--                        <th class="p-2 text-left">Party Name</th>--}}
{{--                        <th class="p2 text-left">Type</th>--}}
{{--                        <th class="p-2 text-left">Amount</th>--}}
{{--                        <th class="p-2 text-left">Date</th>--}}
{{--                        <th class="p-2 text-left">Actions</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr class="border-t">--}}
{{--                        <td class="p-2">1</td>--}}
{{--                        <td class="p-2">John Doe</td>--}}
{{--                        <td class="p-2">Customer</td>--}}
{{--                        <td class="p-2 text-green-500">₹10,000</td>--}}
{{--                        <td class="p-2">2025-02-25</td>--}}
{{--                        <td class="p-2">--}}
{{--                            <a href="{{route('customer.page')}}"--}}
{{--                               class="bg-indigo-500 text-white px-3 py-1 rounded-md">View</a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr class="border-t">--}}
{{--                        <td class="p-2">2</td>--}}
{{--                        <td class="p-2">Jane Smith</td>--}}
{{--                        <td class="p-2">Supplier</td>--}}
{{--                        <td class="p-2 text-red-500">₹5,000</td>--}}
{{--                        <td class="p-2">2025-02-26</td>--}}
{{--                        <td class="p-2">--}}
{{--                            <a href="{{route('supplier.page')}}"--}}
{{--                               class="bg-indigo-500 text-white px-3 py-1 rounded-md">View</a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
<x-layouts.master>
    <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold">Dashboard</h1>

        <!-- Search & Filter Container -->
        <div class="flex items-center gap-4">
            <!-- Search Bar -->
            <x-filter.search />
            <!-- Filter Button -->
            <x-filter.btn />
        </div>
    </div>

    <x-filter.drop-section>
        <div class="w-28 border rounded-md md:w-auto">
            <x-input.floating
                label="Start Date"
                type="date"
            />
        </div>
        <div class="w-28 border rounded-md md:w-auto">
            <x-input.floating
                label="End Date"
                type="date"
            />
        </div>
    </x-filter.drop-section>

    <!-- Cards Section -->
    <div class="grid grid-cols-3 md-grid-cols-3 gap-4 mb-6">
        <x-cards.card1 title="Total Bal" value="12,000">
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
    <div class="bg-white p-4 shadow rounded-lg">
        <h2 class="text-lg font-semibold mb-4">Recent Transactions</h2>
        <table class="w-full border-collapse">
            <thead>
            <tr class="bg-indigo-500 text-white">
                <th class="p-2 text-left">#</th>
                <th class="p-2 text-left">Party Name</th>
                <th class="p2 text-left">Type</th>
                <th class="p-2 text-left">Amount</th>
                <th class="p-2 text-left">Date</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr class="border-t">
                <td class="p-2">1</td>
                <td class="p-2">John Doe</td>
                <td class="p-2">Customer</td>
                <td class="p-2 text-green-500">₹10,000</td>
                <td class="p-2">2025-02-25</td>
                <td class="p-2">
                    <a href="{{route('customer.page')}}"
                       class="bg-indigo-500 text-white px-3 py-1 rounded-md">View</a>
                </td>
            </tr>
            <tr class="border-t">
                <td class="p-2">2</td>
                <td class="p-2">Jane Smith</td>
                <td class="p-2">Supplier</td>
                <td class="p-2 text-red-500">₹5,000</td>
                <td class="p-2">2025-02-26</td>
                <td class="p-2">
                    <a href="{{route('supplier.page')}}"
                       class="bg-indigo-500 text-white px-3 py-1 rounded-md">View</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</x-layouts.master>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
<div class="flex flex-col h-screen"
     x-data="{ sidebarOpen: true, dateFilter: 'Custom Range', startDate: '', endDate: '' }">
    <div class="flex flex-1">
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'w-64' : 'w-16'"
             class="bg-indigo-900 text-white transition-all duration-300 p-4 flex flex-col">
            <button @click="sidebarOpen = !sidebarOpen" class="mb-4 flex items-center focus:outline-none">
                <span class="ml-2">☰</span>
                <span class="ml-6 text-xl font-bold" x-show="sidebarOpen">Tabbassam I Mart</span>
            </button>
            <nav class="relative">
                <div>
                    <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                    <span class="text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round"
                             class="icon icon-tabler icons-tabler-outline icon-tabler-home text-gray-200"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0"/><path
                                d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/><path
                                d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/></svg></span>
                        <a href="{{route('dash')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Dashboard</a>
                    </div>
                    <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/><path
                                d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/><path
                                d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"/></svg></span>
                        <a href="{{route('customer.page')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Customers</a>
                    </div>
                    <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-user-check"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4"/><path
                                d="M15 19l2 2l4 -4"/></svg></span>
                        <a href="{{route('supplier.page')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Suppliers</a>
                    </div>
                    <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-devices"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M13 9a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1v-10z"/><path
                                d="M18 8v-3a1 1 0 0 0 -1 -1h-13a1 1 0 0 0 -1 1v12a1 1 0 0 0 1 1h9"/><path d="M16 9h2"/></svg></span>
                        <a href="{{route('transaction.page')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Transactions</a>
                    </div>
                    <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"/><path
                                d="M9 12h12l-3 -3"/><path d="M18 15l3 -3"/></svg></span>
                        <a href="{{route('logout')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Logout</a>
                    </div>

                    <div
                        class="mb-2 flex items-center hover:bg-indigo-700 p-0.5 hover:rounded-sm w-full absolute -bottom-60">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"/><path
                                d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/></svg></span>
                        <a href="{{route('profile.show')}}" class="ml-2 block p-2 rounded"
                           x-show="sidebarOpen">Profile</a>
                    </div>

                    <div
                        class="mb-2 flex items-center hover:bg-indigo-700 p-0.5 hover:rounded-sm absolute -bottom-72 w-full">
                        <div
                            class="flex justify-center items-center text-lg rounded-full border-2 border-gray-500 bg-gray-50 w-7 h-7">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 fill="#504B38" class="w-4 h-4">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"/>
                                <path
                                    d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"/>
                            </svg>
                        </div>
                        <a href="{{ route('dash') }}" class="ml-1 block p-2 rounded" x-show="sidebarOpen">
                            {{ auth()->user()->name }}
                        </a>
                    </div>


                    {{--                    <div--}}
                    {{--                        class="mb-2 flex items-center hover:bg-indigo-700 p-0.5 hover:rounded-sm absolute -bottom-72 w-full">--}}
                    {{--                            <span class="text-lg rounded-full border-2 border-gray-500 bg-gray-50 w-7 h-7">--}}
                    {{--                                <span class="">--}}
                    {{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"--}}
                    {{--                                         fill="#00000"--}}
                    {{--                                         class="flex justify-center items-center size-4 icon icon-tabler icons-tabler-filled icon-tabler-user"><path--}}
                    {{--                                            stroke="none" d="M0 0h24v24H0z" fill="none"/><path--}}
                    {{--                                            d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"/><path--}}
                    {{--                                            d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"/></svg></span>--}}
                    {{--                            </span>--}}
                    {{--                        <a href="{{route('dash')}}" class="ml-2 block p-2 rounded"--}}
                    {{--                           x-show="sidebarOpen">{{auth()->user()->name}}</a>--}}
                    {{--                    </div>--}}
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6" x-data="{ showFilter: false, startDate: '', endDate: '' }">
            <!-- Top Navbar -->

            <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
                <h1 class="text-xl font-semibold">Dashboard</h1>

                <!-- Search & Filter Container -->
                <div class="flex items-center gap-4">
                    <!-- Search Bar -->
                    <div class="relative w-80">
                        <input type="text" placeholder="Search Transactions..."
                               class="p-2 pl-10 border rounded-lg w-full focus:ring-indigo-500 focus:border-indigo-100">
                        <span class="absolute left-3 top-2 text-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
                        <path d="M21 21l-6 -6"/>
                    </svg>
                    </span>
                    </div>

                    <!-- Filter Button -->
                    <div>
                        <span class="rounded-md border flex justify-center items-center px-3 py-1 gap-1 cursor-pointer"
                              @click="showFilter = !showFilter">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="size-5 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"/>
                            </svg>
                            <span class="text-gray-400">Filter</span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 shadow rounded-lg mt-4 w-full mb-4"
                 x-show="showFilter" x-transition:enter="transform ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-[-10px]"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transform ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-[-10px]">

                <div class="flex justify-end flex-col md:flex-row gap-4 w-full">
                    <div class="w-28 border rounded-md md:w-auto">
                        <x-input.floating
                            label="Start Date"
                            type="date"
{{--                            wire:model.live="start_date"--}}
                        />
                    </div>
                    <div class="w-28 border rounded-md md:w-auto">
                        <x-input.floating
                            label="End Date"
                            type="date"
{{--                            wire:model.live="start_date"--}}
                        />
                    </div>
{{--                    <div class="w-full md:w-auto">--}}
{{--                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>--}}
{{--                        <input--}}
{{--                            type="date"--}}
{{--                            id="end_date"--}}
{{--                            name="end_date"--}}
{{--                            class="mt-1 block w-full border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"--}}
{{--                        />--}}
{{--                    </div>--}}
                </div>
            </div>

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
        </div>
    </div>
</div>
</body>
</html>

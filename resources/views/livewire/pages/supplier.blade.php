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
                        <a href="{{route('profile.show')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Profile</a>
                    </div>
                    <div
                        class="mb-2 flex items-center hover:bg-indigo-700 p-0.5 hover:rounded-sm absolute -bottom-72 w-full">
                <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                           stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"><path
                            stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path
                            d="M16 19h6"/><path d="M19 16v6"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4"/></svg></span>
                        <a href="{{route('dash')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">{{auth()->user()->name}}</a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Top Navbar -->
            <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
                <h1 class="text-xl font-semibold">Supplier</h1>
                <input type="text" placeholder="Search..." class="p-2 border rounded-lg w-1/3">
            </div>

            <!-- Cards Section -->
            <div class="grid grid-cols-3 md-grid-cols-3 gap-4 mb-6">
                <div class="bg-white p-4 shadow rounded-lg flex items-center">
                    <div class="p-3 bg-indigo-100 text-indigo-600 rounded-full">📊</div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Total Transactions</p>
                        <p class="text-xl font-semibold">₹1,20,000</p>
                    </div>
                </div>
                <div class="bg-white p-4 shadow rounded-lg flex items-center">
                    <div class="p-3 bg-green-100 text-green-600 rounded-full">💰</div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Total Income</p>
                        <p class="text-xl font-semibold">₹75,000</p>
                    </div>
                </div>
                <div class="bg-white p-4 shadow rounded-lg flex items-center">
                    <div class="p-3 bg-red-100 text-red-600 rounded-full">📉</div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Total Expenses</p>
                        <p class="text-xl font-semibold">₹45,000</p>
                    </div>
                </div>
            </div>

            <!-- Transactions Table -->
            <div class="bg-white p-4 shadow rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Recent Transactions</h2>
                <table class="w-full border-collapse">
                    <thead>
                    <tr class="bg-indigo-500 text-white">
                        <th class="p-2">#</th>
                        <th class="p-2">Party Name</th>
                        <th class="p-2">Type</th>
                        <th class="p-2">Amount</th>
                        <th class="p-2">Date</th>
                        <th class="p-2">Actions</th>
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
                            <a href="{{route('customer.page')}}" class="bg-indigo-500 text-white px-3 py-1 rounded-md">View</a>
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-2">2</td>
                        <td class="p-2">Jane Smith</td>
                        <td class="p-2">Supplier</td>
                        <td class="p-2 text-red-500">₹5,000</td>
                        <td class="p-2">2025-02-26</td>
                        <td class="p-2">
                            <a href="{{route('supplier.page')}}" class="bg-indigo-500 text-white px-3 py-1 rounded-md">View</a>
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

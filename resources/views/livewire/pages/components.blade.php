<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 ">
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
                        <a href="#" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Dashboard</a>
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
                        <a href="#" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Customers</a>
                    </div>
                    <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-user-check"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4"/><path
                                d="M15 19l2 2l4 -4"/></svg></span>
                        <a href="#" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Suppliers</a>
                    </div>
                    <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-devices"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M13 9a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1v-10z"/><path
                                d="M18 8v-3a1 1 0 0 0 -1 -1h-13a1 1 0 0 0 -1 1v12a1 1 0 0 0 1 1h9"/><path d="M16 9h2"/></svg></span>
                        <a href="#" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Transactions</a>
                    </div>
                    <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"/><path
                                d="M9 12h12l-3 -3"/><path d="M18 15l3 -3"/></svg></span>
                        <a href="#" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Logout</a>
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
                        <a href="#" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Profile</a>
                    </div>
                    <div
                        class="mb-2 flex items-center hover:bg-indigo-700 p-0.5 hover:rounded-sm absolute -bottom-72 w-full">
                <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                           fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                           stroke-linejoin="round"
                                           class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"><path
                            stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/><path
                            d="M16 19h6"/><path d="M19 16v6"/><path d="M6 21v-2a4 4 0 0 1 4 -4h4"/></svg></span>
                        <a href="#" class="ml-2 block p-2 rounded" x-show="sidebarOpen">User Name</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="flex-1 p-6 flex flex-col h-screen overflow-y-auto">
            <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                {{--            <input type="text" placeholder="Search..." class="p-2 border rounded-lg w-1/3">--}}
                <div class="relative w-2/4">
                    <input type="text" placeholder="Search Transactions..."
                           class="p-2 pl-10 border rounded-lg w-full focus:ring-indigo-500 focus:border-indigo-500 transition-transform duration-300 ease-in-out transform hover:scale-105">
                    <span class="absolute left-3 top-2 text-indigo-500">🔍</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mb-6 flex gap-2">
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    ➕ Add
                </button>
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-red-500 to-pink-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    ❌ Delete
                </button>
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-gray-500 to-gray-700 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    ⬅️ Back
                </button>
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-green-500 to-teal-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    📄 Excel
                </button>
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-orange-500 to-yellow-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    📑 PDF
                </button>
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 to-pink-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    🖨️ Print
                </button>
            </div>

            <!-- Date Filters with Dropdown -->
            <div class="bg-white p-4 shadow rounded-lg mb-6 flex gap-4 items-center" x-data="{}">
                <label class="text-gray-700 font-semibold">Date Range:</label>
                <select x-model="dateFilter"
                        class="p-2 border rounded-lg bg-indigo-200 text-indigo-800 focus:ring focus:ring-indigo-500 transition-all ease-in-out duration-300 transform hover:scale-105">
                    <option value="Custom Range" class="bg-indigo-300 text-indigo-900">📅 Custom Range</option>
                    <option value="Today" class="bg-green-300 text-green-900">🌞 Today</option>
                    <option value="Yesterday" class="bg-yellow-300 text-yellow-900">🌙 Yesterday</option>
                    <option value="Last 15 days" class="bg-blue-300 text-blue-900">📆 Last 15 days</option>
                    <option value="Last 30 days" class="bg-purple-300 text-purple-900">📆 Last 30 days</option>
                    <option value="Last 60 days" class="bg-pink-300 text-pink-900">📆 Last 60 days</option>
                    <option value="Last 90 days" class="bg-red-300 text-red-900">📆 Last 90 days</option>
                    <option value="Custom Date" class="bg-gray-300 text-gray-900">🛠 Custom Date</option>
                </select>
            </div>
            <!-- Date Filters with Dropdown -->

            <!-- Custom Date Filter -->
            <div class="bg-white p-4 shadow rounded-lg mb-6 flex gap-4 items-center"
                 x-show="dateFilter === 'Custom Date'">
                <label class="text-gray-700 font-semibold">Start Date:</label>
                <input type="date" x-model="startDate"
                       class="p-2 border rounded-lg focus:ring focus:ring-indigo-300 transition-all">
                <label class="text-gray-700 font-semibold">End Date:</label>
                <input type="date" x-model="endDate"
                       class="p-2 border rounded-lg focus:ring focus:ring-indigo-300 transition-all">
                <button @click="console.log(startDate, endDate)"
                        class="px-4 py-2 bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-lg shadow-md hover:scale-105 transition-transform">
                    🔍 Filter
                </button>
            </div>
            <!-- Custom Date Filter -->

            <!-- Date Filter -->

            <div class="bg-white p-4 shadow rounded-lg mb-6 flex gap-4 items-center">
                <label class="text-gray-700 font-semibold">Start Date:</label>
                <input type="date" x-model="startDate"
                       class="p-2 border rounded-lg focus:ring focus:ring-indigo-300 transition-all">
                <label class="text-gray-700 font-semibold">End Date:</label>
                <input type="date" x-model="endDate"
                       class="p-2 border rounded-lg focus:ring focus:ring-indigo-300 transition-all">
                <button @click="console.log(startDate, endDate)"
                        class="px-4 py-2 bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-lg shadow-md hover:scale-105 transition-transform">
                    🔍 Filter
                </button>
            </div>

            <!-- Badges -->
            <div class="mb-6 flex gap-2">
            <span
                class="px-4 py-1 rounded-full bg-gradient-to-r from-green-400 to-green-600 text-white">✔ Success</span>
                <span class="px-4 py-1 rounded-full bg-gradient-to-r from-red-400 to-red-600 text-white">⚠ Danger</span>
                <span class="px-4 py-1 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 text-white">ℹ Info</span>
                <span
                    class="px-4 py-1 rounded-full bg-gradient-to-r from-yellow-400 to-yellow-600 text-white">⚠ Warning</span>
                <span
                    class="px-4 py-1 rounded-full bg-gradient-to-r from-gray-400 to-gray-600 text-white">🔘 Light</span>
                <span class="px-4 py-1 rounded-full bg-gradient-to-r from-black to-gray-800 text-white">🌙 Dark</span>
            </div>

            <!-- Transactions Table -->
            <div class="bg-white p-4 shadow rounded-lg flex-1">
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
                            <button class="bg-indigo-500 text-white px-3 py-1 rounded-md">View</button>
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-2">2</td>
                        <td class="p-2">Jane Smith</td>
                        <td class="p-2">Supplier</td>
                        <td class="p-2 text-red-500">₹5,000</td>
                        <td class="p-2">2025-02-26</td>
                        <td class="p-2">
                            <button class="bg-indigo-500 text-white px-3 py-1 rounded-md">View</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer inside main content -->
            <footer class="bg-indigo-900 text-white p-4 flex justify-between items-center mt-6 shadow">
                <div class="flex gap-4">
                    <span>Total Balance: ₹50,000</span>
                    <span class="text-green-400">Total Credit: ₹30,000</span>
                    <span class="text-red-400">Total Debit: ₹20,000</span>
                </div>
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    ➕ Add
                </button>
            </footer>
        </div>

        <!-- Footer -->
    </div>
</div>
<!-- Footer -->
</body>

</html>


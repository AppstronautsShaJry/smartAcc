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
<div class="flex h-screen" x-data="{ sidebarOpen: true }">
    <!-- Sidebar -->
    <div :class="sidebarOpen ? 'w-64' : 'w-16'" class="bg-indigo-900 text-white transition-all duration-300 p-4 flex flex-col">
        <button @click="sidebarOpen = !sidebarOpen" class="mb-4 focus:outline-none">
            ☰
        </button>
        <nav>
            <ul>
                <li class="mb-2 flex items-center">
                    <span class="text-lg">📊</span>
                    <a href="{{route('dash')}}" class="ml-2 block p-2 hover:bg-indigo-700 rounded" x-show="sidebarOpen">Dashboard</a>
                </li>
                <li class="mb-2 flex items-center">
                    <span class="text-lg">👤</span>
                    <a href="{{route('customer.page')}}" class="ml-2 block p-2 hover:bg-indigo-700 rounded" x-show="sidebarOpen">Customers</a>
                </li>
                <li class="mb-2 flex items-center">
                    <span class="text-lg">🏢</span>
                    <a href="{{route('supplier.page')}}" class="ml-2 block p-2 hover:bg-indigo-700 rounded" x-show="sidebarOpen">Suppliers</a>
                </li>
                <li class="mb-2 flex items-center">
                    <span class="text-lg">💰</span>
                    <a href="{{route('transaction.page')}}" class="ml-2 block p-2 hover:bg-indigo-700 rounded" x-show="sidebarOpen">Transactions</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <!-- Top Navbar -->
        <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold">Customer</h1>
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
</body>
</html>

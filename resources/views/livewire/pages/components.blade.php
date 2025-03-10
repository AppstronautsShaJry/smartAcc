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
                    <span class="absolute left-3 top-2 text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path
                                stroke="none"
                                d="M0 0h24v24H0z"
                                fill="none"/><path
                                d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/><path
                                d="M21 21l-6 -6"/></svg></span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mb-6 flex gap-2 text-lg">
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none"
                                                                                                  d="M0 0h24v24H0z"
                                                                                                  fill="none"/><path
                                d="M12 5l0 14"/><path d="M5 12l14 0"/>
                        </svg>
                    </span>
                    <span class="text-lg font-semibold">Add</span>
                </button>
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-emerald-500 to-lime-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy"><path stroke="none"
                                                                                                           d="M0 0h24v24H0z"
                                                                                                           fill="none"/><path
                                d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"/><path
                                d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/><path d="M14 4l0 4l-6 0l0 -4"/></svg>

                    </span>
                    <span class="font-semibold">Save</span>
                </button>

                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-red-500 to-pink-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                               class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none"
                                                                                                 d="M0 0h24v24H0z"
                                                                                                 fill="none"/><path
                                d="M18 6l-12 12"/><path d="M6 6l12 12"/></svg></span>
                    <span class="text-lg font-semibold">Delete</span>
                </button>

                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-gray-500 to-gray-700 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                               class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left-dashed"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12h6m3 0h1.5m3 0h.5"/><path
                                d="M5 12l4 4"/><path d="M5 12l4 -4"/></svg></span>
                    <span class="font-semibold ">Back</span>
                </button>

                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-gray-500 to-slate-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    <span>
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                            class="icon icon-tabler icons-tabler-filled icon-tabler-copy-x"><path stroke="none" d="M0 0h24v24H0z"
                                                                                                  fill="none"/><path
                               d="M18.333 6a3.667 3.667 0 0 1 3.667 3.667v8.666a3.667 3.667 0 0 1 -3.667 3.667h-8.666a3.667 3.667 0 0 1 -3.667 -3.667v-8.666a3.667 3.667 0 0 1 3.667 -3.667zm-3.333 -4c1.094 0 1.828 .533 2.374 1.514a1 1 0 1 1 -1.748 .972c-.221 -.398 -.342 -.486 -.626 -.486h-10c-.548 0 -1 .452 -1 1v9.998c0 .32 .154 .618 .407 .805l.1 .065a1 1 0 1 1 -.99 1.738a3 3 0 0 1 -1.517 -2.606v-10c0 -1.652 1.348 -3 3 -3zm.8 8.786l-1.837 1.799l-1.749 -1.785a1 1 0 0 0 -1.319 -.096l-.095 .082a1 1 0 0 0 -.014 1.414l1.749 1.785l-1.835 1.8a1 1 0 0 0 -.096 1.32l.082 .095a1 1 0 0 0 1.414 .014l1.836 -1.8l1.75 1.786a1 1 0 0 0 1.319 .096l.095 -.082a1 1 0 0 0 .014 -1.414l-1.75 -1.786l1.836 -1.8a1 1 0 0 0 .096 -1.319l-.082 -.095a1 1 0 0 0 -1.414 -.014"/></svg>

                    </span>
                    <span class="font-semibold">Cancel</span>
                </button>

                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-green-500 to-teal-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                               class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path
                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/><path
                                d="M8 11h8v7h-8z"/><path d="M8 15h8"/><path d="M11 11v7"/></svg></span>
                    <span class="font-semibold">Excel</span>
                </button>
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-orange-500 to-yellow-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                   <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-pdf">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                        <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"/>
                        <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6"/>
                        <path d="M17 18h2"/>
                        <path d="M20 15h-3v6"/>
                        <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z"/>
                    </svg>
                       </span>
                    <span class="font-semibold">PDF</span>
                </button>
                <button
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 to-pink-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                               class="icon icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none"
                                                                                                       d="M0 0h24v24H0z"
                                                                                                       fill="none"/><path
                                d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"/><path
                                d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"/><path
                                d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z"/></svg>
                    </span>️
                    <span class="font-semibold">Print</span>
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
                        class="px-4 py-1 bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-lg shadow-md hover:scale-105 transition-transform">
                    <span class="inline-flex gap-2 p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none"
                                                                                                    d="M0 0h24v24H0z"
                                                                                                    fill="none"/><path
                                d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/><path
                                d="M21 21l-6 -6"/></svg>
                        <span>Filter</span></span>
                </button>
            </div>

            <!-- Badges -->
            <div class="mb-6 flex gap-2">

                <div
                    class="px-2 p-0.5 py-1 gap-1 rounded-full inline-flex items-center justify-center bg-gradient-to-r from-green-400/70 to-green-600 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-progress-check size-4">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969"/>
                        <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554"/>
                        <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592"/>
                        <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305"/>
                        <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356"/>
                        <path d="M9 12l2 2l4 -4"/>
                    </svg>
                    <span class="text-xs font-semibold tracking-wider">Success</span>
                </div>

                <div
                    class="px-2 p-0.5 py-1 gap-1 rounded-full inline-flex items-center justify-center bg-gradient-to-r from-red-400/70 to-red-600 text-white">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="size-4 icon icon-tabler icons-tabler-outline icon-tabler-alert-triangle"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v4"/><path
                                d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"/><path
                                d="M12 16h.01"/></svg>
                    </span>

                    <span class="text-xs tracking-wider font-semibold"> Danger</span>
                </div>

                <div
                    class="px-2 p-0.5 py-1 gap-1 rounded-full inline-flex items-center justify-center bg-gradient-to-r from-blue-400/70 to-blue-600 text-white">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="size-4 icon icon-tabler icons-tabler-outline icon-tabler-info-circle"><path
                                stroke="none"
                                d="M0 0h24v24H0z"
                                fill="none"/><path
                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/><path d="M12 9h.01"/><path d="M11 12h1v4h1"/></svg>
                    </span>
                    <span class="text-xs tracking-wider font-semibold">Info </span>
                </div>

                <div
                    class="px-2 p-0.5 py-1 gap-1 rounded-full inline-flex items-center justify-center bg-gradient-to-r from-yellow-400/70 to-yellow-600 text-white">
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                               class="size-4 icon icon-tabler icons-tabler-outline icon-tabler-alert-circle"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/><path d="M12 8v4"/><path
                                d="M12 16h.01"/></svg>
                    </span>
                    <span class="text-xs tracking-wider font-semibold">Warning</span>
                </div>

                <div
                    class="px-2 p-0.5 py-1 gap-1 rounded-full inline-flex items-center justify-center bg-gradient-to-r from-gray-400/70 to-gray-600 text-white"><span><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="size-4 icon icon-tabler icons-tabler-outline icon-tabler-brightness-up"><path
                                stroke="none"
                                d="M0 0h24v24H0z"
                                fill="none"/><path
                                d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/><path d="M12 5l0 -2"/><path
                                d="M17 7l1.4 -1.4"/><path d="M19 12l2 0"/><path d="M17 17l1.4 1.4"/><path
                                d="M12 19l0 2"/><path d="M7 17l-1.4 1.4"/><path d="M6 12l-2 0"/><path
                                d="M7 7l-1.4 -1.4"/></svg></span>
                    <span class="text-xs tracking-wider font-semibold">Light </span>
                </div>
                <span
                    class="px-2 p-0.5 py-1 gap-1 rounded-full inline-flex items-center justify-center bg-gradient-to-r from-black/70 to-gray-800 text-white">
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                               class="size-4 icon icon-tabler icons-tabler-outline icon-tabler-moon"><path stroke="none"
                                                                                                           d="M0 0h24v24H0z"
                                                                                                           fill="none"/><path
                                d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"/></svg></span>
                    <span class="text-xs tracking-wider font-semibold">Dark</span></span>
            </div>

            <!-- Transactions Table -->
            <div class="bg-white p-4 shadow rounded-lg flex-1">
                <h2 class="text-lg font-semibold mb-4">Recent Transactions</h2>
                <table class="w-full border-collapse">
                    <thead>
                    <tr class="bg-indigo-500 text-white">
                        <th class="p-2">#</th>
                        <th class="p-2 text-left">Party Name</th>
                        <th class="p-2 text-left">Type</th>
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
                    <span>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none"
                                                                                                   d="M0 0h24v24H0z"
                                                                                                   fill="none"/><path
                                 d="M12 5l0 14"/><path d="M5 12l14 0"/>
                        </svg>
                        </span> Add
                </button>
            </footer>
            <!-- Toast Notifications -->
            <div class="fixed bottom-4 right-4 space-y-2" x-data="{ notifications: [] }">
                <template x-for="(notification, index) in notifications" :key="index">
                    <div x-show="notification.show" x-transition.opacity.duration.500ms
                         class="p-4 rounded-lg shadow-md text-white" :class="notification.type">
                        <div class="flex justify-between items-center">
                            <span x-text="notification.message"></span>
                            <button @click="notification.show = false">✖</button>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        <!-- Footer -->
    </div>
</div>


</body>
<script>
    function notify(message, type) {
        document.querySelector('[x-data]').__x.$data.notifications.push({
            message,
            type: `bg-gradient-to-r ${type}`,
            show: true
        });
        setTimeout(() => {
            document.querySelector('[x-data]').__x.$data.notifications.shift();
        }, 1000);
    }
</script>
</html>


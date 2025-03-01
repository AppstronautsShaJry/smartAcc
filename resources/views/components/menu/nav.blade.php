@props([
    'title' => '',
    'filter' => 'hidden',
])
<!-- Top Navbar -->
<div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold">{{$title}}</h1>

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
                        <span class="rounded-md border flex justify-center items-center px-3 py-1 gap-1 cursor-pointer {{$filter}}"
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



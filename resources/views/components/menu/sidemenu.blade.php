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

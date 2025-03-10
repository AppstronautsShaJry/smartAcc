<div :class="sidebarOpen ? 'w-64' : 'w-16'"
     class="bg-indigo-900 text-white transition-all duration-300 p-4 flex flex-col h-screen overflow-y-auto">
    <button @click="sidebarOpen = !sidebarOpen"
            class="mb-4 flex items-center focus:outline-none bg-gradient-to-br from-indigo-500 to-fuchsia-500 rounded-sm p-2">
        <span class="">☰</span>
        <span class="ml-6 text-md font-bold font-mono tracking-wider" x-show="sidebarOpen">Tabbassam I Mart</span>
    </button>
    <nav class="relative font-mono tracking-wide">
        <div>
            <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                <a href="{{route('dashboard')}}" class="text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-home text-gray-200">
                        <path
                            stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0"/>
                        <path
                            d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/>
                        <path
                            d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/>
                    </svg>
                </a>
                <a href="{{route('dashboard')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Dashboard</a>
            </div>

            <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                <a href="{{route('customer.page')}}" class="text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                        <path
                            stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path
                            d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
                        <path
                            d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/>
                        <path
                            d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"/>
                    </svg>
                </a>
                <a href="{{route('customer.page')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Customers</a>
            </div>

            <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                <a href="{{route('supplier.page')}}" class="text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-user-check">
                        <path
                            stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path
                            d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"/>
                        <path
                            d="M15 19l2 2l4 -4"/>
                    </svg>
                </a>
                <a href="{{route('supplier.page')}}" class="ml-2 block p-2 rounded" x-show="sidebarOpen">Suppliers</a>
            </div>

            <div class="mb-2 flex items-center hover:bg-indigo-700 p-1 hover:rounded-sm ">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"/><path
                                d="M9 12h12l-3 -3"/><path d="M18 15l3 -3"/></svg></span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       class="ml-2 block p-2 rounded" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                       x-show="sidebarOpen">Logout</a>
                </form>
            </div>

            <div
                class="mb-2 flex items-center hover:bg-indigo-700 p-0.5 hover:rounded-sm w-full absolute -bottom-52">
                    <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"/><path
                                d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/></svg></span>
                <a href="{{route('profile.show')}}"
                   class="ml-2 block p-2 rounded font-mono tracking-wider font-semibold"
                   x-show="sidebarOpen">Profile</a>
            </div>

            <div
                class="mb-2 flex items-center hover:bg-indigo-700 p-0.5 hover:rounded-sm absolute -bottom-64 w-full">
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
                <a href="{{ route('dash') }}"
                   class="ml-1 block p-2 rounded text-yellow-200 font-mono tracking-wider font-semibold"
                   x-show="sidebarOpen">
                    {{ auth()->user()->name }}
                </a>
            </div>

            <div
                class="mb-2 flex items-center hover:bg-indigo-700 p-0.5 hover:rounded-sm w-full absolute -bottom-[300px]">
                @if(Auth::user() && Auth::user()->name == 'Admin')
                    @if (Route::has('register'))
                        <span class="flex justify-center items-center text-lg w-7 h-7 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user-plus w-5 h-5 "><path
                                    d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7"
                                                                                                 r="4"></circle><line
                                    x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        </span>
                        <a href="{{route('register-users')}}"
                           class="ml-1 block p-2 rounded font-mono tracking-wider font-semibold"
                           x-show="sidebarOpen">{{ __('Register User') }}</a>
                    @endif
                @endif
            </div>

            {{--            <div--}}
            {{--                class="mb-2 flex items-center hover:bg-indigo-700 p-0.5 hover:rounded-sm absolute -bottom-[300px] w-full">--}}
            {{--                @if(Auth::user() && Auth::user()->name == 'Admin')--}}
            {{--                    @if (Route::has('register'))--}}
            {{--                        <a href="{{ route('register-users') }}">--}}
            {{--                                <span class="inline-flex justify-center items-center ml-4 text-green-400">--}}
            {{--                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"--}}
            {{--                                         class="size-6">--}}
            {{--                      <path--}}
            {{--                          d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z"/>--}}
            {{--                    </svg>--}}
            {{--                                </span>--}}
            {{--                            <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">--}}
            {{--                {{ __('Register User') }}--}}
            {{--            </span>--}}
            {{--                        </a>--}}
            {{--                    @endif--}}
            {{--                @endif--}}
            {{--            </div>--}}

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

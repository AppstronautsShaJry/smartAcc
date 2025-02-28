<button {{$attributes}}
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
    <span class="text-lg font-semibold">{{$slot}}</span>
</button>

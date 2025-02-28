<button {{$attributes}}
    class="px-4 py-2 rounded-lg bg-gradient-to-r from-gray-500 to-gray-700 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                               class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left-dashed"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12h6m3 0h1.5m3 0h.5"/><path
                                d="M5 12l4 4"/><path d="M5 12l4 -4"/></svg></span>
    <span class="font-semibold ">{{$slot}}</span>
</button>

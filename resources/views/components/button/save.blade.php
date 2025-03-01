<button {{$attributes}}
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
    <span class="font-semibold">{{$slot}}</span>
</button>

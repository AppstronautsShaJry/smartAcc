<div {{$attributes}}
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
    <span class="text-xs tracking-wider font-semibold">{{$slot}}</span>
</div>

<div {{$attributes}}
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
    <span class="text-xs tracking-wider font-semibold">{{$slot}} </span>
</div>

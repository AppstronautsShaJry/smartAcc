<div {{$attributes}}
    class="px-2 p-0.5 py-1 gap-1 rounded-full inline-flex items-center justify-center bg-gradient-to-r from-black/70 to-gray-800 text-white">
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                               class="size-4 icon icon-tabler icons-tabler-outline icon-tabler-moon"><path stroke="none"
                                                                                                           d="M0 0h24v24H0z"
                                                                                                           fill="none"/><path
                                d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"/></svg></span>
    <span class="text-xs tracking-wider font-semibold">{{$slot}}</span></div>

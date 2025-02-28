<div {{$attributes}}
     class="px-2 p-0.5 py-1 gap-1 rounded-full inline-flex items-center justify-center bg-gradient-to-r from-red-400/70 to-red-600 text-white">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="size-4 icon icon-tabler icons-tabler-outline icon-tabler-alert-triangle"><path
                                    stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v4"/><path
                                    d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"/><path
                                    d="M12 16h.01"/></svg>
                    </span>
    <span class="text-xs tracking-wider font-semibold"> {{$slot}}</span>
</div>

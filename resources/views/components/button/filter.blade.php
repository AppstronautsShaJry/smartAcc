<button {{$attributes}}
        class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-md flex items-center gap-2 hover:scale-105 transition-transform">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             fill="currentColor" class="size-4 icon icon-tabler icons-tabler-filled icon-tabler-filters"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                d="M19.396 11.056a6 6 0 0 1 -5.647 10.506q .206 -.21 .396 -.44a8 8 0 0 0 1.789 -6.155a8.02 8.02 0 0 0 3.462 -3.911"/><path
                                d="M4.609 11.051a7.99 7.99 0 0 0 9.386 4.698a6 6 0 1 1 -9.534 -4.594z"/><path
                                d="M12 2a6 6 0 1 1 -6 6l.004 -.225a6 6 0 0 1 5.996 -5.775"/></svg>
                    </span>
    <span class="text-lg font-semibold">{{$slot}}</span>
</button>

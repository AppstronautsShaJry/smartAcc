<div x-show="sidebarOpen" x-transition.opacity.duration.600ms @click="sidebarOpen = false"
     class="fixed inset-0 bg-white z-20 "></div>
<nav x-cloak
     class="fixed inset-0 transform duration-500 z-30 w-80 bg-gray-300 text-white h-auto print:hidden"
     :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': sidebarOpen === false}">
    <div class="flex justify-between px-5 py-6">
        <a href="{{route('dashboard')}}" class="flex gap-3">
{{--            <x-assets.logo.cxlogo :icon="'dark'" class="h-10 w-auto block"/>--}}
            <span class="text-black font-bold text-xs sm:text-xl tracking-widest">Smart Account</span>
        </a>
        {{-- {{config('app.name')}} --}}
        <button
            class="focus:outline-none focus:bg-gray-100 hover:bg-gray-100  rounded-md group"
            @click="sidebarOpen = false"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-7 w-7 text-gray-500 group-hover:text-black"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
    </div>

    <div class=" bg-gray-100 text-white h-full overflow-y-scroll">
        <ul class="flex flex-col py-6"
            x-data="{selected:null}">

                <x-menu.sub.party/>

            <x-menu.sub.logout/>

        </ul>
    </div>
</nav>

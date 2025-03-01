<div class="bg-white p-4 shadow rounded-lg mt-4 w-full mb-4"
     x-show="showFilter" x-transition:enter="transform ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-[-10px]"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transform ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-[-10px]">

    <div class="flex justify-end flex-col md:flex-row gap-4 w-full">
        {{$slot}}
    </div>
</div>

@props(['routes','label'])

<li class="bg-gray-300 ">
    <a {{$attributes}}
       class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700
                                   text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-green-500 group">
        <x-icons.icon-fill iconfill="list-menu" class="w-4 h-auto block fill-gray-400 group-hover:fill-green-500"/>
        <span
            class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
            {{\Livewire\str($label)->ucfirst()}}
        </span>
    </a>
</li>

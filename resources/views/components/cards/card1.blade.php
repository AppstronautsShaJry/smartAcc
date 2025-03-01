@props([
    'label' => '',
    'title' => '',
    'value' => '',
    'bgColor' => 'bg-indigo-100',
    'icon' => '',
])

<div class="bg-white p-4 shadow rounded-lg flex items-center hover:shadow-md transform transition-all ease-in-out hover:scale-105">
    <div class="p-3 {{$bgColor}} text-indigo-600 rounded-full">{{$slot}}</div>
    <div class="ml-4">
        <p class="text-gray-500 text-sm font-asul tracking-wider font-semibold">{{$title}}</p>
        <p class="text-xl font-semibold font-lex inline-flex items-center gap-x-0.5"> {!! $icon ?? '' !!}{{$value}}</p>
    </div>
</div>

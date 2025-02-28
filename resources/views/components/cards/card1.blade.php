@props([
    'label' => '',
    'title' => '',
    'value' => ''
])

<div class="bg-white p-4 shadow rounded-lg flex items-center">
    <div class="p-3 bg-indigo-100 text-indigo-600 rounded-full">{{$slot}}</div>
    <div class="ml-4">
        <p class="text-gray-500 text-sm">{{$title}}</p>
        <p class="text-xl font-semibold">₹{{$value}}</p>
    </div>
</div>

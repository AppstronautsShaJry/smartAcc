@props([
    'caption'
])
<div class="flex items-center gap-x-3">
    <h2 class="text-lg font-medium text-gray-800 dark:text-white">{{$caption}}</h2>
    <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400 ">{{$slot}}<span>&nbsp;Records</span></span>
</div>

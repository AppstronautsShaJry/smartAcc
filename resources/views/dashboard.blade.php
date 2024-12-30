<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                <x-welcome />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="flex justify-evenly ">
    <x-partials.card1 party="Customer" :link="'customers.index'" :count="$customers->count()" />
    <x-partials.card1 party="Supplier" :link="'suppliers.index'" :count="$suppliers->count()" />
    </div>
    <!-- https://play.tailwindcss.com/eCfibrSI2X -->
</x-app-layout>

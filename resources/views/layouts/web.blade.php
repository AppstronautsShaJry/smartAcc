<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
    <div class="flex flex-col h-screen"
         x-data="{ sidebarOpen: true, dateFilter: 'Custom Range', startDate: '', endDate: '' }">
        <div class="flex flex-1">
            <!-- Sidebar -->
            <x-menu.sidemenu />

            <div class="h-screen overflow-y-auto flex-1 p-6" x-data="{ showFilter: false, startDate: '', endDate: '' }">
                <!-- Top Navbar -->
                {{$slot}}
            </div>
        </div>
    </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

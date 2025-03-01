<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
<body class="bg-gray-100">
<div class="flex flex-col h-screen"
     x-data="{ sidebarOpen: true, dateFilter: 'Custom Range', startDate: '', endDate: '' }">
    <div class="flex flex-1">
        <!-- Sidebar -->
        <x-menu.sidemenu />

        <div class="flex-1 p-6" x-data="{ showFilter: false, startDate: '', endDate: '' }">
            <!-- Top Navbar -->
            {{$slot}}
        </div>
    </div>
</div>
</body>
</html>

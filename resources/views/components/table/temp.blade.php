<div class="bg-white p-4 shadow rounded-lg">
    <h2 class="text-lg font-semibold mb-4 font-mono">{{ $title ?? 'Table' }}</h2>
    <table class="w-full border-collapse">
        <thead class="">
        <tr class="bg-indigo-500 text-white font-merri">
            {{ $head }}
        </tr>
        </thead>
        <tbody>
        {{ $slot }}
        </tbody>
    </table>
</div>

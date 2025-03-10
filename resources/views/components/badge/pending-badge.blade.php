{{--<style>--}}
{{--    @keyframes gradientMove {--}}
{{--        0% {--}}
{{--            background-position: 0% 50%;--}}
{{--        }--}}
{{--        100% {--}}
{{--            background-position: 100% 50%;--}}
{{--        }--}}
{{--    }--}}

{{--    .animated-badge {--}}
{{--        background-size: 200% 100%;--}}
{{--        /*background-image: linear-gradient(to right, #1565C0, #1E88E5, #42A5F5, #90CAF9);*/--}}
{{--        animation: gradientMove 3s infinite linear;--}}
{{--    }--}}

{{--    </style>--}}

@props(['status'])

@php
    $colors = [
        'New' => 'animation bg-gradient-to-r from-green-400/70 to-green-600 text-white',
        'Pending' => 'bg-gradient-to-r from-yellow-400/70 to-yellow-600 text-white',
        'Closed' => 'bg-gradient-to-r from-red-400/70 to-red-600 text-white',
    ];

    $badgeClass = $colors[$status] ?? 'bg-gray-500 text-white';
@endphp

<span class="px-3 py-1 rounded-lg font-semibold {{ $badgeClass }}">
    {{ $status }}
</span>


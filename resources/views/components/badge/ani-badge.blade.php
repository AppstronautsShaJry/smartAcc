<style>
    @keyframes gradientMove {
        0% {
            background-position: 0% 50%;
        }
        100% {
            background-position: 100% 50%;
        }
    }

    .animated-badge {
        background-size: 200% 100%;
        background-image: linear-gradient(to right, #ff7e5f, #feb47b, #86a8e7, #7f7fd5);
        animation: gradientMove 3s infinite linear;
    }
</style>

<span class="animated-badge text-white font-bold px-4 py-2 text-xs rounded-lg shadow-md">
        Badge
    </span>

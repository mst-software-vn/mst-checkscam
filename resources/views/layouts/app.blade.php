<!DOCTYPE html>
<html lang="vi">

<x-head />

<body class="antialiased min-h-screen flex flex-col transition-colors duration-300 dark:bg-dark_bg dark:text-gray-100">

    <x-header />

    <!-- Trang trí nền nhẹ -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none opacity-50">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-50 dark:bg-blue-900/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-red-50 dark:bg-red-900/10 rounded-full blur-3xl">
        </div>
    </div>

    <script>
        // Simple Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

    @yield('content')

    <x-footer />
</body>

</html>

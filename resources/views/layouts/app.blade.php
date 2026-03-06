<!DOCTYPE html>
<html lang="vi">

@include('layouts.partials.head')

<body class="antialiased min-h-screen flex flex-col transition-colors duration-300 dark:bg-dark_bg dark:text-gray-100">

    @include('layouts.partials.header')

    <script>
        // Simple Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

    @yield('content')

    @include('layouts.partials.footer')
</body>

</html>

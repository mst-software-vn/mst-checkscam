<!DOCTYPE html>
<html lang="vi">

@include('layouts.partials.head')

<body class="antialiased min-h-screen flex flex-col transition-colors duration-300 dark:bg-dark_bg dark:text-gray-100">

    <!-- Header -->
    <header class="bg-white dark:bg-dark_bg border-b border-gray-200 dark:border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2">
                    <img src="https://i.ibb.co/7xfz0v3K/black.png" alt="Logo Check Scam" class="h-10 md:h-12 w-auto"
                        id="logo_header" />
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-6 lg:space-x-8">
                    <a href="#" class="text-cs_red font-bold text-sm border-b-2 border-cs_red py-5">Trang Chủ</a>
                    <a href="#"
                        class="text-gray-600 dark:text-gray-400 hover:text-cs_red dark:hover:text-cs_red font-medium text-sm py-5 transition-colors">Tố
                        Cáo</a>
                    <a href="#"
                        class="text-gray-600 dark:text-gray-400 hover:text-cs_red dark:hover:text-cs_red font-medium text-sm py-5 transition-colors">Quỹ
                        Bảo
                        Hiểm</a>
                    <a href="#"
                        class="text-gray-600 dark:text-gray-400 hover:text-cs_red dark:hover:text-cs_red font-medium text-sm py-5 transition-colors">Chợ
                        Buôn
                        Bán</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-600 hover:text-black focus:outline-none p-2">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Drawer (Hidden by default) -->
        <div id="mobile-menu"
            class="hidden md:hidden bg-white dark:bg-dark_card border-t border-gray-100 dark:border-gray-800 shadow-xl animate-fade-in-down">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="#"
                    class="block px-4 py-3 text-sm font-bold text-cs_red bg-red-50 dark:bg-red-900/20 rounded-lg">Trang
                    Chủ</a>
                <a href="#"
                    class="block px-4 py-3 text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 rounded-lg">Tố
                    Cáo</a>
                <a href="#"
                    class="block px-4 py-3 text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 rounded-lg">Quỹ
                    Bảo Hiểm</a>
                <a href="#"
                    class="block px-4 py-3 text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 rounded-lg">Chợ
                    Buôn Bán</a>
            </div>
        </div>
    </header>

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

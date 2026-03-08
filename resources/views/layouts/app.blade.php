<!DOCTYPE html>
<html lang="vi">
    <x-head />

    <body
        class="dark:bg-dark_bg flex min-h-screen flex-col antialiased transition-colors duration-300 dark:text-gray-100"
    >
        <x-header />

        <!-- Trang trí nền nhẹ -->
        <div class="pointer-events-none absolute top-0 left-1/2 -z-1000 h-full w-full -translate-x-1/2 opacity-40">
            <div class="absolute top-1/4 left-1/4 h-64 w-64 rounded-full bg-blue-50 blur-3xl dark:bg-blue-900/10"></div>
            <div
                class="absolute right-1/4 bottom-1/4 h-96 w-96 rounded-full bg-red-50 blur-3xl dark:bg-red-900/10"
            ></div>
        </div>

        @yield("content")

        <x-footer />
    </body>
</html>

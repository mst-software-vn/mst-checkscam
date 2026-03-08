<!DOCTYPE html>
<html lang="vi">
    <x-head />

    <body
        class="dark:bg-dark_bg relative flex min-h-screen flex-col antialiased transition-colors duration-300 dark:text-gray-100"
    >
        <x-header />

        <!-- Nền kỹ thuật: Lưới Hexagon ẩn hiện -->
        <div
            class="absolute inset-0 -z-9999 opacity-[0.03] dark:opacity-[0.07]"
            style="
                background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l25.98 15v30L30 60 4.02 45v-30z' fill-rule='evenodd' stroke='%233399ff' stroke-width='1' fill='none'/%3E%3C/svg%3E&quot;);
                background-size: 60px 60px;
            "
        ></div>

        @yield("content")

        <x-footer />
        <x-notioncation />
    </body>
</html>

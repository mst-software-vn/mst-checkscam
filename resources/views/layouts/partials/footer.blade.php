<!-- Footer -->
<footer class="bg-gray-900 dark:bg-slate-950 border-t-4 border-cs_red text-gray-300 pt-10 pb-6 mt-10 text-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8 pb-8 border-b border-gray-800">
            <div class="col-span-1 sm:col-span-2">
                <div class="flex items-center gap-2 mb-4">
                    <img src="https://i.ibb.co/wFZsnJBR/white.png" alt="Footer Logo" class="w-auto h-14 md:h-18" />

                </div>
                <p class="text-gray-400 leading-relaxed max-w-sm text-xs md:text-sm">
                    Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam. Cung cấp thông tin tham khảo giúp bạn
                    an tâm hơn trước các giao dịch online.
                </p>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4 uppercase text-[10px] md:text-xs tracking-wider">Hệ Thống</h4>
                <ul class="space-y-2 text-gray-400 text-xs md:text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Quy trình duyệt phốt</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Danh sách quỹ bảo hiểm</a>
                    </li>
                    <li><a href="#" class="hover:text-white transition-colors">Bot Telegram thông minh</a>
                    </li>
                    <li><a href="#" class="hover:text-white transition-colors">Đăng ký đối tác</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4 uppercase text-[10px] md:text-xs tracking-wider">Hỗ Trợ</h4>
                <ul class="space-y-2 text-gray-400 text-xs md:text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Liên hệ Admin</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Điều khoản dịch vụ</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Chính sách bảo mật</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Giải quyết sai sót</a></li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center text-[10px] md:text-xs text-gray-500 gap-4">
            <p class="text-center md:text-left">&copy; {{ date('Y') }} Bản quyền thuộc về CheckScam. Nền tảng
                dữ liệu cộng đồng. | Phát triển bởi <a href="https://www.facebook.com/mstsoftware.vn/"
                    class="hover:text-white font-medium">MST
                    Software</a></p>
            <div class="flex gap-4">
                <a href="#" class="hover:text-white" aria-label="Facebook"><i
                        class="fa-brands fa-facebook text-lg"></i></a>
                <a href="#" class="hover:text-white" aria-label="Telegram"><i
                        class="fa-brands fa-telegram text-lg"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- Theme Toggle Floating Button -->
<div class="fixed bottom-6 right-6 z-100 group">
    <div id="theme-options"
        class="flex flex-col gap-3 mb-3 opacity-0 translate-y-10 pointer-events-none transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0 group-hover:pointer-events-auto">
        <button onclick="setTheme('light')"
            class="w-12 h-12 rounded-full bg-white shadow-lg flex items-center justify-center text-cs_orange border border-orange-100 hover:scale-110 active:scale-95 transition-all"
            title="Giao diện sáng">
            <i class="fa-solid fa-sun text-xl"></i>
        </button>
        <button onclick="setTheme('dark')"
            class="w-12 h-12 rounded-full bg-slate-800 shadow-lg flex items-center justify-center text-blue-400 border border-slate-700 hover:scale-110 active:scale-95 transition-all"
            title="Giao diện tối">
            <i class="fa-solid fa-moon text-xl"></i>
        </button>
    </div>
    <button
        class="w-14 h-14 rounded-full bg-cs_blue text-white shadow-2xl flex items-center justify-center hover:rotate-45 active:scale-90 transition-all border-4 border-white dark:border-slate-800 relative shadow-blue-500/20">
        <i class="fa-solid fa-palette text-xl"></i>
        <span
            class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full border-2 border-white animate-pulse"></span>
    </button>
</div>

<script>
    const logoHeader = document.getElementById("logo_header");

    function setTheme(theme) {
        const isDark = theme === 'dark';

        if (isDark) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }

        if (logoHeader) {
            logoHeader.src = isDark ?
                "https://i.ibb.co/wFZsnJBR/white.png" :
                "https://i.ibb.co/7xfz0v3K/black.png";
        }
    }

    // Initialize theme on page load
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        setTheme('dark');
    } else {
        setTheme('light');
    }
</script>
@yield('scripts')
@stack('scripts')

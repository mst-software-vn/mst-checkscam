<!-- Footer -->
<footer class="relative bg-[#0F172A] dark:bg-slate-950 text-gray-300 pt-16 pb-20 md:pb-12 mt-20 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-1 bg-linear-to-r from-cs_blue via-cs_blue to-cs_green"></div>
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-cs_blue/10 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-cs_blue/10 rounded-full blur-3xl opacity-50"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
            <!-- Brand Column -->
            <div class="md:col-span-5 space-y-6">
                <a href="/" class="inline-block transform hover:scale-105 transition-transform">
                    <img src="https://i.ibb.co/wFZsnJBR/white.png" alt="Footer Logo" class="h-16 w-auto" />
                </a>
                <p class="text-gray-400 leading-relaxed text-sm md:text-base max-w-md ">
                    Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam. Chúng tôi xây dựng một môi trường internet
                    an toàn hơn thông qua sức mạnh cộng đồng và dữ liệu minh bạch.
                </p>
                <div class="flex gap-4">
                    <a href="#"
                        class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-cs_blue hover:border-cs_blue transition-all group">
                        <i class="fa-brands fa-facebook text-lg group-hover:scale-110"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-blue-400 hover:border-blue-400 transition-all group">
                        <i class="fa-brands fa-telegram text-lg group-hover:scale-110"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-cs_red hover:border-cs_red transition-all group">
                        <i class="fa-brands fa-youtube text-lg group-hover:scale-110"></i>
                    </a>
                </div>
            </div>

            <!-- Links Column 1 -->
            <div class="md:col-span-2 space-y-6">
                <h4 class="text-white font-black uppercase text-xs tracking-widest border-l-4 border-cs_blue pl-3">Hệ
                    Thống</h4>
                <ul class="space-y-3">
                    <li><a href="#"
                            class="text-gray-400 hover:text-cs_blue transition-colors font-bold text-sm">Kiểm tra
                            Scam</a></li>
                    <li><a href="/bao-hiem-cs"
                            class="text-gray-400 hover:text-cs_blue transition-colors font-bold text-sm">Quỹ bảo
                            hiểm</a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-cs_blue transition-colors font-bold text-sm">API Check
                            Scam</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-cs_blue transition-colors font-bold text-sm">Đối tác uy
                            tín</a></li>
                </ul>
            </div>

            <!-- Links Column 2 -->
            <div class="md:col-span-2 space-y-6">
                <h4 class="text-white font-black uppercase text-xs tracking-widest border-l-4 border-cs_red pl-3">Trợ
                    Giúp
                </h4>
                <ul class="space-y-3">
                    <li><a href="#"
                            class="text-gray-400 hover:text-cs_red transition-colors font-bold text-sm">Hướng dẫn tố
                            cáo</a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-cs_red transition-colors font-bold text-sm">Liên hệ
                            Admin</a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-cs_red transition-colors font-bold text-sm">Điều
                            khoản</a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-cs_red transition-colors font-bold text-sm">Giải
                            quyết khiếu nại</a></li>
                </ul>
            </div>

            <!-- Newsletter/Status Column -->
            <div class="md:col-span-3 space-y-6">
                <h4 class="text-white font-black uppercase text-xs tracking-widest border-l-4 border-cs_green pl-3">
                    Bảo mật</h4>
                <div class="bg-white/5 border border-white/10 rounded-2xl p-5 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase">Trạng thái dữ liệu</span>
                        <span class="flex items-center gap-1.5 text-[10px] font-black text-cs_green uppercase">
                            <span class="w-2 h-2 bg-cs_green rounded-full animate-pulse"></span>
                            An toàn
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase">Cơ sở dữ liệu</span>
                        <span class="text-xs font-black text-white">45,820+ Scam</span>
                    </div>
                    <div class="pt-2">
                        <a href="/to-cao-lua-dao"
                            class="block w-full py-3 bg-cs_red hover:bg-red-600 text-white text-center rounded-xl text-xs font-black uppercase tracking-wider transition-all shadow-lg shadow-red-500/20 active:scale-95">
                            Gửi tố cáo ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-[11px] font-bold text-gray-500 tracking-wide uppercase">
            <p class="text-center md:text-left">
                &copy; {{ date('Y') }} <span class="text-white">CheckScam Global</span>. All Rights
                Reserved.
            </p>
            <p>
                Development by <a href="https://www.facebook.com/mstsoftware.vn"
                    class="text-cs_blue hover:underline">MST SOFTWARE</a>
            </p>
        </div>
    </div>
</footer>

<!-- Floating Actions (Desktop & Mobile) -->
<div class="fixed bottom-24 md:bottom-8 right-4 md:right-8 z-50 flex justify-center items-center flex-col gap-3">
    <!-- Back to top -->
    <button id="back-to-top"
        class="hidden w-11 h-11 md:w-12 md:h-12 rounded-2xl bg-white dark:bg-slate-800 shadow-2xl items-center justify-center text-gray-600 dark:text-gray-300 border border-gray-100 dark:border-slate-700 hover:-translate-y-2 active:scale-90 transition-all duration-300">
        <i class="fa-solid fa-arrow-up text-lg"></i>
    </button>

    <!-- Theme Switcher (Improved) -->
    <button id="theme-toggle"
        class="w-11 h-11 md:w-14 md:h-14 rounded-2xl bg-cs_blue text-white shadow-2xl flex items-center justify-center border-4 border-white dark:border-slate-800 group transition-all duration-500 hover:rotate-360">
        <i class="fa-solid fa-sun text-lg md:text-xl block dark:hidden"></i>
        <i class="fa-solid fa-moon text-lg md:text-xl hidden dark:block"></i>
    </button>
</div>

<!-- Mobile Bottom Navigation -->
<nav
    class="md:hidden fixed bottom-0 left-0 right-0 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-t border-gray-200 dark:border-gray-800 px-6 py-2 z-50 flex justify-between items-center pb-safe">
    <a href="/"
        class="flex flex-col items-center gap-1 {{ request()->is('/') ? 'text-cs_blue' : 'text-gray-400' }}">
        <i class="fa-solid fa-house-chimney text-lg"></i>
        <span class="text-[9px] font-black uppercase tracking-tighter">Trang chủ</span>
    </a>

    <a href="/bao-hiem-cs"
        class="flex flex-col items-center gap-1 {{ request()->is('bao-hiem-cs*') ? 'text-cs_blue' : 'text-gray-400' }}">
        <i class="fa-solid fa-shield text-lg"></i>
        <span class="text-[9px] font-black uppercase tracking-tighter">Bảo hiểm</span>
    </a>

    <!-- Center Action -->

    <div class="flex flex-col items-center">
        <a href="/to-cao-lua-dao"
            class="w-14 h-14 bg-cs_red text-white rounded-full flex items-center justify-center shadow-2xl shadow-red-500/40 border-4 border-white dark:border-slate-900 transform active:scale-90 transition-transform -mt-9 mb-1">
            <i class="fa-solid fa-plus text-xl"></i>
        </a>
        <span class="mt-2 text-[9px] font-black uppercase tracking-tighter">Tố cáo lừa đảo</span>
    </div>

    <a href="/bai-viet"
        class="flex flex-col items-center gap-1 {{ request()->is('bai-viet*') ? 'text-cs_blue' : 'text-gray-400' }}">
        <i class="fa-solid fa-newspaper text-lg"></i>
        <span class="text-[9px] font-black uppercase tracking-tighter">Kiến thức</span>
    </a>

    <button id="mobile-more-menu" class="flex flex-col items-center gap-1 text-gray-400">
        <i class="fa-solid fa-envelope text-lg"></i>
        <span class="text-[9px] font-black uppercase tracking-tighter">Liên hệ</span>
    </button>
</nav>

<script>
    $(document).ready(function() {
        const $logoHeader = $("#logo_header");
        const $backToTop = $("#back-to-top");

        // Theme Switch Management
        function setTheme(theme) {
            const isDark = (theme === 'dark');
            $('html').toggleClass('dark', isDark);
            localStorage.setItem('theme', theme);

            if ($logoHeader.length) {
                $logoHeader.attr('src', isDark ?
                    "https://i.ibb.co/wFZsnJBR/white.png" :
                    "https://i.ibb.co/7xfz0v3K/black.png"
                );
            }
        }

        $('#theme-toggle').on('click', function() {
            const newTheme = $('html').hasClass('dark') ? 'light' : 'dark';
            setTheme(newTheme);
        });

        // Initial theme setup
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            setTheme('dark');
        } else {
            setTheme('light');
        }

        // Scroll Management
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                $backToTop.removeClass('hidden').addClass('flex');
            } else {
                $backToTop.addClass('hidden').removeClass('flex');
            }
        });

        $backToTop.on('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
@yield('scripts')
@stack('scripts')

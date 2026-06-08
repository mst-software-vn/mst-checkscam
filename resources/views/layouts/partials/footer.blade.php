<!-- Footer -->
<footer class="relative mt-20 overflow-hidden bg-[#0F172A] pt-16 pb-20 text-gray-300 md:pb-12 dark:bg-slate-950">
  <!-- Decorative Elements -->
  <div class="bg-cs_blue absolute top-0 left-0 h-1 w-full"></div>
  <div class="bg-cs_blue/10 absolute -top-24 -left-24 h-96 w-96 rounded-full opacity-50 blur-3xl"></div>
  <div class="bg-cs_blue/10 absolute -right-24 -bottom-24 h-96 w-96 rounded-full opacity-50 blur-3xl"></div>

  <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-16 grid grid-cols-1 gap-12 md:grid-cols-12">
      <!-- Brand Column -->
      <div class="space-y-6 md:col-span-4">
        <a href="/" class="inline-block transform transition-transform hover:scale-105">
          @php
            $logoFooterLight = ! empty($siteConfig['logo_footer_light']) ? asset('uploads/' . $siteConfig['logo_footer_light']) : 'https://i.ibb.co/wFZsnJBR/white.png';
            $logoFooterDark = ! empty($siteConfig['logo_footer_dark']) ? asset('uploads/' . $siteConfig['logo_footer_dark']) : 'https://i.ibb.co/wFZsnJBR/white.png';
          @endphp

          <img
            src="{{ $logoFooterDark }}"
            alt="Footer Logo"
            class="h-16 w-auto"
            id="logo_footer"
            data-light="{{ $logoFooterLight }}"
            data-dark="{{ $logoFooterDark }}"
          />
        </a>
        <p class="max-w-md text-sm leading-relaxed text-gray-400 md:text-base">
          {{ $siteConfig['description'] ?? 'Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam.' }}
        </p>
        <div class="flex gap-4">
          <a
            href="{{ $siteConfig['facebook_link'] ?? '#' }}"
            target="_blank"
            class="hover:bg-cs_blue hover:border-cs_blue group flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 transition-all"
          >
            <i class="fa-brands fa-facebook text-lg group-hover:scale-110"></i>
          </a>
          <a
            href="{{ $siteConfig['telegram_link'] ?? '#' }}"
            target="_blank"
            class="group flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 transition-all hover:border-blue-400 hover:bg-blue-400"
          >
            <i class="fa-brands fa-telegram text-lg group-hover:scale-110"></i>
          </a>
          <a
            href="{{ $siteConfig['zalo_link'] ?? '#' }}"
            target="_blank"
            class="hover:bg-cs_blue hover:border-cs_blue group flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 transition-all"
          >
            <span class="text-sm font-black group-hover:scale-110">ZL</span>
          </a>
        </div>
      </div>

      <!-- Links Column 1 -->
      <div class="space-y-6 md:col-span-2">
        <h4 class="border-cs_blue border-l-4 pl-3 text-xs font-black tracking-widest text-white uppercase">Hệ Thống</h4>
        <ul class="space-y-3">
          <li>
            <a href="/" class="hover:text-cs_blue text-sm font-bold text-gray-400 transition-colors">Kiểm tra Scam</a>
          </li>
          <li>
            <a href="/bao-hiem-cs" class="hover:text-cs_blue text-sm font-bold text-gray-400 transition-colors">
              Quỹ bảo hiểm
            </a>
          </li>
          <li>
            <a href="/api-checkscam" class="hover:text-cs_blue text-sm font-bold text-gray-400 transition-colors">
              Hệ thống Public API
            </a>
          </li>
          <li>
            <a href="/doi-tac-uy-tin" class="hover:text-cs_blue text-sm font-bold text-gray-400 transition-colors">
              Đối tác uy tín
            </a>
          </li>
        </ul>
      </div>

      <!-- Links Column 2 -->
      <div class="space-y-6 md:col-span-2">
        <h4 class="border-cs_red border-l-4 pl-3 text-xs font-black tracking-widest text-white uppercase">Trợ Giúp</h4>
        <ul class="space-y-3">
          <li>
            <a href="/huong-dan-to-cao" class="hover:text-cs_red text-sm font-bold text-gray-400 transition-colors">
              Hướng dẫn tố cáo
            </a>
          </li>
          <li>
            <a
              href="{{ $siteConfig['zalo_link'] ?? '#' }}"
              target="_blank"
              class="hover:text-cs_red text-sm font-bold text-gray-400 transition-colors"
            >
              Liên hệ Admin
            </a>
          </li>
          <li>
            <a href="/dieu-khoan" class="hover:text-cs_red text-sm font-bold text-gray-400 transition-colors">
              Điều khoản
            </a>
          </li>
          <li>
            <a href="/giai-quyet-khieu-nai" class="hover:text-cs_red text-sm font-bold text-gray-400 transition-colors">
              Giải quyết khiếu nại
            </a>
          </li>
        </ul>
      </div>

      <!-- Contact + Status Column -->
      <div class="space-y-6 md:col-span-4">
        <h4 class="border-cs_green border-l-4 pl-3 text-xs font-black tracking-widest text-white uppercase">
          Liên hệ & Bảo mật
        </h4>

        <!-- Contact Info -->
        <div class="space-y-3">
          @if (! empty($siteConfig['hotline']))
            <a
              href="tel:{{ $siteConfig['hotline'] }}"
              class="flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-white"
            >
              <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white/5">
                <i class="fa-solid fa-phone text-xs text-green-400"></i>
              </div>
              <span class="font-bold">{{ $siteConfig['hotline'] }}</span>
            </a>
          @endif

          @if (! empty($siteConfig['support_email']))
            <a
              href="mailto:{{ $siteConfig['support_email'] }}"
              class="flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-white"
            >
              <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white/5">
                <i class="fa-solid fa-envelope text-xs text-blue-400"></i>
              </div>
              <span class="font-bold">{{ $siteConfig['support_email'] }}</span>
            </a>
          @endif

          @if (! empty($siteConfig['zalo_link']))
            <a
              href="{{ $siteConfig['zalo_link'] }}"
              target="_blank"
              class="flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-white"
            >
              <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white/5">
                <span class="text-[10px] font-black text-blue-300">ZL</span>
              </div>
              <span class="font-bold">Zalo hỗ trợ</span>
            </a>
          @endif
        </div>

        <!-- Status Card -->
        <div class="space-y-4 rounded-2xl border border-white/10 bg-white/5 p-5">
          <div class="flex items-center justify-between">
            <span class="text-xs font-bold text-gray-400 uppercase">Trạng thái dữ liệu</span>
            <span class="text-cs_green flex items-center gap-1.5 text-[10px] font-black uppercase">
              <span class="bg-cs_green h-2 w-2 animate-pulse rounded-full"></span>
              An toàn
            </span>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-xs font-bold text-gray-400 uppercase">Cơ sở dữ liệu</span>
            <span class="text-xs font-black text-white">45,820+ Scam</span>
          </div>
          <div class="pt-2">
            <a
              href="/to-cao-lua-dao"
              class="bg-cs_red block w-full rounded-xl py-3 text-center text-xs font-black tracking-wider text-white uppercase shadow-lg shadow-red-500/20 transition-all hover:bg-red-600 active:scale-95"
            >
              Gửi tố cáo ngay
            </a>
          </div>
        </div>
      </div>
    </div>

    <div
      class="flex flex-col items-center justify-between gap-6 border-t border-white/5 pt-10 text-[11px] font-bold tracking-wide text-gray-500 uppercase md:flex-row"
    >
      <p class="text-center md:text-left">
        &copy; {{ date('Y') }}
        <span class="text-white">{{ $siteConfig['title'] ?? 'Tra cứu lừa đảo' }}</span>
        . All Rights Reserved.
      </p>
      <p>
        Development by
        <a href="https://www.facebook.com/mstsoftware.vn" class="text-cs_blue hover:underline">MST SOFTWARE</a>
      </p>
    </div>
  </div>
</footer>

<!-- Floating Actions (Desktop & Mobile) -->
<div class="fixed right-4 bottom-24 z-50 flex flex-col items-center justify-center gap-3 md:right-8 md:bottom-8">
  <!-- Back to top -->
  <button
    id="back-to-top"
    class="hidden h-11 w-11 cursor-pointer items-center justify-center rounded-2xl border border-gray-100 bg-white text-gray-600 shadow-2xl transition-all duration-300 hover:-translate-y-2 active:scale-90 md:h-12 md:w-12 dark:border-slate-700 dark:bg-slate-800 dark:text-gray-300"
  >
    <i class="fa-solid fa-arrow-up text-lg"></i>
  </button>

  <!-- Theme Switcher (Improved) -->
  <button
    id="theme-toggle"
    class="bg-cs_blue group flex h-11 w-11 cursor-pointer items-center justify-center rounded-2xl border-2 border-slate-800 text-white shadow-2xl transition-all duration-500 hover:rotate-360 md:h-14 md:w-14 dark:border-white"
  >
    <i class="fa-solid fa-lightbulb hidden! text-lg md:text-xl dark:block!"></i>
    <i class="fa-regular fa-lightbulb text-lg md:text-xl dark:hidden!"></i>
  </button>
</div>

<!-- Mobile Bottom Navigation -->
<nav
  class="pb-safe fixed right-0 bottom-0 left-0 z-50 flex items-center justify-between border-t border-gray-200 bg-white/80 px-6 py-2 backdrop-blur-xl md:hidden dark:border-gray-800 dark:bg-slate-900/80"
>
  <a href="/" class="{{ request()->is('/') ? 'text-cs_blue' : 'text-gray-400' }} flex flex-col items-center gap-1">
    <i class="fa-solid fa-house-chimney text-lg"></i>
    <span class="text-[9px] font-black tracking-tighter uppercase">Trang chủ</span>
  </a>

  <a
    href="/bao-hiem-cs"
    class="{{ request()->is('bao-hiem-cs*') ? 'text-cs_blue' : 'text-gray-400' }} flex flex-col items-center gap-1"
  >
    <i class="fa-solid fa-shield text-lg"></i>
    <span class="text-[9px] font-black tracking-tighter uppercase">Bảo hiểm</span>
  </a>

  <!-- Center Action -->

  <div class="flex flex-col items-center">
    <a
      href="/to-cao-lua-dao"
      class="bg-cs_red -mt-9 mb-1 flex h-14 w-14 transform items-center justify-center rounded-full border-4 border-white text-white shadow-2xl shadow-red-500/40 transition-transform active:scale-90 dark:border-slate-900"
    >
      <i class="fa-solid fa-plus text-xl"></i>
    </a>
    <span class="mt-2 text-[9px] font-black tracking-tighter text-gray-400 uppercase">Tố cáo scam</span>
  </div>

  <a
    href="/bai-viet"
    class="{{ request()->is('bai-viet*') ? 'text-cs_blue' : 'text-gray-400' }} flex flex-col items-center gap-1"
  >
    <i class="fa-solid fa-newspaper text-lg"></i>
    <span class="text-[9px] font-black tracking-tighter uppercase">Kiến thức</span>
  </a>

  <a
    href="{{ $siteConfig['zalo_link'] ?? '#' }}"
    target="_blank"
    class="flex flex-col items-center gap-1 text-gray-400"
  >
    <i class="fa-solid fa-envelope text-lg"></i>
    <span class="text-[9px] font-black tracking-tighter uppercase">Liên hệ</span>
  </a>

  <a
    href="/newfeed"
    class="{{ request()->is('newfeed*') ? 'text-cs_blue' : 'text-gray-400' }} flex flex-col items-center gap-1"
  >
    <i class="fa-solid fa-store text-lg"></i>
    <span class="text-[9px] font-black tracking-tighter uppercase">Mua Bán</span>
  </a>
</nav>

<script>
  $(document).ready(function () {
    const $logoHeader = $('#logo_header');
    const $logoFooter = $('#logo_footer');
    const $backToTop = $('#back-to-top');

    // Theme Switch Management
    function setTheme(theme) {
      const isDark = theme === 'dark';
      $('html').toggleClass('dark', isDark);
      localStorage.setItem('theme', theme);

      if ($logoHeader.length) {
        const src = isDark ? $logoHeader.data('dark') : $logoHeader.data('light');
        if (src) $logoHeader.attr('src', src);
      }

      if ($logoFooter.length) {
        const src = isDark ? $logoFooter.data('dark') : $logoFooter.data('light');
        if (src) $logoFooter.attr('src', src);
      }
    }

    $('#theme-toggle').on('click', function () {
      const newTheme = $('html').hasClass('dark') ? 'light' : 'dark';
      setTheme(newTheme);
    });

    // Initial theme setup
    if (
      localStorage.theme === 'dark' ||
      (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
      setTheme('dark');
    } else {
      setTheme('light');
    }

    // Scroll Management
    $(window).on('scroll', function () {
      if ($(this).scrollTop() > 300) {
        $backToTop.removeClass('hidden').addClass('flex');
      } else {
        $backToTop.addClass('hidden').removeClass('flex');
      }
    });

    $backToTop.on('click', function () {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
    });
  });
</script>
@yield('scripts')
@stack('scripts')

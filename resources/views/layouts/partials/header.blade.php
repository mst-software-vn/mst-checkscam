<!-- Header -->
<header class="dark:bg-dark_bg sticky top-0 z-50 border-b border-gray-200 bg-white dark:border-gray-800">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Logo -->
      <a href="/" class="flex items-center gap-2">
        @php
          $logoHeaderLight = ! empty($siteConfig['logo_header_light']) ? asset('uploads/' . $siteConfig['logo_header_light']) : 'https://i.ibb.co/7xfz0v3K/black.png';
          $logoHeaderDark = ! empty($siteConfig['logo_header_dark']) ? asset('uploads/' . $siteConfig['logo_header_dark']) : 'https://i.ibb.co/wFZsnJBR/white.png';
        @endphp

        <img
          src="{{ $logoHeaderLight }}"
          alt="{{ $siteConfig['title'] ?? 'MST CheckScam' }}"
          class="h-10 w-auto md:h-12"
          id="logo_header"
          data-light="{{ $logoHeaderLight }}"
          data-dark="{{ $logoHeaderDark }}"
        />
      </a>

      <!-- Desktop Menu -->
      <nav class="hidden gap-x-6 md:flex lg:gap-x-8">
        <a
          href="/"
          class="{{ request()->is('/') ? 'text-cs_red border-cs_red border-b-2 font-bold' : 'hover:text-cs_red dark:hover:text-cs_red font-medium text-gray-600 dark:text-gray-400' }} py-5 text-sm transition-colors"
        >
          Trang Chủ
        </a>
        <a
          href="/to-cao-lua-dao"
          class="{{ request()->is('to-cao-lua-dao*') ? 'text-cs_red border-cs_red border-b-2 font-bold' : 'hover:text-cs_red dark:hover:text-cs_red font-medium text-gray-600 dark:text-gray-400' }} py-5 text-sm transition-colors"
        >
          Tố Cáo Scam
        </a>
        <a
          href="/bao-hiem-cs"
          class="{{ request()->is('bao-hiem-cs*') ? 'text-cs_red border-cs_red border-b-2 font-bold' : 'hover:text-cs_red dark:hover:text-cs_red font-medium text-gray-600 dark:text-gray-400' }} py-5 text-sm transition-colors"
        >
          Quỹ Bảo Hiểm
        </a>
        <a
          href="/bai-viet"
          class="{{ request()->is('bai-viet*') ? 'text-cs_red border-cs_red border-b-2 font-bold' : 'hover:text-cs_red dark:hover:text-cs_red font-medium text-gray-600 dark:text-gray-400' }} py-5 text-sm transition-colors"
        >
          Bài viết
        </a>
      </nav>
    </div>
  </div>
</header>

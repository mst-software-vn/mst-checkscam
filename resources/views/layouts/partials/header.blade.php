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
          class="{{ request()->is('/') ? 'text-cs_blue border-cs_blue border-b-2 font-bold' : 'hover:text-cs_blue dark:hover:text-cs_blue font-medium text-gray-600 dark:text-gray-400' }} py-5 text-sm transition-colors"
        >
          Trang Chủ
        </a>
        <a
          href="/to-cao-lua-dao"
          class="{{ request()->is('to-cao-lua-dao*') ? 'text-cs_blue border-cs_blue border-b-2 font-bold' : 'hover:text-cs_blue dark:hover:text-cs_blue font-medium text-gray-600 dark:text-gray-400' }} py-5 text-sm transition-colors"
        >
          Tố Cáo Scam
        </a>
        <a
          href="/bao-hiem-cs"
          class="{{ request()->is('bao-hiem-cs*') ? 'text-cs_blue border-cs_blue border-b-2 font-bold' : 'hover:text-cs_blue dark:hover:text-cs_blue font-medium text-gray-600 dark:text-gray-400' }} py-5 text-sm transition-colors"
        >
          Quỹ Bảo Hiểm
        </a>
        <a
          href="/bai-viet"
          class="{{ request()->is('bai-viet*') ? 'text-cs_blue border-cs_blue border-b-2 font-bold' : 'hover:text-cs_blue dark:hover:text-cs_blue font-medium text-gray-600 dark:text-gray-400' }} py-5 text-sm transition-colors"
        >
          Bài viết
        </a>
        <a
          href="/newfeed"
          class="{{ request()->is('newfeed*') ? 'text-cs_blue border-cs_blue border-b-2 font-bold' : 'hover:text-cs_blue dark:hover:text-cs_blue font-medium text-gray-600 dark:text-gray-400' }} py-5 text-sm transition-colors"
        >
          Mua Bán
        </a>
      </nav>

      {{-- Auth area --}}
      <div class="hidden items-center gap-2 md:flex">
        @auth
          @if (auth()->user()->role === 'user')
            <div class="relative" x-data="{ open: false }">
              <button
                onclick="this.nextElementSibling.classList.toggle('hidden')"
                class="flex items-center gap-2 rounded-full border border-gray-200 px-3 py-1.5 text-xs font-bold text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-slate-800"
              >
                <img src="{{ auth()->user()->avatar_url }}" class="h-6 w-6 rounded-full object-cover" alt="" />
                {{ Str::limit(auth()->user()->full_name ?? auth()->user()->username, 16) }}
                @if (auth()->user()->is_verified)
                  <i class="fa-solid fa-circle-check text-cs_blue text-xs"></i>
                @endif
              </button>
              <div
                class="hidden absolute right-0 top-full mt-1 w-44 rounded-xl border border-gray-200 bg-white py-1 shadow-lg dark:border-gray-700 dark:bg-slate-800 z-50"
              >
                <form action="{{ route('auth.logout') }}" method="POST">
                  @csrf
                  <button
                    type="submit"
                    class="flex w-full items-center gap-2 px-3 py-2 text-xs font-bold text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-slate-700"
                  >
                    <i class="fa-solid fa-right-from-bracket text-cs_red"></i>
                    Đăng xuất
                  </button>
                </form>
              </div>
            </div>
          @endif
        @else
          <a
            href="{{ route('auth.google') }}"
            class="flex items-center gap-2 rounded-full bg-white border border-gray-200 px-3 py-1.5 text-xs font-bold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300"
          >
            <svg width="14" height="14" viewBox="0 0 18 18" fill="none">
              <path
                d="M17.64 9.2045c0-.638-.0573-1.2518-.1636-1.8409H9v3.4814h4.8436c-.2086 1.125-.8427 2.0782-1.7959 2.7164v2.2581h2.9087c1.7018-1.567 2.6836-3.874 2.6836-6.6149z"
                fill="#4285F4"
              />
              <path
                d="M9 18c2.43 0 4.4673-.806 5.9564-2.1805l-2.9087-2.2582c-.8064.54-1.8368.859-3.0477.859-2.3441 0-4.3277-1.5832-5.036-3.71H.9574v2.3318A8.9973 8.9973 0 009 18z"
                fill="#34A853"
              />
              <path
                d="M3.964 10.71A5.41 5.41 0 013.682 9c0-.5905.1018-1.1641.282-1.71V4.9582H.9573A8.9965 8.9965 0 000 9c0 1.4518.3477 2.8268.9573 4.0418L3.964 10.71z"
                fill="#FBBC05"
              />
              <path
                d="M9 3.5795c1.3214 0 2.5077.4541 3.4405 1.346l2.5813-2.5814C13.4632.8918 11.426 0 9 0A8.9973 8.9973 0 00.9573 4.9582L3.964 7.29C4.6723 5.1627 6.6559 3.5795 9 3.5795z"
                fill="#EA4335"
              />
            </svg>
            Đăng nhập
          </a>
        @endauth
      </div>
    </div>
  </div>
</header>

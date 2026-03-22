@extends('layouts.app')

@section('title', 'Đang bảo trì - ' . ($siteConfig['title'] ?? 'CheckScam.vn'))

@section('content')
  <div class="relative flex min-h-[60vh] items-center justify-center p-4">
    <div class="relative z-10 w-full max-w-2xl text-center">
      <!-- MAIN CARD -->
      <div class="group relative overflow-hidden rounded-[40px]transition-all md:p-16">
        <!-- Background Glow -->
        <div
          class="bg-cs_blue/10 absolute top-0 left-1/2 h-64 w-64 -translate-x-1/2 -translate-y-1/2 rounded-full blur-[80px] opacity-50"
        ></div>

        <!-- Brand / Identity -->
        <div class="relative mb-10 flex flex-col items-center">
          @if (! empty($siteConfig['logo_header_dark']))
            <img
              src="{{ asset('uploads/' . $siteConfig['logo_header_dark']) }}"
              alt="Logo"
              class="hidden h-12 w-auto dark:block"
            />
            <img
              src="{{ asset('uploads/' . ($siteConfig['logo_header_light'] ?? $siteConfig['logo_header_dark'])) }}"
              alt="Logo"
              class="block h-12 w-auto dark:hidden"
            />
          @else
            <h1 class="text-3xl font-black tracking-tighter uppercase italic text-gray-800 dark:text-white">
              Check
              <span class="text-cs_blue">Scam</span>
              .vn
            </h1>
          @endif
          <div class="mt-4 h-1 w-16 rounded-full bg-cs_blue shadow-[0_0_15px_#3b82f6]"></div>
        </div>

        <!-- Maintenance Icon & Status -->
        <div class="mb-8 flex justify-center">
          <div
            class="bg-cs_blue/5 border-cs_blue/20 relative flex h-20 w-20 items-center justify-center rounded-3xl border shadow-inner"
          >
            <div class="bg-cs_blue absolute inset-0 animate-pulse rounded-3xl opacity-5 blur-xl"></div>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="text-cs_blue relative h-10 w-10"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
              />
            </svg>
          </div>
        </div>

        <h2 class="mb-4 text-3xl font-black tracking-tight text-gray-800 uppercase md:text-5xl dark:text-gray-200">
          Hệ thống
          <span class="text-cs_blue italic">Bảo Trì</span>
        </h2>

        <p
          class="mx-auto mb-10 max-w-md text-sm font-bold leading-relaxed text-gray-500 md:text-base dark:text-gray-400"
        >
          Chúng tôi đang nâng cấp hệ thống để mang lại trải nghiệm tốt nhất cho cộng đồng. Xin vui lòng quay lại sau ít
          phút.
        </p>

        <!-- Actions -->
        <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
          <a
            href="{{ $siteConfig['zalo_link'] ?? '#' }}"
            target="_blank"
            class="bg-cs_blue w-full rounded-2xl px-8 py-4 text-xs font-black tracking-widest text-white uppercase shadow-lg shadow-blue-500/20 transition-all hover:bg-blue-600 hover:-translate-y-1 active:scale-95 sm:w-auto"
          >
            Liên hệ hỗ trợ
          </a>
          <div
            class="border-gray-100 bg-gray-50 flex items-center gap-3 rounded-2xl border py-4 px-6 dark:border-gray-800 dark:bg-white/5"
          >
            <span class="relative flex h-2 w-2">
              <span class="bg-cs_blue absolute inline-flex h-full w-full animate-ping rounded-full opacity-75"></span>
              <span class="bg-cs_blue relative inline-flex h-2 w-2 rounded-full"></span>
            </span>
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">System Syncing</span>
          </div>
        </div>
      </div>

      <!-- FOOTER CREDIT -->
      <div class="mt-12 space-y-3">
        <p class="text-[10px] font-black tracking-[0.3em] text-gray-400 uppercase opacity-50 dark:text-gray-600">
          &copy; {{ date('Y') }} CheckScam Security Ecosystem
        </p>
        <p class="text-[9px] font-black tracking-widest text-gray-400 uppercase dark:text-gray-500">
          Website được thiết kế bởi
          <a
            href="https://www.facebook.com/mstsoftware.vn"
            target="_blank"
            class="text-cs_blue transition-colors hover:underline"
          >
            MST SOFTWARE
          </a>
        </p>
      </div>
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('title', 'Đang bảo trì - ' . ($siteConfig['title'] ?? 'CheckScam.vn'))

@section('content')
  <div class="relative flex min-h-[70vh] items-center justify-center p-6 overflow-hidden">
    <!-- Background layers (Internal to content area) -->
    <div class="absolute inset-0 z-0 opacity-50">
      <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cs_blue/20 rounded-full blur-[120px]"></div>
      <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 max-w-2xl w-full text-center">
      <!-- MAIN CONTENT BOX -->
      <div class="relative mb-12 rounded-[2.5rem] border border-white/10 bg-white/5 p-8 backdrop-blur-3xl sm:p-12">
        <!-- Maintenance Icon -->
        <div class="mb-8 flex justify-center">
          <div
            class="flex h-24 w-24 items-center justify-center rounded-3xl bg-cs_blue/10 border border-cs_blue/30 shadow-inner"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="w-12 h-12 text-cs_blue"
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

        <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-white sm:text-5xl">
          Đang
          <span class="text-cs_blue italic leading-tight">Nâng Cấp</span>
        </h2>

        <p class="mx-auto mb-10 max-w-md text-lg text-gray-400">
          Chúng tôi đang trong quá trình bảo trì định kỳ để mang lại trải nghiệm tốt nhất. Mong bạn vui lòng quay lại
          sau.
        </p>

        <div class="flex flex-col items-center justify-center gap-6 sm:flex-row">
          <a
            href="{{ $siteConfig['zalo_link'] ?? '#' }}"
            target="_blank"
            class="group relative w-full overflow-hidden rounded-2xl bg-white px-8 py-4 text-center font-black tracking-widest text-cs_dark uppercase transition-all hover:-translate-y-1 hover:bg-cs_blue hover:text-white active:scale-95 sm:w-auto"
          >
            Liên hệ hỗ trợ
          </a>

          <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 py-4 px-6 backdrop-blur-md">
            <span class="relative flex h-3 w-3">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cs_blue opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-cs_blue"></span>
            </span>
            <span class="text-xs font-black uppercase tracking-wider text-gray-300">Data Safe</span>
          </div>
        </div>
      </div>

      <!-- FOOTER CREDIT (Maintenance Specific) -->
      <div class="space-y-4">
        <p class="text-sm font-bold text-gray-500 uppercase">
          Website này được thiết kế bởi
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

@extends('layouts.app')

@section('title', 'Khu Mua Bán - CheckScam')
@section('description', 'Mua bán tài khoản, dịch vụ MMO uy tín tại CheckScam. Cộng đồng MMO Việt Nam.')

@section('content')
  <main class="pb-24">
    <x-breadcrumb :links="[['name' => 'Khu Mua Bán', 'url' => '/newfeed']]" />

    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
      {{-- Page Header --}}
      <header class="mb-8 flex flex-col justify-between gap-6 lg:flex-row lg:items-end">
        <div class="max-w-2xl">
          <h1
            class="text-2xl font-black tracking-tight text-gray-800 uppercase md:text-3xl lg:text-4xl dark:text-gray-300"
          >
            Khu
            <span class="text-cs_blue">Mua Bán</span>
          </h1>
          <p class="mt-2 text-sm leading-relaxed font-semibold text-gray-500 dark:text-gray-400">
            Nơi cộng đồng đăng tin mua bán tài khoản, dịch vụ MMO. Đăng nhập bằng Google để đăng tin và báo cáo bài vi
            phạm.
          </p>
        </div>

        <button
          id="btn-open-post-form"
          class="bg-cs_blue inline-flex shrink-0 cursor-pointer items-center justify-center gap-2 rounded-xl px-6 py-3 text-xs font-black tracking-widest text-white uppercase shadow-lg shadow-blue-500/20 transition-all hover:bg-blue-600 active:scale-95 md:text-sm"
        >
          <i class="fa-solid fa-plus"></i>
          Đăng bài
        </button>
      </header>

      {{-- Search + Filter Bar --}}
      <div class="mb-8 space-y-4">
        <div class="group relative">
          <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
            <i
              class="fa-solid fa-magnifying-glass group-focus-within:text-cs_blue text-xs text-gray-300 transition-colors"
            ></i>
          </div>
          <input
            id="nf-search"
            type="text"
            placeholder="Tìm tài khoản, dịch vụ MMO..."
            class="focus:border-cs_blue w-full rounded-xl border-2 border-gray-100 bg-white py-3.5 pr-4 pl-11 text-sm font-bold text-gray-700 shadow-sm transition-all outline-none dark:border-gray-800 dark:bg-slate-900 dark:text-gray-300"
          />
        </div>

        {{-- Category Filter --}}
        <div class="flex gap-2 overflow-x-auto pb-1 scrollbar-hide" id="nf-filter-bar">
          <button
            class="nf-chip nf-chip-active shrink-0 cursor-pointer rounded-full border px-3.5 py-1.5 text-xs font-bold whitespace-nowrap transition-all"
            data-category=""
          >
            Hoạt động mới
            <span class="ml-1 text-[10px] opacity-70">({{ $posts->total() }})</span>
          </button>
          @foreach ($categories as $cat)
            <button
              class="nf-chip shrink-0 cursor-pointer rounded-full border border-gray-200 px-3.5 py-1.5 text-xs font-bold whitespace-nowrap text-gray-600 transition-all hover:border-cs_blue hover:text-cs_blue dark:border-gray-700 dark:text-gray-300"
              data-category="{{ $cat }}"
            >
              {{ $cat }}
              @if (isset($categoryCounts[$cat]))
                <span class="ml-1 text-[10px] opacity-70">({{ $categoryCounts[$cat] }})</span>
              @endif
            </button>
          @endforeach
        </div>
      </div>

      {{-- Feed --}}
      <div id="nf-feed" class="columns-1 gap-4 md:columns-2">
        @forelse ($posts as $post)
          @include('newfeed.partials.card', ['post' => $post, 'userReportedIds' => $userReportedIds])
        @empty
          <div
            class="nf-empty-state flex w-full flex-col items-center justify-center rounded-2xl border border-dashed border-gray-200 py-16 text-center text-sm text-gray-400 [column-span:all] dark:border-gray-800"
          >
            <i class="fa-regular fa-folder-open mb-3 block text-3xl"></i>
            Chưa có bài đăng nào.
          </div>
        @endforelse
      </div>

      {{-- Infinite Scroll Sentinel --}}
      <div id="nf-sentinel" class="mt-8 flex flex-col items-center justify-center gap-2 py-4">
        <span id="nf-loader" class="hidden">
          <img src="/images/spin.svg" alt="Đang tải..." class="h-16 w-16" />
        </span>
        <p id="nf-end-msg" class="hidden text-xs text-gray-400">Đã xem hết bài</p>
      </div>
    </div>
  </main>

  {{-- FAB Mobile --}}
  <button
    id="btn-fab"
    class="bg-cs_blue fixed right-5 bottom-24 z-40 flex h-14 w-14 cursor-pointer items-center justify-center rounded-full text-white shadow-lg shadow-blue-500/30 transition hover:bg-blue-600 active:scale-95 md:hidden"
  >
    <i class="fa-solid fa-plus text-xl"></i>
  </button>

  {{-- ===== POPUP: Yêu cầu đăng nhập ===== --}}
  <div id="popup-login" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="dark:bg-dark_card relative mx-4 w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl">
      <button
        onclick="closePopup('popup-login')"
        class="absolute right-4 top-4 cursor-pointer text-gray-400 hover:text-gray-600"
      >
        <i class="fa-solid fa-xmark text-lg"></i>
      </button>
      <div class="mb-4 text-center">
        <div
          class="bg-cs_blue/10 text-cs_blue mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-full text-2xl"
        >
          <i class="fa-solid fa-lock"></i>
        </div>
        <h3 class="text-base font-black text-gray-800 dark:text-white">Bạn cần đăng nhập để đăng bài</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Đăng nhập bằng tài khoản Google của bạn</p>
      </div>
      <a
        href="{{ route('auth.google') }}"
        class="flex w-full cursor-pointer items-center justify-center gap-3 rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm font-bold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-200"
      >
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
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
        Đăng nhập với Google
      </a>
      <button
        onclick="closePopup('popup-login')"
        class="mt-3 w-full cursor-pointer rounded-xl border border-gray-200 py-2.5 text-sm font-bold text-gray-500 transition hover:bg-gray-50 dark:border-gray-700"
      >
        Hủy
      </button>
    </div>
  </div>

  {{-- ===== POPUP: Đăng bài mới ===== --}}
  <div id="popup-post-form" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div
      class="dark:bg-dark_card relative mx-4 flex w-full max-w-lg flex-col rounded-2xl bg-white shadow-2xl"
      style="max-height: 90vh"
    >
      {{-- Header sticky --}}
      <div class="flex shrink-0 items-center justify-between border-b border-gray-100 px-4 py-3 dark:border-gray-800">
        <span class="flex items-center gap-2 text-xs font-bold text-gray-500">
          <i class="fa-solid fa-globe"></i>
          Công khai
        </span>
        <h3 class="text-sm font-black text-gray-800 dark:text-white">Đăng bài mới</h3>
        <button onclick="closePopup('popup-post-form')" class="cursor-pointer text-gray-400 hover:text-gray-600">
          <i class="fa-solid fa-xmark text-lg"></i>
        </button>
      </div>

      {{-- Body scrollable --}}
      <div class="overflow-y-auto p-4 space-y-4">
        {{-- Content --}}
        <div>
          <div class="mb-1 flex gap-1">
            <button
              type="button"
              onclick="formatText('bold')"
              class="cursor-pointer rounded px-2 py-1 text-xs font-black hover:bg-gray-100 dark:hover:bg-slate-700"
              title="In đậm đoạn đang chọn"
            >
              <b>B</b>
            </button>
            <button
              type="button"
              onclick="formatText('italic')"
              class="cursor-pointer rounded px-2 py-1 text-xs italic hover:bg-gray-100 dark:hover:bg-slate-700"
              title="In nghiêng đoạn đang chọn"
            >
              <i>I</i>
            </button>
            <button
              type="button"
              onclick="formatText('underline')"
              class="cursor-pointer rounded px-2 py-1 text-xs underline hover:bg-gray-100 dark:hover:bg-slate-700"
              title="Gạch chân đoạn đang chọn"
            >
              U
            </button>
          </div>
          <textarea
            id="nf-content"
            rows="5"
            placeholder="Mô tả chứa từ khóa bài đăng mới hiệu quả..."
            class="w-full rounded-xl border border-gray-200 p-3 text-sm outline-none focus:border-cs_blue focus:ring-2 focus:ring-cs_blue/20 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-100"
            maxlength="5000"
          ></textarea>
          <div class="mt-1 text-right text-[10px] text-gray-400">
            <span id="nf-content-count">0</span>
            /5000
          </div>
        </div>

        {{-- Price --}}
        <div>
          <label class="mb-1 block text-xs font-bold text-gray-600 dark:text-gray-300">
            Giá (VNĐ)
            <span class="font-normal text-gray-400">— tùy chọn</span>
          </label>
          <input
            id="nf-price"
            type="number"
            min="0"
            max="999999999"
            placeholder="0"
            class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-cs_blue focus:ring-2 focus:ring-cs_blue/20 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-100"
          />
        </div>

        {{-- Category --}}
        <div class="relative">
          <label class="mb-1 block text-xs font-bold text-gray-600 dark:text-gray-300">
            Danh mục
            <span class="text-cs_red">*</span>
          </label>
          <input
            id="nf-category"
            type="text"
            placeholder="Chọn hoặc nhập danh mục..."
            autocomplete="off"
            class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-cs_blue focus:ring-2 focus:ring-cs_blue/20 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-100"
          />
          <ul
            id="nf-cat-dropdown"
            class="absolute z-10 mt-1 hidden w-full rounded-xl border border-gray-200 bg-white shadow-lg dark:border-gray-700 dark:bg-slate-800"
          >
            @foreach ($categories as $cat)
              <li
                class="nf-cat-option cursor-pointer px-3 py-2 text-sm hover:bg-blue-50 dark:hover:bg-slate-700"
                data-value="{{ $cat }}"
              >
                {{ $cat }}
              </li>
            @endforeach
          </ul>
        </div>

        {{-- Image --}}
        <div>
          <label class="mb-1 block text-xs font-bold text-gray-600 dark:text-gray-300">
            Ảnh
            <span class="font-normal text-gray-400">— tùy chọn, tối đa 10 ảnh, mỗi ảnh max 5MB</span>
          </label>
          <input
            id="nf-images"
            type="file"
            accept="image/jpg,image/jpeg,image/png,image/webp"
            multiple
            class="hidden"
          />
          <div
            id="nf-image-drop"
            onclick="document.getElementById('nf-images').click()"
            class="flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-200 py-6 text-sm text-gray-400 transition hover:border-cs_blue hover:text-cs_blue dark:border-gray-700"
          >
            <i class="fa-solid fa-images mb-2 text-2xl"></i>
            <span>Bấm để chọn ảnh (tối đa 10)</span>
          </div>
          <div id="nf-image-preview" class="mt-2 hidden">
            <div id="nf-preview-grid" class="grid grid-cols-3 gap-2"></div>
            <button
              type="button"
              onclick="clearImages()"
              class="mt-2 cursor-pointer rounded-lg border border-gray-200 px-3 py-1.5 text-xs text-gray-500 transition hover:border-red-300 hover:text-red-500 dark:border-gray-700"
            >
              <i class="fa-solid fa-trash mr-1"></i>
              Xóa tất cả ảnh
            </button>
          </div>
        </div>

        {{-- AI label --}}
        <div
          class="flex items-center gap-2 rounded-xl border border-dashed border-gray-200 px-3 py-2 dark:border-gray-700"
        >
          <i class="fa-solid fa-wand-magic-sparkles text-cs_blue text-sm"></i>
          <span class="text-xs text-gray-500 dark:text-gray-400">AI tạo content</span>
          <span
            class="ml-auto rounded-full bg-blue-50 px-2 py-0.5 text-[10px] font-bold text-blue-500 dark:bg-blue-900/30"
          >
            Sắp ra mắt
          </span>
        </div>
      </div>

      {{-- Footer sticky --}}
      <div class="shrink-0 border-t border-gray-100 px-4 py-3 dark:border-gray-800">
        <div
          class="mb-3 rounded-lg bg-yellow-50 px-3 py-2 text-[11px] text-yellow-700 dark:bg-yellow-900/20 dark:text-yellow-400"
        >
          <strong>MẸO:</strong>
          Bài đăng chứa thông tin liên hệ rõ ràng tiếp cận nhanh hơn.
          <br />
          <strong>LƯU Ý:</strong>
          Không được chỉnh sửa bài sau khi đăng. Bài sẽ bị ẩn nếu nhận đủ report.
        </div>
        <button
          id="btn-submit-post"
          type="button"
          onclick="submitPost()"
          disabled
          class="bg-cs_blue w-full cursor-pointer rounded-xl py-3 text-sm font-black text-white transition hover:bg-blue-600 disabled:cursor-not-allowed disabled:opacity-40"
        >
          Đăng bài
        </button>
      </div>
    </div>
  </div>

  {{-- ===== POPUP: Report ===== --}}
  <div id="popup-report" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="dark:bg-dark_card relative mx-4 w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl">
      <button
        onclick="closePopup('popup-report')"
        class="absolute right-4 top-4 cursor-pointer text-gray-400 hover:text-gray-600"
      >
        <i class="fa-solid fa-xmark text-lg"></i>
      </button>
      <h3 class="mb-1 text-base font-black text-gray-800 dark:text-white">Báo cáo bài đăng</h3>
      <p class="mb-4 text-xs font-semibold text-gray-400">Vui lòng chọn lý do báo cáo để tiếp tục.</p>
      <input type="hidden" id="report-post-id" value="" />
      <div class="space-y-2">
        @foreach (['Spam', 'Lừa đảo', 'Nội dung không phù hợp', 'Khác'] as $reason)
          <label
            class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 px-3 py-2.5 transition hover:border-cs_blue dark:border-gray-700"
          >
            <input type="radio" name="report-reason" value="{{ $reason }}" class="accent-cs_blue cursor-pointer" />
            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $reason }}</span>
          </label>
        @endforeach
      </div>
      <button
        id="btn-submit-report"
        onclick="submitReport()"
        disabled
        class="bg-cs_red mt-4 w-full cursor-pointer rounded-xl py-3 text-sm font-black text-white transition hover:bg-red-700 disabled:cursor-not-allowed disabled:opacity-40"
      >
        Xác nhận báo cáo
      </button>
    </div>
  </div>

  @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />
  @endpush

  <script>
    window._authUserId = @auth {{ auth()->id() }} @else null @endauth;
    window._csrfToken = '{{ csrf_token() }}';
    window._nfCurrentPage = {{ $posts->currentPage() }};
    window._nfLastPage = {{ $posts->lastPage() }};
    window._nfUserReportedIds = @json($userReportedIds);
  </script>

  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('js/newfeed.js') }}"></script>
  @endpush
@endsection

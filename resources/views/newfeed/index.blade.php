@extends('layouts.app')

@section('title', 'Khu Mua Bán – CheckScam')
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
      <div id="nf-sentinel" class="mt-8 flex justify-center py-4">
        <span id="nf-loader" class="hidden text-sm text-gray-400">
          <i class="fa-solid fa-circle-notch fa-spin mr-2"></i>
          Đang tải...
        </span>
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

  @auth
    <script>
      window._authUserId = {{ auth()->id() }};
      window._csrfToken = '{{ csrf_token() }}';
    </script>
  @else
    <script>
      window._authUserId = null;
      window._csrfToken = '{{ csrf_token() }}';
    </script>
  @endauth

  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js"></script>
    <script>
      Fancybox.bind('[data-fancybox]', {
        animated: false,
        Toolbar: { display: { left: [], middle: [], right: ['close'] } },
      });

      window.openCardGallery = function (images, startIndex) {
        const items = images.map(function (src) {
          return { src: src, type: 'image' };
        });
        Fancybox.show(items, {
          startIndex: startIndex || 0,
          animated: false,
          Toolbar: { display: { left: [], middle: [], right: ['close'] } },
        });
      };

      $(function () {
        // ===== State =====
        let currentPage = {{ $posts->currentPage() }};
        const lastPage = {{ $posts->lastPage() }};
        let loading = false;
        let currentCategory = '';
        let currentQ = '';
        let searchTimer = null;
        const userReportedIds = @json($userReportedIds);

        const $feed = $('#nf-feed');
        const $sentinel = $('#nf-sentinel');
        const $loader = $('#nf-loader');
        const $nfContent = $('#nf-content');
        const $catInput = $('#nf-category');
        const $catDropdown = $('#nf-cat-dropdown');
        const $btnSubmit = $('#btn-submit-post');

        // ===== Chip active styles =====
        function setActiveChip($el) {
          $('.nf-chip')
            .removeClass('nf-chip-active bg-cs_blue text-white border-cs_blue')
            .addClass('border-gray-200 text-gray-600');
          $el
            .addClass('nf-chip-active bg-cs_blue text-white border-cs_blue')
            .removeClass('border-gray-200 text-gray-600');
        }
        $('.nf-chip.nf-chip-active').addClass('bg-cs_blue text-white border-cs_blue');

        // ===== Category filter chips =====
        $('.nf-chip').on('click', function () {
          currentCategory = $(this).data('category') || '';
          currentPage = 1;
          setActiveChip($(this));
          reloadFeed(true);
        });

        // ===== Search =====
        $('#nf-search').on('input', function () {
          clearTimeout(searchTimer);
          const val = $(this).val().trim();
          searchTimer = setTimeout(function () {
            currentQ = val;
            currentPage = 1;
            reloadFeed(true);
          }, 400);
        });

        // ===== Empty state helper =====
        function emptyStateHtml(text) {
          return (
            '<div class="nf-empty-state flex w-full flex-col items-center justify-center rounded-2xl border border-dashed border-gray-200 py-16 text-center text-sm text-gray-400 [column-span:all] dark:border-gray-800"><i class="fa-regular fa-folder-open mb-3 block text-3xl"></i>' +
            text +
            '</div>'
          );
        }

        // ===== Load posts from API =====
        function loadPosts(page, replace) {
          if (loading) return;
          loading = true;
          $loader.removeClass('hidden');

          const params = { page: page, per_page: 12 };
          if (currentCategory) params.category = currentCategory;
          if (currentQ) params.q = currentQ;

          $.get('/api/newfeed/posts', params)
            .done(function (data) {
              if (replace) $feed.empty();
              if (data.data.length === 0 && replace) {
                $feed.html(emptyStateHtml('Không tìm thấy bài đăng nào.'));
              } else {
                $.each(data.data, function (i, post) {
                  $feed.append(renderCard(post));
                });
              }
              currentPage = data.current_page;
              if (!data.has_more) {
                $sentinel.html('<p class="text-xs text-gray-400">Đã xem hết bài</p>');
              }
            })
            .fail(function (e) {
              console.error('Load posts error:', e);
            })
            .always(function () {
              loading = false;
              $loader.addClass('hidden');
            });
        }

        function reloadFeed(replace) {
          loadPosts(1, replace !== false);
        }
        window.reloadFeed = reloadFeed;

        // ===== HTML escape + inline markdown renderer =====
        function escapeHtml(s) {
          return $('<div>').text(s).html();
        }

        function formatPostContent(text) {
          let s = escapeHtml(text);
          s = s.replace(/\*\*(.+?)\*\*/gs, '<strong>$1</strong>');
          s = s.replace(/__(.+?)__/gs, '<u>$1</u>');
          s = s.replace(/\*(.+?)\*/gs, '<em>$1</em>');
          return s.replace(/\n/g, '<br>');
        }

        // ===== Image grid builder =====
        const SHOW_MAX = 4;
        function buildImageGrid(images, postId) {
          if (!images || images.length === 0) return '';
          const total = images.length;
          const show = Math.min(total, SHOW_MAX);
          const extra = total - show;
          const gridCols = show === 1 ? 'grid-cols-1' : 'grid-cols-2';
          let html = '<div class="mt-3 grid gap-1 ' + gridCols + '">';
          const imagesJson = JSON.stringify(images);
          for (let i = 0; i < show; i++) {
            const url = images[i];
            const isLast = i === show - 1;
            const spanCls = show === 3 && i === 0 ? ' col-span-2' : '';
            const hCls = show === 1 ? ' max-h-72' : ' h-36';
            html +=
              '<div onclick="event.stopPropagation();openCardGallery(' +
              imagesJson.replace(/"/g, '&quot;') +
              ',' +
              i +
              ')" class="relative cursor-pointer overflow-hidden rounded-lg' +
              spanCls +
              hCls +
              '">';
            html += '<img src="' + url + '" alt="" class="h-full w-full object-cover" loading="lazy">';
            if (isLast && extra > 0) {
              html +=
                '<div class="absolute inset-0 flex items-center justify-center rounded-lg bg-black/50 pointer-events-none"><span class="text-2xl font-black text-white">+' +
                extra +
                '</span></div>';
            }
            html += '</div>';
          }
          html += '</div>';
          return html;
        }

        // ===== Truncate content (no "Xem thêm" link — card click navigates) =====
        const CONTENT_LIMIT = 200;
        function truncateContent(text) {
          const formatted = formatPostContent(text);
          if (text.length <= CONTENT_LIMIT)
            return '<div class="mt-3 text-sm leading-relaxed text-gray-700 dark:text-gray-300">' + formatted + '</div>';
          const short = formatPostContent(text.substring(0, CONTENT_LIMIT));
          return (
            '<div class="mt-3 text-sm leading-relaxed text-gray-700 dark:text-gray-300">' +
            short +
            '<span class="text-gray-400">...</span></div>'
          );
        }

        // ===== Render card from API JSON =====
        function renderCard(post) {
          const isOwner = window._authUserId && window._authUserId === post.user.id;
          const reported = userReportedIds.includes(post.id) || post.is_reported;
          const tick = post.user.is_verified
            ? '<i class="fa-solid fa-circle-check text-cs_blue ml-1 text-xs" title="Tài khoản đã được CheckScam xác minh uy tín"></i>'
            : '';
          const priceHtml =
            post.price && post.price > 0
              ? '<div class="mt-2 text-sm font-black text-cs_red">' +
                Number(post.price).toLocaleString('vi-VN') +
                ' VNĐ</div>'
              : '';
          const imageHtml = buildImageGrid(post.image_urls, post.id);
          const actionBtn = window._authUserId
            ? isOwner
              ? '<button type="button" data-no-nav onclick="deletePost(' +
                post.id +
                ',this)" class="absolute top-2 right-2 z-10 flex h-7 w-7 cursor-pointer items-center justify-center rounded-full bg-red-50 text-xs text-cs_red transition hover:bg-red-100 dark:bg-red-900/30" title="Xóa bài"><i class="fa-solid fa-xmark"></i></button>'
              : reported
                ? '<button type="button" data-no-nav class="absolute top-2 right-2 z-10 flex h-7 w-7 cursor-not-allowed items-center justify-center rounded-full bg-orange-100 text-xs text-orange-500 dark:bg-orange-900/30" title="Đã báo cáo" disabled><i class="fa-solid fa-flag"></i></button>'
                : '<button type="button" data-no-nav onclick="openReport(' +
                  post.id +
                  ',this)" class="absolute top-2 right-2 z-10 flex h-7 w-7 cursor-pointer items-center justify-center rounded-full bg-gray-100 text-xs text-gray-400 transition hover:bg-orange-50 hover:text-orange-500 dark:bg-slate-700" title="Báo cáo"><i class="fa-regular fa-flag"></i></button>'
            : '';

          return $(
            '<div class="nf-card dark:bg-dark_card relative mb-4 break-inside-avoid cursor-pointer overflow-hidden rounded-2xl border border-gray-200 bg-white p-4 shadow-xs transition hover:shadow-md dark:border-gray-800" data-id="' +
              post.id +
              '" data-post-url="/newfeed/' +
              post.id +
              '">' +
              actionBtn +
              '<div class="flex items-center gap-3 pr-8">' +
              '<img src="' +
              post.user.avatar_url +
              '" alt="" class="h-9 w-9 rounded-full object-cover">' +
              '<div class="min-w-0"><div class="flex items-center text-sm font-bold text-gray-800 dark:text-white"><span class="truncate">' +
              escapeHtml(post.user.name) +
              '</span>' +
              tick +
              '</div>' +
              '<div class="text-[11px] text-gray-400">' +
              post.created_at +
              ' · ' +
              escapeHtml(post.category) +
              '</div></div></div>' +
              truncateContent(post.content) +
              priceHtml +
              imageHtml +
              '</div>'
          );
        }

        // ===== Infinite scroll =====
        if (lastPage > 1) {
          const observer = new IntersectionObserver(
            function (entries) {
              if (entries[0].isIntersecting && currentPage < lastPage) {
                loadPosts(currentPage + 1, false);
              }
            },
            { threshold: 0.1 }
          );
          observer.observe($sentinel[0]);
        }

        // ===== Card click → detail page =====
        $feed.on('click', '.nf-card', function (e) {
          if ($(e.target).closest('[data-fancybox], [data-no-nav], button').length) return;
          window.location.href = $(this).data('post-url');
        });

        // ===== Popup helpers =====
        window.openPopup = function (id) {
          $('#' + id)
            .removeClass('hidden')
            .addClass('flex');
        };
        window.closePopup = function (id) {
          $('#' + id)
            .removeClass('flex')
            .addClass('hidden');
        };
        $('[id^="popup-"]').on('click', function (e) {
          if (e.target === this) closePopup(this.id);
        });

        // ===== Open post form (auth check) =====
        function openPostForm() {
          window._authUserId ? openPopup('popup-post-form') : openPopup('popup-login');
        }
        $('#btn-open-post-form, #btn-fab').on('click', openPostForm);

        // ===== Category combobox =====
        $catInput.on('focus', function () {
          $catDropdown.removeClass('hidden');
        });
        $catInput.on('blur', function () {
          setTimeout(function () {
            $catDropdown.addClass('hidden');
          }, 200);
        });
        $catInput.on('input', function () {
          const q = $(this).val().toLowerCase();
          $('.nf-cat-option').each(function () {
            $(this).toggle($(this).data('value').toLowerCase().includes(q));
          });
          $catDropdown.removeClass('hidden');
          validateForm();
        });
        $('.nf-cat-option').on('mousedown', function () {
          $catInput.val($(this).data('value'));
          $catDropdown.addClass('hidden');
          validateForm();
        });

        // ===== Content counter + form validation =====
        $nfContent.on('input', function () {
          $('#nf-content-count').text(this.value.length);
          validateForm();
        });
        function validateForm() {
          $btnSubmit.prop('disabled', $nfContent.val().trim().length < 10 || $catInput.val().trim().length === 0);
        }

        // ===== Multi-image upload (drag reorder + per-image delete) =====
        let selectedFiles = [];

        const sortableGrid = Sortable.create(document.getElementById('nf-preview-grid'), {
          animation: 150,
          ghostClass: 'opacity-40',
          onEnd: function (evt) {
            const moved = selectedFiles.splice(evt.oldIndex, 1)[0];
            selectedFiles.splice(evt.newIndex, 0, moved);
          },
        });

        function renderPreviews() {
          const $grid = $('#nf-preview-grid').empty();
          selectedFiles.forEach(function (file, idx) {
            const reader = new FileReader();
            reader.onload = function (e) {
              $grid
                .find('[data-pending="' + idx + '"]')
                .find('img')
                .attr('src', e.target.result);
            };
            const $item = $(
              '<div data-pending="' +
                idx +
                '" class="relative cursor-grab rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">' +
                '<img src="" class="h-20 w-full object-cover" />' +
                '<button type="button" data-no-nav onclick="removeUploadFile(' +
                idx +
                ')" ' +
                'class="absolute top-0.5 right-0.5 flex h-5 w-5 cursor-pointer items-center justify-center rounded-full bg-red-500 text-[10px] text-white hover:bg-red-600" title="Xóa ảnh">' +
                '<i class="fa-solid fa-xmark"></i></button>' +
                '<div class="absolute inset-x-0 bottom-0 flex justify-center bg-black/25 py-0.5 text-[9px] text-white/70">&#9776;</div>' +
                '</div>'
            );
            $grid.append($item);
            reader.readAsDataURL(file);
          });

          if (selectedFiles.length > 0) {
            $('#nf-image-preview').removeClass('hidden');
            $('#nf-image-drop').addClass('hidden');
          } else {
            $('#nf-image-preview').addClass('hidden');
            $('#nf-image-drop').removeClass('hidden');
          }
        }

        $('#nf-images').on('change', function () {
          const newFiles = Array.from(this.files || []);
          newFiles.forEach(function (f) {
            if (selectedFiles.length < 10) selectedFiles.push(f);
          });
          this.value = '';
          renderPreviews();
        });

        window.removeUploadFile = function (idx) {
          selectedFiles.splice(idx, 1);
          renderPreviews();
        };

        window.clearImages = function () {
          selectedFiles = [];
          renderPreviews();
        };

        // ===== Format text (wrap textarea selection with markdown markers) =====
        window.formatText = function (type) {
          const markers = { bold: '**', italic: '*', underline: '__' };
          const marker = markers[type];
          const ta = $nfContent[0];
          const start = ta.selectionStart;
          const end = ta.selectionEnd;
          const val = ta.value;
          const selected = val.slice(start, end) || 'văn bản';
          ta.value = val.slice(0, start) + marker + selected + marker + val.slice(end);
          const cursor = start + marker.length + selected.length + marker.length;
          ta.focus();
          ta.setSelectionRange(cursor, cursor);
          $nfContent.trigger('input');
        };

        // ===== Submit new post =====
        window.submitPost = function () {
          $btnSubmit.prop('disabled', true).text('Đang đăng...');
          const fd = new FormData();
          fd.append('content', $nfContent.val().trim());
          fd.append('category', $catInput.val().trim());
          const price = $('#nf-price').val();
          if (price) fd.append('price', price);
          selectedFiles.forEach(function (f) {
            fd.append('images[]', f);
          });
          fd.append('_token', window._csrfToken);

          $.ajax({ url: '/api/newfeed/posts', method: 'POST', data: fd, processData: false, contentType: false })
            .done(function (data) {
              $feed.find('.nf-empty-state').remove();
              $feed.prepend(renderCard(data.post));
              closePopup('popup-post-form');
              resetPostForm();
            })
            .fail(function (xhr) {
              alert((xhr.responseJSON && xhr.responseJSON.message) || 'Có lỗi xảy ra khi đăng bài.');
            })
            .always(function () {
              validateForm();
              $btnSubmit.text('Đăng bài');
            });
        };

        function resetPostForm() {
          $nfContent.val('');
          $('#nf-content-count').text('0');
          $('#nf-price').val('');
          $catInput.val('');
          clearImages();
          validateForm();
        }

        // ===== Delete post =====
        window.deletePost = function (postId, btn) {
          if (!confirm('Bạn có chắc muốn xóa bài đăng này?')) return;
          $.ajax({
            url: '/api/newfeed/posts/' + postId,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': window._csrfToken, Accept: 'application/json' },
          })
            .done(function () {
              const $card = $(btn).closest('.nf-card');
              $card.css({ opacity: 0, transform: 'scale(0.95)', transition: 'all 0.2s ease' });
              setTimeout(function () {
                $card.remove();
              }, 200);
            })
            .fail(function () {
              alert('Không thể xóa bài này.');
            });
        };

        // ===== Report =====
        window.openReport = function (postId) {
          $('#report-post-id').val(postId);
          $('input[name="report-reason"]').prop('checked', false);
          $('#btn-submit-report').prop('disabled', true);
          openPopup('popup-report');
        };
        $(document).on('change', 'input[name="report-reason"]', function () {
          $('#btn-submit-report').prop('disabled', false);
        });
        window.submitReport = function () {
          const postId = $('#report-post-id').val();
          const reason = $('input[name="report-reason"]:checked').val();
          if (!reason) {
            alert('Vui lòng chọn lý do báo cáo.');
            return;
          }

          $.ajax({
            url: '/api/newfeed/posts/' + postId + '/report',
            method: 'POST',
            contentType: 'application/json',
            headers: { 'X-CSRF-TOKEN': window._csrfToken, Accept: 'application/json' },
            data: JSON.stringify({ reason: reason }),
          })
            .done(function () {
              closePopup('popup-report');
              userReportedIds.push(parseInt(postId));
              const $flagBtn = $('.nf-card[data-id="' + postId + '"]').find('[title="Báo cáo"]');
              if ($flagBtn.length) {
                $flagBtn
                  .attr('title', 'Đã báo cáo')
                  .prop('disabled', true)
                  .removeClass('cursor-pointer hover:bg-orange-50 hover:text-orange-500 text-gray-400 transition')
                  .addClass('cursor-not-allowed text-orange-500')
                  .html('<i class="fa-solid fa-flag"></i>');
              }
            })
            .fail(function (xhr) {
              alert((xhr.responseJSON && xhr.responseJSON.error) || 'Không thể gửi báo cáo.');
            });
        };
      });
    </script>
  @endpush
@endsection

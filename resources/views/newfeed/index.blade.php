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
          class="bg-cs_blue inline-flex shrink-0 items-center justify-center gap-2 rounded-xl px-6 py-3 text-xs font-black tracking-widest text-white uppercase shadow-lg shadow-blue-500/20 transition-all hover:bg-blue-600 active:scale-95 md:text-sm"
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
            class="nf-chip nf-chip-active shrink-0 rounded-full border px-3.5 py-1.5 text-xs font-bold whitespace-nowrap transition-all"
            data-category=""
          >
            Hoạt động mới
            <span class="ml-1 text-[10px] opacity-70">({{ $posts->total() }})</span>
          </button>
          @foreach ($categories as $cat)
            <button
              class="nf-chip shrink-0 rounded-full border border-gray-200 px-3.5 py-1.5 text-xs font-bold whitespace-nowrap text-gray-600 transition-all hover:border-cs_blue hover:text-cs_blue dark:border-gray-700 dark:text-gray-300"
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
            class="col-span-full rounded-2xl border border-dashed border-gray-200 py-16 text-center text-sm text-gray-400 dark:border-gray-800"
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
    class="bg-cs_blue fixed right-5 bottom-24 z-40 flex h-14 w-14 items-center justify-center rounded-full text-white shadow-lg shadow-blue-500/30 transition hover:bg-blue-600 active:scale-95 md:hidden"
  >
    <i class="fa-solid fa-plus text-xl"></i>
  </button>

  {{-- ===== POPUP: Yêu cầu đăng nhập ===== --}}
  <div id="popup-login" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="dark:bg-dark_card relative mx-4 w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl">
      <button onclick="closePopup('popup-login')" class="absolute right-4 top-4 text-gray-400 hover:text-gray-600">
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
        class="flex w-full items-center justify-center gap-3 rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm font-bold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-200"
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
        class="mt-3 w-full rounded-xl border border-gray-200 py-2.5 text-sm font-bold text-gray-500 transition hover:bg-gray-50 dark:border-gray-700"
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
        <button onclick="closePopup('popup-post-form')" class="text-gray-400 hover:text-gray-600">
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
              class="rounded px-2 py-1 text-xs font-black hover:bg-gray-100 dark:hover:bg-slate-700"
              title="Bold"
            >
              <b>B</b>
            </button>
            <button
              type="button"
              onclick="formatText('italic')"
              class="rounded px-2 py-1 text-xs italic hover:bg-gray-100 dark:hover:bg-slate-700"
              title="Italic"
            >
              <i>I</i>
            </button>
            <button
              type="button"
              onclick="formatText('underline')"
              class="rounded px-2 py-1 text-xs underline hover:bg-gray-100 dark:hover:bg-slate-700"
              title="Underline"
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
            <span class="font-normal text-gray-400">— tùy chọn, 1 ảnh max 5MB</span>
          </label>
          <input id="nf-image" type="file" accept="image/jpg,image/jpeg,image/png,image/webp" class="hidden" />
          <div
            id="nf-image-drop"
            onclick="document.getElementById('nf-image').click()"
            class="flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-200 py-6 text-sm text-gray-400 transition hover:border-cs_blue hover:text-cs_blue dark:border-gray-700"
          >
            <i class="fa-solid fa-image mb-2 text-2xl"></i>
            <span>Bấm để chọn ảnh</span>
          </div>
          <div id="nf-image-preview" class="mt-2 hidden relative">
            <img id="nf-preview-img" src="" alt="" class="max-h-48 w-full rounded-xl object-cover" />
            <button
              type="button"
              onclick="clearImage()"
              class="absolute right-2 top-2 rounded-full bg-black/60 px-2 py-1 text-xs text-white hover:bg-black/80"
            >
              <i class="fa-solid fa-xmark"></i>
              Xóa
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
          class="bg-cs_blue w-full rounded-xl py-3 text-sm font-black text-white transition disabled:cursor-not-allowed disabled:opacity-40 hover:bg-blue-600"
        >
          Đăng bài
        </button>
      </div>
    </div>
  </div>

  {{-- ===== POPUP: Report ===== --}}
  <div id="popup-report" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="dark:bg-dark_card relative mx-4 w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl">
      <button onclick="closePopup('popup-report')" class="absolute right-4 top-4 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-xmark text-lg"></i>
      </button>
      <h3 class="mb-4 text-base font-black text-gray-800 dark:text-white">Báo cáo bài đăng</h3>
      <input type="hidden" id="report-post-id" value="" />
      <div class="space-y-2">
        @foreach (['Spam', 'Lừa đảo', 'Nội dung không phù hợp', 'Khác'] as $reason)
          <label
            class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 px-3 py-2.5 transition hover:border-cs_blue dark:border-gray-700"
          >
            <input type="radio" name="report-reason" value="{{ $reason }}" class="accent-cs_blue" />
            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $reason }}</span>
          </label>
        @endforeach
      </div>
      <button
        onclick="submitReport()"
        class="bg-cs_red mt-4 w-full rounded-xl py-3 text-sm font-black text-white transition hover:bg-red-700"
      >
        Xác nhận báo cáo
      </button>
    </div>
  </div>

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
    <script>
      // ===== State =====
      let currentPage = {{ $posts->currentPage() }};
      const lastPage = {{ $posts->lastPage() }};
      let loading = false;
      let currentCategory = '';
      let currentQ = '';
      let searchTimer = null;
      const userReportedIds = @json($userReportedIds);

      // ===== Chip active styles =====
      function setActiveChip(el) {
        document.querySelectorAll('.nf-chip').forEach((c) => {
          c.classList.remove('nf-chip-active', 'bg-cs_blue', 'text-white', 'border-cs_blue');
          c.classList.add('border-gray-200', 'text-gray-600', 'dark:border-gray-700', 'dark:text-gray-300');
        });
        el.classList.add('nf-chip-active', 'bg-cs_blue', 'text-white', 'border-cs_blue');
        el.classList.remove('border-gray-200', 'text-gray-600', 'dark:border-gray-700', 'dark:text-gray-300');
      }

      // Init active chip styles
      document.querySelectorAll('.nf-chip').forEach((chip) => {
        if (chip.classList.contains('nf-chip-active')) {
          chip.classList.add('bg-cs_blue', 'text-white', 'border-cs_blue');
        }
      });

      // ===== Category filter =====
      document.querySelectorAll('.nf-chip').forEach((chip) => {
        chip.addEventListener('click', function () {
          currentCategory = this.dataset.category || '';
          currentPage = 1;
          setActiveChip(this);
          reloadFeed(true);
        });
      });

      // ===== Search =====
      document.getElementById('nf-search').addEventListener('input', function () {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
          currentQ = this.value.trim();
          currentPage = 1;
          reloadFeed(true);
        }, 400);
      });

      // ===== Load posts from API =====
      async function loadPosts(page, replace = false) {
        if (loading) return;
        loading = true;
        document.getElementById('nf-loader').classList.remove('hidden');

        const params = new URLSearchParams({
          page: page,
          per_page: 12,
        });
        if (currentCategory) params.set('category', currentCategory);
        if (currentQ) params.set('q', currentQ);

        try {
          const res = await fetch(`/api/newfeed/posts?${params}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
          });
          const data = await res.json();

          const feed = document.getElementById('nf-feed');
          if (replace) feed.innerHTML = '';

          if (data.data.length === 0 && replace) {
            feed.innerHTML = `<div class="col-span-full rounded-2xl border border-dashed border-gray-200 py-16 text-center text-sm text-gray-400 dark:border-gray-800">
              <i class="fa-regular fa-folder-open mb-3 block text-3xl"></i>
              Không tìm thấy bài đăng nào.
            </div>`;
          } else {
            data.data.forEach((post) => feed.insertAdjacentHTML('beforeend', renderCard(post)));
          }

          currentPage = data.current_page;
          if (!data.has_more) {
            document.getElementById('nf-sentinel').innerHTML = '<p class="text-xs text-gray-400">Đã xem hết bài</p>';
          }
        } catch (e) {
          console.error('Load posts error:', e);
        } finally {
          loading = false;
          document.getElementById('nf-loader').classList.add('hidden');
        }
      }

      function reloadFeed(replace = true) {
        loadPosts(1, replace);
      }

      // ===== Render card from JSON =====
      function renderCard(post) {
        const isOwner = window._authUserId && window._authUserId === post.user.id;
        const reported = userReportedIds.includes(post.id) || post.is_reported;
        const tick = post.user.is_verified
          ? `<i class="fa-solid fa-circle-check text-cs_blue ml-1 text-xs" title="Tài khoản đã được CheckScam xác minh uy tín"></i>`
          : '';
        const priceHtml =
          post.price && post.price > 0
            ? `<div class="mt-2 text-sm font-black text-cs_red">${Number(post.price).toLocaleString('vi-VN')} VNĐ</div>`
            : '';
        const imageHtml = post.image_url
          ? `<img src="${post.image_url}" alt="" class="mt-3 w-full rounded-xl object-cover" loading="lazy" />`
          : '';
        const actionBtn = window._authUserId
          ? isOwner
            ? `<button onclick="deletePost(${post.id}, this)" class="absolute top-2 right-2 z-10 flex h-7 w-7 items-center justify-center rounded-full bg-red-50 text-xs text-cs_red hover:bg-red-100 dark:bg-red-900/30" title="Xóa bài"><i class="fa-solid fa-xmark"></i></button>`
            : reported
              ? `<button class="absolute top-2 right-2 z-10 flex h-7 w-7 items-center justify-center rounded-full bg-orange-100 text-xs text-orange-500 cursor-not-allowed dark:bg-orange-900/30" title="Đã báo cáo" disabled><i class="fa-solid fa-flag"></i></button>`
              : `<button onclick="openReport(${post.id}, this)" class="absolute top-2 right-2 z-10 flex h-7 w-7 items-center justify-center rounded-full bg-gray-100 text-xs text-gray-400 hover:bg-orange-50 hover:text-orange-500 dark:bg-slate-700" title="Báo cáo"><i class="fa-regular fa-flag"></i></button>`
          : '';

        return `
          <div class="nf-card dark:bg-dark_card relative mb-4 break-inside-avoid overflow-hidden rounded-2xl border border-gray-200 bg-white p-4 shadow-xs dark:border-gray-800" data-id="${post.id}">
            ${actionBtn}
            <div class="flex items-center gap-3 pr-8">
              <img src="${post.user.avatar_url}" alt="" class="h-9 w-9 rounded-full object-cover" />
              <div class="min-w-0">
                <div class="flex items-center text-sm font-bold text-gray-800 dark:text-white">
                  <span class="truncate">${post.user.name}</span>${tick}
                </div>
                <div class="text-[11px] text-gray-400">${post.created_at} · ${post.category}</div>
              </div>
            </div>
            <p class="mt-3 text-sm leading-relaxed text-gray-700 dark:text-gray-300 whitespace-pre-wrap">${escapeHtml(post.content)}</p>
            ${priceHtml}
            ${imageHtml}
          </div>`;
      }

      function escapeHtml(s) {
        return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
      }

      // ===== Infinite scroll =====
      if ({{ $posts->lastPage() }} > 1) {
        const sentinel = document.getElementById('nf-sentinel');
        const observer = new IntersectionObserver(
          (entries) => {
            if (entries[0].isIntersecting && currentPage < lastPage) {
              loadPosts(currentPage + 1, false);
            }
          },
          { threshold: 0.1 }
        );
        observer.observe(sentinel);
      }

      // ===== Popup helpers =====
      function openPopup(id) {
        const el = document.getElementById(id);
        el.classList.remove('hidden');
        el.classList.add('flex');
      }
      function closePopup(id) {
        const el = document.getElementById(id);
        el.classList.remove('flex');
        el.classList.add('hidden');
      }
      document.querySelectorAll('[id^="popup-"]').forEach((popup) => {
        popup.addEventListener('click', function (e) {
          if (e.target === this) closePopup(this.id);
        });
      });

      // ===== Open post form (auth check) =====
      function openPostForm() {
        if (!window._authUserId) {
          openPopup('popup-login');
        } else {
          openPopup('popup-post-form');
        }
      }
      document.getElementById('btn-open-post-form').addEventListener('click', openPostForm);
      document.getElementById('btn-fab').addEventListener('click', openPostForm);

      // ===== Category combobox =====
      const catInput = document.getElementById('nf-category');
      const catDropdown = document.getElementById('nf-cat-dropdown');

      catInput.addEventListener('focus', () => catDropdown.classList.remove('hidden'));
      catInput.addEventListener('blur', () => setTimeout(() => catDropdown.classList.add('hidden'), 200));
      catInput.addEventListener('input', function () {
        const q = this.value.toLowerCase();
        document.querySelectorAll('.nf-cat-option').forEach((opt) => {
          opt.style.display = opt.dataset.value.toLowerCase().includes(q) ? '' : 'none';
        });
        catDropdown.classList.remove('hidden');
        validateForm();
      });
      document.querySelectorAll('.nf-cat-option').forEach((opt) => {
        opt.addEventListener('mousedown', function () {
          catInput.value = this.dataset.value;
          catDropdown.classList.add('hidden');
          validateForm();
        });
      });

      // ===== Content counter + form validation =====
      const nfContent = document.getElementById('nf-content');
      nfContent.addEventListener('input', function () {
        document.getElementById('nf-content-count').textContent = this.value.length;
        validateForm();
      });

      function validateForm() {
        const ok = nfContent.value.trim().length >= 10 && catInput.value.trim().length > 0;
        document.getElementById('btn-submit-post').disabled = !ok;
      }

      // ===== Image upload =====
      document.getElementById('nf-image').addEventListener('change', function () {
        if (this.files && this.files[0]) {
          const reader = new FileReader();
          reader.onload = (e) => {
            document.getElementById('nf-preview-img').src = e.target.result;
            document.getElementById('nf-image-preview').classList.remove('hidden');
            document.getElementById('nf-image-drop').classList.add('hidden');
          };
          reader.readAsDataURL(this.files[0]);
        }
      });
      function clearImage() {
        document.getElementById('nf-image').value = '';
        document.getElementById('nf-image-preview').classList.add('hidden');
        document.getElementById('nf-image-drop').classList.remove('hidden');
      }

      // ===== Format text --
      function formatText(cmd) {
        document.execCommand(cmd);
      }

      // ===== Submit new post =====
      async function submitPost() {
        const btn = document.getElementById('btn-submit-post');
        btn.disabled = true;
        btn.textContent = 'Đang đăng...';

        const fd = new FormData();
        fd.append('content', nfContent.value.trim());
        fd.append('category', catInput.value.trim());
        const price = document.getElementById('nf-price').value;
        if (price) fd.append('price', price);
        const imgFile = document.getElementById('nf-image').files[0];
        if (imgFile) fd.append('image', imgFile);
        fd.append('_token', window._csrfToken);

        try {
          const res = await fetch('/api/newfeed/posts', { method: 'POST', body: fd });
          const data = await res.json();

          if (res.ok) {
            const feed = document.getElementById('nf-feed');
            // Remove empty state if present
            const empty = feed.querySelector('.col-span-full');
            if (empty) empty.remove();

            feed.insertAdjacentHTML('afterbegin', renderCard(data.post));
            closePopup('popup-post-form');
            resetPostForm();
          } else {
            alert(data.message || 'Có lỗi xảy ra khi đăng bài.');
          }
        } catch (e) {
          alert('Kết nối thất bại. Vui lòng thử lại.');
        } finally {
          btn.disabled = false;
          btn.textContent = 'Đăng bài';
        }
      }

      function resetPostForm() {
        nfContent.value = '';
        document.getElementById('nf-content-count').textContent = '0';
        document.getElementById('nf-price').value = '';
        catInput.value = '';
        clearImage();
        validateForm();
      }

      // ===== Delete post =====
      async function deletePost(postId, btn) {
        if (!confirm('Bạn có chắc muốn xóa bài đăng này?')) return;

        try {
          const res = await fetch(`/api/newfeed/posts/${postId}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': window._csrfToken, Accept: 'application/json' },
          });

          if (res.ok) {
            const card = btn.closest('.nf-card');
            card.style.opacity = '0';
            card.style.transform = 'scale(0.95)';
            card.style.transition = 'all 0.2s ease';
            setTimeout(() => card.remove(), 200);
          } else {
            alert('Không thể xóa bài này.');
          }
        } catch (e) {
          alert('Kết nối thất bại.');
        }
      }

      // ===== Report =====
      function openReport(postId, btn) {
        document.getElementById('report-post-id').value = postId;
        document.querySelectorAll('input[name="report-reason"]').forEach((r) => (r.checked = false));
        openPopup('popup-report');
      }

      async function submitReport() {
        const postId = document.getElementById('report-post-id').value;
        const reason = document.querySelector('input[name="report-reason"]:checked')?.value || '';

        try {
          const res = await fetch(`/api/newfeed/posts/${postId}/report`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': window._csrfToken,
              Accept: 'application/json',
            },
            body: JSON.stringify({ reason }),
          });
          const data = await res.json();

          if (res.ok) {
            closePopup('popup-report');
            userReportedIds.push(parseInt(postId));
            // Update icon
            const card = document.querySelector(`.nf-card[data-id="${postId}"]`);
            if (card) {
              const flagBtn = card.querySelector('[title="Báo cáo"]');
              if (flagBtn) {
                flagBtn.setAttribute('title', 'Đã báo cáo');
                flagBtn.disabled = true;
                flagBtn.innerHTML = '<i class="fa-solid fa-flag"></i>';
                flagBtn.className = flagBtn.className
                  .replace('text-gray-400', 'text-orange-500')
                  .replace('hover:bg-orange-50', '')
                  .replace('hover:text-orange-500', '');
              }
            }
          } else {
            alert(data.error || 'Không thể gửi báo cáo.');
          }
        } catch (e) {
          alert('Kết nối thất bại.');
        }
      }
    </script>
  @endpush
@endsection

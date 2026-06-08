@extends('layouts.app')

@section('title', 'Chi tiết bài đăng – Khu Mua Bán – CheckScam')
@section('description', \Illuminate\Support\Str::limit(strip_tags($post->content), 150))

@push('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />
@endpush

@section('content')
  <main class="pb-24">
    <x-breadcrumb
      :links="[
        ['name' => 'Khu Mua Bán', 'url' => route('newfeed.index')],
        ['name' => 'Chi tiết bài đăng', 'url' => '#'],
      ]"
    />

    <div class="mx-auto w-full max-w-2xl px-4 sm:px-6 lg:px-8">
      {{-- Post card --}}
      <div
        class="dark:bg-dark_card relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-800"
      >
        {{-- Action button --}}
        @auth
          @if (auth()->id() === $post->user_id ||auth()->user()->isAdmin())
            <button
              type="button"
              onclick="deletePost({{ $post->id }})"
              class="absolute top-3 right-3 z-10 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-red-50 text-xs text-cs_red transition hover:bg-red-100 dark:bg-red-900/30"
              title="Xóa bài"
            >
              <i class="fa-solid fa-xmark"></i>
            </button>
          @elseif (! in_array($post->id, $userReportedIds))
            <button
              type="button"
              onclick="openReport({{ $post->id }})"
              class="absolute top-3 right-3 z-10 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-gray-100 text-xs text-gray-400 transition hover:bg-orange-50 hover:text-orange-500 dark:bg-slate-700"
              title="Báo cáo"
            >
              <i class="fa-regular fa-flag"></i>
            </button>
          @else
            <button
              type="button"
              class="absolute top-3 right-3 z-10 flex h-8 w-8 cursor-not-allowed items-center justify-center rounded-full bg-orange-100 text-xs text-orange-500 dark:bg-orange-900/30"
              title="Đã báo cáo"
              disabled
            >
              <i class="fa-solid fa-flag"></i>
            </button>
          @endif
        @endauth

        {{-- User info --}}
        <div class="flex items-center gap-3 pr-10">
          <img
            src="{{ $post->user->avatar_url }}"
            alt="{{ $post->user->full_name ?? $post->user->username }}"
            class="h-10 w-10 rounded-full object-cover"
          />
          <div class="min-w-0">
            <div class="flex items-center text-sm font-bold text-gray-800 dark:text-white">
              <span class="truncate">{{ $post->user->full_name ?? $post->user->username }}</span>
              @if ($post->user->is_verified)
                <i
                  class="fa-solid fa-circle-check text-cs_blue ml-1 text-xs"
                  title="Tài khoản đã được CheckScam xác minh uy tín"
                ></i>
              @endif
            </div>
            <div class="text-[11px] text-gray-400">
              {{ $post->created_at->diffForHumans() }} · {{ $post->category }}
            </div>
          </div>
        </div>

        {{-- Full content --}}
        <div class="mt-4 text-sm leading-relaxed text-gray-700 dark:text-gray-300">
          {!! \App\Helpers\StringHelper::formatPostContent($post->content) !!}
        </div>

        {{-- Price --}}
        @if ($post->price && $post->price > 0)
          <div class="mt-3 text-base font-black text-cs_red">{{ number_format($post->price, 0, ',', '.') }} VNĐ</div>
        @endif

        {{-- Image grid --}}
        @php
          $imageCount = count($imageUrls);
          $showCount = min($imageCount, 4);
          $extraCount = $imageCount - $showCount;
        @endphp

        @if ($imageCount > 0)
          @php
            $gridClass = $showCount === 1 ? 'grid-cols-1' : 'grid-cols-2';
          @endphp

          <div class="mt-4 grid gap-1 {{ $gridClass }}">
            @foreach (array_slice($imageUrls, 0, $showCount) as $idx => $url)
              @php
                $isLast = $idx === $showCount - 1;
                $hasMore = $isLast && $extraCount > 0;
                $spanClass = $showCount === 3 && $idx === 0 ? 'col-span-2' : '';
                $heightClass = $showCount === 1 ? 'max-h-96' : 'h-44';
              @endphp

              <a
                href="{{ $url }}"
                data-fancybox="post-gallery"
                class="relative block overflow-hidden rounded-lg {{ $spanClass }} {{ $heightClass }}"
              >
                <img src="{{ $url }}" alt="" class="h-full w-full object-cover" loading="lazy" />
                @if ($hasMore)
                  <div class="absolute inset-0 flex items-center justify-center rounded-lg bg-black/50">
                    <span class="text-2xl font-black text-white">+{{ $extraCount }}</span>
                  </div>
                @endif
              </a>
            @endforeach
          </div>

          {{-- Hidden anchors for remaining images --}}
          @foreach (array_slice($imageUrls, $showCount) as $url)
            <a href="{{ $url }}" data-fancybox="post-gallery" class="hidden"></a>
          @endforeach
        @endif
      </div>

      {{-- Back link --}}
      <div class="mt-4 text-center">
        <a href="{{ route('newfeed.index') }}" class="text-sm text-gray-400 hover:text-cs_blue transition">
          <i class="fa-solid fa-arrow-left mr-1"></i>
          Quay lại Khu Mua Bán
        </a>
      </div>
    </div>
  </main>

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
        <h3 class="text-base font-black text-gray-800 dark:text-white">Bạn cần đăng nhập</h3>
      </div>
      <a
        href="{{ route('auth.google') }}"
        class="flex w-full cursor-pointer items-center justify-center gap-3 rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm font-bold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-200"
      >
        Đăng nhập với Google
      </a>
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
      <p class="mb-4 text-xs font-semibold text-gray-400">Vui lòng chọn lý do báo cáo.</p>
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
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js"></script>
    <script>
      Fancybox.bind('[data-fancybox="post-gallery"]', {
        animated: true,
        showClass: 'f-fadeIn',
        hideClass: 'f-fadeOut',
        Images: { zoom: true },
      });

      function closePopup(id) {
        document.getElementById(id).classList.replace('flex', 'hidden');
      }
      function openPopup(id) {
        document.getElementById(id).classList.replace('hidden', 'flex');
      }
      document.querySelectorAll('[id^="popup-"]').forEach(function (el) {
        el.addEventListener('click', function (e) {
          if (e.target === el) closePopup(el.id);
        });
      });

      function openReport(postId) {
        document.getElementById('report-post-id').value = postId;
        document.querySelectorAll('input[name="report-reason"]').forEach(function (r) {
          r.checked = false;
        });
        document.getElementById('btn-submit-report').disabled = true;
        openPopup('popup-report');
      }
      document.addEventListener('change', function (e) {
        if (e.target.name === 'report-reason') {
          document.getElementById('btn-submit-report').disabled = false;
        }
      });

      function submitReport() {
        const postId = document.getElementById('report-post-id').value;
        const reason = document.querySelector('input[name="report-reason"]:checked')?.value;
        if (!reason) return;
        fetch('/api/newfeed/posts/' + postId + '/report', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window._csrfToken,
            Accept: 'application/json',
          },
          body: JSON.stringify({ reason: reason }),
        })
          .then(function (r) {
            if (r.ok) {
              closePopup('popup-report');
              location.reload();
            } else
              r.json().then(function (d) {
                alert(d.error || 'Không thể gửi báo cáo.');
              });
          })
          .catch(function () {
            alert('Không thể gửi báo cáo.');
          });
      }

      function deletePost(postId) {
        if (!confirm('Bạn có chắc muốn xóa bài đăng này?')) return;
        fetch('/api/newfeed/posts/' + postId, {
          method: 'DELETE',
          headers: { 'X-CSRF-TOKEN': window._csrfToken, Accept: 'application/json' },
        })
          .then(function (r) {
            if (r.ok) {
              window.location.href = '/newfeed';
            } else alert('Không thể xóa bài này.');
          })
          .catch(function () {
            alert('Không thể xóa bài này.');
          });
      }
    </script>
  @endpush
@endsection

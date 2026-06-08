@php
  $imageUrls = [];
  if (! empty($post->image_paths)) {
    $imageUrls = array_map(fn ($p) => asset('storage/' . $p), $post->image_paths);
  } elseif ($post->image_path) {
    $imageUrls = [asset('storage/' . $post->image_path)];
  }
  $imageCount = count($imageUrls);
  $showCount = min($imageCount, 4);
  $extraCount = $imageCount - $showCount;

  $fullContent = \App\Helpers\StringHelper::formatPostContent($post->content);
  $truncate = mb_strlen($post->content) > 200;
  $shortContent = $truncate
    ? \App\Helpers\StringHelper::formatPostContent(mb_substr($post->content, 0, 200))
    : $fullContent;
@endphp

<div
  class="nf-card dark:bg-dark_card relative mb-4 break-inside-avoid overflow-hidden rounded-2xl border border-gray-200 bg-white p-4 shadow-xs dark:border-gray-800"
  data-id="{{ $post->id }}"
>
  {{-- Action button --}}
  @auth
    @if (auth()->id() === $post->user_id ||auth()->user()->isAdmin())
      <button
        type="button"
        onclick="deletePost({{ $post->id }}, this)"
        class="absolute top-2 right-2 z-10 flex h-7 w-7 cursor-pointer items-center justify-center rounded-full bg-red-50 text-xs text-cs_red transition hover:bg-red-100 dark:bg-red-900/30"
        title="Xóa bài"
      >
        <i class="fa-solid fa-xmark"></i>
      </button>
    @elseif (! in_array($post->id, $userReportedIds))
      <button
        type="button"
        onclick="openReport({{ $post->id }}, this)"
        class="absolute top-2 right-2 z-10 flex h-7 w-7 cursor-pointer items-center justify-center rounded-full bg-gray-100 text-xs text-gray-400 transition hover:bg-orange-50 hover:text-orange-500 dark:bg-slate-700"
        title="Báo cáo"
      >
        <i class="fa-regular fa-flag"></i>
      </button>
    @else
      <button
        type="button"
        class="absolute top-2 right-2 z-10 flex h-7 w-7 cursor-not-allowed items-center justify-center rounded-full bg-orange-100 text-xs text-orange-500 dark:bg-orange-900/30"
        title="Đã báo cáo"
        disabled
      >
        <i class="fa-solid fa-flag"></i>
      </button>
    @endif
  @endauth

  {{-- User info --}}
  <div class="flex items-center gap-3 pr-8">
    <img
      src="{{ $post->user->avatar_url }}"
      alt="{{ $post->user->full_name ?? $post->user->username }}"
      class="h-9 w-9 rounded-full object-cover"
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
      <div class="text-[11px] text-gray-400">{{ $post->created_at->diffForHumans() }} · {{ $post->category }}</div>
    </div>
  </div>

  {{-- Content with truncation --}}
  <div class="mt-3 text-sm leading-relaxed text-gray-700 dark:text-gray-300">
    {!! $shortContent !!}
    @if ($truncate)
      <span class="text-gray-400">...</span>
      <a href="{{ route('newfeed.show', $post->id) }}" class="text-cs_blue ml-1 font-semibold hover:underline">
        Xem thêm
      </a>
    @endif
  </div>

  {{-- Price --}}
  @if ($post->price && $post->price > 0)
    <div class="mt-2 text-sm font-black text-cs_red">{{ number_format($post->price, 0, ',', '.') }} VNĐ</div>
  @endif

  {{-- Image grid --}}
  @if ($imageCount > 0)
    @php
      $gridClass = match ($showCount) {
        1 => 'grid-cols-1',
        2 => 'grid-cols-2',
        default => 'grid-cols-2',
      };
      $firstColSpan = $showCount === 3 ? 'col-span-2' : '';
    @endphp

    <div class="mt-3 grid gap-1 {{ $gridClass }}">
      @foreach (array_slice($imageUrls, 0, $showCount) as $idx => $url)
        @php
          $isLast = $idx === $showCount - 1;
          $hasMore = $isLast && $extraCount > 0;
          $spanClass = $showCount === 3 && $idx === 0 ? 'col-span-2' : '';
          $heightClass = $showCount === 1 ? 'max-h-72' : 'h-36';
        @endphp

        <a
          href="{{ route('newfeed.show', $post->id) }}"
          class="relative block overflow-hidden rounded-lg {{ $spanClass }} {{ $heightClass }}"
          data-fancybox="gallery-{{ $post->id }}"
          data-src="{{ $url }}"
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

    {{-- Hidden anchors for remaining images (Fancybox gallery) --}}
    @foreach (array_slice($imageUrls, $showCount) as $url)
      <a href="{{ $url }}" data-fancybox="gallery-{{ $post->id }}" class="hidden"></a>
    @endforeach
  @endif
</div>

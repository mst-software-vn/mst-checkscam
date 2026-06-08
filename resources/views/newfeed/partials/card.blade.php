<div
  class="nf-card dark:bg-dark_card relative mb-4 break-inside-avoid overflow-hidden rounded-2xl border border-gray-200 bg-white p-4 shadow-xs dark:border-gray-800"
  data-id="{{ $post->id }}"
>
  {{-- Action button --}}
  @auth
    @if (auth()->id() === $post->user_id ||auth()->user()->isAdmin())
      <form
        action="/api/newfeed/posts/{{ $post->id }}"
        method="POST"
        class="nf-delete-form absolute top-2 right-2 z-10"
      >
        @csrf
        @method('DELETE')
        <button
          type="button"
          onclick="deletePostSSR({{ $post->id }}, this)"
          class="flex h-7 w-7 items-center justify-center rounded-full bg-red-50 text-xs text-cs_red hover:bg-red-100 dark:bg-red-900/30"
          title="Xóa bài"
        >
          <i class="fa-solid fa-xmark"></i>
        </button>
      </form>
    @elseif (! in_array($post->id, $userReportedIds))
      <button
        onclick="openReport({{ $post->id }}, this)"
        class="absolute top-2 right-2 z-10 flex h-7 w-7 items-center justify-center rounded-full bg-gray-100 text-xs text-gray-400 hover:bg-orange-50 hover:text-orange-500 dark:bg-slate-700"
        title="Báo cáo"
      >
        <i class="fa-regular fa-flag"></i>
      </button>
    @else
      <button
        class="absolute top-2 right-2 z-10 flex h-7 w-7 items-center justify-center rounded-full bg-orange-100 text-xs text-orange-500 cursor-not-allowed dark:bg-orange-900/30"
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

  {{-- Content --}}
  <p class="mt-3 text-sm leading-relaxed text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $post->content }}</p>

  {{-- Price --}}
  @if ($post->price && $post->price > 0)
    <div class="mt-2 text-sm font-black text-cs_red">{{ number_format($post->price, 0, ',', '.') }} VNĐ</div>
  @endif

  {{-- Image --}}
  @if ($post->image_path)
    <img
      src="{{ asset('storage/' . $post->image_path) }}"
      alt=""
      class="mt-3 w-full rounded-xl object-cover"
      loading="lazy"
    />
  @endif
</div>

@foreach ($comments as $cmt)
    <div class="dark:bg-dark_card rounded-2xl border border-gray-100 bg-white p-5 shadow-xs dark:border-gray-800">
        <div class="mb-4 flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($cmt->display_name) }}&background={{ substr(md5($cmt->display_name), 0, 6) }}&color=fff&size=40"
                class="h-10 w-10 rounded-full border-2 border-gray-50 dark:border-gray-800" alt="User" />
            <div>
                <h4 class="text-sm font-bold text-gray-800 dark:text-gray-100">
                    {{ $cmt->display_name }}
                </h4>
                <span class="text-[10px] font-medium text-gray-400 dark:text-gray-500">
                    {{ $cmt->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
        <p class="mb-4 line-clamp-2 text-xs leading-relaxed text-gray-600 italic dark:text-gray-400">
            "{{ $cmt->content }}"
        </p>
        <div class="flex items-center justify-between border-t border-gray-50 pt-3 dark:border-gray-800">
            <span class="text-[10px] font-bold tracking-tighter text-gray-400 uppercase dark:text-gray-500">
                Đối tượng:
            </span>
            @if ($cmt->report)
                <a href="/{{ $cmt->report->slug }}"
                    class="text-cs_red rounded bg-red-50 px-2 py-0.5 text-[10px] font-black transition-colors hover:bg-red-100 dark:bg-red-900/20">
                    {{ $cmt->report->target_id }}
                </a>
            @else
                <span class="text-cs_red rounded bg-red-50 px-2 py-0.5 text-[10px] font-black dark:bg-red-900/20">
                    N/A
                </span>
            @endif
        </div>
    </div>
@endforeach

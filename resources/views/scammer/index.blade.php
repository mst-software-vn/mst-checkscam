@extends("layouts.app")

@section("content")
<!-- Hero Section -->
<section class="dark:bg-dark_bg md:pd-24 pb-12">
    <x-breadcrumb :links="[['name' => 'Chi tiết: ' . ($report->target_name ?? $report->target_id)]]" />

    <x-hero :stats="$stats" />
</section>
<main class="relative z-30 mx-auto -mt-4 w-full max-w-6xl grow px-4 pb-16 sm:px-6 md:mt-0">
    <div class="flex flex-col gap-6 lg:flex-row">
        <!-- Left Column: Main Info (8/12) -->
        <div class="w-full space-y-6 lg:w-8/12">
            <!-- Main Scam Detail Card -->
            <div
                class="dark:bg-dark_card overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm dark:border-gray-800">
                <!-- Subtle Gradient Header -->
                <div
                    class="flex items-center justify-between border-b border-gray-50 bg-linear-to-r from-red-50/30 to-transparent px-6 py-4 dark:border-gray-800 dark:from-red-900/5">
                    <div class="flex items-center gap-3">
                        <div class="bg-cs_red/10 text-cs_red flex h-9 w-9 items-center justify-center rounded-xl">
                            <i class="fa-solid fa-user-slash text-sm"></i>
                        </div>
                        <div>
                            <h2
                                class="text-xs leading-none font-bold tracking-tight text-gray-800 uppercase md:text-sm dark:text-gray-100">
                                Chi tiết đối tượng lừa đảo
                            </h2>
                            <span class="mt-1 block text-[9px] font-bold tracking-widest text-gray-400 uppercase">
                                Mã vụ việc: #CS-{{ $report->id }}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span
                            class="bg-cs_red rounded px-2 py-0.5 text-[9px] font-bold tracking-tighter text-white uppercase">
                            Bị tố cáo
                        </span>
                    </div>
                </div>

                <div class="p-0">
                    <div class="divide-y divide-gray-50 dark:divide-gray-800/50">
                        <!-- Field: Chủ TK -->
                        <div
                            class="group flex items-center p-4 transition-colors hover:bg-gray-50/30 dark:hover:bg-slate-800/30">
                            <div
                                class="group-hover:text-cs_blue flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors md:h-10 md:w-10 dark:bg-slate-800">
                                <i class="fa-solid fa-id-card text-sm md:text-base"></i>
                            </div>
                            <div class="ml-3 flex-1 md:ml-4">
                                <p
                                    class="mb-1 text-[9px] leading-none font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    Chủ tài khoản
                                </p>
                                <h3 class="text-sm font-bold text-gray-800 uppercase md:text-base dark:text-gray-100">
                                    {{ $report->target_name ?? 'Chưa rõ thông tin' }}
                                </h3>
                            </div>
                            <button data-copy="{{ $report->target_name ?? '' }}"
                                onclick="{ const text = this.getAttribute('data-copy'); navigator.clipboard.writeText(text).then(() => alert('Đã sao chép: ' + text)); }"
                                class="hover:text-cs_blue flex h-7 w-7 items-center justify-center rounded border border-gray-100 bg-white text-gray-400 shadow-sm transition-all active:scale-95 dark:border-gray-700 dark:bg-slate-800 cursor-pointer">
                                <i class="fa-regular fa-copy text-xs"></i>
                            </button>
                        </div>

                        <!-- Field: STK (Highlight) -->
                        <div
                            class="group relative flex items-center overflow-hidden bg-red-50/5 p-4 transition-colors hover:bg-red-50/20 dark:bg-red-900/5 dark:hover:bg-red-900/10">
                            <div class="bg-cs_red absolute top-0 bottom-0 left-0 w-1 opacity-40"></div>
                            <div
                                class="text-cs_red flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-100/50 md:h-10 md:w-10 dark:bg-red-900/20">
                                <i class="fa-solid fa-credit-card text-sm md:text-base"></i>
                            </div>
                            <div class="ml-3 flex-1 md:ml-4">
                                <p
                                    class="text-cs_red/60 mb-1 text-[9px] leading-none font-bold tracking-widest uppercase">
                                    Số tài khoản / SĐT lừa đảo
                                </p>
                                <div class="flex items-center gap-2">
                                    <h3
                                        class="text-base font-bold tracking-widest text-gray-900 md:text-xl dark:text-gray-300">
                                        {{ $report->target_id }}
                                    </h3>
                                    @if($report->target_bank)
                                    <span
                                        class="rounded border border-gray-200 bg-gray-100 px-1 py-0.5 text-[8px] font-bold text-gray-400 uppercase dark:border-gray-700 dark:bg-slate-800">
                                        {{ $report->target_bank }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button data-copy="{{ $report->target_id ?? '' }}"
                                onclick="{ const text = this.getAttribute('data-copy'); navigator.clipboard.writeText(text).then(() => alert('Đã sao chép: ' + text)); }"
                                class="hover:text-cs_blue flex h-7 w-7 items-center justify-center rounded border border-gray-100 bg-white text-gray-400 shadow-sm transition-all active:scale-95 dark:border-gray-700 dark:bg-slate-800 cursor-pointer">
                                <i class="fa-regular fa-copy text-xs"></i>
                            </button>
                        </div>

                        <!-- Field: Scam Amount -->
                        <div
                            class="group flex items-center p-4 transition-colors hover:bg-gray-50/30 dark:hover:bg-slate-800/30">
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-orange-100 text-orange-500 md:h-10 md:w-10 dark:bg-orange-900/20">
                                <i class="fa-solid fa-hand-holding-dollar text-sm md:text-base"></i>
                            </div>
                            <div class="ml-3 flex-1 md:ml-4">
                                <p
                                    class="mb-1 text-[9px] leading-none font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    Hình thức / Danh mục lừa đảo
                                </p>
                                <h3 class="text-sm font-bold text-orange-600 uppercase md:text-lg dark:text-orange-400">
                                    {{ $report->category ?? 'Không xác định' }}
                                </h3>
                            </div>
                        </div>

                        <!-- Field: Social Links -->
                        <div
                            class="group flex items-center p-4 transition-colors hover:bg-gray-50/30 dark:hover:bg-slate-800/30">
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-400 md:h-10 md:w-10 dark:bg-slate-800">
                                <i class="fa-solid fa-share-nodes text-sm md:text-base"></i>
                            </div>
                            <div class="ml-3 flex-1 md:ml-4">
                                <p
                                    class="mb-1 text-[9px] leading-none font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    Loại báo cáo
                                </p>
                                <h3
                                    class="mt-1 text-sm font-bold text-gray-600 uppercase md:text-base dark:text-gray-300">
                                    {{ $report->type == 'account' ? 'Tài khoản Ngân hàng / SĐT' : 'Website / Đường dẫn' }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reporter Information Section (New) -->
            <div
                class="dark:bg-dark_card group relative overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm dark:border-gray-800">
                <div class="absolute top-0 right-0 p-4 opacity-5 transition-opacity group-hover:opacity-10">
                    <i class="fa-solid fa-shield-halved text-6xl"></i>
                </div>
                <div
                    class="border-b border-gray-50 bg-linear-to-r from-blue-50/30 to-transparent px-6 py-4 dark:border-gray-800 dark:from-blue-900/5">
                    <div class="flex items-center gap-3">
                        <div class="bg-cs_blue/10 text-cs_blue flex h-9 w-9 items-center justify-center rounded-xl">
                            <i class="fa-solid fa-user-shield text-sm"></i>
                        </div>
                        <div>
                            <h2
                                class="text-xs leading-none font-bold tracking-tight text-gray-800 uppercase md:text-sm dark:text-gray-100">
                                Thông tin người tố cáo
                            </h2>
                            <span class="mt-1 block text-[9px] font-bold tracking-widest text-gray-400 uppercase">
                                Bảo mật thông tin cá nhân
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-100 bg-gray-50 text-gray-400 dark:border-gray-700/50 dark:bg-slate-800/50">
                                <i class="fa-solid fa-user-tag text-sm"></i>
                            </div>
                            <div>
                                <p class="mb-0.5 text-[10px] font-bold tracking-widest text-gray-400 uppercase">
                                    Họ tên
                                </p>
                                <p class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $displayReporterName }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-100 bg-gray-50 text-gray-400 dark:border-gray-700/50 dark:bg-slate-800/50">
                                <i class="fa-solid fa-phone-volume text-sm"></i>
                            </div>
                            <div>
                                <p class="mb-0.5 text-[10px] font-bold tracking-widest text-gray-400 uppercase">
                                    Số điện thoại
                                </p>
                                <p class="text-sm font-bold text-gray-700 dark:text-gray-200">
                                    {{ $report->is_anonymous ? '******' : ($report->reporter_contact ?: 'Không cung cấp') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Evidence Section -->
            <div
                class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800">
                <div class="mb-6 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="bg-cs_blue h-4 w-0.5 rounded-full"></div>
                        <h2 class="text-xs font-bold tracking-tight text-gray-800 uppercase dark:text-gray-100">
                            Tài liệu & Bằng chứng
                        </h2>
                    </div>
                    <span class="text-[9px] font-bold tracking-widest text-gray-400 uppercase">
                        Tải lên: {{ \Carbon\Carbon::parse($report->created_at)->locale('vi')->diffForHumans() }}
                    </span>
                </div>

                <div class="relative grid grid-cols-2 gap-3 sm:grid-cols-4">
                    @if(!empty($report->evidence_images))
                    @foreach($report->evidence_images as $index => $image)
                    <div
                        class="group relative aspect-square cursor-zoom-in overflow-hidden rounded-2xl border border-gray-100 bg-gray-50 dark:border-gray-800">
                        <div
                            class="pointer-events-none absolute inset-0 bg-slate-900/20 transition-all duration-500 group-hover:bg-transparent">
                        </div>
                        <img src="{{ asset('storage/' . $image) }}"
                            class="evidence-img h-full w-full object-cover transition-all duration-500"
                            data-src="{{ asset('storage/' . $image) }}" data-index="{{ $index }}" alt="Proof" />
                    </div>
                    @endforeach
                    @else
                    <div class="col-span-full p-4 text-center text-sm text-gray-500">
                        Không có hình ảnh hoặc tài liệu đính kèm.
                    </div>
                    @endif

                    <!-- Subtle SCAMMER Watermark -->
                    <div
                        class="pointer-events-none absolute top-1/2 left-1/2 z-10 flex w-full -translate-x-1/4 -translate-y-1/2 -rotate-12 justify-center opacity-10">
                        <div
                            class="border-cs_red text-cs_red rounded-xl border-2 px-4 py-2 text-xl font-bold tracking-[6px] uppercase md:rounded-2xl md:border-4 md:px-6 md:py-3 md:text-4xl md:tracking-[12px]">
                            SCAMMER
                        </div>
                    </div>
                </div>

                <div
                    class="mt-6 rounded-2xl border border-blue-50/50 bg-blue-50/30 p-4 dark:border-blue-900/10 dark:bg-blue-900/5">
                    <div class="flex items-start gap-3">
                        <div class="text-cs_blue mt-0.5">
                            <i class="fa-solid fa-quote-left text-sm opacity-40"></i>
                        </div>
                        <p class="text-[11px] leading-relaxed font-medium text-gray-600 md:text-xs dark:text-gray-300">
                            "{{ $report->description }}"
                        </p>
                    </div>
                </div>
            </div>

            <!-- Related Reports Area (Enlarged) -->
            <div
                class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800">
                <div class="mb-8 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="bg-cs_red h-5 w-1 rounded-full"></div>
                        <h2 class="text-sm font-bold tracking-tight text-gray-800 uppercase dark:text-gray-100">
                            Cảnh báo liên quan mật thiết
                        </h2>
                    </div>
                    <span
                        class="text-cs_red rounded-lg bg-red-100/50 px-3 py-1 text-xs font-bold uppercase dark:bg-red-900/20">
                        CÙNG HỆ SINH THÁI
                    </span>
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    @forelse($relatedReports as $related)
                    <a href="{{ route('scammer.show', $related->slug) }}" class="hover:border-cs_red group cursor-pointer rounded-2xl border border-gray-100 bg-gray-50/50 p-4
                    transition-all md:p-5 dark:border-gray-800/50 dark:bg-slate-800/50">
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between">
                                <div
                                    class="text-cs_red flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-base shadow-sm transition-transform group-hover:scale-110 dark:bg-red-900/20">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <span
                                    class="text-[10px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    #CS-{{ $related->id }}
                                </span>
                            </div>
                            <div>
                                <h4
                                    class="group-hover:text-cs_red mb-1.5 text-xs font-bold text-gray-800 uppercase transition-colors md:text-sm dark:text-gray-200">
                                    {{ $related->category ?? 'Chưa phân loại' }}
                                </h4>
                                <p class="line-clamp-2 text-[11px] leading-relaxed text-gray-500 italic md:text-xs">
                                    "{{ $related->description }}"
                                </p>
                            </div>
                            <div
                                class="mt-1 flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-700/50">
                                <span class="text-[10px] font-bold tracking-tighter text-gray-400 uppercase">
                                    {{ $related->created_at->format('d/m/Y') }}
                                </span>
                                <span class="text-cs_red text-xs font-bold">
                                    {{ $related->view_count }} lượt xem
                                </span>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="col-span-2 w-full py-6 text-center text-sm text-gray-400">
                        Chưa có vụ liên quan nào khác.
                    </div>
                    @endforelse
                </div>

                @if($relatedReports->count() > 0)
                <a href="{{ route('home') }}" class="mt-8 block w-full rounded-2xl border border-dashed border-gray-200 py-3.5 text-center text-xs
                font-bold tracking-widest text-gray-400 uppercase transition-colors hover:bg-gray-50
                dark:border-gray-700 dark:hover:bg-slate-800">
                    Xem tất cả vụ liên quan ({{ $reportsCount - 1 }})
                </a>
                @endif
            </div>

            <!-- Comments System (New Section) -->
            <div
                class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800">
                <div class="mb-10 flex items-center gap-2">
                    <div class="bg-cs_blue h-5 w-1 rounded-full"></div>
                    <h2 class="text-sm font-bold tracking-tight text-gray-800 uppercase dark:text-gray-100">
                        Cộng đồng bình luận (12)
                    </h2>
                </div>

                <!-- Comment Input -->
                <div class="mb-10">
                    <div class="flex gap-3 md:gap-4">
                        <div
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-gray-100 bg-gray-100 md:h-11 md:w-11 dark:border-gray-700 dark:bg-slate-800">
                            <i class="fa-solid fa-user text-sm text-gray-400 md:text-base"></i>
                        </div>
                        <div class="flex-1">
                            <textarea rows="2"
                                class="focus:ring-cs_blue focus:border-cs_blue w-full resize-none rounded-2xl border border-gray-100 bg-gray-50/50 p-3 text-sm text-gray-600 transition-all outline-none focus:ring-1 md:p-4 dark:border-gray-800 dark:bg-slate-900 dark:text-gray-300"
                                placeholder="Chia sẻ thêm thông tin..."></textarea>
                            <div class="mt-3 flex justify-end">
                                <button
                                    class="bg-cs_blue cursor-pointer rounded-xl px-6 py-2 text-[10px] font-bold text-white uppercase shadow-lg shadow-blue-500/10 transition-all hover:bg-blue-600 active:scale-95 md:px-8 md:py-2.5 md:text-xs">
                                    Gửi bình luận
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comment List -->
                <div class="space-y-8">
                    <!-- Single Comment -->
                    <div class="group flex gap-3 md:gap-4">
                        <div
                            class="from-cs_blue flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gradient-to-tr to-blue-400 text-[10px] font-bold text-white shadow-sm md:h-11 md:w-11 md:text-sm">
                            AN
                        </div>
                        <div class="flex-1">
                            <div
                                class="rounded-2xl rounded-tl-none border border-gray-50 bg-gray-50/50 p-4 dark:border-gray-800/50 dark:bg-slate-900/50">
                                <div class="mb-3 flex flex-col justify-between gap-2 sm:flex-row sm:items-center">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="text-xs font-bold tracking-tight text-gray-800 uppercase dark:text-gray-100">
                                            Người dùng ẩn danh
                                        </span>
                                    </div>
                                    <span class="text-[9px] font-bold tracking-tighter text-gray-400 uppercase">
                                        1 giờ trước
                                    </span>
                                </div>
                                <p
                                    class="text-[13px] leading-relaxed font-medium text-gray-600 md:text-sm dark:text-gray-400">
                                    Chuẩn rồi, thằng này chuyên môn dùng chiêu bài giả mạo admin group Telegram để
                                    lùa gà. Tôi cũng vừa bị nó hụt 200k tiền cọc. May mà search được web này kịp.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Comment -->
                    <div class="group flex gap-3 md:gap-4">
                        <div
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-200 text-[10px] font-bold text-gray-500 md:h-11 md:w-11 md:text-sm dark:bg-slate-800 dark:text-gray-400">
                            TV
                        </div>
                        <div class="flex-1">
                            <div
                                class="rounded-2xl rounded-tl-none border border-gray-50 bg-gray-50/50 p-4 dark:border-gray-800/50 dark:bg-slate-900/50">
                                <div class="mb-3 flex flex-col justify-between gap-2 sm:flex-row sm:items-center">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="text-xs font-bold tracking-tight text-gray-800 uppercase dark:text-gray-100">
                                            Trung Van 9x
                                        </span>
                                    </div>
                                    <span class="text-[9px] font-bold tracking-tighter text-gray-400 uppercase">
                                        3 giờ trước
                                    </span>
                                </div>
                                <p
                                    class="text-[13px] leading-relaxed font-medium text-gray-600 md:text-sm dark:text-gray-400">
                                    Anh em report mạnh tay vào để nó bay màu luôn nhé. Cảm ơn admin đã cập nhật
                                    thông tin kịp thời.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Stats & Sidebar (4/12) -->
        <div class="w-full space-y-6 lg:w-4/12">
            <!-- Quick Stats Box -->
            <div
                class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800">
                <div class="space-y-6">
                    <!-- Community Trust Summary Section -->
                    <div class="space-y-4">
                        <!-- Verification Status -->
                        <div
                            class="border-cs_red/20 group relative overflow-hidden rounded-2xl border-2 bg-red-50 p-4 text-center dark:bg-red-900/10">
                            <div class="bg-cs_red/5 absolute top-0 right-0 -mt-8 -mr-8 h-16 w-16 rounded-full"></div>
                            <span class="text-cs_red/60 mb-1 block text-[10px] font-bold tracking-[2px] uppercase">
                                Trạng thái xác minh
                            </span>
                            <h3 class="text-cs_red text-xl font-bold tracking-tighter uppercase">
                                CẢNH BÁO LỪA ĐẢO
                            </h3>
                            <div class="mt-2 flex items-center justify-center gap-1">
                                <div class="bg-cs_red h-1.5 w-1.5 animate-pulse rounded-full"></div>
                                <span class="text-cs_red/80 text-[9px] font-bold uppercase">
                                    Dữ liệu đã được kiểm duyệt
                                </span>
                            </div>
                        </div>

                        <!-- Key Evidence Points -->
                        <div class="grid grid-cols-1 gap-2.5">
                            <div
                                class="hover:border-cs_blue/30 group flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50 p-3.5 transition-all dark:border-gray-800 dark:bg-slate-800/40">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="bg-cs_blue/10 text-cs_blue flex h-8 w-8 items-center justify-center rounded-lg transition-transform group-hover:scale-110">
                                        <i class="fa-solid fa-file-shield text-xs"></i>
                                    </div>
                                    <span class="text-xs font-bold text-gray-500 dark:text-gray-400">
                                        Tài liệu bằng chứng
                                    </span>
                                </div>
                                <span
                                    class="text-xs font-bold text-gray-800 dark:text-gray-300">{{ count($report->evidence_images ?? []) }}
                                    Bản</span>
                            </div>

                            <div
                                class="hover:border-cs_red/30 group flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50 p-3.5 transition-all dark:border-gray-800 dark:bg-slate-800/40">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="bg-cs_red/10 text-cs_red flex h-8 w-8 items-center justify-center rounded-lg transition-transform group-hover:scale-110">
                                        <i class="fa-solid fa-user-check text-xs"></i>
                                    </div>
                                    <span class="text-xs font-bold text-gray-500 dark:text-gray-400">
                                        Số lần bị tố cáo
                                    </span>
                                </div>
                                <span
                                    class="text-xs font-bold text-gray-800 dark:text-gray-300">{{ str_pad($reportsCount, 2, '0', STR_PAD_LEFT) }}
                                    Lần</span>
                            </div>

                            <div
                                class="group flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50 p-3.5 transition-all hover:border-gray-300 dark:border-gray-800 dark:bg-slate-800/40">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-gray-100 text-gray-400 transition-transform group-hover:scale-110 dark:bg-slate-700">
                                        <i class="fa-solid fa-chart-line text-xs"></i>
                                    </div>
                                    <span class="text-xs font-bold text-gray-500 dark:text-gray-400">
                                        Độ phổ biến tra cứu
                                    </span>
                                </div>
                                <span class="text-xs font-bold text-gray-800 dark:text-gray-300">
                                    @if($totalSearchCount >= 10)
                                    Rất cao
                                    @elseif($totalSearchCount >= 5)
                                    Cao
                                    @elseif($totalSearchCount >= 3)
                                    Trung bình
                                    @else
                                    Thấp
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div
                            class="rounded-xl border border-blue-50 bg-blue-50/20 p-3 dark:border-blue-900/10 dark:bg-blue-900/5">
                            <p class="text-[10px] leading-relaxed font-medium text-gray-400">
                                <i class="fa-solid fa-circle-info text-cs_blue mr-1 opacity-60"></i>
                                Hệ thống tự động xếp hạng dựa trên sự trùng khớp dữ liệu từ các báo cáo độc lập.
                            </p>
                        </div>
                    </div>

                    <div class="h-px bg-gray-50 dark:bg-gray-800"></div>

                    <div class="grid grid-cols-2 gap-4">
                        <div
                            class="group hover:border-cs_blue rounded-2xl border border-gray-100 bg-gray-50 p-4 text-center transition-colors dark:border-gray-800/50 dark:bg-slate-800/10">
                            <span class="mb-1 block text-xs font-bold tracking-tighter text-gray-400 uppercase">
                                Lượt xem
                            </span>
                            <span
                                class="group-hover:text-cs_blue text-lg font-bold text-gray-800 transition-colors dark:text-gray-100">
                                {{ str_pad($report->view_count, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>
                        <div
                            class="text-cs_red group hover:border-cs_red rounded-2xl border border-gray-100 bg-gray-50 p-4 text-center transition-colors dark:border-gray-800/50 dark:bg-slate-800/10">
                            <span class="mb-1 block text-xs font-bold tracking-tighter uppercase opacity-60">
                                Lượt tìm kiếm
                            </span>
                            <span
                                class="inline-block font-mono text-lg font-bold transition-transform group-hover:scale-110">
                                {{ str_pad($totalSearchCount, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-1 gap-3">
                <a href="/to-cao-lua-dao"
                    class="bg-cs_blue overflow-hidden rounded-2xl py-4 text-center text-xs font-bold tracking-widest text-white uppercase transition-all duration-300">
                    <i class="fa-regular fa-paper-plane text-base"></i>
                    NGƯỜI NÀY CŨNG SCAM TÔI
                </a>
                <div class="flex gap-2.5">
                    <button
                        class="flex flex-1 items-center justify-center gap-2 rounded-2xl border border-gray-100 bg-white py-3 text-xs font-bold tracking-tighter text-gray-500 uppercase transition-all hover:bg-gray-50 dark:border-gray-700 dark:bg-slate-800 dark:hover:bg-slate-700">
                        <i class="fa-solid fa-share-nodes text-sm"></i>
                        Share
                    </button>
                    <a href="/giai-quyet-khieu-nai"
                        class="text-cs_red flex flex-1 items-center justify-center gap-2 rounded-2xl border border-gray-100 bg-white py-3 text-xs font-bold tracking-widest uppercase transition-all hover:bg-red-50 dark:border-gray-700 dark:bg-slate-800 dark:hover:bg-red-900/20">
                        <i class="fa-solid fa-flag text-sm"></i>
                        Gỡ phốt
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- NEW SECTION: Discover More Related Scams (Bottom Grid) -->
    <div class="mt-10 border-t border-gray-100 pt-16 dark:border-gray-800/60">
        <div class="mb-6 flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div class="px-2">
                <span class="text-cs_red mb-3 block animate-pulse text-xs font-bold tracking-[5px] uppercase">
                    Hot Blacklist
                </span>
                <h2 class="text-2xl font-bold tracking-tighter text-gray-900 uppercase md:text-3xl dark:text-gray-300">
                    Các vụ lừa đảo mới nhất
                </h2>
                <p class="mt-2 text-sm font-medium text-gray-400">
                    Hệ thống cập nhật danh sách đen tự động mỗi khi có báo cáo xác thực.
                </p>
            </div>
        </div>

        <!-- List Row Layout (Inspired by Home) -->
        <section>
            <div
                class="dark:bg-dark_card overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xs dark:border-gray-800">
                @forelse($latestReports as $latest)
                <a href="{{ route('scammer.show', $latest->slug) }}" class="{{ !$loop->last ? 'border-b border-gray-100 dark:border-gray-800' : '' }} group flex flex-col
                items-center gap-4 p-5 transition-all duration-300 hover:bg-gray-50/80 sm:flex-row sm:gap-0
                dark:hover:bg-slate-800/50">
                    {{-- Đối tượng & Ngày --}}
                    <div class="flex w-full items-center gap-3 sm:w-4/12">
                        <div
                            class="text-cs_red flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-red-50 text-xs transition-transform duration-300 dark:bg-red-900/20">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <div>
                            <h3
                                class="text-xs font-bold text-gray-900 transition-colors duration-300 md:text-[15px] dark:text-gray-100">
                                {{ $latest->target_name ?? 'Chưa rõ thông tin' }}
                            </h3>
                            <div class="mt-0.5 text-[10px] font-bold text-gray-400 dark:text-gray-500">
                                <i class="fa-regular fa-calendar-check mr-1 opacity-70"></i>
                                {{ $latest->created_at->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>

                    {{-- Thông tin định danh --}}
                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                        <div class="flex flex-col">
                            <span
                                class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                Tài khoản lừa đảo
                            </span>
                            <span class="text-cs_red text-xs font-bold tracking-wider">
                                {{ $latest->target_id }}
                            </span>
                        </div>
                    </div>

                    {{-- Stats --}}
                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                        <div class="flex items-center gap-6">
                            <div class="flex flex-col">
                                <span
                                    class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    Lượt xem
                                </span>
                                <span class="text-xs font-bold text-gray-700 dark:text-gray-300">
                                    <i class="fa-regular fa-eye mr-1 opacity-50"></i>
                                    {{ number_format($latest->view_count) }}
                                </span>
                            </div>
                            <div class="flex flex-col">
                                <span
                                    class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    Danh mục
                                </span>
                                <span class="text-cs_red text-xs font-bold">
                                    <i class="fa-solid fa-circle-exclamation mr-1 opacity-50"></i>
                                    {{ $latest->category ?? 'Khác' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Hành động --}}
                    <div class="w-full text-right sm:w-2/12">
                        <span
                            class="text-cs_blue hover:bg-cs_blue inline-block rounded bg-blue-50 px-3 py-1 text-[10px] font-black uppercase transition-all hover:text-white dark:bg-blue-900/20">
                            Chi tiết
                        </span>
                    </div>
                </a>
                @empty
                <div class="p-6 text-center text-sm text-gray-400">
                    Chưa có báo cáo nào khác.
                </div>
                @endforelse

            </div>
        </section>
    </div>
</main>
@endsection

<script>
    function showCopied(text) {
        navigator.clipboard.writeText(text);
        const toast = document.createElement('div');
        toast.className =
            'fixed bottom-6 left-1/2 -translate-x-1/2 z-[9999] rounded-md bg-gray-900 px-4 py-2.5 text-xs font-semibold text-white shadow-lg';
        toast.innerHTML = '<i class="fa-solid fa-check mr-2 text-green-400"></i>Đã sao chép: ' + text;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 2000);
    }
</script>

@push("scripts")
<style>
    #lightbox {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0, 0, 0, .92);
        align-items: center;
        justify-content: center;
    }

    #lightbox.active {
        display: flex;
    }

    #lightbox img {
        max-width: 90vw;
        max-height: 88vh;
        border-radius: 10px;
        object-fit: contain;
        user-select: none;
    }

    #lightbox .lb-close {
        position: absolute;
        top: 18px;
        right: 22px;
        color: #fff;
        font-size: 24px;
        cursor: pointer;
        opacity: .7;
        transition: opacity .2s;
        background: none;
        border: none;
        line-height: 1;
    }

    #lightbox .lb-close:hover {
        opacity: 1;
    }

    #lightbox .lb-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: #fff;
        font-size: 28px;
        cursor: pointer;
        opacity: .6;
        transition: opacity .2s;
        background: rgba(255, 255, 255, .08);
        border: none;
        border-radius: 50%;
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        user-select: none;
    }

    #lightbox .lb-nav:hover {
        opacity: 1;
        background: rgba(255, 255, 255, .18);
    }

    #lightbox .lb-prev {
        left: 16px;
    }

    #lightbox .lb-next {
        right: 16px;
    }

    #lightbox .lb-counter {
        position: absolute;
        bottom: 18px;
        left: 50%;
        transform: translateX(-50%);
        color: rgba(255, 255, 255, .5);
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
    }
</style>

<div id="lightbox">
    <button class="lb-close" id="lb-close"><i class="fa-solid fa-xmark"></i></button>
    <button class="lb-nav lb-prev" id="lb-prev"><i class="fa-solid fa-chevron-left"></i></button>
    <img src="" id="lb-img" alt="evidence" />
    <button class="lb-nav lb-next" id="lb-next"><i class="fa-solid fa-chevron-right"></i></button>
    <span class="lb-counter" id="lb-counter"></span>
</div>

<script>
    $(document).ready(function() {
        const lbImages = [];
        let lbIndex = 0;

        // Thu thập tất cả ảnh bằng chứng
        $('.evidence-img').each(function() {
            lbImages.push($(this).data('src'));
        });

        function openLightbox(index) {
            lbIndex = index;
            renderLightbox();
            $('#lightbox').addClass('active');
            $('body').css('overflow', 'hidden');
        }

        function closeLightbox() {
            $('#lightbox').removeClass('active');
            $('body').css('overflow', '');
        }

        function renderLightbox() {
            $('#lb-img').attr('src', lbImages[lbIndex]);
            $('#lb-counter').text((lbIndex + 1) + ' / ' + lbImages.length);
            $('#lb-prev, #lb-next').toggle(lbImages.length > 1);
        }

        // Click ảnh → mở lightbox
        $(document).on('click', '.evidence-img', function() {
            openLightbox(parseInt($(this).data('index')));
        });

        $('#lb-close').on('click', closeLightbox);
        $('#lightbox').on('click', function(e) {
            if ($(e.target).is('#lightbox')) closeLightbox();
        });

        $('#lb-prev').on('click', function(e) {
            e.stopPropagation();
            lbIndex = (lbIndex - 1 + lbImages.length) % lbImages.length;
            renderLightbox();
        });

        $('#lb-next').on('click', function(e) {
            e.stopPropagation();
            lbIndex = (lbIndex + 1) % lbImages.length;
            renderLightbox();
        });

        $(document).on('keydown', function(e) {
            if (!$('#lightbox').hasClass('active')) return;
            if (e.key === 'ArrowLeft') {
                lbIndex = (lbIndex - 1 + lbImages.length) % lbImages.length;
                renderLightbox();
            }
            if (e.key === 'ArrowRight') {
                lbIndex = (lbIndex + 1) % lbImages.length;
                renderLightbox();
            }
            if (e.key === 'Escape') closeLightbox();
        });
    });
</script>
@endpush
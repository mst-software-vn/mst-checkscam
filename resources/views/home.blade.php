@extends("layouts.app")

@section("content")
    <x-hero :stats="$stats" />

    <!-- Main Content -->
    <main class="mx-auto w-full max-w-7xl grow px-4 py-4 sm:px-6 lg:px-8">
        <!-- Top Full Width Banner -->
        @if (! request()->query("q"))
            <x-ads-horizontal
                image="https://image.vietnix.vn/wp-content/uploads/2025/10/banner-vnx-optimizer-2048x216.webp"
                url="#"
                alt="Ads"
            />
            <h2 class="text-cs_blue mt-12 mb-6 text-center text-lg uppercase md:text-xl font-black">
                {{ date("d/m/Y") }} CÓ {{ isset($stats) ? number_format($stats['total_reports']) : 0 }} CẢNH BÁO
            </h2>
        @else
            <h2 class="text-cs_blue mt-6 mb-6 text-center text-lg md:text-xl font-black uppercase">
                <i class="fa-solid fa-magnifying-glass mr-2"></i>
                Có {{ isset($results) ? number_format($results->total()) : 0 }} vụ lừa đảo liên quan đến:
                <br />
                <span class="text-slate-800 dark:text-white">"{{ request()->query("q") }}"</span>
            </h2>
        @endif

        <!-- 2 Column Layout -->
        <div class="mb-10 flex flex-col gap-4 lg:flex-row">
            <!-- Khu Vực Trái -->
            <div class="w-full space-y-8 {{ request()->query('q') ? 'lg:w-full lg:max-w-4xl mx-auto' : 'lg:w-9/12' }}">
                @if(request()->query('q'))
                    <!-- KẾT QUẢ TÌM KIẾM -->
                    <section>
                        @if(isset($results) && $results->count() > 0)
                            <div class="dark:bg-dark_card overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xs dark:border-gray-800 mb-6">
                                @foreach($results as $index => $item)
                                <a
                                    href="/{{ $item->slug ?? 'chi-tiet-scam' }}"
                                    class="{{ !$loop->last ? 'border-b border-gray-100 dark:border-gray-800' : '' }} group flex flex-col items-center gap-4 p-5 transition-all duration-300 hover:bg-gray-50/80 sm:flex-row sm:gap-0 dark:hover:bg-slate-800/50"
                                >
                                    <!-- Đối tượng & Ngày -->
                                    <div class="flex w-full items-center gap-3 sm:w-4/12">
                                        <div class="text-cs_red flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-red-50 text-xs transition-transform duration-300 dark:bg-red-900/20">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xs font-bold text-gray-900 transition-colors duration-300 md:text-[15px] dark:text-gray-100">
                                                {{ $item->target_name ?? 'Không rõ tên' }}
                                            </h3>
                                            <div class="mt-0.5 text-[10px] font-bold text-gray-400 dark:text-gray-500">
                                                <i class="fa-regular fa-calendar-check mr-1 opacity-70"></i>
                                                {{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : 'Đang cập nhật' }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Thông tin định danh -->
                                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                                        <div class="flex flex-col">
                                            <span class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                                {{ $item->type === 'bank' ? 'Tài khoản lừa đảo' : ($item->type === 'facebook' ? 'Link lừa đảo' : 'Thông tin lừa đảo') }}
                                            </span>
                                            <span class="text-cs_red text-xs font-bold tracking-wider">{{ $item->target_id }}</span>
                                        </div>
                                    </div>

                                    <!-- Chỉ số tín nhiệm (Stats) -->
                                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                                        <div class="flex items-center gap-6">
                                            <div class="flex flex-col">
                                                <span class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">Lượt tra cứu</span>
                                                <span class="text-xs font-bold text-gray-700 dark:text-gray-300">
                                                    <i class="fa-solid fa-magnifying-glass mr-1 opacity-50"></i>
                                                    {{ number_format($item->search_count ?? 0) }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500">Bình luận</span>
                                                <span class="text-cs_blue text-xs font-bold">
                                                    <i class="fa-regular fa-comments mr-1 opacity-50"></i>
                                                    {{ number_format($item->comments_count ?? 0) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hành động -->
                                    <div class="w-full text-right sm:w-2/12">
                                        <span class="text-cs_blue hover:bg-cs_blue inline-block rounded bg-blue-50 px-3 py-1 text-[10px] font-black uppercase transition-all hover:text-white dark:bg-blue-900/20">Chi tiết</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            
                            <!-- Phân trang -->
                            <div class="mt-4">
                                {{ $results->links('pagination::tailwind') }}
                            </div>
                        @else
                            <div class="rounded-xl border border-gray-200 bg-white p-10 text-center dark:border-gray-800 dark:bg-slate-900">
                                <div class="text-gray-300 dark:text-gray-600 mb-4 text-5xl">
                                    <i class="fa-regular fa-face-frown-open"></i>
                                </div>
                                <h3 class="mb-2 text-lg font-bold text-gray-800 dark:text-gray-200">Không tìm thấy dữ liệu lừa đảo</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Hệ thống chưa ghi nhận báo cáo nào liên quan đến thông tin bạn tra cứu. Tuy nhiên, hãy luôn cảnh giác!</p>
                                <a href="/to-cao-lua-dao" class="bg-cs_red hover:bg-red-600 inline-block cursor-pointer rounded-xl px-8 py-3 text-xs font-black tracking-widest whitespace-nowrap text-white uppercase shadow-lg shadow-red-500/20 transition-all active:scale-95 md:text-sm">
                                    <i class="fa-solid fa-bullhorn mr-2"></i> Báo cáo lừa đảo mới
                                </a>
                            </div>
                        @endif
                    </section>
                @endif

                @if(!request()->query('q'))
                <!-- PHẦN 1: 3 CẢNH BÁO NGÀY HÔM NAY -->
                <section>
                    <div class="border-cs_blue mb-4 flex items-center gap-2 border-l-4 pl-3">
                        <h2 class="text-lg font-bold text-gray-800 uppercase dark:text-gray-300">
                            Cảnh báo mới nhất
                        </h2>
                    </div>
                    <div
                        class="dark:bg-dark_card overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xs dark:border-gray-800"
                    >
                            @if(isset($latestReports) && $latestReports->count() > 0)
                                @foreach($latestReports as $index => $item)
                                <a
                                    href="/{{ $item->slug }}"
                                    class="{{ !$loop->last ? 'border-b border-gray-100 dark:border-gray-800' : '' }} group flex flex-col items-center gap-4 p-5 transition-all duration-300 hover:bg-gray-50/80 sm:flex-row sm:gap-0 dark:hover:bg-slate-800/50"
                                >
                                    <!-- Đối tượng & Ngày -->
                                    <div class="flex w-full items-center gap-3 sm:w-4/12">
                                        <div
                                            class="text-cs_red flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-red-50 text-xs transition-transform duration-300 dark:bg-red-900/20"
                                        >
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                        </div>
                                        <div>
                                            <h3
                                                class="text-xs font-bold text-gray-900 transition-colors duration-300 md:text-[15px] dark:text-gray-100"
                                            >
                                                {{ $item->target_name ?? 'Không rõ tên' }}
                                            </h3>
                                            <div class="mt-0.5 text-[10px] font-bold text-gray-400 dark:text-gray-500">
                                                <i class="fa-regular fa-calendar-check mr-1 opacity-70"></i>
                                                {{ now()->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Thông tin định danh -->
                                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                            >
                                                {{ $item->type === 'bank' ? 'Tài khoản lừa đảo' : ($item->type === 'facebook' ? 'Link lừa đảo' : 'Thông tin lừa đảo') }}
                                            </span>
                                            <span class="text-cs_red text-xs font-bold tracking-wider">{{ $item->target_id }}</span>
                                        </div>
                                    </div>

                                    <!-- Chỉ số tín nhiệm (Stats) -->
                                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                                        <div class="flex items-center gap-6">
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                                >
                                                    Lượt xem
                                                </span>
                                                <span class="text-xs font-bold text-gray-700 dark:text-gray-300">
                                                    <i class="fa-regular fa-eye mr-1 opacity-50"></i>
                                                    {{ number_format($item->views) }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                                >
                                                    Bài cảnh báo
                                                </span>
                                                <span class="text-cs_red text-xs font-bold">
                                                    <i class="fa-solid fa-circle-exclamation mr-1 opacity-50"></i>
                                                    {{ str_pad($item->report_count, 2, '0', STR_PAD_LEFT) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hành động -->
                                    <div class="w-full text-right sm:w-2/12">
                                        <span
                                            class="text-cs_blue hover:bg-cs_blue inline-block rounded bg-blue-50 px-3 py-1 text-[10px] font-black uppercase transition-all hover:text-white dark:bg-blue-900/20"
                                        >
                                            Chi tiết
                                        </span>
                                    </div>
                                </a>
                                @endforeach
                            @else
                                <div class="p-8 text-center text-sm font-medium text-gray-500 dark:text-gray-400">
                                    Chưa có dữ liệu cảnh báo trong 7 ngày qua.
                                </div>
                            @endif
                        </div>
                    </section>

                    <!-- BANNER QUẢNG CÁO 1 -->
                    <x-ads-horizontal image="https://i.ibb.co/Z1kFjpWw/lienquangiaredt.gif" url="#" alt="Ads" />

                    <!-- PHẦN 2: LỪA ĐẢO PHỔ BIẾN 7 NGÀY GẦN ĐÂY -->
                    <section>
                        <div class="border-cs_blue mb-4 flex items-center gap-2 border-l-4 pl-3">
                            <h2 class="text-lg font-bold text-gray-800 uppercase dark:text-gray-300">
                                Lừa đảo phổ biến 7 ngày gần đây
                            </h2>
                        </div>
                        <div
                            class="dark:bg-dark_card overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xs dark:border-gray-800"
                        >
                            @if(isset($topWeeklyReports) && $topWeeklyReports->count() > 0)
                                @foreach($topWeeklyReports as $index => $item)
                                <a
                                    href="/{{ $item->slug }}"
                                    class="{{ !$loop->last ? 'border-b border-gray-100 dark:border-gray-800' : '' }} group flex flex-col items-center gap-4 p-5 transition-all duration-300 hover:bg-gray-50/80 sm:flex-row sm:gap-0 dark:hover:bg-slate-800/50"
                                >
                                    <!-- Đối tượng & Ngày -->
                                    <div class="flex w-full items-center gap-3 sm:w-4/12">
                                        <div
                                            class="text-cs_red flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-red-50 text-xs transition-transform duration-300 dark:bg-red-900/20"
                                        >
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                        </div>
                                        <div>
                                            <h3
                                                class="text-xs font-bold text-gray-900 transition-colors duration-300 md:text-[15px] dark:text-gray-100"
                                            >
                                                {{ $item->target_name ?? 'Không rõ tên' }}
                                            </h3>
                                            <div class="mt-0.5 text-[10px] font-bold text-gray-400 dark:text-gray-500">
                                                <i class="fa-regular fa-calendar-check mr-1 opacity-70"></i>
                                                {{ now()->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Thông tin định danh -->
                                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                            >
                                                {{ $item->type === 'bank' ? 'Tài khoản lừa đảo' : ($item->type === 'facebook' ? 'Link lừa đảo' : 'Thông tin lừa đảo') }}
                                            </span>
                                            <span class="text-cs_red text-xs font-bold tracking-wider">{{ $item->target_id }}</span>
                                        </div>
                                    </div>

                                    <!-- Chỉ số tín nhiệm (Stats) -->
                                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                                        <div class="flex items-center gap-6">
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                                >
                                                    Lượt xem
                                                </span>
                                                <span class="text-xs font-bold text-gray-700 dark:text-gray-300">
                                                    <i class="fa-regular fa-eye mr-1 opacity-50"></i>
                                                    {{ number_format($item->views) }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                                >
                                                    Bài cảnh báo
                                                </span>
                                                <span class="text-cs_red text-xs font-bold">
                                                    <i class="fa-solid fa-circle-exclamation mr-1 opacity-50"></i>
                                                    {{ str_pad($item->report_count, 2, '0', STR_PAD_LEFT) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hành động -->
                                    <div class="w-full text-right sm:w-2/12">
                                        <span
                                            class="text-cs_blue hover:bg-cs_blue inline-block rounded bg-blue-50 px-3 py-1 text-[10px] font-black uppercase transition-all hover:text-white dark:bg-blue-900/20"
                                        >
                                            Chi tiết
                                        </span>
                                    </div>
                                </a>
                                @endforeach
                            @else
                                <div class="p-8 text-center text-sm font-medium text-gray-500 dark:text-gray-400">
                                    Chưa có dữ liệu cảnh báo trong 7 ngày qua.
                                </div>
                            @endif
                        </div>
                    </section>

                    <!-- BANNER QUẢNG CÁO 2 -->
                    <x-ads-horizontal image="https://i.ibb.co/BV9hbrP2/banner3.gif" url="#" alt="Ads" />

                    <!-- PHẦN 3: TOP 3 TÌM KIẾM NGÀY -->
                    <section>
                        <div class="border-cs_orange mb-4 flex items-center gap-2 border-l-4 pl-3">
                            <h2 class="text-lg font-bold text-gray-800 uppercase dark:text-gray-300">
                                Top 3 tìm kiếm ngày
                            </h2>
                            <i class="fa-solid fa-fire text-cs_orange animate-pulse"></i>
                        </div>
                        <div
                            class="dark:bg-dark_card overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xs dark:border-gray-800"
                        >
                            @if(isset($topDailySearches) && $topDailySearches->count() > 0)
                                @foreach($topDailySearches as $index => $item)
                                <a
                                    href="/{{ $item->slug }}"
                                    class="{{ !$loop->last ? 'border-b border-gray-100 dark:border-gray-800' : '' }} group flex flex-col items-center gap-4 p-5 transition-all duration-300 hover:bg-gray-50/80 sm:flex-row sm:gap-0 dark:hover:bg-slate-800/50"
                                >
                                    <!-- Đối tượng & Ngày -->
                                    <div class="flex w-full items-center gap-3 sm:w-4/12">
                                        <div
                                            class="{{ $item->is_scam ? 'text-cs_red bg-red-50 dark:bg-red-900/20' : 'text-gray-500 bg-gray-100 dark:bg-gray-800' }} flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl text-xs transition-transform duration-300"
                                        >
                                            @if($item->is_scam)
                                                <i class="fa-solid fa-triangle-exclamation"></i>
                                            @else
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <h3
                                                class="text-xs font-bold text-gray-900 transition-colors duration-300 md:text-[15px] dark:text-gray-100"
                                            >
                                                {{ $item->target_name }}
                                            </h3>
                                            <div class="mt-0.5 text-[10px] font-bold text-gray-400 dark:text-gray-500">
                                                <i class="fa-regular fa-clock mr-1 opacity-70"></i>
                                                Hôm nay
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Thông tin định danh -->
                                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                            >
                                                {{ $item->type === 'bank' ? 'Tài khoản lừa đảo' : ($item->type === 'facebook' ? 'Link lừa đảo' : ($item->type === 'phone' ? 'SĐT lừa đảo' : 'Từ khoá hệ thống')) }}
                                            </span>
                                            <span class="{{ $item->is_scam ? 'text-cs_red' : 'text-gray-700' }} text-xs font-bold tracking-wider">{{ $item->target_id }}</span>
                                        </div>
                                    </div>

                                    <!-- Chỉ số tín nhiệm (Stats) -->
                                    <div class="w-full border-gray-100 sm:w-3/12 sm:border-l sm:px-6 dark:border-gray-800">
                                        <div class="flex items-center gap-6">
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-[9px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                                >
                                                    Lượt tra cứu
                                                </span>
                                                <span class="text-xs font-bold text-gray-700 dark:text-gray-300">
                                                    <i class="fa-solid fa-fire mr-1 opacity-50 text-cs_orange"></i>
                                                    {{ number_format($item->search_count) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hành động -->
                                    <div class="w-full text-right sm:w-2/12">
                                        <span
                                            class="text-cs_blue hover:bg-cs_blue inline-block rounded bg-blue-50 px-3 py-1 text-[10px] font-black uppercase transition-all hover:text-white dark:bg-blue-900/20"
                                        >
                                            Tra cứu
                                        </span>
                                    </div>
                                </a>
                                @endforeach
                            @else
                                <div class="p-8 text-center text-sm font-medium text-gray-500 dark:text-gray-400">
                                    Chưa có lượt tìm kiếm nào trong ngày hôm nay.
                                </div>
                            @endif
                        </div>
                    </section>
                @endif
            </div>

            @if(!request()->query('q'))
                <!-- Khu Vực Phải: Sidebar Widget -->
                <aside class="w-full space-y-3 lg:w-3/12">
                    <!-- Right Sidebar Banner -->
                    <x-ads-square image="https://i.ibb.co/kgwtn4vF/fpayment.jpg" url="#" alt="Fpayment Ads" />
                    <x-ads-square
                        image="https://png.pngtree.com/png-clipart/20250126/original/pngtree-hologram-gradient-flash-sale-square-poster-banner-promotion-vector-png-image_19237469.png"
                        url="#"
                        alt="Fpayment Ads"
                    />

                    <!-- Action Button -->
                    <div
                        class="rounded-xl border border-red-200 bg-red-50 p-6 text-center shadow-sm dark:border-red-900/30 dark:bg-slate-900/50"
                    >
                        <div
                            class="text-cs_red mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30"
                        >
                            <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                        </div>
                        <h3 class="text-md mb-2 font-bold text-gray-800 dark:text-gray-100">BẠN ĐANG BỊ SCAM?</h3>
                        <p class="mb-5 text-[13px] leading-relaxed text-gray-600 dark:text-gray-400">
                            Chặn đứng kẻ gian bằng cách báo cáo ngay lên hệ thống. Đóng góp của bạn giúp cộng đồng MMO an
                            toàn hơn.
                        </p>
                        <button
                            class="bg-cs_red w-full cursor-pointer rounded-lg px-4 py-3 text-sm font-bold text-white shadow-sm transition-colors hover:bg-red-700"
                        >
                            <i class="fa-regular fa-paper-plane mr-1"></i>
                            GỬI ĐƠN TỐ CÁO
                        </button>
                    </div>
                    <!-- Verification Log: Recent Searches (Professional & Neutral) -->
                    <div
                        class="dark:bg-dark_card overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xs dark:border-gray-800"
                    >
                        <div class="border-b border-gray-100 bg-gray-50/50 p-4 dark:border-gray-800 dark:bg-slate-800/20">
                            <div class="flex items-center justify-between">
                                <h2
                                    class="flex items-center gap-2 text-xs font-black text-gray-800 uppercase md:text-sm dark:text-gray-200"
                                >
                                    <i class="fa-solid fa-receipt text-cs_blue text-lg"></i>
                                    NHẬT KÝ TRA CỨU
                                </h2>
                                <div class="flex items-center gap-1.5">
                                    <span class="relative flex h-2 w-2">
                                        <span
                                            class="bg-cs_blue absolute inline-flex h-full w-full animate-ping rounded-full opacity-75"
                                        ></span>
                                        <span class="bg-cs_blue relative inline-flex h-2 w-2 rounded-full"></span>
                                    </span>
                                    <span class="text-[9px] font-bold text-gray-400 uppercase">Live</span>
                                </div>
                            </div>
                        </div>

                        <div class="divide-y divide-gray-50 dark:divide-gray-800/50 relative">
                            @if(isset($recentSearches) && $recentSearches->isNotEmpty())
                                @foreach($recentSearches as $search)
                                <a href="{{ route('search.index', ['q' => $search]) }}"
                                    class="group flex items-center justify-between p-4 transition-colors hover:bg-blue-50/30 dark:hover:bg-slate-800/30"
                                >
                                    <div class="flex min-w-0 items-center gap-3">
                                        <div
                                            class="group-hover:text-cs_blue flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-400 transition-all group-hover:bg-blue-100 dark:bg-slate-800 dark:group-hover:bg-blue-900/40"
                                        >
                                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="truncate text-[13px] font-bold text-gray-700 dark:text-gray-300">
                                                {{ $search }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                                <!-- Nút xóa lịch sử -->
                                <form action="{{ route('search.clearHistory') }}" method="POST" class="p-2 border-t border-gray-100 dark:border-gray-800">
                                    @csrf
                                    <button type="submit" class="w-full text-[10px] font-bold text-red-500 hover:text-red-700 py-2 rounded transition-colors hover:bg-red-50 dark:hover:bg-red-900/20">
                                        <i class="fa-regular fa-trash-can mr-1"></i> XÓA LỊCH SỬ TÌM KIẾM
                                    </button>
                                </form>
                            @else
                                <div class="p-6 text-center">
                                    <div class="text-gray-200 dark:text-gray-700 mb-2 text-3xl">
                                        <i class="fa-regular fa-folder-open"></i>
                                    </div>
                                    <p class="text-[11px] font-medium text-gray-400 dark:text-gray-500">Chưa có lịch sử tìm kiếm</p>
                                </div>
                            @endif
                        </div>

                        <div class="bg-gray-50/50 p-3 text-center dark:bg-slate-800/20">
                            <p class="text-[9px] font-bold text-gray-400 italic">
                                Dữ liệu dựa trên hoạt động tra cứu thực tế
                            </p>
                        </div>
                    </div>
                </aside>
            @endif
        </div>

        <!-- NEW FULL-WIDTH SECTIONS -->
        @if(!request()->query('q'))
            <div class="mt-16 space-y-12 sm:mt-20 sm:space-y-16">
                <!-- Section Lịch Sử Bình Luận -->
                <section aria-labelledby="comments-history-title">
                    <div class="mx-auto mb-8 max-w-4xl text-center">
                        <h2
                            id="comments-history-title"
                            class="text-xl font-black tracking-tight text-gray-800 uppercase md:text-2xl dark:text-gray-300"
                        >
                            <i class="fa-solid fa-comments text-cs_blue mr-2"></i>
                            Bình luận
                            <span class="text-cs_blue">mới nhất</span>
                        </h2>
                        <p class="mt-2 text-[10px] font-bold tracking-widest text-gray-500 uppercase md:text-xs">
                            Cập nhật hoạt động từ cộng đồng
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:gap-4 lg:grid-cols-4">
                        <?php
                        $comments = [
                            ['user' => 'Lê Văn Tám', 'time' => '2 phút trước', 'content' => 'Thằng này vừa lừa mình 500k tiền cọc mua acc, mọi người cẩn thận nhé.', 'target' => '0981.234.xxx', 'color' => '3b82f6'],
                            ['user' => 'Nguyễn Bích', 'time' => '15 phút trước', 'content' => 'Cảm ơn CheckScam, nhờ tra cứu mà mình không bị mất tiền cho đứa này.', 'target' => 'Vietcombank - 102...', 'color' => '10b981'],
                            ['user' => 'Trần Quang', 'time' => '1 giờ trước', 'content' => 'Thấy nó đăng bài uy tín lắm mà check ra đầy vết đen. Sợ thật!', 'target' => 'fb.com/quang_scam', 'color' => 'f59e0b'],
                            ['user' => 'Minh Anh', 'time' => '3 giờ trước', 'content' => 'Mọi người lưu ý số tài khoản này nhá, chuyên đi lừa đảo thẻ cào.', 'target' => '0342.999.xxx', 'color' => 'ef4444'],
                            ['user' => 'Hoàng Nam', 'time' => '5 giờ trước', 'content' => 'Web quá hữu ích, nên có thêm nhiều người chung tay tố cáo.', 'target' => 'Cộng đồng CS', 'color' => '6366f1'],
                            ['user' => 'Thu Thảo', 'time' => '8 giờ trước', 'content' => 'Mình đã gửi bằng chứng lên rồi, mong admin sớm duyệt để cảnh báo.', 'target' => 'Đang chờ duyệt', 'color' => 'ec4899'],
                            ['user' => 'Thanh Ngân', 'time' => '12 giờ trước', 'content' => 'Mọi người cẩn thận với số tài khoản này nhé, chuyên đi lừa đảo thẻ cào.', 'target' => '0772.345.xxx', 'color' => '8b5cf6'],
                            ['user' => 'Duy Mạnh', 'time' => '1 ngày trước', 'content' => 'Vừa check xong, xém tí thì chuyển khoản cho nó. May quá!', 'target' => 'Momo - 0941...', 'color' => '06b6d4'],
                        ];
                            foreach ($comments as $cmt) { ?>

                        <div
                            class="dark:bg-dark_card rounded-2xl border border-gray-100 bg-white p-5 shadow-xs dark:border-gray-800"
                        >
                            <div class="mb-4 flex items-center gap-3">
                                <img
                                    src="https://ui-avatars.com/api/?name=<?php echo urlencode($cmt["user"]); ?>&background=<?php echo $cmt["color"]; ?>&color=fff&size=40"
                                    class="h-10 w-10 rounded-full border-2 border-gray-50 dark:border-gray-800"
                                    alt="User"
                                />
                                <div>
                                    <h4 class="text-sm font-bold text-gray-800 dark:text-gray-100">
                                        <?php echo $cmt["user"]; ?>
                                    </h4>
                                    <span class="text-[10px] font-medium text-gray-400 dark:text-gray-500">
                                        <?php echo $cmt["time"]; ?>
                                    </span>
                                </div>
                            </div>
                            <p class="mb-4 line-clamp-2 text-xs leading-relaxed text-gray-600 italic dark:text-gray-400">
                                "<?php echo $cmt["content"]; ?>"
                            </p>
                            <div
                                class="flex items-center justify-between border-t border-gray-50 pt-3 dark:border-gray-800"
                            >
                                <span
                                    class="text-[10px] font-bold tracking-tighter text-gray-400 uppercase dark:text-gray-500"
                                >
                                    Đối tượng:
                                </span>
                                <span
                                    class="text-cs_red rounded bg-red-50 px-2 py-0.5 text-[10px] font-black dark:bg-red-900/20"
                                >
                                    <?php echo $cmt["target"]; ?>
                                </span>
                            </div>
                        </div>

                        <?php } ?>
                    </div>

                    <div class="mt-8 text-center">
                        <a href="#" class="text-cs_blue text-xs font-black tracking-widest uppercase hover:underline">
                            Xem tất cả bình luận
                            <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </section>

                <!-- Section: Nghị Định Thư Tín Nhiệm Số (Digital Trust Protocol) -->
                <section aria-labelledby="protocol-title" class="relative px-4 py-20">
                    <div class="relative z-10 mx-auto max-w-7xl">
                        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12">
                            <!-- Cột Trái: Tiêu điểm & Triết lý -->
                            <div class="lg:col-span-5">
                                <div
                                    class="dark:bg-cs_blue mb-4 inline-flex items-center gap-2 rounded-md bg-slate-900 px-3 py-1"
                                >
                                    <span class="text-[10px] font-black tracking-widest text-white uppercase">
                                        Protocol v4.0
                                    </span>
                                </div>
                                <h2
                                    id="protocol-title"
                                    class="mb-6 text-4xl leading-tight font-black tracking-tighter text-slate-900 uppercase md:text-5xl dark:text-white"
                                >
                                    MINH BẠCH HÓA
                                    <br />
                                    <span class="text-cs_blue">GIAO DỊCH MMO</span>
                                </h2>
                                <p class="mb-8 max-w-md text-slate-500 dark:text-slate-400">
                                    CheckScam thiết lập bộ tiêu chuẩn mới về tín nhiệm số, nơi mọi dữ liệu được đối soát
                                    chéo và công khai minh bạch để bảo vệ cộng đồng.
                                </p>

                                <div class="space-y-6">
                                    <div class="flex gap-4">
                                        <div class="bg-cs_blue/20 h-12 w-1 flex-none overflow-hidden rounded-full">
                                            <div class="bg-cs_blue h-1/2 animate-pulse"></div>
                                        </div>
                                        <div>
                                            <div class="mb-1 text-xs font-black text-slate-400 uppercase">
                                                Cơ sở dữ liệu
                                            </div>
                                            <div class="text-xl font-bold text-slate-800 dark:text-slate-100">
                                                Dữ liệu đen lớn nhất VN
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="bg-cs_green/20 h-12 w-1 flex-none overflow-hidden rounded-full">
                                            <div class="bg-cs_green h-2/3 animate-pulse"></div>
                                        </div>
                                        <div>
                                            <div class="mb-1 text-xs font-black text-slate-400 uppercase">
                                                Xác thực Telegram
                                            </div>
                                            <div class="text-xl font-bold text-slate-800 dark:text-slate-100">
                                                Hệ mã định danh Reputation
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cột Phải: Registry Dashboard -->
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:col-span-7">
                                <!-- Card: Ngân hàng -->
                                <div
                                    class="group hover:border-cs_blue/40 relative rounded-4xl border border-slate-200 bg-white p-8 transition-all duration-500 ease-in-out hover:scale-[1.015] hover:shadow-2xl hover:shadow-blue-500/10 dark:border-slate-800 dark:bg-slate-900"
                                >
                                    <div
                                        class="text-cs_blue mb-5 text-3xl transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-6"
                                    >
                                        <i class="fa-solid fa-building-columns"></i>
                                    </div>
                                    <h3 class="mb-2 text-lg font-black text-slate-900 uppercase dark:text-white">
                                        Truy soát ngân hàng
                                    </h3>
                                    <p class="mb-6 text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                                        Đối soát trực tiếp với danh sách "Blacklist" liên ngân hàng để phát hiện STK rác
                                        ngay lập tức.
                                    </p>
                                    <div
                                        class="flex items-center justify-between border-t border-slate-100 pt-4 dark:border-slate-800"
                                    >
                                        <span class="text-[10px] font-bold text-slate-400">STATUS: ACTIVE</span>
                                        <span
                                            class="text-cs_blue cursor-pointer text-xs font-black uppercase transition-all duration-300 group-hover:translate-x-1"
                                        >
                                            Chi tiết
                                            <i class="fa-solid fa-arrow-right-long ml-1"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Card: Telegram -->
                                <div
                                    class="group hover:border-cs_blue/40 relative rounded-4xl border border-slate-200 bg-white p-8 transition-all duration-500 ease-in-out hover:scale-[1.015] hover:shadow-2xl hover:shadow-blue-500/10 dark:border-slate-800 dark:bg-slate-900"
                                >
                                    <div
                                        class="mb-5 text-3xl text-[#24A1DE] transition-transform duration-500 group-hover:scale-110 group-hover:rotate-6"
                                    >
                                        <i class="fa-brands fa-telegram"></i>
                                    </div>
                                    <h3 class="mb-2 text-lg font-black text-slate-900 uppercase dark:text-white">
                                        Uy tín Telegram
                                    </h3>
                                    <p class="mb-6 text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                                        Định danh User ID và Username để loại bỏ các trường hợp mạo danh Admin hoặc trung
                                        gian uy tín.
                                    </p>
                                    <div
                                        class="flex items-center justify-between border-t border-slate-100 pt-4 dark:border-slate-800"
                                    >
                                        <span class="text-[10px] font-bold text-slate-400">ID VERIFIED</span>
                                        <span
                                            class="text-cs_blue cursor-pointer text-xs font-black uppercase transition-all duration-300 group-hover:translate-x-1"
                                        >
                                            Chi tiết
                                            <i class="fa-solid fa-arrow-right-long ml-1"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Card: Web Scan -->
                                <div
                                    class="group hover:border-cs_blue/40 relative rounded-4xl border border-slate-200 bg-white p-8 transition-all duration-2000 ease-in-out hover:scale-[1.005] hover:shadow-2xl hover:shadow-blue-500/10 dark:border-slate-800 dark:bg-slate-900"
                                >
                                    <div
                                        class="text-cs_red mb-5 text-3xl transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-3"
                                    >
                                        <i class="fa-solid fa-globe"></i>
                                    </div>
                                    <h3 class="mb-2 text-lg font-black text-slate-900 uppercase dark:text-white">
                                        Quét mã độc Web
                                    </h3>
                                    <p class="mb-6 text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                                        Phân tích chuyên sâu link giao dịch để phát hiện các trang web Phishing đánh cắp
                                        thông tin.
                                    </p>
                                    <div
                                        class="flex items-center justify-between border-t border-slate-100 pt-4 dark:border-slate-800"
                                    >
                                        <span class="text-[10px] font-bold text-slate-400">DNS SECURE</span>
                                        <span
                                            class="text-cs_blue cursor-pointer text-xs font-black uppercase transition-all duration-300 group-hover:translate-x-1"
                                        >
                                            Chi tiết
                                            <i class="fa-solid fa-arrow-right-long ml-1"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Card: Community -->
                                <div
                                    class="group hover:border-cs_green/40 hover:shadow-cs_green/10 relative rounded-4xl border border-slate-200 bg-white p-8 transition-all duration-500 ease-in-out hover:scale-[1.015] hover:shadow-2xl dark:border-slate-800 dark:bg-slate-900"
                                >
                                    <div
                                        class="text-cs_green mb-5 text-3xl transition-transform duration-500 group-hover:scale-110 group-hover:rotate-12"
                                    >
                                        <i class="fa-solid fa-people-group"></i>
                                    </div>
                                    <h3 class="mb-2 text-lg font-black text-slate-900 uppercase dark:text-white">
                                        Trí tuệ tập thể
                                    </h3>
                                    <p class="mb-6 text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                                        Mỗi báo cáo của cộng đồng là một viên gạch xây dựng nên lá chắn vững chắc cho MMO
                                        Việt.
                                    </p>
                                    <div
                                        class="flex items-center justify-between border-t border-slate-100 pt-4 dark:border-slate-800"
                                    >
                                        <span class="text-[10px] font-bold text-slate-400">ACTIVE NODES: 100K+</span>
                                        <a
                                            href="/to-cao-lua-dao"
                                            class="text-cs_green text-xs font-black uppercase transition-all duration-300 group-hover:translate-x-1"
                                        >
                                            Gửi báo cáo
                                            <i class="fa-solid fa-arrow-right-long ml-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Box FAQ -->
                <section aria-labelledby="faq-title" class="mx-auto max-w-5xl lg:px-4">
                    <div class="mb-8 flex flex-col items-center text-center md:mb-10">
                        <div class="bg-cs_blue mb-6 h-1 w-12 rounded-full"></div>
                        <h2
                            id="faq-title"
                            class="text-xl font-black tracking-tight text-gray-800 uppercase md:text-2xl dark:text-slate-50"
                        >
                            Trợ giúp & Giải đáp
                        </h2>
                        <p class="mt-2 text-xs text-gray-500 md:text-sm dark:text-slate-500">
                            Mọi thắc mắc về hệ thống CheckScam đều có tại đây.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 items-start gap-3">
                        <details
                            class="group dark:bg-dark_card hover:border-cs_blue/30 rounded-2xl border border-gray-200 bg-white shadow-xs transition-all dark:border-gray-800 [&_summary::-webkit-details-marker]:hidden"
                        >
                            <summary class="flex cursor-pointer list-none items-center justify-between p-4 md:p-5">
                                <div class="flex items-center gap-3 md:gap-4">
                                    <span
                                        class="text-cs_blue flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-[10px] font-bold md:text-xs dark:bg-blue-900/30"
                                    >
                                        01
                                    </span>
                                    <h3 class="text-xs font-bold text-gray-700 md:text-sm dark:text-gray-200">
                                        Làm sao để tố cáo lừa đảo?
                                    </h3>
                                </div>
                                <i
                                    class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform group-open:rotate-180 md:text-xs"
                                ></i>
                            </summary>
                            <div
                                class="border-t border-gray-50 px-5 pt-3 pb-5 pl-12 text-[11px] leading-relaxed text-gray-500 md:pl-[68px] md:text-[13px] dark:border-gray-800 dark:text-gray-400"
                            >
                                Bấm vào nút
                                <span class="text-cs_red font-bold uppercase">Gửi đơn tố cáo</span>
                                , điền thông tin kẻ lừa đảo kèm hình ảnh bằng chứng rõ ràng. Admin sẽ duyệt trong 24h.
                            </div>
                        </details>

                        <details
                            class="group dark:bg-dark_card hover:border-cs_blue/30 rounded-2xl border border-gray-200 bg-white shadow-xs transition-all dark:border-gray-800 [&_summary::-webkit-details-marker]:hidden"
                        >
                            <summary class="flex cursor-pointer list-none items-center justify-between p-4 md:p-5">
                                <div class="flex items-center gap-3 md:gap-4">
                                    <span
                                        class="text-cs_blue flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-[10px] font-bold md:text-xs dark:bg-blue-900/30"
                                    >
                                        02
                                    </span>
                                    <h3 class="text-xs font-bold text-gray-700 md:text-sm dark:text-gray-200">
                                        Tại sao bài phốt chưa được duyệt?
                                    </h3>
                                </div>
                                <i
                                    class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform group-open:rotate-180 md:text-xs"
                                ></i>
                            </summary>
                            <div
                                class="border-t border-gray-50 px-5 pt-3 pb-5 pl-12 text-[11px] leading-relaxed text-gray-500 md:pl-[68px] md:text-[13px] dark:border-gray-800 dark:text-gray-400"
                            >
                                Hệ thống kiểm tra thủ công để tránh tình trạng tố cáo ảo. Nếu sau 24h chưa duyệt, hãy kiểm
                                tra lại tính minh bạch của bằng chứng bạn gửi.
                            </div>
                        </details>

                        <details
                            class="group dark:bg-dark_card hover:border-cs_blue/30 rounded-2xl border border-gray-200 bg-white shadow-xs transition-all dark:border-gray-800 [&_summary::-webkit-details-marker]:hidden"
                        >
                            <summary class="flex cursor-pointer list-none items-center justify-between p-4 md:p-5">
                                <div class="flex items-center gap-3 md:gap-4">
                                    <span
                                        class="text-cs_blue flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-[10px] font-bold md:text-xs dark:bg-blue-900/30"
                                    >
                                        03
                                    </span>
                                    <h3 class="text-xs font-bold text-gray-700 md:text-sm dark:text-gray-200">
                                        Quỹ Bảo Đảm hoạt động thế nào?
                                    </h3>
                                </div>
                                <i
                                    class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform group-open:rotate-180 md:text-xs"
                                ></i>
                            </summary>
                            <div
                                class="border-t border-gray-50 px-5 pt-3 pb-5 pl-12 text-[11px] leading-relaxed text-gray-500 md:pl-[68px] md:text-[13px] dark:border-gray-800 dark:text-gray-400"
                            >
                                Trung gian uy tín đóng quỹ (tiền ký quỹ) cho Admin. Nếu họ lừa đảo, Admin dùng tiền đó đền
                                bù cho bạn 100%.
                            </div>
                        </details>

                        <details
                            class="group dark:bg-dark_card hover:border-cs_blue/30 rounded-2xl border border-gray-200 bg-white shadow-sm transition-all dark:border-gray-800 [&_summary::-webkit-details-marker]:hidden"
                        >
                            <summary class="flex cursor-pointer list-none items-center justify-between p-4 md:p-5">
                                <div class="flex items-center gap-3 md:gap-4">
                                    <span
                                        class="text-cs_blue flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-[10px] font-bold md:text-xs dark:bg-blue-900/30"
                                    >
                                        04
                                    </span>
                                    <h3 class="text-xs font-bold text-gray-700 md:text-sm dark:text-gray-200">
                                        Tôi có thể xin gỡ bài viết không?
                                    </h3>
                                </div>
                                <i
                                    class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform group-open:rotate-180 md:text-xs"
                                ></i>
                            </summary>
                            <div
                                class="border-t border-gray-50 px-5 pt-3 pb-5 pl-12 text-[11px] leading-relaxed text-gray-500 md:pl-[68px] md:text-[13px] dark:border-gray-800 dark:text-gray-400"
                            >
                                Chỉ gỡ khi người tố cáo xác nhận đã giải quyết xong. Chúng tôi KHÔNG gỡ vì hối lộ hay áp lực
                                từ kẻ lừa đảo.
                            </div>
                        </details>
                    </div>
                </section>
            </div>
        @endif  
    </main>
    <x-notification />
@endsection

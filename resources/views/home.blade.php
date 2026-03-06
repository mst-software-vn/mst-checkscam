@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-white dark:bg-dark_bg py-12 md:py-20 md:pb-2 overflow-hidden relative">
        <!-- Trang trí nền nhẹ -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none opacity-50">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-50 dark:bg-blue-900/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-red-50 dark:bg-red-900/10 rounded-full blur-3xl">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1
                    class="text-3xl md:text-4xl lg:text-5xl font-black mb-6 uppercase leading-[1.4] hero-title scanner-title">
                    KIỂM TRA & TỐ CÁO SCAM.
                </h1>
                <p
                    class="text-gray-600 dark:text-gray-400 mb-10 max-w-2xl mx-auto text-sm md:text-lg leading-relaxed font-medium">
                    Hệ thống dữ liệu lớn nhất Việt Nam giúp bạn kiểm tra độ tín nhiệm của đối tác thông qua SĐT, Số TK
                    hoặc Link mạng xã hội.
                </p>

                <!-- Search Box Centered -->
                <div class="max-w-3xl mx-auto mb-6">
                    <div
                        class="relative bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-gray-800 rounded-2xl shadow-xl shadow-blue-900/5 focus-within:border-cs_blue focus-within:ring-4 focus-within:ring-blue-100 dark:focus-within:ring-blue-900/30 transition-all p-1 md:p-2">
                        <div class="flex flex-col sm:flex-row items-center gap-2">
                            <div class="flex-1 flex items-center w-full min-w-0">
                                <div class="pl-4 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-magnifying-glass text-gray-400 text-lg"></i>
                                </div>
                                <input type="text"
                                    class="w-full pl-3 pr-4 py-3 bg-transparent border-none focus:ring-0 text-gray-800 dark:text-white text-sm md:text-base font-bold placeholder-gray-400 dark:placeholder-gray-600"
                                    placeholder="Nhập Số tài khoản, SĐT hoặc Link..." />
                            </div>
                            <button
                                class="w-full sm:w-auto bg-cs_blue hover:bg-blue-600 text-white px-8 py-3 rounded-xl font-black text-xs md:text-sm tracking-widest transition-all shadow-lg active:scale-95 whitespace-nowrap">
                                TRA CỨU
                            </button>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div
                        class="mt-6 flex flex-wrap justify-center gap-3 md:gap-8 text-[11px] md:text-sm font-bold text-gray-500 dark:text-gray-400">
                        <span class="flex items-center"><i
                                class="fa-solid fa-circle text-[6px] text-cs_red mr-2 animate-pulse"></i> 62.472 STK Lừa
                            đảo</span>
                        <span class="flex items-center"><i class="fa-solid fa-circle text-[6px] text-cs_blue mr-2"></i>
                            8.605 Bình luận mới</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 mt-8 md:mt-12">
                    <a href="#"
                        class="bg-white dark:bg-dark_card hover:bg-red-50 dark:hover:bg-red-900/10 border border-gray-100 dark:border-gray-800 p-3 md:p-4 rounded-2xl flex items-center gap-3 md:gap-4 transition-all group shadow-xs">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-red-100 dark:bg-red-900/30 text-cs_red flex items-center justify-center md:text-xl shrink-0 group-hover:rotate-12 transition-transform">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[8px] md:text-[9px] font-black text-gray-400 dark:text-gray-500 uppercase">
                                Report</p>
                            <p
                                class="font-black text-[10px] md:text-xs text-gray-800 dark:text-gray-200 uppercase group-hover:text-cs_red transition-colors">
                                Tố Cáo Scam</p>
                        </div>
                    </a>

                    <a href="#"
                        class="bg-white dark:bg-dark_card hover:bg-blue-50 dark:hover:bg-blue-900/10 border border-gray-100 dark:border-gray-800 p-3 md:p-4 rounded-2xl flex items-center gap-3 md:gap-4 transition-all group shadow-xs">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-blue-100 dark:bg-blue-900/30 text-cs_blue flex items-center justify-center md:text-xl shrink-0 group-hover:rotate-12 transition-transform">
                            <i class="fa-solid fa-shield-cat"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[8px] md:text-[9px] font-black text-gray-400 dark:text-gray-500 uppercase">
                                Insurance</p>
                            <p
                                class="font-black text-[10px] md:text-xs text-gray-800 dark:text-gray-200 uppercase group-hover:text-cs_blue transition-colors">
                                Bảo Hiểm CS</p>
                        </div>
                    </a>

                    <a href="#"
                        class="bg-white dark:bg-dark_card hover:bg-green-50 dark:hover:bg-green-900/10 border border-gray-100 dark:border-gray-800 p-3 md:p-4 rounded-2xl flex items-center gap-3 md:gap-4 transition-all group shadow-xs">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-green-100 dark:bg-green-900/30 text-cs_green flex items-center justify-center md:text-xl shrink-0 group-hover:rotate-12 transition-transform">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[8px] md:text-[9px] font-black text-gray-400 dark:text-gray-500 uppercase">
                                Trading</p>
                            <p
                                class="font-black text-[10px] md:text-xs text-gray-800 dark:text-gray-200 uppercase group-hover:text-cs_green transition-colors">
                                Chợ Buôn Bán</p>
                        </div>
                    </a>

                    <a href="#"
                        class="bg-white dark:bg-dark_card hover:bg-gray-50 dark:hover:bg-slate-800 border border-gray-100 dark:border-gray-800 p-3 md:p-4 rounded-2xl flex items-center gap-3 md:gap-4 transition-all group shadow-xs">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-gray-100 dark:bg-slate-800 text-cs_blue flex items-center justify-center md:text-xl shrink-0 group-hover:rotate-12 transition-transform">
                            <i class="fa-brands fa-telegram"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[8px] md:text-[9px] font-black text-gray-400 dark:text-gray-500 uppercase">
                                Automation</p>
                            <p
                                class="font-black text-[10px] md:text-xs text-gray-800 dark:text-gray-200 uppercase group-hover:text-cs_blue transition-colors">
                                Bot Check</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 w-full">

        <!-- Top Full Width Banner -->

        <article class="max-w-[950px] mx-auto mb-8 dark:bg-white rounded-lg overflow-hidden">
            <img src="https://image.vietnix.vn/wp-content/uploads/2025/10/banner-vnx-optimizer-2048x216.webp"
                class="w-full h-18 md:h-full" alt="Quảng cáo banner">
        </article>
        <h2 class="text-xs md:text-xl text-center uppercase text-cs_blue mb-6 mt-6">
            <?php echo date('d/m/Y'); ?> CÓ 26 CẢNH BÁO</h2>

        <!-- 2 Column Layout -->
        <div class="flex flex-col lg:flex-row gap-4 mb-10">
            <!-- Khu Vực Trái: Các danh sách cảnh báo -->
            <div class="w-full lg:w-9/12 space-y-8">

                <!-- PHẦN 1: CẢNH BÁO NGÀY HÔM NAY -->
                <section>
                    {{-- <div class="flex items-center gap-2 mb-4 border-l-4 border-cs_red pl-3">
                        <h2 class="text-lg font-bold text-gray-800 uppercase"><?php echo date('d/m/Y'); ?> CÓ CẢNH BÁO</h2>
                        <span class="bg-red-100 text-cs_red text-[10px] px-2 py-0.5 rounded-full font-bold">MỚI</span>
                    </div> --}}
                    <div
                        class="bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden shadow-xs">
                        <?php for($i=1; $i<=3; $i++): ?>
                        <div
                            class="flex flex-col sm:flex-row items-center p-4 <?php echo $i < 3 ? 'border-b border-gray-100 dark:border-gray-800' : ''; ?> hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors gap-3 sm:gap-0">
                            <div class="w-full sm:w-5/12 flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 dark:bg-red-900/20 text-cs_red flex items-center justify-center text-xs shrink-0">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-900 dark:text-gray-100 text-xs md:text-sm font-bold">Nguyễn
                                        Văn A -
                                        <?php echo $i; ?></h3>
                                    <div class="text-[9px] md:text-[10px] text-gray-400 dark:text-gray-500">
                                        <i class="fa-regular fa-clock mr-1"></i>Vừa xong
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 sm:border-l border-gray-100 dark:border-gray-800 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 dark:text-gray-500 uppercase font-bold">Tài
                                        khoản</span>
                                    <span class="text-xs font-black text-cs_red">0987654321***</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/12 text-right">
                                <a href="#"
                                    class="inline-block bg-blue-50 dark:bg-blue-900/20 text-cs_blue px-3 py-1 rounded text-[10px] font-black hover:bg-cs_blue hover:text-white transition-all uppercase">Chi
                                    tiết</a>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </section>

                <!-- BANNER QUẢNG CÁO 1 -->
                <article class="max-w-[950px] dark:bg-white rounded-lg overflow-hidden">
                    <a href="#" target="_blank">
                        <img src="https://i.ibb.co/Z1kFjpWw/lienquangiaredt.gif" class="w-full h-18 md:h-full"
                            alt="Ads">
                    </a>
                </article>

                <!-- PHẦN 2: LỪA ĐẢO PHỔ BIẾN 7 NGÀY GẦN ĐÂY -->
                <section>
                    <div class="flex items-center gap-2 mb-4 border-l-4 border-cs_blue pl-3">
                        <h2 class="text-lg font-bold dark:text-white text-gray-800 uppercase">Lừa đảo phổ biến 7 ngày
                            gần đây</h2>
                    </div>
                    <div
                        class="bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden shadow-xs">
                        <?php for($i=1; $i<=7; $i++): ?>
                        <div
                            class="flex flex-col sm:flex-row items-center p-4 <?php echo $i < 3 ? 'border-b border-gray-100 dark:border-gray-800' : ''; ?> hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors gap-3 sm:gap-0">
                            <div class="w-full sm:w-5/12 flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 dark:bg-red-900/20 text-cs_red flex items-center justify-center text-xs shrink-0">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-900 dark:text-gray-100 text-xs md:text-sm font-bold">Nguyễn
                                        Văn A -
                                        <?php echo $i; ?></h3>
                                    <div class="text-[9px] md:text-[10px] text-gray-400 dark:text-gray-500">
                                        <i class="fa-regular fa-clock mr-1"></i>Vừa xong
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 sm:border-l border-gray-100 dark:border-gray-800 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 dark:text-gray-500 uppercase font-bold">Tài
                                        khoản</span>
                                    <span class="text-xs font-black text-cs_red">0987654321***</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/12 text-right">
                                <a href="#"
                                    class="inline-block bg-blue-50 dark:bg-blue-900/20 text-cs_blue px-3 py-1 rounded text-[10px] font-black hover:bg-cs_blue hover:text-white transition-all uppercase">Chi
                                    tiết</a>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </section>

                <!-- BANNER QUẢNG CÁO 2 -->
                <article class="max-w-[950px] dark:bg-white rounded-lg overflow-hidden">
                    <a href="#" target="_blank">
                        <img src="https://i.ibb.co/BV9hbrP2/banner3.gif" class="w-full h-18 md:h-full" alt="Ads">
                    </a>
                </article>

                <!-- PHẦN 3: TOP 3 TÌM KIẾM NGÀY -->
                <section>
                    <div class="flex items-center gap-2 mb-4 border-l-4 border-cs_orange pl-3">
                        <h2 class="text-lg font-bold dark:text-white text-gray-800 uppercase">Top 3 tìm kiếm ngày</h2>
                        <i class="fa-solid fa-fire text-cs_orange animate-pulse"></i>
                    </div>
                    <div
                        class="bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden shadow-xs">
                        <?php for($i=1; $i<=3; $i++): ?>
                        <div
                            class="flex flex-col sm:flex-row items-center p-4 <?php echo $i < 3 ? 'border-b border-gray-100 dark:border-gray-800' : ''; ?> hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors gap-3 sm:gap-0">
                            <div class="w-full sm:w-5/12 flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 dark:bg-red-900/20 text-cs_red flex items-center justify-center text-xs shrink-0">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-900 dark:text-gray-100 text-xs md:text-sm font-bold">Nguyễn
                                        Văn A -
                                        <?php echo $i; ?></h3>
                                    <div class="text-[9px] md:text-[10px] text-gray-400 dark:text-gray-500">
                                        <i class="fa-regular fa-clock mr-1"></i>Vừa xong
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 sm:border-l border-gray-100 dark:border-gray-800 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 dark:text-gray-500 uppercase font-bold">Tài
                                        khoản</span>
                                    <span class="text-xs font-black text-cs_red">0987654321***</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/12 text-right">
                                <a href="#"
                                    class="inline-block bg-blue-50 dark:bg-blue-900/20 text-cs_blue px-3 py-1 rounded text-[10px] font-black hover:bg-cs_blue hover:text-white transition-all uppercase">Chi
                                    tiết</a>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </section>


            </div>

            <!-- Khu Vực Phải: Sidebar Widget -->
            <aside class="w-full lg:w-3/12 space-y-3">
                <!-- Right Sidebar Banner -->
                <div class="aspect-square border border-gray-200 shadow-sm rounded-lg overflow-hidden dark:bg-white">
                    <a href="#" target="_blank" class="w-full h-full block">
                        <img src="https://i.ibb.co/kgwtn4vF/fpayment.jpg" class="w-full h-full" alt="Fpayment Ads">
                    </a>
                </div>


                <div class="aspect-square border border-gray-200 shadow-sm rounded-lg overflow-hidden dark:bg-white">
                    <a href="#" target="_blank" class="w-full h-full block">
                        <img src="https://png.pngtree.com/png-clipart/20250126/original/pngtree-hologram-gradient-flash-sale-square-poster-banner-promotion-vector-png-image_19237469.png"
                            class="w-full h-full" alt="Fpayment Ads">
                    </a>
                </div>
                <!-- Action Button -->
                <div
                    class="bg-red-50 dark:bg-slate-900/50 border border-red-200 dark:border-red-900/30 p-6 rounded-xl text-center shadow-sm">
                    <div
                        class="w-12 h-12 bg-red-100 dark:bg-red-900/30 text-cs_red rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-md mb-2 text-gray-800 dark:text-gray-100">BẠN ĐANG BỊ SCAM?</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-[13px] mb-5 leading-relaxed">
                        Chặn đứng kẻ gian bằng cách báo cáo ngay lên hệ thống. Đóng góp của bạn giúp cộng đồng MMO
                        an toàn hơn.
                    </p>
                    <button
                        class="w-full bg-cs_red shadow-sm text-white font-bold py-3 px-4 text-sm rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fa-regular fa-paper-plane mr-1"></i> GỬI ĐƠN TỐ CÁO
                    </button>
                </div>

                <!-- Box Quỹ Bảo Hiểm -->
                <div
                    class="bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-lg shadow-sm p-5">
                    <div class="flex justify-between items-center mb-4">
                        <h2
                            class="font-bold text-[13px] md:text-sm text-gray-800 dark:text-gray-200 uppercase flex items-center gap-2">
                            <i class="fa-solid fa-shield text-cs_green"></i> QUỸ BẢO HIỂM CS
                        </h2>
                        <a href="#" class="text-[10px] md:text-xs text-cs_blue hover:underline">Xem Quỹ</a>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <!-- Avatar items -->
                        <?php
                            $avatars = [
                                ['name' => 'Lê Vũ', 'color' => '2eb85c', 'title' => 'Lê Tuấn Vũ - 50 Triệu'],
                                ['name' => 'Hải Phạm', 'color' => '3399ff', 'title' => 'Hải Phạm - 30 Triệu'],
                                ['name' => 'Nam Hoàng', 'color' => 'fdb813', 'title' => 'Nam Hoàng - 100 Triệu'],
                                ['name' => 'Hữu Thắng', 'color' => '8b5cf6', 'title' => 'Hữu Thắng - 80 Triệu'],
                                ['name' => 'Kiều Oanh', 'color' => 'ec4899', 'title' => 'Kiều Oanh - 40 Triệu'],
                                ['name' => 'Minh Tiến', 'color' => '0f766e', 'title' => 'Minh Tiến - 10 Triệu'],
                                ['name' => 'Gia Bảo', 'color' => 'c2410c', 'title' => 'Gia Bảo - 60 Triệu'],
                            ];
                            foreach($avatars as $av): ?>
                        <a href="#" class="flex flex-col items-center relative" title="<?php echo $av['title']; ?>">
                            <div class="relative mb-1">
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($av['name']); ?>&background=<?php echo $av['color']; ?>&color=fff&size=48"
                                    alt="<?php echo $av['name']; ?>"
                                    class="rounded-full w-10 h-10 md:w-12 md:h-12 border-2 border-gray-100 dark:border-gray-800 object-cover shadow-sm">
                                <div
                                    class="absolute bottom-0 right-0 w-3 h-3 md:w-4 md:h-4 bg-cs_blue rounded-full border-2 border-white dark:border-gray-800 flex items-center justify-center">
                                    <i class="fa-solid fa-check text-white text-[6px] md:text-[8px]"></i>
                                </div>
                            </div>
                            <span
                                class="text-[8px] md:text-[10px] text-gray-600 dark:text-gray-400 font-medium text-center truncate w-full">
                                <?php echo $av['name']; ?>
                            </span>
                        </a>
                        <?php endforeach; ?>

                        <a href="#" class="flex flex-col items-center relative" title="Xem tất cả">
                            <div class="relative mb-1">
                                <div
                                    class="rounded-full w-10 h-10 md:w-12 md:h-12 bg-gray-100 dark:bg-slate-800 border-2 border-gray-200 dark:border-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-400 shadow-sm">
                                    <i class="fa-solid fa-arrow-right text-xs"></i>
                                </div>
                            </div>
                            <span
                                class="text-[8px] md:text-[10px] text-gray-600 dark:text-gray-400 font-medium text-center truncate w-full">Tất
                                cả +50</span>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
        </section>

        <!-- NEW FULL-WIDTH SECTIONS -->
        <div class="mt-16 sm:mt-20 space-y-12 sm:space-y-16">
            <!-- Section Lịch Sử Bình Luận -->
            <section aria-labelledby="comments-history-title">
                <div class="max-w-4xl mx-auto text-center mb-8">
                    <h2 id="comments-history-title"
                        class="text-xl md:text-2xl font-black dark:text-white text-gray-800 uppercase tracking-tight">
                        <i class="fa-solid fa-comments text-cs_blue mr-2"></i>Bình luận <span class="text-cs_blue">mới
                            nhất</span>
                    </h2>
                    <p class="text-gray-500 text-[10px] md:text-xs mt-2 uppercase tracking-widest font-bold">Cập nhật
                        hoạt động từ cộng đồng</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
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
                    foreach($comments as $cmt): ?>
                    <div class="bg-white border border-gray-100 p-5 rounded-2xl shadow-xs">
                        <div class="flex items-center gap-3 mb-4">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($cmt['user']); ?>&background=<?php echo $cmt['color']; ?>&color=fff&size=40"
                                class="w-10 h-10 rounded-full border-2 border-gray-50" alt="User">
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm"><?php echo $cmt['user']; ?></h4>
                                <span class="text-[10px] text-gray-400 font-medium"><?php echo $cmt['time']; ?></span>
                            </div>
                        </div>
                        <p class="text-gray-600 text-xs leading-relaxed mb-4 line-clamp-2 italic">
                            "<?php echo $cmt['content']; ?>"
                        </p>
                        <div class="flex items-center justify-between pt-3 border-t border-gray-50">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">Đối
                                tượng:</span>
                            <span
                                class="text-[10px] font-black text-cs_red bg-red-50 px-2 py-0.5 rounded"><?php echo $cmt['target']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8 text-center">
                    <a href="#" class="text-xs font-black text-cs_blue hover:underline uppercase tracking-widest">
                        Xem tất cả bình luận <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </section>

            <!-- Section Bí Quyết Giao Dịch -->
            <section aria-labelledby="safety-tips-title"
                class="bg-gradient-to-br from-white to-blue-50/50 dark:from-slate-900/50 dark:to-slate-800/30 border border-blue-100/50 dark:border-gray-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-12 shadow-xs">
                <div class="max-w-4xl mx-auto text-center mb-8 md:mb-12">
                    <span
                        class="inline-block px-3 py-1 bg-cs_blue/10 text-cs_blue text-[10px] font-bold uppercase tracking-widest rounded-full mb-4">Cẩm
                        nang an toàn</span>
                    <h2 id="safety-tips-title"
                        class="text-xl md:text-2xl lg:text-3xl font-black text-gray-800 dark:text-white uppercase tracking-tight">
                        Cách giao dịch <span class="text-cs_blue">không lừa đảo</span>
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400 text-xs md:text-sm mt-3 leading-relaxed">
                        Thế giới MMO đầy rẫy rủi ro, nắm vững 3 nguyên tắc "vàng" túi tiền sẽ được bảo vệ tuyệt đối.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <article
                        class="group bg-white dark:bg-dark_card p-6 sm:p-8 rounded-lg shadow-xs border border-gray-200 dark:border-gray-800">
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-blue-50 dark:bg-blue-900/30 text-cs_blue rounded-xl flex items-center justify-center mb-6 border border-blue-100 dark:border-blue-900/50">
                            <i class="fa-solid fa-magnifying-glass-chart text-lg md:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-gray-100 text-base md:text-lg mb-3">Luôn luôn kiểm
                            tra</h4>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Hãy <span class="font-bold text-cs_blue">copy SĐT/STK</span> dán vào CheckScam để xem họ có
                            "vết đen" nào không.
                        </p>
                    </article>

                    <article
                        class="group bg-white dark:bg-dark_card p-6 sm:p-8 rounded-lg shadow-xs border border-gray-200 dark:border-gray-800">
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-green-50 dark:bg-green-900/30 text-cs_green rounded-xl flex items-center justify-center mb-6 border border-green-100 dark:border-green-900/50">
                            <i class="fa-solid fa-user-shield text-lg md:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-gray-100 text-base md:text-lg mb-3">Sử dụng trung
                            gian</h4>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Với giao dịch lạ, hãy mời một <span class="font-bold text-cs_green">Trung Gian Uy
                                Tín</span> có đóng quỹ bảo hiểm.
                        </p>
                    </article>

                    <article
                        class="group bg-white dark:bg-dark_card p-6 sm:p-8 rounded-lg shadow-xs border border-gray-200 dark:border-gray-800">
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-red-50 dark:bg-red-900/30 text-cs_red rounded-xl flex items-center justify-center mb-6 border border-red-100 dark:border-red-900/50">
                            <i class="fa-solid fa-bolt-lightning text-lg md:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-gray-100 text-base md:text-lg mb-3">Cảnh giác link
                            lạ</h4>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Link "xác nhận tiền" hay "nhập OTP" đều là bẫy. Ngân hàng <span
                                class="font-bold text-cs_red">không bao giờ</span> yêu cầu.
                        </p>
                    </article>
                </div>
            </section>

            <!-- Box FAQ -->
            <section aria-labelledby="faq-title" class="max-w-5xl mx-auto px-4">
                <div class="flex flex-col items-center mb-8 md:mb-10 text-center">
                    <div class="w-12 h-1 bg-cs_blue rounded-full mb-6"></div>
                    <h2 id="faq-title"
                        class="text-xl md:text-2xl font-black text-gray-800 dark:text-white uppercase tracking-tight">
                        Trợ giúp & Giải đáp</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-xs md:text-sm mt-2">Mọi thắc mắc về hệ thống
                        CheckScam đều có tại đây.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-3 items-start">
                    <details
                        class="group bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xs hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold">01</span>
                                <h3 class="font-bold text-gray-700 dark:text-gray-200 text-xs md:text-sm">Làm sao để tố
                                    cáo lừa đảo?</h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 dark:text-gray-400 border-t border-gray-50 dark:border-gray-800 pt-3">
                            Bấm vào nút <span class="text-cs_red font-bold uppercase">Gửi đơn tố cáo</span>, điền thông
                            tin kẻ lừa đảo kèm hình ảnh bằng chứng rõ ràng. Admin sẽ duyệt trong 24h.
                        </div>
                    </details>

                    <details
                        class="group bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xs hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold">02</span>
                                <h3 class="font-bold text-gray-700 dark:text-gray-200 text-xs md:text-sm">Tại sao bài
                                    phốt chưa được
                                    duyệt?</h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 dark:text-gray-400 border-t border-gray-50 dark:border-gray-800 pt-3">
                            Hệ thống kiểm tra thủ công để tránh tình trạng tố cáo ảo. Nếu sau 24h chưa duyệt, hãy kiểm
                            tra lại tính minh bạch của bằng chứng bạn gửi.
                        </div>
                    </details>

                    <details
                        class="group bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xs hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold">03</span>
                                <h3 class="font-bold text-gray-700 dark:text-gray-200 text-xs md:text-sm">Quỹ Bảo Đảm
                                    hoạt động thế nào?
                                </h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 dark:text-gray-400 border-t border-gray-50 dark:border-gray-800 pt-3">
                            Trung gian uy tín đóng quỹ (tiền ký quỹ) cho Admin. Nếu họ lừa đảo, Admin dùng tiền đó đền
                            bù cho bạn 100%.
                        </div>
                    </details>

                    <details
                        class="group bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-2xl shadow-sm hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold">04</span>
                                <h3 class="font-bold text-gray-700 dark:text-gray-200 text-xs md:text-sm">Tôi có thể
                                    xin gỡ bài viết
                                    không?</h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 dark:text-gray-400 border-t border-gray-50 dark:border-gray-800 pt-3">
                            Chỉ gỡ khi người tố cáo xác nhận đã giải quyết xong. Chúng tôi KHÔNG gỡ vì hối lộ hay áp lực
                            từ kẻ lừa đảo.
                        </div>
                    </details>
                </div>
            </section>
        </div>
    </main>
@endsection

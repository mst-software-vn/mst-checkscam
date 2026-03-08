@extends("layouts.app")

@section("content")
    <x-hero />

    <!-- Main Content -->
    <main class="grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 w-full">
        <!-- Top Full Width Banner -->

        <x-ads-horizontal
            image="https://image.vietnix.vn/wp-content/uploads/2025/10/banner-vnx-optimizer-2048x216.webp"
            url="#"
            alt="Ads"
        />

        <h2 class="text-xs md:text-xl text-center uppercase text-cs_blue mb-6 mt-6">
            {{ date("d/m/Y") }} CÓ 26 CẢNH BÁO
        </h2>

        <!-- 2 Column Layout -->
        <div class="flex flex-col lg:flex-row gap-4 mb-10">
            <!-- Khu Vực Trái: Các danh sách cảnh báo -->
            <div class="w-full lg:w-9/12 space-y-8">
                <!-- PHẦN 1: CẢNH BÁO NGÀY HÔM NAY -->
                <section>
                    <div class="flex items-center gap-2 mb-4 border-l-4 border-cs_red pl-3">
                        <h2 class="text-lg font-bold dark:text-gray-300 text-gray-800 uppercase">
                            <?php echo date("d/m/Y"); ?>
                            CÓ CẢNH BÁO
                        </h2>
                        <span class="bg-red-100 text-cs_red text-[10px] px-2 py-0.5 rounded-full font-bold">MỚI</span>
                    </div>
                    <div
                        class="bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden shadow-xs"
                    >
                        <?php for($i=1; $i<=3; $i++): ?>

                        <div
                            class="flex flex-col sm:flex-row items-center p-4 <?php echo $i < 3 ? "border-b border-gray-100 dark:border-gray-800" : ""; ?> hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors gap-3 sm:gap-0"
                        >
                            <div class="w-full sm:w-5/12 flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 dark:bg-red-900/20 text-cs_red flex items-center justify-center text-xs shrink-0"
                                >
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-900 dark:text-gray-300 text-xs md:text-sm font-bold">
                                        Nguyễn Văn A -

                                        <?php echo $i; ?>
                                    </h3>
                                    <div class="text-[9px] md:text-[10px] text-gray-400 dark:text-gray-500">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        Vừa xong
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 sm:border-l border-gray-100 dark:border-gray-800 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 dark:text-gray-500 uppercase font-bold">
                                        Tài khoản
                                    </span>
                                    <span class="text-xs font-black text-cs_red">0987654321***</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/12 text-right">
                                <a
                                    href="/pham-hoang-tuan-1/"
                                    class="inline-block bg-blue-50 dark:bg-blue-900/20 text-cs_blue px-3 py-1 rounded text-[10px] font-black hover:bg-cs_blue hover:text-white transition-all uppercase"
                                >
                                    Chi tiết
                                </a>
                            </div>
                        </div>

                        <?php endfor; ?>
                    </div>
                </section>

                <!-- BANNER QUẢNG CÁO 1 -->
                <x-ads-horizontal image="https://i.ibb.co/Z1kFjpWw/lienquangiaredt.gif" url="#" alt="Ads" />

                <!-- PHẦN 2: LỪA ĐẢO PHỔ BIẾN 7 NGÀY GẦN ĐÂY -->
                <section>
                    <div class="flex items-center gap-2 mb-4 border-l-4 border-cs_blue pl-3">
                        <h2 class="text-lg font-bold dark:text-gray-300 text-gray-800 uppercase">
                            Lừa đảo phổ biến 7 ngày gần đây
                        </h2>
                    </div>
                    <div
                        class="bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden shadow-xs"
                    >
                        <?php for($i=1; $i<=7; $i++): ?>

                        <div
                            class="flex flex-col sm:flex-row items-center p-4 <?php echo $i < 3 ? "border-b border-gray-100 dark:border-gray-800" : ""; ?> hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors gap-3 sm:gap-0"
                        >
                            <div class="w-full sm:w-5/12 flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 dark:bg-red-900/20 text-cs_red flex items-center justify-center text-xs shrink-0"
                                >
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-900 dark:text-gray-300 text-xs md:text-sm font-bold">
                                        Nguyễn Văn A -

                                        <?php echo $i; ?>
                                    </h3>
                                    <div class="text-[9px] md:text-[10px] text-gray-400 dark:text-gray-500">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        Vừa xong
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 sm:border-l border-gray-100 dark:border-gray-800 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 dark:text-gray-500 uppercase font-bold">
                                        Tài khoản
                                    </span>
                                    <span class="text-xs font-black text-cs_red">0987654321***</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/12 text-right">
                                <a
                                    href="/pham-hoang-tuan-1/"
                                    class="inline-block bg-blue-50 dark:bg-blue-900/20 text-cs_blue px-3 py-1 rounded text-[10px] font-black hover:bg-cs_blue hover:text-white transition-all uppercase"
                                >
                                    Chi tiết
                                </a>
                            </div>
                        </div>

                        <?php endfor; ?>
                    </div>
                </section>

                <!-- BANNER QUẢNG CÁO 2 -->
                <x-ads-horizontal image="https://i.ibb.co/BV9hbrP2/banner3.gif" url="#" alt="Ads" />

                <!-- PHẦN 3: TOP 3 TÌM KIẾM NGÀY -->
                <section>
                    <div class="flex items-center gap-2 mb-4 border-l-4 border-cs_orange pl-3">
                        <h2 class="text-lg font-bold dark:text-gray-300 text-gray-800 uppercase">
                            Top 3 tìm kiếm ngày
                        </h2>
                        <i class="fa-solid fa-fire text-cs_orange animate-pulse"></i>
                    </div>
                    <div
                        class="bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden shadow-xs"
                    >
                        <?php for($i=1; $i<=3; $i++): ?>

                        <div
                            class="flex flex-col sm:flex-row items-center p-4 <?php echo $i < 3 ? "border-b border-gray-100 dark:border-gray-800" : ""; ?> hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors gap-3 sm:gap-0"
                        >
                            <div class="w-full sm:w-5/12 flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 dark:bg-red-900/20 text-cs_red flex items-center justify-center text-xs shrink-0"
                                >
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-900 dark:text-gray-300 text-xs md:text-sm font-bold">
                                        Nguyễn Văn A -

                                        <?php echo $i; ?>
                                    </h3>
                                    <div class="text-[9px] md:text-[10px] text-gray-400 dark:text-gray-500">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        Vừa xong
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 sm:border-l border-gray-100 dark:border-gray-800 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 dark:text-gray-500 uppercase font-bold">
                                        Tài khoản
                                    </span>
                                    <span class="text-xs font-black text-cs_red">0987654321***</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/12 text-right">
                                <a
                                    href="/pham-hoang-tuan-1/"
                                    class="inline-block bg-blue-50 dark:bg-blue-900/20 text-cs_blue px-3 py-1 rounded text-[10px] font-black hover:bg-cs_blue hover:text-white transition-all uppercase"
                                >
                                    Chi tiết
                                </a>
                            </div>
                        </div>

                        <?php endfor; ?>
                    </div>
                </section>
            </div>

            <!-- Khu Vực Phải: Sidebar Widget -->
            <aside class="w-full lg:w-3/12 space-y-3">
                <!-- Right Sidebar Banner -->

                <x-ads-square image="https://i.ibb.co/kgwtn4vF/fpayment.jpg" url="#" alt="Fpayment Ads" class="mt-10" />
                <x-ads-square
                    image="https://png.pngtree.com/png-clipart/20250126/original/pngtree-hologram-gradient-flash-sale-square-poster-banner-promotion-vector-png-image_19237469.png"
                    url="#"
                    alt="Fpayment Ads"
                />

                <!-- Action Button -->
                <div
                    class="bg-red-50 dark:bg-slate-900/50 border border-red-200 dark:border-red-900/30 p-6 rounded-xl text-center shadow-sm"
                >
                    <div
                        class="w-12 h-12 bg-red-100 dark:bg-red-900/30 text-cs_red rounded-full flex items-center justify-center mx-auto mb-3"
                    >
                        <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-md mb-2 text-gray-800 dark:text-gray-100">BẠN ĐANG BỊ SCAM?</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-[13px] mb-5 leading-relaxed">
                        Chặn đứng kẻ gian bằng cách báo cáo ngay lên hệ thống. Đóng góp của bạn giúp cộng đồng MMO an
                        toàn hơn.
                    </p>
                    <button
                        class="w-full cursor-pointer bg-cs_red shadow-sm text-white font-bold py-3 px-4 text-sm rounded-lg hover:bg-red-700 transition-colors"
                    >
                        <i class="fa-regular fa-paper-plane mr-1"></i>
                        GỬI ĐƠN TỐ CÁO
                    </button>
                </div>

                <!-- Box Quỹ Bảo Hiểm -->
                <div
                    class="bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xs overflow-hidden"
                >
                    <div class="p-5 border-b border-gray-100 dark:border-gray-800 bg-gray-50/50 dark:bg-slate-800/20">
                        <div class="flex justify-between items-center mb-1">
                            <h2
                                class="font-black text-xs md:text-sm text-gray-800 dark:text-gray-200 uppercase flex items-center gap-2"
                            >
                                <i class="fa-solid fa-shield-halved text-cs_blue text-lg"></i>
                                QUỸ BẢO HIỂM
                            </h2>
                            <a href="/bao-hiem-cs" class="text-[10px] font-bold text-cs_blue hover:underline uppercase">
                                Xem tất cả
                            </a>
                        </div>
                        <p class="text-[10px] text-gray-400 dark:text-gray-500 font-bold uppercase tracking-tighter">
                            Tổng quỹ:
                            <span class="text-cs_green">~5.8 Tỷ</span>
                            •
                            <span class="text-gray-300 dark:text-gray-700">|</span>
                            128+ TV
                        </p>
                    </div>

                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-x-2 gap-y-5">
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
                                ['name' => 'Thanh Tuyền', 'color' => 'd24frr', 'title' => 'Thanh Tuyền - 60 Triệu'],
                            ];
                            foreach($avatars as $av): ?>

                            <a
                                href="#"
                                class="group flex flex-col items-center relative"
                                title="<?php echo $av["title"]; ?>"
                            >
                                <div class="relative mb-2">
                                    <div
                                        class="w-12 h-12 md:w-14 md:h-14 rounded-full border-2 border-white dark:border-slate-800 shadow-sm group-hover:shadow-cs_blue/20 transition-all duration-300 group-hover:scale-110 active:scale-95 overflow-hidden"
                                    >
                                        <img
                                            src="https://ui-avatars.com/api/?name=<?php echo urlencode($av["name"]); ?>&background=<?php echo $av["color"]; ?>&color=fff&size=56"
                                            alt="<?php echo $av["name"]; ?>"
                                            class="w-full h-full object-cover group-hover:rotate-3 transition-transform duration-500"
                                        />
                                    </div>
                                    <div
                                        class="absolute bottom-0 right-0 w-4 h-4 bg-cs_blue rounded-full border-2 border-white dark:border-slate-800 flex items-center justify-center shadow-sm"
                                    >
                                        <i class="fa-solid fa-check text-white text-[8px]"></i>
                                    </div>
                                </div>
                                <span
                                    class="text-[10px] text-gray-700 dark:text-gray-300 font-bold text-center truncate w-full group-hover:text-cs_blue transition-colors"
                                >
                                    <?php echo $av["name"]; ?>
                                </span>
                            </a>

                            <?php endforeach; ?>

                            <a href="/bao-hiem-cs" class="group flex flex-col items-center relative" title="Xem tất cả">
                                <div class="relative mb-2">
                                    <div
                                        class="rounded-full w-12 h-12 md:w-14 md:h-14 bg-gray-50 dark:bg-slate-800/50 border-2 border-gray-100 dark:border-gray-800 flex items-center justify-center text-gray-400 group-hover:text-cs_blue group-hover:border-cs_blue transition-all duration-300 group-hover:scale-110"
                                    >
                                        <i class="fa-solid fa-eye text-lg"></i>
                                    </div>
                                </div>
                                <span
                                    class="text-[10px] text-gray-500 dark:text-gray-400 font-bold text-center uppercase tracking-tighter w-full"
                                >
                                    Tất cả
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <!-- NEW FULL-WIDTH SECTIONS -->
        <div class="mt-16 sm:mt-20 space-y-12 sm:space-y-16">
            <!-- Section Lịch Sử Bình Luận -->
            <section aria-labelledby="comments-history-title">
                <div class="max-w-4xl mx-auto text-center mb-8">
                    <h2
                        id="comments-history-title"
                        class="text-xl md:text-2xl font-black dark:text-gray-300 text-gray-800 uppercase tracking-tight"
                    >
                        <i class="fa-solid fa-comments text-cs_blue mr-2"></i>
                        Bình luận
                        <span class="text-cs_blue">mới nhất</span>
                    </h2>
                    <p class="text-gray-500 text-[10px] md:text-xs mt-2 uppercase tracking-widest font-bold">
                        Cập nhật hoạt động từ cộng đồng
                    </p>
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

                    <div
                        class="bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 p-5 rounded-2xl shadow-xs"
                    >
                        <div class="flex items-center gap-3 mb-4">
                            <img
                                src="https://ui-avatars.com/api/?name=<?php echo urlencode($cmt["user"]); ?>&background=<?php echo $cmt["color"]; ?>&color=fff&size=40"
                                class="w-10 h-10 rounded-full border-2 border-gray-50 dark:border-gray-800"
                                alt="User"
                            />
                            <div>
                                <h4 class="font-bold text-gray-800 dark:text-gray-100 text-sm">
                                    <?php echo $cmt["user"]; ?>
                                </h4>
                                <span class="text-[10px] text-gray-400 dark:text-gray-500 font-medium">
                                    <?php echo $cmt["time"]; ?>
                                </span>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-xs leading-relaxed mb-4 line-clamp-2 italic">
                            "<?php echo $cmt["content"]; ?>"
                        </p>
                        <div
                            class="flex items-center justify-between pt-3 border-t border-gray-50 dark:border-gray-800"
                        >
                            <span
                                class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-tighter"
                            >
                                Đối tượng:
                            </span>
                            <span
                                class="text-[10px] font-black text-cs_red bg-red-50 dark:bg-red-900/20 px-2 py-0.5 rounded"
                            >
                                <?php echo $cmt["target"]; ?>
                            </span>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>

                <div class="mt-8 text-center">
                    <a href="#" class="text-xs font-black text-cs_blue hover:underline uppercase tracking-widest">
                        Xem tất cả bình luận
                        <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </section>

            <!-- Section Bí Quyết Giao Dịch -->
            <section
                aria-labelledby="safety-tips-title"
                class="bg-gradient-to-br from-white to-blue-50/50 dark:from-slate-900/50 dark:to-slate-800/30 border border-blue-100/50 dark:border-gray-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-12 shadow-xs"
            >
                <div class="max-w-4xl mx-auto text-center mb-8 md:mb-12">
                    <span
                        class="inline-block px-3 py-1 bg-cs_blue/10 text-cs_blue text-[10px] font-bold uppercase tracking-widest rounded-full mb-4"
                    >
                        Cẩm nang an toàn
                    </span>
                    <h2
                        id="safety-tips-title"
                        class="text-xl md:text-2xl lg:text-3xl font-black text-gray-800 dark:text-slate-50 uppercase tracking-tight"
                    >
                        Cách giao dịch
                        <span class="text-cs_blue">không lừa đảo</span>
                    </h2>
                    <p class="text-gray-500 dark:text-slate-500 text-xs md:text-sm mt-3 leading-relaxed">
                        Thế giới MMO đầy rẫy rủi ro, nắm vững 3 nguyên tắc "vàng" túi tiền sẽ được bảo vệ tuyệt đối.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <article
                        class="group bg-white dark:bg-dark_card p-6 sm:p-8 rounded-lg shadow-xs border border-gray-200 dark:border-gray-800"
                    >
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-blue-50 dark:bg-blue-900/30 text-cs_blue rounded-xl flex items-center justify-center mb-6 border border-blue-100 dark:border-blue-900/50"
                        >
                            <i class="fa-solid fa-magnifying-glass-chart text-lg md:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-gray-100 text-base md:text-lg mb-3">
                            Luôn luôn kiểm tra
                        </h4>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Hãy
                            <span class="font-bold text-cs_blue">copy SĐT/STK</span>
                            dán vào CheckScam để xem họ có "vết đen" nào không.
                        </p>
                    </article>

                    <article
                        class="group bg-white dark:bg-dark_card p-6 sm:p-8 rounded-lg shadow-xs border border-gray-200 dark:border-gray-800"
                    >
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-green-50 dark:bg-green-900/30 text-cs_green rounded-xl flex items-center justify-center mb-6 border border-green-100 dark:border-green-900/50"
                        >
                            <i class="fa-solid fa-user-shield text-lg md:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-gray-100 text-base md:text-lg mb-3">
                            Sử dụng trung gian
                        </h4>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Với giao dịch lạ, hãy mời một
                            <span class="font-bold text-cs_green">Trung Gian Uy Tín</span>
                            có đóng quỹ bảo hiểm.
                        </p>
                    </article>

                    <article
                        class="group bg-white dark:bg-dark_card p-6 sm:p-8 rounded-lg shadow-xs border border-gray-200 dark:border-gray-800"
                    >
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-red-50 dark:bg-red-900/30 text-cs_red rounded-xl flex items-center justify-center mb-6 border border-red-100 dark:border-red-900/50"
                        >
                            <i class="fa-solid fa-bolt-lightning text-lg md:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-gray-100 text-base md:text-lg mb-3">
                            Cảnh giác link lạ
                        </h4>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Link "xác nhận tiền" hay "nhập OTP" đều là bẫy. Ngân hàng
                            <span class="font-bold text-cs_red">không bao giờ</span>
                            yêu cầu.
                        </p>
                    </article>
                </div>
            </section>

            <!-- Box FAQ -->
            <section aria-labelledby="faq-title" class="max-w-5xl mx-auto lg:px-4">
                <div class="flex flex-col items-center mb-8 md:mb-10 text-center">
                    <div class="w-12 h-1 bg-cs_blue rounded-full mb-6"></div>
                    <h2
                        id="faq-title"
                        class="text-xl md:text-2xl font-black dark:text-slate-50 text-gray-800 uppercase tracking-tight"
                    >
                        Trợ giúp & Giải đáp
                    </h2>
                    <p class="text-gray-500 dark:text-slate-500 text-xs md:text-sm mt-2">
                        Mọi thắc mắc về hệ thống CheckScam đều có tại đây.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-3 items-start">
                    <details
                        class="group bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xs hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden"
                    >
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold"
                                >
                                    01
                                </span>
                                <h3 class="font-bold text-gray-700 dark:text-gray-200 text-xs md:text-sm">
                                    Làm sao để tố cáo lừa đảo?
                                </h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"
                            ></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 dark:text-gray-400 border-t border-gray-50 dark:border-gray-800 pt-3"
                        >
                            Bấm vào nút
                            <span class="text-cs_red font-bold uppercase">Gửi đơn tố cáo</span>
                            , điền thông tin kẻ lừa đảo kèm hình ảnh bằng chứng rõ ràng. Admin sẽ duyệt trong 24h.
                        </div>
                    </details>

                    <details
                        class="group bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xs hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden"
                    >
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold"
                                >
                                    02
                                </span>
                                <h3 class="font-bold text-gray-700 dark:text-gray-200 text-xs md:text-sm">
                                    Tại sao bài phốt chưa được duyệt?
                                </h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"
                            ></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 dark:text-gray-400 border-t border-gray-50 dark:border-gray-800 pt-3"
                        >
                            Hệ thống kiểm tra thủ công để tránh tình trạng tố cáo ảo. Nếu sau 24h chưa duyệt, hãy kiểm
                            tra lại tính minh bạch của bằng chứng bạn gửi.
                        </div>
                    </details>

                    <details
                        class="group bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xs hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden"
                    >
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold"
                                >
                                    03
                                </span>
                                <h3 class="font-bold text-gray-700 dark:text-gray-200 text-xs md:text-sm">
                                    Quỹ Bảo Đảm hoạt động thế nào?
                                </h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"
                            ></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 dark:text-gray-400 border-t border-gray-50 dark:border-gray-800 pt-3"
                        >
                            Trung gian uy tín đóng quỹ (tiền ký quỹ) cho Admin. Nếu họ lừa đảo, Admin dùng tiền đó đền
                            bù cho bạn 100%.
                        </div>
                    </details>

                    <details
                        class="group bg-white dark:bg-dark_card border border-gray-200 dark:border-gray-800 rounded-2xl shadow-sm hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden"
                    >
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold"
                                >
                                    04
                                </span>
                                <h3 class="font-bold text-gray-700 dark:text-gray-200 text-xs md:text-sm">
                                    Tôi có thể xin gỡ bài viết không?
                                </h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"
                            ></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 dark:text-gray-400 border-t border-gray-50 dark:border-gray-800 pt-3"
                        >
                            Chỉ gỡ khi người tố cáo xác nhận đã giải quyết xong. Chúng tôi KHÔNG gỡ vì hối lộ hay áp lực
                            từ kẻ lừa đảo.
                        </div>
                    </details>
                </div>
            </section>
        </div>
    </main>
@endsection

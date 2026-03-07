@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="dark:bg-dark_bg pb-12 md:pd-24">
        <x-breadcrumb :links="[['name' => 'Lừa đảo Nguyễn Văn Sáng']]" />

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <h1
                    class="text-2xl md:text-4xl lg:text-5xl font-black mb-4 md:mb-6 uppercase leading-tight md:leading-[1.4] hero-title scanner-title">
                    KIỂM TRA & TỐ CÁO SCAM.
                </h1>
                <p
                    class="text-gray-600 dark:text-gray-400 mb-8 md:mb-10 max-w-2xl mx-auto text-[13px] md:text-lg leading-relaxed font-medium px-4">
                    Hệ thống dữ liệu lớn nhất Việt Nam giúp bạn kiểm tra độ tín nhiệm của đối tác thông qua SĐT, Số TK
                    hoặc Link mạng xã hội.
                </p>

                <!-- Search Box Centered -->
                <div class="max-w-2xl mx-auto mb-6">
                    <div
                        class="relative bg-white dark:bg-slate-900 border-2 border-gray-100 dark:border-gray-800 rounded-2xl shadow-xl shadow-blue-500/5 focus-within:border-cs_blue transition-all p-1.5 md:p-2">
                        <div class="flex flex-col sm:flex-row items-center gap-1 md:gap-2">
                            <div class="flex-1 flex items-center w-full min-w-0">
                                <div class="pl-3 md:pl-4 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm md:text-lg"></i>
                                </div>
                                <input type="text"
                                    class="w-full pl-2 md:pl-3 outline-none pr-3 py-2.5 md:py-3 bg-transparent border-none focus:ring-0 text-gray-800 dark:text-white text-sm md:text-base font-bold placeholder-gray-400 dark:placeholder-gray-600"
                                    placeholder="Số tài khoản, SĐT..." />
                            </div>
                            <button
                                class="w-full sm:w-auto bg-cs_blue hover:bg-blue-600 text-white px-6 md:px-8 py-2.5 md:py-3 rounded-xl font-black text-xs md:text-sm tracking-widest transition-all shadow-lg active:scale-95 whitespace-nowrap">
                                TRA CỨU
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <main class="grow pb-16 w-full max-w-6xl mx-auto px-4 sm:px-6 relative z-30 -mt-4 md:mt-0">
        <div class="flex flex-col lg:flex-row gap-6">

            <!-- Left Column: Main Info (8/12) -->
            <div class="w-full lg:w-8/12 space-y-6">

                <!-- Main Scam Detail Card -->
                <div
                    class="bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 rounded-3xl overflow-hidden shadow-sm">
                    <!-- Subtle Gradient Header -->
                    <div
                        class="bg-linear-to-r from-red-50/30 to-transparent dark:from-red-900/5 px-6 py-4 border-b border-gray-50 dark:border-gray-800 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-cs_red/10 text-cs_red flex items-center justify-center">
                                <i class="fa-solid fa-user-slash text-sm"></i>
                            </div>
                            <div>
                                <h2
                                    class="text-xs md:text-sm font-black uppercase text-gray-800 dark:text-gray-100 tracking-tight leading-none">
                                    Chi tiết đối tượng lừa đảo</h2>
                                <span class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mt-1 block">Mã vụ
                                    việc: #CS-2026-9912</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span
                                class="text-[9px] font-black text-white bg-cs_red px-2 py-0.5 rounded uppercase tracking-tighter">Bị
                                tố cáo</span>
                        </div>
                    </div>

                    <div class="p-0">
                        <div class="divide-y divide-gray-50 dark:divide-gray-800/50">
                            <!-- Field: Chủ TK -->
                            <div
                                class="flex items-center p-4 group hover:bg-gray-50/30 dark:hover:bg-slate-800/30 transition-colors">
                                <div
                                    class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center text-gray-400 group-hover:text-cs_blue transition-colors shrink-0">
                                    <i class="fa-solid fa-id-card text-sm md:text-base"></i>
                                </div>
                                <div class="ml-3 md:ml-4 flex-1">
                                    <p
                                        class="text-[9px] font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest leading-none mb-1">
                                        Chủ tài khoản</p>
                                    <h3 class="text-sm md:text-base font-bold text-gray-800 dark:text-gray-100 uppercase">
                                        Phan Thi Thuy V.</h3>
                                </div>
                                <button class="text-gray-300 hover:text-cs_blue transition-colors px-2"><i
                                        class="fa-regular fa-copy text-xs"></i></button>
                            </div>

                            <!-- Field: STK (Highlight) -->
                            <div
                                class="flex items-center p-4 bg-red-50/5 dark:bg-red-900/5 group hover:bg-red-50/20 dark:hover:bg-red-900/10 transition-colors relative overflow-hidden">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-cs_red opacity-40"></div>
                                <div
                                    class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-red-100/50 dark:bg-red-900/20 flex items-center justify-center text-cs_red shrink-0">
                                    <i class="fa-solid fa-credit-card text-sm md:text-base"></i>
                                </div>
                                <div class="ml-3 md:ml-4 flex-1">
                                    <p
                                        class="text-[9px] font-black text-cs_red/60 uppercase tracking-widest leading-none mb-1">
                                        Số tài khoản / SĐT lừa đảo</p>
                                    <div class="flex items-center gap-2">
                                        <h3
                                            class="text-base md:text-xl font-black text-gray-900 dark:text-white tracking-widest">
                                            105****446</h3>
                                        <span
                                            class="bg-gray-100 dark:bg-slate-800 text-gray-400 text-[8px] font-black px-1 py-0.5 rounded border border-gray-200 dark:border-gray-700 uppercase">Vietcombank</span>
                                    </div>
                                </div>
                                <button
                                    class="bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 text-gray-400 hover:text-cs_blue transition-all w-7 h-7 rounded flex items-center justify-center shadow-sm active:scale-95"><i
                                        class="fa-regular fa-copy text-xs"></i></button>
                            </div>

                            <!-- Field: Scam Amount -->
                            <div
                                class="flex items-center p-4 group hover:bg-gray-50/30 dark:hover:bg-slate-800/30 transition-colors">
                                <div
                                    class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-orange-100 dark:bg-orange-900/20 flex items-center justify-center text-orange-500 shrink-0">
                                    <i class="fa-solid fa-hand-holding-dollar text-sm md:text-base"></i>
                                </div>
                                <div class="ml-3 md:ml-4 flex-1">
                                    <p
                                        class="text-[9px] font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest leading-none mb-1">
                                        Số tiền chiếm đoạt</p>
                                    <h3
                                        class="text-sm md:text-lg font-black text-orange-600 dark:text-orange-400 uppercase">
                                        500.000 VNĐ</h3>
                                </div>

                            </div>



                            <!-- Field: Social Links -->
                            <div
                                class="flex items-center p-4 group hover:bg-gray-50/30 dark:hover:bg-slate-800/30 transition-colors">
                                <div
                                    class="w-9 h-9 md:w-10 md:h-10 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center text-gray-400 shrink-0">
                                    <i class="fa-solid fa-share-nodes text-sm md:text-base"></i>
                                </div>
                                <div class="ml-3 md:ml-4 flex-1">
                                    <p
                                        class="text-[9px] font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest leading-none mb-1">
                                        Mạng xã hội liên quan</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-1">
                                        <a href="#" class="text-blue-600 hover:scale-110 transition-transform"><i
                                                class="fa-brands fa-facebook text-base"></i></a>
                                        <a href="#" class="text-sky-500 hover:scale-110 transition-transform"><i
                                                class="fa-brands fa-telegram text-base"></i></a>
                                        <a href="#" class="text-pink-500 hover:scale-110 transition-transform"><i
                                                class="fa-brands fa-instagram text-base"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reporter Information Section (New) -->
                <div
                    class="bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 rounded-3xl shadow-sm relative group overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                        <i class="fa-solid fa-shield-halved text-6xl"></i>
                    </div>
                    <div
                        class="bg-linear-to-r from-blue-50/30 to-transparent dark:from-blue-900/5 px-6 py-4 border-b border-gray-50 dark:border-gray-800">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-cs_blue/10 text-cs_blue flex items-center justify-center">
                                <i class="fa-solid fa-user-shield text-sm"></i>
                            </div>
                            <div>
                                <h2
                                    class="text-xs md:text-sm font-black uppercase text-gray-800 dark:text-gray-100 tracking-tight leading-none">
                                    Thông tin người tố cáo</h2>
                                <span class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mt-1 block">Bảo
                                    mật thông tin cá nhân</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-gray-50 dark:bg-slate-800/50 flex items-center justify-center text-gray-400 border border-gray-100 dark:border-gray-700/50">
                                    <i class="fa-solid fa-user-tag text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-0.5">
                                        Họ tên</p>
                                    <p class="text-sm font-bold text-gray-700 dark:text-gray-200">Nguyễn Văn ******</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-gray-50 dark:bg-slate-800/50 flex items-center justify-center text-gray-400 border border-gray-100 dark:border-gray-700/50">
                                    <i class="fa-solid fa-phone-volume text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-0.5">
                                        Số điện thoại</p>
                                    <p class="text-sm font-bold text-gray-700 dark:text-gray-200">0987******</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Evidence Section -->
                <div
                    class="bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 rounded-3xl p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-2">
                            <div class="w-0.5 h-4 bg-cs_blue rounded-full"></div>
                            <h2 class="text-xs font-black uppercase text-gray-800 dark:text-gray-100 tracking-tight">Tài
                                liệu & Bằng chứng</h2>
                        </div>
                        <span class="text-[9px] text-gray-400 uppercase font-bold tracking-widest">Tải lên: 2 giờ
                            trước</span>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 relative">
                        <!-- Evidence Item -->
                        <div
                            class="aspect-square rounded-2xl border border-gray-100 dark:border-gray-800 overflow-hidden relative group cursor-zoom-in bg-gray-50">
                            <div
                                class="absolute inset-0 bg-slate-900/20 group-hover:bg-transparent transition-all duration-500">
                            </div>
                            <img src="https://i.ibb.co/Z1kFjpWw/lienquangiaredt.gif"
                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                                alt="Proof">
                        </div>

                        <div
                            class="aspect-square rounded-2xl border border-dotted border-gray-200 dark:border-gray-700 flex flex-col items-center justify-center p-4 text-center bg-gray-50/50 dark:bg-slate-900 group hover:border-cs_red transition-all">
                            <i
                                class="fa-solid fa-file-pdf text-red-500 text-2xl mb-2 opacity-60 group-hover:opacity-100 transition-opacity"></i>
                            <span class="text-[10px] text-gray-500 font-black uppercase tracking-tighter">BẰNG
                                CHỨNG.pdf</span>
                        </div>

                        <!-- Empty slots for design flow -->
                        <div
                            class="aspect-square rounded-2xl border border-gray-50 dark:border-gray-800 bg-gray-50/20 dark:bg-slate-900/50 flex items-center justify-center">
                            <i class="fa-regular fa-image text-gray-200 dark:text-gray-700 text-2xl"></i>
                        </div>
                        <div
                            class="aspect-square rounded-2xl border border-gray-50 dark:border-gray-800 bg-gray-50/20 dark:bg-slate-900/50 flex items-center justify-center">
                            <i class="fa-regular fa-image text-gray-200 dark:text-gray-700 text-2xl"></i>
                        </div>

                        <!-- Subtle SCAMMER Watermark -->
                        <div
                            class="absolute top-1/2 left-1/2 -translate-x-1/4 -translate-y-1/2 -rotate-12 pointer-events-none z-10 w-full flex justify-center opacity-10">
                            <div
                                class="border-2 md:border-4 border-cs_red text-cs_red font-black text-xl md:text-4xl px-4 md:px-6 py-2 md:py-3 rounded-xl md:rounded-2xl uppercase tracking-[6px] md:tracking-[12px]">
                                SCAMMER</div>
                        </div>
                    </div>

                    <div
                        class="mt-6 p-4 bg-blue-50/30 dark:bg-blue-900/5 rounded-2xl border border-blue-50/50 dark:border-blue-900/10">
                        <div class="flex items-start gap-3">
                            <div class="text-cs_blue mt-0.5"><i class="fa-solid fa-quote-left text-sm opacity-40"></i>
                            </div>
                            <p class="text-[11px] md:text-xs text-gray-600 dark:text-gray-300 leading-relaxed font-medium">
                                "Lừa đảo mua gói 4G dung lượng cao, sau khi nhận tiền thì block ngay lập tức. Mọi người cẩn
                                thận số tài khoản này tuyệt đối không giao dịch. Tổng số tiền bị chiếm đoạt: 500.000đ"
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Related Reports Area (Enlarged) -->
                <div
                    class="bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 rounded-3xl p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-2">
                            <div class="w-1 h-5 bg-cs_red rounded-full"></div>
                            <h2 class="text-sm font-black uppercase text-gray-800 dark:text-gray-100 tracking-tight">Cảnh
                                báo liên quan mật thiết</h2>
                        </div>
                        <span
                            class="text-xs text-cs_red font-black uppercase bg-red-100/50 dark:bg-red-900/20 px-3 py-1 rounded-lg">CÙNG
                            HỆ SINH THÁI</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Related Item 1 -->
                        <div
                            class="p-4 md:p-5 bg-gray-50/50 dark:bg-slate-800/50 rounded-2xl border border-gray-100 dark:border-gray-800/50 hover:border-cs_red transition-all group cursor-pointer">
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center justify-between">
                                    <div
                                        class="w-11 h-11 rounded-xl bg-red-50 dark:bg-red-900/20 text-cs_red flex items-center justify-center text-base shadow-sm group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                    </div>
                                    <span
                                        class="text-[10px] font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest">#CS-2026-8841</span>
                                </div>
                                <div>
                                    <h4
                                        class="text-xs md:text-sm font-black text-gray-800 dark:text-gray-200 uppercase mb-1.5 group-hover:text-cs_red transition-colors">
                                        Lừa đảo mua bán Fanpage</h4>
                                    <p class="text-[11px] md:text-xs text-gray-500 leading-relaxed line-clamp-2 italic">
                                        "Sử dụng cùng
                                        số tài khoản này để nhận cọc bán Page 50k sub sau đó đổi pass..."</p>
                                </div>
                                <div
                                    class="flex items-center justify-between pt-3 border-t border-gray-100 dark:border-gray-700/50 mt-1">
                                    <span
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">01/02/2026</span>
                                    <span class="text-xs font-black text-cs_red">2.000.000đ</span>
                                </div>
                            </div>
                        </div>

                        <!-- Related Item 2 -->
                        <div
                            class="p-4 md:p-5 bg-gray-50/50 dark:bg-slate-800/50 rounded-2xl border border-gray-100 dark:border-gray-800/50 hover:border-cs_red transition-all group cursor-pointer">
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center justify-between">
                                    <div
                                        class="w-11 h-11 rounded-xl bg-red-50 dark:bg-red-900/20 text-cs_red flex items-center justify-center text-base shadow-sm group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                    </div>
                                    <span
                                        class="text-[10px] font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest">#CS-2026-7722</span>
                                </div>
                                <div>
                                    <h4
                                        class="text-xs md:text-sm font-black text-gray-800 dark:text-gray-200 uppercase mb-1.5 group-hover:text-cs_red transition-colors">
                                        Scam tiền cọc thuê tool</h4>
                                    <p class="text-[11px] md:text-xs text-gray-500 leading-relaxed line-clamp-2 italic">
                                        "Đối tượng
                                        dùng Telegram ảo để mời chào thuê tool cheat MMO..."</p>
                                </div>
                                <div
                                    class="flex items-center justify-between pt-3 border-t border-gray-100 dark:border-gray-700/50 mt-1">
                                    <span
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">15/01/2026</span>
                                    <span class="text-xs font-black text-cs_red">800.000đ</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button
                        class="w-full mt-8 py-3.5 border border-dashed border-gray-200 dark:border-gray-700 rounded-2xl text-xs font-black text-gray-400 uppercase tracking-widest hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors">
                        Xem tất cả vụ liên quan (5)
                    </button>
                </div>

                <!-- Comments System (New Section) -->
                <div
                    class="bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 rounded-3xl p-6 shadow-sm">
                    <div class="flex items-center gap-2 mb-10">
                        <div class="w-1 h-5 bg-cs_blue rounded-full"></div>
                        <h2 class="text-sm font-black uppercase text-gray-800 dark:text-gray-100 tracking-tight">Cộng đồng
                            bình luận (12)</h2>
                    </div>

                    <!-- Comment Input -->
                    <div class="mb-10">
                        <div class="flex gap-3 md:gap-4">
                            <div
                                class="w-9 h-9 md:w-11 md:h-11 rounded-full bg-gray-100 dark:bg-slate-800 flex items-center justify-center shrink-0 border border-gray-100 dark:border-gray-700">
                                <i class="fa-solid fa-user text-sm md:text-base text-gray-400"></i>
                            </div>
                            <div class="flex-1">
                                <textarea rows="2"
                                    class="w-full bg-gray-50/50 dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-2xl p-3 md:p-4 text-sm text-gray-600 dark:text-gray-300 focus:ring-1 focus:ring-cs_blue focus:border-cs_blue outline-none transition-all resize-none"
                                    placeholder="Chia sẻ thêm thông tin..."></textarea>
                                <div class="mt-3 flex justify-end">
                                    <button
                                        class="bg-cs_blue text-white text-[10px] md:text-xs font-black uppercase px-6 md:px-8 py-2 md:py-2.5 rounded-xl hover:bg-blue-600 transition-all active:scale-95 shadow-lg shadow-blue-500/10">
                                        Gửi bình luận
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment List -->
                    <div class="space-y-8">
                        <!-- Single Comment -->
                        <div class="flex gap-3 md:gap-4 group">
                            <div
                                class="w-8 h-8 md:w-11 md:h-11 rounded-full bg-gradient-to-tr from-cs_blue to-blue-400 flex items-center justify-center text-white text-[10px] md:text-sm font-black shrink-0 shadow-sm">
                                AN
                            </div>
                            <div class="flex-1">
                                <div
                                    class="bg-gray-50/50 dark:bg-slate-900/50 border border-gray-50 dark:border-gray-800/50 p-4 rounded-2xl rounded-tl-none">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="text-xs font-black text-gray-800 dark:text-gray-100 uppercase tracking-tight">Người
                                                dùng ẩn danh</span>

                                        </div>
                                        <span class="text-[9px] text-gray-400 font-bold uppercase tracking-tighter">1 giờ
                                            trước</span>
                                    </div>
                                    <p
                                        class="text-[13px] md:text-sm text-gray-600 dark:text-gray-400 leading-relaxed font-medium">
                                        Chuẩn rồi, thằng này chuyên môn dùng chiêu bài giả mạo admin group Telegram để lùa
                                        gà. Tôi cũng vừa bị nó hụt 200k tiền cọc. May mà search được web này kịp.
                                    </p>
                                </div>

                            </div>
                        </div>

                        <!-- Single Comment -->
                        <div class="flex gap-3 md:gap-4 group">
                            <div
                                class="w-8 h-8 md:w-11 md:h-11 rounded-full bg-slate-200 dark:bg-slate-800 flex items-center justify-center text-gray-500 dark:text-gray-400 text-[10px] md:text-sm font-black shrink-0">
                                TV
                            </div>
                            <div class="flex-1">
                                <div
                                    class="bg-gray-50/50 dark:bg-slate-900/50 border border-gray-50 dark:border-gray-800/50 p-4 rounded-2xl rounded-tl-none">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="text-xs font-black text-gray-800 dark:text-gray-100 uppercase tracking-tight">Trung
                                                Van 9x</span>
                                        </div>
                                        <span class="text-[9px] text-gray-400 font-bold uppercase tracking-tighter">3 giờ
                                            trước</span>
                                    </div>
                                    <p
                                        class="text-[13px] md:text-sm text-gray-600 dark:text-gray-400 leading-relaxed font-medium">
                                        Anh em report mạnh tay vào để nó bay màu luôn nhé. Cảm ơn admin đã cập nhật thông
                                        tin kịp thời.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Stats & Sidebar (4/12) -->
            <div class="w-full lg:w-4/12 space-y-6">

                <!-- Quick Stats Box -->
                <div
                    class="bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 rounded-3xl p-6 shadow-sm">
                    <div class="space-y-6">
                        <!-- Community Trust Summary Section -->
                        <div class="space-y-4">
                            <!-- Verification Status -->
                            <div
                                class="bg-red-50 dark:bg-red-900/10 border-2 border-cs_red/20 p-4 rounded-2xl text-center relative overflow-hidden group">
                                <div class="absolute top-0 right-0 w-16 h-16 bg-cs_red/5 rounded-full -mr-8 -mt-8"></div>
                                <span
                                    class="block text-[10px] font-black text-cs_red/60 uppercase tracking-[2px] mb-1">Trạng
                                    thái xác minh</span>
                                <h3 class="text-xl font-black text-cs_red uppercase tracking-tighter">CẢNH BÁO LỪA ĐẢO</h3>
                                <div class="mt-2 flex items-center justify-center gap-1">
                                    <div class="w-1.5 h-1.5 rounded-full bg-cs_red animate-pulse"></div>
                                    <span class="text-[9px] font-bold text-cs_red/80 uppercase">Dữ liệu đã được kiểm
                                        duyệt</span>
                                </div>
                            </div>

                            <!-- Key Evidence Points -->
                            <div class="grid grid-cols-1 gap-2.5">
                                <div
                                    class="flex items-center justify-between p-3.5 bg-gray-50 dark:bg-slate-800/40 rounded-xl border border-gray-100 dark:border-gray-800 transition-all hover:border-cs_blue/30 group">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-cs_blue/10 flex items-center justify-center text-cs_blue transition-transform group-hover:scale-110">
                                            <i class="fa-solid fa-file-shield text-xs"></i>
                                        </div>
                                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400">Tài liệu bằng
                                            chứng</span>
                                    </div>
                                    <span class="text-xs font-black text-gray-800 dark:text-white">03 Bản</span>
                                </div>

                                <div
                                    class="flex items-center justify-between p-3.5 bg-gray-50 dark:bg-slate-800/40 rounded-xl border border-gray-100 dark:border-gray-800 transition-all hover:border-cs_red/30 group">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-cs_red/10 flex items-center justify-center text-cs_red transition-transform group-hover:scale-110">
                                            <i class="fa-solid fa-user-check text-xs"></i>
                                        </div>
                                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400">Số lần bị tố
                                            cao</span>
                                    </div>
                                    <span class="text-xs font-black text-gray-800 dark:text-white">02 Lần</span>
                                </div>

                                <div
                                    class="flex items-center justify-between p-3.5 bg-gray-50 dark:bg-slate-800/40 rounded-xl border border-gray-100 dark:border-gray-800 transition-all hover:border-gray-300 group">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-gray-100 dark:bg-slate-700 flex items-center justify-center text-gray-400 transition-transform group-hover:scale-110">
                                            <i class="fa-solid fa-chart-line text-xs"></i>
                                        </div>
                                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400">Độ phổ biến tra
                                            cứu</span>
                                    </div>
                                    <span class="text-xs font-black text-gray-800 dark:text-white">Rất cao</span>
                                </div>
                            </div>

                            <div
                                class="p-3 bg-blue-50/20 dark:bg-blue-900/5 rounded-xl border border-blue-50 dark:border-blue-900/10">
                                <p class="text-[10px] text-gray-400 font-medium leading-relaxed">
                                    <i class="fa-solid fa-circle-info text-cs_blue mr-1 opacity-60"></i>
                                    Hệ thống tự động xếp hạng dựa trên sự trùng khớp dữ liệu từ các báo cáo độc lập.
                                </p>
                            </div>
                        </div>

                        <div class="h-px bg-gray-50 dark:bg-gray-800"></div>

                        <div class="grid grid-cols-2 gap-4">
                            <div
                                class="bg-gray-50 dark:bg-slate-800/10 p-4 rounded-2xl border border-gray-100 dark:border-gray-800/50 text-center group hover:border-cs_blue transition-colors">
                                <span class="text-xs font-bold text-gray-400 block mb-1 uppercase tracking-tighter">Tra
                                    cứu</span>
                                <span
                                    class="text-lg font-black text-gray-800 dark:text-gray-100 group-hover:text-cs_blue transition-colors">162+</span>
                            </div>
                            <div
                                class="bg-gray-50 dark:bg-slate-800/10 p-4 rounded-2xl border border-gray-100 dark:border-gray-800/50 text-center text-cs_red group hover:border-cs_red transition-colors">
                                <span class="text-xs font-bold opacity-60 block mb-1 uppercase tracking-tighter">Báo
                                    cáo</span>
                                <span
                                    class="text-lg font-black group-hover:scale-110 transition-transform inline-block font-mono">03</span>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Action Buttons -->
                <div class="grid grid-cols-1 gap-3">
                    <button
                        class="w-full bg-cs_blue hover:bg-blue-600 text-white font-black py-4 rounded-2xl flex items-center justify-center gap-3 transition-all hover:shadow-xl active:scale-95 text-xs uppercase tracking-widest leading-none h-14">
                        <i class="fa-regular fa-paper-plane text-base"></i> GỬI THÊM BẰNG CHỨNG
                    </button>
                    <div class="flex gap-2.5">
                        <button
                            class="flex-1 bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 text-gray-500 font-black py-3 rounded-2xl flex items-center justify-center gap-2 text-xs hover:bg-gray-50 dark:hover:bg-slate-700 transition-all uppercase tracking-tighter">
                            <i class="fa-solid fa-share-nodes text-sm"></i> Share
                        </button>
                        <button
                            class="flex-1 bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 text-cs_red font-black py-3 rounded-2xl flex items-center justify-center gap-2 text-xs hover:bg-red-50 dark:hover:bg-red-900/20 transition-all uppercase tracking-widest">
                            <i class="fa-solid fa-flag text-sm"></i> Gỡ phốt
                        </button>
                    </div>
                </div>



            </div>
        </div>

        <!-- NEW SECTION: Discover More Related Scams (Bottom Grid) -->
        <div class="mt-10 pt-16 border-t border-gray-100 dark:border-gray-800/60">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-6">
                <div class="px-2">
                    <span class="text-xs font-black text-cs_red uppercase tracking-[5px] mb-3 block animate-pulse">Hot
                        Blacklist</span>
                    <h2 class="text-2xl md:text-3xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">
                        Các
                        vụ lừa đảo mới nhất</h2>
                    <p class="text-sm text-gray-400 mt-2 font-medium">Hệ thống cập nhật danh sách đen tự động mỗi khi có
                        báo cáo xác thực.</p>
                </div>

            </div>

            <!-- List Row Layout (Inspired by Home) -->
            <section>

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
    </main>
@endsection

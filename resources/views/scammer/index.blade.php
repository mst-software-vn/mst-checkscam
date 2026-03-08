@extends("layouts.app")

@section("content")
    <!-- Hero Section -->
    <section class="dark:bg-dark_bg md:pd-24 pb-12">
        <x-breadcrumb :links="[['name' => 'Lừa đảo Nguyễn Văn Sáng']]" />

        <x-hero />
    </section>
    <main class="relative z-30 mx-auto -mt-4 w-full max-w-6xl grow px-4 pb-16 sm:px-6 md:mt-0">
        <div class="flex flex-col gap-6 lg:flex-row">
            <!-- Left Column: Main Info (8/12) -->
            <div class="w-full space-y-6 lg:w-8/12">
                <!-- Main Scam Detail Card -->
                <div
                    class="dark:bg-dark_card overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm dark:border-gray-800"
                >
                    <!-- Subtle Gradient Header -->
                    <div
                        class="flex items-center justify-between border-b border-gray-50 bg-linear-to-r from-red-50/30 to-transparent px-6 py-4 dark:border-gray-800 dark:from-red-900/5"
                    >
                        <div class="flex items-center gap-3">
                            <div class="bg-cs_red/10 text-cs_red flex h-9 w-9 items-center justify-center rounded-xl">
                                <i class="fa-solid fa-user-slash text-sm"></i>
                            </div>
                            <div>
                                <h2
                                    class="text-xs leading-none font-black tracking-tight text-gray-800 uppercase md:text-sm dark:text-gray-100"
                                >
                                    Chi tiết đối tượng lừa đảo
                                </h2>
                                <span class="mt-1 block text-[9px] font-bold tracking-widest text-gray-400 uppercase">
                                    Mã vụ việc: #CS-2026-9912
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span
                                class="bg-cs_red rounded px-2 py-0.5 text-[9px] font-black tracking-tighter text-white uppercase"
                            >
                                Bị tố cáo
                            </span>
                        </div>
                    </div>

                    <div class="p-0">
                        <div class="divide-y divide-gray-50 dark:divide-gray-800/50">
                            <!-- Field: Chủ TK -->
                            <div
                                class="group flex items-center p-4 transition-colors hover:bg-gray-50/30 dark:hover:bg-slate-800/30"
                            >
                                <div
                                    class="group-hover:text-cs_blue flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors md:h-10 md:w-10 dark:bg-slate-800"
                                >
                                    <i class="fa-solid fa-id-card text-sm md:text-base"></i>
                                </div>
                                <div class="ml-3 flex-1 md:ml-4">
                                    <p
                                        class="mb-1 text-[9px] leading-none font-black tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                    >
                                        Chủ tài khoản
                                    </p>
                                    <h3
                                        class="text-sm font-bold text-gray-800 uppercase md:text-base dark:text-gray-100"
                                    >
                                        Phan Thi Thuy V.
                                    </h3>
                                </div>
                                <button class="hover:text-cs_blue px-2 text-gray-300 transition-colors">
                                    <i class="fa-regular fa-copy text-xs"></i>
                                </button>
                            </div>

                            <!-- Field: STK (Highlight) -->
                            <div
                                class="group relative flex items-center overflow-hidden bg-red-50/5 p-4 transition-colors hover:bg-red-50/20 dark:bg-red-900/5 dark:hover:bg-red-900/10"
                            >
                                <div class="bg-cs_red absolute top-0 bottom-0 left-0 w-1 opacity-40"></div>
                                <div
                                    class="text-cs_red flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-100/50 md:h-10 md:w-10 dark:bg-red-900/20"
                                >
                                    <i class="fa-solid fa-credit-card text-sm md:text-base"></i>
                                </div>
                                <div class="ml-3 flex-1 md:ml-4">
                                    <p
                                        class="text-cs_red/60 mb-1 text-[9px] leading-none font-black tracking-widest uppercase"
                                    >
                                        Số tài khoản / SĐT lừa đảo
                                    </p>
                                    <div class="flex items-center gap-2">
                                        <h3
                                            class="text-base font-black tracking-widest text-gray-900 md:text-xl dark:text-gray-300"
                                        >
                                            105****446
                                        </h3>
                                        <span
                                            class="rounded border border-gray-200 bg-gray-100 px-1 py-0.5 text-[8px] font-black text-gray-400 uppercase dark:border-gray-700 dark:bg-slate-800"
                                        >
                                            Vietcombank
                                        </span>
                                    </div>
                                </div>
                                <button
                                    class="hover:text-cs_blue flex h-7 w-7 items-center justify-center rounded border border-gray-100 bg-white text-gray-400 shadow-sm transition-all active:scale-95 dark:border-gray-700 dark:bg-slate-800"
                                >
                                    <i class="fa-regular fa-copy text-xs"></i>
                                </button>
                            </div>

                            <!-- Field: Scam Amount -->
                            <div
                                class="group flex items-center p-4 transition-colors hover:bg-gray-50/30 dark:hover:bg-slate-800/30"
                            >
                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-orange-100 text-orange-500 md:h-10 md:w-10 dark:bg-orange-900/20"
                                >
                                    <i class="fa-solid fa-hand-holding-dollar text-sm md:text-base"></i>
                                </div>
                                <div class="ml-3 flex-1 md:ml-4">
                                    <p
                                        class="mb-1 text-[9px] leading-none font-black tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                    >
                                        Số tiền chiếm đoạt
                                    </p>
                                    <h3
                                        class="text-sm font-black text-orange-600 uppercase md:text-lg dark:text-orange-400"
                                    >
                                        500.000 VNĐ
                                    </h3>
                                </div>
                            </div>

                            <!-- Field: Social Links -->
                            <div
                                class="group flex items-center p-4 transition-colors hover:bg-gray-50/30 dark:hover:bg-slate-800/30"
                            >
                                <div
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-gray-100 text-gray-400 md:h-10 md:w-10 dark:bg-slate-800"
                                >
                                    <i class="fa-solid fa-share-nodes text-sm md:text-base"></i>
                                </div>
                                <div class="ml-3 flex-1 md:ml-4">
                                    <p
                                        class="mb-1 text-[9px] leading-none font-black tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                    >
                                        Mạng xã hội liên quan
                                    </p>
                                    <div class="mt-1 flex flex-wrap items-center gap-3">
                                        <a href="#" class="text-blue-600 transition-transform hover:scale-110">
                                            <i class="fa-brands fa-facebook text-base"></i>
                                        </a>
                                        <a href="#" class="text-sky-500 transition-transform hover:scale-110">
                                            <i class="fa-brands fa-telegram text-base"></i>
                                        </a>
                                        <a href="#" class="text-pink-500 transition-transform hover:scale-110">
                                            <i class="fa-brands fa-instagram text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reporter Information Section (New) -->
                <div
                    class="dark:bg-dark_card group relative overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm dark:border-gray-800"
                >
                    <div class="absolute top-0 right-0 p-4 opacity-5 transition-opacity group-hover:opacity-10">
                        <i class="fa-solid fa-shield-halved text-6xl"></i>
                    </div>
                    <div
                        class="border-b border-gray-50 bg-linear-to-r from-blue-50/30 to-transparent px-6 py-4 dark:border-gray-800 dark:from-blue-900/5"
                    >
                        <div class="flex items-center gap-3">
                            <div class="bg-cs_blue/10 text-cs_blue flex h-9 w-9 items-center justify-center rounded-xl">
                                <i class="fa-solid fa-user-shield text-sm"></i>
                            </div>
                            <div>
                                <h2
                                    class="text-xs leading-none font-black tracking-tight text-gray-800 uppercase md:text-sm dark:text-gray-100"
                                >
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
                                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-100 bg-gray-50 text-gray-400 dark:border-gray-700/50 dark:bg-slate-800/50"
                                >
                                    <i class="fa-solid fa-user-tag text-sm"></i>
                                </div>
                                <div>
                                    <p class="mb-0.5 text-[10px] font-black tracking-widest text-gray-400 uppercase">
                                        Họ tên
                                    </p>
                                    <p class="text-sm font-bold text-gray-700 dark:text-gray-200">Nguyễn Văn ******</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-100 bg-gray-50 text-gray-400 dark:border-gray-700/50 dark:bg-slate-800/50"
                                >
                                    <i class="fa-solid fa-phone-volume text-sm"></i>
                                </div>
                                <div>
                                    <p class="mb-0.5 text-[10px] font-black tracking-widest text-gray-400 uppercase">
                                        Số điện thoại
                                    </p>
                                    <p class="text-sm font-bold text-gray-700 dark:text-gray-200">0987******</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Evidence Section -->
                <div
                    class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800"
                >
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="bg-cs_blue h-4 w-0.5 rounded-full"></div>
                            <h2 class="text-xs font-black tracking-tight text-gray-800 uppercase dark:text-gray-100">
                                Tài liệu & Bằng chứng
                            </h2>
                        </div>
                        <span class="text-[9px] font-bold tracking-widest text-gray-400 uppercase">
                            Tải lên: 2 giờ trước
                        </span>
                    </div>

                    <div class="relative grid grid-cols-2 gap-3 sm:grid-cols-4">
                        <!-- Evidence Item -->
                        <div
                            class="group relative aspect-square cursor-zoom-in overflow-hidden rounded-2xl border border-gray-100 bg-gray-50 dark:border-gray-800"
                        >
                            <div
                                class="absolute inset-0 bg-slate-900/20 transition-all duration-500 group-hover:bg-transparent"
                            ></div>
                            <img
                                src="https://i.ibb.co/Z1kFjpWw/lienquangiaredt.gif"
                                class="h-full w-full object-cover grayscale transition-all duration-500 group-hover:grayscale-0"
                                alt="Proof"
                            />
                        </div>

                        <div
                            class="group hover:border-cs_red flex aspect-square flex-col items-center justify-center rounded-2xl border border-dotted border-gray-200 bg-gray-50/50 p-4 text-center transition-all dark:border-gray-700 dark:bg-slate-900"
                        >
                            <i
                                class="fa-solid fa-file-pdf mb-2 text-2xl text-red-500 opacity-60 transition-opacity group-hover:opacity-100"
                            ></i>
                            <span class="text-[10px] font-black tracking-tighter text-gray-500 uppercase">
                                BẰNG CHỨNG.pdf
                            </span>
                        </div>

                        <!-- Empty slots for design flow -->
                        <div
                            class="flex aspect-square items-center justify-center rounded-2xl border border-gray-50 bg-gray-50/20 dark:border-gray-800 dark:bg-slate-900/50"
                        >
                            <i class="fa-regular fa-image text-2xl text-gray-200 dark:text-gray-700"></i>
                        </div>
                        <div
                            class="flex aspect-square items-center justify-center rounded-2xl border border-gray-50 bg-gray-50/20 dark:border-gray-800 dark:bg-slate-900/50"
                        >
                            <i class="fa-regular fa-image text-2xl text-gray-200 dark:text-gray-700"></i>
                        </div>

                        <!-- Subtle SCAMMER Watermark -->
                        <div
                            class="pointer-events-none absolute top-1/2 left-1/2 z-10 flex w-full -translate-x-1/4 -translate-y-1/2 -rotate-12 justify-center opacity-10"
                        >
                            <div
                                class="border-cs_red text-cs_red rounded-xl border-2 px-4 py-2 text-xl font-black tracking-[6px] uppercase md:rounded-2xl md:border-4 md:px-6 md:py-3 md:text-4xl md:tracking-[12px]"
                            >
                                SCAMMER
                            </div>
                        </div>
                    </div>

                    <div
                        class="mt-6 rounded-2xl border border-blue-50/50 bg-blue-50/30 p-4 dark:border-blue-900/10 dark:bg-blue-900/5"
                    >
                        <div class="flex items-start gap-3">
                            <div class="text-cs_blue mt-0.5">
                                <i class="fa-solid fa-quote-left text-sm opacity-40"></i>
                            </div>
                            <p
                                class="text-[11px] leading-relaxed font-medium text-gray-600 md:text-xs dark:text-gray-300"
                            >
                                "Lừa đảo mua gói 4G dung lượng cao, sau khi nhận tiền thì block ngay lập tức. Mọi người
                                cẩn thận số tài khoản này tuyệt đối không giao dịch. Tổng số tiền bị chiếm đoạt:
                                500.000đ"
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Related Reports Area (Enlarged) -->
                <div
                    class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800"
                >
                    <div class="mb-8 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="bg-cs_red h-5 w-1 rounded-full"></div>
                            <h2 class="text-sm font-black tracking-tight text-gray-800 uppercase dark:text-gray-100">
                                Cảnh báo liên quan mật thiết
                            </h2>
                        </div>
                        <span
                            class="text-cs_red rounded-lg bg-red-100/50 px-3 py-1 text-xs font-black uppercase dark:bg-red-900/20"
                        >
                            CÙNG HỆ SINH THÁI
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- Related Item 1 -->
                        <div
                            class="hover:border-cs_red group cursor-pointer rounded-2xl border border-gray-100 bg-gray-50/50 p-4 transition-all md:p-5 dark:border-gray-800/50 dark:bg-slate-800/50"
                        >
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center justify-between">
                                    <div
                                        class="text-cs_red flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-base shadow-sm transition-transform group-hover:scale-110 dark:bg-red-900/20"
                                    >
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                    </div>
                                    <span
                                        class="text-[10px] font-black tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                    >
                                        #CS-2026-8841
                                    </span>
                                </div>
                                <div>
                                    <h4
                                        class="group-hover:text-cs_red mb-1.5 text-xs font-black text-gray-800 uppercase transition-colors md:text-sm dark:text-gray-200"
                                    >
                                        Lừa đảo mua bán Fanpage
                                    </h4>
                                    <p class="line-clamp-2 text-[11px] leading-relaxed text-gray-500 italic md:text-xs">
                                        "Sử dụng cùng số tài khoản này để nhận cọc bán Page 50k sub sau đó đổi pass..."
                                    </p>
                                </div>
                                <div
                                    class="mt-1 flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-700/50"
                                >
                                    <span class="text-[10px] font-bold tracking-tighter text-gray-400 uppercase">
                                        01/02/2026
                                    </span>
                                    <span class="text-cs_red text-xs font-black">2.000.000đ</span>
                                </div>
                            </div>
                        </div>

                        <!-- Related Item 2 -->
                        <div
                            class="hover:border-cs_red group cursor-pointer rounded-2xl border border-gray-100 bg-gray-50/50 p-4 transition-all md:p-5 dark:border-gray-800/50 dark:bg-slate-800/50"
                        >
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center justify-between">
                                    <div
                                        class="text-cs_red flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-base shadow-sm transition-transform group-hover:scale-110 dark:bg-red-900/20"
                                    >
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                    </div>
                                    <span
                                        class="text-[10px] font-black tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                    >
                                        #CS-2026-7722
                                    </span>
                                </div>
                                <div>
                                    <h4
                                        class="group-hover:text-cs_red mb-1.5 text-xs font-black text-gray-800 uppercase transition-colors md:text-sm dark:text-gray-200"
                                    >
                                        Scam tiền cọc thuê tool
                                    </h4>
                                    <p class="line-clamp-2 text-[11px] leading-relaxed text-gray-500 italic md:text-xs">
                                        "Đối tượng dùng Telegram ảo để mời chào thuê tool cheat MMO..."
                                    </p>
                                </div>
                                <div
                                    class="mt-1 flex items-center justify-between border-t border-gray-100 pt-3 dark:border-gray-700/50"
                                >
                                    <span class="text-[10px] font-bold tracking-tighter text-gray-400 uppercase">
                                        15/01/2026
                                    </span>
                                    <span class="text-cs_red text-xs font-black">800.000đ</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button
                        class="mt-8 w-full rounded-2xl border border-dashed border-gray-200 py-3.5 text-xs font-black tracking-widest text-gray-400 uppercase transition-colors hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-slate-800"
                    >
                        Xem tất cả vụ liên quan (5)
                    </button>
                </div>

                <!-- Comments System (New Section) -->
                <div
                    class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800"
                >
                    <div class="mb-10 flex items-center gap-2">
                        <div class="bg-cs_blue h-5 w-1 rounded-full"></div>
                        <h2 class="text-sm font-black tracking-tight text-gray-800 uppercase dark:text-gray-100">
                            Cộng đồng bình luận (12)
                        </h2>
                    </div>

                    <!-- Comment Input -->
                    <div class="mb-10">
                        <div class="flex gap-3 md:gap-4">
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-gray-100 bg-gray-100 md:h-11 md:w-11 dark:border-gray-700 dark:bg-slate-800"
                            >
                                <i class="fa-solid fa-user text-sm text-gray-400 md:text-base"></i>
                            </div>
                            <div class="flex-1">
                                <textarea
                                    rows="2"
                                    class="focus:ring-cs_blue focus:border-cs_blue w-full resize-none rounded-2xl border border-gray-100 bg-gray-50/50 p-3 text-sm text-gray-600 transition-all outline-none focus:ring-1 md:p-4 dark:border-gray-800 dark:bg-slate-900 dark:text-gray-300"
                                    placeholder="Chia sẻ thêm thông tin..."
                                ></textarea>
                                <div class="mt-3 flex justify-end">
                                    <button
                                        class="bg-cs_blue cursor-pointer rounded-xl px-6 py-2 text-[10px] font-black text-white uppercase shadow-lg shadow-blue-500/10 transition-all hover:bg-blue-600 active:scale-95 md:px-8 md:py-2.5 md:text-xs"
                                    >
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
                                class="from-cs_blue flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gradient-to-tr to-blue-400 text-[10px] font-black text-white shadow-sm md:h-11 md:w-11 md:text-sm"
                            >
                                AN
                            </div>
                            <div class="flex-1">
                                <div
                                    class="rounded-2xl rounded-tl-none border border-gray-50 bg-gray-50/50 p-4 dark:border-gray-800/50 dark:bg-slate-900/50"
                                >
                                    <div class="mb-3 flex flex-col justify-between gap-2 sm:flex-row sm:items-center">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="text-xs font-black tracking-tight text-gray-800 uppercase dark:text-gray-100"
                                            >
                                                Người dùng ẩn danh
                                            </span>
                                        </div>
                                        <span class="text-[9px] font-bold tracking-tighter text-gray-400 uppercase">
                                            1 giờ trước
                                        </span>
                                    </div>
                                    <p
                                        class="text-[13px] leading-relaxed font-medium text-gray-600 md:text-sm dark:text-gray-400"
                                    >
                                        Chuẩn rồi, thằng này chuyên môn dùng chiêu bài giả mạo admin group Telegram để
                                        lùa gà. Tôi cũng vừa bị nó hụt 200k tiền cọc. May mà search được web này kịp.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Comment -->
                        <div class="group flex gap-3 md:gap-4">
                            <div
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-200 text-[10px] font-black text-gray-500 md:h-11 md:w-11 md:text-sm dark:bg-slate-800 dark:text-gray-400"
                            >
                                TV
                            </div>
                            <div class="flex-1">
                                <div
                                    class="rounded-2xl rounded-tl-none border border-gray-50 bg-gray-50/50 p-4 dark:border-gray-800/50 dark:bg-slate-900/50"
                                >
                                    <div class="mb-3 flex flex-col justify-between gap-2 sm:flex-row sm:items-center">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="text-xs font-black tracking-tight text-gray-800 uppercase dark:text-gray-100"
                                            >
                                                Trung Van 9x
                                            </span>
                                        </div>
                                        <span class="text-[9px] font-bold tracking-tighter text-gray-400 uppercase">
                                            3 giờ trước
                                        </span>
                                    </div>
                                    <p
                                        class="text-[13px] leading-relaxed font-medium text-gray-600 md:text-sm dark:text-gray-400"
                                    >
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
                    class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800"
                >
                    <div class="space-y-6">
                        <!-- Community Trust Summary Section -->
                        <div class="space-y-4">
                            <!-- Verification Status -->
                            <div
                                class="border-cs_red/20 group relative overflow-hidden rounded-2xl border-2 bg-red-50 p-4 text-center dark:bg-red-900/10"
                            >
                                <div
                                    class="bg-cs_red/5 absolute top-0 right-0 -mt-8 -mr-8 h-16 w-16 rounded-full"
                                ></div>
                                <span class="text-cs_red/60 mb-1 block text-[10px] font-black tracking-[2px] uppercase">
                                    Trạng thái xác minh
                                </span>
                                <h3 class="text-cs_red text-xl font-black tracking-tighter uppercase">
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
                                    class="hover:border-cs_blue/30 group flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50 p-3.5 transition-all dark:border-gray-800 dark:bg-slate-800/40"
                                >
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="bg-cs_blue/10 text-cs_blue flex h-8 w-8 items-center justify-center rounded-lg transition-transform group-hover:scale-110"
                                        >
                                            <i class="fa-solid fa-file-shield text-xs"></i>
                                        </div>
                                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400">
                                            Tài liệu bằng chứng
                                        </span>
                                    </div>
                                    <span class="text-xs font-black text-gray-800 dark:text-gray-300">03 Bản</span>
                                </div>

                                <div
                                    class="hover:border-cs_red/30 group flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50 p-3.5 transition-all dark:border-gray-800 dark:bg-slate-800/40"
                                >
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="bg-cs_red/10 text-cs_red flex h-8 w-8 items-center justify-center rounded-lg transition-transform group-hover:scale-110"
                                        >
                                            <i class="fa-solid fa-user-check text-xs"></i>
                                        </div>
                                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400">
                                            Số lần bị tố cao
                                        </span>
                                    </div>
                                    <span class="text-xs font-black text-gray-800 dark:text-gray-300">02 Lần</span>
                                </div>

                                <div
                                    class="group flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50 p-3.5 transition-all hover:border-gray-300 dark:border-gray-800 dark:bg-slate-800/40"
                                >
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-gray-100 text-gray-400 transition-transform group-hover:scale-110 dark:bg-slate-700"
                                        >
                                            <i class="fa-solid fa-chart-line text-xs"></i>
                                        </div>
                                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400">
                                            Độ phổ biến tra cứu
                                        </span>
                                    </div>
                                    <span class="text-xs font-black text-gray-800 dark:text-gray-300">Rất cao</span>
                                </div>
                            </div>

                            <div
                                class="rounded-xl border border-blue-50 bg-blue-50/20 p-3 dark:border-blue-900/10 dark:bg-blue-900/5"
                            >
                                <p class="text-[10px] leading-relaxed font-medium text-gray-400">
                                    <i class="fa-solid fa-circle-info text-cs_blue mr-1 opacity-60"></i>
                                    Hệ thống tự động xếp hạng dựa trên sự trùng khớp dữ liệu từ các báo cáo độc lập.
                                </p>
                            </div>
                        </div>

                        <div class="h-px bg-gray-50 dark:bg-gray-800"></div>

                        <div class="grid grid-cols-2 gap-4">
                            <div
                                class="group hover:border-cs_blue rounded-2xl border border-gray-100 bg-gray-50 p-4 text-center transition-colors dark:border-gray-800/50 dark:bg-slate-800/10"
                            >
                                <span class="mb-1 block text-xs font-bold tracking-tighter text-gray-400 uppercase">
                                    Tra cứu
                                </span>
                                <span
                                    class="group-hover:text-cs_blue text-lg font-black text-gray-800 transition-colors dark:text-gray-100"
                                >
                                    162+
                                </span>
                            </div>
                            <div
                                class="text-cs_red group hover:border-cs_red rounded-2xl border border-gray-100 bg-gray-50 p-4 text-center transition-colors dark:border-gray-800/50 dark:bg-slate-800/10"
                            >
                                <span class="mb-1 block text-xs font-bold tracking-tighter uppercase opacity-60">
                                    Báo cáo
                                </span>
                                <span
                                    class="inline-block font-mono text-lg font-black transition-transform group-hover:scale-110"
                                >
                                    03
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-1 gap-3">
                    <button
                        class="bg-cs_blue flex h-14 w-full items-center justify-center gap-3 rounded-2xl py-4 text-xs leading-none font-black tracking-widest text-white uppercase transition-all hover:bg-blue-600 hover:shadow-xl active:scale-95"
                    >
                        <i class="fa-regular fa-paper-plane text-base"></i>
                        GỬI THÊM BẰNG CHỨNG
                    </button>
                    <div class="flex gap-2.5">
                        <button
                            class="flex flex-1 items-center justify-center gap-2 rounded-2xl border border-gray-100 bg-white py-3 text-xs font-black tracking-tighter text-gray-500 uppercase transition-all hover:bg-gray-50 dark:border-gray-700 dark:bg-slate-800 dark:hover:bg-slate-700"
                        >
                            <i class="fa-solid fa-share-nodes text-sm"></i>
                            Share
                        </button>
                        <button
                            class="text-cs_red flex flex-1 items-center justify-center gap-2 rounded-2xl border border-gray-100 bg-white py-3 text-xs font-black tracking-widest uppercase transition-all hover:bg-red-50 dark:border-gray-700 dark:bg-slate-800 dark:hover:bg-red-900/20"
                        >
                            <i class="fa-solid fa-flag text-sm"></i>
                            Gỡ phốt
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- NEW SECTION: Discover More Related Scams (Bottom Grid) -->
        <div class="mt-10 border-t border-gray-100 pt-16 dark:border-gray-800/60">
            <div class="mb-6 flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div class="px-2">
                    <span class="text-cs_red mb-3 block animate-pulse text-xs font-black tracking-[5px] uppercase">
                        Hot Blacklist
                    </span>
                    <h2
                        class="text-2xl font-black tracking-tighter text-gray-900 uppercase md:text-3xl dark:text-gray-300"
                    >
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
                    class="dark:bg-dark_card overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xs dark:border-gray-800"
                >
                    <?php for ($i = 1; $i <= 3; $i++) { ?>

                    <div
                        class="<?php echo $i < 3 ? "border-b border-gray-100 dark:border-gray-800" : ""; ?> flex flex-col items-center gap-3 p-4 transition-colors hover:bg-gray-50 sm:flex-row sm:gap-0 dark:hover:bg-slate-800/50"
                    >
                        <div class="flex w-full items-center gap-3 sm:w-5/12">
                            <div
                                class="text-cs_red flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-50 text-xs dark:bg-red-900/20"
                            >
                                <i class="fa-solid fa-triangle-exclamation"></i>
                            </div>
                            <div>
                                <h3 class="text-xs font-bold text-gray-900 md:text-sm dark:text-gray-100">
                                    Nguyễn Văn A -

                                    <?php echo $i; ?>
                                </h3>
                                <div class="text-[9px] text-gray-400 md:text-[10px] dark:text-gray-500">
                                    <i class="fa-regular fa-clock mr-1"></i>
                                    Vừa xong
                                </div>
                            </div>
                        </div>
                        <div class="w-full border-gray-100 sm:w-5/12 sm:border-l sm:px-6 dark:border-gray-800">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold text-gray-400 uppercase dark:text-gray-500">
                                    Tài khoản
                                </span>
                                <span class="text-cs_red text-xs font-black">0987654321***</span>
                            </div>
                        </div>
                        <div class="w-full text-right sm:w-2/12">
                            <a
                                href="#"
                                class="text-cs_blue hover:bg-cs_blue inline-block rounded bg-blue-50 px-3 py-1 text-[10px] font-black uppercase transition-all hover:text-white dark:bg-blue-900/20"
                            >
                                Chi tiết
                            </a>
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </section>
        </div>
    </main>
@endsection

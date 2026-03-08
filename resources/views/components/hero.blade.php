<!-- Hero Section -->
<section class="dark:bg-dark_bg relative overflow-hidden bg-white py-12 md:py-20 md:pb-2">
    <!-- Trang trí nền nhẹ -->
    {{--
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none opacity-50">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-50 dark:bg-blue-900/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-red-50 dark:bg-red-900/10 rounded-full blur-3xl">
        </div>
        </div>
    --}}

    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">
            <h1
                class="hero-title scanner-title mb-6 text-3xl leading-[1.4] font-black uppercase md:text-4xl lg:text-5xl"
            >
                KIỂM TRA & TỐ CÁO SCAM.
            </h1>
            <p
                class="mx-auto mb-10 max-w-2xl text-sm leading-relaxed font-medium text-gray-600 md:text-lg dark:text-gray-400"
            >
                Hệ thống dữ liệu lớn nhất Việt Nam giúp bạn kiểm tra độ tín nhiệm của đối tác thông qua SĐT, Số TK hoặc
                Link mạng xã hội.
            </p>

            <!-- Search Box Centered -->
            <div class="mx-auto mb-6 max-w-3xl">
                <div
                    class="focus-within:border-cs_blue relative rounded-2xl border-2 border-gray-200 bg-white p-1 shadow-xl shadow-blue-900/5 transition-all focus-within:ring-4 focus-within:ring-blue-100 md:p-2 dark:border-gray-800 dark:bg-slate-900 dark:focus-within:ring-blue-900/30"
                >
                    <div class="flex flex-col items-center gap-2 sm:flex-row">
                        <div class="flex w-full min-w-0 flex-1 items-center">
                            <div class="pointer-events-none flex items-center pl-4">
                                <i class="fa-solid fa-magnifying-glass text-lg text-gray-400"></i>
                            </div>
                            <input
                                type="text"
                                class="w-full border-none bg-transparent py-3 pr-4 pl-3 text-sm font-bold text-gray-800 placeholder-gray-400 outline-none focus:ring-0 md:text-base dark:text-gray-300 dark:placeholder-gray-600"
                                placeholder="Nhập Số tài khoản, SĐT hoặc Link..."
                            />
                        </div>
                        <button
                            class="bg-cs_blue w-full cursor-pointer rounded-xl px-8 py-3 text-xs font-black tracking-widest whitespace-nowrap text-white uppercase shadow-lg transition-all hover:bg-blue-600 active:scale-95 sm:w-auto md:text-sm"
                        >
                            Tra cứu
                        </button>
                    </div>
                </div>

                <!-- Stats -->
                <div
                    class="mt-6 flex flex-wrap justify-center gap-3 text-[11px] font-bold text-gray-500 md:gap-8 md:text-sm dark:text-gray-400"
                >
                    <span class="flex items-center">
                        <i class="fa-solid fa-circle text-cs_red mr-2 animate-pulse text-[6px]"></i>
                        62.472 STK Lừa đảo
                    </span>
                    <span class="flex items-center">
                        <i class="fa-solid fa-circle text-cs_blue mr-2 text-[6px]"></i>
                        8.605 Bình luận mới
                    </span>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-2 gap-3 md:mt-12 md:grid-cols-4 md:gap-4">
                <a
                    href="/to-cao-lua-dao/"
                    class="dark:bg-dark_card group flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 shadow-xs transition-all hover:bg-red-50 md:gap-4 md:p-4 dark:border-gray-800 dark:hover:bg-red-900/10"
                >
                    <div
                        class="text-cs_red flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 transition-transform group-hover:rotate-12 md:h-12 md:w-12 md:text-xl dark:bg-red-900/30"
                    >
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-[8px] font-black text-gray-400 uppercase md:text-[9px] dark:text-gray-500">
                            Report
                        </p>
                        <p
                            class="group-hover:text-cs_red text-[10px] font-black text-gray-800 uppercase transition-colors md:text-xs dark:text-gray-200"
                        >
                            Tố Cáo Scam
                        </p>
                    </div>
                </a>

                <a
                    href="/bao-hiem-cs/"
                    class="dark:bg-dark_card group flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 shadow-xs transition-all hover:bg-blue-50 md:gap-4 md:p-4 dark:border-gray-800 dark:hover:bg-blue-900/10"
                >
                    <div
                        class="text-cs_blue flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 transition-transform group-hover:rotate-12 md:h-12 md:w-12 md:text-xl dark:bg-blue-900/30"
                    >
                        <i class="fa-solid fa-shield-cat"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-[8px] font-black text-gray-400 uppercase md:text-[9px] dark:text-gray-500">
                            Insurance
                        </p>
                        <p
                            class="group-hover:text-cs_blue text-[10px] font-black text-gray-800 uppercase transition-colors md:text-xs dark:text-gray-200"
                        >
                            Bảo Hiểm CS
                        </p>
                    </div>
                </a>

                <a
                    href="#"
                    class="dark:bg-dark_card group flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 shadow-xs transition-all hover:bg-green-50 md:gap-4 md:p-4 dark:border-gray-800 dark:hover:bg-green-900/10"
                >
                    <div
                        class="text-cs_green flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-green-100 transition-transform group-hover:rotate-12 md:h-12 md:w-12 md:text-xl dark:bg-green-900/30"
                    >
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-[8px] font-black text-gray-400 uppercase md:text-[9px] dark:text-gray-500">
                            Trading
                        </p>
                        <p
                            class="group-hover:text-cs_green text-[10px] font-black text-gray-800 uppercase transition-colors md:text-xs dark:text-gray-200"
                        >
                            Chợ Buôn Bán
                        </p>
                    </div>
                </a>

                <a
                    href="#"
                    class="dark:bg-dark_card group flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 shadow-xs transition-all hover:bg-gray-50 md:gap-4 md:p-4 dark:border-gray-800 dark:hover:bg-slate-800"
                >
                    <div
                        class="text-cs_blue flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 transition-transform group-hover:rotate-12 md:h-12 md:w-12 md:text-xl dark:bg-slate-800"
                    >
                        <i class="fa-brands fa-telegram"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-[8px] font-black text-gray-400 uppercase md:text-[9px] dark:text-gray-500">
                            Automation
                        </p>
                        <p
                            class="group-hover:text-cs_blue text-[10px] font-black text-gray-800 uppercase transition-colors md:text-xs dark:text-gray-200"
                        >
                            Bot Check
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

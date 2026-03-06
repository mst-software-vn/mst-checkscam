@extends('layouts.app')

@section('title', '[ Tố Cáo kẻ lừa đảo ] Cập nhật thêm data vào hệ thống')

@section('content')
    <main class="min-h-screen  dark:bg-dark_bg py-6 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- SEO: Breadcrumbs -->
            <nav class="flex mb-6 md:mb-10 text-[9px] sm:text-xs md:text-sm font-semibold uppercase tracking-widest text-gray-400"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 overflow-x-auto whitespace-nowrap pb-1">
                    <li class="inline-flex items-center">
                        <a href="/" class="hover:text-cs_red transition-colors">Trang chủ</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right mx-1.5 md:mx-2 text-[7px] md:text-[8px]"></i>
                            <span class="text-gray-900 dark:text-gray-200">Gửi tố cáo</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">

                <!-- Left Column: Guidance & Stats (SEO Content) -->
                <aside class="lg:col-span-4 space-y-4 md:space-y-6 order-2 lg:order-1 md:mt-15">
                    <div
                        class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-800 rounded-md p-5 md:p-6 shadow-xs">
                        <h2
                            class="text-[13px] md:text-md font-semibold text-gray-800 dark:text-gray-100 uppercase tracking-widest mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-cs_red rounded-full"></span> Tại sao nên báo cáo?
                        </h2>
                        <ul class="space-y-4">
                            <li class="flex gap-3">
                                <i class="fa-solid fa-check-double text-cs_blue text-xs md:text-sm mt-1"></i>
                                <p
                                    class="text-[12px] md:text-sm font-semibold text-gray-500 dark:text-gray-400 leading-relaxed">
                                    Giúp cộng đồng
                                    nhận diện kẻ lừa đảo ngay lập tức qua công cụ tra cứu.</p>
                            </li>
                            <li class="flex gap-3">
                                <i class="fa-solid fa-check-double text-cs_blue text-xs md:text-sm mt-1"></i>
                                <p
                                    class="text-[12px] md:text-sm font-semibold text-gray-500 dark:text-gray-400 leading-relaxed">
                                    Tạo áp lực lên
                                    các tài khoản ngân hàng "đen", hạn chế khả năng nhận tiền lừa đảo.</p>
                            </li>
                            <li class="flex gap-3">
                                <i class="fa-solid fa-check-double text-cs_blue text-xs md:text-sm mt-1"></i>
                                <p
                                    class="text-[12px] md:text-sm font-semibold text-gray-500 dark:text-gray-400 leading-relaxed">
                                    Xây dựng tệp
                                    dữ liệu sạch để phối hợp với các đơn vị bảo mật/pháp luật.</p>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="bg-blue-50/50 dark:bg-blue-900/10 border border-blue-100 dark:border-blue-900/30 rounded-md p-5 md:p-6">
                        <h3
                            class="text-[13px] md:text-sm font-semibold text-cs_blue uppercase tracking-widest mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved"></i> Quy trình xét duyệt
                        </h3>
                        <div class="space-y-5 relative">
                            <div class="absolute left-1.5 top-2 bottom-2 w-[1px] bg-blue-200 dark:bg-blue-800/50"></div>
                            <div class="relative pl-6">
                                <div
                                    class="absolute left-0 top-1.5 w-3 h-3 bg-white dark:bg-slate-900 border-2 border-cs_blue rounded-full">
                                </div>
                                <p class="text-[12px] md:text-sm font-semibold text-gray-700 dark:text-gray-300">Gửi thông
                                    tin:
                                    <span class="font-normal">Bạn điền
                                        form bên cạnh và đính kèm bằng chứng.</span>
                                </p>
                            </div>
                            <div class="relative pl-6">
                                <div
                                    class="absolute left-0 top-1.5 w-3 h-3 bg-white dark:bg-slate-900 border-2 border-blue-300 rounded-full">
                                </div>
                                <p class="text-[12px] md:text-sm font-semibold text-gray-500 dark:text-gray-400 italic">Xác
                                    minh: <span class="font-normal not-italic">Đội ngũ
                                        Admin kiểm tra tính xác thực (30p - 12h).</span></p>
                            </div>
                            <div class="relative pl-6">
                                <div
                                    class="absolute left-0 top-1.5 w-3 h-3 bg-white dark:bg-slate-900 border-2 border-blue-100 rounded-full">
                                </div>
                                <p class="text-[12px] md:text-sm font-semibold text-gray-400 dark:text-gray-500">Công khai:
                                    <span class="font-normal">Bài viết hiển
                                        thị trên hệ thống CheckScam.</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Section: Common Keywords/Types -->
                    <div class="p-2 border-t border-gray-100 dark:border-gray-800">
                        <p class="text-[11px] md:text-md font-semibold text-gray-400 uppercase tracking-tighter mb-3">Các
                            hình
                            thức phổ
                            biến:</p>
                        <div class="flex flex-wrap gap-1.5 md:gap-2">
                            <span
                                class="text-[10px] md:text-xs px-2.5 py-1 bg-gray-100 dark:bg-gray-800 rounded-sm text-gray-500 border border-gray-200/50 dark:border-gray-700/50">Giả
                                mạo
                                Telegram</span>
                            <span
                                class="text-[10px] md:text-xs px-2.5 py-1 bg-gray-100 dark:bg-gray-800 rounded-sm text-gray-500 border border-gray-200/50 dark:border-gray-700/50">Lừa
                                đảo
                                CTV</span>
                            <span
                                class="text-[10px] md:text-xs px-2.5 py-1 bg-gray-100 dark:bg-gray-800 rounded-sm text-gray-500 border border-gray-200/50 dark:border-gray-700/50">Scam
                                Trading</span>
                            <span
                                class="text-[10px] md:text-xs px-2.5 py-1 bg-gray-100 dark:bg-gray-800 rounded-sm text-gray-500 border border-gray-200/50 dark:border-gray-700/50">Fake
                                Bank
                                App</span>
                        </div>
                    </div>
                </aside>

                <!-- Right Column: The Main Form -->
                <section class="lg:col-span-8 order-1 lg:order-2">
                    <!-- Tab Switcher: Integrated Style -->
                    <div class="flex gap-1 mb-2 overflow-x-auto no-scrollbar whitespace-nowrap">
                        <button onclick="switchTab('bank')" id="tab-bank"
                            class="px-5 md:px-8 py-3.5 text-[11px] md:text-sm font-semibold uppercase tracking-wider rounded-t-md border-b transition-all tab-active-red dark:bg-slate-900flex-1 md:flex-none text-center">
                            Số tài khoản
                        </button>
                        <button onclick="switchTab('website')" id="tab-website"
                            class="px-5 md:px-8 py-3.5 text-[11px] md:text-sm font-semibold uppercase tracking-wider rounded-t-md text-gray-400 dark:text-gray-600 hover:text-gray-600 dark:hover:text-gray-300 transition-all border-b border-transparent flex-1 md:flex-none text-center">
                            Trang web lừa đảo
                        </button>
                    </div>

                    <div
                        class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-800 rounded-md p-5 sm:p-8 md:p-10 shadow-xs relative overflow-hidden">

                        <!-- Form Bank Search Style -->
                        <h4 class="text-cs_red font-semibold text-center uppercase">Khai báo</h4>
                        <form id="form-bank" action="#" method="POST" enctype="multipart/form-data"
                            class="space-y-6 md:space-y-8">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] md:text-[11px] font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-widest ml-1">Chủ
                                        tài khoản <span class="text-cs_red">*</span></label>
                                    <input type="text" name="bank_owner" required placeholder="NGUYEN VAN A"
                                        class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_red focus:ring-0 text-sm font-semibold text-gray-900 dark:text-white uppercase outline-none">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] md:text-[11px] font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-widest ml-1">Số
                                        tài khoản / SĐT <span class="text-cs_red">*</span></label>
                                    <input type="text" name="bank_number" required placeholder="Nhập dãy số..."
                                        class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_red focus:ring-0 text-sm font-semibold text-gray-900 dark:text-white outline-none">
                                </div>
                                <div class="space-y-2 md:col-span-2">
                                    <label
                                        class="text-[10px] md:text-[11px] font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-widest ml-1">Ngân
                                        hàng / Ví điện tử <span class="text-cs_red">*</span></label>
                                    <input type="text" name="bank_name" required
                                        placeholder="Vietcombank, MB, Momo, Zalopay..."
                                        class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_red focus:ring-0 text-sm font-semibold text-gray-900 dark:text-white outline-none">
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label
                                    class="text-[10px] md:text-[11px] font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-widest ml-1">Ảnh
                                    bằng chứng <span class="text-cs_red">*</span></label>
                                <label for="bank_evidence"
                                    class="flex flex-col items-center justify-center py-10 md:py-14 border-2 border-dashed border-gray-200 dark:border-gray-800 rounded-md bg-gray-50/50 dark:bg-slate-800/50 hover:bg-white dark:hover:bg-slate-800 transition-all cursor-pointer group">
                                    <i
                                        class="fa-solid fa-camera-retro text-2xl md:text-3xl text-gray-300 group-hover:text-cs_red mb-3 transition-colors"></i>
                                    <span
                                        class="text-[9px] md:text-[11px] font-semibold text-gray-400 uppercase tracking-widest group-hover:text-cs_red transition-colors">Tải
                                        bill &
                                        đoạn chat (JPG, PNG)</span>
                                    <input id="bank_evidence" type="file" multiple class="hidden">
                                </label>
                            </div>

                            <div class="space-y-2">
                                <label
                                    class="text-[10px] md:text-[11px] font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-widest ml-1">Chi
                                    tiết sự việc <span class="text-cs_red">*</span></label>
                                <textarea rows="5" placeholder="Họ đã lừa đảo bạn bằng cách nào? số tiền bao nhiêu?..."
                                    class="w-full px-4 py-4 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_red focus:ring-0 text-sm font-medium text-gray-700 dark:text-gray-300 transition-all outline-none resize-none leading-relaxed"></textarea>
                            </div>


                            <h4 class="text-cs_blue font-semibold text-center uppercase">Người xác thực</h4>
                            <!-- Integrated Identity Verification -->
                            <div
                                class="p-5 md:p-6 rounded-md border border-gray-100 dark:border-gray-800 flex flex-col sm:flex-row gap-5 md:gap-6">
                                <div class="flex-1 space-y-2">
                                    <label
                                        class="text-[10px] font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Tên
                                        thật <span class="text-cs_red">*</span></label>
                                    <input type="text" placeholder="Họ và tên..."
                                        class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-800 rounded-md text-sm font-semibold outline-none focus:border-cs_blue shadow-sm">
                                </div>
                                <div class="flex-1 space-y-2">
                                    <label
                                        class="text-[10px] font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Số
                                        Zalo / Liên hệ <span class="text-cs_red">*</span></label>
                                    <input type="text" placeholder="SĐT Zalo..."
                                        class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-800 rounded-md text-sm font-semibold outline-none focus:border-cs_blue shadow-sm">
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <input id="confirm_bank" type="checkbox" required
                                    class="w-5 h-5 md:w-4 md:h-4 rounded border-gray-300 text-cs_red focus:ring-0 cursor-pointer">
                                <label for="confirm_bank"
                                    class="text-[10px] md:text-[11px] font-semibold text-gray-500 dark:text-gray-400 uppercase leading-relaxed cursor-pointer select-none">Tôi
                                    cam kết nội dung trên là sự thật.</label>
                            </div>

                            <div class="flex justify-center pt-2">
                                <button type="submit"
                                    class="w-full sm:w-auto px-12 py-4 bg-cs_red hover:bg-black text-white rounded-md font-semibold text-sm uppercase tracking-widest transition-all shadow-lg active:scale-95">
                                    Gửi Duyệt Bài Viết
                                </button>
                            </div>
                        </form>

                        <!-- Form Website: New Structure -->
                        <form id="form-website" action="#" method="POST" enctype="multipart/form-data"
                            class="hidden space-y-6 md:space-y-8">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">
                                <div class="space-y-2 md:col-span-2">
                                    <label
                                        class="text-[10px] md:text-[11px] font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-widest ml-1">Địa
                                        chỉ (URL) Website <span class="text-cs_red">*</span></label>
                                    <input type="url" name="web_url" required placeholder="https://domain-lua-dao.vn"
                                        class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm font-semibold text-gray-900 dark:text-white outline-none">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] md:text-[11px] font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-widest ml-1">Phân
                                        loại <span class="text-cs_red">*</span></label>
                                    <select name="category" required
                                        class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm font-semibold text-gray-900 dark:text-white outline-none cursor-pointer">
                                        <option value="">Chọn loại hình</option>
                                        <option value="fake">Giả mạo ngân hàng/app</option>
                                        <option value="bet">Cá cược, lô đề</option>
                                        <option value="invest">Đầu tư đa cấp ảo</option>
                                        <option value="phish">Đánh cắp tài khoản</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] md:text-[11px] font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-widest ml-1">Nơi
                                        phát hiện</label>
                                    <input type="text" placeholder="FB Ads, Telegram, SMS..."
                                        class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm font-semibold text-gray-900 dark:text-white outline-none">
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label
                                    class="text-[10px] md:text-[11px] font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-widest ml-1">Ảnh
                                    chụp website <span class="text-cs_red">*</span></label>
                                <label for="web_evidence"
                                    class="flex flex-col items-center justify-center py-10 md:py-12 border-2 border-dashed border-gray-100 dark:border-gray-800 rounded-md hover:bg-gray-50 dark:hover:bg-slate-800 transition-all cursor-pointer group">
                                    <i
                                        class="fa-solid fa-desktop text-2xl text-gray-300 group-hover:text-cs_blue mb-2 transition-colors"></i>
                                    <span
                                        class="text-[10px] md:text-[11px] font-semibold text-gray-400 uppercase tracking-widest group-hover:text-cs_blue transition-colors">Tải
                                        ảnh
                                        chụp màn hình</span>
                                    <input id="web_evidence" type="file" multiple class="hidden">
                                </label>
                            </div>

                            <!-- Extra Checks for SEO/Clarity -->
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-gray-100 dark:border-gray-800 pt-6">
                                <label
                                    class="flex items-center gap-3 cursor-pointer p-4 bg-gray-50/50 dark:bg-slate-800/30 rounded-md border border-transparent hover:border-cs_red/10 group transition-all">
                                    <input type="checkbox"
                                        class="w-5 h-5 rounded border border-gray-300 text-cs_red focus:ring-0 cursor-pointer">
                                    <span
                                        class="text-[10px] font-semibold text-gray-600 dark:text-gray-400 uppercase group-hover:text-gray-900 group-hover:dark:text-white transition-colors">Website
                                        vẫn đang hoạt động</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 cursor-pointer p-4 bg-gray-50/50 dark:bg-slate-800/30 rounded-md border border-transparent hover:border-cs_red/10 group transition-all">
                                    <input type="checkbox"
                                        class="w-5 h-5 rounded border border-gray-300 text-cs_red focus:ring-0 cursor-pointer">
                                    <span
                                        class="text-[10px] font-semibold text-gray-600 dark:text-gray-400 uppercase group-hover:text-gray-900 group-hover:dark:text-white transition-colors">Có
                                        dấu
                                        hiệu chiếm đoạt OTP</span>
                                </label>
                            </div>

                            <div class="flex justify-center pt-2">
                                <button type="submit"
                                    class="w-full sm:w-auto px-12 py-4 bg-cs_red hover:bg-black text-white rounded-md font-semibold text-sm uppercase tracking-widest transition-all shadow-lg active:scale-95">
                                    Báo cáo Website
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>

            <!-- SEO: Informational Footer Section -->
            <article class="mt-16 md:mt-24 max-w-4xl mx-auto space-y-10 md:space-y-14">
                <div class="text-center">
                    <h2
                        class="text-md md:text-lg font-semibold text-gray-800 dark:text-gray-100 uppercase tracking-[0.2em] mb-4">
                        Các câu
                        hỏi liên quan</h2>
                    <div class="w-12 h-1 bg-cs_red mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                    <section
                        class="space-y-4 p-6 bg-white dark:bg-slate-900/50 rounded-md border border-gray-100 dark:border-gray-800/50">
                        <h3 class="text-sm font-semibold text-cs_red uppercase tracking-wider flex items-center gap-3">
                            <i class="fa-solid fa-circle-question text-xs"></i> Thông tin có được bảo mật?
                        </h3>
                        <p class="text-[13px] text-gray-500 dark:text-gray-400 leading-relaxed font-semibold italic">
                            Dữ liệu người tố cáo chỉ được dùng để xác minh nội bộ và hoàn toàn không công khai để bảo vệ
                            danh tính cá nhân.
                        </p>
                    </section>
                    <section
                        class="space-y-4 p-6 bg-white dark:bg-slate-900/50 rounded-md border border-gray-100 dark:border-gray-800/50">
                        <h3 class="text-sm font-semibold text-cs_blue uppercase tracking-wider flex items-center gap-3">
                            <i class="fa-solid fa-hand-holding-heart text-xs"></i> CheckScam có thu phí không?
                        </h3>
                        <p class="text-[13px] text-gray-500 dark:text-gray-400 leading-relaxed font-semibold italic">
                            CheckScam là dự án cộng đồng phi lợi nhuận. Mọi hoạt động tố cáo và tra cứu đều miễn phí 100%.
                        </p>
                    </section>
                </div>
            </article>

        </div>
    </main>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .tab-active-red {
            border-bottom-color: #ff0000 !important;
            color: #ff0000 !important;
        }

        .dark .tab-active-red {
            border-bottom-color: #ff3333 !important;
            color: #ff3333 !important;
        }

        /* Standardize Focus Effects - Unified Red Theme */
        input:not([type="checkbox"]):not([type="radio"]):focus,
        select:focus,
        textarea:focus {
            background-color: #fff !important;
            border-color: #ff0000 !important;
            box-shadow: 0 0 0 2px rgba(255, 0, 0, 0.05) !important;
            outline: none !important;
        }

        .dark input:not([type="checkbox"]):not([type="radio"]):focus,
        .dark select:focus,
        .dark textarea:focus {
            background-color: #0f172a !important;
            border-color: #ff3333 !important;
            box-shadow: 0 0 0 2px rgba(255, 51, 51, 0.1) !important;
        }

        /* Checkbox fix: Ensure they remain visible and interactive */
        input[type="checkbox"] {
            transition: all 0.2s ease;
        }

        input[type="checkbox"]:focus {
            box-shadow: none !important;
            border-color: #d1d5db !important;
        }
    </style>


@endsection
@push('scripts')
    <script>
        function switchTab(type) {
            const formBank = document.getElementById('form-bank');
            const formWebsite = document.getElementById('form-website');
            const tabBank = document.getElementById('tab-bank');
            const tabWebsite = document.getElementById('tab-website');

            const inactiveClasses = ['text-gray-400', 'dark:text-gray-600', 'hover:text-gray-600',
                'dark:hover:text-gray-300', 'border-transparent'
            ];
            const activeBaseClasses = ['bg-white', 'dark:bg-slate-900', 'border-gray-200', 'dark:border-gray-800',
                'border-b-white', 'dark:border-b-slate-900'
            ];

            if (type === 'bank') {
                formBank.classList.remove('hidden');
                formWebsite.classList.add('hidden');

                tabBank.classList.add(...activeBaseClasses, 'tab-active-red');
                tabBank.classList.remove(...inactiveClasses);

                tabWebsite.classList.remove(...activeBaseClasses, 'tab-active-red');
                tabWebsite.classList.add(...inactiveClasses);
            } else {
                formBank.classList.add('hidden');
                formWebsite.classList.remove('hidden');

                tabWebsite.classList.add(...activeBaseClasses, 'tab-active-red');
                tabWebsite.classList.remove(...inactiveClasses);

                tabBank.classList.remove(...activeBaseClasses, 'tab-active-red');
                tabBank.classList.add(...inactiveClasses);
            }
        }
    </script>
@endpush

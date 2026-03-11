@extends("layouts.app")

@section("title", "[ Tố Cáo kẻ lừa đảo ] Cập nhật thêm data vào hệ thống")

@section("content")
    <main class="pb-24">
        <x-breadcrumb :links="[['name' => 'Tố cáo lừa đảo', 'url' => '/to-cao-lua-dao']]" />
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-12">
                <!-- Left Column: Guidance & Stats (SEO Content) -->
                <aside class="order-2 space-y-4 md:mt-15 md:space-y-6 lg:order-1 lg:col-span-4">
                    <div
                        class="rounded-md border border-gray-200 bg-white p-5 shadow-xs md:p-6 dark:border-gray-800 dark:bg-slate-900"
                    >
                        <h2
                            class="md:text-md mb-4 flex items-center gap-2 text-[13px] font-semibold tracking-widest text-gray-800 uppercase dark:text-gray-100"
                        >
                            <span class="bg-cs_red h-4 w-1 rounded-full"></span>
                            Tại sao nên báo cáo?
                        </h2>
                        <ul class="space-y-4">
                            <li class="flex gap-3">
                                <i class="fa-solid fa-check-double text-cs_blue mt-1 text-xs md:text-sm"></i>
                                <p
                                    class="text-[12px] leading-relaxed font-semibold text-gray-500 md:text-sm dark:text-gray-400"
                                >
                                    Giúp cộng đồng nhận diện kẻ lừa đảo ngay lập tức qua công cụ tra cứu.
                                </p>
                            </li>
                            <li class="flex gap-3">
                                <i class="fa-solid fa-check-double text-cs_blue mt-1 text-xs md:text-sm"></i>
                                <p
                                    class="text-[12px] leading-relaxed font-semibold text-gray-500 md:text-sm dark:text-gray-400"
                                >
                                    Tạo áp lực lên các tài khoản ngân hàng "đen", hạn chế khả năng nhận tiền lừa đảo.
                                </p>
                            </li>
                            <li class="flex gap-3">
                                <i class="fa-solid fa-check-double text-cs_blue mt-1 text-xs md:text-sm"></i>
                                <p
                                    class="text-[12px] leading-relaxed font-semibold text-gray-500 md:text-sm dark:text-gray-400"
                                >
                                    Xây dựng tệp dữ liệu sạch để phối hợp với các đơn vị bảo mật/pháp luật.
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div
                        class="rounded-md border border-blue-100 bg-blue-50/50 p-5 md:p-6 dark:border-blue-900/30 dark:bg-blue-900/10"
                    >
                        <h3
                            class="text-cs_blue mb-4 flex items-center gap-2 text-[13px] font-semibold tracking-widest uppercase md:text-sm"
                        >
                            <i class="fa-solid fa-shield-halved"></i>
                            Quy trình xét duyệt
                        </h3>
                        <div class="relative space-y-5">
                            <div class="absolute top-2 bottom-2 left-1.5 w-[1px] bg-blue-200 dark:bg-blue-800/50"></div>
                            <div class="relative pl-6">
                                <div
                                    class="border-cs_blue absolute top-1.5 left-0 h-3 w-3 rounded-full border-2 bg-white dark:bg-slate-900"
                                ></div>
                                <p class="text-[12px] font-semibold text-gray-700 md:text-sm dark:text-gray-300">
                                    Gửi thông tin:
                                    <span class="font-normal">Bạn điền form bên cạnh và đính kèm bằng chứng.</span>
                                </p>
                            </div>
                            <div class="relative pl-6">
                                <div
                                    class="absolute top-1.5 left-0 h-3 w-3 rounded-full border-2 border-blue-300 bg-white dark:bg-slate-900"
                                ></div>
                                <p class="text-[12px] font-semibold text-gray-500 italic md:text-sm dark:text-gray-400">
                                    Xác minh:
                                    <span class="font-normal not-italic">
                                        Đội ngũ Admin kiểm tra tính xác thực (30p - 12h).
                                    </span>
                                </p>
                            </div>
                            <div class="relative pl-6">
                                <div
                                    class="absolute top-1.5 left-0 h-3 w-3 rounded-full border-2 border-blue-100 bg-white dark:bg-slate-900"
                                ></div>
                                <p class="text-[12px] font-semibold text-gray-400 md:text-sm dark:text-gray-500">
                                    Công khai:
                                    <span class="font-normal">Bài viết hiển thị trên hệ thống CheckScam.</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Section: Common Keywords/Types -->
                    <div class="border-t border-gray-100 p-2 dark:border-gray-800">
                        <p class="md:text-md mb-3 text-[11px] font-semibold tracking-tighter text-gray-400 uppercase">
                            Các hình thức phổ biến:
                        </p>
                        <div class="flex flex-wrap gap-1.5 md:gap-2">
                            <span
                                class="rounded-sm border border-gray-200/50 bg-gray-100 px-2.5 py-1 text-[10px] text-gray-500 md:text-xs dark:border-gray-700/50 dark:bg-gray-800"
                            >
                                Giả mạo Telegram
                            </span>
                            <span
                                class="rounded-sm border border-gray-200/50 bg-gray-100 px-2.5 py-1 text-[10px] text-gray-500 md:text-xs dark:border-gray-700/50 dark:bg-gray-800"
                            >
                                Lừa đảo CTV
                            </span>
                            <span
                                class="rounded-sm border border-gray-200/50 bg-gray-100 px-2.5 py-1 text-[10px] text-gray-500 md:text-xs dark:border-gray-700/50 dark:bg-gray-800"
                            >
                                Scam Trading
                            </span>
                            <span
                                class="rounded-sm border border-gray-200/50 bg-gray-100 px-2.5 py-1 text-[10px] text-gray-500 md:text-xs dark:border-gray-700/50 dark:bg-gray-800"
                            >
                                Fake Bank App
                            </span>
                        </div>
                    </div>
                </aside>

                <!-- Right Column: The Main Form -->
                <section class="order-1 lg:order-2 lg:col-span-8">
                    <!-- Tab Switcher: Integrated Style -->
                    <div class="no-scrollbar flex gap-1 overflow-x-auto whitespace-nowrap">
                        <button
                            id="tab-bank"
                            class="tab-active-red dark:bg-slate-900flex-1 cursor-pointer rounded-t-md border-b px-5 py-3.5 text-center text-[11px] font-semibold tracking-wider uppercase transition-all md:flex-none md:px-8 md:text-sm"
                        >
                            Số tài khoản
                        </button>
                        <button
                            id="tab-website"
                            class="flex-1 cursor-pointer rounded-t-md border-b border-transparent px-5 py-3.5 text-center text-[11px] font-semibold tracking-wider text-gray-400 uppercase transition-all hover:text-gray-600 md:flex-none md:px-8 md:text-sm dark:text-gray-600 dark:hover:text-gray-300"
                        >
                            Trang web lừa đảo
                        </button>
                    </div>

                    <div
                        class="relative overflow-hidden rounded-md border border-gray-200 bg-white p-5 shadow-xs sm:p-8 md:p-10 dark:border-gray-800 dark:bg-slate-900"
                    >
                        <!-- Form Bank Search Style -->
                        <h4 class="text-cs_red mb-8 text-center font-semibold uppercase">Khai báo</h4>
                        <form
                            id="form-bank"
                            action="#"
                            method="POST"
                            enctype="multipart/form-data"
                            class="space-y-6 md:space-y-8"
                        >
                            @csrf
                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 md:gap-6">
                                <div class="space-y-2">
                                    <label
                                        class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                    >
                                        Chủ tài khoản
                                        <span class="text-cs_red">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="bank_owner"
                                        required
                                        placeholder="NGUYEN VAN A"
                                        class="focus:border-cs_red w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 uppercase outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300"
                                    />
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                    >
                                        Số tài khoản / SĐT
                                        <span class="text-cs_red">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="bank_number"
                                        required
                                        placeholder="Nhập dãy số..."
                                        class="focus:border-cs_red w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300"
                                    />
                                </div>
                                <div class="space-y-2 md:col-span-2">
                                    <label
                                        class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                    >
                                        Ngân hàng / Ví điện tử
                                        <span class="text-cs_red">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="bank_name"
                                        required
                                        placeholder="Vietcombank, MB, Momo, Zalopay..."
                                        class="focus:border-cs_red w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300"
                                    />
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                >
                                    Ảnh bằng chứng
                                    <span class="text-cs_red">*</span>
                                </label>
                                <label
                                    for="bank_evidence"
                                    class="group flex cursor-pointer flex-col items-center justify-center rounded-md border-2 border-dashed border-gray-200 bg-gray-50/50 py-10 transition-all hover:bg-white md:py-14 dark:border-gray-800 dark:bg-slate-800/50 dark:hover:bg-slate-800"
                                >
                                    <i
                                        class="fa-solid fa-camera-retro group-hover:text-cs_red mb-3 text-2xl text-gray-300 transition-colors md:text-3xl"
                                    ></i>
                                    <span
                                        class="group-hover:text-cs_red text-[9px] font-semibold tracking-widest text-gray-400 uppercase transition-colors md:text-[11px]"
                                    >
                                        Tải bill & đoạn chat (JPG, PNG)
                                    </span>
                                    <input id="bank_evidence" type="file" multiple class="hidden" />
                                </label>
                            </div>

                            <div class="space-y-2">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                >
                                    Chi tiết sự việc
                                    <span class="text-cs_red">*</span>
                                </label>
                                <textarea
                                    rows="5"
                                    placeholder="Họ đã lừa đảo bạn bằng cách nào? số tiền bao nhiêu?..."
                                    class="focus:border-cs_red w-full resize-none rounded-md border border-gray-200 bg-gray-50 px-4 py-4 text-sm leading-relaxed font-medium text-gray-700 transition-all outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300"
                                ></textarea>
                            </div>

                            <h4 class="text-cs_blue text-center font-semibold uppercase">Người xác thực</h4>
                            <!-- Integrated Identity Verification -->
                            <div
                                class="flex flex-col gap-5 rounded-md border border-gray-100 p-5 sm:flex-row md:gap-6 md:p-6 dark:border-gray-800"
                            >
                                <div class="flex-1 space-y-2">
                                    <label
                                        class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                    >
                                        Tên thật
                                        <span class="text-cs_red">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Họ và tên..."
                                        class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm font-semibold shadow-sm outline-none dark:border-gray-800 dark:bg-slate-900"
                                    />
                                </div>
                                <div class="flex-1 space-y-2">
                                    <label
                                        class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                    >
                                        Số Zalo / Liên hệ
                                        <span class="text-cs_red">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="SĐT Zalo..."
                                        class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm font-semibold shadow-sm outline-none dark:border-gray-800 dark:bg-slate-900"
                                    />
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <input
                                    id="confirm_bank"
                                    type="checkbox"
                                    required
                                    class="text-cs_red h-5 w-5 cursor-pointer rounded border-gray-300 focus:ring-0 md:h-4 md:w-4"
                                />
                                <label
                                    for="confirm_bank"
                                    class="cursor-pointer text-[10px] leading-relaxed font-semibold text-gray-500 uppercase select-none md:text-[11px] dark:text-gray-400"
                                >
                                    Tôi cam kết nội dung trên là sự thật.
                                </label>
                            </div>

                            <div class="flex justify-center pt-2">
                                <button
                                    type="submit"
                                    class="bg-cs_red w-full rounded-md px-12 py-3 text-xs font-semibold tracking-widest text-white uppercase shadow-lg transition-all hover:bg-black active:scale-95 sm:w-auto md:py-4 md:text-sm"
                                >
                                    Gửi Duyệt Bài Viết
                                </button>
                            </div>
                        </form>

                        <!-- Form Website: New Structure -->
                        <form
                            id="form-website"
                            action="#"
                            method="POST"
                            enctype="multipart/form-data"
                            class="hidden space-y-6 md:space-y-8"
                        >
                            @csrf
                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 md:gap-6">
                                <div class="space-y-2 md:col-span-2">
                                    <label
                                        class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                    >
                                        Địa chỉ (URL) Website
                                        <span class="text-cs_red">*</span>
                                    </label>
                                    <input
                                        type="url"
                                        name="web_url"
                                        required
                                        placeholder="https://domain-lua-dao.vn"
                                        class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300"
                                    />
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                    >
                                        Phân loại
                                        <span class="text-cs_red">*</span>
                                    </label>
                                    <select
                                        name="category"
                                        required
                                        class="focus:border-cs_blue w-full cursor-pointer rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300"
                                    >
                                        <option value="">Chọn loại hình</option>
                                        <option value="fake">Giả mạo ngân hàng/app</option>
                                        <option value="bet">Cá cược, lô đề</option>
                                        <option value="invest">Đầu tư đa cấp ảo</option>
                                        <option value="phish">Đánh cắp tài khoản</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                    >
                                        Nơi phát hiện
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="FB Ads, Telegram, SMS..."
                                        class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300"
                                    />
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                >
                                    Ảnh chụp website
                                    <span class="text-cs_red">*</span>
                                </label>
                                <label
                                    for="web_evidence"
                                    class="group flex cursor-pointer flex-col items-center justify-center rounded-md border-2 border-dashed border-gray-100 py-10 transition-all hover:bg-gray-50 md:py-12 dark:border-gray-800 dark:hover:bg-slate-800"
                                >
                                    <i
                                        class="fa-solid fa-desktop group-hover:text-cs_blue mb-2 text-2xl text-gray-300 transition-colors"
                                    ></i>
                                    <span
                                        class="group-hover:text-cs_blue text-[10px] font-semibold tracking-widest text-gray-400 uppercase transition-colors md:text-[11px]"
                                    >
                                        Tải ảnh chụp màn hình
                                    </span>
                                    <input id="web_evidence" type="file" multiple class="hidden" />
                                </label>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200"
                                >
                                    Mô tả
                                    <span class="text-cs_red">*</span>
                                </label>
                                <textarea
                                    rows="5"
                                    placeholder="Họ đã lừa đảo bạn bằng cách nào? số tiền bao nhiêu?..."
                                    class="focus:border-cs_red w-full resize-none rounded-md border border-gray-200 bg-gray-50 px-4 py-4 text-sm leading-relaxed font-medium text-gray-700 transition-all outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300"
                                ></textarea>
                            </div>
                            <div class="flex items-center gap-3">
                                <input
                                    id="confirm_bank"
                                    type="checkbox"
                                    required
                                    class="text-cs_red h-5 w-5 cursor-pointer rounded border-gray-300 focus:ring-0 md:h-4 md:w-4"
                                />
                                <label
                                    for="confirm_bank"
                                    class="cursor-pointer text-[10px] leading-relaxed font-semibold text-gray-500 uppercase select-none md:text-[11px] dark:text-gray-400"
                                >
                                    Tôi cam kết nội dung trên là sự thật.
                                </label>
                            </div>

                            <div class="flex justify-center pt-2">
                                <button
                                    type="submit"
                                    class="bg-cs_red w-full rounded-md px-12 py-4 text-sm font-semibold tracking-widest text-white uppercase shadow-lg transition-all hover:bg-black active:scale-95 sm:w-auto"
                                >
                                    Báo cáo Website
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>

            <!-- SEO: Informational Footer Section -->
            <article class="mx-auto mt-16 max-w-4xl space-y-10 md:mt-24 md:space-y-14">
                <div class="text-center">
                    <h2
                        class="text-md mb-4 font-semibold tracking-[0.2em] text-gray-800 uppercase md:text-lg dark:text-gray-100"
                    >
                        Các câu hỏi liên quan
                    </h2>
                    <div class="bg-cs_red mx-auto h-1 w-12 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-12">
                    <section
                        class="space-y-4 rounded-md border border-gray-100 bg-white p-6 dark:border-gray-800/50 dark:bg-slate-900/50"
                    >
                        <h3 class="text-cs_red flex items-center gap-3 text-sm font-semibold tracking-wider uppercase">
                            <i class="fa-solid fa-circle-question text-xs"></i>
                            Thông tin có được bảo mật?
                        </h3>
                        <p class="text-[13px] leading-relaxed font-semibold text-gray-500 italic dark:text-gray-400">
                            Dữ liệu người tố cáo chỉ được dùng để xác minh nội bộ và hoàn toàn không công khai để bảo vệ
                            danh tính cá nhân.
                        </p>
                    </section>
                    <section
                        class="space-y-4 rounded-md border border-gray-100 bg-white p-6 dark:border-gray-800/50 dark:bg-slate-900/50"
                    >
                        <h3 class="text-cs_blue flex items-center gap-3 text-sm font-semibold tracking-wider uppercase">
                            <i class="fa-solid fa-hand-holding-heart text-xs"></i>
                            CheckScam có thu phí không?
                        </h3>
                        <p class="text-[13px] leading-relaxed font-semibold text-gray-500 italic dark:text-gray-400">
                            CheckScam là dự án cộng đồng phi lợi nhuận. Mọi hoạt động tố cáo và tra cứu đều miễn phí
                            100%.
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
        input:not([type='checkbox']):not([type='radio']):focus,
        select:focus,
        textarea:focus {
            background-color: #fff !important;
            border-color: #ff0000 !important;
            box-shadow: 0 0 0 2px rgba(255, 0, 0, 0.05) !important;
            outline: none !important;
        }

        .dark input:not([type='checkbox']):not([type='radio']):focus,
        .dark select:focus,
        .dark textarea:focus {
            background-color: #0f172a !important;
            border-color: #ff3333 !important;
            box-shadow: 0 0 0 2px rgba(255, 51, 51, 0.1) !important;
        }

        /* Checkbox fix: Ensure they remain visible and interactive */
        input[type='checkbox'] {
            transition: all 0.2s ease;
        }

        input[type='checkbox']:focus {
            box-shadow: none !important;
            border-color: #d1d5db !important;
        }
    </style>
@endsection

@push("scripts")
    <script>
        $(document).ready(function() {
            function switchTab(type) {
                const isBank = type === 'bank';
                const inactiveClasses =
                    'text-gray-400 dark:text-gray-600 hover:text-gray-600 dark:hover:text-gray-300 border-transparent';
                const activeClasses =
                    'bg-white dark:bg-slate-900 border-gray-200 dark:border-gray-800 border-b-white dark:border-b-slate-900 tab-active-red';

                $('#form-bank').toggleClass('hidden', !isBank);
                $('#form-website').toggleClass('hidden', isBank);

                $('#tab-bank').toggleClass(activeClasses, isBank).toggleClass(inactiveClasses, !isBank);
                $('#tab-website').toggleClass(activeClasses, !isBank).toggleClass(inactiveClasses, isBank);
            }

            $('#tab-bank').on('click', function() {
                switchTab('bank');
            });

            $('#tab-website').on('click', function() {
                switchTab('website');
            });
        });
    </script>
@endpush

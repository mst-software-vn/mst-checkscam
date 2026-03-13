@extends("layouts.app")

@section("title", "[ Tố Cáo kẻ lừa đảo ] Cập nhật thêm data vào hệ thống")

@section("content")
<main class="pb-24">
    <x-breadcrumb :links="[['name' => 'Tố cáo lừa đảo', 'url' => '/to-cao-lua-dao']]" />
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Flash messages --}}
        @if(session('success'))
        <div class="mb-6 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-700">
            <i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="mb-6 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
            <i class="fa-solid fa-circle-xmark mr-2"></i>{{ session('error') }}
        </div>
        @endif

        <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-12">

            <!-- Left Column: Guidance & Stats -->
            <aside class="order-2 space-y-4 md:mt-15 md:space-y-6 lg:order-1 lg:col-span-4">
                <div
                    class="rounded-md border border-gray-200 bg-white p-5 shadow-xs md:p-6 dark:border-gray-800 dark:bg-slate-900">
                    <h2
                        class="md:text-md mb-4 flex items-center gap-2 text-[13px] font-semibold tracking-widest text-gray-800 uppercase dark:text-gray-100">
                        <span class="bg-cs_red h-4 w-1 rounded-full"></span>
                        Tại sao nên báo cáo?
                    </h2>
                    <ul class="space-y-4">
                        <li class="flex gap-3">
                            <i class="fa-solid fa-check-double text-cs_blue mt-1 text-xs md:text-sm"></i>
                            <p
                                class="text-[12px] leading-relaxed font-semibold text-gray-500 md:text-sm dark:text-gray-400">
                                Giúp cộng đồng nhận diện kẻ lừa đảo ngay lập tức qua công cụ tra cứu.
                            </p>
                        </li>
                        <li class="flex gap-3">
                            <i class="fa-solid fa-check-double text-cs_blue mt-1 text-xs md:text-sm"></i>
                            <p
                                class="text-[12px] leading-relaxed font-semibold text-gray-500 md:text-sm dark:text-gray-400">
                                Tạo áp lực lên các tài khoản ngân hàng "đen", hạn chế khả năng nhận tiền lừa đảo.
                            </p>
                        </li>
                        <li class="flex gap-3">
                            <i class="fa-solid fa-check-double text-cs_blue mt-1 text-xs md:text-sm"></i>
                            <p
                                class="text-[12px] leading-relaxed font-semibold text-gray-500 md:text-sm dark:text-gray-400">
                                Xây dựng tệp dữ liệu sạch để phối hợp với các đơn vị bảo mật/pháp luật.
                            </p>
                        </li>
                    </ul>
                </div>

                <div
                    class="rounded-md border border-blue-100 bg-blue-50/50 p-5 md:p-6 dark:border-blue-900/30 dark:bg-blue-900/10">
                    <h3
                        class="text-cs_blue mb-4 flex items-center gap-2 text-[13px] font-semibold tracking-widest uppercase md:text-sm">
                        <i class="fa-solid fa-shield-halved"></i>
                        Quy trình xét duyệt
                    </h3>
                    <div class="relative space-y-5">
                        <div class="absolute top-2 bottom-2 left-1.5 w-[1px] bg-blue-200 dark:bg-blue-800/50"></div>
                        <div class="relative pl-6">
                            <div
                                class="border-cs_blue absolute top-1.5 left-0 h-3 w-3 rounded-full border-2 bg-white dark:bg-slate-900">
                            </div>
                            <p class="text-[12px] font-semibold text-gray-700 md:text-sm dark:text-gray-300">
                                Gửi thông tin: <span class="font-normal">Bạn điền form bên cạnh và đính kèm bằng
                                    chứng.</span>
                            </p>
                        </div>
                        <div class="relative pl-6">
                            <div
                                class="absolute top-1.5 left-0 h-3 w-3 rounded-full border-2 border-blue-300 bg-white dark:bg-slate-900">
                            </div>
                            <p class="text-[12px] font-semibold text-gray-500 italic md:text-sm dark:text-gray-400">
                                Xác minh: <span class="font-normal not-italic">Đội ngũ Admin kiểm tra tính xác thực (30p
                                    - 12h).</span>
                            </p>
                        </div>
                        <div class="relative pl-6">
                            <div
                                class="absolute top-1.5 left-0 h-3 w-3 rounded-full border-2 border-blue-100 bg-white dark:bg-slate-900">
                            </div>
                            <p class="text-[12px] font-semibold text-gray-400 md:text-sm dark:text-gray-500">
                                Công khai: <span class="font-normal">Bài viết hiển thị trên hệ thống CheckScam.</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 p-2 dark:border-gray-800">
                    <p class="md:text-md mb-3 text-[11px] font-semibold tracking-tighter text-gray-400 uppercase">
                        Các hình thức phổ biến:
                    </p>
                    <div class="flex flex-wrap gap-1.5 md:gap-2">
                        <span
                            class="rounded-sm border border-gray-200/50 bg-gray-100 px-2.5 py-1 text-[10px] text-gray-500 md:text-xs dark:border-gray-700/50 dark:bg-gray-800">Giả
                            mạo Telegram</span>
                        <span
                            class="rounded-sm border border-gray-200/50 bg-gray-100 px-2.5 py-1 text-[10px] text-gray-500 md:text-xs dark:border-gray-700/50 dark:bg-gray-800">Lừa
                            đảo CTV</span>
                        <span
                            class="rounded-sm border border-gray-200/50 bg-gray-100 px-2.5 py-1 text-[10px] text-gray-500 md:text-xs dark:border-gray-700/50 dark:bg-gray-800">Scam
                            Trading</span>
                        <span
                            class="rounded-sm border border-gray-200/50 bg-gray-100 px-2.5 py-1 text-[10px] text-gray-500 md:text-xs dark:border-gray-700/50 dark:bg-gray-800">Fake
                            Bank App</span>
                    </div>
                </div>
            </aside>

            <!-- Right Column: The Main Form -->
            <section class="order-1 lg:order-2 lg:col-span-8">
                <div class="no-scrollbar flex gap-1 overflow-x-auto whitespace-nowrap">
                    <button id="tab-bank"
                        class="tab-active-red cursor-pointer rounded-t-md border-b px-5 py-3.5 text-center text-[11px] font-semibold tracking-wider uppercase transition-all md:px-8 md:text-sm">
                        Số tài khoản
                    </button>
                    <button id="tab-website"
                        class="flex-1 cursor-pointer rounded-t-md border-b border-transparent px-5 py-3.5 text-center text-[11px] font-semibold tracking-wider text-gray-400 uppercase transition-all hover:text-gray-600 md:flex-none md:px-8 md:text-sm dark:text-gray-600 dark:hover:text-gray-300">
                        Trang web lừa đảo
                    </button>
                </div>

                <div
                    class="relative overflow-hidden rounded-md border border-gray-200 bg-white p-5 shadow-xs sm:p-8 md:p-10 dark:border-gray-800 dark:bg-slate-900">

                    {{-- ================================ --}}
                    {{-- FORM 1: TÀI KHOẢN / SĐT         --}}
                    {{-- ================================ --}}
                    <form id="form-bank" action="{{ route('report.store') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6 md:space-y-8">
                        @csrf
                        <input type="hidden" name="type" value="account">

                        @if($errors->any())
                        <div class="rounded-md border border-red-200 bg-red-50 p-4">
                            <ul class="space-y-1">
                                @foreach($errors->all() as $error)
                                <li class="text-xs font-semibold text-red-600">
                                    <i class="fa-solid fa-circle-xmark mr-1"></i>{{ $error }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <h4 class="text-cs_red mb-8 text-center font-semibold uppercase">Khai báo</h4>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 md:gap-6">
                            {{-- Chủ tài khoản --}}
                            <div class="space-y-2">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                    Chủ tài khoản <span class="text-cs_red">*</span>
                                </label>
                                <input type="text" name="target_name" value="{{ old('target_name') }}"
                                    placeholder="Nguyen Van A"
                                    class="focus:border-cs_red w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300" />
                            </div>

                            {{-- Số tài khoản / SĐT --}}
                            <div class="space-y-2">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                    Số tài khoản / SĐT <span class="text-cs_red">*</span>
                                </label>
                                <input type="text" name="target_id" value="{{ old('target_id') }}"
                                    placeholder="Nhập dãy số..."
                                    class="focus:border-cs_red w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300" />
                            </div>

                            {{-- Ngân hàng --}}
                            <div class="space-y-2 md:col-span-2">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                    Ngân hàng / Ví điện tử
                                </label>
                                <input type="text" name="target_bank" value="{{ old('target_bank') }}"
                                    placeholder="Vietcombank, MB, Momo, Zalopay..."
                                    class="focus:border-cs_red w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300" />
                            </div>

                            {{-- Danh mục --}}
                            <div class="space-y-2 md:col-span-2">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                    Hình thức lừa đảo
                                </label>
                                <select name="category"
                                    class="focus:border-cs_red w-full cursor-pointer rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-500 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300">
                                    <option value="">-- Chọn hình thức --</option>
                                    <option value="Lừa đảo mua bán"
                                        {{ old('category') == 'Lừa đảo mua bán' ? 'selected' : '' }}>Lừa đảo mua bán
                                    </option>
                                    <option value="Giả mạo Telegram"
                                        {{ old('category') == 'Giả mạo Telegram' ? 'selected' : '' }}>Giả mạo Telegram
                                    </option>
                                    <option value="Lừa đảo CTV"
                                        {{ old('category') == 'Lừa đảo CTV' ? 'selected' : '' }}>Lừa đảo CTV</option>
                                    <option value="Scam Trading"
                                        {{ old('category') == 'Scam Trading' ? 'selected' : '' }}>Scam Trading</option>
                                    <option value="Fake Bank App"
                                        {{ old('category') == 'Fake Bank App' ? 'selected' : '' }}>Fake Bank App
                                    </option>
                                    <option value="Khác" {{ old('category') == 'Khác' ? 'selected' : '' }}>Khác</option>
                                </select>
                            </div>
                        </div>

                        {{-- Upload ảnh bằng chứng --}}
                        <div class="space-y-3">
                            <label
                                class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                Ảnh bằng chứng <span class="text-cs_red">*</span>
                            </label>

                            <label for="bank_evidence"
                                class="group relative flex min-h-[160px] cursor-pointer flex-col items-center justify-center rounded-md border-2 border-dashed border-gray-200 bg-gray-50/50 px-4 py-6 transition-all hover:bg-white dark:border-gray-800 dark:bg-slate-800/50 dark:hover:bg-slate-800">

                                {{-- Preview grid nằm bên trong --}}
                                <div id="bank-preview"
                                    class="mb-4 grid w-full grid-cols-3 gap-3 sm:grid-cols-4 md:grid-cols-5 empty:hidden">
                                </div>

                                {{-- Placeholder text -- ẩn khi đã có ảnh --}}
                                <div id="bank-placeholder"
                                    class="flex flex-col items-center justify-center text-center">
                                    <i
                                        class="fa-solid fa-camera-retro group-hover:text-cs_red mb-3 text-2xl text-gray-300 transition-colors md:text-3xl"></i>
                                    <span
                                        class="group-hover:text-cs_red text-[9px] font-semibold tracking-widest text-gray-400 uppercase transition-colors md:text-[11px]">
                                        Tải bill & đoạn chat (JPG, PNG) — Tối đa 10 ảnh, mỗi ảnh 5MB
                                    </span>
                                </div>

                                {{-- Khi đã có ảnh: hiện text nhỏ phía dưới --}}
                                <div id="bank-add-more" class="mt-3 hidden flex-col items-center text-center">
                                    <i class="fa-solid fa-plus text-cs_red mb-1 text-base"></i>
                                    <span
                                        class="text-cs_red text-[9px] font-semibold tracking-widest uppercase md:text-[10px]">
                                        Thêm ảnh
                                    </span>
                                </div>

                                <input id="bank_evidence" type="file" name="evidence_images[]" multiple
                                    accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden" />
                            </label>
                        </div>

                        {{-- Mô tả --}}
                        <div class="space-y-2">
                            <label
                                class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                Chi tiết sự việc <span class="text-cs_red">*</span>
                            </label>
                            <textarea name="description" rows="5"
                                placeholder="Họ đã lừa đảo bạn bằng cách nào? Số tiền bao nhiêu?..."
                                class="focus:border-cs_red w-full resize-none rounded-md border border-gray-200 bg-gray-50 px-4 py-4 text-sm leading-relaxed font-medium text-gray-700 transition-all outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300">{{ old('description') }}</textarea>
                        </div>

                        {{-- Thông tin người tố cáo --}}
                        <h4 class="text-cs_blue text-center font-semibold uppercase">Người xác thực</h4>
                        <div
                            class="flex flex-col gap-5 rounded-md border border-gray-100 p-5 sm:flex-row md:gap-6 md:p-6 dark:border-gray-800">
                            <div class="flex-1 space-y-2">
                                <label
                                    class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    Tên thật <span class="text-cs_red">*</span>
                                </label>
                                <input type="text" name="reporter_name" value="{{ old('reporter_name') }}"
                                    placeholder="Họ và tên..." required
                                    class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm font-semibold shadow-sm outline-none dark:border-gray-800 dark:bg-slate-900" />
                            </div>
                            <div class="flex-1 space-y-2">
                                <label
                                    class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    Số Zalo / Liên hệ <span class="text-cs_red">*</span>
                                </label>
                                <input type="text" name="reporter_contact" value="{{ old('reporter_contact') }}"
                                    placeholder="SĐT Zalo..." required
                                    class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm font-semibold shadow-sm outline-none dark:border-gray-800 dark:bg-slate-900" />
                            </div>
                        </div>

                        {{-- Ẩn danh --}}
                        <div class="space-y-2">
                            <div class="flex items-center gap-3">
                                <input id="is_anonymous_bank" type="checkbox" name="is_anonymous" value="1"
                                    {{ old('is_anonymous') ? 'checked' : '' }}
                                    class="text-cs_red h-5 w-5 cursor-pointer rounded border-gray-300 focus:ring-0 md:h-4 md:w-4" />
                                <label for="is_anonymous_bank"
                                    class="cursor-pointer text-[10px] leading-relaxed font-semibold text-gray-500 uppercase select-none md:text-[11px] dark:text-gray-400">
                                    Ẩn danh tính của tôi
                                </label>
                            </div>

                            {{-- Cam kết --}}
                            <div class="flex items-center gap-3">
                                <input id="confirm_bank" type="checkbox"
                                    class="text-cs_red h-5 w-5 cursor-pointer rounded border-gray-300 focus:ring-0 md:h-4 md:w-4" />
                                <label for="confirm_bank"
                                    class="cursor-pointer text-[10px] leading-relaxed font-semibold text-gray-500 uppercase select-none md:text-[11px] dark:text-gray-400">
                                    Tôi xin cam đoan nội dung tố cáo là sự thật và chịu trách nhiệm về thông tin này.
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-center pt-2">
                            <button type="submit"
                                class="bg-cs_red w-full rounded-md px-12 py-3 text-xs font-semibold tracking-widest text-white uppercase shadow-lg transition-all hover:bg-black active:scale-95 sm:w-auto md:py-4 md:text-sm">
                                Gửi Duyệt Bài Viết
                            </button>
                        </div>
                    </form>

                    {{-- ================================ --}}
                    {{-- FORM 2: WEBSITE LỪA ĐẢO         --}}
                    {{-- ================================ --}}
                    <form id="form-website" action="{{ route('report.store') }}" method="POST"
                        enctype="multipart/form-data" class="hidden space-y-6 md:space-y-8">
                        @csrf
                        <input type="hidden" name="type" value="website">

                        <h4 class="text-cs_red mb-8 text-center font-semibold uppercase">Khai báo</h4>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 md:gap-6">
                            {{-- URL website --}}
                            <div class="space-y-2">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                    Địa chỉ (URL) Website <span class="text-cs_red">*</span>
                                </label>
                                <input type="text" name="target_id" value="{{ old('target_id') }}"
                                    placeholder="https://domain-lua-dao.vn"
                                    class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300" />
                            </div>

                            {{-- Tên website --}}
                            <div class="space-y-2">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                    Tên website
                                </label>
                                <input type="text" name="target_name" value="{{ old('target_name') }}"
                                    placeholder="Tên hiển thị của website..."
                                    class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300" />
                            </div>

                            {{-- Phân loại --}}
                            <div class="space-y-2 md:col-span-2">
                                <label
                                    class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                    Phân loại <span class="text-cs_red">*</span>
                                </label>
                                <select name="category"
                                    class="focus:border-cs_blue w-full cursor-pointer rounded-md border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm font-semibold text-gray-900 outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300">
                                    <option value="">Chọn loại hình</option>
                                    <option value="Giả mạo ngân hàng/app">Giả mạo ngân hàng/app</option>
                                    <option value="Cá cược, lô đề">Cá cược, lô đề</option>
                                    <option value="Đầu tư đa cấp ảo">Đầu tư đa cấp ảo</option>
                                    <option value="Đánh cắp tài khoản">Đánh cắp tài khoản</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                        </div>

                        {{-- Upload ảnh chụp website --}}
                        <div class="space-y-3">
                            <label
                                class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                Ảnh chụp website <span class="text-cs_red">*</span>
                            </label>

                            <label for="web_evidence"
                                class="group relative flex min-h-40 cursor-pointer flex-col items-center justify-center rounded-md border-2 border-dashed border-gray-200 bg-gray-50/50 px-4 py-6 transition-all hover:bg-white dark:border-gray-800 dark:bg-slate-800/50 dark:hover:bg-slate-800">

                                <div id="web-preview"
                                    class="mb-4 grid w-full grid-cols-3 gap-3 sm:grid-cols-4 md:grid-cols-5 empty:hidden">
                                </div>

                                <div id="web-placeholder" class="flex flex-col items-center justify-center text-center">
                                    <i
                                        class="fa-solid fa-camera-retro group-hover:text-cs_red mb-3 text-2xl text-gray-300 transition-colors md:text-3xl"></i>
                                    <span
                                        class="group-hover:text-cs_red text-[9px] font-semibold tracking-widest text-gray-400 uppercase transition-colors md:text-[11px]">
                                        Tải ảnh chụp màn hình (JPG, PNG) — Tối đa 10 ảnh, mỗi ảnh 5MB
                                    </span>
                                </div>

                                <div id="web-add-more" class="mt-3 hidden flex-col items-center text-center">
                                    <i class="fa-solid fa-plus text-cs_red mb-1 text-base"></i>
                                    <span
                                        class="text-cs_red text-[9px] font-semibold tracking-widest uppercase md:text-[10px]">
                                        Thêm ảnh
                                    </span>
                                </div>

                                <input id="web_evidence" type="file" name="evidence_images[]" multiple
                                    accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden" />
                            </label>
                        </div>

                        {{-- Mô tả --}}
                        <div class="space-y-2">
                            <label
                                class="ml-1 text-[10px] font-semibold tracking-widest text-gray-800 uppercase md:text-[11px] dark:text-gray-200">
                                Mô tả <span class="text-cs_red">*</span>
                            </label>
                            <textarea name="description" rows="5"
                                placeholder="Website này lừa đảo bằng cách nào? Số tiền bao nhiêu?..."
                                class="focus:border-cs_red w-full resize-none rounded-md border border-gray-200 bg-gray-50 px-4 py-4 text-sm leading-relaxed font-medium text-gray-700 transition-all outline-none focus:ring-0 dark:border-gray-700 dark:bg-slate-800 dark:text-gray-300">{{ old('description') }}</textarea>
                        </div>

                        {{-- Thông tin người tố cáo --}}
                        <h4 class="text-cs_blue text-center font-semibold uppercase">Người xác thực</h4>
                        <div
                            class="flex flex-col gap-5 rounded-md border border-gray-100 p-5 sm:flex-row md:gap-6 md:p-6 dark:border-gray-800">
                            <div class="flex-1 space-y-2">
                                <label
                                    class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    Tên thật <span class="text-cs_red">*</span>
                                </label>
                                <input type="text" name="reporter_name" value="{{ old('reporter_name') }}"
                                    placeholder="Họ và tên..." required
                                    class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm font-semibold shadow-sm outline-none dark:border-gray-800 dark:bg-slate-900" />
                            </div>
                            <div class="flex-1 space-y-2">
                                <label
                                    class="text-[10px] font-semibold tracking-widest text-gray-400 uppercase dark:text-gray-500">
                                    Số Zalo / Liên hệ <span class="text-cs_red">*</span>
                                </label>
                                <input type="text" name="reporter_contact" value="{{ old('reporter_contact') }}"
                                    placeholder="SĐT Zalo..." required
                                    class="focus:border-cs_blue w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm font-semibold shadow-sm outline-none dark:border-gray-800 dark:bg-slate-900" />
                            </div>
                        </div>

                        {{-- Ẩn danh --}}
                        <div class="space-y-2">
                            <div class="flex items-center gap-3">
                                <input id="is_anonymous_web" type="checkbox" name="is_anonymous" value="1"
                                    {{ old('is_anonymous') ? 'checked' : '' }}
                                    class="text-cs_red h-5 w-5 cursor-pointer rounded border-gray-300 focus:ring-0 md:h-4 md:w-4" />
                                <label for="is_anonymous_web"
                                    class="cursor-pointer text-[10px] leading-relaxed font-semibold text-gray-500 uppercase select-none md:text-[11px] dark:text-gray-400">
                                    Ẩn danh tính của tôi
                                </label>
                            </div>

                            {{-- Cam kết --}}
                            <div class="flex items-center gap-3">
                                <input id="confirm_web" type="checkbox"
                                    class="text-cs_red h-5 w-5 cursor-pointer rounded border-gray-300 focus:ring-0 md:h-4 md:w-4" />
                                <label for="confirm_web"
                                    class="cursor-pointer text-[10px] leading-relaxed font-semibold text-gray-500 uppercase select-none md:text-[11px] dark:text-gray-400">
                                    Tôi xin cam đoan nội dung tố cáo là sự thật và chịu trách nhiệm về thông tin này.
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-center pt-2">
                            <button type="submit"
                                class="bg-cs_red w-full rounded-md px-12 py-4 text-sm font-semibold tracking-widest text-white uppercase shadow-lg transition-all hover:bg-black active:scale-95 sm:w-auto">
                                Báo cáo Website
                            </button>
                        </div>
                    </form>

                </div>
            </section>
        </div>

        <!-- SEO Footer -->
        <article class="mx-auto mt-16 max-w-4xl space-y-10 md:mt-24 md:space-y-14">
            <div class="text-center">
                <h2
                    class="text-md mb-4 font-semibold tracking-[0.2em] text-gray-800 uppercase md:text-lg dark:text-gray-100">
                    Các câu hỏi liên quan
                </h2>
                <div class="bg-cs_red mx-auto h-1 w-12 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-12">
                <section
                    class="space-y-4 rounded-md border border-gray-100 bg-white p-6 dark:border-gray-800/50 dark:bg-slate-900/50">
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
                    class="space-y-4 rounded-md border border-gray-100 bg-white p-6 dark:border-gray-800/50 dark:bg-slate-900/50">
                    <h3 class="text-cs_blue flex items-center gap-3 text-sm font-semibold tracking-wider uppercase">
                        <i class="fa-solid fa-hand-holding-heart text-xs"></i>
                        CheckScam có thu phí không?
                    </h3>
                    <p class="text-[13px] leading-relaxed font-semibold text-gray-500 italic dark:text-gray-400">
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

    input[type='checkbox']:focus {
        box-shadow: none !important;
        border-color: #d1d5db !important;
    }

    /* Preview image styles */
    .preview-item {
        position: relative;
        aspect-ratio: 1;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

    .preview-item .remove-btn {
        position: absolute;
        top: -6px;
        right: -6px;
        width: 20px;
        height: 20px;
        background: #ef4444;
        color: white;
        border-radius: 50%;
        border: none;
        font-size: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }

    .preview-item .remove-btn:hover {
        background: #b91c1c;
    }

    /* SPINNER BUTTON  */
    .btn-loading {
        position: relative;
        pointer-events: none;
        opacity: 0.85;
    }

    .btn-loading .btn-spinner {
        display: inline-block;
        width: 14px;
        height: 14px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.7s linear infinite;
        margin-right: 8px;
        vertical-align: middle;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* ==================== SUCCESS MODAL ==================== */
    #success-modal.active {
        display: flex;
    }

    #success-modal .relative {
        animation: modalIn 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    @keyframes modalIn {
        from {
            opacity: 0;
            transform: scale(0.88) translateY(16px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
</style>
@endsection

@push("scripts")
<style>
    /* ==================== PREVIEW ==================== */
    .preview-item {
        position: relative;
        aspect-ratio: 1;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
        cursor: zoom-in;
        transition: opacity .2s;
    }

    .preview-item img:hover {
        opacity: .85;
    }

    .preview-item .remove-btn {
        position: absolute;
        top: -6px;
        right: -6px;
        width: 20px;
        height: 20px;
        background: #ef4444;
        color: white;
        border-radius: 50%;
        border: none;
        font-size: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s;
        z-index: 1;
    }

    .preview-item .remove-btn:hover {
        background: #b91c1c;
    }

    /* ==================== LIGHTBOX ==================== */
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

    /* ==================== FORM ERRORS (AJAX) ==================== */
    .field-error {
        color: #ef4444;
        font-size: 11px;
        font-weight: 600;
        margin-top: 4px;
        display: block;
    }

    .input-error {
        border-color: #ef4444 !important;
    }
</style>

{{-- LIGHTBOX HTML --}}
<div id="lightbox">
    <button class="lb-close" id="lb-close"><i class="fa-solid fa-xmark"></i></button>
    <button class="lb-nav lb-prev" id="lb-prev"><i class="fa-solid fa-chevron-left"></i></button>
    <img src="" id="lb-img" alt="preview" />
    <button class="lb-nav lb-next" id="lb-next"><i class="fa-solid fa-chevron-right"></i></button>
    <span class="lb-counter" id="lb-counter"></span>
</div>

{{-- SUCCESS MODAL --}}
<div id="success-modal" class="fixed inset-0 z-[10000] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/70"></div>
    <div class="relative w-full max-w-lg rounded-md bg-white shadow-2xl dark:bg-slate-900">

        {{-- Title bar --}}
        <div class="border-b border-gray-200 px-8 py-5 text-center dark:border-gray-700">
            <h3 class="text-sm font-bold tracking-[0.2em] text-gray-800 uppercase dark:text-gray-100">
                Đơn tố cáo đã được ghi nhận
            </h3>
        </div>

        <div class="px-8 py-7 text-center">

            {{-- Main message --}}
            <p class="mb-3 text-sm font-bold text-gray-800 dark:text-gray-100">
                Báo cáo của bạn sẽ được kiểm duyệt trong vòng 30 phút – 12 giờ.
            </p>
            <p class="mb-5 text-[13px] leading-relaxed text-gray-500 dark:text-gray-400">
                Để xác nhận đơn đã duyệt, hãy tra cứu lại số tài khoản hoặc website bạn vừa tố cáo trên trang chủ.
                Nếu chưa xuất hiện, bạn có thể bổ sung thêm bằng chứng và gửi lại.
            </p>

            {{-- Shield icons --}}
            <div class="mb-5 flex items-center justify-center gap-2 text-cs_blue">
                <i class="fa-solid fa-shield-halved text-lg"></i>
                <i class="fa-solid fa-shield-halved text-xl"></i>
                <i class="fa-solid fa-shield-halved text-2xl"></i>
                <i class="fa-solid fa-shield-halved text-xl"></i>
                <i class="fa-solid fa-shield-halved text-lg"></i>
            </div>

            {{-- Highlight notice --}}
            <p class="mb-1 text-[13px] font-bold uppercase tracking-wider text-gray-700 dark:text-gray-200">
                Hãy cảnh báo người thân & bạn bè
            </p>
            <p class="mb-6 text-[13px] font-bold uppercase tracking-wider text-gray-700 dark:text-gray-200">
                <a href="{{ route('home') }}" class="text-cs_red hover:underline">
                    [ TRA CỨU NGAY TRÊN CHECKSCAM ]
                </a>
                <br>trước khi giao dịch online
            </p>

            {{-- CTA --}}
            <button id="success-modal-btn"
                class="bg-cs_red w-full rounded-md py-4 text-sm font-bold tracking-widest text-white uppercase shadow-md transition-all hover:bg-black active:scale-95">
                VỀ TRANG CHỦ CHECKSCAM
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // ================================================
        // TAB SWITCHING
        // ================================================
        function switchTab(type) {
            const isBank = type === 'bank';
            const inactive =
                'text-gray-400 dark:text-gray-600 hover:text-gray-600 dark:hover:text-gray-300 border-transparent';
            const active = 'tab-active-red';
            $('#form-bank').toggleClass('hidden', !isBank);
            $('#form-website').toggleClass('hidden', isBank);
            $('#tab-bank').toggleClass(active, isBank).toggleClass(inactive, !isBank);
            $('#tab-website').toggleClass(active, !isBank).toggleClass(inactive, isBank);
        }
        $('#tab-bank').on('click', () => switchTab('bank'));
        $('#tab-website').on('click', () => switchTab('website'));


        // ================================================
        // LIGHTBOX
        // ================================================
        let lbImages = []; // [{src, name}]
        let lbIndex = 0;

        function openLightbox(images, startIndex) {
            lbImages = images;
            lbIndex = startIndex;
            renderLightbox();
            $('#lightbox').addClass('active');
            $('body').css('overflow', 'hidden');
        }

        function closeLightbox() {
            $('#lightbox').removeClass('active');
            $('body').css('overflow', '');
        }

        function renderLightbox() {
            $('#lb-img').attr('src', lbImages[lbIndex].src);
            $('#lb-counter').text((lbIndex + 1) + ' / ' + lbImages.length);
            $('#lb-prev').toggle(lbImages.length > 1);
            $('#lb-next').toggle(lbImages.length > 1);
        }

        $('#lb-close').on('click', closeLightbox);

        // Click outside image → đóng
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

        // Phím mũi tên & Escape
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


        // ================================================
        // IMAGE PREVIEW + LIGHTBOX INTEGRATION
        // ================================================
        function initImagePreview(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            // Lấy đúng placeholder/add-more theo từng input
            const prefix = inputId === 'bank_evidence' ? 'bank' : 'web';
            const $placeholder = $('#' + prefix + '-placeholder');
            const $addMore = $('#' + prefix + '-add-more');
            let fileList = [];

            input.addEventListener('change', function() {
                Array.from(this.files).forEach(file => {
                    const isDuplicate = fileList.find(f => f.file.name === file.name && f.file
                        .size === file.size);
                    if (isDuplicate) return;
                    if (fileList.length >= 10) {
                        alert('Tối đa 10 ảnh bằng chứng.');
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        fileList.push({
                            file,
                            dataUrl: e.target.result
                        });
                        renderPreview();
                        syncInput();
                    };
                    reader.readAsDataURL(file);
                });
                this.value = '';
            });

            function renderPreview() {
                preview.innerHTML = '';

                if (fileList.length === 0) {
                    // Không có ảnh → hiện placeholder, ẩn "Thêm ảnh"
                    $placeholder.removeClass('hidden').addClass('flex');
                    $addMore.removeClass('flex').addClass('hidden');
                    return;
                }

                // Có ảnh → ẩn placeholder, hiện "Thêm ảnh"
                $placeholder.removeClass('flex').addClass('hidden');
                $addMore.removeClass('hidden').addClass('flex');

                fileList.forEach((item, index) => {
                    const div = document.createElement('div');
                    div.className = 'preview-item';
                    div.innerHTML = `
                <img src="${item.dataUrl}" alt="preview" data-index="${index}" />
                <button type="button" class="remove-btn" data-index="${index}" title="Xóa ảnh">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            `;
                    div.querySelector('img').addEventListener('click', function(e) {
                        e.preventDefault(); // ngăn label trigger input
                        const images = fileList.map(f => ({
                            src: f.dataUrl,
                            name: f.file.name
                        }));
                        openLightbox(images, parseInt(this.dataset.index));
                    });
                    div.querySelector('.remove-btn').addEventListener('click', function(e) {
                        e.preventDefault();
                        fileList.splice(parseInt(this.dataset.index), 1);
                        renderPreview();
                        syncInput();
                    });
                    preview.appendChild(div);
                });
            }

            function syncInput() {
                const dt = new DataTransfer();
                fileList.forEach(item => dt.items.add(item.file));
                input.files = dt.files;
            }
        }

        initImagePreview('bank_evidence', 'bank-preview');
        initImagePreview('web_evidence', 'web-preview');


        // ================================================
        // AJAX FORM SUBMIT — giữ file & checkbox khi lỗi
        // ================================================
        function handleFormSubmit(formId) {
            $('#' + formId).on('submit', function(e) {
                e.preventDefault();
                const form = this;
                const $form = $(this);
                const $btn = $form.find('button[type=submit]');
                const origHtml = $btn.html();

                // Xóa lỗi cũ
                $form.find('.field-error').remove();
                $form.find('.input-error').removeClass('input-error');
                $form.find('.ajax-error-box').remove();

                // Client-side validation
                const targetId = $form.find('[name="target_id"]').val().trim();
                const description = $form.find('[name="description"]').val().trim();
                const reporterName = $form.find('[name="reporter_name"]').val().trim();
                const reporterContact = $form.find('[name="reporter_contact"]').val().trim();
                const confirmChecked = $form.find('[type="checkbox"][id^="confirm"]').is(':checked');
                const hasFiles = $form.find('[name="evidence_images[]"]')[0].files.length > 0;

                if (!targetId) {
                    alert('Vui lòng nhập số tài khoản / SĐT hoặc URL website.');
                    $form.find('[name="target_id"]').focus();
                    return;
                }
                if (!hasFiles) {
                    alert('Vui lòng đính kèm ít nhất 1 ảnh bằng chứng.');
                    return;
                }
                if (description.length < 50) {
                    alert('Chi tiết sự việc cần tối thiểu 50 ký tự.');
                    $form.find('[name="description"]').focus();
                    return;
                }
                if (!reporterName) {
                    alert('Vui lòng nhập tên thật của bạn.');
                    $form.find('[name="reporter_name"]').focus();
                    return;
                }
                if (!reporterContact) {
                    alert('Vui lòng nhập số Zalo / liên hệ của bạn.');
                    $form.find('[name="reporter_contact"]').focus();
                    return;
                }
                if (!confirmChecked) {
                    alert('Vui lòng xác nhận cam kết trước khi gửi.');
                    return;
                }

                // Spinner button
                $btn.addClass('btn-loading').html('<span class="btn-spinner"></span> Đang gửi...');

                $.ajax({
                    url: $form.attr('action'),
                    method: 'POST',
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(res) {
                        // Giữ spinner thêm 1s cho mượt, rồi show modal
                        setTimeout(function() {
                            $btn.removeClass('btn-loading').html(origHtml);
                            const redirectUrl = res.redirect || '{{ route("home") }}';
                            $('#success-modal-btn').off('click').on('click',
                                function() {
                                    window.location.href = redirectUrl;
                                });
                            $('#success-modal').addClass('active');
                            $('body').css('overflow', 'hidden');
                        }, 1000);
                    },
                    error: function(xhr) {
                        $btn.removeClass('btn-loading').html(origHtml);

                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let hasShownGeneral = false;

                            $.each(errors, function(field, messages) {
                                const $field = $form.find('[name="' + field +
                                    '"], [name="' + field + '[]"]');
                                if ($field.length) {
                                    $field.addClass('input-error');
                                    $field.closest('.space-y-2, .space-y-3').append(
                                        '<span class="field-error"><i class="fa-solid fa-circle-xmark mr-1"></i>' +
                                        messages[0] + '</span>'
                                    );
                                } else {
                                    if (!hasShownGeneral) {
                                        hasShownGeneral = true;
                                        $form.prepend(
                                            '<div class="ajax-error-box rounded-md border border-red-200 bg-red-50 p-4 mb-4"></div>'
                                        );
                                    }
                                    $form.find('.ajax-error-box').append(
                                        '<p class="text-xs font-semibold text-red-600"><i class="fa-solid fa-circle-xmark mr-1"></i>' +
                                        messages[0] + '</p>'
                                    );
                                }
                            });

                            $('html, body').animate({
                                scrollTop: $form.offset().top - 100
                            }, 300);

                        } else if (xhr.status === 429) {
                            alert('Bạn đã gửi quá nhiều lần. Vui lòng thử lại sau.');
                        } else {
                            alert('Có lỗi xảy ra, vui lòng thử lại.');
                        }
                    }
                });
            });
        }

        handleFormSubmit('form-bank');
        handleFormSubmit('form-website');

    });
</script>
@endpush
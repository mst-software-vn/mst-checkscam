@extends('layouts.app')

@section('title', 'Tố cáo lừa đảo - CheckScam.vn')

@section('content')
    <main class="min-h-screen bg-white dark:bg-dark_bg py-10 md:py-16">
        <div class="max-w-4xl mx-auto px-4">

            <!-- Minimalist Header -->
            <header class="text-center mb-12">
                <i class="fa-solid fa-lock text-4xl text-cs_red mb-6 inline-block"></i>
                <h1 class="text-xl md:text-2xl font-black text-gray-800 dark:text-gray-100 uppercase tracking-widest mb-2">
                    Điền thông tin tố cáo
                </h1>
                <div class="w-16 h-1 bg-cs_blue mx-auto rounded-full"></div>
            </header>

            <!-- Clean Tabs -->
            <div class="flex border-b border-gray-100 dark:border-gray-800 mb-10">
                <button onclick="switchTab('bank')" id="tab-bank"
                    class="flex-1 pb-4 text-xs md:text-sm font-bold uppercase tracking-wider transition-all tab-active-checkscam border-b border-transparent">
                    Số tài khoản Scam
                </button>
                <button onclick="switchTab('website')" id="tab-website"
                    class="flex-1 pb-4 text-xs md:text-sm font-bold uppercase tracking-wider text-gray-400 dark:text-gray-600 border-b border-transparent hover:text-gray-600 dark:hover:text-gray-200 transition-all">
                    Website lừa đảo
                </button>
            </div>

            <!-- Main Form Card: Reduced shadow, clean border -->
            <div
                class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-800 rounded-md p-6 md:p-10 shadow-xs">

                <!-- FORM BANK -->
                <form id="form-bank" action="#" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                        <div class="space-y-2">
                            <label
                                class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Tên
                                chủ tài khoản <span class="text-cs_red">*</span></label>
                            <input type="text" name="bank_owner" required placeholder="Ví dụ: NGUYEN VAN A"
                                class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm text-gray-800 dark:text-white uppercase outline-none">
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Số
                                tài khoản <span class="text-cs_red">*</span></label>
                            <input type="text" name="bank_number" required placeholder="Nhập STK, SĐT ví..."
                                class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm text-gray-800 dark:text-white outline-none">
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Ngân
                                hàng <span class="text-cs_red">*</span></label>
                            <input type="text" name="bank_name" required placeholder="Vietcombank, MoMo..."
                                class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm text-gray-800 dark:text-white outline-none">
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Link
                                Facebook (nếu có)</label>
                            <input type="url" name="fb_link" placeholder="Dán link facebook kẻ lừa đảo..."
                                class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm text-gray-800 dark:text-white outline-none">
                        </div>
                    </div>

                    <!-- Evidence Upload: Simple & Clear -->
                    <div class="space-y-3">
                        <label
                            class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Bằng
                            chứng hình ảnh <span class="text-cs_red">*</span></label>
                        <label for="bank_evidence"
                            class="flex flex-col items-center justify-center py-10 border-2 border-dashed border-gray-100 dark:border-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-800 transition-all cursor-pointer group">
                            <i
                                class="fa-solid fa-camera text-2xl text-gray-300 group-hover:text-cs_blue mb-2 transition-colors"></i>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tải lên bằng chứng (png,
                                jpg)</span>
                            <input id="bank_evidence" type="file" multiple class="hidden">
                        </label>
                        <div class="flex gap-2">
                            <i class="fa-solid fa-circle-exclamation text-cs_orange text-[10px] mt-0.5"></i>
                            <p class="text-[10px] font-bold text-gray-400 italic leading-relaxed">Lưu ý: Bill chuyển khoản
                                rõ ràng và nội dung tin nhắn trao đổi sẽ giúp duyệt nhanh hơn.</p>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="space-y-2">
                        <label
                            class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Nội
                            dung tố cáo <span class="text-cs_red">*</span></label>
                        <textarea rows="5" placeholder="Họ lừa đảo bạn như thế nào? bao nhiêu tiền?..."
                            class="w-full px-4 py-4 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm font-medium text-gray-700 dark:text-gray-300 transition-all outline-none resize-none"></textarea>
                    </div>

                    <!-- Identity: Professional & Solid -->
                    <div class="pt-8 border-t border-gray-100 dark:border-gray-800">
                        <h3 class="text-xs font-black text-cs_blue uppercase tracking-[0.2em] mb-8">Thông tin người báo cáo
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Họ và tên của
                                    bạn <span class="text-cs_red">*</span></label>
                                <input type="text" placeholder="Nhập tên thật..."
                                    class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-800 rounded-md text-xs font-bold outline-none focus:border-cs_blue transition-all">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Zalo liên hệ
                                    <span class="text-cs_red">*</span></label>
                                <input type="text" placeholder="Số điện thoại Zalo..."
                                    class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-800 rounded-md text-xs font-bold outline-none focus:border-cs_blue transition-all">
                            </div>
                        </div>
                        <div class="mt-6">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" required
                                    class="w-4 h-4 rounded border-gray-300 text-cs_red focus:ring-0 cursor-pointer">
                                <span
                                    class="text-[11px] dark:text-gray-500 font-bold text-gray-600 uppercase leading-relaxed">
                                    Tôi đã đọc và đồng ý với các điều khoản báo cáo.
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="text-center pt-6">
                        <button type="submit"
                            class="w-full md:w-auto px-16 py-3 bg-cs_red text-white rounded font-black text-sm uppercase">
                            Gửi Duyệt
                        </button>
                    </div>
                </form>

                <!-- FORM WEBSITE -->
                <form id="form-website" action="#" method="POST" enctype="multipart/form-data"
                    class="hidden space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                        <div class="space-y-2">
                            <label
                                class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Link
                                Website <span class="text-cs_red">*</span></label>
                            <input type="url" name="web_url" required placeholder="https://domain-lua-dao.vn"
                                class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm text-gray-800 dark:text-white outline-none">
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Thể
                                loại lừa đảo <span class="text-cs_red">*</span></label>
                            <select name="category" required
                                class="w-full px-4 py-3.5 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm text-gray-800 dark:text-white outline-none cursor-pointer">
                                <option value="">Hãy chọn thể loại</option>
                                <option value="fake">Giả mạo thương hiệu</option>
                                <option value="bet">Cờ bạc, lô đề</option>
                                <option value="invest">Đầu tư đa cấp</option>
                                <option value="phish">Đánh cắp tài khoản</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label
                            class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Bằng
                            chứng (Screenshots) <span class="text-cs_red">*</span></label>
                        <label for="web_evidence"
                            class="flex flex-col items-center justify-center py-10 border-2 border-dashed border-gray-100 dark:border-gray-800 rounded-lg transition-all cursor-pointer hover:bg-gray-50 dark:hover:bg-slate-800">
                            <i class="fa-solid fa-images text-2xl text-gray-300 mb-2"></i>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest tracking-widest">Tải ảnh
                                chụp website</span>
                            <input id="web_evidence" type="file" multiple class="hidden">
                        </label>
                    </div>

                    <div class="space-y-2">
                        <label
                            class="text-[11px] font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest ml-1">Mô
                            tả dấu hiệu lừa đảo <span class="text-cs_red">*</span></label>
                        <textarea rows="5" placeholder="Mô tả cách thức lừa đảo của trang web này..."
                            class="w-full px-4 py-4 bg-gray-50 dark:bg-slate-800 border border-gray-200 dark:border-gray-700 rounded-md focus:border-cs_blue focus:ring-0 text-sm font-medium text-gray-700 dark:text-gray-300 transition-all outline-none resize-none"></textarea>
                    </div>

                    <div class="text-center pt-6">
                        <button type="submit"
                            class="w-full md:w-auto px-16 py-4 bg-cs_red hover:bg-black text-white rounded font-black text-sm tracking-widest shadow-lg transition-all active:scale-95 uppercase">
                            Gửi báo cáo website
                        </button>
                    </div>
                </form>
            </div>



        </div>
    </main>

    <style>
        .tab-active-checkscam {
            color: #ff0000;
            border-bottom-color: #ff0000;
        }

        .dark .tab-active-checkscam {
            color: #ff3333;
            border-bottom-color: #ff3333;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out forwards;
        }
    </style>

    <script>
        function switchTab(type) {
            const formBank = document.getElementById('form-bank');
            const formWebsite = document.getElementById('form-website');
            const tabBank = document.getElementById('tab-bank');
            const tabWebsite = document.getElementById('tab-website');

            const activeClass = 'tab-active-checkscam';
            const inactiveText = ['text-gray-400', 'dark:text-gray-600'];

            if (type === 'bank') {
                formBank.classList.remove('hidden');
                formWebsite.classList.add('hidden');
                tabBank.classList.add(activeClass);
                tabBank.classList.remove(...inactiveText);
                tabWebsite.classList.remove(activeClass);
                tabWebsite.classList.add(...inactiveText);
            } else {
                formBank.classList.add('hidden');
                formWebsite.classList.remove('hidden');
                tabWebsite.classList.add(activeClass);
                tabWebsite.classList.remove(...inactiveText);
                tabBank.classList.remove(activeClass);
                tabBank.classList.add(...inactiveText);
            }
        }
    </script>
@endsection

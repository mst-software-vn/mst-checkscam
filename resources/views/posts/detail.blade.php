@extends('layouts.app')

@section('title', 'Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS giả mạo ngân hàng - CheckScam.VN')

@section('content')
    <main class="min-h-screen dark:bg-dark_bg py-10 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- SEO Breadcrumbs -->
            <nav class="flex mb-10 text-[10px] md:text-xs font-bold uppercase tracking-widest text-gray-400"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2 md:space-x-4 overflow-x-auto whitespace-nowrap pb-1">
                    <li class="inline-flex items-center">
                        <a href="/" class="hover:text-cs_red transition-colors flex items-center gap-1.5"><i
                                class="fa-solid fa-house"></i> Trang chủ</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-1 text-[8px] text-gray-300"></i>
                        <a href="/bai-viet" class="hover:text-cs_red transition-colors ml-2">Cẩm nang phòng lừa</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-1 text-[8px] text-gray-300"></i>
                        <span class="text-gray-900 dark:text-gray-200 ml-2 italic">Chi tiết bài viết</span>
                    </li>
                </ol>
            </nav>

            <!-- Main Layout: Content + Sidebar -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 xl:gap-16">

                <!-- Main Content (8/12) -->
                <div class="lg:col-span-8">
                    <article
                        class="bg-white dark:bg-slate-900 rounded-[35px] border border-gray-100 dark:border-gray-800 shadow-none overflow-hidden hover:border-cs_red/30 transition-colors duration-500">
                        <header class="p-8 md:p-12 pb-2">
                            <div class="flex flex-wrap items-center gap-4 mb-8">
                                <span
                                    class="px-3.5 py-1 bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-[9px] font-black uppercase rounded-lg tracking-widest border border-white/10">
                                    Cảnh báo bảo mật
                                </span>
                                <time datetime="2026-03-07"
                                    class="text-[10px] font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar"></i> Đăng lúc: 07/03/2026
                                </time>
                            </div>

                            <h1
                                class="text-3xl md:text-5xl font-black text-gray-800 dark:text-white uppercase tracking-tighter leading-tight mb-10">
                                Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và tin nhắn SMS giả mạo ngân hàng 2026
                            </h1>

                            <div
                                class="flex items-center gap-4 border-t border-gray-50 dark:border-gray-800 pt-8 mt-4 mb-4">
                                <img src="https://ui-avatars.com/api/?name=Admin&background=random"
                                    class="w-12 h-12 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800"
                                    alt="Admin CheckScam">
                                <div>
                                    <p
                                        class="text-[11px] font-black text-gray-800 dark:text-white uppercase tracking-widest">
                                        Viết bởi: Admin</p>
                                    <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mt-1 italic">Quản
                                        trị viên hạ tầng CheckScam</p>
                                </div>
                                <div class="ml-auto hidden sm:flex gap-2">
                                    <button
                                        class="w-10 h-10 border border-gray-100 dark:border-gray-800 text-gray-400 rounded-xl flex items-center justify-center hover:bg-[#1877F2] hover:text-white transition-all text-xs">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </button>
                                    <button
                                        class="w-10 h-10 border border-gray-100 dark:border-gray-800 text-gray-400 rounded-xl flex items-center justify-center hover:bg-black hover:text-white transition-all text-xs">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </button>
                                </div>
                            </div>
                        </header>

                        <!-- Featured Media Section -->
                        <div class="px-8 md:px-12 mb-10">
                            <figure
                                class="relative rounded-3xl overflow-hidden aspect-video border border-gray-50 dark:border-gray-800 group">
                                <img src="https://i.ibb.co/680L9399/post1.jpg"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
                                    alt="Scam SMS Image">
                                <div
                                    class="absolute inset-x-0 bottom-0 bg-linear-to-t from-black/60 to-transparent p-6 text-white text-[10px] font-bold italic translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                    Minh họa tin nhắn giả mạo Vietcombank lừa đảo người dùng nhấn vào liên kết độc hại.
                                </div>
                            </figure>
                        </div>

                        <!-- Content Body -->
                        <div
                            class="p-8 md:p-12 pt-0 text-gray-700 dark:text-gray-300 leading-relaxed font-semibold text-sm md:text-base selection:bg-cs_red selection:text-white prose dark:prose-invert max-w-none">
                            <p class="mb-6 indent-8">
                                Kính gửi toàn thể cộng đồng đang sử dụng hệ thống <span
                                    class="text-cs_red font-black">CheckScam.VN</span>, hôm nay chúng tôi xin báo động một
                                chiến dịch lừa đảo cực kỳ quy mô và tinh vi đang diễn ra nhắm vào hàng loạt ngân hàng lớn
                                như Vietcombank, Techcombank, VPBank, MBBank...
                            </p>

                            <h2
                                class="text-xl md:text-2xl font-black text-gray-800 dark:text-white uppercase tracking-tight mb-6 mt-12 flex items-center gap-3">
                                <span class="w-1 h-8 bg-cs_red rounded-full"></span>
                                Thủ đoạn: Ghi đè sóng iMessage/SMS Brandname
                            </h2>
                            <p class="mb-6">
                                Kẻ xấu không sử dụng một số điện thoại rác thông thường. Thay vào đó, chúng triển khai các
                                trạm phát sóng di động giả lập. Điều này cho phép chúng gửi tin nhắn trực tiếp vào luồng tin
                                nhắn chính thống mà ngân hàng hay gửi cho bạn (Brandname).
                            </p>

                            <div
                                class="bg-gray-50 dark:bg-slate-800/50 p-6 md:p-8 rounded-2xl border-l-4 border-cs_red italic font-black text-cs_red mb-8">
                                "Cảnh báo khẩn cấp: Tài khoản ngân hàng của bạn đang gặp rủi ro bảo mật do đăng nhập từ Thái
                                Lan. Xác thực ngay tại: vietcombank-verify-99.com để tránh bị phong tỏa."
                            </div>

                            <h2
                                class="text-xl md:text-2xl font-black text-gray-800 dark:text-white uppercase tracking-tight mb-6 mt-12 flex items-center gap-3">
                                <span class="w-1 h-8 bg-cs_red rounded-full"></span>
                                Các bước xử lý khi nhận được tin nhắn lạ
                            </h2>
                            <ul class="space-y-4 mb-10 list-inside list-disc marker:text-cs_red">
                                <li><strong>Tuyệt đối không nhấn vào link:</strong> Ngân hàng không bao giờ gửi link yêu cầu
                                    đăng nhập Pass/OTP qua tin nhắn.</li>
                                <li><strong>Kiểm tra tên miền (Domain):</strong> Link thật thường chỉ là tên miền cấp 1
                                    chính xác (`vietcombank.com.vn`), không bao giờ có thêm các ký tự `-security`,
                                    `-verify`, `.cc`, `.tk`.</li>
                                <li><strong>Liên hệ tổng đài:</strong> Nếu nghi ngờ, hãy gọi trực tiếp số điện thoại ở mặt
                                    sau thẻ ATM của bạn.</li>
                            </ul>

                            <hr class="border-gray-50 dark:border-gray-800 my-10">

                            <p class="text-center italic text-cs_red font-black text-lg tracking-widest uppercase">
                                Bảo vệ bạn là sứ mệnh của chúng tôi!
                            </p>
                        </div>

                        <!-- Footer Article -->
                        <footer
                            class="p-8 md:p-12 pt-6 bg-gray-50/50 dark:bg-slate-800/20 border-t border-gray-100 dark:border-gray-800">
                            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Từ
                                        khóa:</span>
                                    <a href="#"
                                        class="px-2.5 py-1 bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-lg text-[9px] font-black uppercase text-gray-400 hover:text-cs_red hover:border-cs_red transition-all">Lừa
                                        đảo SMS</a>
                                    <a href="#"
                                        class="px-2.5 py-1 bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-lg text-[9px] font-black uppercase text-gray-400 hover:text-cs_red hover:border-cs_red transition-all">An
                                        toàn ngân hàng</a>
                                </div>
                                <div class="flex items-center gap-4">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-wide">Chia sẻ lên
                                        Facebook để cảnh báo cộng đồng:</span>
                                    <a href="#"
                                        class="w-9 h-9 bg-[#1877F2] text-white rounded-full flex items-center justify-center text-sm shadow-md transition-transform hover:-translate-y-1"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                </div>
                            </div>
                        </footer>
                    </article>

                    <!-- Nav Post -->
                    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="#"
                            class="p-6 bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-gray-800 group transition-colors hover:border-cs_red/30">
                            <p
                                class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 group-hover:text-cs_red">
                                Bài viết trước</p>
                            <h4
                                class="text-xs font-black text-gray-800 dark:text-white uppercase leading-tight line-clamp-1 italic">
                                Cách bảo mật 2 lớp cho ví điện tử Momo...</h4>
                        </a>
                        <a href="#"
                            class="p-6 bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-gray-800 text-right group transition-colors hover:border-cs_red/30">
                            <p
                                class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 group-hover:text-cs_red">
                                Bài viết tiếp theo</p>
                            <h4
                                class="text-xs font-black text-gray-800 dark:text-white uppercase leading-tight line-clamp-1 italic">
                                Top 10 sàn giao dịch uy tín 2026...</h4>
                        </a>
                    </div>
                </div>

                <!-- Sidebar (4/12) -->
                <aside class="lg:col-span-4 space-y-10">
                    <!-- Search Form SEO -->
                    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-8">
                        <h4
                            class="text-[11px] font-black text-gray-800 dark:text-white uppercase tracking-widest mb-6 border-l-4 border-cs_red pl-4">
                            Khám phá cẩm nang</h4>
                        <div class="relative">
                            <input type="text" placeholder="Tìm kiếm ngay..."
                                class="w-full bg-gray-50 dark:bg-slate-800/50 border-none rounded-2xl py-4 pl-12 pr-4 text-xs font-bold focus:ring-1 focus:ring-cs_red transition-all">
                            <i
                                class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Side Posts Widget -->
                    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-gray-100 dark:border-gray-800 p-8">
                        <h4
                            class="text-[11px] font-black text-gray-800 dark:text-white uppercase tracking-widest mb-6 border-l-4 border-cs_red pl-4">
                            Cập nhật nóng hổi</h4>
                        <div class="space-y-8">
                            @for ($i = 0; $i < 4; $i++)
                                <a href="#" class="group flex gap-4">
                                    <div
                                        class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-gray-100 dark:bg-slate-800 border border-gray-50 dark:border-gray-800">
                                        <img src="https://i.ibb.co/3mbm8X9P/post2.jpg"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                            alt="side post">
                                    </div>
                                    <div class="flex-1">
                                        <h5
                                            class="text-[11px] font-black text-gray-800 dark:text-white uppercase leading-snug group-hover:text-cs_red transition-colors line-clamp-2 italic">
                                            Hướng dẫn tra cứu nhanh stk lừa đảo trên mobile app...</h5>
                                        <time
                                            class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mt-1 block">02/03/2026</time>
                                    </div>
                                </a>
                            @endfor
                        </div>
                    </div>

                    <!-- Safety Widget -->
                    <div class="bg-gray-900 rounded-3xl p-8 relative overflow-hidden group border border-white/5">
                        <div
                            class="absolute inset-x-0 bottom-0 h-1 bg-cs_red scale-x-0 group-hover:scale-x-100 transition-transform duration-700">
                        </div>
                        <div class="relative z-10 text-center">
                            <div
                                class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-6 transform group-hover:rotate-12 transition-transform">
                                <i class="fa-solid fa-user-ninja text-3xl text-cs_red"></i>
                            </div>
                            <h3 class="text-white text-lg font-black uppercase tracking-tight mb-4">Bạn đang bị đòi tiền?
                            </h3>
                            <p class="text-gray-400 text-[11px] font-semibold italic mb-8 mx-auto max-w-[200px]">Hãy gửi
                                thông tin cho Admin để được hỗ trợ cảnh báo khẩn cấp!</p>
                            <a href="/to-cao-lua-dao"
                                class="block w-full py-4 bg-cs_red hover:bg-red-600 text-white font-black uppercase tracking-widest rounded-2xl transition-all shadow-none active:scale-[0.98] text-[10px]">Tố
                                cáo ngay lập tức</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>


@endsection

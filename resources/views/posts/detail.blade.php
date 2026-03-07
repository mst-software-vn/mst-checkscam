@extends('layouts.app')

@section('title', 'Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS giả mạo ngân hàng - CheckScam.VN')

@section('content')
    <!-- Reading Progress Bar -->
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-cs_blue z-100 transition-all duration-300 ease-out"
        style="width: 0%; z-index: 9999;"></div>

    <main class="bg-gray-50/30 dark:bg-dark_bg pb-20">
        <!-- Breadcrumb & Category Header -->
        <div class="bg-white dark:bg-dark_card border-b border-gray-100 dark:border-gray-800 py-4 mb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="flex items-center text-[11px] font-bold uppercase tracking-wider text-gray-400">
                    <ol class="inline-flex items-center space-x-2">
                        <li><a href="/" class="hover:text-cs_blue transition-colors">Trang chủ</a></li>
                        <li><i class="fa-solid fa-chevron-right text-[8px] mx-1"></i></li>
                        <li><a href="/bai-viet" class="hover:text-cs_blue transition-colors uppercase">Kiến thức MMO</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-right text-[8px] mx-1"></i></li>
                        <li class="text-cs_blue truncate max-w-[200px] md:max-w-none">Bảo mật tài khoản</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Content: Post Detail -->
                <article class="w-full lg:w-8/12">
                    <div
                        class="bg-white dark:bg-dark_card rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 shadow-xs">
                        <!-- Post Header -->
                        <header class="p-6 md:p-10 border-b border-gray-50 dark:border-gray-800/50">
                            <div class="flex items-center gap-3 mb-4">
                                <span
                                    class="px-2.5 py-1 bg-blue-50 dark:bg-blue-900/20 text-cs_blue text-[10px] font-black uppercase tracking-wider rounded">Security</span>
                                <span class="text-gray-400 text-[10px] font-bold uppercase tracking-wider">
                                    <i class="fa-regular fa-clock mr-1"></i> 7 phút đọc
                                </span>
                            </div>

                            <h1 class="text-2xl md:text-4xl font-black text-gray-900 dark:text-white leading-tight mb-6">
                                Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS ngân hàng 2026
                            </h1>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Admin&background=0068FF&color=fff"
                                        class="w-10 h-10 rounded-full border border-gray-100 dark:border-gray-800"
                                        alt="Author">
                                    <div class="text-left">
                                        <p class="text-gray-900 dark:text-white font-bold text-sm">Võ Xuân Sang</p>
                                        <p class="text-gray-400 text-[10px] font-medium uppercase tracking-tighter">Cập
                                            nhật: 07/03/2026</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button onclick="copyToClipboard()"
                                        class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-50 dark:bg-slate-800 text-gray-400 hover:text-cs_blue transition-colors"
                                        title="Copy link">
                                        <i class="fa-solid fa-link text-xs"></i>
                                    </button>
                                    <a href="#"
                                        class="w-8 h-8 flex items-center justify-center rounded-full bg-[#1877F2]/10 text-[#1877F2] hover:bg-[#1877F2] hover:text-white transition-all">
                                        <i class="fa-brands fa-facebook-f text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </header>

                        <!-- Featured Image -->
                        <div class="aspect-video relative overflow-hidden">
                            <img src="https://i.ibb.co/680L9399/post1.jpg" class="w-full h-full object-cover"
                                alt="Lừa đảo iMessage">
                        </div>

                        <!-- Post Body -->
                        <div class="p-6 md:p-10">
                            <section
                                class="prose prose-blue max-w-none dark:prose-invert
                                prose-headings:font-black prose-headings:text-gray-900 dark:prose-headings:text-white
                                prose-p:text-gray-600 dark:prose-p:text-gray-400 prose-p:leading-[1.8]
                                prose-strong:text-gray-900 dark:prose-strong:text-white
                                prose-img:rounded-xl prose-img:border prose-img:border-gray-100 dark:prose-img:border-gray-800">

                                <p
                                    class="text-lg md:text-xl font-bold text-gray-800 dark:text-gray-200 leading-relaxed italic mb-8 border-l-4 border-cs_blue pl-6">
                                    Kính gửi cộng đồng CheckScam.VN, bài viết này phân tích sâu về chiến dịch tấn công giả
                                    mạo ngân hàng đang bùng nổ trong quý đầu năm 2026 thông qua các trạm BTS giả.
                                </p>

                                <p>
                                    Hiện nay, tội phạm mạng không còn dừng lại ở việc gửi link lừa đảo thông thường mà đã
                                    bắt đầu ứng dụng các trạm thu phát sóng di động bất hợp pháp. Điều này giúp chúng vượt
                                    qua được các bộ lọc tin nhắn rác của nhà mạng một cách dễ dàng, khiến nạn nhân khó lòng
                                    phân biệt.
                                </p>

                                <h2 class="text-2xl mt-10 mb-4">Thủ đoạn: Ghi đè sóng iMessage/SMS Brandname</h2>
                                <p>
                                    Thay vì dùng SIM rác như trước đây, kẻ xấu dùng thiết bị công nghệ cao để "chèn" tin
                                    nhắn vào luồng
                                    tin nhắn thật của ngân hàng. Khi bạn mở ứng dụng tin nhắn, bạn sẽ thấy tin nhắn lừa đảo
                                    nằm ngay bên dưới các giao dịch thông báo số dư thật, tạo lòng tin tuyệt đối cho người
                                    dùng.
                                </p>

                                <div class="bg-red-50 dark:bg-red-900/10 border-l-4 border-cs_red p-6 my-8 rounded-r-xl">
                                    <p class="text-cs_red font-bold text-sm mb-2 uppercase tracking-widest"><i
                                            class="fa-solid fa-triangle-exclamation mr-2"></i>Mẫu tin nhắn giả mạo:</p>
                                    <p class="text-gray-700 dark:text-gray-300 italic font-medium">
                                        "Cảnh báo: Tài khoản ngân hàng của bạn đang gặp rủi ro bảo mật do đăng nhập lạ. Xác
                                        thực
                                        ngay tại website chính thức: vietcombank-verify-99.com để tránh bị phong tỏa."
                                    </p>
                                </div>

                                <div class="my-10">
                                    <img src="https://i.ibb.co/3mbm8X9P/post2.jpg" alt="Trạm BTS giả mạo" class="w-full">
                                    <p class="text-center text-xs text-gray-400 font-bold uppercase tracking-widest mt-4">
                                        Hình ảnh: Trạm BTS giả bị cơ quan công an thu giữ
                                    </p>
                                </div>

                                <h2 class="text-2xl mt-10 mb-4">Quy tắc vàng 3 KHÔNG để an toàn</h2>
                                <p>Để không trở thành nạn nhân của các chiêu trò này, hãy ghi nhớ các nguyên tắc cốt lõi
                                    sau:</p>

                                <ul class="list-none space-y-4 pl-0">
                                    <li
                                        class="flex items-start gap-4 p-4 bg-gray-50 dark:bg-slate-800/50 rounded-xl border border-gray-100 dark:border-gray-800">
                                        <span
                                            class="w-8 h-8 shrink-0 bg-cs_blue text-white rounded-lg flex items-center justify-center text-xs font-black">01</span>
                                        <div>
                                            <strong class="text-gray-900 dark:text-white block mb-1">KHÔNG nhấp vào đường
                                                link:</strong>
                                            <span class="text-sm">Ngân hàng thật sự không bao giờ yêu cầu khách hàng đăng
                                                nhập qua liên kết gửi trong SMS/iMessage.</span>
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-start gap-4 p-4 bg-gray-50 dark:bg-slate-800/50 rounded-xl border border-gray-100 dark:border-gray-800">
                                        <span
                                            class="w-8 h-8 shrink-0 bg-cs_blue text-white rounded-lg flex items-center justify-center text-xs font-black">02</span>
                                        <div>
                                            <strong class="text-gray-900 dark:text-white block mb-1">KHÔNG cung cấp mã
                                                OTP:</strong>
                                            <span class="text-sm">Mã OTP là lớp bảo vệ cuối cùng của tài khoản, tuyệt đối
                                                không chia sẻ cho bất kỳ ai, kể cả người tự xưng là nhân viên ngân
                                                hàng.</span>
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-start gap-4 p-4 bg-gray-50 dark:bg-slate-800/50 rounded-xl border border-gray-100 dark:border-gray-800">
                                        <span
                                            class="w-8 h-8 shrink-0 bg-cs_blue text-white rounded-lg flex items-center justify-center text-xs font-black">03</span>
                                        <div>
                                            <strong class="text-gray-900 dark:text-white block mb-1">KHÔNG hoảng
                                                sợ:</strong>
                                            <span class="text-sm">Kẻ lừa đảo luôn dùng tâm lý đe dọa. Khi nhận tin nhắn dọa
                                                khóa tài khoản, hãy bình tĩnh gọi trực tiếp cho tổng đài ngân hàng niêm yết
                                                trên thẻ/website chính thống.</span>
                                        </div>
                                    </li>
                                </ul>

                                <div
                                    class="mt-12 p-8 bg-slate-900 dark:bg-dark_bg rounded-2xl text-center relative overflow-hidden border border-slate-800">
                                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-cs_blue/10 rounded-full blur-3xl">
                                    </div>
                                    <h3 class="text-white text-xl font-black mb-4 uppercase tracking-tight">Cộng đồng
                                        CheckScam cần bạn!</h3>
                                    <p class="text-slate-400 text-sm mb-8 max-w-md mx-auto leading-relaxed">
                                        Hãy chung tay bảo vệ cộng đồng MMO Việt Nam bằng cách báo cáo ngay các hành vi lừa
                                        đảo mà bạn gặp phải.
                                    </p>
                                    <a href="/to-cao-lua-dao"
                                        class="inline-flex items-center gap-3 px-8 py-3.5 bg-cs_blue text-white font-black uppercase text-[11px] tracking-widest rounded-xl hover:bg-blue-600 transition-all shadow-lg shadow-blue-900/20">
                                        Gửi đơn tố cáo ngay
                                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                    </a>
                                </div>
                            </section>

                            <!-- Tags -->
                            <div class="mt-12 flex flex-wrap gap-2 pt-8 border-t border-gray-50 dark:border-gray-800">
                                <span class="text-gray-400 text-[10px] font-bold uppercase tracking-wider mr-2">Tags:</span>
                                <a href="#"
                                    class="px-3 py-1 bg-gray-100 dark:bg-slate-800 text-gray-600 dark:text-gray-400 text-[10px] font-bold rounded-lg hover:bg-cs_blue hover:text-white transition-colors uppercase">Bảo
                                    mật</a>
                                <a href="#"
                                    class="px-3 py-1 bg-gray-100 dark:bg-slate-800 text-gray-600 dark:text-gray-400 text-[10px] font-bold rounded-lg hover:bg-cs_blue hover:text-white transition-colors uppercase">Cảnh
                                    báo</a>
                                <a href="#"
                                    class="px-3 py-1 bg-gray-100 dark:bg-slate-800 text-gray-600 dark:text-gray-400 text-[10px] font-bold rounded-lg hover:bg-cs_blue hover:text-white transition-colors uppercase">MMO
                                    2026</a>
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Articles -->
                    <div class="mt-12">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-1 h-6 bg-cs_blue rounded-full"></div>
                            <h2 class="text-lg font-black text-gray-800 dark:text-white uppercase tracking-tight">Bài viết
                                liên quan</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @for ($i = 1; $i <= 2; $i++)
                                <a href="#"
                                    class="group bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 p-4 rounded-xl flex gap-4 hover:border-cs_blue/30 transition-all shadow-xs">
                                    <div
                                        class="w-24 h-24 shrink-0 rounded-lg overflow-hidden border border-gray-50 dark:border-gray-800">
                                        <img src="https://i.ibb.co/680L9399/post1.jpg"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                            alt="Related">
                                    </div>
                                    <div class="flex flex-col justify-between py-1">
                                        <h3
                                            class="font-bold text-gray-800 dark:text-gray-100 text-[13px] leading-tight group-hover:text-cs_blue transition-colors line-clamp-2 italic">
                                            Cách nhận diện website giả mạo các sàn giao dịch crypto...
                                        </h3>
                                        <span
                                            class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-2">12/03/2026</span>
                                    </div>
                                </a>
                            @endfor
                        </div>
                    </div>
                </article>

                <!-- Right Content: Sidebar -->
                <aside class="w-full lg:w-4/12 space-y-6">
                    <!-- Ads Section 1 -->
                    <div
                        class="aspect-square border border-gray-200 dark:border-gray-800 shadow-xs rounded-2xl overflow-hidden bg-white dark:bg-white group">
                        <a href="#" target="_blank" class="w-full h-full block">
                            <img src="https://i.ibb.co/kgwtn4vF/fpayment.jpg"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                alt="Fpayment Ads">
                        </a>
                    </div>

                    <!-- Newsletter Widget -->
                    <div
                        class="bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 p-8 rounded-2xl shadow-xs">
                        <div
                            class="w-12 h-12 bg-blue-50 dark:bg-blue-900/20 text-cs_blue rounded-xl flex items-center justify-center mb-6">
                            <i class="fa-regular fa-paper-plane text-xl"></i>
                        </div>
                        <h4 class="font-black text-gray-900 dark:text-white text-lg mb-2 uppercase tracking-tight">Stay
                            Alert!</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-xs leading-relaxed mb-6 italic">
                            Nhận thông báo về các thủ đoạn lừa đảo mới nhất định kỳ qua Email của bạn.
                        </p>
                        <div class="space-y-3">
                            <input type="email" placeholder="Nhập email của bạn..."
                                class="w-full bg-gray-50 dark:bg-slate-800/50 border border-gray-100 dark:border-gray-800 rounded-xl py-3 px-4 text-xs font-bold focus:ring-1 focus:ring-cs_blue transition-all outline-none">
                            <button
                                class="w-full py-3 bg-cs_blue text-white font-black text-[10px] uppercase tracking-widest rounded-xl hover:bg-blue-600 transition-all shadow-lg shadow-blue-100 dark:shadow-none">
                                Đăng ký ngay
                            </button>
                        </div>
                    </div>

                    <!-- Popular Posts Widget -->
                    <div
                        class="bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 rounded-2xl shadow-xs overflow-hidden">
                        <div class="p-5 border-b border-gray-50 dark:border-gray-800">
                            <h4
                                class="font-black text-gray-900 dark:text-white text-xs uppercase tracking-[0.2em] flex items-center gap-2">
                                <span class="w-1 h-4 bg-cs_blue rounded-full"></span>
                                Top đọc nhiều
                            </h4>
                        </div>
                        <div class="divide-y divide-gray-50 dark:divide-gray-800">
                            @for ($i = 1; $i <= 4; $i++)
                                <a href="#"
                                    class="flex items-start gap-4 p-5 hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors group">
                                    <span
                                        class="text-2xl font-black text-gray-100 dark:text-gray-800 group-hover:text-cs_blue/20 transition-colors">0{{ $i }}</span>
                                    <div>
                                        <h5
                                            class="text-[12px] font-bold text-gray-800 dark:text-gray-200 group-hover:text-cs_blue transition-colors line-clamp-2 leading-snug mb-2 italic">
                                            Quy trình lấy lại tiền khi bị lừa đảo qua mạng xã hội...
                                        </h5>
                                        <div
                                            class="flex items-center gap-3 text-[9px] text-gray-400 font-bold uppercase tracking-tighter">
                                            <span>15.2k views</span>
                                        </div>
                                    </div>
                                </a>
                            @endfor
                        </div>
                    </div>

                    <!-- Ads Section 2 -->
                    <div
                        class="aspect-square border border-gray-200 dark:border-gray-800 shadow-xs rounded-2xl overflow-hidden bg-white dark:bg-white group">
                        <a href="#" target="_blank" class="w-full h-full block">
                            <img src="https://png.pngtree.com/png-clipart/20250126/original/pngtree-hologram-gradient-flash-sale-square-poster-banner-promotion-vector-png-image_19237469.png"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                alt="Special Promo">
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    <script>
        // Reading Progress Bar
        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("progress-bar").style.width = scrolled + "%";
        };

        function copyToClipboard() {
            navigator.clipboard.writeText(window.location.href);
            alert("Đã sao chép liên kết vào bộ nhớ tạm!");
        }
    </script>
@endsection

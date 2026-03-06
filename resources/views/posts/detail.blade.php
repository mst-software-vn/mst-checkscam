@extends('layouts.app')

@section('title', 'Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS giả mạo ngân hàng - CheckScam.VN')

@section('content')
    <!-- Reading Progress Bar -->
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-cs_red z-100 transition-all duration-150 ease-out"
        style="width: 0%"></div>

    <main class="min-h-screen bg-white dark:bg-[#0B0F1A] pt-12 pb-24">

        <!-- Article Header: Centered & Clean -->
        <header class="max-w-[800px] mx-auto px-6 text-center mb-12">
            <nav class="flex justify-center mb-8 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                <ol class="inline-flex items-center space-x-3">
                    <li><a href="/" class="hover:text-cs_red transition-colors">Home</a></li>
                    <li><span class="text-gray-200">/</span></li>
                    <li><a href="/bai-viet" class="hover:text-cs_red transition-colors">Security Blog</a></li>
                </ol>
            </nav>

            <div class="inline-flex items-center gap-3 mb-6">
                <span
                    class="px-3 py-1 bg-cs_red/10 text-cs_red text-[10px] font-bold uppercase tracking-widest rounded-full">Security
                    Alert</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">7 Min Read</span>
            </div>

            <h1
                class="text-4xl md:text-5xl lg:text-6xl font-black text-slate-900 dark:text-white leading-[1.15] tracking-tight mb-8">
                Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS ngân hàng 2026
            </h1>

            <div class="flex items-center justify-center gap-4">
                <img src="https://ui-avatars.com/api/?name=Admin&background=random"
                    class="w-10 h-10 rounded-full grayscale group-hover:grayscale-0 transition-all" alt="Author">
                <div class="text-left">
                    <p class="text-slate-900 dark:text-white font-bold text-sm">Võ Xuân Sang</p>
                    <p class="text-gray-400 text-xs font-medium">Published on March 07, 2026</p>
                </div>
            </div>
        </header>

        <!-- Featured Image: Wide but not full screen -->
        <div class="max-w-[1100px] mx-auto px-6 mb-16">
            <div
                class="relative rounded-[2.5rem] overflow-hidden aspect-[21/9] shadow-2xl shadow-slate-200 dark:shadow-none">
                <img src="https://i.ibb.co/680L9399/post1.jpg" class="w-full h-full object-cover" alt="Featured Image">
            </div>
        </div>

        <div class="max-w-[1280px] mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 relative">

                <!-- Floating Side Share (Sticky on the left) -->
                <div class="hidden lg:block lg:col-span-1">
                    <div
                        class="sticky top-32 flex flex-col items-center gap-6 pr-4 border-r border-gray-50 dark:border-slate-800">
                        <p class="text-[9px] font-bold text-gray-300 uppercase vertical-text tracking-[0.3em] mb-4">Sharing
                        </p>
                        <a href="#" class="text-gray-300 hover:text-[#1877F2] transition-colors text-lg"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"
                            class="text-gray-300 hover:text-black dark:hover:text-white transition-colors text-lg"><i
                                class="fa-brands fa-x-twitter"></i></a>
                        <a href="#"
                            class="text-gray-300 hover:text-[#0068FF] transition-colors font-bold text-[10px] uppercase">Zalo</a>
                        <button onclick="copyToClipboard()"
                            class="text-gray-300 hover:text-cs_red transition-colors text-lg"><i
                                class="fa-solid fa-link"></i></button>
                    </div>
                </div>

                <!-- Article Content + Mini Sidebar -->
                <div class="lg:col-span-11">
                    <div class="grid grid-cols-1 xl:grid-cols-12 gap-16">

                        <div class="xl:col-span-8">
                            <article
                                class="prose prose-lg dark:prose-invert max-w-none prose-headings:text-slate-900 dark:prose-headings:text-white prose-headings:font-black prose-p:text-slate-600 dark:prose-p:text-gray-400 prose-p:leading-relaxed prose-li:text-slate-600 dark:prose-li:text-gray-400 prose-img:rounded-3xl prose-blockquote:border-l-4 prose-blockquote:border-cs_red prose-blockquote:bg-slate-50 dark:prose-blockquote:bg-slate-900/50 prose-blockquote:rounded-r-2xl prose-blockquote:py-2">

                                <p class="text-2xl font-bold text-slate-900 dark:text-white leading-tight mb-12 italic">
                                    Kính gửi cộng đồng CheckScam.VN, bài viết này phân tích sâu về chiến dịch tấn công giả
                                    mạo ngân hàng đang bùng nổ trong quý đầu năm 2026.
                                </p>

                                <p>
                                    Hiện nay, tội phạm mạng không còn dừng lại ở việc gửi link lừa đảo thông thường mà đã
                                    bắt đầu ứng dụng các trạm thu phát sóng di động bất hợp pháp. Điều này giúp chúng vượt
                                    qua được các bộ lọc tin nhắn rác của nhà mạng.
                                </p>

                                <h2 class="text-3xl mt-12 mb-6">Thủ đoạn: Ghi đè sóng iMessage/SMS Brandname</h2>
                                <p>
                                    Thay vì dùng SIM rác, kẻ xấu dùng thiết bị công nghệ cao để "chèn" tin nhắn vào luồng
                                    tin nhắn thật của ngân hàng. Khi bạn mở ứng dụng tin nhắn, bạn sẽ thấy tin nhắn lừa đảo
                                    nằm ngay bên dưới các giao dịch thông báo số dư thật.
                                </p>

                                <blockquote>
                                    "Cảnh báo: Tài khoản ngân hàng của bạn đang gặp rủi ro bảo mật do đăng nhập lạ. Xác thực
                                    ngay tại website chính thức: vietcombank-verify-99.com để tránh bị phong tỏa."
                                </blockquote>

                                <div class="my-12">
                                    <img src="https://i.ibb.co/3mbm8X9P/post2.jpg" alt="BTS giả">
                                    <p
                                        class="text-center text-xs text-gray-400 font-bold uppercase tracking-widest mt-4 italic">
                                        Hình ảnh: Trạm BTS giả bị cơ quan công an thu giữ</p>
                                </div>

                                <h2 class="text-3xl mt-12 mb-6">Quy tắc vàng 3 KHÔNG</h2>
                                <ul class="list-none space-y-4 pl-0">
                                    <li class="flex items-start gap-4">
                                        <span
                                            class="w-6 h-6 shrink-0 bg-cs_red/10 text-cs_red rounded-full flex items-center justify-center text-xs font-bold">1</span>
                                        <span><strong>KHÔNG nhấp vào đường link:</strong> Mọi yêu cầu đăng nhập qua SMS đều
                                            là giả mạo.</span>
                                    </li>
                                    <li class="flex items-start gap-4">
                                        <span
                                            class="w-6 h-6 shrink-0 bg-cs_red/10 text-cs_red rounded-full flex items-center justify-center text-xs font-bold">2</span>
                                        <span><strong>KHÔNG cung cấp mã OTP:</strong> OTP là lớp bảo vệ cuối cùng, đừng bao
                                            giờ đưa cho ai, kể cả nhân viên ngân hàng.</span>
                                    </li>
                                    <li class="flex items-start gap-4">
                                        <span
                                            class="w-6 h-6 shrink-0 bg-cs_red/10 text-cs_red rounded-full flex items-center justify-center text-xs font-bold">3</span>
                                        <span><strong>KHÔNG hoảng sợ:</strong> Kẻ lừa đảo luôn dùng tâm lý đe dọa để bạn mất
                                            cảnh giác. Hãy tắt điện thoại và gọi lên tổng đài chính thức.</span>
                                    </li>
                                </ul>

                                <div class="mt-20 p-10 bg-slate-950 rounded-[3rem] text-center relative overflow-hidden">
                                    <div
                                        class="absolute top-0 right-0 w-64 h-64 bg-cs_red opacity-10 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2">
                                    </div>
                                    <h3 class="text-white text-3xl font-black mb-4">Bạn có thông tin về kẻ lừa đảo?</h3>
                                    <p class="text-slate-400 mb-8 max-w-md mx-auto">Hãy chung tay bảo vệ cộng đồng bằng cách
                                        gửi bằng chứng lừa đảo cho chúng tôi ngay hôm nay.</p>
                                    <a href="/to-cao-lua-dao"
                                        class="inline-flex items-center gap-3 px-8 py-4 bg-cs_red text-white font-black uppercase text-xs tracking-widest rounded-2xl hover:bg-white hover:text-slate-900 transition-all">
                                        Tố cáo ngay lập tức
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>

                            <!-- Author Card -->
                            <div class="mt-16 pt-12 border-t border-gray-100 dark:border-slate-800">
                                <div class="flex flex-col md:flex-row gap-8 items-center md:items-start">
                                    <img src="https://ui-avatars.com/api/?name=Admin&background=random"
                                        class="w-20 h-20 rounded-2xl grayscale" alt="Author">
                                    <div class="text-center md:text-left flex-1">
                                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
                                            <div>
                                                <h4 class="text-xl font-black text-slate-900 dark:text-white">Võ Xuân Sang
                                                </h4>
                                                <p class="text-cs_red text-[10px] font-bold uppercase tracking-widest">
                                                    Security Researcher</p>
                                            </div>
                                            <div class="flex justify-center gap-3 text-gray-300">
                                                <a href="#" class="hover:text-cs_red transition-all"><i
                                                        class="fa-brands fa-facebook-f"></i></a>
                                                <a href="#" class="hover:text-cs_red transition-all"><i
                                                        class="fa-brands fa-x-twitter"></i></a>
                                                <a href="#" class="hover:text-cs_red transition-all"><i
                                                        class="fa-solid fa-globe"></i></a>
                                            </div>
                                        </div>
                                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed italic">Chuyên
                                            gia nghiên cứu mã độc và các thủ đoạn Social Engineering với hơn 10 năm kinh
                                            nghiệm tại CheckScam.VN.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mini Sidebar -->
                        <div class="xl:col-span-4 lg:pl-4">
                            <div class="sticky top-32 space-y-12">
                                <div>
                                    <h5
                                        class="text-[10px] font-black text-slate-900 dark:text-white uppercase tracking-[0.2em] mb-8 flex items-center gap-3">
                                        <span class="w-8 h-[2px] bg-cs_red"></span>
                                        Popular
                                    </h5>
                                    <div class="space-y-8">
                                        @for ($i = 0; $i < 3; $i++)
                                            <a href="#" class="group block">
                                                <h6
                                                    class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-cs_red transition-colors line-clamp-2 leading-snug mb-2 italic">
                                                    Tra cứu nhanh số tài khoản lừa đảo...</h6>
                                                <div
                                                    class="flex items-center gap-3 text-[9px] text-gray-400 font-bold uppercase">
                                                    <span>05 Mar 2026</span>
                                                    <span class="w-1 h-1 bg-gray-200 rounded-full"></span>
                                                    <span>12.5k views</span>
                                                </div>
                                            </a>
                                        @endfor
                                    </div>
                                </div>

                                <div
                                    class="bg-slate-50 dark:bg-slate-900/50 p-8 rounded-[2rem] border border-gray-100 dark:border-slate-800">
                                    <h5
                                        class="text-[10px] font-black text-slate-900 dark:text-white uppercase tracking-widest mb-6">
                                        Stay Alert</h5>
                                    <p class="text-gray-400 text-xs leading-relaxed mb-6 italic">Nhận tin cảnh báo bảo mật
                                        mới nhất hàng ngày qua email.</p>
                                    <div class="space-y-3">
                                        <input type="email" placeholder="Your Email..."
                                            class="w-full bg-white dark:bg-slate-800 border-none rounded-xl py-4 px-5 text-sm font-medium focus:ring-1 focus:ring-cs_red transition-all">
                                        <button
                                            class="w-full py-4 bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-black text-[10px] uppercase tracking-widest rounded-xl hover:bg-cs_red hover:text-white transition-all">Keep
                                            me safe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .vertical-text {
            writing-mode: tb-rl;
            transform: rotate(-180deg);
        }
    </style>

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

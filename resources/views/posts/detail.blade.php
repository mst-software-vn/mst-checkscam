@extends('layouts.app')

@section('title', 'Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS giả mạo ngân hàng - CheckScam.VN')

@section('content')
    <!-- Reading Progress Bar -->
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-cs_blue z-[9999] transition-all duration-300 ease-out"
        style="width: 0%"></div>

    <main class="bg-gray-50/40 dark:bg-dark_bg pb-24">
        <x-breadcrumb :links="[
            ['name' => 'Kiến thức MMO', 'url' => '/bai-viet'],
            [
                'name' => 'Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS giả mạo ngân hàng 2026',
                'url' => '/bai-viet/lat-tay-chieu-to-lua-dao-qua-tin-nhanh-imessage-va-sms-gia-mao-ngan-hang-2026',
            ],
        ]" />
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-6">

                <!-- 1. LEFT: Floating Sticky Share (Hidden on Mobile) -->
                <aside class="hidden xl:block w-[60px] shrink-0">
                    <div class="sticky top-32 flex flex-col items-center gap-3">
                        <p
                            class="text-[9px] font-black text-gray-300 dark:text-gray-600 uppercase vertical-text tracking-[0.3em] mb-4">
                            Sharing</p>

                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/90 dark:bg-dark_card border border-gray-100 dark:border-gray-800 text-gray-400 hover:text-[#1877F2] hover:border-[#1877F2]/30 hover:shadow-lg hover:shadow-[#1877F2]/10 transition-all group">
                            <i class="fa-brands fa-facebook-f text-sm group-hover:scale-110 transition-transform"></i>
                        </a>

                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/90 dark:bg-dark_card border border-gray-100 dark:border-gray-800 text-gray-400 hover:text-cs_blue hover:border-cs_blue/30 hover:shadow-lg hover:shadow-blue-500/10 transition-all group">
                            <i class="fa-brands fa-telegram text-sm group-hover:scale-110 transition-transform"></i>
                        </a>

                        <button onclick="copyToClipboard()"
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/90 dark:bg-dark_card border border-gray-100 dark:border-gray-800 text-gray-400 hover:text-cs_blue hover:border-cs_blue/30 hover:shadow-lg hover:shadow-blue-500/10 transition-all group">
                            <i class="fa-solid fa-link text-sm group-hover:scale-110 transition-transform"></i>
                        </button>

                        <div class="w-[1px] h-12 bg-gray-300 dark:bg-gray-800 mt-4"></div>

                        <div class="flex flex-col items-center gap-1">
                            <span class="text-[14px] font-black text-gray-900 dark:text-white">1.2k</span>
                            <span class="text-[8px] font-bold text-gray-400 uppercase tracking-tighter">Views</span>
                        </div>
                    </div>
                </aside>

                <!-- 2. CENTER: Main Content -->
                <article class="flex-1 min-w-0">
                    <div
                        class="bg-white dark:bg-dark_card rounded-3xl overflow-hidden border border-gray-100 dark:border-gray-800/80 shadow-xs">
                        <!-- Post Header -->
                        <header class="p-8 md:p-8 border-b border-gray-50 dark:border-gray-800/40">
                            <div class="flex items-center gap-3 mb-6">
                                <span
                                    class="px-3 py-1 bg-blue-50 dark:bg-blue-900/20 text-cs_blue text-[10px] font-black uppercase tracking-widest rounded-lg border border-blue-100/50 dark:border-blue-900/30">
                                    <i class="fa-solid fa-shield-halved mr-1"></i> Security Alert
                                </span>
                                <span class="w-1 h-1 bg-gray-200 dark:bg-gray-700 rounded-full"></span>
                                <span
                                    class="text-gray-400 dark:text-gray-500 text-[10px] font-bold uppercase tracking-widest">
                                    7 Min Read
                                </span>
                            </div>

                            <h1
                                class="text-3xl md:text-5xl font-black text-gray-900 dark:text-white leading-[1.2] tracking-tight mb-8">
                                Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS ngân hàng 2026
                            </h1>

                            <div class="flex items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="relative">
                                        <img src="https://ui-avatars.com/api/?name=Admin&background=0068FF&color=fff"
                                            class="w-12 h-12 rounded-2xl border-2 border-white dark:border-gray-800 shadow-sm"
                                            alt="Author">
                                        <div
                                            class="absolute -bottom-1 -right-1 w-4 h-4 bg-cs_blue rounded-full border-2 border-white dark:border-gray-900 flex items-center justify-center">
                                            <i class="fa-solid fa-check text-white text-[6px]"></i>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-gray-900 dark:text-white font-black text-sm md:text-base">Võ Xuân
                                            Sang</p>
                                        <div
                                            class="flex items-center gap-2 text-[10px] text-gray-400 font-bold uppercase tracking-tighter">
                                            <span>Security Researcher</span>
                                            <span class="w-1 h-1 bg-gray-200 dark:bg-gray-700 rounded-full"></span>
                                            <span>March 07, 2026</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden sm:flex items-center gap-2">
                                    <div class="text-right mr-3">
                                        <p class="text-[10px] text-gray-400 font-bold uppercase">Đánh giá bài viết</p>
                                        <div class="flex text-cs_orange text-[10px] gap-0.5">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>

                        <!-- Featured Image -->
                        <div class="relative group overflow-hidden">
                            <img src="https://i.ibb.co/680L9399/post1.jpg" class="w-full aspect-[21/9] object-cover"
                                alt="Featured Image">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>

                        <!-- Post Body -->
                        <div class="p-8 md:p-14">
                            <section
                                class="prose prose-blue max-w-none dark:prose-invert
                                prose-headings:font-black prose-headings:text-gray-900 dark:prose-headings:text-white prose-headings:tracking-tight
                                prose-p:text-gray-600 dark:prose-p:text-gray-400 prose-p:leading-[1.9] prose-p:text-[16px] md:prose-p:text-[17px]
                                prose-strong:text-gray-800 dark:prose-strong:text-white prose-strong:font-black
                                prose-img:rounded-2xl prose-img:shadow-sm prose-img:border prose-img:border-gray-100 dark:prose-img:border-gray-800">

                                <p
                                    class="text-xl md:text-2xl font-bold text-gray-800 dark:text-gray-200 leading-relaxed italic mb-12 border-l-4 border-cs_blue pl-8 bg-blue-50/30 dark:bg-blue-900/5 py-4 rounded-r-2xl">
                                    "Chiến dịch tấn công giả mạo ngân hàng đang bùng nổ trong quý đầu năm 2026 thông qua các
                                    trạm BTS giả, đánh vào sự tin tưởng của người dùng MMO."
                                </p>

                                <p>
                                    Hiện nay, tội phạm mạng không còn dừng lại ở việc gửi link lừa đảo thông thường mà đã
                                    bắt đầu ứng dụng các **trạm thu phát sóng di động bất hợp pháp (Fake BTS)**. Điều này
                                    giúp chúng vượt
                                    qua được các bộ lọc tin nhắn rác của nhà mạng một cách dễ dàng.
                                </p>

                                <h2 class="text-2xl mt-12 mb-6">Thủ đoạn: Ghi đè sóng Brandname</h2>
                                <p>
                                    Thay vì dùng SIM rác như trước đây, kẻ xấu dùng thiết bị công nghệ cao để chèn tin nhắn
                                    vào luồng
                                    tin nhắn thật của ngân hàng. Khi bạn mở ứng dụng tin nhắn, bạn sẽ thấy tin nhắn lừa đảo
                                    nằm ngay trong cùng một thư mục với các thông báo giao dịch thật.
                                </p>

                                <div
                                    class="bg-red-50 dark:bg-red-900/10 border border-red-100 dark:border-red-900/30 p-8 my-10 rounded-3xl relative overflow-hidden">
                                    <div
                                        class="absolute -top-4 -right-4 text-red-100 dark:text-red-900/20 text-6xl opacity-50">
                                        <i class="fa-solid fa-quote-right"></i>
                                    </div>
                                    <p
                                        class="text-cs_red font-black text-xs mb-4 uppercase tracking-[0.2em] flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 bg-cs_red rounded-full animate-pulse"></span> Ví dụ tin
                                        nhắn lừa đảo
                                    </p>
                                    <p class="text-gray-700 dark:text-gray-300 italic font-medium text-lg leading-relaxed">
                                        "Cảnh báo: Tài khoản của quý khách đã bị tạm khóa do vi phạm điều khoản. Vui lòng
                                        truy cập https://vietcombank.verify-banking.com để xác thực và tránh mất tiền."
                                    </p>
                                </div>

                                <div class="my-12">
                                    <img src="https://i.ibb.co/3mbm8X9P/post2.jpg" alt="Trạm BTS giả mạo"
                                        class="w-full h-auto">
                                    <p
                                        class="text-center text-[11px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-6 italic">
                                        Hình ảnh: Tang vật trạm BTS giả mạo bị cơ quan chức năng thu giữ
                                    </p>
                                </div>

                                <h2 class="text-2xl mt-12 mb-6">Quy tắc vàng "3 KHÔNG" dành cho dân MMO</h2>
                                <p>Để bảo vệ túi tiền và thông tin cá nhân, cộng đồng MMO cần nắm lòng 3 nguyên tắc sống còn
                                    sau:</p>

                                <div class="grid grid-cols-1 gap-5 mt-8">
                                    <div
                                        class="flex items-start gap-5 p-6 bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-3xl hover:border-cs_blue/30 transition-all shadow-xs">
                                        <div
                                            class="w-12 h-12 shrink-0 bg-blue-50 dark:bg-blue-900/30 text-cs_blue rounded-2xl flex items-center justify-center text-lg font-black italic shadow-sm">
                                            01
                                        </div>
                                        <div>
                                            <h4 class="text-gray-900 dark:text-white font-black text-lg mb-2">KHÔNG nhấp vào
                                                đường link lạ</h4>
                                            <p class="text-sm leading-relaxed">Tuyệt đối không truy cập các trang web được
                                                gửi qua tin nhắn. Ngân hàng sẽ không bao giờ yêu cầu bạn đăng nhập qua link
                                                trong SMS.</p>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-start gap-5 p-6 bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-3xl hover:border-cs_blue/30 transition-all shadow-xs">
                                        <div
                                            class="w-12 h-12 shrink-0 bg-red-50 dark:bg-red-900/30 text-cs_red rounded-2xl flex items-center justify-center text-lg font-black italic shadow-sm">
                                            02
                                        </div>
                                        <div>
                                            <h4 class="text-gray-900 dark:text-white font-black text-lg mb-2">KHÔNG cung cấp
                                                mã OTP cho bất kỳ ai</h4>
                                            <p class="text-sm leading-relaxed">Mã OTP là chìa khóa cuối cùng. Nhân viên ngân
                                                hàng thật sự sẽ không bao giờ hỏi mã này của bạn.</p>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-start gap-5 p-6 bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-3xl hover:border-cs_blue/30 transition-all shadow-xs">
                                        <div
                                            class="w-12 h-12 shrink-0 bg-green-50 dark:bg-green-900/30 text-cs_green rounded-2xl flex items-center justify-center text-lg font-black italic shadow-sm">
                                            03
                                        </div>
                                        <div>
                                            <h4 class="text-gray-900 dark:text-white font-black text-lg mb-2">KHÔNG hoảng
                                                sợ, hãy xác minh lại</h4>
                                            <p class="text-sm leading-relaxed">Kẻ lừa đảo luôn dùng đòn tâm lý hối thúc. Hãy
                                                tắt điện thoại, hít thật sâu và gọi lên số tổng đài chính thức của ngân
                                                hàng.</p>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="mt-16 p-10 bg-gradient-to-br from-slate-900 to-slate-950 dark:from-dark_card dark:to-slate-900 rounded-[2.5rem] text-center relative overflow-hidden shadow-2xl shadow-blue-900/20">
                                    <div class="absolute top-0 left-0 w-full h-full pointer-events-none opacity-20">
                                        <div
                                            class="absolute top-0 right-0 w-64 h-64 bg-cs_blue rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2">
                                        </div>
                                    </div>
                                    <h3
                                        class="text-white text-2xl md:text-3xl font-black mb-6 uppercase tracking-tight relative z-10">
                                        Bạn phát hiện đối tượng lừa đảo?</h3>
                                    <p
                                        class="text-slate-400 text-sm md:text-base mb-10 max-w-xl mx-auto leading-relaxed relative z-10">
                                        Mỗi báo cáo của bạn là một bước giúp cộng đồng MMO Việt Nam an toàn hơn. Đừng im
                                        lặng trước cái xấu!
                                    </p>
                                    <a href="/to-cao-lua-dao"
                                        class="inline-flex items-center gap-4 px-10 py-4 bg-cs_blue text-white font-black uppercase text-xs tracking-widest rounded-2xl hover:bg-white hover:text-slate-900 transition-all shadow-xl shadow-blue-500/20 relative z-10 active:scale-95">
                                        Gửi đơn tố cáo ngay
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </a>
                                </div>
                            </section>

                            <!-- Social Counter & Tags -->
                            <div
                                class="mt-16 pt-10 border-t border-gray-100 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-6">
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mr-2">Cốt
                                        lõi:</span>
                                    <a href="#"
                                        class="px-3 py-1 bg-gray-50 dark:bg-slate-800 text-gray-500 dark:text-gray-400 text-[10px] font-bold rounded-lg hover:text-cs_blue transition-colors uppercase">Bảo
                                        mật MMO</a>
                                    <a href="#"
                                        class="px-3 py-1 bg-gray-50 dark:bg-slate-800 text-gray-500 dark:text-gray-400 text-[10px] font-bold rounded-lg hover:text-cs_blue transition-colors uppercase">Fake
                                        BTS</a>
                                    <a href="#"
                                        class="px-3 py-1 bg-gray-50 dark:bg-slate-800 text-gray-500 dark:text-gray-400 text-[10px] font-bold rounded-lg hover:text-cs_blue transition-colors uppercase">Scam
                                        Alert</a>
                                </div>
                                <div class="flex items-center gap-6">
                                    <div class="flex -space-x-2">
                                        @for ($i = 0; $i < 4; $i++)
                                            <img src="https://ui-avatars.com/api/?background=random&name=User+{{ $i }}"
                                                class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-900 shadow-sm"
                                                alt="U">
                                        @endfor
                                        <div
                                            class="w-8 h-8 rounded-full bg-gray-100 dark:bg-slate-800 border-2 border-white dark:border-gray-900 flex items-center justify-center text-[8px] font-bold text-gray-500">
                                            +25</div>
                                    </div>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tight">Đã chia sẻ bài
                                        viết này</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Section -->
                    <div class="mt-16">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center gap-3">
                                <div class="w-1.5 h-6 bg-cs_blue rounded-full"></div>
                                <h2 class="text-xl font-black text-gray-900 dark:text-white uppercase tracking-tight">Cẩm
                                    nang liên quan</h2>
                            </div>
                            <a href="/bai-viet"
                                class="text-[11px] font-black text-cs_blue uppercase tracking-widest hover:underline">Xem
                                tất cả</a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @for ($i = 1; $i <= 2; $i++)
                                <a href="#"
                                    class="group bg-white dark:bg-dark_card border border-gray-100 dark:border-gray-800 rounded-[2rem] overflow-hidden hover:border-cs_blue/30 transition-all shadow-xs">
                                    <div class="aspect-video overflow-hidden">
                                        <img src="https://i.ibb.co/680L9399/post1.jpg"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                            alt="Related">
                                    </div>
                                    <div class="p-6">
                                        <div class="flex items-center gap-2 mb-3">
                                            <span
                                                class="text-[9px] font-black text-cs_blue bg-blue-50 dark:bg-blue-900/20 px-2 py-0.5 rounded leading-none uppercase">Kinh
                                                nghiệm</span>
                                            <span class="text-[9px] font-bold text-gray-400 uppercase">15 Mar 2026</span>
                                        </div>
                                        <h3
                                            class="font-black text-gray-800 dark:text-gray-100 text-base leading-snug group-hover:text-cs_blue transition-colors line-clamp-2 italic">
                                            5 Cách để bảo vệ tài khoản quảng cáo Facebook không bị 'checkpoint' vô lý...
                                        </h3>
                                    </div>
                                </a>
                            @endfor
                        </div>
                    </div>
                </article>

                <!-- 3. RIGHT: Sidebar Widgets (Copied from Home) -->
                <aside class="w-full lg:w-[350px] space-y-4 sticky top-32 h-fit">

                    <!-- Right Sidebar Banner -->
                    <div class="aspect-square border border-gray-200 shadow-sm rounded-lg overflow-hidden dark:bg-white">
                        <a href="#" target="_blank" class="w-full h-full block">
                            <img src="https://i.ibb.co/kgwtn4vF/fpayment.jpg" class="w-full h-full" alt="Fpayment Ads">
                        </a>
                    </div>



                    <!-- Top Readers Widget (New Attraction) -->
                    <div
                        class="bg-white dark:bg-dark_card  dark:border-gray-800 border  rounded-lg border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-gray-50 dark:border-gray-800 bg-gray-50/50 dark:bg-slate-800/30">
                            <h4
                                class="font-black text-gray-900 dark:text-white text-[12px] uppercase tracking-[0.2em] flex items-center gap-2">
                                <i class="fa-solid fa-fire text-cs_orange animate-pulse"></i> Đọc nhiều nhất
                            </h4>
                        </div>
                        <div class="divide-y divide-gray-50 dark:divide-gray-800">
                            @for ($i = 1; $i <= 5; $i++)
                                <a href="#"
                                    class="flex items-start gap-4 p-5 hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors group">
                                    <span
                                        class="text-xl font-black text-gray-100 dark:text-gray-800 group-hover:text-cs_blue/20 transition-colors">0{{ $i }}</span>
                                    <div class="flex-1 min-w-0">
                                        <h5
                                            class="text-[12px] font-bold text-gray-800 dark:text-gray-200 group-hover:text-cs_blue transition-colors line-clamp-2 leading-snug italic">
                                            Cách check độ uy tín của Broker trước khi xuống tiền...
                                        </h5>
                                        <div class="flex items-center gap-3 mt-2">
                                            <span class="text-[9px] text-gray-400 font-bold uppercase tracking-tighter"><i
                                                    class="fa-regular fa-eye mr-1"></i> 2.5k</span>
                                            <span class="text-[9px] text-gray-400 font-bold uppercase tracking-tighter"><i
                                                    class="fa-regular fa-comment mr-1"></i> 12</span>
                                        </div>
                                    </div>
                                </a>
                            @endfor
                        </div>
                    </div>





                </aside>
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

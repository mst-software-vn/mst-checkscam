@extends('layouts.app')

@section('title', 'Hướng dẫn tố cáo - Cách bảo vệ cộng đồng hiệu quả')

@section('content')
    <main class="bg-gray-50/40 dark:bg-dark_bg pb-24">
        <x-breadcrumb :links="[['name' => 'Hướng dẫn tố cáo', 'url' => '/huong-dan-to-cao']]" />

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <header class="mb-12 text-center">
                <h1 class="text-3xl md:text-5xl font-black text-gray-800 dark:text-gray-100 uppercase tracking-tighter mb-4">
                    Hướng dẫn <span class="text-cs_red">Tố cáo</span>
                </h1>
                <p
                    class="text-gray-500 dark:text-gray-400 font-bold text-sm md:text-base max-w-2xl mx-auto leading-relaxed uppercase tracking-widest">
                    Quy trình 3 bước đơn giản để đưa kẻ lừa đảo ra ánh sáng.
                </p>
            </header>

            <div class="space-y-8">
                <!-- Step 1 -->
                <div
                    class="bg-white dark:bg-dark_card p-8 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800 relative overflow-hidden group">
                    <div
                        class="absolute -top-6 -right-6 text-9xl font-black text-gray-50 dark:text-gray-800/20 group-hover:text-cs_red/10 transition-colors">
                        01</div>
                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-red-50 dark:bg-red-900/20 text-cs_red rounded-xl flex items-center justify-center mb-6">
                            <i class="fa-solid fa-file-pen text-xl"></i>
                        </div>
                        <h2 class="text-xl font-black text-gray-800 dark:text-white uppercase mb-3 tracking-tight">Thu thập
                            bằng chứng</h2>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium mb-4">
                            Chụp ảnh màn hình các đoạn chat, giao dịch chuyển khoản thành công, thông tin số tài khoản và
                            SĐT của đối tượng lừa đảo.
                        </p>
                        <ul class="space-y-2 text-xs font-bold text-gray-500 dark:text-gray-500 uppercase">
                            <li><i class="fa-solid fa-circle-check text-cs_red mr-2"></i> Bill chuyển khoản ngân hàng</li>
                            <li><i class="fa-solid fa-circle-check text-cs_red mr-2"></i> Ảnh chụp màn hình tin nhắn</li>
                            <li><i class="fa-solid fa-circle-check text-cs_red mr-2"></i> Link Facebook/Profile đối tượng
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Step 2 -->
                <div
                    class="bg-white dark:bg-dark_card p-8 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800 relative overflow-hidden group">
                    <div
                        class="absolute -top-6 -right-6 text-9xl font-black text-gray-50 dark:text-gray-800/20 group-hover:text-cs_red/10 transition-colors">
                        02</div>
                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-red-50 dark:bg-red-900/20 text-cs_red rounded-xl flex items-center justify-center mb-6">
                            <i class="fa-solid fa-upload text-xl"></i>
                        </div>
                        <h2 class="text-xl font-black text-gray-800 dark:text-white uppercase mb-3 tracking-tight">Gửi đơn
                            tố cáo</h2>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium">
                            Truy cập mục Tố cáo, điền đầy đủ các thông tin theo yêu cầu. Lưu ý mô tả chi tiết hành vi để
                            Admin dễ dàng xác minh.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div
                    class="bg-white dark:bg-dark_card p-8 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800 relative overflow-hidden group">
                    <div
                        class="absolute -top-6 -right-6 text-9xl font-black text-gray-50 dark:text-gray-800/20 group-hover:text-cs_red/10 transition-colors">
                        03</div>
                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-green-50 dark:bg-green-900/20 text-cs_green rounded-xl flex items-center justify-center mb-6">
                            <i class="fa-solid fa-shield-halved text-xl"></i>
                        </div>
                        <h2 class="text-xl font-black text-gray-800 dark:text-white uppercase mb-3 tracking-tight">Xác minh
                            & Đăng tải</h2>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium">
                            Trong vòng 24h, đội ngũ quản trị sẽ kiểm tra thông tin. Nếu bằng chứng hợp lệ, đối tượng sẽ bị
                            đưa vào danh sách đen vĩnh viễn và hiển thị trên Google.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                <a href="/to-cao-lua-dao"
                    class="inline-block bg-cs_red hover:bg-red-700 text-white font-black py-4 px-12 rounded-2xl transition-all active:scale-95 shadow-xl shadow-red-500/20 uppercase text-xs tracking-widest leading-none">
                    Bắt đầu tố cáo ngay
                </a>
            </div>
        </div>
    </main>
@endsection

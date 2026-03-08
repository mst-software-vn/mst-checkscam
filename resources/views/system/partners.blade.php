@extends('layouts.app')

@section('title', 'Đối tác uy tín - Cộng đồng MMO minh bạch')

@section('content')
    <main class="bg-gray-50/40 dark:bg-dark_bg pb-24">
        <x-breadcrumb :links="[['name' => 'Đối tác uy tín', 'url' => '/doi-tac-uy-tin']]" />

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <header class="mb-16 text-center">
                <span
                    class="inline-block px-3 py-1 bg-cs_blue/10 text-cs_blue text-[10px] font-bold uppercase tracking-widest rounded-full mb-4">Mạng
                    lưới tin cậy</span>
                <h1 class="text-3xl md:text-5xl font-black text-gray-800 dark:text-gray-100 uppercase tracking-tighter mb-4">
                    Đối tác <span class="text-cs_blue">Chiến lược</span>
                </h1>
                <p
                    class="text-gray-500 dark:text-gray-400 font-bold text-sm max-w-2xl mx-auto leading-relaxed uppercase tracking-widest">
                    Hợp tác cùng các đơn vị hàng đầu để xây dựng môi trường internet an toàn.
                </p>
            </header>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-20">
                <?php
                $partners = [
                    ['name' => 'Vietcombank', 'logo' => 'https://i.ibb.co/TMXxGRhw/vcb.webp'],
                    ['name' => 'Momo', 'logo' => 'https://i.ibb.co/KjJmJqYL/momo.webp'],
                    ['name' => 'Telegram Global', 'logo' => 'https://i.ibb.co/rGtr2pbZ/fb.webp'],
                    ['name' => 'Facebook Safety', 'logo' => 'https://i.ibb.co/8n74BrYX/tele.webp'],
                ];
                foreach($partners as $p): ?>
                <div
                    class="bg-white dark:bg-dark_card p-8 cursor-pointer rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800 flex items-center justify-center grayscale hover:grayscale-0 transition-all group">
                    <img src="<?php echo $p['logo']; ?>" alt="<?php echo $p['name']; ?>"
                        class="h-12 md:h-16 w-auto object-contain group-hover:scale-110 transition-transform">
                </div>
                <?php endforeach; ?>
            </div>

            <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2
                        class="text-2xl md:text-4xl font-black text-gray-800 dark:text-white uppercase tracking-tighter leading-tight">
                        Trở thành <span class="text-cs_blue">Đối tác</span> của CheckScam
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 font-medium leading-relaxed">
                        Chúng tôi luôn mở rộng hợp tác với các cộng đồng MMO, các đơn vị trung gian và các nền tảng thanh
                        toán để cùng nhau chia sẻ dữ liệu cảnh báo lừa đảo.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                            <i class="fa-solid fa-check-double text-cs_blue"></i> Chia sẻ dữ liệu API 2 chiều
                        </li>
                        <li class="flex items-center gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                            <i class="fa-solid fa-check-double text-cs_blue"></i> Truyền thông cảnh báo lừa đảo
                        </li>
                        <li class="flex items-center gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                            <i class="fa-solid fa-check-double text-cs_blue"></i> Xác minh danh tính thành viên
                        </li>
                    </ul>
                    <div class="pt-4">
                        <a href="#"
                            class="inline-block bg-gray-900 dark:bg-white dark:text-gray-900 text-white font-black py-4 px-8 rounded-2xl transition-all active:scale-95 uppercase text-xs tracking-widest leading-none">
                            Liên hệ hợp tác
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -inset-4 bg-cs_blue/10 rounded-[40px] blur-3xl opacity-50"></div>
                    <img src="https://i.ibb.co/kgwtn4vF/fpayment.jpg" alt="Partner"
                        class="relative z-10 w-full h-auto rounded-3xl shadow-2xl">
                </div>
            </section>
        </div>
    </main>
@endsection

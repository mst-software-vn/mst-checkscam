@extends("layouts.app")

@section("title", "Đối tác uy tín - Cộng đồng MMO minh bạch")

@section("content")
    <main class="dark:bg-dark_bg bg-gray-50/40 pb-24">
        <x-breadcrumb :links="[['name' => 'Đối tác uy tín', 'url' => '/doi-tac-uy-tin']]" />

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <header class="mb-16 text-center">
                <span
                    class="bg-cs_blue/10 text-cs_blue mb-4 inline-block rounded-full px-3 py-1 text-[10px] font-bold tracking-widest uppercase"
                >
                    Mạng lưới tin cậy
                </span>
                <h1
                    class="mb-4 text-3xl font-black tracking-tighter text-gray-800 uppercase md:text-5xl dark:text-gray-100"
                >
                    Đối tác
                    <span class="text-cs_blue">Chiến lược</span>
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-bold tracking-widest text-gray-500 uppercase dark:text-gray-400"
                >
                    Hợp tác cùng các đơn vị hàng đầu để xây dựng môi trường internet an toàn.
                </p>
            </header>

            <div class="mb-20 grid grid-cols-2 gap-8 md:grid-cols-4">
                <?php
                $partners = [
                    ['name' => 'Vietcombank', 'logo' => 'https://i.ibb.co/TMXxGRhw/vcb.webp'],
                    ['name' => 'Momo', 'logo' => 'https://i.ibb.co/KjJmJqYL/momo.webp'],
                    ['name' => 'Telegram Global', 'logo' => 'https://i.ibb.co/rGtr2pbZ/fb.webp'],
                    ['name' => 'Facebook Safety', 'logo' => 'https://i.ibb.co/8n74BrYX/tele.webp'],
                ];
                foreach ($partners as $p) { ?>

                <div
                    class="dark:bg-dark_card group flex cursor-pointer items-center justify-center rounded-3xl border border-gray-100 bg-white p-8 shadow-xs grayscale transition-all hover:grayscale-0 dark:border-gray-800"
                >
                    <img
                        src="<?php echo $p["logo"]; ?>"
                        alt="<?php echo $p["name"]; ?>"
                        class="h-12 w-auto object-contain transition-transform group-hover:scale-110 md:h-16"
                    />
                </div>

                <?php } ?>
            </div>

            <section class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
                <div class="space-y-6">
                    <h2
                        class="text-2xl leading-tight font-black tracking-tighter text-gray-800 uppercase md:text-4xl dark:text-white"
                    >
                        Trở thành
                        <span class="text-cs_blue">Đối tác</span>
                        của CheckScam
                    </h2>
                    <p class="leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                        Chúng tôi luôn mở rộng hợp tác với các cộng đồng MMO, các đơn vị trung gian và các nền tảng
                        thanh toán để cùng nhau chia sẻ dữ liệu cảnh báo lừa đảo.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                            <i class="fa-solid fa-check-double text-cs_blue"></i>
                            Chia sẻ dữ liệu API 2 chiều
                        </li>
                        <li class="flex items-center gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                            <i class="fa-solid fa-check-double text-cs_blue"></i>
                            Truyền thông cảnh báo lừa đảo
                        </li>
                        <li class="flex items-center gap-3 text-sm font-bold text-gray-700 dark:text-gray-300">
                            <i class="fa-solid fa-check-double text-cs_blue"></i>
                            Xác minh danh tính thành viên
                        </li>
                    </ul>
                    <div class="pt-4">
                        <a
                            href="#"
                            class="inline-block rounded-2xl bg-gray-900 px-8 py-4 text-xs leading-none font-black tracking-widest text-white uppercase transition-all active:scale-95 dark:bg-white dark:text-gray-900"
                        >
                            Liên hệ hợp tác
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-cs_blue/10 absolute -inset-4 rounded-[40px] opacity-50 blur-3xl"></div>
                    <img
                        src="https://i.ibb.co/kgwtn4vF/fpayment.jpg"
                        alt="Partner"
                        class="relative z-10 h-auto w-full rounded-3xl shadow-2xl"
                    />
                </div>
            </section>
        </div>
    </main>
@endsection

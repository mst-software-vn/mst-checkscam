@extends("layouts.app")

@section("title", "Hồ sơ Bảo Hiểm - Võ Xuân Sang")

@section("content")
    <main class="dark:bg-dark_bg bg-gray-50/40 pb-24">
        <x-breadcrumb
            :links="[
                ['name' => 'Quỹ bảo hiểm', 'url' => '/bao-hiem-cs'],
                ['name' => 'Võ Xuân Sang', 'url' => '/vo-xuan-sang'],
            ]"
        />
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Hero Section: Profile Header -->
            <section class="relative z-10 mb-12 text-center">
                <div class="relative mb-8 inline-block">
                    <!-- Glow effect for avatar -->
                    <div class="bg-cs_blue/40 absolute inset-0 animate-pulse rounded-full opacity-20 blur-2xl"></div>
                    <div
                        class="ring-cs_blue/20 relative h-24 w-24 overflow-hidden rounded-full border-2 border-white shadow-xl ring-2 ring-offset-2 md:h-28 md:w-28 dark:border-slate-800"
                    >
                        <img
                            src="https://i.ibb.co/kVFkMXRj/avatar.jpg"
                            class="h-full w-full object-cover"
                            alt="Võ Xuân Sang Avatar"
                        />
                    </div>
                </div>

                <h1
                    class="mb-4 text-2xl font-black tracking-tight text-gray-800 uppercase md:text-3xl dark:text-gray-300"
                >
                    Võ Xuân Sang
                </h1>

                <div class="flex flex-wrap justify-center gap-3">
                    <a
                        href="#"
                        class="bg-cs_blue flex items-center gap-2 rounded-lg px-6 py-2.5 text-[10px] font-black tracking-widest text-white uppercase shadow-lg shadow-blue-500/10 transition-all hover:bg-blue-600 active:scale-95 md:text-xs"
                    >
                        <i class="fa-brands fa-facebook"></i>
                        Messenger
                    </a>
                    <a
                        href="#"
                        class="flex items-center gap-2 rounded-lg bg-slate-800 px-6 py-2.5 text-[10px] font-black tracking-widest text-white uppercase shadow-lg transition-all hover:bg-black active:scale-95 md:text-xs"
                    >
                        <i class="fa-solid fa-robot"></i>
                        Bot GDV
                    </a>
                </div>
            </section>

            <!-- Details Grid -->
            <div class="relative z-10 grid grid-cols-1 gap-8 lg:grid-cols-2">
                <!-- Card 1: Information -->
                <div
                    class="group relative overflow-hidden rounded-[30px] border border-gray-100 bg-white p-5 shadow-sm shadow-blue-900/5 md:p-6 dark:border-gray-800 dark:bg-slate-900"
                >
                    <div
                        class="text-cs_blue pointer-events-none absolute top-0 right-0 p-6 opacity-10 transition-transform group-hover:scale-110 group-hover:rotate-12"
                    >
                        <i class="fa-solid fa-address-card text-5xl"></i>
                    </div>
                    <div class="flex items-start justify-between">
                        <div class="flex-1 space-y-4">
                            <h2
                                class="text-md border-cs_blue mb-4 border-l-4 pl-3 font-black tracking-tight text-gray-800 uppercase md:text-lg dark:text-gray-300"
                            >
                                Thông Tin Bảo Hiểm
                            </h2>
                            <ul class="space-y-3 text-[11px] font-bold text-gray-500 md:text-xs dark:text-gray-400">
                                <li class="hover:text-cs_blue flex items-center gap-3 transition-colors">
                                    <i class="fa-brands fa-facebook-f text-cs_blue w-5"></i>
                                    <span>
                                        Fb (chính):
                                        <span class="ml-1 text-gray-800 dark:text-gray-200">100068913086808</span>
                                    </span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class="fa-solid fa-paper-plane text-cs_blue w-5"></i>
                                    <span>
                                        Zalo:
                                        <span class="ml-1 text-gray-800 dark:text-gray-200">0817337805</span>
                                    </span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class="fa-solid fa-cart-shopping text-cs_blue w-5"></i>
                                    <span>
                                        Shop trên CS:
                                        <span class="ml-1 text-gray-800 dark:text-gray-200">Cửa hàng của Sang</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="ml-4 hidden shrink-0 md:block">
                            <img
                                src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://facebook.com/100068913086808"
                                class="h-20 w-20 rounded-xl border border-gray-100 bg-gray-50 p-2 shadow-inner duration-500 group-hover:invert-0 dark:border-gray-700 dark:bg-slate-800 dark:group-hover:invert"
                                alt="QR Code"
                            />
                        </div>
                    </div>
                </div>

                <!-- Card 2: Fund Status -->
                <div
                    class="group relative overflow-hidden rounded-[30px] border border-green-200 bg-linear-to-br from-green-50 to-green-100 p-5 shadow-xl shadow-green-900/5 md:p-6 dark:border-green-800/50 dark:from-green-900/10 dark:to-green-900/20"
                >
                    <div
                        class="pointer-events-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-[0.03] transition-transform duration-2000 group-hover:scale-125"
                    >
                        <i class="fa-solid fa-shield text-[200px]"></i>
                    </div>

                    <h2
                        class="text-md border-cs_green mb-5 border-l-4 pl-3 font-black tracking-tight text-green-800 uppercase md:text-lg dark:text-green-400"
                    >
                        Quỹ Bảo Hiểm CS
                    </h2>

                    <div class="mb-5 flex items-center gap-4">
                        <div
                            class="bg-cs_green relative flex h-12 w-12 items-center justify-center rounded-full text-xl text-white shadow-xl shadow-green-500/30 md:h-14 md:w-14 md:text-2xl"
                        >
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div>
                            <p
                                class="mb-1 text-[10px] leading-none font-semibold tracking-widest text-green-700/70 uppercase dark:text-green-400/70"
                            >
                                Số dư ký quỹ
                            </p>
                            <p class="text-cs_green text-xl font-black tracking-tighter md:text-2xl">10.000.000đ</p>
                        </div>
                    </div>

                    <p
                        class="text-[11px] leading-relaxed font-semibold text-green-800/80 italic md:text-xs dark:text-green-300/80"
                    >
                        Từ ngày
                        <span class="text-cs_green font-black">19/03/2022</span>
                        MSTSoftware.VN đứng ra
                        <span class="bg-cs_green px-1 font-bold text-white">bảo lãnh 100%</span>
                        cho thành viên
                        <span class="text-cs_green font-black">Võ Xuân Sang</span>
                        .
                    </p>
                </div>

                <!-- Large Card: Services & Accounts -->
                <div
                    class="relative rounded-[35px] border border-gray-100 bg-white p-6 shadow-sm shadow-blue-900/5 md:p-8 lg:col-span-2 dark:border-gray-800 dark:bg-slate-900"
                >
                    <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                        <!-- Services -->
                        <div>
                            <h2
                                class="text-md border-cs_blue mb-6 border-l-4 pl-3 font-black tracking-tight text-gray-800 uppercase md:text-lg dark:text-gray-300"
                            >
                                Dịch vụ cung cấp
                            </h2>
                            <ul class="space-y-4">
                                <li class="group/item flex items-start gap-3">
                                    <div
                                        class="text-cs_blue flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-sm transition-transform group-hover/item:rotate-12 dark:bg-blue-900/30"
                                    >
                                        <i class="fa-solid fa-people-arrows"></i>
                                    </div>
                                    <div>
                                        <h4
                                            class="text-xs font-black text-gray-800 uppercase md:text-[13px] dark:text-gray-200"
                                        >
                                            Giao dịch Trung gian - Đổi Tiền
                                        </h4>
                                        <p class="mt-0.5 text-[10px] font-bold text-gray-400 italic dark:text-gray-500">
                                            Nhanh chóng, an toàn.
                                        </p>
                                    </div>
                                </li>
                                <li class="group/item flex items-start gap-3">
                                    <div
                                        class="text-cs_green flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-green-50 text-sm transition-transform group-hover/item:rotate-12 dark:bg-green-900/30"
                                    >
                                        <i class="fa-solid fa-tags"></i>
                                    </div>
                                    <div>
                                        <h4
                                            class="text-xs font-black text-gray-800 uppercase md:text-[13px] dark:text-gray-200"
                                        >
                                            Thu mua Acc & Tài khoản
                                        </h4>
                                        <p class="mt-0.5 text-[10px] font-bold text-gray-400 italic dark:text-gray-500">
                                            Gaming, Social...
                                        </p>
                                    </div>
                                </li>
                                <li class="group/item flex items-start gap-3">
                                    <div
                                        class="text-cs_orange flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-orange-50 text-sm transition-transform group-hover/item:rotate-12 dark:bg-orange-900/30"
                                    >
                                        <i class="fa-solid fa-shop"></i>
                                    </div>
                                    <div>
                                        <h4
                                            class="text-xs font-black text-gray-800 uppercase md:text-[13px] dark:text-gray-200"
                                        >
                                            Kho Acc sẵn giá rẻ
                                        </h4>
                                        <div class="mt-1.5 flex flex-wrap gap-2">
                                            <a
                                                href="#"
                                                class="text-cs_blue hover:bg-cs_blue rounded-md bg-gray-50 px-2 py-0.5 text-[9px] transition-colors hover:text-white dark:bg-slate-800"
                                            >
                                                Kho 1
                                            </a>
                                            <a
                                                href="#"
                                                class="text-cs_blue hover:bg-cs_blue rounded-md bg-gray-50 px-2 py-0.5 text-[9px] transition-colors hover:text-white dark:bg-slate-800"
                                            >
                                                Kho 2
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Bank Accounts -->
                        <div>
                            <h2
                                class="text-md border-cs_red mb-6 border-l-4 pl-3 font-black tracking-tight text-gray-800 uppercase md:text-lg dark:text-gray-300"
                            >
                                Hệ thống thanh toán
                            </h2>
                            <div class="space-y-3">
                                <?php
                                $banks = [
                                    [
                                        "name" => "Momo",
                                        "number" => "0817337805",
                                        "logo" => "https://ui-avatars.com/api/?name=MO&background=e02a88&color=fff",
                                    ],
                                    [
                                        "name" => "BIDV",
                                        "number" => "5321247995",
                                        "logo" => "https://ui-avatars.com/api/?name=BI&background=213a91&color=fff",
                                    ],
                                    [
                                        "name" => "Vietcombank",
                                        "number" => "1047701405",
                                        "logo" => "https://ui-avatars.com/api/?name=VCB&background=00aeef&color=fff",
                                    ],
                                    [
                                        "name" => "MB Bank",
                                        "number" => "1236089999",
                                        "logo" => "https://ui-avatars.com/api/?name=MB&background=0254cf&color=fff",
                                    ],
                                    [
                                        "name" => "Techcombank",
                                        "number" => "867977777777",
                                        "logo" => "https://ui-avatars.com/api/?name=TCB&background=e31837&color=fff",
                                    ],
                                ];
                                ?>

                                @foreach ($banks as $bank)
                                    <div
                                        class="group/bank hover:border-cs_red/20 flex items-center justify-between rounded-xl border border-gray-100 bg-gray-50 p-2.5 transition-all dark:border-gray-800 dark:bg-slate-800/50"
                                    >
                                        <div class="flex items-center gap-2.5">
                                            <img
                                                src="{{ $bank["logo"] }}"
                                                class="h-8 w-8 rounded-lg"
                                                alt="{{ $bank["name"] }}"
                                            />
                                            <div>
                                                <p
                                                    class="text-[8px] leading-none font-black tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                                >
                                                    {{ $bank["name"] }}
                                                </p>
                                                <p class="text-xs font-bold text-gray-800 dark:text-gray-200">
                                                    {{ $bank["number"] }}
                                                </p>
                                            </div>
                                        </div>
                                        <button
                                            class="hover:text-cs_red flex h-7 w-7 items-center justify-center text-xs text-gray-400 transition-colors"
                                            title="Copy"
                                        >
                                            <i class="fa-regular fa-copy"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Watermark Stamp: Positioned dynamically -->
                    <div
                        class="group pointer-events-none absolute -right-2 -bottom-2 hidden rotate-[-15deg] opacity-5 lg:block"
                    >
                        <div
                            class="border-cs_red text-cs_red flex scale-110 flex-col items-center justify-center rounded-full border-8 p-6"
                        >
                            <i class="fa-solid fa-shield-check text-6xl"></i>
                            <span class="mt-3 text-2xl font-black tracking-widest uppercase">MSTSoftware.VN</span>
                            <span class="mt-1 text-sm font-bold uppercase">BẢO HIỂM GIỮ QUỸ</span>
                        </div>
                    </div>

                    <!-- User Image style stamp (as requested in idea but stylized) -->
                    <div class="mt-12 flex justify-end border-t border-gray-100 pt-8 dark:border-gray-800">
                        <div class="border-cs_red/20 -rotate-2 rounded-xl border-4 border-dashed p-4">
                            <div class="text-cs_red flex items-center gap-3 uppercase opacity-40">
                                <i class="fa-solid fa-lock text-2xl"></i>
                                <div>
                                    <p class="mb-1 text-[10px] leading-none font-black tracking-[0.2em]">
                                        QUỸ BẢO HIỂM MMO
                                    </p>
                                    <p class="text-xl font-black tracking-tight">MSTSoftware.VN</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Warning Section -->
            <div class="mx-auto mt-20 max-w-3xl text-center">
                <div class="bg-cs_red mx-auto mb-8 h-1 w-16 rounded-full"></div>
                <h4
                    class="mb-4 text-xs font-black tracking-widest text-gray-800 uppercase md:text-sm dark:text-gray-200"
                >
                    Cảnh báo quan trọng
                </h4>
                <p class="text-[11px] leading-relaxed font-semibold text-gray-500 md:text-xs dark:text-gray-400">
                    Lưu ý: Chỉ chuyển khoản vào các số tài khoản được niêm yết tại đây.
                    <br />
                    Mọi yêu cầu chuyển tiền từ các tài khoản khác, dù có thông tin trùng khớp tên, đều là lừa đảo.
                    <br />
                    Hãy kiểm tra kỹ con dấu (Watermark) và link web
                    <span class="text-cs_red underline">MSTSoftware.VN</span>
                    chính chủ.
                </p>
            </div>
        </div>
    </main>

    <!-- Background Elements -->
    <div class="pointer-events-none fixed top-0 left-0 z-0 h-full w-full">
        <div class="bg-cs_blue/10 absolute top-[10%] left-[5%] h-64 w-64 rounded-full blur-[120px]"></div>
        <div class="bg-cs_red/5 absolute right-[5%] bottom-[10%] h-96 w-96 rounded-full blur-[150px]"></div>
    </div>
@endsection

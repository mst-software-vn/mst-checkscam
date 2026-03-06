@extends('layouts.app')

@section('title', 'Hồ sơ Bảo Hiểm - Võ Xuân Sang')

@section('content')
    <main class="min-h-screen dark:bg-dark_bg py-6 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumbs -->
            <nav class="flex mb-10 text-[10px] sm:text-xs md:text-sm font-bold uppercase tracking-widest text-gray-400"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 overflow-x-auto whitespace-nowrap pb-1">
                    <li class="inline-flex items-center">
                        <a href="/" class="hover:text-cs_blue transition-colors">Trang chủ</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right mx-1.5 md:mx-2 text-[7px] md:text-[8px]"></i>
                            <a href="/bao-hiem-cs" class="hover:text-cs_blue transition-colors">Quỹ bảo hiểm</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right mx-1.5 md:mx-2 text-[7px] md:text-[8px]"></i>
                            <span class="text-gray-900 dark:text-gray-200">Võ Xuân Sang</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section: Profile Header -->
            <section class="mb-12 text-center relative z-10">
                <div class="relative inline-block mb-8">
                    <!-- Glow effect for avatar -->
                    <div class="absolute inset-0 bg-cs_blue/40 rounded-full blur-2xl opacity-20 animate-pulse"></div>
                    <div
                        class="relative w-24 h-24 md:w-28 md:h-28 rounded-full border-2 border-white dark:border-slate-800 shadow-xl overflow-hidden ring-2 ring-offset-2 ring-cs_blue/20">
                        <img src="https://i.ibb.co/kVFkMXRj/avatar.jpg" class="w-full h-full object-cover"
                            alt="Võ Xuân Sang Avatar">
                    </div>

                </div>

                <h1 class="text-2xl md:text-3xl font-black text-gray-800 dark:text-white uppercase tracking-tight mb-4">
                    Võ Xuân Sang
                </h1>

                <div class="flex flex-wrap justify-center gap-3">
                    <a href="#"
                        class="px-6 py-2.5 bg-cs_blue hover:bg-blue-600 text-white rounded-lg font-black text-[10px] md:text-xs uppercase tracking-widest transition-all shadow-lg shadow-blue-500/10 active:scale-95 flex items-center gap-2">
                        <i class="fa-brands fa-facebook"></i> Messenger
                    </a>
                    <a href="#"
                        class="px-6 py-2.5 bg-slate-800 hover:bg-black text-white rounded-lg font-black text-[10px] md:text-xs uppercase tracking-widest transition-all shadow-lg active:scale-95 flex items-center gap-2">
                        <i class="fa-solid fa-robot"></i> Bot GDV
                    </a>
                </div>
            </section>

            <!-- Details Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 relative z-10">

                <!-- Card 1: Information -->
                <div
                    class="bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 p-5 md:p-6 rounded-[30px] shadow-xl shadow-blue-900/5 relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 p-6 text-cs_blue opacity-10 group-hover:rotate-12 group-hover:scale-110 transition-transform pointer-events-none">
                        <i class="fa-solid fa-address-card text-5xl"></i>
                    </div>
                    <div class="flex items-start justify-between">
                        <div class="space-y-4 flex-1">
                            <h2
                                class="text-md md:text-lg font-black text-gray-800 dark:text-white uppercase tracking-tight border-l-4 border-cs_blue pl-3 mb-4">
                                Thông Tin Bảo Hiểm</h2>
                            <ul class="space-y-3 font-bold text-gray-500 dark:text-gray-400 text-[11px] md:text-xs">
                                <li class="flex items-center gap-3 hover:text-cs_blue transition-colors">
                                    <i class="fa-brands fa-facebook-f w-5 text-cs_blue"></i>
                                    <span>Fb (chính): <span
                                            class="text-gray-800 dark:text-gray-200 ml-1">100068913086808</span></span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class="fa-solid fa-paper-plane w-5 text-cs_blue"></i>
                                    <span>Zalo: <span class="text-gray-800 dark:text-gray-200 ml-1">0817337805</span></span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class="fa-solid fa-cart-shopping w-5 text-cs_blue"></i>
                                    <span>Shop trên CS: <span class="text-gray-800 dark:text-gray-200 ml-1">Cửa hàng của
                                            Sang</span></span>
                                </li>
                            </ul>
                        </div>
                        <div class="shrink-0 ml-4 hidden md:block">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://facebook.com/100068913086808"
                                class="w-20 h-20 p-2 bg-gray-50 dark:bg-slate-800 rounded-xl border border-gray-100 dark:border-gray-700 shadow-inner group-hover:invert-0 dark:group-hover:invert duration-500"
                                alt="QR Code">
                        </div>
                    </div>
                </div>

                <!-- Card 2: Fund Status -->
                <div
                    class="bg-linear-to-br from-green-50 to-green-100 dark:from-green-900/10 dark:to-green-900/20 border border-green-200 dark:border-green-800/50 p-5 md:p-6 rounded-[30px] shadow-xl shadow-green-900/5 relative overflow-hidden group">
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none opacity-[0.03] group-hover:scale-125 transition-transform duration-2000">
                        <i class="fa-solid fa-shield text-[200px]"></i>
                    </div>

                    <h2
                        class="text-md md:text-lg font-black text-green-800 dark:text-green-400 uppercase tracking-tight border-l-4 border-cs_green pl-3 mb-5">
                        Quỹ Bảo Hiểm CS</h2>

                    <div class="flex items-center gap-4 mb-5">
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-cs_green text-white rounded-full flex items-center justify-center text-xl md:text-2xl shadow-xl shadow-green-500/30 relative">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div>
                            <p
                                class="text-[10px] font-semibold text-green-700/70 dark:text-green-400/70 uppercase tracking-widest leading-none mb-1">
                                Số dư ký quỹ</p>
                            <p class="text-xl md:text-2xl font-black text-cs_green tracking-tighter">10.000.000đ</p>
                        </div>
                    </div>

                    <p
                        class="text-[11px] md:text-xs font-semibold text-green-800/80 dark:text-green-300/80 leading-relaxed italic">
                        Từ ngày <span class="text-cs_green font-black">19/03/2022</span> MSTSoftware.VN đứng ra <span
                            class="bg-cs_green text-white px-1 font-bold">bảo lãnh 100%</span> cho thành viên <span
                            class="text-cs_green font-black">Võ Xuân Sang</span>.
                    </p>
                </div>

                <!-- Large Card: Services & Accounts -->
                <div
                    class="lg:col-span-2 bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 p-6 md:p-8 rounded-[35px] shadow-sm shadow-blue-900/5 relative">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <!-- Services -->
                        <div>
                            <h2
                                class="text-md md:text-lg font-black text-gray-800 dark:text-white uppercase tracking-tight border-l-4 border-cs_blue pl-3 mb-6">
                                Dịch vụ cung cấp</h2>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3 group/item">
                                    <div
                                        class="w-8 h-8 shrink-0 bg-blue-50 dark:bg-blue-900/30 text-cs_blue rounded-lg flex items-center justify-center group-hover/item:rotate-12 transition-transform text-sm">
                                        <i class="fa-solid fa-people-arrows"></i>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-black text-gray-800 dark:text-gray-200 text-xs md:text-[13px] uppercase">
                                            Giao dịch
                                            Trung gian - Đổi Tiền</h4>
                                        <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-0.5 font-bold italic">
                                            Nhanh chóng, an toàn.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3 group/item">
                                    <div
                                        class="w-8 h-8 shrink-0 bg-green-50 dark:bg-green-900/30 text-cs_green rounded-lg flex items-center justify-center group-hover/item:rotate-12 transition-transform text-sm">
                                        <i class="fa-solid fa-tags"></i>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-black text-gray-800 dark:text-gray-200 text-xs md:text-[13px] uppercase">
                                            Thu mua
                                            Acc & Tài khoản</h4>
                                        <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-0.5 font-bold italic">
                                            Gaming, Social...</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3 group/item">
                                    <div
                                        class="w-8 h-8 shrink-0 bg-orange-50 dark:bg-orange-900/30 text-cs_orange rounded-lg flex items-center justify-center group-hover/item:rotate-12 transition-transform text-sm">
                                        <i class="fa-solid fa-shop"></i>
                                    </div>
                                    <div>
                                        <h4
                                            class="font-black text-gray-800 dark:text-gray-200 text-xs md:text-[13px] uppercase">
                                            Kho Acc
                                            sẵn giá rẻ</h4>
                                        <div class="flex flex-wrap gap-2 mt-1.5">
                                            <a href="#"
                                                class="text-[9px] bg-gray-50 dark:bg-slate-800 px-2 py-0.5 rounded-md text-cs_blue hover:bg-cs_blue hover:text-white transition-colors">Kho
                                                1</a>
                                            <a href="#"
                                                class="text-[9px] bg-gray-50 dark:bg-slate-800 px-2 py-0.5 rounded-md text-cs_blue hover:bg-cs_blue hover:text-white transition-colors">Kho
                                                2</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Bank Accounts -->
                        <div>
                            <h2
                                class="text-md md:text-lg font-black text-gray-800 dark:text-white uppercase tracking-tight border-l-4 border-cs_red pl-3 mb-6">
                                Hệ thống thanh toán</h2>
                            <div class="space-y-3">
                                <?php
                                $banks = [['name' => 'Momo', 'number' => '0817337805', 'logo' => 'https://ui-avatars.com/api/?name=MO&background=e02a88&color=fff'], ['name' => 'BIDV', 'number' => '5321247995', 'logo' => 'https://ui-avatars.com/api/?name=BI&background=213a91&color=fff'], ['name' => 'Vietcombank', 'number' => '1047701405', 'logo' => 'https://ui-avatars.com/api/?name=VCB&background=00aeef&color=fff'], ['name' => 'MB Bank', 'number' => '1236089999', 'logo' => 'https://ui-avatars.com/api/?name=MB&background=0254cf&color=fff'], ['name' => 'Techcombank', 'number' => '867977777777', 'logo' => 'https://ui-avatars.com/api/?name=TCB&background=e31837&color=fff']];
                                ?>
                                @foreach ($banks as $bank)
                                    <div
                                        class="group/bank flex items-center justify-between p-2.5 bg-gray-50 dark:bg-slate-800/50 rounded-xl border border-gray-100 dark:border-gray-800 hover:border-cs_red/20 transition-all">
                                        <div class="flex items-center gap-2.5">
                                            <img src="{{ $bank['logo'] }}" class="w-8 h-8 rounded-lg"
                                                alt="{{ $bank['name'] }}">
                                            <div>
                                                <p
                                                    class="text-[8px] font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest leading-none">
                                                    {{ $bank['name'] }}</p>
                                                <p class="text-xs font-bold text-gray-800 dark:text-gray-200">
                                                    {{ $bank['number'] }}</p>
                                            </div>
                                        </div>
                                        <button
                                            class="w-7 h-7 flex items-center justify-center text-gray-400 hover:text-cs_red transition-colors text-xs"
                                            title="Copy">
                                            <i class="fa-regular fa-copy"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Watermark Stamp: Positioned dynamically -->
                    <div
                        class="absolute -bottom-2 -right-2 opacity-5 pointer-events-none group rotate-[-15deg] hidden lg:block">
                        <div
                            class="border-8 border-cs_red rounded-full p-6 flex flex-col items-center justify-center text-cs_red scale-110">
                            <i class="fa-solid fa-shield-check text-6xl"></i>
                            <span class="font-black text-2xl uppercase mt-3 tracking-widest">MSTSoftware.VN</span>
                            <span class="font-bold text-sm uppercase mt-1">BẢO HIỂM GIỮ QUỸ</span>
                        </div>
                    </div>

                    <!-- User Image style stamp (as requested in idea but stylized) -->
                    <div class="mt-12 pt-8 border-t border-gray-100 dark:border-gray-800 flex justify-end">
                        <div class="p-4 border-4 border-cs_red/20 rounded-xl border-dashed -rotate-2">
                            <div class="flex items-center gap-3 text-cs_red opacity-40 uppercase">
                                <i class="fa-solid fa-lock text-2xl"></i>
                                <div>
                                    <p class="text-[10px] font-black tracking-[0.2em] leading-none mb-1">QUỸ BẢO HIỂM MMO
                                    </p>
                                    <p class="text-xl font-black tracking-tight">MSTSoftware.VN</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Warning Section -->
            <div class="mt-20 text-center max-w-3xl mx-auto">
                <div class="w-16 h-1 bg-cs_red rounded-full mx-auto mb-8"></div>
                <h4 class="text-xs md:text-sm font-black text-gray-800 dark:text-gray-200 uppercase tracking-widest mb-4">
                    Cảnh báo quan trọng</h4>
                <p class="text-[11px] md:text-xs text-gray-500 dark:text-gray-400 font-semibold leading-relaxed">
                    Lưu ý: Chỉ chuyển khoản vào các số tài khoản được niêm yết tại đây. <br>
                    Mọi yêu cầu chuyển tiền từ các tài khoản khác, dù có thông tin trùng khớp tên, đều là lừa đảo. <br>
                    Hãy kiểm tra kỹ con dấu (Watermark) và link web <span
                        class="text-cs_red underline">MSTSoftware.VN</span>
                    chính chủ.
                </p>
            </div>

        </div>
    </main>

    <!-- Background Elements -->
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none z-0">
        <div class="absolute top-[10%] left-[5%] w-64 h-64 bg-cs_blue/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[10%] right-[5%] w-96 h-96 bg-cs_red/5 rounded-full blur-[150px]"></div>
    </div>
@endsection

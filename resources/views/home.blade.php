<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- SEO Optimization -->
    <title>[ CHECKSCAM ] - Hệ thống kiểm tra và tố giác scam uy tín nhất Việt Nam</title>
    <meta name="description"
        content="CheckScam - Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam. Tra cứu số điện thoại, số tài khoản, link Facebook lừa đảo để bảo vệ túi tiền của bạn.">
    <meta name="keywords" content="check scam, tố cáo lừa đảo, kiểm tra stk lừa đảo, kiểm tra sdt lừa đảo, quỹ bảo đảm">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="CheckScam - Hệ thống kiểm tra và tố giác scam">
    <meta property="og:description"
        content="Tra cứu thông tin kẻ lừa đảo ngay lập tức. Cùng cộng đồng xây dựng môi trường MMO sạch sẽ.">
    <meta property="og:image" content="https://i.ibb.co/Rkdy02SQ/output-lin-removebg-preview.png">

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cs_red: "#ff0000",
                        cs_blue: "#3399ff",
                        cs_green: "#2eb85c",
                        cs_orange: "#fdb813",
                    },
                    fontFamily: {
                        sans: ['Be Vietnam Pro', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <style>
        :root {
            --text-color: #ff0000;
            --light-color: #f3eded;
            --speed: 3s;
        }

        body {
            color: #333;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #999;
        }

        /* Mobile fixes */
        @media (max-width: 640px) {
            .hero-title {
                font-size: 1.5rem;
                line-height: 2rem;
            }
        }



        .scanner-title {
            position: relative;
            display: inline-block;
            background: linear-gradient(to bottom, #ff0000 0%, #cc0000 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            padding: 15px 0;
            margin: -15px 0;
            overflow: hidden;
        }

        /* Thanh Laser quét kiểu QR */
        .scanner-title::after {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            height: 2px;
            background: #ff0000;
            box-shadow: 0 0 15px 2px rgba(255, 0, 0, 0.7);
            z-index: 10;
            animation: qr-scan 2.5s ease-in-out infinite alternate;
        }

        @keyframes qr-scan {
            0% {
                top: 5%;
                opacity: 0;
            }

            20% {
                opacity: 1;
            }

            80% {
                opacity: 1;
            }

            100% {
                top: 90%;
                opacity: 0;
            }
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2">
                    <img src="https://i.ibb.co/fGp2Q415/white.png" alt="Logo Check Scam" class="h-10 md:h-12 w-auto" />
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-6 lg:space-x-8">
                    <a href="#" class="text-cs_red font-bold text-sm border-b-2 border-cs_red py-5">Trang Chủ</a>
                    <a href="#"
                        class="text-gray-600 hover:text-cs_red font-medium text-sm py-5 transition-colors">Tố Cáo</a>
                    <a href="#"
                        class="text-gray-600 hover:text-cs_blue font-medium text-sm py-5 transition-colors">Quỹ Bảo
                        Hiểm</a>
                    <a href="#"
                        class="text-gray-600 hover:text-cs_green font-medium text-sm py-5 transition-colors">Chợ Buôn
                        Bán</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-600 hover:text-black focus:outline-none p-2">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Drawer (Hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-xl animate-fade-in-down">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="#" class="block px-4 py-3 text-sm font-bold text-cs_red bg-red-50 rounded-lg">Trang
                    Chủ</a>
                <a href="#"
                    class="block px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">Tố
                    Cáo</a>
                <a href="#"
                    class="block px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">Quỹ
                    Bảo Hiểm</a>
                <a href="#"
                    class="block px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">Chợ
                    Buôn Bán</a>
            </div>
        </div>
    </header>

    <script>
        // Simple Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- Hero Section -->
    <section class="bg-white py-12 md:py-20 md:pb-2 overflow-hidden relative">
        <!-- Trang trí nền nhẹ -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none opacity-50">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-50 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-red-50 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1
                    class="text-3xl md:text-4xl lg:text-5xl font-black mb-6 uppercase leading-[1.4] hero-title scanner-title">
                    KIỂM TRA & TỐ CÁO SCAM.
                </h1>
                <p class="text-gray-600 mb-10 max-w-2xl mx-auto text-sm md:text-lg leading-relaxed font-medium">
                    Hệ thống dữ liệu lớn nhất Việt Nam giúp bạn kiểm tra độ tín nhiệm của đối tác thông qua SĐT, Số TK
                    hoặc Link mạng xã hội.
                </p>

                <!-- Search Box Centered -->
                <div class="max-w-3xl mx-auto mb-6">
                    <div
                        class="relative bg-white border-2 border-gray-200 rounded-2xl shadow-xl shadow-blue-900/5 focus-within:border-cs_blue focus-within:ring-4 focus-within:ring-blue-100 transition-all p-1 md:p-2">
                        <div class="flex flex-col sm:flex-row items-center gap-2">
                            <div class="flex-1 flex items-center w-full min-w-0">
                                <div class="pl-4 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-magnifying-glass text-gray-400 text-lg"></i>
                                </div>
                                <input type="text"
                                    class="w-full pl-3 pr-4 py-3 bg-transparent border-none focus:ring-0 text-gray-800 text-sm md:text-base font-bold placeholder-gray-400"
                                    placeholder="Nhập Số tài khoản, SĐT hoặc Link..." />
                            </div>
                            <button
                                class="w-full sm:w-auto bg-cs_blue hover:bg-blue-600 text-white px-8 py-3 rounded-xl font-black text-xs md:text-sm tracking-widest transition-all shadow-lg active:scale-95 whitespace-nowrap">
                                TRA CỨU
                            </button>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div
                        class="mt-6 flex flex-wrap justify-center gap-3 md:gap-8 text-[11px] md:text-sm font-bold text-gray-500">
                        <span class="flex items-center"><i
                                class="fa-solid fa-circle text-[6px] text-cs_red mr-2 animate-pulse"></i> 62.472 STK Lừa
                            đảo</span>
                        <span class="flex items-center"><i class="fa-solid fa-circle text-[6px] text-cs_blue mr-2"></i>
                            8.605 Bình luận mới</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 mt-8 md:mt-12">
                    <a href="#"
                        class="bg-white hover:bg-red-50 border border-gray-100 p-3 md:p-4 rounded-2xl flex items-center gap-3 md:gap-4 transition-all group shadow-xs">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-red-100 text-cs_red flex items-center justify-center md:text-xl shrink-0 group-hover:rotate-12 transition-transform">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[8px] md:text-[9px] font-black text-gray-400 uppercase">Report</p>
                            <p
                                class="font-black text-[10px] md:text-xs text-gray-800 uppercase group-hover:text-cs_red transition-colors">
                                Tố Cáo Scam</p>
                        </div>
                    </a>

                    <a href="#"
                        class="bg-white hover:bg-blue-50 border border-gray-100 p-3 md:p-4 rounded-2xl flex items-center gap-3 md:gap-4 transition-all group shadow-xs">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-blue-100 text-cs_blue flex items-center justify-center md:text-xl shrink-0 group-hover:rotate-12 transition-transform">
                            <i class="fa-solid fa-shield-cat"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[8px] md:text-[9px] font-black text-gray-400 uppercase">Insurance</p>
                            <p
                                class="font-black text-[10px] md:text-xs text-gray-800 uppercase group-hover:text-cs_blue transition-colors">
                                Bảo Hiểm CS</p>
                        </div>
                    </a>

                    <a href="#"
                        class="bg-white hover:bg-green-50 border border-gray-100 p-3 md:p-4 rounded-2xl flex items-center gap-3 md:gap-4 transition-all group shadow-xs">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-green-100 text-cs_green flex items-center justify-center md:text-xl shrink-0 group-hover:rotate-12 transition-transform">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[8px] md:text-[9px] font-black text-gray-400 uppercase">Trading</p>
                            <p
                                class="font-black text-[10px] md:text-xs text-gray-800 uppercase group-hover:text-cs_green transition-colors">
                                Chợ Buôn Bán</p>
                        </div>
                    </a>

                    <a href="#"
                        class="bg-white hover:bg-gray-50 border border-gray-100 p-3 md:p-4 rounded-2xl flex items-center gap-3 md:gap-4 transition-all group shadow-xs">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-gray-100 text-cs_blue flex items-center justify-center md:text-xl shrink-0 group-hover:rotate-12 transition-transform">
                            <i class="fa-brands fa-telegram"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[8px] md:text-[9px] font-black text-gray-400 uppercase">Automation</p>
                            <p
                                class="font-black text-[10px] md:text-xs text-gray-800 uppercase group-hover:text-cs_blue transition-colors">
                                Bot Check</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 w-full">

        <!-- Top Full Width Banner -->
        {{-- <article class="text-center overflow-hidden h-24 relative group cursor-pointer mb-8 w-full">
            <img src="https://i.ibb.co/TM2FQxWD/qcdesktop11022.gif" class="absolute inset-0 w-full h-18 md:h-full"
                alt="Quảng cáo banner">
        </article> --}}

        <h2 class="text-xs md:text-xl text-center uppercase text-cs_blue mb-6 mt-6 tracking-widest">
            <?php echo date('d/m/Y'); ?> CÓ 26 CẢNH BÁO</h2>

        <!-- 2 Column Layout -->
        <div class="flex flex-col lg:flex-row gap-4 mb-10">
            <!-- Khu Vực Trái: Các danh sách cảnh báo -->
            <div class="w-full lg:w-9/12 space-y-8">

                <!-- PHẦN 1: CẢNH BÁO NGÀY HÔM NAY -->
                <section>
                    {{-- <div class="flex items-center gap-2 mb-4 border-l-4 border-cs_red pl-3">
                        <h2 class="text-lg font-bold text-gray-800 uppercase"><?php echo date('d/m/Y'); ?> CÓ CẢNH BÁO</h2>
                        <span class="bg-red-100 text-cs_red text-[10px] px-2 py-0.5 rounded-full font-bold">MỚI</span>
                    </div> --}}
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-xs">
                        <?php for($i=1; $i<=3; $i++): ?>
                        <div
                            class="flex flex-col sm:flex-row items-center p-4 <?php echo $i < 3 ? 'border-b border-gray-100' : ''; ?> hover:bg-gray-50 transition-colors gap-3 sm:gap-0">
                            <div class="w-full sm:w-5/12 flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-cs_red flex items-center justify-center text-xs shrink-0">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-900 text-xs md:text-sm font-bold">Nguyễn Văn A -
                                        <?php echo $i; ?></h3>
                                    <div class="text-[9px] md:text-[10px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>Vừa xong
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 sm:border-l border-gray-100 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 uppercase font-bold">Tài khoản</span>
                                    <span class="text-xs font-black text-cs_red">0987654321***</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/12 text-right">
                                <a href="#"
                                    class="inline-block bg-blue-50 text-cs_blue px-3 py-1 rounded text-[10px] font-black hover:bg-cs_blue hover:text-white transition-all uppercase">Chi
                                    tiết</a>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </section>

                <!-- BANNER QUẢNG CÁO 1 -->
                <article class="max-w-[950px]">
                    <a href="#" target="_blank">
                        <img src="https://i.ibb.co/Z1kFjpWw/lienquangiaredt.gif" class="w-full h-18 md:h-full"
                            alt="Ads">
                    </a>
                </article>

                <!-- PHẦN 2: LỪA ĐẢO PHỔ BIẾN 7 NGÀY GẦN ĐÂY -->
                <section>
                    <div class="flex items-center gap-2 mb-4 border-l-4 border-cs_blue pl-3">
                        <h2 class="text-lg font-bold text-gray-800 uppercase">Lừa đảo phổ biến 7 ngày gần đây</h2>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-xs">
                        <?php for($i=1; $i<=7; $i++): ?>
                        <div
                            class="flex flex-col sm:flex-row items-center p-4 <?php echo $i < 3 ? 'border-b border-gray-100' : ''; ?> hover:bg-gray-50 transition-colors gap-3 sm:gap-0">
                            <div class="w-full sm:w-5/12 flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-cs_red flex items-center justify-center text-xs shrink-0">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-900 text-xs md:text-sm font-bold">Nguyễn Văn A -
                                        <?php echo $i; ?></h3>
                                    <div class="text-[9px] md:text-[10px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>Vừa xong
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 sm:border-l border-gray-100 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 uppercase font-bold">Tài khoản</span>
                                    <span class="text-xs font-black text-cs_red">0987654321***</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/12 text-right">
                                <a href="#"
                                    class="inline-block bg-blue-50 text-cs_blue px-3 py-1 rounded text-[10px] font-black hover:bg-cs_blue hover:text-white transition-all uppercase">Chi
                                    tiết</a>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </section>

                <!-- BANNER QUẢNG CÁO 2 -->
                <article class="max-w-[950px]">
                    <a href="#" target="_blank">
                        <img src="https://i.ibb.co/BV9hbrP2/banner3.gif" class="w-full h-18 md:h-full"
                            alt="Ads">
                    </a>
                </article>

                <!-- PHẦN 3: TOP 3 TÌM KIẾM NGÀY -->
                <section>
                    <div class="flex items-center gap-2 mb-4 border-l-4 border-cs_orange pl-3">
                        <h2 class="text-lg font-bold text-gray-800 uppercase">Top 3 tìm kiếm ngày</h2>
                        <i class="fa-solid fa-fire text-cs_orange animate-pulse"></i>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-xs">
                        <?php for($i=1; $i<=3; $i++): ?>
                        <div
                            class="flex flex-col sm:flex-row items-center p-4 <?php echo $i < 3 ? 'border-b border-gray-100' : ''; ?> hover:bg-gray-50 transition-colors gap-3 sm:gap-0">
                            <div class="w-full sm:w-5/12 flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-50 text-cs_red flex items-center justify-center text-xs shrink-0">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h3 class="text-gray-900 text-xs md:text-sm font-bold">Nguyễn Văn A -
                                        <?php echo $i; ?></h3>
                                    <div class="text-[9px] md:text-[10px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>Vừa xong
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 sm:border-l border-gray-100 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 uppercase font-bold">Tài khoản</span>
                                    <span class="text-xs font-black text-cs_red">0987654321***</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/12 text-right">
                                <a href="#"
                                    class="inline-block bg-blue-50 text-cs_blue px-3 py-1 rounded text-[10px] font-black hover:bg-cs_blue hover:text-white transition-all uppercase">Chi
                                    tiết</a>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </section>


            </div>

            <!-- Khu Vực Phải: Sidebar Widget -->
            <aside class="w-full lg:w-3/12 space-y-3">
                <!-- Right Sidebar Banner -->
                <div class="aspect-square border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                    <a href="#" target="_blank" class="w-full h-full block">
                        <img src="https://i.ibb.co/kgwtn4vF/fpayment.jpg" class="w-full h-full" alt="Fpayment Ads">
                    </a>
                </div>


                <div class="aspect-square border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                    <a href="#" target="_blank" class="w-full h-full block">
                        <img src="https://png.pngtree.com/png-clipart/20250126/original/pngtree-hologram-gradient-flash-sale-square-poster-banner-promotion-vector-png-image_19237469.png"
                            class="w-full h-full" alt="Fpayment Ads">
                    </a>
                </div>
                <!-- Action Button -->
                <div class="bg-red-50 border border-red-200 p-6 rounded-xl text-center shadow-sm">
                    <div
                        class="w-12 h-12 bg-red-100 text-cs_red rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-md mb-2 text-gray-800">BẠN ĐANG BỊ SCAM?</h3>
                    <p class="text-gray-600 text-[13px] mb-5 leading-relaxed">
                        Chặn đứng kẻ gian bằng cách báo cáo ngay lên hệ thống. Đóng góp của bạn giúp cộng đồng MMO
                        an toàn hơn.
                    </p>
                    <button
                        class="w-full bg-cs_red shadow-sm text-white font-bold py-3 px-4 text-sm rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fa-regular fa-paper-plane mr-1"></i> GỬI ĐƠN TỐ CÁO
                    </button>
                </div>

                <!-- Box Quỹ Bảo Hiểm -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-5">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-bold text-[13px] md:text-sm text-gray-800 uppercase flex items-center gap-2">
                            <i class="fa-solid fa-shield text-cs_green"></i> QUỸ BẢO HIỂM CS
                        </h2>
                        <a href="#" class="text-[10px] md:text-xs text-cs_blue hover:underline">Xem Quỹ</a>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <!-- Avatar items -->
                        <?php
                            $avatars = [
                                ['name' => 'Lê Vũ', 'color' => '2eb85c', 'title' => 'Lê Tuấn Vũ - 50 Triệu'],
                                ['name' => 'Hải Phạm', 'color' => '3399ff', 'title' => 'Hải Phạm - 30 Triệu'],
                                ['name' => 'Nam Hoàng', 'color' => 'fdb813', 'title' => 'Nam Hoàng - 100 Triệu'],
                                ['name' => 'Hữu Thắng', 'color' => '8b5cf6', 'title' => 'Hữu Thắng - 80 Triệu'],
                                ['name' => 'Kiều Oanh', 'color' => 'ec4899', 'title' => 'Kiều Oanh - 40 Triệu'],
                                ['name' => 'Minh Tiến', 'color' => '0f766e', 'title' => 'Minh Tiến - 10 Triệu'],
                                ['name' => 'Gia Bảo', 'color' => 'c2410c', 'title' => 'Gia Bảo - 60 Triệu'],
                            ];
                            foreach($avatars as $av): ?>
                        <a href="#" class="flex flex-col items-center relative" title="<?php echo $av['title']; ?>">
                            <div class="relative mb-1">
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($av['name']); ?>&background=<?php echo $av['color']; ?>&color=fff&size=48"
                                    alt="<?php echo $av['name']; ?>"
                                    class="rounded-full w-10 h-10 md:w-12 md:h-12 border-2 border-gray-100 object-cover shadow-sm">
                                <div
                                    class="absolute bottom-0 right-0 w-3 h-3 md:w-4 md:h-4 bg-cs_blue rounded-full border-2 border-white flex items-center justify-center">
                                    <i class="fa-solid fa-check text-white text-[6px] md:text-[8px]"></i>
                                </div>
                            </div>
                            <span
                                class="text-[8px] md:text-[10px] text-gray-600 font-medium text-center truncate w-full">
                                <?php echo $av['name']; ?>
                            </span>
                        </a>
                        <?php endforeach; ?>

                        <a href="#" class="flex flex-col items-center relative" title="Xem tất cả">
                            <div class="relative mb-1">
                                <div
                                    class="rounded-full w-10 h-10 md:w-12 md:h-12 bg-gray-100 border-2 border-gray-200 flex items-center justify-center text-gray-500 shadow-sm">
                                    <i class="fa-solid fa-arrow-right text-xs"></i>
                                </div>
                            </div>
                            <span
                                class="text-[8px] md:text-[10px] text-gray-600 font-medium text-center truncate w-full">Tất
                                cả +50</span>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
        </section>

        <!-- NEW FULL-WIDTH SECTIONS -->
        <div class="mt-16 sm:mt-20 space-y-12 sm:space-y-16">
            <!-- Section Lịch Sử Bình Luận -->
            <section aria-labelledby="comments-history-title">
                <div class="max-w-4xl mx-auto text-center mb-8">
                    <h2 id="comments-history-title"
                        class="text-xl md:text-2xl font-black text-gray-800 uppercase tracking-tight">
                        <i class="fa-solid fa-comments text-cs_blue mr-2"></i>Bình luận <span class="text-cs_blue">mới
                            nhất</span>
                    </h2>
                    <p class="text-gray-500 text-[10px] md:text-xs mt-2 uppercase tracking-widest font-bold">Cập nhật
                        hoạt động từ cộng đồng</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
                    <?php
                    $comments = [
                        ['user' => 'Lê Văn Tám', 'time' => '2 phút trước', 'content' => 'Thằng này vừa lừa mình 500k tiền cọc mua acc, mọi người cẩn thận nhé.', 'target' => '0981.234.xxx', 'color' => '3b82f6'],
                        ['user' => 'Nguyễn Bích', 'time' => '15 phút trước', 'content' => 'Cảm ơn CheckScam, nhờ tra cứu mà mình không bị mất tiền cho đứa này.', 'target' => 'Vietcombank - 102...', 'color' => '10b981'],
                        ['user' => 'Trần Quang', 'time' => '1 giờ trước', 'content' => 'Thấy nó đăng bài uy tín lắm mà check ra đầy vết đen. Sợ thật!', 'target' => 'fb.com/quang_scam', 'color' => 'f59e0b'],
                        ['user' => 'Minh Anh', 'time' => '3 giờ trước', 'content' => 'Mọi người lưu ý số tài khoản này nhá, chuyên đi lừa đảo thẻ cào.', 'target' => '0342.999.xxx', 'color' => 'ef4444'],
                        ['user' => 'Hoàng Nam', 'time' => '5 giờ trước', 'content' => 'Web quá hữu ích, nên có thêm nhiều người chung tay tố cáo.', 'target' => 'Cộng đồng CS', 'color' => '6366f1'],
                        ['user' => 'Thu Thảo', 'time' => '8 giờ trước', 'content' => 'Mình đã gửi bằng chứng lên rồi, mong admin sớm duyệt để cảnh báo.', 'target' => 'Đang chờ duyệt', 'color' => 'ec4899'],
                        ['user' => 'Thanh Ngân', 'time' => '12 giờ trước', 'content' => 'Mọi người cẩn thận với số tài khoản này nhé, chuyên đi lừa đảo thẻ cào.', 'target' => '0772.345.xxx', 'color' => '8b5cf6'],
                        ['user' => 'Duy Mạnh', 'time' => '1 ngày trước', 'content' => 'Vừa check xong, xém tí thì chuyển khoản cho nó. May quá!', 'target' => 'Momo - 0941...', 'color' => '06b6d4'],
                    ];
                    foreach($comments as $cmt): ?>
                    <div class="bg-white border border-gray-100 p-5 rounded-2xl shadow-xs">
                        <div class="flex items-center gap-3 mb-4">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($cmt['user']); ?>&background=<?php echo $cmt['color']; ?>&color=fff&size=40"
                                class="w-10 h-10 rounded-full border-2 border-gray-50" alt="User">
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm"><?php echo $cmt['user']; ?></h4>
                                <span class="text-[10px] text-gray-400 font-medium"><?php echo $cmt['time']; ?></span>
                            </div>
                        </div>
                        <p class="text-gray-600 text-xs leading-relaxed mb-4 line-clamp-2 italic">
                            "<?php echo $cmt['content']; ?>"
                        </p>
                        <div class="flex items-center justify-between pt-3 border-t border-gray-50">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">Đối
                                tượng:</span>
                            <span
                                class="text-[10px] font-black text-cs_red bg-red-50 px-2 py-0.5 rounded"><?php echo $cmt['target']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8 text-center">
                    <a href="#"
                        class="text-xs font-black text-cs_blue hover:underline uppercase tracking-widest">
                        Xem tất cả bình luận <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </section>

            <!-- Section Bí Quyết Giao Dịch -->
            <section aria-labelledby="safety-tips-title"
                class="bg-gradient-to-br from-white to-blue-50/50 border border-blue-100/50 rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-12 shadow-xs">
                <div class="max-w-4xl mx-auto text-center mb-8 md:mb-12">
                    <span
                        class="inline-block px-3 py-1 bg-cs_blue/10 text-cs_blue text-[10px] font-bold uppercase tracking-widest rounded-full mb-4">Cẩm
                        nang an toàn</span>
                    <h2 id="safety-tips-title"
                        class="text-xl md:text-2xl lg:text-3xl font-black text-gray-800 uppercase tracking-tight">
                        Cách giao dịch <span class="text-cs_blue">không lừa đảo</span>
                    </h2>
                    <p class="text-gray-500 text-xs md:text-sm mt-3 leading-relaxed">
                        Thế giới MMO đầy rẫy rủi ro, nắm vững 3 nguyên tắc "vàng" túi tiền sẽ được bảo vệ tuyệt đối.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <article class="group bg-white p-6 sm:p-8 rounded-lg shadow-sm border border-gray-50">
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-blue-50 text-cs_blue rounded-xl flex items-center justify-center mb-6 border border-blue-100">
                            <i class="fa-solid fa-magnifying-glass-chart text-lg md:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 text-base md:text-lg mb-3">Luôn luôn kiểm tra</h4>
                        <p class="text-xs md:text-sm text-gray-600 leading-relaxed">
                            Hãy <span class="font-bold text-cs_blue">copy SĐT/STK</span> dán vào CheckScam để xem họ có
                            "vết đen" nào không.
                        </p>
                    </article>

                    <article class="group bg-white p-6 sm:p-8 rounded-lg shadow-sm border border-gray-50">
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-green-50 text-cs_green rounded-xl flex items-center justify-center mb-6 border border-green-100">
                            <i class="fa-solid fa-user-shield text-lg md:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 text-base md:text-lg mb-3">Sử dụng trung gian</h4>
                        <p class="text-xs md:text-sm text-gray-600 leading-relaxed">
                            Với giao dịch lạ, hãy mời một <span class="font-bold text-cs_green">Trung Gian Uy
                                Tín</span> có đóng quỹ bảo hiểm.
                        </p>
                    </article>

                    <article class="group bg-white p-6 sm:p-8 rounded-lg shadow-sm border border-gray-50">
                        <div
                            class="w-12 h-12 md:w-14 md:h-14 bg-red-50 text-cs_red rounded-xl flex items-center justify-center mb-6 border border-red-100">
                            <i class="fa-solid fa-bolt-lightning text-lg md:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 text-base md:text-lg mb-3">Cảnh giác link lạ</h4>
                        <p class="text-xs md:text-sm text-gray-600 leading-relaxed">
                            Link "xác nhận tiền" hay "nhập OTP" đều là bẫy. Ngân hàng <span
                                class="font-bold text-cs_red">không bao giờ</span> yêu cầu.
                        </p>
                    </article>
                </div>
            </section>

            <!-- Box FAQ -->
            <section aria-labelledby="faq-title" class="max-w-5xl mx-auto px-4">
                <div class="flex flex-col items-center mb-8 md:mb-10 text-center">
                    <div class="w-12 h-1 bg-cs_blue rounded-full mb-6"></div>
                    <h2 id="faq-title" class="text-xl md:text-2xl font-black text-gray-800 uppercase tracking-tight">
                        Trợ giúp & Giải đáp</h2>
                    <p class="text-gray-500 text-xs md:text-sm mt-2">Mọi thắc mắc về hệ thống CheckScam đều có tại đây.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-3 items-start">
                    <details
                        class="group bg-white border border-gray-200 rounded-2xl shadow-xs hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold">01</span>
                                <h3 class="font-bold text-gray-700 text-xs md:text-sm">Làm sao để tố cáo lừa đảo?</h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 border-t border-gray-50 pt-3">
                            Bấm vào nút <span class="text-cs_red font-bold uppercase">Gửi đơn tố cáo</span>, điền thông
                            tin kẻ lừa đảo kèm hình ảnh bằng chứng rõ ràng. Admin sẽ duyệt trong 24h.
                        </div>
                    </details>

                    <details
                        class="group bg-white border border-gray-200 rounded-2xl shadow-xs hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold">02</span>
                                <h3 class="font-bold text-gray-700 text-xs md:text-sm">Tại sao bài phốt chưa được
                                    duyệt?</h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 border-t border-gray-50 pt-3">
                            Hệ thống kiểm tra thủ công để tránh tình trạng tố cáo ảo. Nếu sau 24h chưa duyệt, hãy kiểm
                            tra lại tính minh bạch của bằng chứng bạn gửi.
                        </div>
                    </details>

                    <details
                        class="group bg-white border border-gray-200 rounded-2xl shadow-xs hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold">03</span>
                                <h3 class="font-bold text-gray-700 text-xs md:text-sm">Quỹ Bảo Đảm hoạt động thế nào?
                                </h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 border-t border-gray-50 pt-3">
                            Trung gian uy tín đóng quỹ (tiền ký quỹ) cho Admin. Nếu họ lừa đảo, Admin dùng tiền đó đền
                            bù cho bạn 100%.
                        </div>
                    </details>

                    <details
                        class="group bg-white border border-gray-200 rounded-2xl shadow-sm hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-4 md:p-5 list-none">
                            <div class="flex items-center gap-3 md:gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-cs_blue flex items-center justify-center text-[10px] md:text-xs font-bold">04</span>
                                <h3 class="font-bold text-gray-700 text-xs md:text-sm">Tôi có thể xin gỡ bài viết
                                    không?</h3>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-[10px] md:text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-12 md:pl-[68px] text-[11px] md:text-[13px] leading-relaxed text-gray-500 border-t border-gray-50 pt-3">
                            Chỉ gỡ khi người tố cáo xác nhận đã giải quyết xong. Chúng tôi KHÔNG gỡ vì hối lộ hay áp lực
                            từ kẻ lừa đảo.
                        </div>
                    </details>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t-4 border-cs_red text-gray-300 pt-10 pb-6 mt-10 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8 pb-8 border-b border-gray-800">
                <div class="col-span-1 sm:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="https://i.ibb.co/0L23FkR/black.png" alt="Footer Logo" class="w-auto h-8 md:h-12" />

                    </div>
                    <p class="text-gray-400 leading-relaxed max-w-sm text-xs md:text-sm">
                        Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam. Cung cấp thông tin tham khảo giúp bạn
                        an tâm hơn trước các giao dịch online.
                    </p>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 uppercase text-[10px] md:text-xs tracking-wider">Hệ Thống</h4>
                    <ul class="space-y-2 text-gray-400 text-xs md:text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Quy trình duyệt phốt</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Danh sách quỹ bảo hiểm</a>
                        </li>
                        <li><a href="#" class="hover:text-white transition-colors">Bot Telegram thông minh</a>
                        </li>
                        <li><a href="#" class="hover:text-white transition-colors">Đăng ký đối tác</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 uppercase text-[10px] md:text-xs tracking-wider">Hỗ Trợ</h4>
                    <ul class="space-y-2 text-gray-400 text-xs md:text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Liên hệ Admin</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Điều khoản dịch vụ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Chính sách bảo mật</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Giải quyết sai sót</a></li>
                    </ul>
                </div>
            </div>

            <div
                class="flex flex-col md:flex-row justify-between items-center text-[10px] md:text-xs text-gray-500 gap-4">
                <p class="text-center md:text-left">&copy; {{ date('Y') }} Bản quyền thuộc về CheckScam. Nền tảng
                    dữ liệu cộng đồng. | Phát triển bởi <a href="https://mst.vn"
                        class="hover:text-white font-medium">MST Software</a></p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-white" aria-label="Facebook"><i
                            class="fa-brands fa-facebook text-lg"></i></a>
                    <a href="#" class="hover:text-white" aria-label="Telegram"><i
                            class="fa-brands fa-telegram text-lg"></i></a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>

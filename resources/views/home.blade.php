<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>[ CHECKSCAM ] - Hệ thống kiểm tra và tố giác scam</title>
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
                    // colors: {
                    //     cs_red: "#ff0000",
                    //     cs_blue: "#3399ff",
                    //     cs_green: "#2eb85c",
                    //     cs_orange: "#fdb813",
                    // },
                    fontFamily: {
                        sans: ['Be Vietnam Pro', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <style>
        body {
            /* background-color: #f8f9fa; */
            color: #333;
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
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="#" class="flex items-center gap-2">
                    {{-- <div class="w-9 h-9 bg-cs_red text-white flex items-center justify-center rounded">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <span class="text-xl font-black uppercase text-gray-800 tracking-tight">
                        Check<span class="text-cs_red">Scam</span>
                    </span> --}}
                    <img src="https://i.ibb.co/Rkdy02SQ/output-lin-removebg-preview.png" alt="Logo Check Scam"
                        class="w-30 h-14" />
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
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

                <!-- Header Actions -->
                <div class="flex items-center gap-3">
                    <button class="hidden md:block text-gray-600 font-medium text-sm hover:text-black">
                        <i class="fa-solid fa-user-shield mr-1"></i> Quản Trị
                    </button>
                    <button
                        class="bg-cs_red hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-bold shadow-sm transition-colors">
                        Đăng Nhập
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-white py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-10 z-1 relative">
                <!-- Search Column -->
                <div class="w-full lg:w-3/5">
                    <h1 class="text-2xl md:text-4xl font-black text-gray-900 mb-4 uppercase leading-tight">
                        <span class="text-cs_red">KIỂM TRA & TỐ CÁO SCAM.</span>
                    </h1>
                    <p class="text-gray-600 mb-8 max-w-xl text-sm md:text-base leading-relaxed">
                        Dữ liệu lừa đảo được cập nhật liên tục từ cộng đồng. Hãy bảo vệ túi tiền của bạn bằng cách tra
                        cứu SĐT, Số TK hoặc Link mạng xã hội mờ ám.
                    </p>

                    <!-- Search Box -->
                    <div
                        class="relative bg-white border-2 border-gray-300 rounded-lg shadow-sm focus-within:border-cs_blue focus-within:ring-2 focus-within:ring-blue-100 transition-all">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-gray-400 text-lg"></i>
                        </div>
                        <input type="text"
                            class="w-full pl-12 pr-32 py-4 rounded-lg bg-transparent border-none focus:ring-0 text-gray-800 text-base font-medium placeholder-gray-400"
                            placeholder="Tra cứu Số tài khoản, SĐT..." />
                        <div class="absolute inset-y-1 right-1">
                            <button
                                class="h-full bg-cs_blue hover:bg-blue-600 text-white px-6 rounded-md font-bold text-sm tracking-wide transition-colors">
                                TRA CỨU
                            </button>
                        </div>
                    </div>

                    <div class="mt-4 flex flex-wrap gap-4 text-xs font-medium text-gray-500">
                        <span class="flex items-center gap-1"><i class="fa-solid fa-circle text-[8px] text-cs_red"></i>
                            62.472 STK Lừa đảo</span>
                        <span class="flex items-center gap-1"><i class="fa-solid fa-circle text-[8px] text-cs_blue"></i>
                            8.605 Bình luận</span>
                    </div>

                </div>


                <!-- Shortcuts Column -->
                <div class="w-full lg:w-2/5">
                    <div class="grid grid-cols-2 gap-3">
                        <a href="#"
                            class="bg-red-50 hover:bg-red-100 border border-red-200 text-cs_red p-4 rounded-xl flex flex-col items-center justify-center text-center transition-colors group">
                            <i
                                class="fa-solid fa-bullhorn text-2xl mb-2 group-hover:scale-110 transition-transform duration-200"></i>
                            <span class="font-bold text-sm uppercase">Tố Cáo Scam</span>
                        </a>
                        <a href="#"
                            class="bg-blue-50 hover:bg-blue-100 border border-blue-200 text-cs_blue p-4 rounded-xl flex flex-col items-center justify-center text-center transition-colors group">
                            <i
                                class="fa-solid fa-shield-cat text-2xl mb-2 group-hover:scale-110 transition-transform duration-200"></i>
                            <span class="font-bold text-sm uppercase">Bảo Hiểm CS</span>
                        </a>
                        <a href="#"
                            class="bg-green-50 hover:bg-green-100 border border-green-200 text-cs_green p-4 rounded-xl flex flex-col items-center justify-center text-center transition-colors group">
                            <i
                                class="fa-solid fa-store text-2xl mb-2 group-hover:scale-110 transition-transform duration-200"></i>
                            <span class="font-bold text-sm uppercase">Chợ Buôn Bán</span>
                        </a>
                        <a href="#"
                            class="bg-gray-50 hover:bg-gray-100 border border-gray-200 text-gray-700 p-4 rounded-xl flex flex-col items-center justify-center text-center transition-colors group">
                            <i
                                class="fa-brands fa-telegram text-2xl mb-2 text-cs_blue group-hover:scale-110 transition-transform duration-200"></i>
                            <span class="font-bold text-sm uppercase">Bot Check</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Main Content -->
    <main class="grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 py-4 w-full">

        <!-- Top Full Width Banner -->
        {{-- <div
            class="bg-gray-800 text-center rounded-xl overflow-hidden border border-gray-700 p-4 flex flex-col justify-center items-center h-24 sm:h-28 relative group cursor-pointer mb-10 w-full">
            <img src="https://images.unsplash.com/photo-1563986768494-4dee2763ff0f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                class="absolute inset-0 w-full h-full object-cover opacity-30 group-hover:opacity-50 transition-opacity"
                alt="Ads">
            <p
                class="relative z-10 text-white font-bold tracking-widest uppercase opacity-70 group-hover:opacity-100 shadow-sm text-sm md:text-base">
                Banner Quảng Cáo
            </p>
            <p class="relative z-10 text-white/50 text-[10px] mt-1">Liên hệ đặt banner quảng cáo</p>
        </div> --}}
        <div
            class="text-center overflow-hidden p-4 flex flex-col justify-center items-center h-24 relative group cursor-pointer mb-10 w-full">
            <img src="https://i.ibb.co/TM2FQxWD/qcdesktop11022.gif" class="absolute inset-0 w-full h-full"
                alt="Ads">

        </div>

        <h2 class="text-xl text-center uppercase text-cs_blue mb-5 mt-4"><?php echo date('d/m/Y'); ?>
            CÓ CẢNH BÁO
        </h2>

        <!-- 2 Column Layout -->
        <div class="flex flex-col lg:flex-row gap-4 mb-10">
            <!-- Khu Vực Trái: Danh Sách Cảnh Báo -->
            <div class="w-full lg:w-2/3">


                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <!-- Item 1 -->
                    <div
                        class="flex flex-col sm:flex-row items-center p-4 border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <div class="w-full sm:w-5/12 mb-2 sm:mb-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-cs_blue text-xs"><i class="fa-solid fa-circle-exclamation"></i></span>
                                <h3 class=" text-gray-900 text-base">Vũ Mạnh P.</h3>
                            </div>
                            <div class="text-xs text-gray-500 pl-5">
                                <i class="fa-regular fa-clock mr-1"></i>04 tháng 03, 2026
                            </div>
                        </div>
                        <div class="w-full sm:w-5/12 mb-2 sm:mb-0 pl-5 sm:pl-0  border-gray-200 sm:px-4">
                            <div class="text-sm">Ngân hàng: <span class="font-medium text-gray-800">Vietcombank</span>
                            </div>
                            <div class="text-sm">Số TK: <span class="font-bold text-cs_red">1029384**</span></div>
                        </div>
                        <div class="w-full sm:w-2/12 sm:text-right pl-5 sm:pl-0 flex items-center sm:justify-end gap-3">
                            <span class="text-xs text-gray-400 flex items-center gap-1" title="Lượt xem"><i
                                    class="fa-solid fa-eye text-cs_orange"></i> 263</span>
                            <a href="#" class="text-cs_blue hover:text-blue-800 text-sm font-semibold ml-2">Chi
                                tiết</a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div
                        class="flex flex-col sm:flex-row items-center p-4 border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <div class="w-full sm:w-5/12 mb-2 sm:mb-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-cs_blue text-xs"><i
                                        class="fa-solid fa-circle-exclamation"></i></span>
                                <h3 class=" text-gray-900 text-base">Truong Quoc P.</h3>
                            </div>
                            <div class="text-xs text-gray-500 pl-5">
                                <i class="fa-regular fa-clock mr-1"></i>04 tháng 03, 2026
                            </div>
                        </div>
                        <div class="w-full sm:w-5/12 mb-2 sm:mb-0 pl-5 sm:pl-0  border-gray-200 sm:px-4">
                            <div class="text-sm">Ngân hàng: <span class="font-medium text-gray-800">Techcombank</span>
                            </div>
                            <div class="text-sm">Số điện thoại: <span class="font-bold text-cs_red">0987112**</span>
                            </div>
                        </div>
                        <div
                            class="w-full sm:w-2/12 sm:text-right pl-5 sm:pl-0 flex items-center sm:justify-end gap-3">
                            <span class="text-xs text-gray-400 flex items-center gap-1"><i
                                    class="fa-solid fa-eye text-cs_orange"></i> 183</span>
                            <a href="#" class="text-cs_blue hover:text-blue-800 text-sm font-semibold ml-2">Chi
                                tiết</a>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div
                        class="flex flex-col sm:flex-row items-center p-4 border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <div class="w-full sm:w-5/12 mb-2 sm:mb-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-cs_blue text-xs"><i
                                        class="fa-solid fa-circle-exclamation"></i></span>
                                <h3 class=" text-gray-900 text-base">Le Ngoc Anh .</h3>
                            </div>
                            <div class="text-xs text-gray-500 pl-5">
                                <i class="fa-regular fa-clock mr-1"></i>04 tháng 03, 2026
                            </div>
                        </div>
                        <div class="w-full sm:w-5/12 mb-2 sm:mb-0 pl-5 sm:pl-0  border-gray-200 sm:px-4">
                            <div class="text-sm">Dịch vụ: <span class="font-medium text-gray-800">Buff Facebook</span>
                            </div>
                            <div class="text-sm">Mạng xã hội: <span
                                    class="font-bold text-cs_red">fb.com/leanh**</span></div>
                        </div>
                        <div
                            class="w-full sm:w-2/12 sm:text-right pl-5 sm:pl-0 flex items-center sm:justify-end gap-3">
                            <span class="text-xs text-gray-400 flex items-center gap-1"><i
                                    class="fa-solid fa-eye text-cs_orange"></i> 210</span>
                            <a href="#" class="text-cs_blue hover:text-blue-800 text-sm font-semibold ml-2">Chi
                                tiết</a>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div
                        class="flex flex-col sm:flex-row items-center p-4 border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <div class="w-full sm:w-5/12 mb-2 sm:mb-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-cs_blue text-xs"><i
                                        class="fa-solid fa-circle-exclamation"></i></span>
                                <h3 class=" text-gray-900 text-base">Nhóm Phishing Bank</h3>
                            </div>
                            <div class="text-xs text-gray-500 pl-5">
                                <i class="fa-regular fa-clock mr-1"></i>03 tháng 03, 2026
                            </div>
                        </div>
                        <div class="w-full sm:w-5/12 mb-2 sm:mb-0 pl-5 sm:pl-0  border-gray-200 sm:px-4">
                            <div class="text-sm">Web lừa đảo: <span
                                    class="font-medium text-gray-800">vcb-online.***</span></div>
                            <div class="text-sm text-gray-500 italic">Mạo danh trang chủ VCB</div>
                        </div>
                        <div
                            class="w-full sm:w-2/12 sm:text-right pl-5 sm:pl-0 flex items-center sm:justify-end gap-3">
                            <span class="text-xs text-gray-400 flex items-center gap-1"><i
                                    class="fa-solid fa-eye text-cs_orange"></i> 542</span>
                            <a href="#" class="text-cs_blue hover:text-blue-800 text-sm font-semibold ml-2">Chi
                                tiết</a>
                        </div>
                    </div>
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <a href="#"
                        class="text-cs_blue border border-cs_blue hover:bg-blue-50 py-2 px-4 rounded text-sm font-medium transition-colors">
                        Xem tất cả cảnh báo &rarr;
                    </a>

                    <!-- Top Scammers -->
                    <div class="text-right flex items-center text-sm">
                        <span class="text-gray-500 mr-2">Top lừa đảo tuần:</span>
                        <a href="#"
                            class="font-bold text-gray-800 hover:text-cs_red border-b border-dotted border-gray-400">0587701**</a>,
                        <a href="#"
                            class="font-bold text-gray-800 hover:text-cs_red border-b border-dotted border-gray-400 ml-1">0562015**</a>
                    </div>
                </div>
            </div>

            <!-- Khu Vực Phải: Sidebar Widget -->
            <div class="w-full lg:w-1/3 space-y-6">





                <!-- Right Sidebar Banner -->
                {{-- <div
                    class="bg-gray-800 text-center rounded-lg overflow-hidden border border-gray-700 p-6 flex flex-col justify-center items-center h-32 relative group cursor-pointer">
                    <img src="https://checkscam.vn/wp-content/themes/dkqh/a/i/qcdesktop11022.gif"
                        class="absolute inset-0 w-full h-full object-cover opacity-30 group-hover:opacity-50 transition-opacity"
                        alt="Ads">
                    <p
                        class="relative z-10 text-white font-bold tracking-widest uppercase opacity-70 group-hover:opacity-100 shadow-sm text-sm">
                        Banner Quảng Cáo
                    </p>
                    <p class="relative z-10 text-white/50 text-[10px] mt-1">Liên hệ đặt banner</p>
                </div> --}}
                <div
                    class="relative group cursor-pointer aspect-square overflow-hidden border border-gray-200 shadow-sm">
                    <img src="https://i.ibb.co/kgwtn4vF/fpayment.jpg" class="absolute inset-0 w-full h-full"
                        alt="Ads">
                </div>

                <!-- Action Button (Đã làm dịu màu) -->
                <div class="bg-red-50 border border-red-200 p-6 rounded-xl text-center shadow-sm">
                    <div
                        class="w-12 h-12 bg-red-100 text-cs_red rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">BẠN ĐANG GẶP RỦI RO?</h3>
                    <p class="text-gray-600 text-[13px] mb-5 leading-relaxed">
                        Chặn đứng kẻ gian bằng cách báo cáo ngay lên hệ thống. Đóng góp của bạn giúp cộng đồng MMO an
                        toàn hơn.
                    </p>
                    <button
                        class="w-full bg-cs_red shadow-sm text-white font-bold py-3 px-4 rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fa-regular fa-paper-plane mr-1"></i> GỬI ĐƠN TỐ CÁO
                    </button>
                </div>


                <!-- Box Quỹ Bảo Hiểm -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-5">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-gray-800 uppercase flex items-center gap-2">
                            <i class="fa-solid fa-shield text-cs_green"></i> QUỸ BẢO ĐẢM CS
                        </h3>
                        <a href="#" class="text-xs text-cs_blue hover:underline">Xem Quỹ</a>
                    </div>

                    <div class="grid grid-cols-4 gap-3">
                        <!-- Avatar items -->
                        <a href="#" class="flex flex-col items-center group relative cursor-pointer"
                            title="Lê Tuấn Vũ - 50 Triệu">
                            <div class="relative mb-1">
                                <img src="https://ui-avatars.com/api/?name=Lê+Vũ&background=2eb85c&color=fff&size=48"
                                    alt="Lê Tuấn Vũ"
                                    class="rounded-full w-12 h-12 border-2 border-gray-100 group-hover:border-cs_green transition-colors object-cover shadow-sm">
                                <div
                                    class="absolute bottom-0 right-0 w-4 h-4 bg-cs_green rounded-full border-2 border-white flex items-center justify-center">
                                    <i class="fa-solid fa-check text-white text-[8px]"></i>
                                </div>
                            </div>
                            <span
                                class="text-[10px] text-gray-600 font-medium text-center truncate w-full group-hover:text-cs_green">Lê
                                Vũ</span>
                        </a>

                        <a href="#" class="flex flex-col items-center group relative cursor-pointer"
                            title="Hải Phạm - 30 Triệu">
                            <div class="relative mb-1">
                                <img src="https://ui-avatars.com/api/?name=Hải+Phạm&background=3399ff&color=fff&size=48"
                                    alt="Hải Phạm"
                                    class="rounded-full w-12 h-12 border-2 border-gray-100 group-hover:border-cs_blue transition-colors object-cover shadow-sm">
                                <div
                                    class="absolute bottom-0 right-0 w-4 h-4 bg-cs_green rounded-full border-2 border-white flex items-center justify-center">
                                    <i class="fa-solid fa-check text-white text-[8px]"></i>
                                </div>
                            </div>
                            <span
                                class="text-[10px] text-gray-600 font-medium text-center truncate w-full group-hover:text-cs_blue">Hải
                                Phạm</span>
                        </a>

                        <a href="#" class="flex flex-col items-center group relative cursor-pointer"
                            title="Nam Hoàng - 100 Triệu">
                            <div class="relative mb-1">
                                <img src="https://ui-avatars.com/api/?name=Nam+Hoàng&background=fdb813&color=fff&size=48"
                                    alt="Nam Hoàng"
                                    class="rounded-full w-12 h-12 border-2 border-gray-100 group-hover:border-cs_orange transition-colors object-cover shadow-sm">
                                <div
                                    class="absolute bottom-0 right-0 w-4 h-4 bg-cs_green rounded-full border-2 border-white flex items-center justify-center">
                                    <i class="fa-solid fa-check text-white text-[8px]"></i>
                                </div>
                            </div>
                            <span
                                class="text-[10px] text-gray-600 font-medium text-center truncate w-full group-hover:text-cs_orange">Nam
                                Hoàng</span>
                        </a>

                        <a href="#" class="flex flex-col items-center group relative cursor-pointer"
                            title="Hữu Thắng - 80 Triệu">
                            <div class="relative mb-1">
                                <img src="https://ui-avatars.com/api/?name=Hữu+Thắng&background=8b5cf6&color=fff&size=48"
                                    alt="Hữu Thắng"
                                    class="rounded-full w-12 h-12 border-2 border-gray-100 group-hover:border-purple-500 transition-colors object-cover shadow-sm">
                                <div
                                    class="absolute bottom-0 right-0 w-4 h-4 bg-cs_green rounded-full border-2 border-white flex items-center justify-center">
                                    <i class="fa-solid fa-check text-white text-[8px]"></i>
                                </div>
                            </div>
                            <span
                                class="text-[10px] text-gray-600 font-medium text-center truncate w-full group-hover:text-purple-500">Hữu
                                Thắng</span>
                        </a>

                        <a href="#" class="flex flex-col items-center group relative cursor-pointer"
                            title="Kiều Oanh - 40 Triệu">
                            <div class="relative mb-1">
                                <img src="https://ui-avatars.com/api/?name=Kiều+Oanh&background=ec4899&color=fff&size=48"
                                    alt=""
                                    class="rounded-full w-12 h-12 border-2 border-gray-100 group-hover:border-pink-500 transition-colors object-cover shadow-sm">
                                <div
                                    class="absolute bottom-0 right-0 w-4 h-4 bg-cs_green rounded-full border-2 border-white flex items-center justify-center">
                                    <i class="fa-solid fa-check text-white text-[8px]"></i>
                                </div>
                            </div>
                            <span
                                class="text-[10px] text-gray-600 font-medium text-center truncate w-full group-hover:text-pink-500">Kiều
                                Oanh</span>
                        </a>

                        <a href="#" class="flex flex-col items-center group relative cursor-pointer"
                            title="Minh Tiến - 10 Triệu">
                            <div class="relative mb-1">
                                <img src="https://ui-avatars.com/api/?name=Minh+Tiến&background=0f766e&color=fff&size=48"
                                    alt=""
                                    class="rounded-full w-12 h-12 border-2 border-gray-100 group-hover:border-teal-600 transition-colors object-cover shadow-sm">
                                <div
                                    class="absolute bottom-0 right-0 w-4 h-4 bg-cs_green rounded-full border-2 border-white flex items-center justify-center">
                                    <i class="fa-solid fa-check text-white text-[8px]"></i>
                                </div>
                            </div>
                            <span
                                class="text-[10px] text-gray-600 font-medium text-center truncate w-full group-hover:text-teal-600">Minh
                                Tiến</span>
                        </a>

                        <a href="#" class="flex flex-col items-center group relative cursor-pointer"
                            title="Gia Bảo - 60 Triệu">
                            <div class="relative mb-1">
                                <img src="https://ui-avatars.com/api/?name=Gia+Bảo&background=c2410c&color=fff&size=48"
                                    alt=""
                                    class="rounded-full w-12 h-12 border-2 border-gray-100 group-hover:border-orange-600 transition-colors object-cover shadow-sm">
                                <div
                                    class="absolute bottom-0 right-0 w-4 h-4 bg-cs_green rounded-full border-2 border-white flex items-center justify-center">
                                    <i class="fa-solid fa-check text-white text-[8px]"></i>
                                </div>
                            </div>
                            <span
                                class="text-[10px] text-gray-600 font-medium text-center truncate w-full group-hover:text-orange-600">Gia
                                Bảo</span>
                        </a>

                        <a href="#" class="flex flex-col items-center group relative cursor-pointer"
                            title="Xem tất cả">
                            <div class="relative mb-1">
                                <div
                                    class="rounded-full w-12 h-12 bg-gray-100 border-2 border-gray-200 group-hover:bg-cs_blue group-hover:text-white group-hover:border-cs_blue flex items-center justify-center transition-colors text-gray-500 shadow-sm">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                            <span
                                class="text-[10px] text-gray-600 font-medium text-center truncate w-full group-hover:text-cs_blue">Tất
                                cả +50</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- NEW FULL-WIDTH SECTIONS (Below Main Columns) -->
        <div class="mt-20 space-y-16">

            <!-- Section Bí Quyết Giao Dịch / An Toàn Cảnh Báo -->
            <div
                class="bg-gradient-to-br from-white to-blue-50/50 border border-blue-100/50 rounded-3xl p-8 md:p-12 shadow-sm">
                <div class="max-w-4xl mx-auto text-center mb-12">
                    <span
                        class="inline-block px-3 py-1 bg-cs_blue/10 text-cs_blue text-[10px] font-bold uppercase tracking-widest rounded-full mb-4">Cẩm
                        nang an toàn</span>
                    <h2 class="text-2xl md:text-3xl font-black text-gray-800 uppercase tracking-tight">
                        Cách giao dịch <span class="text-cs_blue">không bao giờ bị lừa</span>
                    </h2>
                    <p class="text-gray-500 text-sm mt-3 leading-relaxed">
                        Thế giới MMO đầy rẫy rủi ro, nhưng chỉ cần bạn nắm vững 3 nguyên tắc "vàng" dưới đây, túi tiền
                        của bạn sẽ luôn được bảo vệ tuyệt đối.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Tip 1 -->
                    <div
                        class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-50">
                        <div
                            class="w-14 h-14 bg-blue-50 text-cs_blue rounded-xl flex items-center justify-center mb-6 border border-blue-100">
                            <i class="fa-solid fa-magnifying-glass-chart text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 text-lg mb-3">Luôn luôn kiểm tra</h4>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Đừng vội tin vào profile sang chảnh. Hãy <span class="font-bold text-cs_blue">copy
                                SĐT/STK</span> dán vào CheckScam để xem họ có "vết đen" nào trong quá khứ không nhé.
                        </p>
                    </div>

                    <!-- Tip 2 -->
                    <div
                        class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-50">
                        <div
                            class="w-14 h-14 bg-green-50 text-cs_green rounded-xl flex items-center justify-center mb-6 border border-green-100">
                            <i class="fa-solid fa-user-shield text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 text-lg mb-3">Sử dụng trung gian</h4>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Với giao dịch lạ, tốt nhất hãy mời một <span class="font-bold text-cs_green">Trung Gian Uy
                                Tín</span> có đóng quỹ bảo hiểm. Đừng tiếc vài đồng phí để rồi mất trắng.
                        </p>
                    </div>

                    <!-- Tip 3 -->
                    <div
                        class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-gray-50">
                        <div
                            class="w-14 h-14 bg-red-50 text-cs_red rounded-xl flex items-center justify-center mb-6 border border-red-100">
                            <i class="fa-solid fa-bolt-lightning text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 text-lg mb-3">Cảnh giác link lạ</h4>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Link "xác nhận tiền về" hay "nhập OTP" đều là cạm bẫy. Ngân hàng <span
                                class="font-bold text-cs_red">không bao giờ</span> yêu cầu khách hàng nhập thông tin
                            bảo mật qua link lạ.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Box FAQ - Câu Hỏi Thường Gặp -->
            <div class="max-w-5xl mx-auto px-4">
                <div class="flex flex-col items-center mb-10 text-center">
                    <div class="w-12 h-1 bg-cs_blue rounded-full mb-6"></div>
                    <h3 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Trợ giúp & Giải đáp</h3>
                    <p class="text-gray-500 text-sm mt-2">Mọi thắc mắc của bạn về hệ thống CheckScam đều được giải đáp
                        tại đây.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                    <!-- FAQ 1 -->
                    <details
                        class="group bg-white border border-gray-200 rounded-2xl shadow-sm hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-5 list-none">
                            <div class="flex items-center gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-cs_blue flex items-center justify-center text-xs font-bold">01</span>
                                <h4 class="font-bold text-gray-700 text-sm">Làm sao để tố cáo lừa đảo?</h4>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-[68px] text-[13px] leading-relaxed text-gray-500 border-t border-gray-50 pt-3">
                            Rất đơn giản, bạn chỉ cần bấm vào nút <span class="text-cs_red font-bold">GỬI ĐƠN TỐ
                                CÁO</span>, điền đầy đủ thông tin kèm hình ảnh bằng chứng (bill chuyển khoản, đoạn
                            chat). Đội ngũ admin sẽ xem xét và phê duyệt trong vòng 24h.
                        </div>
                    </details>

                    <!-- FAQ 2 -->
                    <details
                        class="group bg-white border border-gray-200 rounded-2xl shadow-sm hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-5 list-none">
                            <div class="flex items-center gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-cs_blue flex items-center justify-center text-xs font-bold">02</span>
                                <h4 class="font-bold text-gray-700 text-sm">Tại sao bài phốt chưa được duyệt?</h4>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-[68px] text-[13px] leading-relaxed text-gray-500 border-t border-gray-50 pt-3">
                            Mọi đơn tố cáo đều được kiểm tra thủ công để tránh tình trạng "phốt ảo" làm hại người lương
                            thiện. Nếu bài của bạn quá 24h chưa duyệt, hãy kiểm tra lại xem bằng chứng đã rõ ràng chưa
                            nhé.
                        </div>
                    </details>

                    <!-- FAQ 3 -->
                    <details
                        class="group bg-white border border-gray-200 rounded-2xl shadow-sm hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-5 list-none">
                            <div class="flex items-center gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-cs_blue flex items-center justify-center text-xs font-bold">03</span>
                                <h4 class="font-bold text-gray-700 text-sm">Quỹ Bảo Đảm hoạt động thế nào?</h4>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-[68px] text-[13px] leading-relaxed text-gray-500 border-t border-gray-50 pt-3">
                            Những người có tên trong danh sách đã ký kĩ một khoản tiền (Quỹ đóng) cho Admin nắm giữ. Nếu
                            họ có hành vi lừa đảo khi làm trung gian, Admin sẽ dùng số tiền đó để đền bù trực tiếp cho
                            bạn 100%.
                        </div>
                    </details>

                    <!-- FAQ 4 -->
                    <details
                        class="group bg-white border border-gray-200 rounded-2xl shadow-sm hover:border-cs_blue/30 transition-all [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex cursor-pointer items-center justify-between p-5 list-none">
                            <div class="flex items-center gap-4">
                                <span
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-cs_blue flex items-center justify-center text-xs font-bold">04</span>
                                <h4 class="font-bold text-gray-700 text-sm">Tôi có thể xin gỡ bài viết không?</h4>
                            </div>
                            <i
                                class="fa-solid fa-chevron-down text-gray-300 group-open:rotate-180 transition-transform text-xs"></i>
                        </summary>
                        <div
                            class="px-5 pb-5 pl-[68px] text-[13px] leading-relaxed text-gray-500 border-t border-gray-50 pt-3">
                            Hệ thống chỉ gỡ bài khi <strong>người tố cáo xác nhận</strong> đã được giải quyết hoặc nhận
                            lại tiền. Chúng tôi tuyệt đối không gỡ bài vì lý do cá nhân hay hối lộ từ kẻ lừa đảo.
                        </div>
                    </details>
                </div>
            </div>
        </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t-4 border-cs_red text-gray-300 pt-10 pb-6 mt-10 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8 pb-8 border-b border-gray-800">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-cs_red text-white flex items-center justify-center rounded text-sm">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <span class="text-lg font-black uppercase text-white tracking-tight">Check<span
                                class="text-cs_red">Scam</span></span>
                    </div>
                    <p class="text-gray-400 leading-relaxed max-w-sm">
                        Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam. Cung cấp thông tin tham khảo giúp bạn
                        an tâm hơn trước các giao dịch online.
                    </p>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 uppercase text-xs tracking-wider">Hệ Thống</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Quy trình duyệt phốt</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Danh sách quỹ bảo hiểm</a>
                        </li>
                        <li><a href="#" class="hover:text-white transition-colors">Bot Telegram thông minh</a>
                        </li>
                        <li><a href="#" class="hover:text-white transition-colors">Đăng ký làm đối tác</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 uppercase text-xs tracking-wider">Hỗ Trợ</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Liên hệ Admin</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Điều khoản dịch vụ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Chính sách bảo mật</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Giải quyết sai sót</a></li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
                <p>&copy; <?php echo date('Y'); ?> Bản quyền thuộc về CheckScam. Hệ thống dữ liệu cộng đồng.</p>
                <div class="flex gap-4 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white"><i class="fa-brands fa-facebook text-lg"></i></a>
                    <a href="#" class="hover:text-white"><i class="fa-brands fa-telegram text-lg"></i></a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>

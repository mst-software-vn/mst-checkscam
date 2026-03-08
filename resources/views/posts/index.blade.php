@extends("layouts.app")

@php
    // Giữ nguyên Data cũ của ông, tôi chỉ render lại Layout
    $posts = [
        [
            "id" => 1,
            "title" => "Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS giả mạo ngân hàng 2026",
            "excerpt" => "Kẻ gian sử dụng thiết bị phát sóng giả để gửi tin nhắn Brandname ngân hàng, yêu cầu người dùng truy cập link lừa đảo nhằm chiếm đoạt mã OTP.",
            "image" => "https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=1470&auto=format&fit=crop",
            "category" => "Cảnh báo",
            "date" => "07/03/2026",
            "author" => "Admin",
        ],
        [
            "id" => 2,
            "title" => "Cách bảo mật tài khoản ngân hàng tuyệt đối khi thực hiện giao dịch online",
            "excerpt" => "Tuyệt đối không nhấn vào link lạ, không cung cấp mã OTP cho bất kỳ ai. Đây là bài viết chi tiết hướng dẫn bảo vệ tài sản của bạn.",
            "image" => "https://images.unsplash.com/photo-1614064641938-3bbee52942c7?q=80&w=1470&auto=format&fit=crop",
            "category" => "Mẹo hay",
            "date" => "05/03/2026",
            "author" => "System",
        ],
        [
            "id" => 3,
            "title" => "Dấu hiệu nhận biết website lừa đảo giả mạo CheckScam.VN và các trang uy tín",
            "excerpt" => "Chúng tôi ghi nhận một số trang web copy giao diện của CheckScam để lừa tiền phí check của người dùng. Hãy cẩn thận kiểm tra tên miền.",
            "image" => "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1470&auto=format&fit=crop",
            "category" => "Cảnh báo",
            "date" => "01/03/2026",
            "author" => "Admin",
        ],
        [
            "id" => 4,
            "title" => "Tại sao bạn nhất định nên sử dụng trung gian khi mua bán Acc Game trên mạng?",
            "excerpt" => "Giao dịch trực tiếp với người lạ luôn tiềm ẩn rủi ro bốc hơi tiền lẫn tài khoản. Hãy xem lợi ích của việc sử dụng hệ thống trung gian.",
            "image" => "https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1470&auto=format&fit=crop",
            "category" => "Tin tức",
            "date" => "25/02/2026",
            "author" => "Võ Xuân Sang",
        ],
        [
            "id" => 5,
            "title" => "Cảnh báo: Thủ đoạn dán đè mã QR lừa đảo tại các cửa hàng tiện lợi và quán cafe",
            "excerpt" => "Việc dán đè mã QR lừa đảo đang trở nên phổ biến. Hãy cẩn thận quét mã và kiểm tra thông tin người nhận tiền trước khi xác nhận.",
            "image" => "https://images.unsplash.com/photo-1595079676339-1534801ad6cf?q=80&w=1470&auto=format&fit=crop",
            "category" => "Mẹo hay",
            "date" => "20/02/2026",
            "author" => "Admin",
        ],
    ];
@endphp

@section("content")
    <main class="bg-gray-50/40 dark:bg-dark_bg pb-24">
        <x-breadcrumb :links="[['name' => 'Kiến thức MMO', 'url' => '/bai-viet']]" />
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header & Filter -->
            <div class="mb-14 flex flex-col lg:flex-row lg:items-end justify-between gap-8">
                <!-- Header Text -->
                <div class="max-w-2xl">
                    <h1 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-gray-300 tracking-tight">
                        Học viện
                        <span class="text-gray-600 dark:text-slate-50">Bảo mật & MMO</span>
                    </h1>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-base md:text-lg">
                        Chia sẻ kinh nghiệm kiếm tiền online an toàn, thủ thuật bảo vệ tài sản và cập nhật các hành vi
                        lừa đảo mới nhất.
                    </p>
                </div>

                <!-- Filters -->
                <div class="w-full lg:w-auto shrink-0 flex flex-col sm:flex-row gap-4">
                    <!-- Category Select -->
                    <div class="relative w-full sm:w-auto group">
                        <select
                            class="w-full min-w-[200px] appearance-none pl-5 pr-10 py-3.5 bg-white dark:bg-[#0B0F1A] border border-gray-200 dark:border-gray-800 rounded-2xl text-sm font-bold text-gray-700 dark:text-gray-300 focus:outline-none focus:border-cs_red focus:ring-1 focus:ring-cs_red transition-all cursor-pointer shadow-sm"
                        >
                            <option value="">Tất cả chủ đề</option>
                            <option value="canh-bao">Cảnh báo Scam</option>
                            <option value="bao-mat">Bảo mật tài khoản</option>
                            <option value="kinh-nghiem">Kinh nghiệm giao dịch</option>
                            <option value="tin-tuc">Tin tức MMO</option>
                        </select>
                        <i
                            class="fa-solid fa-chevron-down absolute right-4 top-1/3 text-gray-400 text-sm group-hover:text-cs_red transition-colors"
                        ></i>
                    </div>

                    <!-- Search Box -->
                    <div class="relative w-full sm:w-auto group">
                        <input
                            type="text"
                            placeholder="Tìm thủ thuật, cảnh báo..."
                            class="w-full sm:w-[280px] pl-5 pr-12 py-3.5 bg-gray-50 dark:bg-slate-900/50 border border-gray-200 dark:border-gray-800 rounded-2xl text-sm font-medium focus:outline-none focus:border-cs_red focus:ring-1 focus:ring-cs_red transition-all dark:text-gray-300 dark:placeholder-gray-500 shadow-sm"
                        />
                        <button
                            class="absolute right-4 top-1/4 text-gray-400 group-hover:text-cs_red transition-colors"
                        >
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Posts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($posts as $index => $post)
                    @if ($index == 0)
                        <!-- Hero Featured Post -->
                        <article class="md:col-span-2 lg:col-span-3 group">
                            <a
                                href="/bai-viet/{{ $post["id"] }}"
                                class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center"
                            >
                                <div class="lg:col-span-7 overflow-hidden rounded-3xl">
                                    <img
                                        src="{{ $post["image"] }}"
                                        class="w-full h-[400px] object-cover group-hover:scale-[1.01] transition-transform duration-500"
                                        alt="{{ $post["title"] }}"
                                    />
                                </div>
                                <div class="lg:col-span-5">
                                    <div class="flex items-center gap-3 mb-4">
                                        <span
                                            class="px-3 py-1 bg-gray-100 dark:bg-slate-800 text-gray-500 dark:text-gray-400 text-[10px] font-bold uppercase tracking-wider rounded-md"
                                        >
                                            {{ $post["category"] }}
                                        </span>
                                        <span class="text-gray-400 text-xs font-medium">{{ $post["date"] }}</span>
                                    </div>
                                    <h2
                                        class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-gray-300 leading-tight group-hover:text-cs_red transition-colors duration-300"
                                    >
                                        {{ $post["title"] }}
                                    </h2>
                                    <p
                                        class="mt-4 text-gray-500 dark:text-gray-400 line-clamp-3 text-base leading-relaxed"
                                    >
                                        {{ $post["excerpt"] }}
                                    </p>
                                    <div
                                        class="mt-6 flex items-center gap-2 text-gray-400 group-hover:text-cs_red font-bold text-sm uppercase tracking-wider transition-colors"
                                    >
                                        Đọc tiếp
                                        <i
                                            class="fa-solid fa-arrow-right-long mt-0.5 group-hover:translate-x-1 transition-transform"
                                        ></i>
                                    </div>
                                </div>
                            </a>
                        </article>
                        <div
                            class="md:col-span-2 lg:col-span-3 border-b border-gray-100 dark:border-gray-800 my-4"
                        ></div>
                    @else
                        <!-- Regular Post -->
                        <article class="group">
                            <a href="/bai-viet/{{ $post["id"] }}" class="flex flex-col h-full">
                                <div class="relative overflow-hidden rounded-2xl aspect-16/10 mb-6">
                                    <img
                                        src="{{ $post["image"] }}"
                                        class="w-full h-full object-cover transition-transform duration-500"
                                        alt="{{ $post["title"] }}"
                                    />
                                </div>
                                <div class="flex flex-col grow">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span
                                            class="text-gray-400 group-hover:text-cs_red text-[10px] font-bold uppercase tracking-widest transition-colors duration-300"
                                        >
                                            {{ $post["category"] }}
                                        </span>
                                        <span class="text-gray-400 text-[10px] font-bold uppercase">
                                            {{ $post["date"] }}
                                        </span>
                                    </div>
                                    <h3
                                        class="text-xl font-bold text-slate-900 dark:text-gray-300 leading-snug group-hover:text-cs_red transition-colors duration-500"
                                    >
                                        {{ $post["title"] }}
                                    </h3>
                                    <p
                                        class="mt-3 text-gray-500 dark:text-gray-400 line-clamp-2 text-sm leading-relaxed"
                                    >
                                        {{ $post["excerpt"] }}
                                    </p>
                                    <div
                                        class="mt-auto pt-6 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-400 group-hover:text-cs_red transition-colors"
                                    >
                                        Xem chi tiết
                                        <i class="fa-solid fa-chevron-right text-[10px] translate-y-[0.5px]"></i>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-24 pt-12 border-t border-gray-100 dark:border-gray-800 flex justify-between items-center">
                <p class="text-sm text-gray-400 font-medium italic">Hiển thị 5 của 24 bài viết</p>
                <div class="flex items-center gap-2">
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 dark:border-gray-800 text-gray-400 hover:border-cs_red hover:text-cs_red transition-all"
                    >
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>
                    <div class="flex gap-1">
                        <span
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-cs_red text-white font-bold text-sm"
                        >
                            1
                        </span>
                        <span
                            class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-500 font-bold text-sm hover:bg-gray-50 dark:hover:bg-slate-800 cursor-pointer"
                        >
                            2
                        </span>
                        <span
                            class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-500 font-bold text-sm hover:bg-gray-50 dark:hover:bg-slate-800 cursor-pointer"
                        >
                            3
                        </span>
                    </div>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 dark:border-gray-800 text-gray-400 hover:border-cs_red hover:text-cs_red transition-all"
                    >
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection

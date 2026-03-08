@extends("layouts.app")

@section("title", "Danh sách Trung Gian Uy Tín - Quỹ Bảo Hiểm CheckScam")

@section("content")
    <main class="bg-gray-50/40 dark:bg-dark_bg pb-24">
        <x-breadcrumb :links="[['name' => 'Quỹ bảo hiểm CS', 'url' => '/bao-hiem-cs']]" />

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <header class="mb-10 text-center lg:text-left">
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                    <div class="space-y-2">
                        <h1
                            class="text-2xl md:text-3xl lg:text-4xl font-black text-gray-800 dark:text-gray-300 uppercase tracking-tight"
                        >
                            Hệ thống
                            <span class="text-cs_blue">Trung gian uy tín</span>
                        </h1>
                        <p class="text-gray-500 dark:text-gray-400 font-semibold text-sm max-w-2xl leading-relaxed">
                            Danh sách thành viên đã đóng Quỹ Bảo Hiểm tại CheckScam.VN. Giao dịch qua các thành viên này
                            để được bảo đảm an toàn 100%.
                        </p>
                    </div>

                    <div class="flex flex-wrap justify-center lg:justify-end gap-2">
                        <div
                            class="bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 px-4 py-2 rounded-xl flex items-center gap-2"
                        >
                            <div
                                class="w-8 h-8 bg-cs_blue text-white rounded-lg flex items-center justify-center text-md shadow-lg shadow-blue-500/20"
                            >
                                <i class="fa-solid fa-vault"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[8px] text-gray-400 dark:text-gray-500 uppercase font-black tracking-tighter"
                                >
                                    Tổng quỹ
                                </p>
                                <p class="text-sm font-black text-cs_blue">~ 5.8 tỷ</p>
                            </div>
                        </div>
                        <div
                            class="bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800 px-4 py-2 rounded-xl flex items-center gap-2"
                        >
                            <div
                                class="w-8 h-8 bg-cs_green text-white rounded-lg flex items-center justify-center text-md shadow-lg shadow-green-500/20"
                            >
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[8px] text-gray-400 dark:text-gray-500 uppercase font-black tracking-tighter"
                                >
                                    Thành viên
                                </p>
                                <p class="text-sm font-black text-cs_green">128+</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters/Search (Styled like Report Form Input) -->
                <div class="mt-6 max-w-xl mx-auto lg:mx-0">
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i
                                class="fa-solid fa-magnifying-glass text-gray-300 group-focus-within:text-cs_blue transition-colors text-xs"
                            ></i>
                        </div>
                        <input
                            type="text"
                            placeholder="Tìm kiếm nhanh..."
                            class="w-full pl-10 pr-4 py-4 bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-xl text-sm font-bold text-gray-700 dark:text-gray-300 shadow-sm focus:border-cs_blue outline-none transition-all"
                        />
                    </div>
                </div>
            </header>

            <!-- Main Listing Grid - SMALLER ITEMS FOR BETTER SEARCHABILITY -->
            <div
                class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-7 lg:grid-cols-9 xl:grid-cols-10 gap-x-2 gap-y-6 border border-gray-300 dark:border-gray-800 p-4 rounded-xl"
            >
                <?php
                $names = [
                    "Nguyễn Hoàng Dương",
                    "Tống Hoàng Phương Dương",
                    "Nguyễn Hồng Dương",
                    "Trần Ngọc Thu",
                    "Phạm Văn Huy",
                    "Nguyễn Văn Phúc",
                    "Zolo",
                    "Huỳnh Công Sang",
                    "Huỳnh Lê Minh Hiếu",
                    "Hoàng Văn Mạnh",
                    "Bùi Đức Long",
                    "Đỗ Văn Mạnh",
                    "Dương Thị Vân",
                    "Duy Nguyễn",
                    "Lò Văn Thực",
                    "Hoàng Mai Thuận",
                    "Phan Anh Quân",
                    "Phạm Phúc Thịnh",
                    "Nguyễn Hồng Ân",
                    "Lê Văn Việt",
                    "XBOXTECH",
                    "Khang Khang",
                    "Đào Xuân Mạnh",
                    "NguyễN ThiệN",
                    "Trần Văn Vinh",
                    "Anh Mon Vũ",
                    "Võ Xuân Sang",
                    "Nguyễn Văn Khôi",
                    "Huỳnh Trung Tín",
                    "Nguyễn Hoà",
                    "Quốc Bảo",
                    "Tuấn Lê",
                    "Công Lực",
                    "Trần Phạm Gia Huy",
                    "Phạm Thủy Tiên",
                    "Hoàng Xuân",
                    "Nguyễn Tiến Đại",
                    "Nguyễn Văn Điệu",
                    "Phan Thị Kim Quyên",
                    "Hoàng Văn Tùng",
                    "Vương Xuân Giáp",
                    "Đinh Duy Khánh",
                    "Nguyễn Hồ Thiện Bảo",
                    "Nguyễn Bằng",
                    "Dương Hiếu",
                    "Đặng Đức Bình",
                    "Nguyễn Duy Phước",
                    "Nguyễn Văn Mạnh",
                    "Phạm Ngọc Đình Khiêm",
                    "Đỗ Đình Khải",
                ];
                // Duplicate and add more to reach 90+ like image
                $members = [];
                for ($i = 1; $i <= 100; $i++) {
                    $nameIndex = ($i - 1) % count($names);
                    $members[] = [
                        "id" => $i,
                        "name" => $names[$nameIndex],
                        "amount" => rand(10, 200) . ".000.000đ",
                        "avatar" => "https://i.pravatar.cc/150?u=cs_user_" . $i,
                    ];
                }
                ?>

                @foreach ($members as $member)
                    <a href="/bao-hiem-cs/{{ $member["id"] }}" class="group flex flex-col items-center">
                        <div class="relative mb-2">
                            <!-- Smaller Circular Avatar -->
                            <div
                                class="w-14 h-14 md:w-16 md:h-16 rounded-full overflow-hidden border-2 border-white dark:border-slate-800 shadow-lg group-hover:shadow-cs_blue/20 transition-all duration-300 group-hover:scale-110 active:scale-95"
                            >
                                <img
                                    src="{{ $member["avatar"] }}"
                                    class="w-full h-full object-cover group-hover:rotate-3 transition-transform duration-500"
                                    alt="{{ $member["name"] }}"
                                    loading="lazy"
                                />
                            </div>
                        </div>

                        <!-- Compact Info Label -->
                        <div class="text-center px-1">
                            <h3
                                class="text-[10px] md:text-[11px] font-bold text-gray-700 dark:text-gray-300 group-hover:text-cs_blue transition-colors leading-tight line-clamp-2"
                            >
                                {{ $member["id"] }}. {{ $member["name"] }}
                            </h3>
                            <span
                                class="text-[9px] font-black text-cs_green uppercase tracking-tighter opacity-0 group-hover:opacity-100 transition-all duration-300 block transform translate-y-1 group-hover:translate-y-0"
                            >
                                {{ $member["amount"] }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
            <!-- SEO Content Section (Similar to Report Index) -->
            <article class="mt-16 max-w-3xl mx-auto">
                <div class="p-6 md:p-8 rounded-2xl bg-gray-900 text-white relative overflow-hidden shadow-xl">
                    <div
                        class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-48 h-48 bg-cs_blue/20 rounded-full blur-3xl"
                    ></div>
                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
                        <div
                            class="shrink-0 w-16 h-16 md:w-20 md:h-20 bg-white/10 rounded-2xl flex items-center justify-center"
                        >
                            <i class="fa-solid fa-handshake-angle text-3xl text-cs_blue"></i>
                        </div>
                        <div class="space-y-3">
                            <h2 class="text-lg md:text-xl font-black uppercase">Quy định về Quỹ Bảo Hiểm</h2>
                            <p class="text-gray-400 text-xs md:text-sm leading-relaxed font-semibold italic">
                                CheckScam chỉ bảo lãnh các giao dịch có sự tham gia của các thành viên trong danh sách
                                trên. Tiền ký quỹ của thành viên được Admin giữ để bồi thường 100% trong trường hợp có
                                rủi ro từ phía thành viên đó.
                            </p>
                            <div class="flex flex-wrap gap-3 pt-1">
                                <a
                                    href="#"
                                    class="bg-cs_blue hover:bg-blue-600 text-white px-5 py-2 rounded-full text-[10px] font-bold uppercase tracking-wider transition-all"
                                >
                                    Liên hệ Admin để đóng quỹ
                                </a>
                                <a
                                    href="#"
                                    class="border border-white/20 hover:bg-white/10 text-white px-5 py-2 rounded-full text-[10px] font-bold uppercase tracking-wider transition-all"
                                >
                                    Xem điều khoản
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>
@endsection

@extends("layouts.app")

@section("title", "Danh sách Trung Gian Uy Tín - Quỹ Bảo Hiểm CheckScam")

@section("content")
    <main class="pb-24">
        <x-breadcrumb :links="[['name' => 'Quỹ bảo hiểm CS', 'url' => '/bao-hiem-cs']]" />

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <header class="mb-10 text-center lg:text-left">
                <div class="flex flex-col justify-between gap-6 lg:flex-row lg:items-end">
                    <div class="space-y-2">
                        <h1
                            class="text-2xl font-black tracking-tight text-gray-800 uppercase md:text-3xl lg:text-4xl dark:text-gray-300"
                        >
                            Hệ thống
                            <span class="text-cs_blue">Trung gian uy tín</span>
                        </h1>
                        <p class="max-w-2xl text-sm leading-relaxed font-semibold text-gray-500 dark:text-gray-400">
                            Danh sách thành viên đã đóng Quỹ Bảo Hiểm tại CheckScam.VN. Giao dịch qua các thành viên này
                            để được bảo đảm an toàn 100%.
                        </p>
                    </div>

                    <div class="flex flex-wrap justify-center gap-2 lg:justify-end">
                        <div
                            class="flex items-center gap-2 rounded-xl border border-blue-100 bg-blue-50 px-4 py-2 dark:border-blue-800 dark:bg-blue-900/20"
                        >
                            <div
                                class="bg-cs_blue text-md flex h-8 w-8 items-center justify-center rounded-lg text-white shadow-lg shadow-blue-500/20"
                            >
                                <i class="fa-solid fa-vault"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[8px] font-black tracking-tighter text-gray-400 uppercase dark:text-gray-500"
                                >
                                    Tổng quỹ
                                </p>
                                <p class="text-cs_blue text-sm font-black">~ 5.8 tỷ</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 rounded-xl border border-green-100 bg-green-50 px-4 py-2 dark:border-green-800 dark:bg-green-900/20"
                        >
                            <div
                                class="bg-cs_green text-md flex h-8 w-8 items-center justify-center rounded-lg text-white shadow-lg shadow-green-500/20"
                            >
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[8px] font-black tracking-tighter text-gray-400 uppercase dark:text-gray-500"
                                >
                                    Thành viên
                                </p>
                                <p class="text-cs_green text-sm font-black">128+</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters/Search (Styled like Report Form Input) -->
                <div class="mx-auto mt-6 max-w-xl lg:mx-0">
                    <div class="group relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                            <i
                                class="fa-solid fa-magnifying-glass group-focus-within:text-cs_blue text-xs text-gray-300 transition-colors"
                            ></i>
                        </div>
                        <input
                            type="text"
                            placeholder="Tìm kiếm nhanh..."
                            class="focus:border-cs_blue w-full rounded-xl border border-gray-100 bg-white py-4 pr-4 pl-10 text-sm font-bold text-gray-700 shadow-sm transition-all outline-none dark:border-gray-800 dark:bg-slate-900 dark:text-gray-300"
                        />
                    </div>
                </div>
            </header>

            <!-- Main Listing Grid - SMALLER ITEMS FOR BETTER SEARCHABILITY -->
            <div
                class="grid grid-cols-3 gap-x-2 gap-y-6 rounded-xl border border-gray-300 p-4 sm:grid-cols-5 md:grid-cols-7 lg:grid-cols-9 xl:grid-cols-10 dark:border-gray-800"
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
                                class="group-hover:shadow-cs_blue/20 h-14 w-14 overflow-hidden rounded-full border-2 border-white shadow-lg transition-all duration-300 group-hover:scale-110 active:scale-95 md:h-16 md:w-16 dark:border-slate-800"
                            >
                                <img
                                    src="{{ $member["avatar"] }}"
                                    class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3"
                                    alt="{{ $member["name"] }}"
                                    loading="lazy"
                                />
                            </div>
                        </div>

                        <!-- Compact Info Label -->
                        <div class="px-1 text-center">
                            <h3
                                class="group-hover:text-cs_blue line-clamp-2 text-[10px] leading-tight font-bold text-gray-700 transition-colors md:text-[11px] dark:text-gray-300"
                            >
                                {{ $member["id"] }}. {{ $member["name"] }}
                            </h3>
                            <span
                                class="text-cs_green block translate-y-1 transform text-[9px] font-black tracking-tighter uppercase opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100"
                            >
                                {{ $member["amount"] }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
            <!-- SEO Content Section (Similar to Report Index) -->
            <article class="mx-auto mt-16 max-w-3xl">
                <div class="relative overflow-hidden rounded-2xl bg-gray-900 p-6 text-white shadow-xl md:p-8">
                    <div
                        class="bg-cs_blue/20 absolute top-0 right-0 h-48 w-48 translate-x-1/2 -translate-y-1/2 rounded-full blur-3xl"
                    ></div>
                    <div class="relative z-10 flex flex-col items-center gap-6 md:flex-row">
                        <div
                            class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-white/10 md:h-20 md:w-20"
                        >
                            <i class="fa-solid fa-handshake-angle text-cs_blue text-3xl"></i>
                        </div>
                        <div class="space-y-3">
                            <h2 class="text-lg font-black uppercase md:text-xl">Quy định về Quỹ Bảo Hiểm</h2>
                            <p class="text-xs leading-relaxed font-semibold text-gray-400 italic md:text-sm">
                                CheckScam chỉ bảo lãnh các giao dịch có sự tham gia của các thành viên trong danh sách
                                trên. Tiền ký quỹ của thành viên được Admin giữ để bồi thường 100% trong trường hợp có
                                rủi ro từ phía thành viên đó.
                            </p>
                            <div class="flex flex-wrap gap-3 pt-1">
                                <a
                                    href="#"
                                    class="bg-cs_blue rounded-full px-5 py-2 text-[10px] font-bold tracking-wider text-white uppercase transition-all hover:bg-blue-600"
                                >
                                    Liên hệ Admin để đóng quỹ
                                </a>
                                <a
                                    href="#"
                                    class="rounded-full border border-white/20 px-5 py-2 text-[10px] font-bold tracking-wider text-white uppercase transition-all hover:bg-white/10"
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

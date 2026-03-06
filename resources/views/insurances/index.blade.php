@extends('layouts.app')

@section('title', 'Danh sách Trung Gian Uy Tín - Quỹ Bảo Hiểm CheckScam')

@section('content')
    <main class="min-h-screen dark:bg-dark_bg py-6 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumbs -->
            <nav class="flex mb-8 text-[10px] sm:text-xs md:text-sm font-bold uppercase tracking-widest text-gray-400"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 overflow-x-auto whitespace-nowrap pb-1">
                    <li class="inline-flex items-center">
                        <a href="/" class="hover:text-cs_blue transition-colors">Trang chủ</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right mx-1.5 md:mx-2 text-[7px] md:text-[8px]"></i>
                            <span class="text-gray-900 dark:text-gray-200">Quỹ bảo hiểm CS</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <header class="mb-10 text-center lg:text-left">
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                    <div class="space-y-2">
                        <h1
                            class="text-2xl md:text-3xl lg:text-4xl font-black text-gray-800 dark:text-white uppercase tracking-tight">
                            Hệ thống <span class="text-cs_blue">Trung gian uy tín</span>
                        </h1>
                        <p class="text-gray-500 dark:text-gray-400 font-semibold text-sm max-w-2xl leading-relaxed">
                            Danh sách thành viên đã đóng Quỹ Bảo Hiểm tại CheckScam.VN. Giao dịch qua các thành viên này để
                            được bảo đảm an toàn 100%.
                        </p>
                    </div>

                    <div class="flex flex-wrap justify-center lg:justify-end gap-2">
                        <div
                            class="bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 px-4 py-2 rounded-xl flex items-center gap-2">
                            <div
                                class="w-8 h-8 bg-cs_blue text-white rounded-lg flex items-center justify-center text-md shadow-lg shadow-blue-500/20">
                                <i class="fa-solid fa-vault"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[8px] text-gray-400 dark:text-gray-500 uppercase font-black tracking-tighter">
                                    Tổng quỹ</p>
                                <p class="text-sm font-black text-cs_blue">~ 5.8 tỷ</p>
                            </div>
                        </div>
                        <div
                            class="bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800 px-4 py-2 rounded-xl flex items-center gap-2">
                            <div
                                class="w-8 h-8 bg-cs_green text-white rounded-lg flex items-center justify-center text-md shadow-lg shadow-green-500/20">
                                <i class="fa-solid fa-users-check"></i>
                            </div>
                            <div>
                                <p
                                    class="text-[8px] text-gray-400 dark:text-gray-500 uppercase font-black tracking-tighter">
                                    Thành viên</p>
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
                                class="fa-solid fa-magnifying-glass text-gray-300 group-focus-within:text-cs_blue transition-colors text-xs"></i>
                        </div>
                        <input type="text" placeholder="Tìm kiếm nhanh..."
                            class="w-full pl-10 pr-4 py-2.5 bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-xl text-xs font-bold text-gray-700 dark:text-white shadow-sm focus:border-cs_blue outline-none transition-all">
                    </div>
                </div>
            </header>

            <!-- Main Listing Grid -->
            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7 gap-3 md:gap-4">
                <?php
                $names = ['Nguyễn Hoàng Dương', 'Tống Hoàng Phương Dương', 'Nguyễn Hồng Dương', 'Trần Ngọc Thu', 'Phạm Văn Huy', 'Nguyễn Văn Phúc', 'Zolo', 'Huỳnh Công Sang', 'Huỳnh Lê Minh Hiếu', 'Hoàng Văn Mạnh', 'Bùi Đức Long', 'Đỗ Văn Mạnh', 'Dương Thị Vân', 'Duy Nguyễn', 'Lò Văn Thực', 'Hoàng Mai Thuận', 'Phan Anh Quân', 'Phạm Phúc Thịnh', 'Nguyễn Hồng Ân', 'Lê Văn Việt', 'XBOXTECH', 'Khang Khang', 'Đào Xuân Mạnh', 'NguyễN ThiệN', 'Trần Văn Vinh', 'Anh Mon Vũ', 'Võ Xuân Sang', 'Nguyễn Văn Khôi', 'Huỳnh Trung Tín', 'Nguyễn Hoà'];
                $members = [];
                for ($i = 0; $i < count($names); $i++) {
                    $members[] = [
                        'id' => $i + 1,
                        'name' => $names[$i],
                        'amount' => rand(10, 200) . '.000.000đ',
                        'color' => sprintf('#%06X', mt_rand(0, 0xffffff)),
                    ];
                }
                ?>

                @foreach ($members as $member)
                    <a href="/bao-hiem-cs/{{ $member['id'] }}"
                        class="group relative bg-white dark:bg-slate-900 border border-gray-50 dark:border-gray-800 p-3 md:p-4 rounded-2xl transition-all hover:-translate-y-1.5 hover:shadow-xl hover:shadow-blue-500/10 hover:border-cs_blue overflow-hidden text-center">
                        <!-- Rank Indicator with stylish stroke -->
                        <div
                            class="absolute top-0 right-0 p-2 text-xl font-black text-gray-100/50 dark:text-gray-800/30 group-hover:text-cs_blue/10 transition-colors pointer-events-none">
                            {{ $member['id'] }}
                        </div>

                        <!-- Avatar with double ring -->
                        <div class="relative w-14 h-14 md:w-16 md:h-16 mx-auto mb-3">
                            <div
                                class="absolute inset-0 rounded-full border border-cs_blue/10 dark:border-cs_blue/20 group-hover:rotate-180 transition-transform duration-700">
                            </div>
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($member['name']) }}&background=random&color=fff&size=128"
                                class="absolute inset-1.5 w-[calc(100%-12px)] h-[calc(100%-12px)] rounded-full object-cover shadow-md group-hover:scale-105 transition-transform"
                                alt="{{ $member['name'] }}">
                            <!-- Status Badge -->
                            <div
                                class="absolute bottom-0.5 right-0.5 w-4 h-4 md:w-5 md:h-5 bg-cs_green text-white rounded-full border-2 border-white dark:border-slate-910 flex items-center justify-center text-[6px] md:text-[8px] shadow-sm">
                                <i class="fa-solid fa-check"></i>
                            </div>
                        </div>

                        <!-- Name & Info -->
                        <h3
                            class="font-black text-gray-800 dark:text-gray-200 text-[10px] md:text-xs uppercase tracking-tighter line-clamp-2 min-h-8 mb-1.5 group-hover:text-cs_blue transition-colors">
                            {{ $member['name'] }}
                        </h3>

                        <div
                            class="inline-flex items-center gap-1 px-2 py-1 bg-green-50 dark:bg-green-900/20 text-cs_green text-[8px] font-black rounded-md uppercase">
                            <i class="fa-solid fa-shield-halved"></i>
                            {{ $member['amount'] }}
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- SEO Content Section (Similar to Report Index) -->
            <article class="mt-24 max-w-4xl mx-auto">
                <div class="p-8 md:p-12 rounded-3xl bg-gray-900 text-white relative overflow-hidden shadow-2xl">
                    <div
                        class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-64 h-64 bg-cs_blue/20 rounded-full blur-3xl">
                    </div>
                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-10">
                        <div
                            class="shrink-0 w-24 h-24 md:w-32 md:h-32 bg-white/10 rounded-3xl flex items-center justify-center">
                            <i class="fa-solid fa-handshake-angle text-5xl text-cs_blue"></i>
                        </div>
                        <div class="space-y-4">
                            <h2 class="text-xl md:text-2xl font-black uppercase">Quy định về Quỹ Bảo Hiểm</h2>
                            <p class="text-gray-400 text-sm md:text-base leading-relaxed font-semibold italic">
                                CheckScam chỉ bảo lãnh các giao dịch có sự tham gia của các thành viên trong danh sách trên.
                                Tiền ký quỹ của thành viên được Admin giữ để bồi thường 100% trong trường hợp có rủi ro từ
                                phía thành viên đó.
                            </p>
                            <div class="flex flex-wrap gap-4 pt-2">
                                <a href="#"
                                    class="bg-cs_blue hover:bg-blue-600 text-white px-6 py-2.5 rounded-full text-[11px] font-bold uppercase tracking-wider transition-all">Liên
                                    hệ Admin để đóng quỹ</a>
                                <a href="#"
                                    class="border border-white/20 hover:bg-white/10 text-white px-6 py-2.5 rounded-full text-[11px] font-bold uppercase tracking-wider transition-all">Xem
                                    điều khoản</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </main>
@endsection

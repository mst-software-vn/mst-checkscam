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
                                <p class="text-cs_blue text-sm font-black">
                                    ~
                                    {{ $total_fund >= 1000000000 ? number_format($total_fund / 1000000000, 1, ".", "") . " tỷ" : number_format($total_fund / 1000000, 0, ",", ".") . " triệu" }}
                                </p>
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
                                <p class="text-cs_green text-sm font-black">{{ $total_members }}+</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters/Search (Styled like Report Form Input) -->
                <div class="mx-auto mt-6 max-w-xl lg:mx-0">
                    <form action="{{ route("insurances.frontend.index") }}" method="GET" class="group relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                            <i
                                class="fa-solid fa-magnifying-glass group-focus-within:text-cs_blue text-xs text-gray-300 transition-colors"
                            ></i>
                        </div>
                        <input
                            type="text"
                            name="search"
                            value="{{ request("search") }}"
                            placeholder="Tìm kiếm nhanh..."
                            class="focus:border-cs_blue w-full rounded-xl border-2 border-gray-100 bg-white py-4 pr-4 pl-10 text-sm font-bold text-gray-700 shadow-sm transition-all outline-none dark:border-gray-800 dark:bg-slate-900 dark:text-gray-300"
                        />
                    </form>
                </div>
            </header>

            <!-- Main Listing Grid - SMALLER ITEMS FOR BETTER SEARCHABILITY -->
            <div id="insurance-list-container">
                <div
                    class="grid grid-cols-3 gap-x-2 gap-y-6 rounded-xl border border-gray-300 p-4 sm:grid-cols-5 md:grid-cols-7 lg:grid-cols-9 xl:grid-cols-10 dark:border-gray-800"
                >
                    @forelse ($insurances as $member)
                        <a
                            href="{{ route("insurances.frontend.show", $member->slug) }}"
                            class="group flex flex-col items-center"
                        >
                            <div class="relative mb-2">
                                <!-- Smaller Circular Avatar -->
                                <div
                                    class="group-hover:shadow-cs_blue/20 h-14 w-14 overflow-hidden rounded-full border-2 border-white shadow-lg transition-all duration-300 group-hover:scale-110 active:scale-95 md:h-16 md:w-16 dark:border-slate-800"
                                >
                                    @if ($member->avatar_url)
                                        <img
                                            src="{{ $member->avatar_url }}"
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3"
                                            alt="{{ $member->full_name }}"
                                            loading="lazy"
                                            onerror="
                                                this.style.display = 'none';
                                                this.nextElementSibling.style.display = 'flex';
                                            "
                                        />
                                        <div
                                            class="hidden h-full w-full items-center justify-center bg-gray-100 text-lg font-bold text-gray-400 dark:bg-gray-800"
                                        >
                                            {{ strtoupper(substr($member->full_name, 0, 1)) }}
                                        </div>
                                    @else
                                        <div
                                            class="flex h-full w-full items-center justify-center bg-gray-100 text-lg font-bold text-gray-400 dark:bg-gray-800"
                                        >
                                            {{ strtoupper(substr($member->full_name, 0, 1)) }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Compact Info Label -->
                            <div class="px-1 text-center">
                                <h3
                                    class="group-hover:text-cs_blue line-clamp-2 text-[10px] leading-tight font-bold text-gray-700 transition-colors md:text-[11px] dark:text-gray-300"
                                >
                                    {{ $member->id }}. {{ $member->full_name }}
                                </h3>
                                <span
                                    class="text-cs_green block translate-y-1 transform text-[9px] font-black tracking-tighter uppercase opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100"
                                >
                                    {{ number_format($member->amount, 0, ",", ".") }}đ
                                </span>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-16 text-center">
                            <div
                                class="mb-4 inline-flex h-20 w-20 items-center justify-center rounded-full bg-gray-50 dark:bg-slate-800"
                            >
                                <i class="fa-solid fa-magnifying-glass-chart text-3xl text-gray-300"></i>
                            </div>
                            <h3 class="text-lg font-black text-gray-800 dark:text-gray-300">
                                Không tìm thấy thành viên
                            </h3>
                            <p class="mt-2 text-sm font-semibold text-gray-500">
                                Không có kết quả nào khớp với từ khóa "
                                <span class="text-cs_blue">{{ request("search") }}</span>
                                "
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- SEO Content Section (Similar to Report Index) -->
            <article class="mx-auto mt-16 max-w-3xl">
                <div
                    class="relative overflow-hidden rounded-2xl bg-white p-6 text-gray-900 shadow-xl transition-all duration-300 md:p-8 dark:border dark:border-slate-800 dark:bg-slate-900 dark:text-white"
                >
                    <div
                        class="bg-cs_blue/10 dark:bg-cs_blue/20 absolute top-0 right-0 h-48 w-48 translate-x-1/2 -translate-y-1/2 rounded-full blur-3xl"
                    ></div>
                    <div class="relative z-10 flex flex-col items-center gap-6 md:flex-row">
                        <div
                            class="bg-cs_blue/10 dark:bg-cs_blue/20 flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl md:h-20 md:w-20"
                        >
                            <i class="fa-solid fa-handshake-angle text-cs_blue text-3xl"></i>
                        </div>
                        <div class="space-y-3">
                            <h2 class="text-lg font-black uppercase md:text-xl">Quy định về Quỹ Bảo Hiểm</h2>
                            <p
                                class="text-xs leading-relaxed font-semibold text-gray-600 italic md:text-sm dark:text-gray-400"
                            >
                                CheckScam chỉ bảo lãnh các giao dịch có sự tham gia của các thành viên trong danh sách
                                trên. Tiền ký quỹ của thành viên được Admin giữ để bồi thường 100% trong trường hợp có
                                rủi ro từ phía thành viên đó.
                            </p>
                            <div class="flex flex-wrap gap-3 pt-1">
                                <a
                                    href="/lien-he-admin"
                                    class="bg-cs_blue rounded-full px-5 py-2 text-[10px] font-bold tracking-wider text-white uppercase transition-all hover:bg-blue-600"
                                >
                                    Liên hệ Admin để đóng quỹ
                                </a>
                                <a
                                    href="/dieu-khoan"
                                    class="rounded-full border border-gray-200 px-5 py-2 text-[10px] font-bold tracking-wider text-gray-700 uppercase transition-all hover:bg-gray-50 dark:border-slate-700 dark:text-gray-300 dark:hover:bg-slate-800"
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
    @push("scripts")
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const searchInput = document.querySelector('input[name="search"]');
                const listContainer = document.getElementById('insurance-list-container');
                let debounceTimer;

                if (searchInput) {
                    searchInput.addEventListener('input', function () {
                        const query = this.value;
                        clearTimeout(debounceTimer);

                        debounceTimer = setTimeout(() => {
                            const url = new URL(window.location.href);
                            url.searchParams.set('search', query);

                            // Show some loading state if needed
                            listContainer.style.opacity = '0.5';

                            fetch(url, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                            })
                                .then((response) => response.text())
                                .then((html) => {
                                    const parser = new DOMParser();
                                    const doc = parser.parseFromString(html, 'text/html');
                                    const newList = doc.getElementById('insurance-list-container');

                                    if (newList) {
                                        listContainer.innerHTML = newList.innerHTML;
                                        // Update URL without reload
                                        window.history.pushState({}, '', url);
                                    }
                                    listContainer.style.opacity = '1';
                                })
                                .catch((error) => {
                                    console.error('Search error:', error);
                                    listContainer.style.opacity = '1';
                                });
                        }, 400); // 400ms debounce
                    });

                    // Prevent form submit on Enter to keep it purely AJAX
                    const form = searchInput.closest('form');
                    if (form) {
                        form.addEventListener('submit', (e) => e.preventDefault());
                    }
                }
            });
        </script>
    @endpush
@endsection

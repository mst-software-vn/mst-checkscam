@props([
    'stats' => [],
    'isAction' => true
])
<section class="relative overflow-hidden py-12 {{ $isAction ? "md:pb-20" : "" }} md:pb-2">
    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">
            <h1
                class="hero-title scanner-title mb-6 text-3xl leading-[1.4] font-black uppercase md:text-4xl lg:text-5xl"
            >
                KIỂM TRA & TỐ CÁO SCAM.
            </h1>
            <p
                class="mx-auto mb-10 max-w-2xl text-sm leading-relaxed font-medium text-gray-600 md:text-lg dark:text-gray-400"
            >
                Hệ thống dữ liệu lớn nhất Việt Nam giúp bạn kiểm tra độ tín nhiệm của đối tác thông qua SĐT, Số TK hoặc
                Link mạng xã hội.
            </p>

            <!-- Search Box Centered -->
            <div class="mx-auto mb-6 max-w-3xl">
                <div
                    id="search-wrapper"
                    class="focus-within:border-cs_blue relative rounded-2xl border-2 border-gray-200 bg-white p-1 shadow-xl shadow-blue-900/5 transition-all focus-within:ring-4 focus-within:ring-blue-100 md:p-2 dark:border-gray-800 dark:bg-slate-900 dark:focus-within:ring-blue-900/30"
                    style="
                        transition:
                            border-radius 0.15s ease,
                            border-color 0.2s;
                    "
                >
                    <form action="{{ route("search.index") }}" method="GET" class="relative">
                        <div class="flex flex-col items-center gap-2 sm:flex-row">
                            <div class="relative flex w-full min-w-0 flex-1 items-center">
                                <div class="pointer-events-none flex items-center pl-4">
                                    <i class="fa-solid fa-magnifying-glass text-lg text-gray-400"></i>
                                </div>
                                <input
                                    type="text"
                                    name="q"
                                    id="searchInput"
                                    value="{{ request()->query("q") }}"
                                    autocomplete="off"
                                    class="w-full border-none bg-transparent py-3 pr-4 pl-3 text-sm font-bold text-gray-800 placeholder-gray-400 outline-none focus:ring-0 md:text-base dark:text-gray-300 dark:placeholder-gray-600"
                                    placeholder="Nhập Số tài khoản, SĐT hoặc Link..."
                                    required
                                />
                            </div>
                            <button
                                type="submit"
                                class="bg-cs_blue w-full cursor-pointer rounded-xl px-8 py-3 text-xs font-black tracking-widest whitespace-nowrap text-white uppercase shadow-lg transition-all hover:bg-blue-600 active:scale-95 sm:w-auto md:text-sm"
                            >
                                Tra cứu
                            </button>
                        </div>

                        <!-- Dropdown gợi ý — KHÔNG có mt, nằm sát search box -->
                        <ul
                            id="searchResults"
                            class="absolute top-full right-0 left-0 z-50 max-h-80 divide-y divide-gray-50 overflow-y-auto rounded-b-2xl border-t border-gray-100 bg-white text-left shadow-xl shadow-blue-900/10 dark:divide-gray-800 dark:border-gray-700/60 dark:bg-slate-900 dark:shadow-black/30"
                            style="display: none; margin: 0 -9px; width: calc(100% + 18px)"
                        ></ul>
                    </form>
                </div>

                @if (! request()->query("q"))
                    <div
                        class="mt-6 flex flex-wrap justify-center gap-3 text-[11px] font-bold text-gray-500 md:gap-8 md:text-sm dark:text-gray-400"
                    >
                        <span class="flex items-center">
                            <i class="fa-solid fa-circle text-cs_red mr-2 animate-pulse text-[6px]"></i>
                            {{ number_format($stats["total_scammers"] ?? 0) }} Kẻ Lừa đảo
                        </span>
                        <span class="flex items-center">
                            <i class="fa-solid fa-circle text-cs_blue mr-2 text-[6px]"></i>
                            {{ number_format($stats["total_comments"] ?? 0) }} Bình luận
                        </span>
                    </div>
                @endif
            </div>

            @if($isAction)
            <div class="mt-8 grid grid-cols-2 gap-3 md:mt-12 md:grid-cols-4 md:gap-4">
                <x-hero.action-card href="/to-cao-lua-dao/" icon="fa-bullhorn" label="Tố Cáo Scam" sub="Report" color="red" />
                <x-hero.action-card href="/bao-hiem-cs/" icon="fa-shield-cat" label="Bảo Hiểm CS" sub="Insurance" color="blue" />
                <x-hero.action-card href="#" icon="fa-store" label="Chợ Buôn Bán" sub="Trading" color="green" />
                <x-hero.action-card href="#" icon="fa-brands fa-telegram" label="Bot Check" sub="Automation" color="blue" />
            </div>
            @endif
        </div>
    </div>
</section>

@push("scripts")
    <script>
        $(document).ready(function () {
            const $input = $('#searchInput');
            const $results = $('#searchResults');
            const $wrapper = $('#search-wrapper');

            if (!$input.length || !$results.length) return;

            function openDropdown() {
                $wrapper.css('border-radius', '1rem 1rem 0 0');
                $results.show();
            }

            function closeDropdown() {
                $wrapper.css('border-radius', '');
                $results.hide().empty();
            }

            function fetchSuggestions(query) {
                $.ajax({
                    url: `{{ route("search.autocomplete") }}`,
                    method: 'GET',
                    data: {
                        q: query,
                    },
                    dataType: 'json',
                    success: function (data) {
                        $results.empty();

                        if (data && data.length > 0) {
                            $.each(data, function (index, item) {
                                let typeLabel = item.type;
                                let typeColor = 'bg-gray-100 text-gray-500 dark:bg-gray-800 dark:text-gray-400';

                                if (item.type === 'bank') {
                                    typeColor = 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400';
                                    typeLabel = 'Ngân hàng';
                                } else if (item.type === 'phone') {
                                    typeColor = 'bg-green-50 text-green-600 dark:bg-green-900/30 dark:text-green-400';
                                    typeLabel = 'SĐT';
                                } else if (item.type === 'facebook') {
                                    typeColor =
                                        'bg-indigo-50 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400';
                                    typeLabel = 'Facebook';
                                }

                                const nameHTML = item.target_name
                                    ? `<span class="text-[12px] text-gray-400 dark:text-gray-500 ml-1">— ${item.target_name}</span>`
                                    : '';

                                const $li = $('<li>', {
                                    class: 'flex items-center gap-3 px-7 py-5 hover:bg-gray-50 dark:hover:bg-slate-800/60 cursor-pointer transition-colors group',
                                    html: `
                                <i class="fa-solid fa-magnifying-glass text-gray-300 dark:text-gray-600 text-xs group-hover:text-gray-400 transition-colors"></i>
                                <div class="flex items-center gap-2 min-w-0 flex-1">
                                    <span class="font-bold text-[14px] text-gray-800 dark:text-gray-200 truncate">${item.value}</span>
                                    ${nameHTML}
                                </div>
                                <span class="text-[9px] uppercase font-bold px-2 py-0.5 rounded shrink-0 ${typeColor}">${typeLabel}</span>
                            `,
                                });

                                $li.on('click', function () {
                                    $input.val(item.value);
                                    $input.closest('form').submit();
                                });
                                $results.append($li);
                            });
                        } else {
                            let displayQuery = query;

                            if (/^\d+$/.test(query)) {
                                if (query.length > 10) {
                                    displayQuery = '... ' + query.slice(-3);
                                }
                            } else if (query.length > 15) {
                                const words = query.trim().split(/\s+/);
                                if (words.length > 1) {
                                    displayQuery = '... ' + words[words.length - 1];
                                } else {
                                    displayQuery = '... ' + query.slice(-3);
                                }
                            }

                            const $ghostLi = $('<li>', {
                                class: 'flex items-center gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-slate-800/60 cursor-pointer transition-colors group',
                                html: `
            <i class="fa-solid fa-magnifying-glass text-gray-300 dark:text-gray-600 text-xs group-hover:text-gray-400 transition-colors"></i>
            <span class="text-sm font-bold text-gray-700 dark:text-gray-300 flex-1">
                Tra cứu "<span class="text-cs_blue">${displayQuery}</span>"
            </span>
            <i class="fa-solid fa-arrow-right text-xs text-gray-300 dark:text-gray-600 group-hover:text-gray-400 transition-colors"></i>
        `,
                            });

                            $ghostLi.on('click', function () {
                                $input.val(query);
                                $input.closest('form').submit();
                            });
                            $results.append($ghostLi);
                        }

                        openDropdown();
                    },
                    error: function () {
                        closeDropdown();
                    },
                });
            }

            let timeoutId;
            $input.on('input', function () {
                clearTimeout(timeoutId);
                const query = $(this).val().trim();
                if (query.length < 2) {
                    closeDropdown();
                    return;
                }

                timeoutId = setTimeout(() => fetchSuggestions(query), 350);
            });

            $input.on('focus', function () {
                if ($results.children().length > 0) openDropdown();
            });

            $(document).on('click', function (e) {
                if (!$(e.target).closest('#search-wrapper').length) closeDropdown();
            });
        });
    </script>
@endpush

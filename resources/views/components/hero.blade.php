<!-- Hero Section -->
<section class="relative overflow-hidden py-12 md:py-20 md:pb-2">
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
                    class="focus-within:border-cs_blue relative rounded-2xl border-2 border-gray-200 bg-white p-1 shadow-xl shadow-blue-900/5 transition-all focus-within:ring-4 focus-within:ring-blue-100 md:p-2 dark:border-gray-800 dark:bg-slate-900 dark:focus-within:ring-blue-900/30"
                >
                    <form action="{{ route('search.index') }}" method="GET" class="relative">
                        <div class="flex flex-col items-center gap-2 sm:flex-row">
                            <div class="flex w-full min-w-0 flex-1 items-center relative">
                                <div class="pointer-events-none flex items-center pl-4">
                                    <i class="fa-solid fa-magnifying-glass text-lg text-gray-400"></i>
                                </div>
                                <input
                                    type="text"
                                    name="q"
                                    id="searchInput"
                                    value="{{ request()->query('q') }}"
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
                        
                        <!-- Div hiển thị gợi ý AutoComplete -->
                        <ul id="searchResults" class="absolute left-0 right-0 top-full mt-2 rounded-xl bg-white shadow-xl border border-gray-100 dark:bg-slate-800 dark:border-gray-700 max-h-80 overflow-y-auto text-left z-50 divide-y divide-gray-50 dark:divide-gray-700/50" style="display: none;"></ul>
                    </form>
                </div>
                @if (! request()->query("q"))
                    <!-- Stats -->
                    <div
                        class="mt-6 flex flex-wrap justify-center gap-3 text-[11px] font-bold text-gray-500 md:gap-8 md:text-sm dark:text-gray-400"
                    >
                        <span class="flex items-center">
                            <i class="fa-solid fa-circle text-cs_red mr-2 animate-pulse text-[6px]"></i>
                            62.472 STK Lừa đảo
                        </span>
                        <span class="flex items-center">
                            <i class="fa-solid fa-circle text-cs_blue mr-2 text-[6px]"></i>
                            8.605 Bình luận mới
                        </span>
                    </div>
                @endif
            </div>

            <div class="mt-8 grid grid-cols-2 gap-3 md:mt-12 md:grid-cols-4 md:gap-4">
                <a
                    href="/to-cao-lua-dao/"
                    class="dark:bg-dark_card group flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 shadow-xs transition-all hover:bg-red-50 md:gap-4 md:p-4 dark:border-gray-800 dark:hover:bg-red-900/10"
                >
                    <div
                        class="text-cs_red flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 transition-transform group-hover:rotate-12 md:h-12 md:w-12 md:text-xl dark:bg-red-900/30"
                    >
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-[8px] font-black text-gray-400 uppercase md:text-[9px] dark:text-gray-500">
                            Report
                        </p>
                        <p
                            class="group-hover:text-cs_red text-[10px] font-black text-gray-800 uppercase transition-colors md:text-xs dark:text-gray-200"
                        >
                            Tố Cáo Scam
                        </p>
                    </div>
                </a>

                <a
                    href="/bao-hiem-cs/"
                    class="dark:bg-dark_card group flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 shadow-xs transition-all hover:bg-blue-50 md:gap-4 md:p-4 dark:border-gray-800 dark:hover:bg-blue-900/10"
                >
                    <div
                        class="text-cs_blue flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 transition-transform group-hover:rotate-12 md:h-12 md:w-12 md:text-xl dark:bg-blue-900/30"
                    >
                        <i class="fa-solid fa-shield-cat"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-[8px] font-black text-gray-400 uppercase md:text-[9px] dark:text-gray-500">
                            Insurance
                        </p>
                        <p
                            class="group-hover:text-cs_blue text-[10px] font-black text-gray-800 uppercase transition-colors md:text-xs dark:text-gray-200"
                        >
                            Bảo Hiểm CS
                        </p>
                    </div>
                </a>

                <a
                    href="#"
                    class="dark:bg-dark_card group flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 shadow-xs transition-all hover:bg-green-50 md:gap-4 md:p-4 dark:border-gray-800 dark:hover:bg-green-900/10"
                >
                    <div
                        class="text-cs_green flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-green-100 transition-transform group-hover:rotate-12 md:h-12 md:w-12 md:text-xl dark:bg-green-900/30"
                    >
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-[8px] font-black text-gray-400 uppercase md:text-[9px] dark:text-gray-500">
                            Trading
                        </p>
                        <p
                            class="group-hover:text-cs_green text-[10px] font-black text-gray-800 uppercase transition-colors md:text-xs dark:text-gray-200"
                        >
                            Chợ Buôn Bán
                        </p>
                    </div>
                </a>

                <a
                    href="#"
                    class="dark:bg-dark_card group flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 shadow-xs transition-all hover:bg-gray-50 md:gap-4 md:p-4 dark:border-gray-800 dark:hover:bg-slate-800"
                >
                    <div
                        class="text-cs_blue flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 transition-transform group-hover:rotate-12 md:h-12 md:w-12 md:text-xl dark:bg-slate-800"
                    >
                        <i class="fa-brands fa-telegram"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-[8px] font-black text-gray-400 uppercase md:text-[9px] dark:text-gray-500">
                            Automation
                        </p>
                        <p
                            class="group-hover:text-cs_blue text-[10px] font-black text-gray-800 uppercase transition-colors md:text-xs dark:text-gray-200"
                        >
                            Bot Check
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@push("scripts")
<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('searchInput');
    const resultsObj = document.getElementById('searchResults');

    if (!input || !resultsObj) return;

    let timeoutId;
    input.addEventListener('input', function() {
        clearTimeout(timeoutId);
        const query = this.value;

        if (query.length < 3) {
            resultsObj.style.display = 'none';
            return;
        }

        timeoutId = setTimeout(() => {
            fetch(`{{ route('search.autocomplete') }}?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    resultsObj.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(item => {
                            const li = document.createElement('li');
                            li.className = 'p-3 hover:bg-gray-50 dark:hover:bg-slate-700/50 cursor-pointer transition-colors';
                            
                            // Style type badge based on type
                            let typeColor = 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400';
                            if (item.type === 'bank') typeColor = 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400';
                            if (item.type === 'phone') typeColor = 'bg-green-50 text-green-600 dark:bg-green-900/30 dark:text-green-400';
                            if (item.type === 'facebook') typeColor = 'bg-indigo-50 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400';
                            
                            const targetNameHTML = item.target_name ? `<div class="text-xs text-gray-500 dark:text-gray-400 mt-1"><i class="fa-regular fa-user mr-1"></i>${item.target_name}</div>` : '';
                            
                            li.innerHTML = `
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-sm text-gray-800 dark:text-gray-200">${item.value}</span>
                                        <span class="text-[9px] uppercase font-bold px-2 py-0.5 rounded ${typeColor}">${item.type}</span>
                                    </div>
                                    ${targetNameHTML}
                                </div>
                            `;
                            
                            li.addEventListener('click', () => {
                                input.value = item.value;
                                input.closest('form').submit();
                            });
                            resultsObj.appendChild(li);
                        });
                        resultsObj.style.display = 'block';
                    } else {
                        resultsObj.innerHTML = `
                            <li class="p-4 text-center text-sm text-gray-500 dark:text-gray-400 font-medium">
                                <i class="fa-regular fa-face-frown text-lg mb-2 block"></i>
                                Không tìm thấy dữ liệu phù hợp
                            </li>
                        `;
                        resultsObj.style.display = 'block';
                    }
                })
                .catch(() => {
                    resultsObj.style.display = 'none';
                });
        }, 300);
    });

    document.addEventListener('click', function(e) {
        if (!input.contains(e.target) && !resultsObj.contains(e.target)) {
            resultsObj.style.display = 'none';
        }
    });
});
</script>
@endpush

@extends("layouts.app")

@section("content")
    <main class="pb-24">
        <x-breadcrumb :links="[['name' => 'Kiến thức MMO', 'url' => '/bai-viet']]" />
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Section Header & Filter -->
            <div class="mb-14 flex flex-col justify-between gap-8 lg:flex-row lg:items-end">
                <!-- Header Text -->
                <div class="max-w-2xl">
                    <h1 class="text-3xl font-bold tracking-tight text-slate-900 md:text-4xl dark:text-gray-300">
                        Học viện
                        <span class="text-gray-600 dark:text-slate-50">Bảo mật & MMO</span>
                    </h1>
                    <p class="mt-4 text-base text-gray-500 md:text-lg dark:text-gray-400">
                        Chia sẻ kinh nghiệm kiếm tiền online an toàn, thủ thuật bảo vệ tài sản và cập nhật các hành vi
                        lừa đảo mới nhất.
                    </p>
                </div>

                <!-- Filters -->
                <div class="flex w-full shrink-0 flex-col gap-4 sm:flex-row lg:w-auto">
                    <!-- Search Box -->
                    <div class="group relative w-full sm:w-auto">
                        <form action="{{ route("posts.frontend.index") }}" method="GET" id="search-form">
                            <input
                                type="text"
                                name="search"
                                value="{{ request("search") }}"
                                placeholder="Tìm thủ thuật, cảnh báo..."
                                class="w-full rounded-2xl border border-gray-200 bg-gray-50 py-3.5 pr-12 pl-5 text-sm font-medium shadow-sm transition-all focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 focus:outline-none sm:w-[280px] dark:border-gray-800 dark:bg-slate-900/50 dark:text-gray-300 dark:placeholder-gray-500"
                            />
                            <button
                                type="submit"
                                class="absolute top-1/4 right-4 text-gray-400 transition-colors group-hover:text-blue-500"
                            >
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Posts Grid -->
            <div id="posts-list-container">
                <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3" id="posts-grid">
                    @forelse ($posts as $index => $post)
                        @if ($index == 0 && $posts->currentPage() == 1 && ! request("search"))
                            <!-- Hero Featured Post -->
                            <article class="group md:col-span-2 lg:col-span-3">
                                <a
                                    href="{{ route("posts.frontend.show", $post->slug) }}"
                                    class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12"
                                >
                                    <div class="overflow-hidden rounded-3xl lg:col-span-7">
                                        <img
                                            src="{{ $post->thumbnail_url }}"
                                            class="h-[400px] w-full object-cover transition-transform duration-500 group-hover:scale-[1.01]"
                                            alt="{{ $post->title }}"
                                        />
                                    </div>
                                    <div class="lg:col-span-5">
                                        <div class="mb-4 flex items-center gap-3">
                                            <span
                                                class="rounded-md bg-gray-100 px-3 py-1 text-[10px] font-bold tracking-wider text-gray-500 uppercase dark:bg-slate-800 dark:text-gray-400"
                                            >
                                                Kiến thức
                                            </span>
                                            <span class="text-xs font-medium text-gray-400">
                                                {{ $post->created_at->format("d/m/Y") }}
                                            </span>
                                        </div>
                                        <h2
                                            class="text-2xl leading-tight font-bold text-slate-900 transition-colors duration-300 group-hover:text-blue-600 md:text-3xl dark:text-gray-300 dark:group-hover:text-white"
                                        >
                                            {{ $post->title }}
                                        </h2>
                                        <p
                                            class="mt-4 line-clamp-3 text-base leading-relaxed text-gray-500 dark:text-slate-200"
                                        >
                                            {{ $post->description }}
                                        </p>
                                        <div
                                            class="mt-6 flex items-center gap-2 text-sm font-bold tracking-wider text-gray-400 uppercase transition-colors group-hover:text-blue-500 dark:group-hover:text-blue-400"
                                        >
                                            Tiếp tục đọc
                                            <i
                                                class="fa-solid fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"
                                            ></i>
                                        </div>
                                    </div>
                                </a>
                            </article>
                            <div
                                class="my-4 border-b border-gray-100 md:col-span-2 lg:col-span-3 dark:border-gray-800"
                            ></div>
                        @else
                            <!-- Regular Post Item -->
                            <article class="group flex h-full flex-col">
                                <a
                                    href="{{ route("posts.frontend.show", $post->slug) }}"
                                    class="flex h-full flex-col overflow-hidden"
                                >
                                    <div class="relative overflow-hidden rounded-3xl">
                                        <img
                                            src="{{ $post->thumbnail_url }}"
                                            class="aspect-[16/10] w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            alt="{{ $post->title }}"
                                        />
                                    </div>
                                    <div class="flex flex-1 flex-col py-6">
                                        <div class="mb-3 flex items-center gap-3">
                                            <span
                                                class="rounded-md bg-gray-100 px-2 py-0.5 text-[9px] font-bold tracking-wider text-gray-400 uppercase dark:bg-slate-800"
                                            >
                                                Tin tức
                                            </span>
                                            <span class="text-[11px] font-medium text-gray-400">
                                                {{ $post->created_at->format("d/m/Y") }}
                                            </span>
                                        </div>
                                        <h3
                                            class="line-clamp-2 text-lg font-bold text-slate-900 transition-colors duration-300 group-hover:text-blue-600 dark:text-gray-300 dark:group-hover:text-white"
                                        >
                                            {{ $post->title }}
                                        </h3>
                                        <p
                                            class="mt-3 line-clamp-2 text-sm leading-relaxed text-gray-500 dark:text-slate-200"
                                        >
                                            {{ $post->description }}
                                        </p>
                                        <div
                                            class="mt-auto flex items-center gap-2 pt-6 text-xs font-bold tracking-widest text-gray-400 uppercase transition-colors group-hover:text-blue-500 dark:group-hover:text-blue-400"
                                        >
                                            Tiếp tục đọc
                                            <i
                                                class="fa-solid fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"
                                            ></i>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endif
                    @empty
                        <div class="col-span-full py-24 text-center">
                            <div
                                class="mb-6 inline-flex h-24 w-24 items-center justify-center rounded-full bg-gray-50 dark:bg-slate-800"
                            >
                                <i class="fa-solid fa-newspaper text-4xl text-gray-200"></i>
                            </div>
                            <h3 class="text-xl font-black text-gray-900 dark:text-gray-300">Không tìm thấy bài viết</h3>
                            <p class="mt-2 text-gray-500">Không có kết quả nào khớp với yêu cầu tìm kiếm của bạn.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Load More Button -->
                @if ($posts->hasMorePages())
                    <div class="mt-20 flex justify-center" id="load-more-container">
                        <button
                            id="btn-load-more"
                            data-next-page="{{ $posts->currentPage() + 1 }}"
                            class="group relative inline-flex items-center gap-3 overflow-hidden rounded-2xl bg-white px-10 py-4.5 text-sm font-bold text-slate-900 shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all hover:bg-slate-900 hover:text-white dark:bg-slate-900 dark:text-white dark:hover:bg-blue-600"
                        >
                            <span>Xem thêm bài viết</span>
                            <i
                                class="fa-solid fa-arrow-down-long text-xs transition-transform group-hover:translate-y-1"
                            ></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </main>
    @push("scripts")
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const filterForm = document.querySelector('form[action="{{ route("posts.frontend.index") }}"]');
                const listContainer = document.getElementById('posts-list-container');
                let debounceTimer;

                if (filterForm) {
                    const handleSearch = function () {
                        const formData = new FormData(filterForm);
                        const params = new URLSearchParams(formData);
                        const query = params.toString();

                        clearTimeout(debounceTimer);

                        debounceTimer = setTimeout(() => {
                            const url = new URL(window.location.href);
                            url.search = query;
                            url.searchParams.delete('page');

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
                                    const newList = doc.getElementById('posts-list-container');

                                    if (newList) {
                                        listContainer.innerHTML = newList.innerHTML;
                                        window.history.pushState({}, '', url);
                                        initLoadMore();
                                    }
                                    listContainer.style.opacity = '1';
                                })
                                .catch((error) => {
                                    console.error('Search error:', error);
                                    listContainer.style.opacity = '1';
                                });
                        }, 400);
                    };

                    filterForm.addEventListener('input', handleSearch);
                    filterForm.addEventListener('submit', (e) => e.preventDefault());
                }

                function initLoadMore() {
                    const btnLoadMore = document.getElementById('btn-load-more');
                    if (!btnLoadMore) return;

                    btnLoadMore.addEventListener('click', function () {
                        const btn = this;
                        const nextPage = btn.getAttribute('data-next-page');
                        const url = new URL(window.location.href);
                        url.searchParams.set('page', nextPage);

                        btn.disabled = true;
                        btn.innerHTML =
                            '<span>Đang tải bài viết...</span> <i class="fa-solid fa-circle-notch fa-spin text-xs"></i>';

                        // Thêm delay 800ms để tạo cảm giác mượt mà
                        setTimeout(() => {
                            fetch(url, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                            })
                                .then((response) => response.text())
                                .then((html) => {
                                    const parser = new DOMParser();
                                    const doc = parser.parseFromString(html, 'text/html');

                                    // Append posts
                                    const newPosts = doc.querySelectorAll('#posts-grid > article');
                                    const postsGrid = document.getElementById('posts-grid');
                                    newPosts.forEach((post) => postsGrid.appendChild(post));

                                    // Update/Remove button
                                    const newLoadMoreContainer = doc.getElementById('load-more-container');
                                    const currentLoadMoreContainer = document.getElementById('load-more-container');

                                    if (newLoadMoreContainer) {
                                        currentLoadMoreContainer.innerHTML = newLoadMoreContainer.innerHTML;
                                        initLoadMore(); // Re-init listener on the new button
                                    } else {
                                        currentLoadMoreContainer.remove();
                                    }

                                    window.history.replaceState({}, '', url);
                                })
                                .catch((error) => {
                                    console.error('Load more error:', error);
                                    btn.disabled = false;
                                    btn.innerHTML = '<span>Thử lại</span>';
                                });
                        }, 800);
                    });
                }

                initLoadMore();
            });
        </script>
    @endpush
@endsection

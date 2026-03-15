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
                    <!-- Category Select -->
                    <div class="group relative w-full sm:w-auto">
                        <select
                            class="w-full min-w-[200px] cursor-pointer appearance-none rounded-2xl border border-gray-200 bg-white py-3.5 pr-10 pl-5 text-sm font-bold text-gray-700 shadow-sm transition-all focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 focus:outline-none dark:border-gray-800 dark:bg-[#0B0F1A] dark:text-gray-300"
                        >
                            <option value="">Tất cả chủ đề</option>
                            <option value="canh-bao">Cảnh báo Scam</option>
                            <option value="bao-mat">Bảo mật tài khoản</option>
                            <option value="kinh-nghiem">Kinh nghiệm giao dịch</option>
                            <option value="tin-tuc">Tin tức MMO</option>
                        </select>
                        <i
                            class="fa-solid fa-chevron-down absolute top-1/3 right-4 text-sm text-gray-400 transition-colors group-hover:text-blue-500"
                        ></i>
                    </div>

                    <!-- Search Box -->
                    <div class="group relative w-full sm:w-auto">
                        <input
                            type="text"
                            placeholder="Tìm thủ thuật, cảnh báo..."
                            class="w-full rounded-2xl border border-gray-200 bg-gray-50 py-3.5 pr-12 pl-5 text-sm font-medium shadow-sm transition-all focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 focus:outline-none sm:w-[280px] dark:border-gray-800 dark:bg-slate-900/50 dark:text-gray-300 dark:placeholder-gray-500"
                        />
                        <button
                            class="absolute top-1/4 right-4 text-gray-400 transition-colors group-hover:text-blue-500"
                        >
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Posts Grid -->
            <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $index => $post)
                    @if ($index == 0 && $posts->currentPage() == 1)
                        <!-- Hero Featured Post -->
                        <article class="group md:col-span-2 lg:col-span-3">
                            <a
                                href="{{ route("posts.frontend.show", $post->slug) }}"
                                class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12"
                            >
                                <div class="overflow-hidden rounded-3xl lg:col-span-7">
                                    <img
                                        src="{{ asset("storage/" . $post->thumbnail) }}"
                                        class="h-[400px] w-full object-cover transition-transform duration-500 group-hover:scale-[1.01]"
                                        alt="{{ $post->title }}"
                                    />
                                </div>
                                <div class="lg:col-span-5">
                                    <div class="mb-4 flex items-center gap-3">
                                        <span
                                            class="rounded-md bg-gray-100 px-3 py-1 text-[10px] font-bold tracking-wider text-gray-500 uppercase dark:bg-slate-800 dark:text-gray-400"
                                        >
                                            Tin Tức
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
                                        class="mt-4 line-clamp-3 text-base leading-relaxed text-gray-500 dark:text-gray-400"
                                    >
                                        {{ $post->description }}
                                    </p>
                                    <div
                                        class="mt-6 flex items-center gap-2 text-sm font-bold tracking-wider text-gray-400 uppercase transition-colors group-hover:text-blue-500 dark:group-hover:text-blue-400"
                                    >
                                        Đọc tiếp
                                        <i
                                            class="fa-solid fa-arrow-right-long mt-0.5 transition-transform group-hover:translate-x-1.5"
                                        ></i>
                                    </div>
                                </div>
                            </a>
                        </article>
                        <div
                            class="my-4 border-b border-gray-100 md:col-span-2 lg:col-span-3 dark:border-gray-800"
                        ></div>
                    @else
                        <!-- Regular Post -->
                        <article class="group">
                            <a href="{{ route("posts.frontend.show", $post->slug) }}" class="flex h-full flex-col">
                                <div class="relative mb-6 aspect-16/10 overflow-hidden rounded-2xl">
                                    <img
                                        src="{{ asset("storage/" . $post->thumbnail) }}"
                                        class="h-full w-full object-cover transition-transform duration-500"
                                        alt="{{ $post->title }}"
                                    />
                                </div>
                                <div class="flex grow flex-col">
                                    <div class="mb-3 flex items-center gap-3">
                                        <span
                                            class="text-[10px] font-bold tracking-widest text-gray-400 uppercase transition-colors duration-300 group-hover:text-blue-500 dark:group-hover:text-blue-400"
                                        >
                                            Tin Tức
                                        </span>
                                        <span class="text-[10px] font-bold text-gray-400 uppercase">
                                            {{ $post->created_at->format("d/m/Y") }}
                                        </span>
                                    </div>
                                    <h3
                                        class="text-xl leading-snug font-bold text-slate-900 transition-colors duration-500 group-hover:text-blue-600 dark:text-gray-300 dark:group-hover:text-white"
                                    >
                                        {{ $post->title }}
                                    </h3>
                                    <p
                                        class="mt-3 line-clamp-2 text-sm leading-relaxed text-gray-500 dark:text-gray-400"
                                    >
                                        {{ $post->description }}
                                    </p>
                                    <div
                                        class="mt-auto flex items-center gap-2 pt-6 text-xs font-bold tracking-widest text-gray-400 uppercase transition-colors group-hover:text-blue-500 dark:group-hover:text-blue-400"
                                    >
                                        Xem chi tiết
                                        <i
                                            class="fa-solid fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"
                                        ></i>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-24 border-t border-gray-100 pt-12 dark:border-gray-800">
                <div class="flex justify-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection

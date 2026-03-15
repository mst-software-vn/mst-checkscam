@extends("layouts.app")

@section("title", "Lật tẩy chiêu trò lừa đảo qua tin nhắn iMessage và SMS giả mạo ngân hàng - CheckScam.VN")

@section("content")
    <!-- Reading Progress Bar -->
    <div
        id="progress-bar"
        class="bg-cs_blue fixed top-0 left-0 z-[9999] h-1 transition-all duration-300 ease-out"
        style="width: 0%"
    ></div>

    <main class="pb-24">
        <x-breadcrumb
            :links="[
                ['name' => 'Kiến thức MMO', 'url' => route('posts.frontend.index')],
                [
                    'name' => $post->title,
                    'url' => route('posts.frontend.show', $post->slug),
                ],
            ]"
        />
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 lg:flex-row">
                <!-- 1. LEFT: Floating Sticky Share (Hidden on Mobile) -->
                <aside class="hidden w-[60px] shrink-0 xl:block">
                    <div class="sticky top-32 flex flex-col items-center gap-3">
                        <p
                            class="vertical-text mb-4 text-[9px] font-black tracking-[0.3em] text-gray-300 uppercase dark:text-gray-600"
                        >
                            Sharing
                        </p>

                        <a
                            href="#"
                            class="dark:bg-dark_card group flex h-10 w-10 items-center justify-center rounded-xl border border-gray-100 bg-white/90 text-gray-400 transition-all hover:border-[#1877F2]/30 hover:text-[#1877F2] hover:shadow-lg hover:shadow-[#1877F2]/10 dark:border-gray-800"
                        >
                            <i class="fa-brands fa-facebook-f text-sm transition-transform group-hover:scale-110"></i>
                        </a>

                        <a
                            href="#"
                            class="dark:bg-dark_card hover:text-cs_blue hover:border-cs_blue/30 group flex h-10 w-10 items-center justify-center rounded-xl border border-gray-100 bg-white/90 text-gray-400 transition-all hover:shadow-lg hover:shadow-blue-500/10 dark:border-gray-800"
                        >
                            <i class="fa-brands fa-telegram text-sm transition-transform group-hover:scale-110"></i>
                        </a>

                        <button
                            id="copy-link-btn"
                            class="dark:bg-dark_card hover:text-cs_blue hover:border-cs_blue/30 group flex h-10 w-10 items-center justify-center rounded-xl border border-gray-100 bg-white/90 text-gray-400 transition-all hover:shadow-lg hover:shadow-blue-500/10 dark:border-gray-800"
                        >
                            <i class="fa-solid fa-link text-sm transition-transform group-hover:scale-110"></i>
                        </button>

                        <div class="mt-4 h-12 w-[1px] bg-gray-300 dark:bg-gray-800"></div>

                        <div class="flex flex-col items-center gap-1">
                            <span class="text-[14px] font-black text-gray-900 dark:text-gray-300">
                                {{ number_format($post->view_count) }}
                            </span>
                            <span class="text-[8px] font-bold tracking-tighter text-gray-400 uppercase">Views</span>
                        </div>
                    </div>
                </aside>

                <!-- 2. CENTER: Main Content -->
                <article class="min-w-0 flex-1">
                    <div
                        class="dark:bg-dark_card overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-xs dark:border-gray-800/80"
                    >
                        <!-- Post Header -->
                        <header class="border-b border-gray-50 p-8 md:p-8 dark:border-gray-800/40">
                            <div class="mb-6 flex items-center gap-3">
                                <span
                                    class="text-cs_blue rounded-lg border border-blue-100/50 bg-blue-50 px-3 py-1 text-[10px] font-black tracking-widest uppercase dark:border-blue-900/30 dark:bg-blue-900/20"
                                >
                                    <i class="fa-solid fa-shield-halved mr-1"></i>
                                    Security Alert
                                </span>
                                <span class="h-1 w-1 rounded-full bg-gray-200 dark:bg-gray-700"></span>
                                <span
                                    class="text-[10px] font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
                                >
                                    7 Min Read
                                </span>
                            </div>

                            <h1
                                class="mb-8 text-3xl leading-[1.2] font-black tracking-tight text-gray-900 md:text-5xl dark:text-gray-300"
                            >
                                {{ $post->title }}
                            </h1>

                            <div class="flex items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="relative">
                                        <img
                                            src="https://ui-avatars.com/api/?name={{ urlencode($post->author->name ?? "Admin") }}&background=0068FF&color=fff"
                                            class="h-12 w-12 rounded-2xl border-2 border-white shadow-sm dark:border-gray-800"
                                            alt="Author"
                                        />
                                        <div
                                            class="bg-cs_blue absolute -right-1 -bottom-1 flex h-4 w-4 items-center justify-center rounded-full border-2 border-white dark:border-gray-900"
                                        >
                                            <i class="fa-solid fa-check text-[6px] text-white"></i>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-sm font-black text-gray-900 md:text-base dark:text-gray-300">
                                            {{ $post->author->name ?? "Admin" }}
                                        </p>
                                        <div
                                            class="flex items-center gap-2 text-[10px] font-bold tracking-tighter text-gray-400 uppercase"
                                        >
                                            <span>Security Researcher</span>
                                            <span class="h-1 w-1 rounded-full bg-gray-200 dark:bg-gray-700"></span>
                                            <span>{{ $post->created_at->format("M d, Y") }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden items-center gap-2 sm:flex">
                                    <div class="mr-3 text-right">
                                        <p class="text-[10px] font-bold text-gray-400 uppercase">Đánh giá bài viết</p>
                                        <div class="text-cs_orange flex gap-0.5 text-[10px]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>

                        <!-- Featured Image -->
                        <div class="group relative overflow-hidden">
                            <img
                                src="{{ asset("storage/" . $post->thumbnail) }}"
                                class="aspect-[21/9] w-full object-cover"
                                alt="{{ $post->title }}"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>

                        <!-- Post Body -->
                        <div class="p-8 md:p-14">
                            <section
                                class="prose prose-blue dark:prose-invert prose-headings:font-black prose-headings:text-gray-900 dark:prose-headings:text-white prose-headings:tracking-tight prose-p:text-gray-600 dark:prose-p:text-gray-400 prose-p:leading-[1.9] prose-p:text-[16px] md:prose-p:text-[17px] prose-strong:text-gray-800 dark:prose-strong:text-white prose-strong:font-black prose-img:rounded-2xl prose-img:shadow-sm prose-img:border prose-img:border-gray-100 dark:prose-img:border-gray-800 max-w-none"
                            >
                                {!! $post->content !!}
                            </section>

                            <!-- Social Counter & Tags -->
                            <div
                                class="mt-16 flex flex-col items-center justify-between gap-6 border-t border-gray-100 pt-10 md:flex-row dark:border-gray-800"
                            >
                                @if (! empty($post->hashtags))
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span
                                            class="mr-2 text-[10px] font-black tracking-[0.2em] text-gray-400 uppercase"
                                        >
                                            Tags:
                                        </span>
                                        @foreach (explode(",", $post->hashtags) as $tag)
                                            @if (trim($tag))
                                                <a
                                                    href="#"
                                                    class="hover:text-cs_blue rounded-lg bg-gray-50 px-3 py-1 text-[10px] font-bold text-gray-500 uppercase transition-colors dark:bg-slate-800 dark:text-gray-400"
                                                >
                                                    {{ trim($tag) }}
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    <div class="flex flex-wrap items-center gap-2"></div>
                                @endif
                                <div class="flex items-center gap-6">
                                    <div class="flex -space-x-2">
                                        @for ($i = 0; $i < 4; $i++)
                                            <img
                                                src="https://ui-avatars.com/api/?background=random&name=User+{{ $i }}"
                                                class="h-8 w-8 rounded-full border-2 border-white shadow-sm dark:border-gray-900"
                                                alt="U"
                                            />
                                        @endfor

                                        <div
                                            class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-100 text-[8px] font-bold text-gray-500 dark:border-gray-900 dark:bg-slate-800"
                                        >
                                            +25
                                        </div>
                                    </div>
                                    <p class="text-[10px] font-bold tracking-tight text-gray-400 uppercase">
                                        Đã chia sẻ bài viết này
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Section -->
                    <div class="mt-16">
                        <div class="mb-8 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="bg-cs_blue h-6 w-1.5 rounded-full"></div>
                                <h2
                                    class="text-xl font-black tracking-tight text-gray-900 uppercase dark:text-gray-300"
                                >
                                    Cẩm nang liên quan
                                </h2>
                            </div>
                            <a
                                href="/bai-viet"
                                class="text-cs_blue text-[11px] font-black tracking-widest uppercase hover:underline"
                            >
                                Xem tất cả
                            </a>
                        </div>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            @foreach ($relatedPosts as $related)
                                <a
                                    href="{{ route("posts.frontend.show", $related->slug) }}"
                                    class="group dark:bg-dark_card hover:border-cs_blue/30 overflow-hidden rounded-[2rem] border border-gray-100 bg-white shadow-xs transition-all dark:border-gray-800"
                                >
                                    <div class="aspect-video overflow-hidden">
                                        <img
                                            src="{{ asset("storage/" . $related->thumbnail) }}"
                                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                            alt="{{ $related->title }}"
                                        />
                                    </div>
                                    <div class="p-6">
                                        <div class="mb-3 flex items-center gap-2">
                                            <span
                                                class="text-cs_blue rounded bg-blue-50 px-2 py-0.5 text-[9px] leading-none font-black uppercase dark:bg-blue-900/20"
                                            >
                                                Tin tức
                                            </span>
                                            <span class="text-[9px] font-bold text-gray-400 uppercase">
                                                {{ $related->created_at->format("d M Y") }}
                                            </span>
                                        </div>
                                        <h3
                                            class="group-hover:text-cs_blue line-clamp-2 text-base leading-snug font-black text-gray-800 italic transition-colors dark:text-gray-100"
                                        >
                                            {{ $related->title }}
                                        </h3>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </article>

                <!-- 3. RIGHT: Sidebar Widgets (Copied from Home) -->
                <aside class="sticky top-32 h-fit w-full space-y-4 lg:w-[350px]">
                    <!-- Right Sidebar Banner -->
                    <x-ads-square image="https://i.ibb.co/kgwtn4vF/fpayment.jpg" url="#" alt="Fpayment Ads" />

                    <!-- Top Readers Widget (New Attraction) -->
                    <div
                        class="dark:bg-dark_card overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-800"
                    >
                        <div
                            class="border-b border-gray-50 bg-gray-50/50 p-6 dark:border-gray-800 dark:bg-slate-800/30"
                        >
                            <h4
                                class="flex items-center gap-2 text-[12px] font-black tracking-[0.2em] text-gray-900 uppercase dark:text-gray-300"
                            >
                                <i class="fa-solid fa-fire text-cs_orange animate-pulse"></i>
                                Đọc nhiều nhất
                            </h4>
                        </div>
                        <div class="divide-y divide-gray-50 dark:divide-gray-800">
                            @foreach ($popularPosts as $index => $popular)
                                <a
                                    href="{{ route("posts.frontend.show", $popular->slug) }}"
                                    class="group flex items-start gap-4 p-5 transition-colors hover:bg-gray-50 dark:hover:bg-slate-800/50"
                                >
                                    <span
                                        class="group-hover:text-cs_blue/20 text-xl font-black text-gray-100 transition-colors dark:text-gray-800"
                                    >
                                        0{{ $index + 1 }}
                                    </span>
                                    <div class="min-w-0 flex-1">
                                        <h5
                                            class="group-hover:text-cs_blue line-clamp-2 text-[12px] leading-snug font-bold text-gray-800 italic transition-colors dark:text-gray-200"
                                        >
                                            {{ $popular->title }}
                                        </h5>
                                        <div class="mt-2 flex items-center gap-3">
                                            <span class="text-[9px] font-bold tracking-tighter text-gray-400 uppercase">
                                                <i class="fa-regular fa-eye mr-1"></i>
                                                {{ number_format($popular->view_count) }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    <style>
        .vertical-text {
            writing-mode: tb-rl;
            transform: rotate(-180deg);
        }
    </style>

    <script>
        $(document).ready(function () {
            // Reading Progress Bar
            $(window).on('scroll', function () {
                const winScroll = $(window).scrollTop();
                const height = $(document).height() - $(window).height();
                const scrolled = (winScroll / height) * 100;
                $('#progress-bar').css('width', scrolled + '%');
            });

            $('#copy-link-btn').on('click', function () {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert('Đã sao chép liên kết vào bộ nhớ tạm!');
                });
            });
        });
    </script>
@endsection

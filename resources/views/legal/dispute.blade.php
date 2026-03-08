@extends("layouts.app")

@section("title", "Giải quyết khiếu nại - CheckScam Global")

@section("content")
    <main class="pb-24">
        <x-breadcrumb :links="[['name' => 'Giải quyết khiếu nại', 'url' => '/giai-quyet-khieu-nai']]" />

        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <header class="mb-12 text-center">
                <h1
                    class="mb-4 text-3xl font-black tracking-tighter text-gray-800 uppercase md:text-5xl dark:text-gray-100"
                >
                    Giải quyết
                    <span class="text-cs_blue">Khiếu nại</span>
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-bold tracking-widest text-gray-500 uppercase md:text-base dark:text-gray-400"
                >
                    Chính sách xử lý khi có nhầm lẫn hoặc người tố cáo muốn gỡ bài.
                </p>
            </header>

            <div class="mb-12 grid grid-cols-1 gap-6">
                <div
                    class="dark:bg-dark_card flex flex-col items-center gap-8 rounded-3xl border border-gray-100 bg-white p-8 shadow-xs md:flex-row dark:border-gray-800"
                >
                    <div
                        class="bg-cs_blue/10 text-cs_blue flex h-20 w-20 shrink-0 items-center justify-center rounded-full"
                    >
                        <i class="fa-solid fa-scale-balanced text-3xl"></i>
                    </div>
                    <div class="space-y-3">
                        <h2 class="text-xl font-black tracking-tight text-gray-800 uppercase dark:text-white">
                            Quy trình công bằng
                        </h2>
                        <p class="text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                            Chúng tôi luôn lắng nghe cả hai phía. Nếu bạn cho rằng mình bị tố cáo oan, vui lòng cung cấp
                            bằng chứng chứng minh giao dịch thành công hoặc sự nhầm lẫn.
                        </p>
                    </div>
                </div>

                <div
                    class="dark:bg-dark_card flex flex-col items-center gap-8 rounded-3xl border border-gray-100 bg-white p-8 shadow-xs md:flex-row dark:border-gray-800"
                >
                    <div
                        class="bg-cs_red/10 text-cs_red flex h-20 w-20 shrink-0 items-center justify-center rounded-full"
                    >
                        <i class="fa-solid fa-hand-holding-heart text-3xl"></i>
                    </div>
                    <div class="space-y-3">
                        <h2 class="text-xl font-black tracking-tight text-gray-800 uppercase dark:text-white">
                            Khôi phục uy tín
                        </h2>
                        <p class="text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                            Khi hai bên đã giải quyết xong và có sự xác nhận của người tố cáo ban đầu, CheckScam sẽ tiến
                            hành gỡ bài viết sau tối đa 12h làm việc.
                        </p>
                    </div>
                </div>
            </div>

            <article
                class="dark:bg-dark_card relative overflow-hidden rounded-3xl border border-gray-100 bg-white p-10 shadow-xs dark:border-gray-800"
            >
                <h3
                    class="border-cs_blue mb-6 border-l-4 pl-4 text-lg font-black text-gray-800 uppercase dark:text-white"
                >
                    Lưu ý quan trọng
                </h3>
                <div class="space-y-4">
                    <p
                        class="flex items-center gap-2 text-sm font-bold tracking-tighter text-gray-600 uppercase dark:text-gray-400"
                    >
                        <i class="fa-solid fa-circle-exclamation text-cs_red"></i>
                        Tuyệt đối KHÔNG hối lộ Admin để gỡ bài
                    </p>
                    <p
                        class="flex items-center gap-2 text-sm font-bold tracking-tighter text-gray-600 uppercase dark:text-gray-400"
                    >
                        <i class="fa-solid fa-circle-exclamation text-cs_red"></i>
                        Tuyệt đối KHÔNG đe dọa người tố cáo
                    </p>
                    <p
                        class="flex items-center gap-2 text-sm font-bold tracking-tighter text-gray-600 uppercase dark:text-gray-400"
                    >
                        <i class="fa-solid fa-circle-exclamation text-cs_red"></i>
                        Mọi bằng chứng giả mạo sẽ bị blacklist vĩnh viễn
                    </p>
                </div>

                <div class="mt-10 border-t border-gray-50 pt-10 text-center dark:border-gray-800">
                    <p class="mb-6 text-xs font-black tracking-[3px] text-gray-400 uppercase">Bạn cần khiếu nại?</p>
                    <a
                        href="/lien-he-admin"
                        class="inline-block rounded-2xl bg-gray-900 px-10 py-4 text-xs font-black tracking-widest text-white uppercase shadow-xl transition-all hover:scale-105 active:scale-95 dark:bg-white dark:text-gray-900"
                    >
                        Liên hệ Ban quản trị
                    </a>
                </div>
            </article>
        </div>
    </main>
@endsection

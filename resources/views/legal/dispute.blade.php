@extends('layouts.app')

@section('title', 'Giải quyết khiếu nại - CheckScam Global')

@section('content')
    <main class="bg-gray-50/40 dark:bg-dark_bg pb-24">
        <x-breadcrumb :links="[['name' => 'Giải quyết khiếu nại', 'url' => '/giai-quyet-khieu-nai']]" />

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <header class="mb-12 text-center">
                <h1 class="text-3xl md:text-5xl font-black text-gray-800 dark:text-gray-100 uppercase tracking-tighter mb-4">
                    Giải quyết <span class="text-cs_blue">Khiếu nại</span>
                </h1>
                <p
                    class="text-gray-500 dark:text-gray-400 font-bold text-sm md:text-base max-w-2xl mx-auto leading-relaxed uppercase tracking-widest">
                    Chính sách xử lý khi có nhầm lẫn hoặc người tố cáo muốn gỡ bài.
                </p>
            </header>

            <div class="grid grid-cols-1 gap-6 mb-12">
                <div
                    class="bg-white dark:bg-dark_card p-8 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800 flex flex-col md:flex-row gap-8 items-center">
                    <div class="w-20 h-20 bg-cs_blue/10 text-cs_blue rounded-full flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-scale-balanced text-3xl"></i>
                    </div>
                    <div class="space-y-3">
                        <h2 class="text-xl font-black text-gray-800 dark:text-white uppercase tracking-tight">Quy trình công
                            bằng</h2>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium">
                            Chúng tôi luôn lắng nghe cả hai phía. Nếu bạn cho rằng mình bị tố cáo oan, vui lòng cung cấp
                            bằng chứng chứng minh giao dịch thành công hoặc sự nhầm lẫn.
                        </p>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-dark_card p-8 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800 flex flex-col md:flex-row gap-8 items-center">
                    <div class="w-20 h-20 bg-cs_red/10 text-cs_red rounded-full flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-hand-holding-heart text-3xl"></i>
                    </div>
                    <div class="space-y-3">
                        <h2 class="text-xl font-black text-gray-800 dark:text-white uppercase tracking-tight">Khôi phục uy
                            tín</h2>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium">
                            Khi hai bên đã giải quyết xong và có sự xác nhận của người tố cáo ban đầu, CheckScam sẽ tiến
                            hành gỡ bài viết sau tối đa 12h làm việc.
                        </p>
                    </div>
                </div>
            </div>

            <article
                class="bg-white dark:bg-dark_card rounded-3xl p-10 border border-gray-100 dark:border-gray-800 shadow-xs relative overflow-hidden">
                <h3 class="text-lg font-black uppercase text-gray-800 dark:text-white mb-6 border-l-4 border-cs_blue pl-4">
                    Lưu ý quan trọng</h3>
                <div class="space-y-4">
                    <p
                        class="text-gray-600 dark:text-gray-400 text-sm font-bold uppercase tracking-tighter flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation text-cs_red"></i> Tuyệt đối KHÔNG hối lộ Admin để gỡ bài
                    </p>
                    <p
                        class="text-gray-600 dark:text-gray-400 text-sm font-bold uppercase tracking-tighter flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation text-cs_red"></i> Tuyệt đối KHÔNG đe dọa người tố cáo
                    </p>
                    <p
                        class="text-gray-600 dark:text-gray-400 text-sm font-bold uppercase tracking-tighter flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation text-cs_red"></i> Mọi bằng chứng giả mạo sẽ bị blacklist
                        vĩnh viễn
                    </p>
                </div>

                <div class="mt-10 pt-10 border-t border-gray-50 dark:border-gray-800 text-center">
                    <p class="text-xs font-black text-gray-400 uppercase tracking-[3px] mb-6">Bạn cần khiếu nại?</p>
                    <a href="/lien-he-admin"
                        class="inline-block py-4 px-10 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-2xl text-xs font-black uppercase tracking-widest transition-all hover:scale-105 active:scale-95 shadow-xl">
                        Liên hệ Ban quản trị
                    </a>
                </div>
            </article>
        </div>
    </main>
@endsection

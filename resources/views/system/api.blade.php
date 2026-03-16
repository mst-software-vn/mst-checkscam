@extends("layouts.app")

@section("title", "API Check Scam - Kết nối dữ liệu bảo vệ hệ thống")

@section("content")
    <main class="pb-24">
        <x-breadcrumb :links="[['name' => 'API Check Scam', 'url' => '/api-checkscam']]" />

        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <header class="mb-12 text-center">
                <h1
                    class="mb-4 text-3xl font-black tracking-tighter text-gray-800 uppercase md:text-5xl dark:text-gray-100"
                >
                    API
                    <span class="text-cs_blue">Check Scam</span>
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-bold tracking-wide text-gray-500 uppercase md:text-base dark:text-gray-400"
                >
                    Giải pháp tích hợp kiểm tra lừa đảo tự động cho website và ứng dụng của bạn.
                </p>
            </header>

            <div class="mb-16 grid grid-cols-1 gap-8 md:grid-cols-2">
                <div
                    class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-8 shadow-xs dark:border-gray-800"
                >
                    <div
                        class="text-cs_blue mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 dark:bg-blue-900/20"
                    >
                        <i class="fa-solid fa-code-merge text-2xl"></i>
                    </div>
                    <h2 class="mb-4 text-xl font-black text-gray-800 uppercase dark:text-white">
                        Dữ liệu thời gian thực
                    </h2>
                    <p class="text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                        Truy cập vào kho dữ liệu scam lớn nhất Việt Nam với hơn 45,000+ hồ sơ đã được xác minh. Cập nhật
                        liên tục mỗi phút.
                    </p>
                </div>

                <div
                    class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-8 shadow-xs dark:border-gray-800"
                >
                    <div
                        class="text-cs_green mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-green-50 dark:bg-green-900/20"
                    >
                        <i class="fa-solid fa-bolt text-2xl"></i>
                    </div>
                    <h2 class="mb-4 text-xl font-black text-gray-800 uppercase dark:text-white">Tốc độ & Hiệu suất</h2>
                    <p class="text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                        Hệ thống API tối ưu cho độ trễ cực thấp (< 100ms), sẵn sàng phục vụ các hệ thống thanh toán và
                        thương mại điện tử lớn.
                    </p>
                </div>
            </div>

            <article
                class="relative overflow-hidden rounded-3xl border border-transparent bg-slate-900 p-8 text-white shadow-2xl md:p-12 dark:border-slate-800 dark:bg-slate-900/50"
            >
                <div class="bg-cs_blue/10 absolute top-0 right-0 h-96 w-96 rounded-full opacity-50 blur-3xl"></div>

                <div class="relative z-10">
                    <h2 class="border-cs_blue mb-8 border-l-4 pl-4 text-2xl font-black uppercase">Tài liệu kỹ thuật</h2>

                    <div class="space-y-6">
                        <div
                            class="rounded-2xl border border-white/10 bg-white/5 p-6 dark:border-white/5 dark:bg-slate-800/20"
                        >
                            <p class="text-cs_blue mb-2 text-xs font-black tracking-widest uppercase">Endpoint</p>
                            <code
                                class="block rounded-lg border border-white/5 bg-black/30 p-3 font-mono text-sm text-gray-300"
                            >
                                GET https://api.checkscam.vn/v1/check/{id}
                            </code>
                        </div>

                        <div
                            class="rounded-2xl border border-white/10 bg-white/5 p-6 dark:border-white/5 dark:bg-slate-800/20"
                        >
                            <p class="text-cs_blue mb-2 text-xs font-black tracking-widest uppercase">Dữ liệu trả về</p>
                            <pre
                                class="overflow-x-auto rounded-lg border border-white/5 bg-black/30 p-4 font-mono text-[10px] text-gray-400 md:text-sm"
                            >
    {
      "status": "danger",
      "message": "Đối tượng nằm trong danh sách đen",
      "data": {
        "name": "NGUYEN VAN A",
        "stk": "0987xxx321",
        "bank": "Vietcombank",
        "reports": 3
      }
    }
    </pre
                            >
                        </div>
                    </div>

                    <div class="mt-12 text-center">
                        <a
                            href="#"
                            class="bg-cs_blue inline-block rounded-2xl px-10 py-4 text-xs leading-none font-black tracking-widest text-white uppercase shadow-xl shadow-blue-500/20 transition-all hover:bg-blue-600 active:scale-95"
                        >
                            Đăng ký API Key ngay
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </main>
@endsection

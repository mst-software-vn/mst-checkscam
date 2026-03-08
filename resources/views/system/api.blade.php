@extends('layouts.app')

@section('title', 'API Check Scam - Kết nối dữ liệu bảo vệ hệ thống')

@section('content')
    <main class="bg-gray-50/40 dark:bg-dark_bg pb-24">
        <x-breadcrumb :links="[['name' => 'API Check Scam', 'url' => '/api-checkscam']]" />

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <header class="mb-12 text-center">
                <h1 class="text-3xl md:text-5xl font-black text-gray-800 dark:text-gray-100 uppercase tracking-tighter mb-4">
                    API <span class="text-cs_blue">Check Scam</span>
                </h1>
                <p
                    class="text-gray-500 dark:text-gray-400 font-bold text-sm md:text-base max-w-2xl mx-auto leading-relaxed uppercase tracking-wide">
                    Giải pháp tích hợp kiểm tra lừa đảo tự động cho website và ứng dụng của bạn.
                </p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div
                    class="bg-white dark:bg-dark_card p-8 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800">
                    <div
                        class="w-14 h-14 bg-blue-50 dark:bg-blue-900/20 text-cs_blue rounded-2xl flex items-center justify-center mb-6">
                        <i class="fa-solid fa-code-merge text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-black text-gray-800 dark:text-white uppercase mb-4">Dữ liệu thời gian thực</h2>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium">
                        Truy cập vào kho dữ liệu scam lớn nhất Việt Nam với hơn 45,000+ hồ sơ đã được xác minh. Cập nhật
                        liên tục mỗi phút.
                    </p>
                </div>

                <div
                    class="bg-white dark:bg-dark_card p-8 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800">
                    <div
                        class="w-14 h-14 bg-green-50 dark:bg-green-900/20 text-cs_green rounded-2xl flex items-center justify-center mb-6">
                        <i class="fa-solid fa-bolt text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-black text-gray-800 dark:text-white uppercase mb-4">Tốc độ & Hiệu suất</h2>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium">
                        Hệ thống API tối ưu cho độ trễ cực thấp (< 100ms), sẵn sàng phục vụ các hệ thống thanh toán và
                            thương mại điện tử lớn. </p>
                </div>
            </div>

            <article
                class="bg-slate-900 dark:bg-slate-900/50 rounded-3xl p-8 md:p-12 text-white relative overflow-hidden shadow-2xl border border-transparent dark:border-slate-800">
                <div class="absolute top-0 right-0 w-96 h-96 bg-cs_blue/10 rounded-full blur-3xl opacity-50"></div>

                <div class="relative z-10">
                    <h2 class="text-2xl font-black uppercase mb-8 border-l-4 border-cs_blue pl-4">
                        Tài liệu kỹ thuật</h2>

                    <div class="space-y-6">
                        <div
                            class="bg-white/5 border border-white/10 dark:bg-slate-800/20 dark:border-white/5 rounded-2xl p-6">
                            <p class="text-cs_blue font-black text-xs uppercase mb-2 tracking-widest">Endpoint</p>
                            <code
                                class="text-sm font-mono text-gray-300 block bg-black/30 p-3 rounded-lg border border-white/5">GET
                                https://api.checkscam.vn/v1/check/{id}</code>
                        </div>

                        <div
                            class="bg-white/5 border border-white/10 dark:bg-slate-800/20 dark:border-white/5 rounded-2xl p-6">
                            <p class="text-cs_blue font-black text-xs uppercase mb-2 tracking-widest">Dữ liệu trả về</p>
                            <pre
                                class="text-[10px] md:text-sm font-mono text-gray-400 bg-black/30 p-4 rounded-lg overflow-x-auto border border-white/5">
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
</pre>
                        </div>
                    </div>

                    <div class="mt-12 text-center">
                        <a href="#"
                            class="inline-block bg-cs_blue hover:bg-blue-600 text-white font-black py-4 px-10 rounded-2xl transition-all active:scale-95 shadow-xl shadow-blue-500/20 uppercase text-xs tracking-widest leading-none">
                            Đăng ký API Key ngay
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </main>
@endsection

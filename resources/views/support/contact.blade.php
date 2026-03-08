@extends("layouts.app")

@section("title", "Liên hệ Admin - Hỗ trợ và Giải đáp thắc mắc")

@section("content")
    <main class="bg-gray-50/40 dark:bg-dark_bg pb-24">
        <x-breadcrumb :links="[['name' => 'Liên hệ Admin', 'url' => '/lien-he-admin']]" />

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <header class="mb-16 text-center">
                <h1
                    class="text-3xl md:text-5xl font-black text-gray-800 dark:text-gray-100 uppercase tracking-tighter mb-4"
                >
                    Liên hệ
                    <span class="text-cs_blue">Admin</span>
                </h1>
                <p
                    class="text-gray-500 dark:text-gray-400 font-bold text-sm max-w-2xl mx-auto leading-relaxed uppercase tracking-widest"
                >
                    Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn.
                </p>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Support Channels -->
                <div class="lg:col-span-1 space-y-6">
                    <div
                        class="bg-white dark:bg-dark_card p-8 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800 group hover:border-cs_blue transition-colors"
                    >
                        <div
                            class="w-12 h-12 bg-linear-to-br from-blue-400 to-blue-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-blue-500/20"
                        >
                            <i class="fa-brands fa-facebook-f text-xl"></i>
                        </div>
                        <h3 class="font-black text-gray-800 dark:text-white uppercase mb-2">Fanpage Chính Thức</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-xs font-bold uppercase mb-4 tracking-tighter">
                            Hỗ trợ nhanh 24/7
                        </p>
                        <a
                            href="https://www.facebook.com/mstsoftware.vn"
                            target="_blank"
                            class="block w-full py-3 bg-cs_blue text-white text-center rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 transition-all"
                        >
                            Gửi tin nhắn
                        </a>
                    </div>

                    <div
                        class="bg-white dark:bg-dark_card p-8 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800 group hover:border-cs_blue transition-colors"
                    >
                        <div
                            class="w-12 h-12 bg-linear-to-br from-gray-700 to-gray-900 text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-gray-500/20"
                        >
                            <i class="fa-solid fa-envelope text-xl"></i>
                        </div>
                        <h3 class="font-black text-gray-800 dark:text-white uppercase mb-2">Email Hỗ Trợ</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-xs font-bold uppercase mb-4 tracking-tighter">
                            mstsoftware.vn@gmail.com
                        </p>
                        <a
                            href="mailto:mstsoftware.vn@gmail.com"
                            class="block w-full py-3 border-2 border-gray-100 dark:border-gray-800 text-gray-400 hover:text-cs_blue hover:border-cs_blue text-center rounded-xl text-[10px] font-black uppercase tracking-widest transition-all"
                        >
                            Gửi Email
                        </a>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div
                        class="bg-white dark:bg-dark_card p-8 md:p-10 rounded-3xl shadow-xs border border-gray-100 dark:border-gray-800"
                    >
                        <div class="mb-8">
                            <h2 class="text-2xl font-black text-gray-800 dark:text-white uppercase tracking-tight">
                                Gửi yêu cầu hỗ trợ
                            </h2>
                            <p
                                class="text-gray-500 dark:text-gray-500 text-xs font-bold uppercase tracking-widest mt-1"
                            >
                                Vui lòng điền thông tin để chúng tôi liên hệ lại
                            </p>
                        </div>

                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">
                                        Họ và tên
                                    </label>
                                    <input
                                        type="text"
                                        class="w-full px-5 py-4 bg-gray-50/50 dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-2xl text-sm font-bold text-gray-700 dark:text-gray-300 focus:border-cs_blue outline-none transition-all"
                                        placeholder="Nhập tên của bạn..."
                                    />
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">
                                        Telegram / Zalo
                                    </label>
                                    <input
                                        type="text"
                                        class="w-full px-5 py-4 bg-gray-50/50 dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-2xl text-sm font-bold text-gray-700 dark:text-gray-300 focus:border-cs_blue outline-none transition-all"
                                        placeholder="@username hoặc 098..."
                                    />
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">
                                    Vấn đề cần hỗ trợ
                                </label>
                                <select
                                    class="w-full px-5 py-4 bg-gray-50/50 dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-2xl text-sm font-bold text-gray-700 dark:text-gray-300 focus:border-cs_blue outline-none transition-all appearance-none"
                                >
                                    <option value="report">Cần gỡ bài phốt / Giải quyết khiếu nại</option>
                                    <option value="partner">Hợp tác làm đối tác / API</option>
                                    <option value="ads">Liên hệ quảng cáo banner</option>
                                    <option value="other">Vấn đề khác</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">
                                    Nội dung chi tiết
                                </label>
                                <textarea
                                    rows="4"
                                    class="w-full px-5 py-4 bg-gray-50/50 dark:bg-slate-900 border border-gray-100 dark:border-gray-800 rounded-2xl text-sm font-bold text-gray-700 dark:text-gray-300 focus:border-cs_blue outline-none transition-all resize-none"
                                    placeholder="Mô tả chi tiết vấn đề bạn đang gặp phải..."
                                ></textarea>
                            </div>

                            <div class="pt-2">
                                <button
                                    type="button"
                                    class="w-full bg-cs_blue text-white font-black py-4 rounded-2xl shadow-xl shadow-blue-500/20 hover:bg-blue-600 transition-all active:scale-95 uppercase text-xs tracking-widest leading-none"
                                >
                                    Xác nhận gửi thông tin
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

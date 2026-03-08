@extends("layouts.app")

@section("title", "Liên hệ Admin - Hỗ trợ và Giải đáp thắc mắc")

@section("content")
    <main class="dark:bg-dark_bg bg-gray-50/40 pb-24">
        <x-breadcrumb :links="[['name' => 'Liên hệ Admin', 'url' => '/lien-he-admin']]" />

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <header class="mb-16 text-center">
                <h1
                    class="mb-4 text-3xl font-black tracking-tighter text-gray-800 uppercase md:text-5xl dark:text-gray-100"
                >
                    Liên hệ
                    <span class="text-cs_blue">Admin</span>
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-bold tracking-widest text-gray-500 uppercase dark:text-gray-400"
                >
                    Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn.
                </p>
            </header>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Support Channels -->
                <div class="space-y-6 lg:col-span-1">
                    <div
                        class="dark:bg-dark_card group hover:border-cs_blue rounded-3xl border border-gray-100 bg-white p-8 shadow-xs transition-colors dark:border-gray-800"
                    >
                        <div
                            class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-linear-to-br from-blue-400 to-blue-600 text-white shadow-lg shadow-blue-500/20"
                        >
                            <i class="fa-brands fa-facebook-f text-xl"></i>
                        </div>
                        <h3 class="mb-2 font-black text-gray-800 uppercase dark:text-white">Fanpage Chính Thức</h3>
                        <p class="mb-4 text-xs font-bold tracking-tighter text-gray-500 uppercase dark:text-gray-400">
                            Hỗ trợ nhanh 24/7
                        </p>
                        <a
                            href="https://www.facebook.com/mstsoftware.vn"
                            target="_blank"
                            class="bg-cs_blue block w-full rounded-xl py-3 text-center text-[10px] font-black tracking-widest text-white uppercase transition-all hover:bg-blue-600"
                        >
                            Gửi tin nhắn
                        </a>
                    </div>

                    <div
                        class="dark:bg-dark_card group hover:border-cs_blue rounded-3xl border border-gray-100 bg-white p-8 shadow-xs transition-colors dark:border-gray-800"
                    >
                        <div
                            class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-linear-to-br from-gray-700 to-gray-900 text-white shadow-lg shadow-gray-500/20"
                        >
                            <i class="fa-solid fa-envelope text-xl"></i>
                        </div>
                        <h3 class="mb-2 font-black text-gray-800 uppercase dark:text-white">Email Hỗ Trợ</h3>
                        <p class="mb-4 text-xs font-bold tracking-tighter text-gray-500 uppercase dark:text-gray-400">
                            mstsoftware.vn@gmail.com
                        </p>
                        <a
                            href="mailto:mstsoftware.vn@gmail.com"
                            class="hover:text-cs_blue hover:border-cs_blue block w-full rounded-xl border-2 border-gray-100 py-3 text-center text-[10px] font-black tracking-widest text-gray-400 uppercase transition-all dark:border-gray-800"
                        >
                            Gửi Email
                        </a>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div
                        class="dark:bg-dark_card rounded-3xl border border-gray-100 bg-white p-8 shadow-xs md:p-10 dark:border-gray-800"
                    >
                        <div class="mb-8">
                            <h2 class="text-2xl font-black tracking-tight text-gray-800 uppercase dark:text-white">
                                Gửi yêu cầu hỗ trợ
                            </h2>
                            <p
                                class="mt-1 text-xs font-bold tracking-widest text-gray-500 uppercase dark:text-gray-500"
                            >
                                Vui lòng điền thông tin để chúng tôi liên hệ lại
                            </p>
                        </div>

                        <form class="space-y-6">
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div class="space-y-2">
                                    <label class="ml-4 text-[10px] font-black tracking-widest text-gray-400 uppercase">
                                        Họ và tên
                                    </label>
                                    <input
                                        type="text"
                                        class="focus:border-cs_blue w-full rounded-2xl border border-gray-100 bg-gray-50/50 px-5 py-4 text-sm font-bold text-gray-700 transition-all outline-none dark:border-gray-800 dark:bg-slate-900 dark:text-gray-300"
                                        placeholder="Nhập tên của bạn..."
                                    />
                                </div>
                                <div class="space-y-2">
                                    <label class="ml-4 text-[10px] font-black tracking-widest text-gray-400 uppercase">
                                        Telegram / Zalo
                                    </label>
                                    <input
                                        type="text"
                                        class="focus:border-cs_blue w-full rounded-2xl border border-gray-100 bg-gray-50/50 px-5 py-4 text-sm font-bold text-gray-700 transition-all outline-none dark:border-gray-800 dark:bg-slate-900 dark:text-gray-300"
                                        placeholder="@username hoặc 098..."
                                    />
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="ml-4 text-[10px] font-black tracking-widest text-gray-400 uppercase">
                                    Vấn đề cần hỗ trợ
                                </label>
                                <select
                                    class="focus:border-cs_blue w-full appearance-none rounded-2xl border border-gray-100 bg-gray-50/50 px-5 py-4 text-sm font-bold text-gray-700 transition-all outline-none dark:border-gray-800 dark:bg-slate-900 dark:text-gray-300"
                                >
                                    <option value="report">Cần gỡ bài phốt / Giải quyết khiếu nại</option>
                                    <option value="partner">Hợp tác làm đối tác / API</option>
                                    <option value="ads">Liên hệ quảng cáo banner</option>
                                    <option value="other">Vấn đề khác</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="ml-4 text-[10px] font-black tracking-widest text-gray-400 uppercase">
                                    Nội dung chi tiết
                                </label>
                                <textarea
                                    rows="4"
                                    class="focus:border-cs_blue w-full resize-none rounded-2xl border border-gray-100 bg-gray-50/50 px-5 py-4 text-sm font-bold text-gray-700 transition-all outline-none dark:border-gray-800 dark:bg-slate-900 dark:text-gray-300"
                                    placeholder="Mô tả chi tiết vấn đề bạn đang gặp phải..."
                                ></textarea>
                            </div>

                            <div class="pt-2">
                                <button
                                    type="button"
                                    class="bg-cs_blue w-full rounded-2xl py-4 text-xs leading-none font-black tracking-widest text-white uppercase shadow-xl shadow-blue-500/20 transition-all hover:bg-blue-600 active:scale-95"
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

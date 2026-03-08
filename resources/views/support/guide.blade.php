@extends("layouts.app")

@section("title", "Hướng dẫn tố cáo - Cách bảo vệ cộng đồng hiệu quả")

@section("content")
    <main class="pb-24">
        <x-breadcrumb :links="[['name' => 'Hướng dẫn tố cáo', 'url' => '/huong-dan-to-cao']]" />

        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <header class="mb-12 text-center">
                <h1
                    class="mb-4 text-3xl font-black tracking-tighter text-gray-800 uppercase md:text-5xl dark:text-gray-100"
                >
                    Hướng dẫn
                    <span class="text-cs_red">Tố cáo</span>
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-bold tracking-widest text-gray-500 uppercase md:text-base dark:text-gray-400"
                >
                    Quy trình 3 bước đơn giản để đưa kẻ lừa đảo ra ánh sáng.
                </p>
            </header>

            <div class="space-y-8">
                <!-- Step 1 -->
                <div
                    class="dark:bg-dark_card group relative overflow-hidden rounded-3xl border border-gray-100 bg-white p-8 shadow-xs dark:border-gray-800"
                >
                    <div
                        class="group-hover:text-cs_red/10 absolute -top-6 -right-6 text-9xl font-black text-gray-50 transition-colors dark:text-gray-800/20"
                    >
                        01
                    </div>
                    <div class="relative z-10">
                        <div
                            class="text-cs_red mb-6 flex h-12 w-12 items-center justify-center rounded-xl bg-red-50 dark:bg-red-900/20"
                        >
                            <i class="fa-solid fa-file-pen text-xl"></i>
                        </div>
                        <h2 class="mb-3 text-xl font-black tracking-tight text-gray-800 uppercase dark:text-white">
                            Thu thập bằng chứng
                        </h2>
                        <p class="mb-4 text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                            Chụp ảnh màn hình các đoạn chat, giao dịch chuyển khoản thành công, thông tin số tài khoản
                            và SĐT của đối tượng lừa đảo.
                        </p>
                        <ul class="space-y-2 text-xs font-bold text-gray-500 uppercase dark:text-gray-500">
                            <li>
                                <i class="fa-solid fa-circle-check text-cs_red mr-2"></i>
                                Bill chuyển khoản ngân hàng
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check text-cs_red mr-2"></i>
                                Ảnh chụp màn hình tin nhắn
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check text-cs_red mr-2"></i>
                                Link Facebook/Profile đối tượng
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Step 2 -->
                <div
                    class="dark:bg-dark_card group relative overflow-hidden rounded-3xl border border-gray-100 bg-white p-8 shadow-xs dark:border-gray-800"
                >
                    <div
                        class="group-hover:text-cs_red/10 absolute -top-6 -right-6 text-9xl font-black text-gray-50 transition-colors dark:text-gray-800/20"
                    >
                        02
                    </div>
                    <div class="relative z-10">
                        <div
                            class="text-cs_red mb-6 flex h-12 w-12 items-center justify-center rounded-xl bg-red-50 dark:bg-red-900/20"
                        >
                            <i class="fa-solid fa-upload text-xl"></i>
                        </div>
                        <h2 class="mb-3 text-xl font-black tracking-tight text-gray-800 uppercase dark:text-white">
                            Gửi đơn tố cáo
                        </h2>
                        <p class="text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                            Truy cập mục Tố cáo, điền đầy đủ các thông tin theo yêu cầu. Lưu ý mô tả chi tiết hành vi để
                            Admin dễ dàng xác minh.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div
                    class="dark:bg-dark_card group relative overflow-hidden rounded-3xl border border-gray-100 bg-white p-8 shadow-xs dark:border-gray-800"
                >
                    <div
                        class="group-hover:text-cs_red/10 absolute -top-6 -right-6 text-9xl font-black text-gray-50 transition-colors dark:text-gray-800/20"
                    >
                        03
                    </div>
                    <div class="relative z-10">
                        <div
                            class="text-cs_green mb-6 flex h-12 w-12 items-center justify-center rounded-xl bg-green-50 dark:bg-green-900/20"
                        >
                            <i class="fa-solid fa-shield-halved text-xl"></i>
                        </div>
                        <h2 class="mb-3 text-xl font-black tracking-tight text-gray-800 uppercase dark:text-white">
                            Xác minh & Đăng tải
                        </h2>
                        <p class="text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                            Trong vòng 24h, đội ngũ quản trị sẽ kiểm tra thông tin. Nếu bằng chứng hợp lệ, đối tượng sẽ
                            bị đưa vào danh sách đen vĩnh viễn và hiển thị trên Google.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                <a
                    href="/to-cao-lua-dao"
                    class="bg-cs_red inline-block rounded-2xl px-12 py-4 text-xs leading-none font-black tracking-widest text-white uppercase shadow-xl shadow-red-500/20 transition-all hover:bg-red-700 active:scale-95"
                >
                    Bắt đầu tố cáo ngay
                </a>
            </div>
        </div>
    </main>
@endsection

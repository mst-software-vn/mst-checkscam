@extends("layouts.app")

@section("title", "Điều khoản sử dụng - CheckScam Global")

@section("content")
    <main class="dark:bg-dark_bg bg-gray-50/40 pb-24">
        <x-breadcrumb :links="[['name' => 'Điều khoản sử dụng', 'url' => '/dieu-khoan']]" />

        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <article
                class="dark:bg-dark_card relative overflow-hidden rounded-[40px] border border-gray-100 bg-white p-8 shadow-xs md:p-16 dark:border-gray-800"
            >
                <div class="pointer-events-none absolute top-0 right-0 p-12 opacity-5">
                    <i class="fa-solid fa-file-contract text-[200px]"></i>
                </div>

                <header
                    class="relative z-10 mb-12 border-b border-gray-100 pb-8 text-center lg:text-left dark:border-gray-800"
                >
                    <h1
                        class="mb-4 text-3xl leading-none font-black tracking-tighter text-gray-800 uppercase md:text-5xl dark:text-gray-100"
                    >
                        Điều khoản
                        <span class="text-cs_blue">Dịch vụ</span>
                    </h1>
                    <p class="text-xs leading-relaxed font-bold tracking-widest text-gray-400 uppercase">
                        Cập nhật mới nhất: Ngày 08 tháng 03 năm 2026
                    </p>
                </header>

                <div class="prose prose-slate dark:prose-invert relative z-10 max-w-none space-y-10">
                    <section class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span
                                class="bg-cs_blue/10 text-cs_blue flex h-8 w-8 items-center justify-center rounded-lg text-xs font-black"
                            >
                                01
                            </span>
                            <h2 class="m-0 text-lg font-black tracking-tight text-gray-800 uppercase dark:text-white">
                                Quy định về dữ liệu
                            </h2>
                        </div>
                        <p class="pl-11 text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                            Tất cả thông tin trên CheckScam được đóng góp bởi cộng đồng và đội ngũ biên tập viên. Chúng
                            tôi không chịu trách nhiệm về tính chính xác tuyệt đối nhưng cam kết xác minh kỹ lưỡng nhất
                            có thể dựa trên các bằng chứng được cung cấp.
                        </p>
                    </section>

                    <section class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span
                                class="bg-cs_blue/10 text-cs_blue flex h-8 w-8 items-center justify-center rounded-lg text-xs font-black"
                            >
                                02
                            </span>
                            <h2 class="m-0 text-lg font-black tracking-tight text-gray-800 uppercase dark:text-white">
                                Bảo mật thông tin người tố cáo
                            </h2>
                        </div>
                        <p class="pl-11 text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                            CheckScam cam kết bảo mật danh tính người tố cáo một các tuyệt đối. Thông tin cá nhân của
                            bạn sẽ không bao giờ được công khai hoặc cung cấp cho bên thứ ba, trừ phi có yêu cầu bằng
                            văn bản từ cơ quan chức năng có thẩm quyền.
                        </p>
                    </section>

                    <section class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span
                                class="bg-cs_blue/10 text-cs_blue flex h-8 w-8 items-center justify-center rounded-lg text-xs font-black"
                            >
                                03
                            </span>
                            <h2 class="m-0 text-lg font-black tracking-tight text-gray-800 uppercase dark:text-white">
                                Gỡ bài viết
                            </h2>
                        </div>
                        <p class="pl-11 text-sm leading-relaxed font-medium text-gray-600 dark:text-gray-400">
                            Bài viết tố cáo chỉ được gỡ bỏ khi: (1) Hai bên đã tự thỏa thuận và người tố cáo xác nhận
                            thu hồi đơn; (2) Có bằng chứng xác thực bài viết là sai sự thật hoặc vu khống; (3) Có sai
                            sót trong quá trình thẩm định của Ban quản trị.
                        </p>
                    </section>

                    <div
                        class="mt-12 rounded-3xl border border-blue-50 bg-blue-50/30 p-6 dark:border-blue-900/20 dark:bg-blue-900/10"
                    >
                        <p
                            class="text-center text-xs leading-relaxed font-bold text-gray-500 italic dark:text-gray-400"
                        >
                            "Việc sử dụng website này đồng nghĩa với việc bạn đã đọc và chấp thuận các điều khoản trên.
                            Chúng tôi có quyền sửa đổi điều khoản mà không cần thông báo trước."
                        </p>
                    </div>
                </div>
            </article>
        </div>
    </main>
@endsection

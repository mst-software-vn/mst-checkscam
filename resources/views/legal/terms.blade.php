@extends("layouts.app")

@section("title", "Điều khoản sử dụng - CheckScam Global")

@section("content")
    <main class="bg-gray-50/40 dark:bg-dark_bg pb-24">
        <x-breadcrumb :links="[['name' => 'Điều khoản sử dụng', 'url' => '/dieu-khoan']]" />

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <article
                class="bg-white dark:bg-dark_card rounded-[40px] p-8 md:p-16 border border-gray-100 dark:border-gray-800 shadow-xs relative overflow-hidden"
            >
                <div class="absolute top-0 right-0 p-12 opacity-5 pointer-events-none">
                    <i class="fa-solid fa-file-contract text-[200px]"></i>
                </div>

                <header
                    class="mb-12 border-b border-gray-100 dark:border-gray-800 pb-8 relative z-10 text-center lg:text-left"
                >
                    <h1
                        class="text-3xl md:text-5xl font-black text-gray-800 dark:text-gray-100 uppercase tracking-tighter mb-4 leading-none"
                    >
                        Điều khoản
                        <span class="text-cs_blue">Dịch vụ</span>
                    </h1>
                    <p class="text-gray-400 font-bold text-xs uppercase tracking-widest leading-relaxed">
                        Cập nhật mới nhất: Ngày 08 tháng 03 năm 2026
                    </p>
                </header>

                <div class="prose prose-slate dark:prose-invert max-w-none space-y-10 relative z-10">
                    <section class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-8 h-8 rounded-lg bg-cs_blue/10 text-cs_blue flex items-center justify-center font-black text-xs"
                            >
                                01
                            </span>
                            <h2 class="text-lg font-black uppercase text-gray-800 dark:text-white m-0 tracking-tight">
                                Quy định về dữ liệu
                            </h2>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium pl-11">
                            Tất cả thông tin trên CheckScam được đóng góp bởi cộng đồng và đội ngũ biên tập viên. Chúng
                            tôi không chịu trách nhiệm về tính chính xác tuyệt đối nhưng cam kết xác minh kỹ lưỡng nhất
                            có thể dựa trên các bằng chứng được cung cấp.
                        </p>
                    </section>

                    <section class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-8 h-8 rounded-lg bg-cs_blue/10 text-cs_blue flex items-center justify-center font-black text-xs"
                            >
                                02
                            </span>
                            <h2 class="text-lg font-black uppercase text-gray-800 dark:text-white m-0 tracking-tight">
                                Bảo mật thông tin người tố cáo
                            </h2>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium pl-11">
                            CheckScam cam kết bảo mật danh tính người tố cáo một các tuyệt đối. Thông tin cá nhân của
                            bạn sẽ không bao giờ được công khai hoặc cung cấp cho bên thứ ba, trừ phi có yêu cầu bằng
                            văn bản từ cơ quan chức năng có thẩm quyền.
                        </p>
                    </section>

                    <section class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-8 h-8 rounded-lg bg-cs_blue/10 text-cs_blue flex items-center justify-center font-black text-xs"
                            >
                                03
                            </span>
                            <h2 class="text-lg font-black uppercase text-gray-800 dark:text-white m-0 tracking-tight">
                                Gỡ bài viết
                            </h2>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed font-medium pl-11">
                            Bài viết tố cáo chỉ được gỡ bỏ khi: (1) Hai bên đã tự thỏa thuận và người tố cáo xác nhận
                            thu hồi đơn; (2) Có bằng chứng xác thực bài viết là sai sự thật hoặc vu khống; (3) Có sai
                            sót trong quá trình thẩm định của Ban quản trị.
                        </p>
                    </section>

                    <div
                        class="p-6 bg-blue-50/30 dark:bg-blue-900/10 rounded-3xl border border-blue-50 dark:border-blue-900/20 mt-12"
                    >
                        <p
                            class="text-xs font-bold text-gray-500 dark:text-gray-400 italic leading-relaxed text-center"
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

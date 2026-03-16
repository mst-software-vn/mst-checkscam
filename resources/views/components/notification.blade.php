<div id="global-notification" class="fixed inset-0 z-100 hidden items-center justify-center p-4 sm:p-6">
    <!-- Overlay with deeper blur for focus -->
    <div class="close-notif-btn absolute inset-0 bg-slate-900/40 backdrop-blur-md"></div>

    <!-- Modal Content: Max-width xl, Responsive width -->
    <div
        class="relative w-full max-w-xl overflow-hidden rounded-xl border border-gray-100 bg-white shadow-[0_20px_50px_rgba(0,0,0,0.3)] dark:border-slate-800 dark:bg-slate-900 dark:shadow-[0_20px_50px_rgba(0,0,0,0.6)]"
    >
        <!-- Close button (X) - Larger touch area for mobile -->
        <button
            class="close-notif-btn absolute top-4 right-4 z-10 flex h-10 w-10 cursor-pointer items-center justify-center rounded-full bg-gray-50 text-gray-400 transition-all hover:bg-red-50 hover:text-red-500 md:h-8 md:w-8 dark:bg-slate-800 dark:text-gray-500 dark:hover:bg-red-900/20"
        >
            <i class="fa-solid fa-xmark text-lg md:text-sm"></i>
        </button>

        <div class="p-6 pt-10 sm:p-10 sm:pb-5">
            <!-- Header Group -->
            <div class="relative mb-6 flex flex-col items-center">
                <!-- Icon Variant: Shield + Bell -->
                <div class="relative mb-4">
                    <div
                        class="flex h-20 w-20 items-center justify-center rounded-3xl bg-red-50 shadow-inner dark:bg-red-900/50"
                    >
                        <i class="fa-solid fa-shield-halved text-4xl text-red-500 dark:text-red-500/70"></i>
                    </div>
                    <div
                        class="absolute -top-2 -right-2 flex h-10 w-10 items-center justify-center rounded-2xl bg-white text-red-500 shadow-lg dark:bg-slate-800"
                    >
                        <i class="fa-solid fa-bell"></i>
                    </div>
                </div>

                <h2 class="text-2xl font-black tracking-tighter text-red-600 uppercase sm:text-4xl dark:text-red-500">
                    CẢNH BÁO
                </h2>
                <div class="mt-1 h-1 w-12 rounded-full bg-red-100 dark:bg-red-900/30"></div>
            </div>

            <!-- Content Body -->
            <div class="space-y-5 text-center">
                <p class="text-sm leading-relaxed font-medium text-gray-700 sm:text-base dark:text-gray-300">
                    Hiện nay có rất nhiều tài khoản FB, TK ngân hàng, website, group và bot giả mạo
                    <span class="bg-cs_blue/10 text-cs_blue rounded px-1.5 font-bold uppercase italic">
                        Admin/Gdv CS
                    </span>
                    nhằm lừa đảo người dùng.
                </p>
            </div>
        </div>

        <!-- Action Footer -->
        <div class="border-t border-gray-50 bg-gray-50/30 p-6 pt-0 sm:px-10 dark:border-slate-800 dark:bg-slate-900/50">
            <button
                id="suppress-btn"
                class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-2xl bg-slate-900 py-3.5 text-[11px] font-black tracking-widest text-white uppercase shadow-xl transition-all hover:bg-slate-800 active:scale-95 dark:bg-slate-100 dark:text-slate-900 dark:hover:bg-white"
            >
                <i class="fa-regular fa-clock text-base opacity-60"></i>
                Ẩn trong 1 giờ
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        const $notification = $('#global-notification');
        const storageKey = 'cs_notification_suppressed_until';

        function hideNotification() {
            // Smooth fade combined with slight scale down
            $notification.fadeOut(300);
        }

        $('.close-notif-btn').on('click', function () {
            hideNotification();
        });

        $('#suppress-btn').on('click', function () {
            const oneHourLater = new Date().getTime() + 60 * 60 * 1000;
            localStorage.setItem(storageKey, oneHourLater);
            hideNotification();
        });

        const suppressedUntil = localStorage.getItem(storageKey);
        const currentTime = new Date().getTime();

        if (!suppressedUntil || currentTime > parseInt(suppressedUntil)) {
            setTimeout(function () {
                $notification
                    .css({
                        display: 'flex',
                        opacity: 0,
                    })
                    .hide()
                    .fadeIn(400)
                    .animate(
                        {
                            opacity: 1,
                        },
                        {
                            queue: false,
                            duration: 400,
                        },
                    );
            }, 1200);
        }
    });
</script>

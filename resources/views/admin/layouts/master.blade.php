<!DOCTYPE html>
<html lang="vi">
    <x-admin-head />

    <body>
        <div class="main-wrapper">
            <x-admin-header />

            <x-admin-sidebar />

            <div class="page-wrapper">
                <div class="content">
                    @yield("content")
                </div>
            </div>
        </div>

        <x-admin-footer />
    </body>
</html>

<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

// kết thừa Middleware Authenticate
class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Nếu là request vào admin, đẩy về login admin
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.auth.login');
            }

            // Nếu là khách (Client), bạn CHƯA định nghĩa route 'login'
            // nên nó báo lỗi. Bạn có 2 lựa chọn:

            // Lựa chọn A: Nếu có trang login cho khách:
            // return route('login');

            // Lựa chọn B: Nếu chưa có, tạm thời đẩy về trang chủ:
            return route('admin.auth.login'); // Hoặc bất kỳ route nào CÓ TỒN TẠI
        }
    }
}

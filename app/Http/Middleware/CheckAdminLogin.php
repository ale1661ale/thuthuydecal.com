<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // nếu user đã đăng nhập
        if (Auth::check())
        {
            $user = Auth::user();
            // nếu level =1 (admin), status = 1 (actived) thì cho qua.
            if ($user->role == 1 && $user->status == 1 )
            {
                return $next($request);
            }
            else
            {
                Auth::logout();

                return redirect()->route('login.admin');
            }
        } else
            return redirect('thuthuy/login')->with('error', 'Bạn cẩn phãi đăng nhập để vào trang admin');
    }
}

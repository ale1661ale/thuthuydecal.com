<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use App\Models\User;

class AdminLoginController extends Controller
{

    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return view('thuthuy.pages.index');
        } else {
            return view('thuthuy.login');
        }

    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 1,
            'status' => 1
        ];
        if (Auth::attempt($login)) {
            return view('thuthuy.pages.index')->with('success', 'Đăng nhập thành công !');
        } else {
            return back()->with('error', 'Email hoặc Password không chính xác');
        }
    }

    /**
     * action admincp/logout
     * @return RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login.admin')->with('success', 'Đăng xuất thành công');
    }

}

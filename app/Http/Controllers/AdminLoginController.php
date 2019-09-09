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
        return view('thuthuy.pages.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'status' => 1,
        ];
        if (Auth::attempt($login)) {

            if (Auth::user()->role == 1)
            {
                if (Auth::user()->sex == 1)
                {
                    return redirect('/thuthuy')->with('success', 'Xin chào Anh ' .Auth::user()->name);
                }
                else
                {
                    return redirect('/thuthuy')->with('success', 'Xin chào Chị ' .Auth::user()->name);
                }
            }
            elseif (Auth::user()->role == 0)
            {
                return back()->with('error', 'Bạn không có quyền đăng nhập trang này ');
            }
            
        } 
        else 
        {
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

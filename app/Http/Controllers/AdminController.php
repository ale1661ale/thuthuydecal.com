<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Validator;
use Illuminate\Support\Str;
use Session;
use File;
use Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::paginate(10);

        return view('thuthuy.pages.admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thuthuy.pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        if ($request->hasFile('avatar'))
        {

            $file = $request->avatar;

            $file_name = $file->getClientOriginalName();

            $file_type = $file->getMimeType();

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif')
            {
                if ($file_size <= 1048576 )
                {
                    $file_name = date('d-m-y').'-'.rand().'-'.Str::slug($file_name);

                    if($file->move('img/upload/user',$file_name)){

                        $data = $request->all();

                        $data['password'] = Hash::make($request->input('password'));

                        $data['avatar'] = $file_name;

                        User::create($data);

                        return redirect()->route('admins.index')->with('success','Đã thêm mới thành công .');
                    }
                }
                else
                {
                     return back()->with('error','file ảnh không được lớn hơn 1MB');
                }
            }
            else
            {
                return back()->with('error','Đây không phãi là file ảnh');
            }
        }
        else
        {
            $data = $request->all();

            $data['password'] = Hash::make($request->input('password'));

            User::create($data);

            return redirect()->route('admins.index')->with('success','Đã thêm mới thành công .');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\$id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);

        return view('thuthuy.pages.admin.detail', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => 'min:2|max:255',
            'avatar' => 'image',
            'phone' => 'numeric',
            'address' => 'min:2',
        ],
        [
            'name.min' => 'Tên không được dưới 2 ký tự',
            'name.max' => 'Tên không được dài hơn 255 ký tự',
            'name.unique' => 'Tên đã được sử dụng',
            'avatar' => 'Ảnh đại diện phãi là 1 file ảnh',
            'phone.numeric' => 'Số điện thoại phãi là con số',
            'address.min' => 'Địa chỉ không được dưới 2 ký tự',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $admin = User::find($id);

        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        if ($request->hasFile('avatar')) 
        {
            $file = $request->avatar;

            $file_name = $file->getClientOriginalName();

            $file_type = $file->getMimeType();

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif')
            {
                if ($file_size <= 1048576 )
                {
                    $file_name = date('d-m-y').'-'.rand().'-'.Str::slug($file_name);

                    if ($file->move('img/upload/user/',$file_name))
                    {
                        $data['avatar'] = $file_name;
                    }
                }
                else
                {
                    return back()->with('error', 'Hình ảnh không được lớn hơn 1MB');
                }
            }
            else
            {
                return back()->with('error', 'Không đúng định dạng file ảnh ?');
            }
        }
        else
        {
            $data['avatar'] = $admin->avatar;
        }

        $admin->update($data);

        return back()->with('success','Đã cập nhật thành công '.$request->name);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);

        if ($admin->delete())
        {
            if (!empty($admin->avatar))
            {
                if (file_exists(public_path('img/upload/user/'. $admin->avatar)))
                {
                    unlink(public_path('img/upload/user/'. $admin->avatar));

                    Session::flash('success', 'Đã xoá thành công ');

                    return response()->json(200);
                }
            }
            else
            {
                Session::flash('success', 'Đã xoá thành công ');

                return response()->json(200);
            }
            
        }
        else
        {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại .');
        }
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('psw_current'), Auth::user()->password))) 
        {
            // The passwords matches
            return back()->with("error","Mật khẩu cũ không chính xác");
        }

        if (strcmp($request->get('psw_current'), $request->get('password')) == 0)
        {
            //Current password and new password are same
            return redirect()->back()->with("error","Mật khẩu mới không được trùng với mật khẩu cũ");
        }
        $validatedData = $request->validate([
            'psw_current' => 'required',
            'password' => 'required|string|min:2',
            'psw_confirm' => 'required|same:password',
        ]);

        if (!empty($validatedData))
        {
            return back()->with("error","Đã có lỗi xảy ra, vui lòng thử lại");
        }

        //Change Password
        $admin = Auth::user();

        $admin->password = Hash::make($request->get('password'));

        $admin->save();

        return back()->with("success","Thay đổi mật khẩu thành công .");

    }

}

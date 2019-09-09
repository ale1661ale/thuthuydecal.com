<?php

namespace App\Http\Controllers;

use App\Models\Introduce;
use Illuminate\Http\Request;
use App\Http\Requests\IntroduceRequest;
use Illuminate\Support\Str;
use Validator;
use Session;

class IntroduceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intro = Introduce::paginate(10);

        return view('thuthuy.pages.introduces.index', compact('intro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thuthuy.pages.introduces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IntroduceRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->input('title'));
        
        $data['content'] = $request->input('content');

        if($request->hasFile('image'))
        {
            $file = $request->image;

            $file_name = $file->getClientOriginalName();

            $file_type = $file->getMimeType();

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif')
            {
                if ($file_size <= 1048576 )
                {
                    $file_name = date('d-m-y').'-'.rand().'-'.Str::slug($file_name);

                    if ($file->move('img/upload/introduce',$file_name))
                    {
                        $data['image'] = $file_name;
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

        Introduce::create($data);

        return redirect()->route('introduces.index')->with('success','Đã tạo mới thành công bài viết '.$request->title);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function show(Introduce $introduce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $intro = Introduce::find($id);

        return view('thuthuy.pages.introduces.detail', compact('intro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function update(IntroduceRequest $request, $id)
    {
        $intro = Introduce::find($id);

        $data = $request->all();

        $data['slug'] = Str::slug($request->input('title'));
        $data['content'] = $request->input('content');

        if ($request->hasFile('image')) 
        {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getMimeType();
            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif')
            {
                if ($file_size <= 1048576 )
                {
                    $file_name = date('d-m-y').'-'.rand().'-'.Str::slug($file_name);

                    if ($file->move('img/upload/introduce/',$file_name))
                    {
                        $data['image'] = $file_name;
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
            $data['image'] = $intro->image;
        }

        $intro->update($data);

        return back()->with('success','Đã cập nhật thành công '.$request->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Introduce  $introduce
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intro = Introduce::find($id);

        if ($intro->delete())
        {
            if (!empty($intro->image))
            {
                if (file_exists(public_path('img/upload/introduce/'. $intro->image)))
                {
                    unlink(public_path('img/upload/introduce/'. $intro->image));

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

    public function delAll(Request $request)
    {
        $idIntro = $request->input('idIntroduces');

        if (!empty($idIntro))
        {
            Introduce::whereIn('id', $idIntro)->delete();

            return redirect()->route('introduces.index')->with('success', 'Đã xoá thành công bài viết ');
        }
        else
        {
            return back()->with('error', 'Bạn cần phãi chọn dữ liệu cần xoá !');
        }  
    }
}

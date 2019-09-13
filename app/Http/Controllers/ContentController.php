<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Content_Type;
use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use Illuminate\Support\Str;
use Validator;
use Session;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Content::orderBy('created_at', 'desc')->paginate(10);

        return view('thuthuy.pages.contents.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content_type = Content_Type::where('status', 1)->get();

        return view('thuthuy.pages.contents.create', compact('content_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
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

                    if ($file->move('img/upload/content',$file_name))
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

        Content::create($data);

        return redirect()->route('contents.index')->with('success','Đã tạo mới thành công bài viết '.$request->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content_type = Content_Type::where('status',1)->get();
        $content = Content::find($id);

        return view('thuthuy.pages.contents.detail', compact('content', 'content_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        $content = Content::find($id);

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

                    if ($file->move('img/upload/content/',$file_name))
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
            $data['image'] = $content->image;
        }

        $content->update($data);

        return back()->with('success','Đã cập nhật thành công '.$request->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);

        if ($content->delete())
        {
            if (!empty($content->image))
            {
                if (file_exists(public_path('img/upload/content/'. $content->image)))
                {
                    unlink(public_path('img/upload/content/'. $content->image));

                    Session::flash('success', 'Đã xoá thành công ');

                    return response()->json(200);
                }
                else
                {
                    Session::flash('success', 'Đã xoá thành công ');

                    return response()->json(200);
                }
            }
        }
        else
        {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại .');
        }
    }

    public function delAll(Request $request)
    {
        $idContent = $request->input('idContents');

        if (!empty($idContent))
        {
            Content::whereIn('id', $idContent)->delete();

            return redirect()->route('contents.index')->with('success', 'Đã xoá thành công bài viết ');
        }
        else
        {
            return back()->with('error', 'Bạn cần phãi chọn dữ liệu cần xoá !');
        }  
    }
}

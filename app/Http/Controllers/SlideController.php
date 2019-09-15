<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Image_Type;
use App\Http\Requests\SlideRequest;
use Illuminate\Support\Str;
use Validator;
use Session;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::paginate(10);

        return view('thuthuy.pages.image-types.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image_type = Image_Type::where('status', 1)->get();

        return view('thuthuy.pages.image-types.slide.create', compact('image_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        if($request->hasFile('image'))
        {
            $file = $request->image;

            $file_name = $file->getClientOriginalName();

            $file_type = $file->getMimeType();

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif')
            {
                if ($file_size <= 10485760 )
                {
                    $file_name = date('d-m-y').'-'.rand().'-'.Str::slug($file_name);

                    if ($file->move('img/upload/ale',$file_name))
                    {
                        $data['image'] = $file_name;
                    }
                }
                else
                {
                    return back()->with('error','file ảnh không được lớn hơn 10MB');
                }
            }
            else
            {
                return back()->with('error','Đây không phãi là file ảnh');
            }
        }
        $image_type = Image_Type::where('status', 1)->get();

        Slide::create($data);

        return redirect()->route('slides.index', $image_type[0]->id)->with('success','Đã tạo mới thành công ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);

        return response()->json($slide, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'min:1|max:255',
                'image' => 'image',
            ],
            [
                'min' => 'Tên slide không được ngắn hơn 1 ký tự',
                'max' => 'Tên slide không được dài hơn 255 ký tự',
                'image' => 'Đây không phãi là file ảnh',
            ]);

        if ($validator->fails())
        {
            return response()->json(['error' => 'true','message'=> $validator->errors()], 200);
        }

        $slide = Slide::find($id);

        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        if ($request->hasFile('image'))
        {
            $file = $request->image;

            $file_name = $file->getClientOriginalName();

            $file_type = $file->getMimeType();

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif')
            {
                if ($file_size <= 10485760 )
                {
                    $file_name = date('d-m-y').'-'.rand().'-'.Str::slug($file_name);

                    if ($file->move('img/upload/ale/',$file_name))
                    {
                        $data['image'] = $file_name;

                        $slide->update($data);

                        Session::flash('success', 'Cập nhật thành công .');

                        return response()->json(200);
                    }
                }
                else
                {
                    return response()->json(['error' => ' File ảnh không được lớn hơn 10MB '], 200);
                }
            }
            else
            {
                return response()->json(['error' => ' Đây không phãi là file ảnh '], 200);
            }
        }
        else
        {
            $slide->update($data);

            Session::flash('success', 'Cập nhật thành công .');

            return response()->json(200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);

        if (!empty($slide->image))
        {
            if (file_exists(public_path('img/upload/ale/'. $slide->image)))
            {
                unlink(public_path('img/upload/ale/'. $slide->image));

                $slide->delete();

                Session::flash('success', 'Đã xoá thành công .');

                return response()->json(200);
            }
        }
        else
        {
            $slide->delete();

            Session::flash('success', 'Đã xoá thành công .');

            return response()->json(200);
        }
    }

    public function delAll(Request $request)
    {
        $idSlide = $request->input('idSlides');

        if (!empty($idSlide))
        {
            Slide::whereIn('id', $idSlide)->delete();

            return redirect()->route('slides.index')->with('success', 'Đã xoá thành công .');
        }
        else
        {
            return back()->with('error', 'Bạn cần phãi chọn dữ liệu cần xoá !');
        }  
    }
}

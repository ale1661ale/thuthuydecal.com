<?php

namespace App\Http\Controllers;

use App\Models\Image_type;
use App\Http\Requests\ImageTypeRequest;
use Illuminate\Support\Str;
use Session;
use Illuminate\Http\Request;

class ImageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image_type = Image_Type::paginate(10);

        return view('thuthuy.pages.image-types.index', compact('image_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thuthuy.pages.image-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageTypeRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        Image_Type::create($data);

        return redirect()->route('image-types.index')->with('success', 'Đã tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\image_type  $image_type
     * @return \Illuminate\Http\Response
     */
    public function show(image_type $image_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\image_type  $image_type
     * @return \Illuminate\Http\Response
     */
    public function edit(image_type $image_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\image_type  $image_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, image_type $image_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\image_type  $image_type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_type = Image_Type::find($id);

        $image_type->delete();

        Session::flash('success', 'Đã xoá thành công ');

        return response()->json(200);
    }
}

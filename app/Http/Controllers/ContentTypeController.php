<?php

namespace App\Http\Controllers;

use App\Models\Content_Type;
use Illuminate\Http\Request;
use App\Http\Requests\ContentTypeRequest;
use Validator;
use Illuminate\Support\Str;
use Session;

class ContentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content_type = Content_Type::orderBy('created_at', 'desc')->paginate(10);

        return view('thuthuy.pages.content_types.index', compact('content_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thuthuy.pages.content_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentTypeRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        Content_Type::create($data);

        return redirect()->route('content-types.index')->with('success', 'Tạo thành công một thể loại của nội dung .');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content_Type  $content_Type
     * @return \Illuminate\Http\Response
     */
    public function show(Content_Type $content_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content_Type  $content_Type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content_type = Content_Type::find($id);

        return response()->json($content_type, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content_Type  $content_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                 'name' => 'required|min:2|max:255',
            ],
            [
                'required' => 'Tên thể loại không được bỏ trống',
                'min' => 'Tên thể loại quá ngắn',
                'max' => 'Tên thể loại quá dài',
            ]
        );

        if ($validator->fails())
        {
            return response()->json(['error' => 'true' ,'message' => $validator->errors()],200);
        }

        $cotnent_type = Content_Type::find($id);

        $cotnent_type->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'status' => $request->status,
        ]);

        Session::flash('success', 'Cập nhật thành công ');

        return response()->json(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content_Type  $content_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content_type = Content_Type::find($id);

        $content_type->delete();

        return redirect()->route('content-types.index')->with('success', 'Đã xoá thành công '.$content_type['name']);
    }

    public function delAll(Request $request)
    {
        $idContentType = $request->input('idContentTypes');

        if (!empty($idContentType))
        {
            Content_Type::whereIn('id', $idContentType)->delete();

            return redirect()->route('content-types.index')->with('success', 'Đã xoá thành công thể loại ');
        }
        else
        {
            return back()->with('error', 'Bạn cần phãi chọn dữ liệu cần xoá !');
        }
    }
}

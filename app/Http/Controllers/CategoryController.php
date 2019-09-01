<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Validator;
use Illuminate\Support\Str;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->paginate(10);

        return view('thuthuy.pages.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thuthuy.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->input('name'));

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Thêm mới thành công danh mục '.$request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return response()->json($category, 200);
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
                 'name' => 'required|min:2|max:255',
            ],
            [
                'required' => 'Tên danh mục không được bỏ trống',
                'min' => 'Tên danh mục quá ngắn',
                'max' => 'Tên danh mục quá dài',
            ]
        );
        if($validator->fails())
        {
            return response()->json(['error' => 'true' ,'message' => $validator->errors()],200);
        }

        $category = Category::find($id);

        $category->update([
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Đã xoá thành công danh mục ');
    }

    public function delAll(Request $request)
    {
        $idCategory = $request->input('idCategories');

        if (!empty($idCategory))
        {
            Category::whereIn('id', $idCategory)->delete();
            return redirect()->route('categories.index')->with('success', 'Đã xoá thành công danh mục ');
        }
        else
        {
            return back()->with('error', 'Bạn cần phãi chọn danh mục cần xoá !');
        }   
    }

}

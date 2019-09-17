<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product_Type;
use App\Http\Requests\ProductTypeRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Input;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productType = Product_Type::orderBy('id', 'desc')->paginate(15);

        return view('thuthuy.pages.product_types.index', compact('productType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', 1)->get();

        return view('thuthuy.pages.product_types.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeRequest $request)
    {
        $category = Category::where('status', 1)->get();

        $data = $request->all();
        $data['slug'] = Str::slug($request->input('name'));

        if($request->get('create') == 'one') 
        {
            Product_Type::create($data);

            return redirect()->route('product-types.index')->with('success', 'Tạo mới thành công thể loại '.$request->name);
    
        } 
        else if($request->get('create') == 'more') {
    
            Product_Type::create($data);

            Session::flash('success', 'Thêm mới thành công ');

            return view('thuthuy.pages.product_types.create', compact('category'));
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\$id
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Type $product_Type)
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
        $category = Category::where('status', 1)->get();

        $productType = Product_Type::find($id);

        return response()->json(['category' => $category, 'producttype' => $productType], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\$id
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
            'min' => 'Tên thể loại không được ngắn hơn 2 ký tự',
            'max' => 'Tên thể loại không được dài hơn 255 ký tự'
        ]);

        if ($validator->fails())
        {
            return response()->json(['error' => 'true', 'message' => $validator->errors()], 200);
        }

        $productType = Product_Type::find($id);

        $data = $request->all();
        $data['slug'] = Str::slug($request->input('name'));

        $productType->update($data);

        Session::flash('success', 'Cập nhật thành công ');

        return response()->json(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_Type  $product_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productType = Product_Type::find($id);

        $productType->delete();

        Session::flash('success', 'Đã xoá thành công .');

        return response()->json(200);
    }

    public function delAll(Request $request)
    {
        $idProductType = $request->input('idProTypes');

        if (!empty($idProductType))
        {
            Product_Type::whereIn('id', $idProductType)->delete();
            return redirect()->route('product-types.index')->with('success', 'Đã xoá thành công danh mục ');
        }
        else
        {
            return back()->with('error', 'Bạn cần phãi chọn thể loại cần xoá !');
        }  
    }

    public function search(Request $request)
    {
        $search = Input::get(['name'=>'search']);

        if ($search != '')
        {
            $productType = Product_Type::where('name', 'like', '%'. $search .'%')
                                        ->orWhere('slug', 'like', '%'. $search .'%')
                                        ->get();
            if (count($productType) > 0)
            {
                return view('thuthuy.pages.product_types.index')->withDetails($productType)
                                                                ->withQuery($search);
            }
            else
            {
                return view('thuthuy.pages.product_types.index')->withMessage('Không tìm thấy kết quả tìm kiếm');
            }
        }
        else
        {
            return redirect()->route('product-types.index')->with('error', 'Không tìm thấy kết quả tìm kiếm');
        }
    }
    
    public function listProductType($id_cate)
    {
        $idCate = Category::where('id', $id_cate)->value('id');

        $productType = Product_Type::where('id_cate', $idCate)->paginate(15);

        return view('thuthuy.pages.product_types.index', compact('productType'));
    }

}

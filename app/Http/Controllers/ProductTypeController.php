<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product_Type;
use App\Http\Requests\ProductTypeRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
use Session;

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
        $data = $request->all();
        $data['slug'] = Str::slug($request->input('name'));

        Product_Type::create($data);

        return redirect()->route('product-types.index')->with('success', 'Tạo mới thành công thể loại. '.$request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_Type  $product_Type
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Type $product_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_Type  $product_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_Type $product_Type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_Type  $product_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_Type $product_Type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_Type  $product_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_Type $product_Type)
    {
        //
    }
}

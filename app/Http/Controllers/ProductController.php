<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product_Type;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Str;
use Validator;
use File;
use Merge;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->productRepository->getAllProduct();

        return view('thuthuy.pages.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', 1)->get();

        $productType = Product_Type::where('status', 1)->get();

        return view('thuthuy.pages.products.create', compact('category', 'productType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
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
                    if ($file->move('img/upload/product',$file_name))
                    {
                        $data = $request->all();

                        $data['slug'] = Str::slug($request->input('name'));
                        $data['image'] = $file_name;
                        $data['key_word'] = $request->input('name').','.Str::slug($request->input('name'));
                        $data['content'] = Str::limit(trim(strip_tags($request->input('content'))), 250);

                        Product::create($data);

                        return redirect()->route('products.index')->with('success','Đã thêm thành công '.$request->name);
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
            return back()->with('error','Vui lòng chọn file ảnh');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function listProduct($id)
    {
        $product = $this->productRepository->getProductById($id);

        return view('thuthuy.pages.products.list', compact('product'));
    }
}

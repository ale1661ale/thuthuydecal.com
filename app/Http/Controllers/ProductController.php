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
use Session;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));
        $data['key_word'] = $request->input('name').','.Str::slug($request->input('name'));
        $data['content'] = Str::limit(trim(strip_tags($request->input('content'))), 250);

        Product::create($data);

        return redirect()->route('products.index')->with('success','Đã thêm thành công '.$request->name);
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
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->delete())
        {
            if (!empty($product->image))
            {
                if (file_exists(public_path('img/upload/product/'. $product->image)))
                {
                    unlink(public_path('uploads/products/'. $product->image));

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

    public function detailsProduct($id)
    {
        $category = Category::where('status', 1)->get();

        $productType = Product_Type::where('status', 1)->get();

        $product = $this->productRepository->getProductById($id);

        return view('thuthuy.pages.products.detail', compact('product', 'category', 'productType'));
    }

    public function search(Request $request)
    {
        $search = Input::get('search');

        if ($search != '')
        {
            $product = Product::where('key_word', 'like', '%'. $search .'%')
                                    ->get();
            if (count($product) > 0)
            {
                return view('thuthuy.pages.products.index')->withDetails($product)
                                                                ->withQuery($search);
            }
            else
            {
                return view('thuthuy.pages.products.index')->withMessage('Không tìm thấy kết quả tìm kiếm');
            }
        }
        else
        {
            return view('thuthuy.pages.products.index')->withMessage('Không tìm thấy kết quả .');
        }
    }
}

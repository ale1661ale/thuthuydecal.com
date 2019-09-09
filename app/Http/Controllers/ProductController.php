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
                        $data['content'] = $request->input('content');

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
        $data['content'] = $request->input('content');

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
    public function edit($id)
    {
        $category = Category::where('status', 1)->get();

        $productType = Product_Type::where('status', 1)->get();

        $product = Product::find($id);

        return response()->json(['category' => $category, 'productType' => $productType, 'product' => $product], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);

        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));
        $data['key_word'] = $request->input('name').','.Str::slug($request->input('name'));
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

                    if ($file->move('img/upload/product/',$file_name))
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
            $data['image'] = $product->image;
        }

        $product->update($data);

        return back()->with('success','Đã cập nhật thành công '.$request->name);
    }

    public function updateAjax(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255',
                'image' => 'image',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'min' => ':attribute quá ngắn',
                'max' => ':attribute quá dài',
                'image' => ':attribute không phãi là file ảnh',
            ],
            [
                'name' => 'Tên sản phẩm',
                'image' => 'Hình ảnh sản phẩm',
            ]);
        
        if ($validator->fails())
        {
            return response()->json(['error' => 'true', 'message' => $validator->errors()], 200);
        }

        $product = Product::find($id);

        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        $data['key_word'] = $request->input('name').','.Str::slug($request->input('name'));

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

                    if ($file->move('img/upload/product/',$file_name))
                    {
                        $data['image'] = $file_name;
                    }
                }
                else
                {
                    return response()->json(['error' => ' File ảnh không được lớn hơn 1MB '],200);
                }
            }
            else
            {
                return response()->json(['error' => ' Đây không phãi là file ảnh '],200);
            }
        }
        else
        {
            $data['image'] = $product->image;
        }

        $product->update($data);

        Session::flash('success', 'Đã cập nhật thành công ');

        return response()->json(200);
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

    public function delAll(Request $request)
    {
        $idProduct = $request->input('idProducts');

        if (!empty($idProduct))
        {
            Product::whereIn('id', $idProduct)->delete();

            return redirect()->route('products.index')->with('success', 'Đã xoá thành công danh mục ');
        }
        else
        {
            return back()->with('error', 'Bạn cần phãi chọn thể loại cần xoá !');
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
                                    ->orderBy('created_at', 'desc')->get();
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

<?php


namespace App\Http\Controllers;

use App\Models\{Ale, Banner, Category, Content_Type, Content, Image_Type, Introduce, Logo, Product_Type, Product, Slide, User, CustomerMessage};
use Illuminate\Support\Str;
use Validator;
use File;
use Merge;
use Illuminate\Support\Facades\DB;
use Auth;
use Cart;
use App\Http\Requests\CustomerMessageRequest;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $category = Category::where('status', 1)->get();

        $productType = Product_Type::where('status',1)->get();

        $product = Product::where('status', 1)->orderBy('created_at', 'desc')->take(100)->paginate(10);

        $spnb = Product::where('status', 1)->where('hot', 1)->orderBy('created_at', 'desc')->take(100)->paginate(10);

        $spmn = Product::where('status', 1)->where('hot', 3)->orderBy('created_at', 'desc')->take(100)->paginate(10);

        $spbc = Product::where('status', 1)
                ->where('hot', 2)
                ->orderBy('created_at', 'desc')
                ->inRandomOrder()
                ->take(10)
                ->get();

        $xeMay = Product::where('status', 1)
                ->where('id_cate', 1)
                ->orderBy('created_at', 'desc')
                ->inRandomOrder()
                ->take(10)
                ->get();

        $xeOto = Product::where('status', 1)
                ->where('id_cate', 2)
                ->orderBy('created_at', 'desc')
                ->inRandomOrder()
                ->take(10)
                ->get();
        
        $cart = Cart::content();

        view()->share([
            'category' => $category, 
            'productType' => $productType,
            'product' => $product,
            'spnb' => $spnb,
            'spmn' => $spmn,
            'spbc' => $spbc,
            'xeMay' => $xeMay,
            'xeOto' => $xeOto,
            'cart' => $cart,
            ]);
    }

    public function index()
    {
        return view('client.pages.index');
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax())
        {
            return view('client.pages.index')->render;
        }
    }

    public function contact()
    {
        return view('client.pages.contact');
    }

    public function aboutUs()
    {
        return view('client.pages.about-us');
    }

    public function blogPage($slug)
    {
        $content = Content::where('slug', $slug)->get();

        return view('client.pages.blog-detail', compact('content'));
    }

    public function ajaxModal($id)
    {
        $product1 = Product::find($id);

        return response()->json($product1, 200);
    }

    public function collection($slug)
    {
        $cate = Category::where('slug', $slug)->get();

        $idCate = Category::where('slug', $slug)->value('id');

        $product = Product::where('id_cate', $idCate)->orderBy('created_at', 'desc')->paginate(15);

        return view('client.pages.shop', compact('product', 'cate'));
    }

    public function collectionList()
    {
        return view('client.pages.shop-list');
    }

}

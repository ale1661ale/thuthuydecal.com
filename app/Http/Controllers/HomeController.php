<?php


namespace App\Http\Controllers;

use App\Models\{Ale, Banner, Category, Content_Type, Content, Image_Type, Introduce, Logo, Product_Type, Product, Slide, User, CustomerMessage};
use Illuminate\Support\Str;
use Validator;
use File;
use Merge;
use Illuminate\Support\Facades\DB;
use Auth;
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

        $product = Product::where('status', 1)->orderBy('created_at', 'desc')->paginate(10);

        $spnb = Product::where('status', 1)->where('hot', 1)->orderBy('created_at', 'desc')->paginate(10);

        $spmn = Product::where('status', 1)->where('hot', 3)->orderBy('created_at', 'desc')->paginate(10);

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

        view()->share([
            'category' => $category, 
            'productType' => $productType,
            'product' => $product,
            'spnb' => $spnb,
            'spmn' => $spmn,
            'spbc' => $spbc,
            'xeMay' => $xeMay,
            'xeOto' => $xeOto
            ]);
    }

    public function index()
    {
        return view('client.pages.index');
    }

    public function contact()
    {
        return view('client.pages.contact');
    }

    public function aboutUs()
    {
        return view('client.pages.about-us');
    }

}

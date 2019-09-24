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
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $category = Category::where('status', 1)->get();

        $productType = Product_Type::where('status',1)->get();

        $product = Product::where('status', 1)->orderBy('created_at', 'desc')->take(100)->paginate(10);
        
        $cart = Cart::content();

        view()->share([
            'category' => $category, 
            'productType' => $productType,
            'product' => $product,
            'cart' => $cart,
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();

        return view('client.pages.cart', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax())
        {
            Cart::update($id, $request->qty);

            return response()->json(200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return response()->json(['thongbao', 'Đã xoá thành công sản phẩm khỏi giỏ hàng .'], 200);
    }

    public function addToCart($id, Request $request)
    {
        $product = Product::find($id);

        if ($reproductquest->quantity)
        {
            $quantity = $product->quantity;
        }
        else
        {
            $quantity = 1;
        }

        if ($product->promotion > 0)
        {
            $price = $product->promotion;
        }
        else
        {
            $price = $product->price;
        }

        $cart = [
            'id' => $id, 
            'name' => $product->name,
            'qty' => $quantity,
            'price' => $price,
            'weight' => 0,
            'options' => ['img' => $product->image]
        ];

        Cart::add($cart);

        return back()->with('thongbao', 'Đã thêm vào giỏ hàng của bạn .');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Requests\OrderRequest;
use Cart;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(OrderRequest $request)
    {
        $data = $request->all();

        $data['code_order'] = 'order'.rand();

        $data['money'] = Cart::total();

        $order = Order::create($data);

        $id_order = $order->id;

        $order_detail = [];

        foreach (Cart::content() as $cart)
        {
            $order_detail['id_order'] = $id_order;

            $order_detail['id_product'] = $cart->id;

            $order_detail['quantity'] = $cart->qty;

            $order_detail['amount'] = $cart->price;

            OrderDetail::create($order_detail);
        }
        Cart::destroy();
        
        return back()->with('customer', 'Cảm ơn bạn đã mua hàng ở ThuthuyDecal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CustomerMessage;
use Auth;
use Session;
use App\Http\Requests\CustomerMessageRequest;
use Illuminate\Http\Request;

class CustomerMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerMessage = CustomerMessage::orderBy('created_at', 'desc')->paginate(10);

        return view('thuthuy.pages.customer_message', compact('customerMessage'));
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
    public function store(CustomerMessageRequest $request)
    {
        $data = $request->all();

        if (CustomerMessage::create($data))
        {
            return back()->with('success', 'Lời nhắn đã được gữi thành công !');
        }
        else
        {
            return back()->with('error', 'Lời nhắn đã được gữi thành công !');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerMessage  $customerMessage
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerMessage $customerMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerMessage  $customerMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerMessage $customerMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerMessage  $customerMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerMessage $customerMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerMessage  $customerMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerMessage = CustomerMessage::find($id);

        $customerMessage->delete();

        Session::flash('success', 'Đã xoá thành công ');

        return response()->json($customerMessage, 200);
    }

    public function delAll(Request $request)
    {
        $idMessage = $request->input('idMessages');

        if (!empty($idMessage))
        {
            CustomerMessage::whereIn('id', $idMessage)->delete();

            return redirect()->route('customer-messages.index')->with('success', 'Đã xoá thành công bài viết ');
        }
        else
        {
            return back()->with('error', 'Bạn cần phãi chọn dữ liệu cần xoá !');
        }  
    }
}

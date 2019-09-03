<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_Type;

class AjaxController extends Controller
{
    public function getProductType(Request $request)
    {
        $productType = Product_Type::where('id_cate',$request->id_cate)->get();
        
    	return response()->json($productType,200);
    }
}

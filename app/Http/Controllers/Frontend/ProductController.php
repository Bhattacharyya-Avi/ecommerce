<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $product = Product::orderBy('id','desc')->get();
        if ($product != null) {
            return response()->json([
                'message'=>'success...',
                'products'=>$product
            ]);
        }else {
            return response()->json([
                'message'=>'No product found.',
            ]);
        }
    }

    public function productView($slug)
    {
        try {
            $product = Product::where('slug',$slug)->first();
        if ($product) {
            return response()->json([
                'message'=>'success...',
                'product'=>$product
            ],200);
        }
        } catch (\Throwable $th) {
            return response()->json([
                'message'=>'something went wrong.',
                'error'=>$th->getMessage()
            ],404);
        }
        
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::orderBy('id','desc')->get();
        if ($categories != null) {
            return response()->json([
                'message'=>'success',
                'categories'=>$categories
            ]);
        }else {
            return response()->json([
                'message'=>'No category found.'
            ]);
        }

    }
}

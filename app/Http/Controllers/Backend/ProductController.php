<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::with('category')->orderBy('id','desc')->get();
        $categories = Category::all();
        return view('backend.product.list',compact('products','categories'));
    }

    public function productAdd(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'image'=>'image',
        ]);
        try {
            if ($request->hasFile('image')) {
                $file= $request->file('image');
                $filename = date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->storeAs('uploads/product',$filename);
            }
            Product::create([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'category_id'=>$request->category,
                'details'=>$request->details,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'image'=>$filename,
            ]);
            session()->flash('success','Product created.');
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('isParent')->orderBy('position','ASC')->get();
        // Parent category
        $parentCategories = Category::where('is_parent', '!=', 0)->get();
        return view('backend.category.list',compact('categories','parentCategories'));
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
        // data validation
        $request->validate([
            'name' => 'required',
            'position' => 'required',
        ]);
        $data = [
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'details'=>$request->details,
            'position'=>$request->position,
        ];
        // checking prent category or not
        if ($request->is_parent == "on") {
            // validation 
            $request->validate([
                'parent_id' =>  'required'
            ]);
            $data['is_parent'] = 1;
            $data['parent_id'] = $request->parent_id;
        }else{
            $data['parent_id']= $request->parent_id;
        }

        try {
            Category::create($data);
        } catch (\Throwable $th) {
            session()->flash('error',$th->getMessage(), $th->getLine());
        }
        session()->flash('success','category added');
        return redirect()-> back();
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
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
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
        // dd($request->all(),$id);
        $category = Category::find($id);
        if ($category) {
            $category->update([
                'name'=>$request->name,
                'details'=>$request->details,
                'slug'=>Str::slug($request->name)
            ]);
            session()->flash('success','category updated');
            return redirect()->route('admin.categoris.index');
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
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            session()->flash('success','category deleted');
            return redirect()->back();
        }
    }
}

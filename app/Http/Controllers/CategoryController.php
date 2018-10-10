<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Category::all();
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
        $category=new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name,'-');

        if($request->hasFile('image')){
          $file = $request->image;
          $name = Rand(1,10000).$file->getClientOriginalName();
          $file->move('image/category',$name);
          $category->image = $name;
        }

        $category->description = $request->description;
        $category->save();
        return redirect()->back();
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
    // Toogle show hide on homepage
    public function toogleShowHide(Request $request)
    {
      define("TOGGLE_ID", $request->id);

      $category=Category::findOrFail(TOGGLE_ID);
      $category->show==1?$category->show=0:$category->show=1;
      $category->save();
      return "Done";
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editCategory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category -> name = $request -> name;
        $category -> description = $request -> description;
        if($request->hasFile('image')){
          $file = $request-> image;
          $name = Rand(1,10000).$file->getClientOriginalName();
          $file -> move('image/category',$name);
          $category->image = $name;
        }
        $category->save();
        return redirect()->back()->with('alert','Done');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return "Xóa thành công";
    }
}

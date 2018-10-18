<?php

namespace App\Http\Controllers;
use App\Contact;
use App\Product;
use App\Coordinate;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return  view('admin.product.index',compact('products'));
    }
    public function hotProduct(){
      return Product::take(4)->get();
    }
    public function newProduct(){
      return Product::orderBy('id','DESC')->take(6)->get();
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

          $product = new Product();
          $product -> category_id = $request -> category_id;
          $product -> user_id = 1;
          if(!$request -> description){
            $product -> description = 'Chưa có mô tả';
          }
          else{
            $product -> description = $request -> description;
          }
          $product -> title = $request -> title;
          $product -> slug = str_slug($request -> title);
          $product -> location = $request -> location;
          $product -> type = $request -> type;
          $product -> price = $request -> price;
          $product -> area = $request -> area;
          $product -> city_code = $request -> city_code;
          $product -> district_code = $request -> district_code;
          if($request -> amenities){
            $product -> amenities = $request -> amenities;
          }
          else{
            $product -> amenities = 'Đang cập nhật';
          }

          if($request->hasFile('image')){
            $file = $request -> image;
            $name = Rand(1,10000).$file -> getClientOriginalName();
            $file ->move('image/product',$name);
            $product ->image =$name;

          }

          $product ->save();
          // Create contact
          Contact::create([
            'product_id'=>$product->id,'name'=>$request->contactName,
            'email'=>$request->contactEmail,
            'phone'=>$request->contactPhone
          ]);
          // Cteate coordinate of location
          Coordinate::create([
            'product_id'=> $product -> id,
            'long' => $product -> long,
            'lat' => $product -> lat
          ]);


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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit',compact('product'));
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
        $product = Product::findOrFail($id);
        $product -> delete();
        return "success";
    }
}

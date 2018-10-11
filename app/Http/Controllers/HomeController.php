<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Product;
class HomeController extends Controller
{
  public function product($id){
    $product = Product::findOrFail($id);
    return view('client.product',compact('product'));
  }
  public function upload(Request $request){

      $input=$request->all();
      $images=array();
      if($files=$request->file('images')){
          foreach($files as $file){
              $name=Rand(1,10000).$file->getClientOriginalName();
              $file->move('image',$name);
              $images[]=$name;
          }
      }
      return json_encode($images);
  }
}

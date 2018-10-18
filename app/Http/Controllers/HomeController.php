<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Product;
use App\Category;
use App\Subscriber;
class HomeController extends Controller
{
  public function getDistricts(){
    $districts = Location::where('parent_code','>',0)->get();
    return $districts;
  }
  // Get all cities
  public function getCities(){
    $cities = Location::where('parent_code',0)->get();
    return $cities;
  }
  // Render product details by ID
  public function product($slug,$id){
    $product = Product::findOrFail($id);
    $relatedProducts = Product::where('category_id',$product->category_id)->inRandomOrder()->take(3)->get();
    return view('client.product',compact('product','relatedProducts'));
  }
  // Render all products
  public function productsAll(){
    $categories = Category::all();
    return view('client.product-by-category',compact('categories'));
  }
  // Render products list by category
  public function productsByCategory($slug,$id){
    $category = Category::findOrFail($id);
    $products = Product::orderBy('id','DESC')->where('category_id',$id)->paginate(6);

    return view('client.category',compact('products','category'));
  }

  // Render products list by query search
  public function productsByQuery(Request $request){
    if(!$request -> city && !$request -> district ){
      // If user not fill the city_code and district_code
      $products = Product::where('title','like','%'.$request->text.'%')->get();
      $place = "All";
    }
    else{
      // if user only fill the city_code
      if(!$request -> district){
          $products = Product::where('city_code',$request->city)->where('title','like','%'.$request->text.'%')->get();
          $place = Location::where('code',$request -> city)->get();
      }
      else{
        //if user fill both city_code and district_code
          $products = Product::where('district_code',$request->district)->where('title','like','%'.$request->text.'%')->get();
          $place = Location::where('code',$request -> district)->get();
      }
    }

    return view('client.search-result',compact('products','place'));
  }
  // Render login page


  public function addSuscriberEmail(Request $request){
      $request -> validate([
        'email' =>'required|email|unique:subscribers'
      ]);
      Subscriber::create(['email'=>$request['email']]);
      return "success";
  }


}

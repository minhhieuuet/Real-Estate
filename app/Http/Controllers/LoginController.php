<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    function index(){
      return view('admin.login');
    }
    public function checkLogin(Request $request){
      if(Auth::attempt(['name'=>$request->username,'password'=>$request->password])){
        return "Done";
      }
      return "Login failed";
    }

    public function logout(){
      Auth::logout();
      return redirect('admin');
    }
}

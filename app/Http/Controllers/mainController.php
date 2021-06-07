<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;//for hash or encryption
use Illuminate\Contracts\Auth\Authenticatable;
use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use DB;



class mainController extends Controller
{
    public function admin(){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      return view('dashboard', ['data1' => $data1]);
    }
    public function login(){
      return view('login');
    }
    public function logout(Request $request){
      Auth::logout();
      Session::flush();
      $request->session()->forget('email');
      return redirect('/');
    }
    public function home(){
      return view('index');
    }
    public function profile(){
      return view('profile');
    }
    public function services(){
      return view('services');
    }
    public function equipment(){
      return view('equipment');
    }
    public function client(){
      return view('client');
    }
    public function management(){
      return view('management');
    }
    public function gallery(){
      return view('gallery');
    }
    public function checkLogin(Request $request){
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|alphaNum|min:3'
      ]);
      // $data = $request->input();
      $userData = array(
        'email' => $request->get('email'),
        'password' => $request->get('password')
      );

      if(Auth::attempt($userData)){
        $request->session()->put('email', $userData['email']);
        // return Redirect::route('admin')->with(['email' => $userData['email']]);
        return redirect('admin');
        // echo "login success";
      }else{
        return back()->with('error', 'Wrong login details ');
      }
    }
}

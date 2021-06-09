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

class dashboardController extends Controller
{
    public function gallery(){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      return view('galleryForm', ['data1' => $data1]);
    }
    public function logout(Request $request){
      Auth::logout();
      Session::flush();
      $request->session()->forget('email');
      return redirect('../../');
    }
}

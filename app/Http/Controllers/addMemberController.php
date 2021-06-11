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

class addMemberController extends Controller
{
    public function store(Request $request){
      $member = new User;
      $section =  $request->input("input5");
      $userCheck = DB::table('users')
                ->where('position', $section)
                ->where('status', 'active')
                ->count();
      $userCheck = User::where('position', $section)->count();

      if($userCheck >= 1){
        return response()->json([
                'response' => 'false',
                'message' => $section.' position already in system'
              ]);
      }else{
        return response()->json([
                'response' => 'true',
                'message' => 'Success'
              ]);
      }



    }
}

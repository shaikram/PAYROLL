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
      // $sort_position = array(
      //   "Chief Executive Officer" => "1",
      //   "President" => "2",
      //   "Vice President" => "3",
      //   "General Manager" => "4",
      //   "Marketing Manager" => "5",
      //   "Operation Manager" => "6",
      //   "Admin Manager" => "7",
      //   "Finance Manager" => "8"
      // );
      $position =  $request->input("input5");
      // $email = $request->('input7');
      $userCheck = DB::table('users')
                ->where('position', $position)
                ->where('status', 'active')
                ->count();
      // $emailCheck = User::where('email', $email)->count();

      if($userCheck >= 1){
        return response()->json([
                'response' => 'false',
                'message' => $section.' position already in system'
              ]);
      // }if($emailCheck >= 1){
      //   return response()->json([
      //           'response' => 'false',
      //           'message' => $email.' This email was already in the system'
      //         ]);
      // }
      }else{
        return response()->json([
                  'response' => 'true',
                  'message' => "success"
                ]);
                
        // $member->username = ucwords($request->input('input1')." ".$request->input('input3'));
        // $member->firstName = ucwords($request->input('input1'));
        // $member->middleName = ucwords($request->input('input2'));
        // $member->lastName = ucwords($request->input('input3'));
        // $member->email = $request->input('input7');
        // $member->password = Hash::make($request->input('input7'));
        // $member->address = $request->input('input4');
        // $member->position = $request->input('input5');
        // $member->positionNum = $sort_position[$position];
        // $member->contactNo = $request->input('input6');

        // if($member->save()){
        //   return response()->json([
        //           'response' => 'true',
        //           'message' => 'Success'
        //         ]);
        // }else{
        //   return response()->json([
        //           'response' => 'false',
        //           'message' => "There's a problem!"
        //         ]);
        // }


      }



    }
}

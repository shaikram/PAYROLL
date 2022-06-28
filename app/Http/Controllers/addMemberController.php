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
use Illuminate\Support\Str;
use App\Models\User;
use DB;

class addMemberController extends Controller
{
    public function store(Request $request){
      $member = new User;
      $position =  $request->input("input5");
      $email = $request->input('input7');
      $sort_position = array(
          "Chief Executive Officer" => "1",
          "President" => "2",
          "Vice President" => "3",
          "General Manager" => "4",
          "Marketing Manager" => "5",
          "Operation Manager" => "6",
          "Admin Manager" => "7",
          "Finance Manager" => "8"
        );
        $positionNum = $sort_position[$position];

        $userCheck = DB::table('users')
                  ->where('position', $position)
                  ->where('status', 'active')
                  ->count();

        $emailCheck = User::where('email', $email)->count();


        if($userCheck >= 1){
          return response()->json([
                  'condition' => 'false',
                  'message' => $position.' position was already in system'
                ]);

        }if($emailCheck >= 1){
            return response()->json([
                    'condition' => 'false',
                    'message' => $email.' This email was already in the system'
                  ]);
          }else{
            $member->username = ucwords($request->input('input1')." ".$request->input('input3'));
            $member->firstName = ucwords($request->input('input1'));
            $member->middleName = ucwords($request->input('input2'));
            $member->lastName = ucwords($request->input('input3'));
            $member->email = $request->input('input7');
            $member->password = Hash::make($request->input('input8'));
            $member->address = $request->input('input4');
            $member->position = $request->input('input5');
            $member->positionNum = $sort_position[$position];
            $member->contactNo = $request->input('input6');
            $member->remember_token = Str::random(10, 'Webslesson');

            if($member->save()){
              return response()->json([
                      'condition' => 'true',
                      'message' => 'Success'
                    ]);
            }else{
              return response()->json([
                      'condition' => 'false',
                      'message' => "There's a problem!"
                    ]);
            }
        }



    }
    public function confirmPass(Request $request){
      $id = $request->input('id');
      $pass = $request->input('checkPass');

      $check = array(
        'userId' => $id,
        'password' => $pass
      );


      if(Auth::attempt($check)){
        return response()->json([
                'condition' => 'true',
                'message' => 'Password confirm'
              ]);
      }else{
        return response()->json([
                'condition' => 'false',
                'message' => 'Wrong Password!'
              ]);
      }
    }
    public function changePass(Request $request){
      $id = $request->input('id');
      $pass = $request->input('password');
      $pass = Hash::make($pass);

      $change = DB::table('users')
                  ->where('userId', $id)
                  ->update(['password' => $pass]);
      if($change){
        return response()->json([
                'condition' => 'true',
                'message' => 'Password changed'
              ]);
      }else{
        return response()->json([
                'condition' => 'false',
                'message' => 'Something wrong'
              ]);
      }
    }

    public function changePhoto(Request $request){
      $id = $request->input('id');
      $image = $request->file('profile_img');
      $new_name = rand().'.'. $image->getClientOriginalExtension();
      $image->move(public_path('photo'), $new_name);


      $photo = DB::table('users')
          ->where('userId', $id)
          ->update(['picture' => $new_name]);

        if($photo){
          return back()->with('success', 'Profile Picture Updated Successfully');
        }else{
          return back()->with('success', "There's something wrong!");
        }

    }
    public function changeStatus(Request $request){
      $id = $request->input('id');
      $status = $request->input('status');
      $position = $request->input('position');
      $check = DB::table('users')
          ->where('position', $position)
          ->where('status', 'active')
          ->count();
      if ($status == 'active') {
        if($check >= 1){
          return back()->with('error', 'Position already active');
        }else{
          $ch_status = DB::table('users')
              ->where('userId', $id)
              ->update(['status' => $status]);

          return back()->with('message', 'Status Updated Successfully');
        }
      }else{
        $ch_status = DB::table('users')
            ->where('userId', $id)
            ->update(['status' => $status]);

        return back()->with('message', 'Status Updated Successfully');
      }


    }
    public function update(Request $request){
      $id = $request->input('id');
      $fname = ucwords($request->input('input1'));
      $mname = ucwords($request->input('input2'));
      $lname = ucwords($request->input('input3'));
      $contact = $request->input('input4');
      $address = ucwords($request->input('input5'));
      $username = $fname." ".$lname;

      $user = DB::table('users')
          ->where('userId', $id)
          ->update(
            [
              'username' => $username,
              'firstName' => $fname,
              'middleName' => $mname,
              'lastName' => $lname,
              'contactNo' => $contact,
              'address' => $address
            ]
          );
        if($user){
          return response()->json([
                  'condition' => 'true',
                  'message' => 'Profile Updated Successfully'
                ]);
        }else{
          return response()->json([
                  'condition' => 'false',
                  'message' => "There's a problem!"
                ]);
        }
    }

}

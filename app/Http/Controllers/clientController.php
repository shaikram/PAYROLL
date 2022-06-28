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
use App\Models\Client;
use App\Models\Salary;
use App\Models\payList;
use Carbon\Carbon;
use DB;

class clientController extends Controller
{
  public function store(Request $request){

    if ($request->file('images') == "") {
      $cname = ucwords($request->input('name'));
      $address = $request->input('address');
      $uploader = $request->input('uploader');

      Client::create([
          'name' => $cname,
          'address' => $address,
          'addedBy' => $uploader
         ]);

      return back()->with('success', 'Client submitted successfully');
    }else{
      $images = $request->file('images');
      $cname = ucwords($request->input('name'));
      $address = $request->input('address');
      $uploader = $request->input('uploader');

      $name = $images;
      $new_name = rand().'.'. $name->getClientOriginalExtension();
      $name->move(public_path('client'), $new_name);

      Client::create([
          'name' => $cname,
          'photo' => $new_name,
          'address' => $address,
          'addedBy' => $uploader
         ]);

      return back()->with('success', 'Client submitted successfully');
    }



  }
  public function profile($id){
    $email = Session::get('email');

    $info = DB::table('clients')
               ->where('clientId', $id)
               ->get();

    $data1 = DB::table('users')->where('email', $email)->get();

    $payList = DB::table('pay_lists')
               ->where('clientId', $id)
               ->orderBy('from', 'DESC')
               ->get();

    foreach ($info as $row) {
     $userId = $row->addedBy;
     $data2 = DB::table('users')
                ->where('userId', $userId)
                ->get();

                                                                                                                                                                                                                                                //

       return view('clientProfile', ['data1' => $data1, 'info' => $info, 'data2' => $data2, 'payList' => $payList]);
    }


  }

    public function changePhoto(Request $request){
      $id = $request->input('id');
      $image = $request->file('client_img');
      $new_name = rand().'.'. $image->getClientOriginalExtension();
      $image->move(public_path('client'), $new_name);


      $photo = DB::table('clients')
          ->where('clientId', $id)
          ->update(['photo' => $new_name]);

        if($photo){
          return back()->with('success', 'Profile Picture Updated Successfully');
        }else{
          return back()->with('success', "There's something wrong!");
        }

    }

    public function editClient($id){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      $cdata = Client::where('clientId', $id)->get();

      return view('editClient', ['data1' => $data1, 'cdata' => $cdata]);
    }

    public function update(Request $request){
      $id = $request->input('id');
      $name = ucwords($request->input('input1'));
      $address = ucwords($request->input('input2'));


      $user = DB::table('clients')
          ->where('clientId', $id)
          ->update(
            [
              'name' => $name,
              'address' => $address
            ]
          );
        if($user){
          return response()->json([
                  'condition' => 'true',
                  'message' => $id
                ]);
        }else{
          return response()->json([
                  'condition' => 'false',
                  'message' => "There's a problem!"
                ]);
        }
    }
}

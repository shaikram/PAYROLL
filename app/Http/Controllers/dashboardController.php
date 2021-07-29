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
use App\Models\Employee;
use App\Models\Gallery;
use DB;

class dashboardController extends Controller
{
    public function gallery(){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      $showforce = Gallery::where('Section', 'Showforce')->orderBy('gId', 'DESC')->get();
      $meetings = Gallery::where('Section', 'Meetings')->orderBy('gId', 'DESC')->get();
      $accrreditation = Gallery::where('Section', 'Accreditation')->orderBy('gId', 'DESC')->get();
      $vehicles = Gallery::where('Section', 'Vehicles')->orderBy('gId', 'DESC')->get();
                                                                                                                                                                                                                                                                                                    //
      return view('galleryForm', ['data1' => $data1, 'showforce' => $showforce, 'meetings' => $meetings, 'accrreditation' => $accrreditation, 'vehicles' => $vehicles]);
    }
    public function addMember(){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      return view('addMember', ['data1' => $data1]);
    }
    public function memberList(){
      $email = Session::get('email');
      $data = DB::table('users')
                 ->where('restriction', 'admin')
                 ->where('status', 'active')
                 ->orderBy('positionNum', 'ASC')
                 ->get();

      $data2 = DB::table('users')
                 ->where('restriction', 'admin')
                 ->where('status', 'deactivate')
                 ->orderBy('positionNum', 'DESC')
                 ->get();


      $data1 = DB::table('users')
                 ->where('email', $email)
                 ->where('restriction', 'super admin')
                 ->get();

      return view('memberList', ['data1' => $data1, 'data' => $data, 'data2' => $data2]);
    }
    public function logout(Request $request){
      Auth::logout();
      Session::flush();
      $request->session()->forget('email');
      return redirect('../../');
    }
    public function profile($id){
      $email = Session::get('email');

      $info = DB::table('users')
                 ->where('userId', $id)
                 ->get();

      $data1 = DB::table('users')
                ->where('email', $email)
                ->where('restriction', 'super admin')
                ->get();

      return view('memberProfile', ['data1' => $data1, 'info' => $info]);
    }
    public function addemployee(){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      return view('addEmployee', ['data1' => $data1]);
    }
    public function addClient(){
      $email = Session::get('email');

      $data = DB::table('clients')->orderBy('clientId', 'DESC')->get();

      $data1 = User::where('email', $email)->get();
      return view('clientForm', ['data1' => $data1, 'data' => $data]);
    }
    public function addPayroll(){
      $email = Session::get('email');

      $data = DB::table('clients')->orderBy('clientId', 'DESC')->get();
      $client = DB::table('clients')->where('payroll', 0)->orderBy('clientId', 'ASC')->get();

      $data1 = User::where('email', $email)->get();
      return view('payrollForm', ['data1' => $data1, 'data' => $data, 'client' => $client]);
    }
    public function posting(Request $request){
      $email = Session::get('email');
      $company = $request->input('client');
      $nog = $request->input('no_grds');
      $data1 = User::where('email', $email)->get();
      $employee = DB::table('employees')->where('status', 0)->orderBy('empId', 'ASC')->get();
      $client = DB::table('clients')->where('clientid', $company)->get();

      return view('postingForm',
                  [
                    'data1' => $data1,
                    'employee' => $employee,
                    'client' => $client,
                    'nog' => $nog
                   ]);;

    }
   public function password(){
     $email = Session::get('email');
     $data = User::all();
     $data1 = User::where('email', $email)->get();

     return view('password', ['data1' => $data1]);

   }
}

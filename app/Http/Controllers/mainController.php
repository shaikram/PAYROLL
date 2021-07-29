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
use App\Models\Gallery;
use App\Models\Search;
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
    public function userProfile(){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      return view('user', ['data1' => $data1]);
    }
    public function editUser(){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      return view('editUser', ['data1' => $data1]);
    }
    public function home(){
      $client = Client::all();

      return view('index', ['client' => $client]);
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
      $client = Client::all();

      return view('client', ['client' => $client]);
    }
    public function management(){
      $management = User::where('status', 'active')->orderBy('positionNum', 'ASC')->get();

      return view('management', ['management' => $management]);
    }
    public function gallery(){
      $showforce = Gallery::where('Section', 'Showforce')->orderBy('gId', 'DESC')->get();
      $meetings = Gallery::where('Section', 'Meetings')->orderBy('gId', 'DESC')->get();
      $accrreditation = Gallery::where('Section', 'Accreditation')->orderBy('gId', 'DESC')->get();
      $vehicles = Gallery::where('Section', 'Vehicles')->orderBy('gId', 'DESC')->get();
      $management = User::where('status', 'active')->orderBy('positionNum', 'ASC')->get();

      return view('gallery', ['showforce' => $showforce, 'meetings' => $meetings, 'accrreditation' => $accrreditation, 'vehicles' => $vehicles, 'management' => $management ]);
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

        $checkStatus = DB::table('users')
                          ->where('email', $userData['email'])
                          ->get();
        foreach ($checkStatus as $res) {
          $status = $res->status;
            if($status === 'deactivate'){
              return back()->with('error', 'Your account is currently deactivated!');
            }else{
              return redirect('admin');
            }
        }
        // return Redirect::route('admin')->with(['email' => $userData['email']]);
        // echo "login success";
      }else{
        return back()->with('error', 'Wrong login details!');
      }
    }
    public function search(Request $request){
      $search = $request->input('search');
      $result = Search::where('search', 'like', '%'.$search.'%')->get();
      $count = Search::where('search', 'like', '%'.$search.'%')->count();

      return view('search', ['result' => $result, 'count' => $count]);
    }
    public function result($id){
      $result = $id;
      return view('result', ['result' => $result]);
    }
}

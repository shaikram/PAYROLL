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
use App\Models\Employee;
use DB;

class employeeController extends Controller
{
    public function store(Request $request){
      $employee = new Employee;
      $fname = ucwords($request->input('input1'));
      $mname = ucwords($request->input('input2'));
      $lname = ucwords($request->input('input3'));
      $uname = $fname." ".$lname;
      $designation = $request->input('input4');
      $contact = $request->input('input5');
      $address = $request->input('input6');
      $sss = $request->input('input7');
      $hmdf = $request->input('input8');
      $phealth = $request->input('input9');
      $tin = $request->input('input10');
      $userId = $request->input('input11');

      $userCheck = DB::table('employees')
                ->where('fname', $fname)
                ->where('mname', $mname)
                ->where('lname', $lname)
                ->count();
      $sssCheck = DB::table('employees')
                ->where('sss', $sss)
                ->count();
      $hmdfCheck = DB::table('employees')
                ->where('hmdf', $hmdf)
                ->count();
      $phealthCheck = DB::table('employees')
                ->where('philhealth', $phealth)
                ->count();
      $tinCheck = DB::table('employees')
                ->where('tin', $tin)
                ->count();

      switch(true){
            case ($userCheck >= 1):

              return response()->json([
                      'condition' => 'false',
                      'message' => 'The entered name was already in our system! please kindly check it again.'
                    ]);
              break;

            case ($sssCheck >= 1):

            return response()->json([
                    'condition' => 'false',
                    'message' => 'SSS Number was already in our system! please kindly check it again.'
                  ]);
              break;

            case ($hmdfCheck >= 1):

            return response()->json([
                    'condition' => 'false',
                    'message' => 'Pag-ibig Number was already in our system! please kindly check it again.'
                  ]);
              break;

            case ($phealthCheck >= 1):

            return response()->json([
                    'condition' => 'false',
                    'message' => 'Philhealth Number was already in our system! please kindly check it again.'
                  ]);
              break;

            case ($tinCheck >= 1):

            return response()->json([
                    'condition' => 'false',
                    'message' => 'TIN Number was already in our system! please kindly check it again.'
                  ]);
              break;

            case (strlen($contact) != 11):

            return response()->json([
                    'condition' => 'false',
                    'message' => 'Contact number must be atleast 11'
                  ]);
              break;

        }//====END OF SWITCH
        $employee->username = $uname;
        $employee->fname = $fname;
        $employee->mname = $mname;
        $employee->lname = $lname;
        $employee->designation = $designation;
        $employee->contactNo = $contact;
        $employee->address = $address;
        $employee->sss = $sss;
        $employee->hmdf = $hmdf;
        $employee->philhealth = $phealth;
        $employee->tin = $tin;
        $employee->addedBy = $userId;

        if($employee->save()){
          return response()->json([
                  'condition' => 'true',
                  'message' => 'Success'
                ]);
        }else{
          return response()->json([
                  'condition' => 'false',
                  'message' => 'There is an error!'
                ]);
        }

    }
    public function employeerList(){
          $email = Session::get('email');
          $data = DB::table('employees')
                     ->where('status', 1)
                     ->orderBy('empId', 'DESC')
                     ->get();

          $data2 = DB::table('employees')
                     ->where('status', 0)
                     ->orderBy('empId', 'DESC')
                     ->get();

          $data1 = User::where('email', $email)->get();

          return view('employeeList', ['data1' => $data1, 'data' => $data, 'data2' => $data2]);

    }
    public function profile($id){
      $email = Session::get('email');

      $info = DB::table('employees')
                 ->where('empId', $id)
                 ->get();

      $data1 = DB::table('users')->where('email', $email)->get();

      foreach ($info as $row) {
        $userId = $row->addedBy;
        $data2 = DB::table('users')->where('userId', $userId)->get();
        return view('employeeProfile', ['data1' => $data1, 'info' => $info, 'data2' => $data2]);
      }


    }
    public function salary($id){
      $email = Session::get('email');
      $data1 = DB::table('users')->where('email', $email)->get();
      $info = DB::table('employees')
                 ->where('empId', $id)
                 ->get();
     $count = DB::table('employees')
                   ->join('salaries', 'employees.empId', 'salaries.empId')
                   ->join('clients', 'salaries.clientId', 'clients.clientId')
                   ->where('salaries.empId', $id)
                   ->orderBy('salaries.from', 'DESC')
                   ->count();

      $data2 = DB::table('employees')
                    ->join('salaries', 'employees.empId', 'salaries.empId')
                    ->join('clients', 'salaries.clientId', 'clients.clientId')
                    ->where('salaries.empId', $id)
                    ->orderBy('salaries.from', 'DESC')
                    ->get();

      return view('employeeSalary', ['data1' => $data1, 'info' => $info, 'data2' => $data2, 'count' => $count]);

    }

    public function editProfile($id){
      $email = Session::get('email');

      $info = DB::table('employees')
                 ->where('empId', $id)
                 ->get();

      $data1 = DB::table('users')->where('email', $email)->get();

      foreach ($info as $row) {
        $userId = $row->addedBy;
        $data2 = DB::table('employees')->where('empId', $userId)->get();
        return view('editProfile', ['data1' => $data1, 'info' => $info, 'data2' => $data2]);
      }


    }
    public function updateProfile(Request $request){
      $empId = $request->input('id');
      $uid = $request->input('uid');

      for ($i = 1; $i <= 6; $i++) {
        if($i == 6) {
          $uname = ucwords($request->input('input1')." ".$request->input('input3'));
          $employee = DB::table('employees')
              ->where('empId', $empId)
              ->update(['username' => $uname, 'updatedBy' => $uid]);
        }else{
          $inp = "input".$i;
          $input = $request->input($inp);
          $column = [
            "",
            "fname",
            "mname",
            "lname",
            "contactNo",
            "address"
          ];

          $employee = DB::table('employees')
              ->where('empId', $empId)
              ->update([$column[$i] => $input]);
        }

      }

      return redirect('admin/'.$empId.'/employee-profile');




    }

}

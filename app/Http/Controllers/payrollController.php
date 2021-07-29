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
use App\Models\Posting;
use App\Models\Salary;
use App\Models\payList;
use DB;
use Response;

class payrollController extends Controller
{
    public function store(Request $request){
      $guard = $request->input('guard');
      $client = $request->input('client');
      $admin = $request->input('uploader');


        foreach($guard as $guard){

          Posting::create([
              'clientId' => $client,
              'empId' => $guard,
              'createdBy' => $admin
             ]);

           DB::table('employees')
               ->where('empId', $guard)
               ->update(['status' => 1]);
        }
        DB::table('clients')
            ->where('clientId', $client)
            ->update(['payroll' => 1]);



        return redirect('admin/'.$client.'/client-profile');
    }
    public function payroll($id){
      $email = Session::get('email');
      $data1 = DB::table('users')->where('email', $email)->get();

      $client = Client::where('clientId',$id)->get();

      $count = DB::table('employees')
                      ->join('postings', 'employees.empId', 'postings.empId')
                      ->where('postings.clientId', $id)
                      ->orderBy('postings.postId', 'DESC')
                      ->count();

      $employee = DB::table('employees')
                      ->join('postings', 'employees.empId', 'postings.empId')
                      ->where('postings.clientId', $id)
                      ->orderBy('postings.postId', 'DESC')
                      ->get();

      return view('payroll', ['data1' => $data1, 'posting' => $employee, 'client' => $client, 'count' => $count] );


      // return Response::json($employee->toArray());


    }

    public function savePayroll(Request $request){
      $salary = new Salary;
      $count = $request->input('count');
      $userId = $request->input('userId');
      $clientId = $request->input('clientId');
      $from = $request->input('from');
      $to = $request->input('to');

      $image = $request->file('dtr');
      $new_name = rand().'.'. $image->getClientOriginalExtension();
      $image->move(public_path('dtr'), $new_name);

      for ($a = 1; $a <= $count; $a++) {

        $empId = $request->input('empId'.$a);
        $duty = $request->input('duty'.$a);
        $rate = $request->input('rate'.$a);
        $ot = $request->input('ot'.$a);
        $op = $request->input('op'.$a);
        $noh = $request->input('noh'.$a);
        $holType = $request->input('holType'.$a);
        $gp = $request->input('gp'.$a);
        $sss = $request->input('sss'.$a);
        $philhealth = $request->input('philhealth'.$a);
        $hmdf = $request->input('hmdf'.$a);
        $cb = $request->input('cb'.$a);
        $ca = $request->input('ca'.$a);
        $td = $request->input('td'.$a);
        $np = $request->input('np'.$a);

        Salary::create([
            'clientId' => $clientId,
            'userId' => $userId,
            'from' => $from,
            'to' => $to,
            'dtr' => $new_name,
            'empId' => $empId,
            'duty' => $duty,
            'rate' => $rate,
            'ot' => $ot,
            'op' => $op,
            'noh' => $noh,
            'holType' => $holType,
            'gp' => $gp,
            'sss' => $sss,
            'philhealth' => $philhealth,
            'hmdf' => $hmdf,
            'cb' => $cb,
            'ca' => $ca,
            'td' => $td,
            'np' => $np
           ]);

      }

      payList::create([
        'clientId' => $clientId,
        'userId' => $userId,
        'from' => $from,
        'to' => $to,
        'dtr' => $new_name
      ]);

      return redirect('admin/'.$clientId.'/client-profile');

    }
    public function generate($id,$from,$to){
      $email = Session::get('email');
      $data1 = DB::table('users')->where('email', $email)->get();
      $client = DB::table('clients')->where('clientId', $id)->get();

      $date = DB::table('users')
                      ->join('pay_lists', 'pay_lists.userId', 'users.userId')
                      ->where('clientId', $id)
                      ->where('from', $from)
                      ->where('to', $to)
                      ->get();

      $count = DB::table('employees')
                      ->join('salaries', 'employees.empId', 'salaries.empId')
                      ->where('salaries.clientId', $id)
                      ->where('salaries.from', $from)
                      ->where('salaries.to', $to)
                      ->count();

      $salary = DB::table('employees')
                      ->join('salaries', 'employees.empId', 'salaries.empId')
                      ->where('salaries.clientId', $id)
                      ->where('salaries.from', $from)
                      ->where('salaries.to', $to)
                      ->get();

      // $salary = DB::table('salaries')
      //       ->where('clientId', $id)
      //       ->where('from', $from)
      //       ->where('to', $to)
      //       ->get();

      // $count = DB::table('salaries')
      //       ->where('clientId', $id)
      //       ->where('from', $from)
      //       ->where('to', $to)
      //       ->count();

      return view('payrollFinal', [
        'data1' => $data1,
        'salary' => $salary,
        'count' => $count,
        'client' => $client,
        'date' => $date
      ]);

    }

}

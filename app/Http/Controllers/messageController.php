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
use App\Mail\welcomeMail;
use App\Mail\replyMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Message;
use App\Models\Reply;
use DB;


class messageController extends Controller
{
    public function store(Request $request){
      $messages = new Message;
      $email = $request->input('inp1');
      $name = ucwords($request->input('inp2'));
      $subject = $request->input('inp3');
      $message = $request->input('inp4');


      $emailCheck = DB::table('messages')
                ->where('email', $email)
                ->count();

          if ($emailCheck >= 1) {
            $messages->email = $email;
            $messages->name = $name;
            $messages->subject = $subject;
            $messages->message = $message;

            if($messages->save()){
              return response()->json([
                      'condition' => 'true',
                      'message' => 'Your message successfully Sent'
                    ]);
            }

          }if($emailCheck <= 0){
            $messages->email = $email;
            $messages->name = $name;
            $messages->subject = $subject;
            $messages->message = $message;

            $data = array(
                      'username' => $name,
                      'message' => $message
                    );

            Mail::to($email)->send(new welcomeMail($data));

            if($messages->save()){
              return response()->json([
                      'condition' => 'true',
                      'message' => 'Your message successfully Sent'
                    ]);
            }
          }else{
            return response()->json([
                    'condition' => 'false',
                    'message' => 'There is a problem or error!'
                  ]);
          }


    }
    public function index(){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      $unread = Message::where('status', 1)->orderBy('msgId', 'DESC')->get();
      $read = Message::where('status', 0)->orderBy('msgId', 'DESC')->get();

      return view('inbox',
                  [
                    'data1' => $data1,
                    'unread' => $unread,
                    'read' => $read
                  ]);
    }
    public function viewr($id){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      $message = Message::where('msgId', $id)->get();

      foreach ($message as $row) {
        $sId = $row->userFkey;
        $data2 = User::where('userId', $sId)->get();
        return view('showMessage')->with([
          'message' => $message,
           'data1' => $data1,
           'data2' => $data2
         ]);
      }

    }
    public function viewu($id,$userId){
      $email = Session::get('email');
      $data = User::all();
      $data1 = User::where('email', $email)->get();
      $user = $userId;
      $update = DB::table('messages')
            ->where('msgId', $id)
            ->update([
              'status' => 0,
              'userFkey' => $user
            ]);
     $message = Message::where('msgId', $id)->get();


       foreach ($message as $row) {
         $sId = $row->userFkey;
         $data2 = User::where('userId', $sId)->get();
         return view('showMessage')->with([
           'message' => $message,
            'data1' => $data1,
            'data2' => $data2
          ]);
       }

    }
    public function replyStore(Request $request){
      $reply = new Reply;
      $msgId = $request->input('msgId');
      $userId = $request->input('userId');
      $email = $request->input('email');
      $username = $request->input('username');
      $message = $request->input('message');

      $reply->msgId = $msgId;
      $reply->userId = $userId;
      $reply->email = $email;
      $reply->message = $message;

      $data = array(
      'username' => $username,
      'message' => $message
      );

      if($reply->save()){

        Mail::to($email)->send(new replyMail($data));
        return response()->json([
                'condition' => 'true',
                'message' => 'Your message successfully sent'
              ]);
      }else{
        return response()->json([
                'condition' => 'false',
                'message' => 'There is an error!'
              ]);
      }


    }
    public function showInbox(Request $request){
      $msgId = $request->messageId;
      $reply = Reply::where('msgId', $msgId)->orderBy('replyId', 'ASC')->get();

      foreach ($reply as $data) {
        $userId = $data->userId;
        $sender = User::where('userId', $userId)->get();

        foreach ($sender as $info) {


        ?>
            <!-- ============Replies========= -->
              <div class="col-sm-10 col-md-10 col-lg-10 offset-md-1 offset-lg-1 myReply">
                    <div class="row">
                      <div class="col-sm-12 col-md-7 col-lg-8">
                      <b><?php echo ucwords($info->username);?></b> <span class="mEmail"><span class="mEmail"><b>From</b>: showforce_s@yahoo.com </span>
                      </div>

                      <div class="col-sm-12 col-md-5 col-lg-4">
                        <span class="mDate"><?php echo date('F d, Y | h:i:s a', strtotime($data->created_at)); ?>&nbsp;&nbsp;&nbsp; <i class="fa fa-reply-all"></i></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <span class="mEmail"><b>To</b>: <?php echo $data->email; ?></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-10 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                        <br>
                        <p class="mText"><?php echo $data->message; ?></p>
                      </div>
                    </div>
              </div>
          <!-- ================================== -->
        <?php
        }
      }


    }


}

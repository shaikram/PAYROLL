{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer ">


        @csrf
        {{ csrf_field() }}
          <div class="card" style="margin-left:15%;">
              <div class="card-header">
                <center>
                  <span class="m_header">Change Password</span>
                </center>
              </div>
              <div class="card-body">
                <center>
                <form class="confirmForm" id="confirmPass"  method="post">
                  <input type="password" id="confirm" class="form-control" name="checkPass" placeholder="Confirm your password">
                  <input type="hidden" name="id" value="{{ $row->userId }}">
                  <br><br>
                  <input type="submit" class="btn btn-success" name="" value="Confirm">
                </form>
                <form class="confirmForm chgPass" id="changePass"  method="post">
                  <input type="password" id="pass" class="form-control" name="password" placeholder="New password"><br>
                  <input type="password" id="cpass" class="form-control" placeholder="Confirm your password">
                  <input type="hidden" name="id" value="{{ $row->userId }}">
                  <br><br>
                  <input type="submit" class="btn btn-success" name="" value="Confirm">
                </form>
              </center>
              </div>
              <div class="card-footer text-muted text-right">
                &copy; ShowForce Security Agency
              </div>
          </div>



  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')
<script type="text/javascript">
$(document).ready(function(){
  var changePassForm = document.getElementById('changePass');
  var confirmPassForm = document.getElementById('confirmPass');

  $('#confirmPass').submit(function(e){
    e.preventDefault();
    var confirm = document.getElementById('confirm').value;


    if(confirm.length == 0){
      alert("Required Field!");
      return false;
    }else{
      // =======After passing Validation send the data to server========/
          $.ajax({
                url:"confirm-pass",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"post",
                async:false,
                data:new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                   // console.log(Response);
                   if(data.condition == 'false'){
                     alert(data.message);
                     confirm.focus();

                     return false;
                   }else{
                     alert(data.message);
                     changePassForm.style.display = "block";
                     confirmPassForm.style.display = "none";
                     // window.location = "admin-pass";
                   }


                }
           });
     //=================================================================================//
    }

  });
  // ================================================================================//
  $('#changePass').submit(function(e){
    e.preventDefault();
    var pass = document.getElementById('pass').value;
    var cpass = document.getElementById('cpass').value;

    if(pass.length == 0){
      alert("Required Field!");
      pass.focus();

      return false;
    }if(cpass.length == 0){
      alert("Required Field!");
      cpass.focus();

      return false;
    }if(pass != cpass){
      alert("Password doesn't match!");
      cpass.focus();

      return false;
    }else{
      // =======After passing Validation send the data to server========/
          $.ajax({
                url:"change-pass",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"post",
                async:false,
                data:new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                   // console.log(Response);
                   if(data.condition == 'false'){
                     alert(data.message);

                     return false;
                   }else{
                     alert(data.message);
                     window.location = "admin-pass";
                   }


                }
           });
     //=================================================================================//
    }

  });

});
</script>



























                                                                                                                                                                                                                                                            {{--  --}}

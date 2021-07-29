{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 userInfoDiv ">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12">
                      <h3>Edit Profile</h3>
                </div>
              </div>

            </div>
            <div class="card-body">
              <form class="row" id="updateEmp" action="{{URL::asset('admin/edit/profile-modify')}}" method="post">
                @csrf
                {{ csrf_field() }}
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="d-sm-flex d-lg-inline-flex justify-content-lg-between" style="width:100%;">
                    <div class="p-2">
                      <label class="text-secondary"><i>First Name:</i></label> <br>
                      <input type="text" id="af1" class="form-control" maxlength="15" name="input1" value="{{ $res->fname }}" placeholder="First Name">
                    </div>
                    <div class="p-2">
                      <label class="text-secondary"><i>Middle Name:</i></label> <br>
                      <input type="text" id="af2" class="form-control"  maxlength="15" name="input2" value="{{ $res->mname }}" placeholder="Middle Name">
                    </div>
                    <div class="p-2">
                      <label class="text-secondary"><i>Last Name:</i></label> <br>
                      <input type="text" id="af3" class="form-control"  maxlength="15" name="input3" value="{{ $res->lname }}" placeholder="Last Name"><br>
                    </div>
                  </div>
                  <div class="d-sm-flex d-lg-inline-flex justify-content-lg-between" style="width:100%;">
                    <div class="p-2">
                      <label class="text-secondary"><i>Contact No:</i></label> <br>
                      <input type="text" id="af4" class="form-control" name="input4" value="{{ $res->contactNo }}" placeholder="Contact No.">
                    </div>
                    <div class="p-2">
                      <label class="text-secondary"><i>Address:</i></label> <br>
                      <textarea name="input5" id="af5" rows="3"  maxlength="150" class="form-control" placeholder="Address...">{{ $res->address }}</textarea>
                    </div>
                    <div class="p-2">
                      <input type="hidden" name="id" value="{{ $res->empId }}">
                      <input type="hidden" name="uid" value="{{ $row->userId }}">
                    </div>
                  </div>

                  <div class="d-flex P-4 justify-content-center" style="width:100%;">
                      <button type="submit" class="btn btn-primary btn-lg btn-block"> SAVE </button>

                  </div>
                </div>
              </form>
            </div>
            <div class="card-footer text-muted text-right">
              &copy; ShowForce Security Agency
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')
<script type="text/javascript">
$(document).ready(function(){

  $('#updateEmp').submit(function(){

    for (var a = 1; a <= 5; a++) {

      var af = 'af'+a;
      var af_focus = document.getElementById(af);
      var valueInp = document.getElementById(af).value;
      var errorMsg = [
        "",
        "First Name",
        "Middle Name",
        "Last Name",
        "Contact Number",
        "Address"
      ];


      switch(true){
        case valueInp.length == 0:
            alert(errorMsg[a] + ' is required!');
            af_focus.focus();

            return false;
            break;

       case valueInp.length <= 2:
           alert(errorMsg[a] + ' must be atleast 3 or more string!');
           af_focus.focus();

           return false;
           break;
      }

    }

    });


  });
</script>


















{{--  --}}

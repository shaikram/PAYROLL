{{-- Navigation Page --}}
@include('dashboard/navbar')
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
              <form class="row" id="updateForm" method="post">
                @csrf
                {{ csrf_field() }}
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="d-sm-flex d-lg-inline-flex justify-content-lg-between" style="width:100%;">
                    <div class="p-2">
                      <label class="text-secondary"><i>First Name:</i></label> <br>
                      <input type="text" id="af1" class="form-control" maxlength="15" name="input1" value="{{ $row->firstName }}" placeholder="First Name">
                    </div>
                    <div class="p-2">
                      <label class="text-secondary"><i>Middle Name:</i></label> <br>
                      <input type="text" id="af2" class="form-control"  maxlength="15" name="input2" value="{{ $row->middleName }}" placeholder="Middle Name">
                    </div>
                    <div class="p-2">
                      <label class="text-secondary"><i>Last Name:</i></label> <br>
                      <input type="text" id="af3" class="form-control"  maxlength="15" name="input3" value="{{ $row->lastName }}" placeholder="Last Name"><br>
                    </div>
                  </div>
                  <div class="d-sm-flex d-lg-inline-flex justify-content-lg-between" style="width:100%;">
                    <div class="p-2">
                      <label class="text-secondary"><i>Contact No:</i></label> <br>
                      <input type="number" id="af4" class="form-control"  maxlength="11" name="input4" value="{{ $row->contactNo }}" placeholder="Contact No.">
                    </div>
                    <div class="p-2">
                      <label class="text-secondary"><i>Address:</i></label> <br>
                      <textarea name="input5" id="af5" rows="3"  maxlength="150" class="form-control" placeholder="Address...">{{ $row->address }}</textarea>
                    </div>
                    <div class="p-2">
                      <input type="hidden" name="id" value="{{ $row->userId }}">
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
<script type="text/javascript" src={{ asset("js/updateForm.js") }}></script>

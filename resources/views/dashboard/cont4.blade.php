{{-- Navigation Page --}}
@include('dashboard/navbar')
{{-- Content --}}
@if ($message = Session::get('error'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

@endif
<section class="content content_div">

  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-3 justify-content-center align-items-center">
        <center>

            <table class="user_tble">
              <tr>
                <td align="center">
                  <div class="profile_div">
                    <img src="photo/{{ $row->picture }}" class="profile_img">
                  </div>
                </td>
              </tr>
              <tr>
                <td align="center">
                  <span class="username">
                    {{ $row->username }}
                  </span>
                </td>
              </tr>
              <tr>
                <td align="center">
                  <span class="position">
                    {{ $row->position }}
                  </span>
                </td>
              </tr>
              <tr>
                <td align="center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Change Profile Picture
                      </button>
                        <form class="dropdown-menu p-4 dropdown-menu-right" action="change-image" method="post" enctype="multipart/form-data">
                          @csrf
                          {{ csrf_field() }}
                            <div class="form-group">
                              <label for="exampleDropdownFormEmail2">Choose Image</label>
                              <input type="file" class="form-control" accept="image/png, image/jpg, image/jpeg" name="profile_img" placeholder="" required>
                              <input type="hidden" name="id" value="{{ $row->userId }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                         </form>
                    </div>

                </td>
              </tr>
            </table>


      </center>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-9 userInfoDiv">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12">
                  <div class="d-flex justify-content-between">
                    <div class="p-2">
                      <h3>Personal Information</h3>
                    </div>
                    <div class="p-2">
                      <a href="edit-profile">
                        <i class="fa fa-edit fa-2x"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12">
                  <div class="d-flex justify-content-between">
                    <div class="p-2">
                      <label class="text-secondary"><i>First Name:</i></label> <br>
                      <span class="p2_info">{{ $row->firstName }}</span>
                    </div>
                    <div class="p-2">
                      <label class="text-secondary"><i>Middle Name:</i></label> <br>
                      <span class="p2_info">{{ $row->middleName }}</span>
                    </div>
                    <div class="p-2">
                      <label class="text-secondary"><i>Last Name:</i></label> <br>
                      <span class="p2_info">{{ $row->lastName }}</span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div class="mr-auto p-2">
                      <label class="text-secondary"><i>Position:</i></label> <br>
                      <span class="p2_info">{{ $row->position }}</span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div class="mr-auto p-2">
                      <label class="text-secondary"><i>Email:</i></label> <br>
                      <span class="p2_info">{{ $row->email }}</span>
                    </div>
                    <div class="mr-auto p-2">
                      <label class="text-secondary"><i>Contact No:</i></label> <br>
                      <span class="p2_info">{{ $row->contactNo }}</span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-around">
                    <div class="mr-auto p-2">
                      <label class="text-secondary"><i>Address:</i></label> <br>
                      <span class="p2_info">{{ $row->address }}</span>
                    </div>
                  </div>

                </div>
              </div>
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

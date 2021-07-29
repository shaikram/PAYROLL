{{-- Navigation Page --}}
@include('dashboard/nav2')
{{-- Content --}}
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('message') }}!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@elseif (session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('error') }}!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<section class="content content_div">
  <div class="container">
    @foreach ($info as $res)
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3 justify-content-center align-items-center">
          <center>

              <table class="user_tble">
                <tr>
                  <td align="center">
                    <div class="profile_div">
                      <img src="{{ URL::asset('photo/'.$res->picture.'') }}" class="profile_img">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <span class="username">
                      {{ $res->username }}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <span class="position">
                      {{ $res->position }}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if ($res->status == "active")
                          <div class="active bg-success"></div> &nbsp; Active
                        @else
                          <div class="deactive bg-secondary"></div> &nbsp; Deactivated
                        @endif
                      </button>
                        <form class="dropdown-menu p-4 dropdown-menu-right" action="../../change-status" method="post">
                            @csrf
                            {{ csrf_field() }}
                            <div class="form-group">
                              <label for="exampleDropdownFormEmail2">Choose action</label>
                              <select class="form-control" name="status">
                                @if ($res->status == "active")
                                  <option value="deactivate">Deactivate</option>
                                @else
                                  <option value="active">Activate</option>
                                @endif
                              </select>
                              <input type="hidden" name="id" value="{{ $res->userId }}">
                              <input type="hidden" name="position" value="{{ $res->position }}">
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
                        <span class="p2_info">{{ $res->firstName }}</span>
                      </div>
                      <div class="p-2">
                        <label class="text-secondary"><i>Middle Name:</i></label> <br>
                        <span class="p2_info">{{ $res->middleName }}</span>
                      </div>
                      <div class="p-2">
                        <label class="text-secondary"><i>Last Name:</i></label> <br>
                        <span class="p2_info">{{ $res->lastName }}</span>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>Position:</i></label> <br>
                        <span class="p2_info">{{ $res->position }}</span>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>Email:</i></label> <br>
                        <span class="p2_info">{{ $res->email }}</span>
                      </div>
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>Contact No:</i></label> <br>
                        <span class="p2_info">{{ $res->contactNo }}</span>
                      </div>
                    </div>
                    <div class="d-flex justify-content-around">
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>Address:</i></label> <br>
                        <span class="p2_info">{{ $res->address }}</span>
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
    @endforeach
  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')

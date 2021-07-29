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
      <div class="col-sm-12 col-md-12 col-lg-2">
        <a href="{{URL::asset('admin/'.$res->empId.'/employee-profile')}}" class="empNav empActive"><i class="fa fa-info fa-lg"></i> Personal Info</a>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-10">
        <a href="{{URL::asset('admin/'.$res->empId.'/employee-salary')}}" class="empNav"><i class="fa fa-dollar-sign fa-lg"></i> Salaries</a>
      </div>
      <br><br><br>
    </div>

      <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12 userInfoDiv">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6 col-md-12 col-lg-12">
                    <div class="d-flex justify-content-between">
                      <div class="p-2">
                        <h3>{{ $res->username }}</h3>
                      </div>
                      <div class="p-2">
                        <a href="{{URL::asset('admin/'.$res->empId.'/edit-profile')}}">
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
                        <span class="p2_info">{{ $res->fname }}</span>
                      </div>
                      <div class="p-2">
                        <label class="text-secondary"><i>Middle Name:</i></label> <br>
                        <span class="p2_info">{{ $res->mname }}</span>
                      </div>
                      <div class="p-2">
                        <label class="text-secondary"><i>Last Name:</i></label> <br>
                        <span class="p2_info">{{ $res->lname }}</span>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>Designation:</i></label> <br>
                        <span class="p2_info">{{ $res->designation }}</span>
                      </div>
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>Status:</i></label> <br>
                        @if ($res->status == "0")
                          <span class="p2_info text-success">Undeployed</span>
                        @else
                          <span class="p2_info text-danger">Deployed</span>
                        @endif

                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>SSS No:</i></label> <br>
                        <span class="p2_info">{{ $res->sss }}</span>
                      </div>
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>Pag-ibig No:</i></label> <br>
                        <span class="p2_info">{{ $res->hmdf }}</span>
                      </div>
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>Philhealth No:</i></label> <br>
                        <span class="p2_info">{{ $res->philhealth }}</span>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>TIN No:</i></label> <br>
                        <span class="p2_info">{{ $res->tin }}</span>
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
                    <div class="d-flex justify-content-around">
                      <div class="mr-auto p-2">
                        <label class="text-secondary"><i>Added by:</i></label> <br>
                        @foreach ($data2 as $user)
                          <span class="p2_info text-secondary">{{ $user->username }}({{ $user->position }}) | {{ date('F d, Y | h:i:s a', strtotime($res->created_at)) }}</span>
                        @endforeach

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

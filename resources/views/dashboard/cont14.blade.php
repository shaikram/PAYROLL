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
                    <div class="clientProfile_div">
                      <img src="{{ URL::asset('client/'.$res->photo.'') }}" class="clientProfile_img">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td align="center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Change Picture
                      </button>
                        <form class="dropdown-menu p-4 dropdown-menu-right" action="{{URL::asset('admin/change-photo')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          {{ csrf_field() }}
                            <div class="form-group">
                              <label for="exampleDropdownFormEmail2">Choose Image</label>
                              <input type="file" class="form-control" accept="image/png, image/jpg, image/jpeg" name="client_img" placeholder="">
                              <input type="hidden" name="id" value="{{ $res->clientId }}">
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
                        <h3 class="text-primary">{{ $res->name }}</h3>
                      </div>
                      <div class="p-2">
                        <a href="{{ URL::asset('admin/'.$res->clientId.'/edit-client') }}">
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
                        <label class="text-secondary"><i>Added By:</i></label> <br>
                        @foreach ($data2 as $aaa)
                          <span class="p2_info">{{ $aaa->username }}</span> <span class="position">( {{ date('F d, Y | h:i:s a', strtotime($res->created_at)) }} )</span>
                        @endforeach

                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="p-2">
                        <label class="text-secondary"><i>Address:</i></label> <br>
                        <span class="p2_info">{{ $res->address }}</span>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="p-2">
                      <a href="{{ URL::asset('admin/'.$res->clientId.'/payroll') }}">
                       <span class="gtp_span"> Generate to payroll </span><i class="fa fa-arrow-right fa-lg"></i>
                      </a>
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
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12"><br></div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h2 class="text-success">Payroll</h2>
      </div>
      <?php $num=1; ?>
      @foreach ($payList as $res)
        <a href="{{ URL::asset('admin/'.$res->clientId.'/'.$res->from.'/'.$res->to.'/payroll-generate') }}" style="text-decoration:none;">
          <div class="listDiv col-sm-12 col-md-12 col-lg-12">
            <span>{{ $num }}.)  {{ date('F d, Y', strtotime($res->from)) }} - {{ date('F d, Y', strtotime($res->to)) }}</span>
          </div>
        </a>
        <?php $num++; ?>
      @endforeach

    </div>
  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')

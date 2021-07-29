{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer">

    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 p-2">
        <button type="button" class="btn btn-outline-primary" id="client_btn">
            <i class="fa fa-plus"></i> <b>Add Client</b>
        </button>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 p-2">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
      </div>
    </div>
    <form class="row gfrmDiv" id="client_col" action="upload-client" method="post" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}

      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfHeader">
        <i class="fa fa-address-card fa-lg text-success"></i> Add Client
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        Company Name <span class="text-danger">*</span><br>
        <input type="text" class="form-control" name="name" minlength="5" maxlength="50" required>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        Choose photo <span class="text-danger">*</span><br>
        <input type="file" class="form-control" name="images" accept="image/png, image/jpg, image/jpeg">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        Address <span class="text-danger">*</span><br>
        <textarea name="address" class="form-control" minlength="10" rows="8" cols="80" maxlength="200" required></textarea>
        <input type="hidden" name="uploader" value="{{ $row->userId }}">
      </div>

      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfDivBtn">
        <input type="submit" class="btn btn-outline-primary" name="" value="SUBMIT">
        <input type="reset" class="btn btn-outline-secondary" name="" value="CANCEL">
      </div>

    </form><br>

    <div class="row gfrmDiv">

      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfHeader">
        <i class="fa fa-user-secret fa-lg text-success"></i> Client's
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        <div class="row">
          <div class="member_head col-sm-3 col-md-12 col-lg-12 bg-light">
            <h5 class="font-weight-bold">Company Name</h5>
          </div>

        </div>
        {{-- ================List=========================== --}}
        @foreach ($data as $res)
            <div class="row">
              <div class="member_list col-sm-3 col-md-12 col-lg-12">
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <center>
                      <div class="cphoto_div">
                        <img src="../client/{{ $res->photo }}" class="cprofile_img">
                      </div>
                    </center>
                  </div>
                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <a href="{{ $res->clientId }}/client-profile" class="auname text-primary">
                      {{ ucwords($res->name) }}
                    </a>
                    <br><br>
                    <span class="apos p-2"><i class="fa fa-map-pin fa-lg text-danger"></i>&nbsp; {{ $res->address }}</span>
                  </div>
                </div>

              </div>

            </div>
        @endforeach
        {{-- ========================End list=========================== --}}
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">

      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfDivBtn">
        <span class="text-secondary">&copy; ShowForce Security Agency</span>
      </div>
    </div>

  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')

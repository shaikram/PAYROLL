{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer">

    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 p-2">
        <button type="button" class="btn btn-outline-primary" id="client_btn">
            <i class="fa fa-plus"></i> <b>Add Posting</b>
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
    <form class="row gfrmDiv" id="client_col" action="posting" method="post" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}

      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfHeader">
        <i class="fa fa-address-card fa-lg text-success"></i> Create Posting
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        Company Name <span class="text-danger">*</span><br>
        <select class="form-control" name="client">
          @foreach ($client as $res)
            <option value="{{ ucwords($res->clientId) }}">{{ ucwords($res->name) }}</option>
          @endforeach
        </select>

      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        No. of Guards <span class="text-danger">*</span><br>
        <input type="number" class="form-control" name="no_grds" minlength="1" maxlength="150" required>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">

      </div>

      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfDivBtn">
        <input type="submit" class="btn btn-outline-primary" name="" value="SUBMIT">
        <input type="reset" class="btn btn-outline-secondary" name="" value="CANCEL">
      </div>

    </form><br>

    <div class="row gfrmDiv">

      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfHeader">
        <i class="fa fa-user-secret fa-lg text-success"></i> Client's Payroll
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
                    <a href="{{URL::asset('admin/'.$res->clientId.'/payroll')}}" class="auname text-primary">
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

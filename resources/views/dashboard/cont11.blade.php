{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer">

    <div class="row gfrmDiv" action="upload-photo" method="post" enctype="multipart/form-data">

      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfHeader">
        <i class="fa fa-user-secret fa-lg text-warning"></i> Admin's
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        <div class="row">
          <div class="member_head col-sm-3 col-md-9 col-lg-9 bg-light">
            <h5 class="font-weight-bold">Name</h5>
          </div>
          <div class="member_heads col-sm-3 col-md-3 col-lg-3 bg-light">
            <h5 class="font-weight-bold">Status</h5>
          </div>
        </div>
        {{-- ================List=========================== --}}
        @foreach ($data2 as $res)
            <div class="row">
              <div class="member_list col-sm-3 col-md-9 col-lg-9">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{ $res->empId }}/employee-profile" class="auname text-primary">
                      {{ ucwords($res->username) }}
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-1 col-lg-1">

                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11 p-2">
                    <span class="apos"><i class="fa fa-briefcase fa-lg text-secondary"></i>&nbsp; {{ $res->designation }}</span>
                  </div>
                </div>
                <div class="row for_mobile_stat">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    @if ($res->status != 0)
                      <div class="deactive bg-secondary"></div> &nbsp; Deployed
                    @else
                      <div class="active bg-success"></div> &nbsp; Undeployed
                    @endif
                    <br>
                  </div>
                </div>
              </div>
              <div class="member_lists col-sm-3 col-md-3 col-lg-3">
                <br>
                @if ($res->status != 0)
                  <div class="deactive bg-secondary"></div> &nbsp; Deployed
                @else
                  <div class="active bg-success"></div> &nbsp; Undeployed
                @endif
              </div>
            </div>
        @endforeach
        {{-- =========================DEACTIVATED======================= --}}
        @foreach ($data as $res)
            <div class="row">
              <div class="member_list col-sm-3 col-md-9 col-lg-9">
                <div class="row">

                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="{{ $res->empId }}/employee-profile" class="auname text-primary">
                      {{ ucwords($res->username) }}
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-1 col-lg-1">

                  </div>
                  <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 p-2">
                    <span class="apos"><i class="fa fa-briefcase fa-lg text-secondary"></i>&nbsp; {{ $res->designation }}</span>
                  </div>
                </div>
                <div class="row for_mobile_stat">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    @if ($res->status != 1)
                      <div class="active bg-success"></div> &nbsp; Undeployed
                    @else
                      <div class="deactive bg-secondary"></div> &nbsp; Deployed
                    @endif
                    <br>
                  </div>
                </div>
              </div>
              <div class="member_lists col-sm-3 col-md-3 col-lg-3">
                <br>
                @if ($res->status != 1)
                  <div class="active bg-success"></div> &nbsp; Undeployed
                @else
                  <div class="deactive bg-secondary"></div> &nbsp; Deployed
                @endif
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

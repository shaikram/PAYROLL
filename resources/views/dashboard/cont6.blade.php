{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer">

    <div class="row gfrmDiv">

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
        @foreach ($data as $res)
            <div class="row">
              <div class="member_list col-sm-3 col-md-9 col-lg-9">
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <center>
                      <div class="aprofile_div">
                        <img src="../photo/{{ $res->picture }}" class="aprofile_img">
                      </div>
                    </center>
                  </div>
                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <a href="{{ $res->userId }}/member-profile" class="auname text-primary">
                      {{ ucwords($res->username) }}
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                  </div>
                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <span class="apos"><i class="fa fa-briefcase fa-lg text-secondary"></i>&nbsp; {{ $res->position }}</span>
                  </div>
                </div>
                <div class="row for_mobile_stat">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    @if ($res->status == "active")
                      <div class="active bg-success"></div> &nbsp; Active
                    @else
                      <div class="deactive bg-secondary"></div> &nbsp; Deactivated
                    @endif
                    <br>
                  </div>
                </div>
              </div>
              <div class="member_lists col-sm-3 col-md-3 col-lg-3">
                <br>
                @if ($res->status == "active")
                  <div class="active bg-success"></div> &nbsp; Active
                @else
                  <div class="deactive bg-secondary"></div> &nbsp; Deactivated
                @endif
              </div>
            </div>
        @endforeach
        {{-- =========================DEACTIVATED======================= --}}
        @foreach ($data2 as $res)
            <div class="row">
              <div class="member_list col-sm-3 col-md-9 col-lg-9">
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <center>
                      <div class="aprofile_div">
                        <img src="../photo/{{ $res->picture }}" class="aprofile_img">
                      </div>
                    </center>
                  </div>
                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <a href="{{ $res->userId }}/member-profile" class="auname text-primary">
                      {{ ucwords($res->username) }}
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                  </div>
                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <span class="apos"><i class="fa fa-briefcase fa-lg text-secondary"></i>&nbsp; {{ $res->position }}</span>
                  </div>
                </div>
                <div class="row for_mobile_stat">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    @if ($res->status == "active")
                      <div class="active bg-success"></div> &nbsp; Active
                    @else
                      <div class="deactive bg-secondary"></div> &nbsp; Deactivated
                    @endif
                    <br>
                  </div>
                </div>
              </div>
              <div class="member_lists col-sm-3 col-md-3 col-lg-3">
                <br>
                @if ($res->status == "active")
                  <div class="active bg-success"></div> &nbsp; Active
                @else
                  <div class="deactive bg-secondary"></div> &nbsp; Deactivated
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

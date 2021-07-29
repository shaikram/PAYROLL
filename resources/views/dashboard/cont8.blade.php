{{-- Navigation Page --}}
@include('dashboard/navbar')
{{-- Content --}}

<section class="content content_div">

  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 justify-content-center align-items-center">
        <center>
          <div class="card">
            <div class="card-header text-left">
              <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12">
                      <h3><i class="fa fa-envelope text-primary"></i> Inbox</h3>
                </div>
              </div>

            </div>
            <div class="card-body text-left inboxBody">
              <div class="row">
                {{-- UNREAD --}}
                @foreach ($unread as $res)
                  <a href="messages/{{ $res->msgId }}/{{ $row->userId }}" class="inbLink">
                      <div class="col-sm-12 col-md-12 col-lg-12 inboxRow">
                        <div class="row">
                          <div class="col-sm-12 col-md-1 col-lg-1 text-right inbNum">
                            <i class="fa fa-eye-slash"></i>
                          </div>
                          <div class="col-sm-12 col-md-4 col-lg-3">
                              <b>{{ $res->name }}</b>
                          </div>
                          <div class="col-sm-12 col-md-7 col-lg-8 inbMDiv">
                            <b>{{ $res->subject }}</b> - <span class="pInb">{{ $res->message }}</span>
                          </div>
                        </div>
                      </div>
                    </a>
                @endforeach

                {{-- READED --}}
                @foreach ($read as $res)
                    <a href="messages/{{ $res->msgId }}" class="inbLink">
                        <div class="col-sm-12 col-md-12 col-lg-12 inboxRows">
                          <div class="row">
                            <div class="col-sm-12 col-md-1 col-lg-1 text-right inbNum">
                              <i class="fa fa-eye"></i>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                {{ $res->name }}
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-8 inbMDiv">
                              {{ $res->subject }} - <span class="pInb">{{ $res->message }}</span>
                            </div>
                          </div>
                        </div>
                      </a>
                @endforeach
              </div>
            </div>
            <div class="card-footer text-muted text-right">
              &copy; ShowForce Security Agency
            </div>
          </div>

      </center>
      </div>

    </div>
  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')

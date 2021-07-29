{{-- Navigation Page --}}
@include('dashboard/nav1')
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
                      <h3><i class="fa fa-user text-secondary"></i> {{ ucwords($res->subject) }}</h3>
                </div>
              </div>

            </div>
            <div class="card-body text-left inboxBody">
                <div class="row">
                  <input type="hidden" id="messageId" name="msgId" value="{{ $res->msgId }}">
                  <div class="col-sm-12 col-md-8 col-lg-9">
                  <b>{{ ucwords($res->name) }}</b> <span class="mEmail"><b>From</b>: {{ $res->email }} </span>
                  </div>

                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <span class="mDate">{{ date('F d, Y | h:i:s a', strtotime($res->created_at)) }}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <span class="mEmail"><b>To</b>: showforce_s@yahoo.com</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-10 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                    <br>
                    <p class="mText">{{ $res->message }}</p>
                  </div>

                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="row" id="inboxRows">

                    </div>
                  </div>

                  <div class="col-sm-10 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                    <br>
                    <button type="button" class="btn btn-outline-secondary" id="reply_btn">
                        <i class="fa fa-reply-all"></i> <b>Reply</b>
                    </button>
                  </div>
                  <div class="col-sm-10 col-md-10 col-lg-10 offset-md-1 offset-lg-1" id="reply_col">
                    <br>
                    <form id="replyForm" method="post">
                      @csrf
                      {{ csrf_field() }}
                      <input type="hidden" name="msgId" value="{{ $res->msgId }}">
                      <input type="hidden" name="userId" value="{{ $row->userId }}">
                      <input type="hidden" name="email" value="{{ $res->email }}">
                      <input type="hidden" name="username" value="{{ $res->name }}">
                      <textarea name="message" id="replyText" placeholder="Mail Delivery Subsystem..." class="form-control" rows="5" cols="50" minlength="10" maxlegth="400" required></textarea>
                      <br>&nbsp; <button type="submit" class="btn btn-primary" name="button"> <b>Send</b> </button>
                    </form>
                  </div>

                  @foreach ($data2 as $user)
                    <div class="col-sm-12 col-md-12 col-lg-12 ">
                      <br>
                      <span class="mEmail">First seen by: {{ $user->username }}</span>
                    </div>
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
<script type="text/javascript" src={{ asset("js/replyForm.js") }}></script>

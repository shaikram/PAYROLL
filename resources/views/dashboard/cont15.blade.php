{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 userInfoDiv ">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12">
                      <h3>{{ $res->name }}</h3>
                </div>
              </div>

            </div>
            <div class="card-body">
              <form class="row" id="updateC" method="post">
                @csrf
                {{ csrf_field() }}
                <div class="col-sm-12 col-md-12 col-lg-12">
                      <label class="text-secondary"><i>Company Name:</i></label> <br>
                      <input type="text" id="af1" class="form-control" minlength="5" maxlength="30" name="input1" value="{{ $res->name }}" placeholder="Company Name" required>
                    <div class="p-2">
                      <input type="hidden" name="id" value="{{ $res->clientId }}">
                    </div>

                  <div class="col-sm-12 col-md-12 col-lg-12">
                      <label class="text-secondary"><i>Address:</i></label> <br>
                      <textarea name="input2" id="af5" rows="8" colspan="50" minlength="10"  maxlength="200" class="form-control" placeholder="Address..." required>{{ $res->address }}</textarea>
                  </div><br>

                  <div class="d-flex P-4 justify-content-center" style="width:100%;">
                      <button type="submit" class="btn btn-primary btn-lg btn-block"> SAVE </button>

                  </div>
                </div>
              </form>
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

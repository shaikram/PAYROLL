<div class="container-fluid client">
    <center>
        <div class="centerdiv">
          <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-start">
                  <span class="servh4">CLIENT</span>
                </div>
                <div class="d-flex justify-content-start">
                  <div class="h4line"></div>
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12 ">
                <div class="row">
                  @foreach ($client as $res)
                    @if ($res->photo != 'unknown.png')
                      <div class="col-sm-12 col-md-4 col-lg-4 cl_div">
                        <img src="{{ URL::asset('client/'.$res->photo.'') }}" class="cl_img" width="250px" height="auto" >
                      </div>
                    @endif
                  @endforeach

                </div>
              </div>
        </div>
      </div>
   </center>
</div>

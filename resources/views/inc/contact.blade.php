<div class="container-fluid contact">
  <center>
      <div class="centerdiv">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="d-flex justify-content-start">
                <span class="conth4">CONTACT</span>
              </div>
              <div class="d-flex justify-content-start">
                <div class="ch4line"></div>
              </div>
            </div>
            <form class="col-sm-12 col-md-12 col-lg-12" id="inqForm" method="post">
              @csrf
              {{ csrf_field() }}
              <div class="alert alert-success alert-dismissible fade show errorP" id="errorP" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="alert alert-danger alert-dismissible fade show errorD" id="errorD" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="d-flex p-2"><br></div>
                <div class="d-inline-flex flex-column justify-content-center">
                  <div class="p-2">
                    <input type="email" id="inp1" class="form_input" placeholder="Email" maxlength="25" name="inp1">
                  </div>
                  <div class="p-2">
                    <input type="text" id="inp2" class="form_input" placeholder="Name" maxlength="25" name="inp2">
                  </div>
                  <div class="p-2">
                    <input type="text" id="inp3" class="form_input" placeholder="Subject" maxlength="25" name="inp3">
                  </div>
                </div>
                <div class="d-inline-flex p-2 justify-content-center">
                  <textarea name="inp4" id="inp4" class="form_text" placeholder="Message..." rows="8" cols="30"></textarea>
                </div>
                <div class="d-flex p-2 justify-content-center">
                  <button type="submit" class="btn btn-primary btn-lg btn-block"><b>SEND</b></button>
                </div>
            </form>
      </div>
  </center>
</div>

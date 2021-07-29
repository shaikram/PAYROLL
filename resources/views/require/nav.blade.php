<div class="container-fluid navdiv">
  <center>
    <div class="centerdiv">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="d-flex" >
                <div class="p-2 bardiv" style="z-index:100;">
                  <a href="javascript:void(0);" id="ham_bar" onclick="mobilebar()">
                    <i class="fa fa-bars fa-2x fabars"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="d-flex justify-content-end">

                <img src="{{ asset("images/SFSA_LOGO.png") }}" class="logoSFSA">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8">
              <div class="d-flex p-2 srchform">
                <div class="seacrhdiv">
                  <form class="input-group" action="search" method="post">
                    @csrf
                    {{ csrf_field() }}
                     <div class="form-outline">
                       <input type="search" name="search" id="form1" placeholder="Search..." class="form-control" required/>
                     </div>
                     <button type="submit" class="btn btn-primary">
                       GO
                     </button>
                   </form>
                </div>
              </div>
              <div class="d-flex p-2">
                <div class="navigationdiv">
                  <ul>
                    <li class="navs1"><a href="/">HOME</a></li>
                    <li class="navs2"><a href="{{URL::asset('profile')}}">PROFILE</a></li>
                    <li class="navs3"><a href="{{URL::asset('services')}}">SERVICES</a></li>
                    <li class="navs4"><a href="{{URL::asset('equipment')}}">EQUIPMENT</a></li>
                    <li class="navs5"><a href="{{URL::asset('clients')}}">CLIENT</a></li>
                    <li class="navs6"><a href="{{URL::asset('management')}}">MANAGEMENT</a></li>
                    <li class="navs7"><a href="{{URL::asset('gallery')}}">GALLERY</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </center>
</div>

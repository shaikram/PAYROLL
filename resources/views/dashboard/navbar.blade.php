<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
  <a class="navbar-brand" href="#">ShowForce Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto w-100 justify-content-end">
      <li class="nav-item profile_m" id="nav_item1">
        <div class="row">
          <div class="col-sm-3 col-md-3 col-lg-3 ">
            <div class="d-flex">
              <div class="p-1">
                <div class="mprofile_div">
                  <img src="photo/{{ $row->picture }}" class="profile_img">
                </div>
              </div>
              <div class="p-1">
                <a class="nav-link" href="../user-profile">
                  {{ $row->firstName }}<span class="sr-only">(current)</span>
                </a>
              </div>
            </div>
          </div>

        </div>


      </li>
      <li class="nav-item" id="nav_item1">
        <a class="nav-link" href="../admin">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item profile_d" id="nav_item3">
        <a class="nav-link" href="../user-profile">Profile</a>
      </li>
      <li class="nav-item" id="nav_item2">
        <a class="nav-link" href="../messages">Messages</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Action
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light" href="#">Action</a>
          <a class="dropdown-item text-light" href="../admin/admin-pass">Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-light" href="{{ url('logout') }}">Logout</a>
        </div>
      </li>
    </ul>
  </div>
  </div>
</nav>

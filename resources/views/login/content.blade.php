<div class="row fluid row1">
  <div class="col-sm-12 col-md-12 col-lg-12 col1">
    <center>
      @if (isset(Auth::user()->email))
          <script type="text/javascript">
            window.location = "checklogin";
          </script>
        @endif
      @if ($message = Session::get('error'))
        <div class="alert alert-danger">
          <strong>{{ $message }}</strong>
        </div>
      @endif
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form class="row loginForm" action="{{ url('checklogin') }}" method="post">
        {{ csrf_field() }}
        @csrf
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="d-flex justify-content-center">
            <img src="{{ asset("images/SFSA_LOGO.png") }}" class="logo" width="150px" height="auto">
          </div>
          <div class="d-flex justify-content-center">
            <input type="email" class="inputs" name="email" placeholder="Email">
          </div>
          <div class="d-flex justify-content-center">
            <input type="password" class="inputs" name="password" placeholder="Password">
          </div>
          <div class="d-flex justify-content-center">
            <input class="btn btn-primary input-btn" type="submit" value="Log In">
          </div>
        </div>
      </form>
    </center>

  </div>
</div>

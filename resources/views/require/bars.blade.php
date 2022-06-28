<div class="barsdiv" id="mob_menu">
    <div class="bars_left ">
      <ul>
        <a>
        <li>
          <form class="" action="search" method="post">
            @csrf
            {{ csrf_field() }}
            <input type="text" class="serchinp" placeholder="Search..." name="search" required><input type="submit" class="serchbtn" value="Go">
          </form>
        </li>
        </a>
        <a href="/">
          <li><span class="barspan">Home</span></li>
        </a>
        <a href="{{URL::asset('profile')}}">
          <li><span class="barspan">Profile</span></li>
        </a>
        <a href="{{URL::asset('services')}}">
          <li><span class="barspan">Services</span></li>
        </a>
        <a href="{{URL::asset('equipment')}}">
          <li><span class="barspan">Equipment</span></li>
        </a>
        <a href="{{URL::asset('clients')}}">
          <li><span class="barspan">Client</span></li>
        </a>
        <a href="{{URL::asset('management')}}">
          <li><span class="barspan">Management</span></li>
        </a>
        <a href="{{URL::asset('gallery')}}">
          <li><span class="barspan">Gallery</span></li>
        </a>
      </ul>
    </div>
    <div class="bars_right">
      <div class="mob_close">
        <a href="javascript:void(0);" class="close_bar" onclick="closemenu()">
          <i class="fa fa-times fa-2x"></i>
        </a>
      </div>
    </div>

</div>

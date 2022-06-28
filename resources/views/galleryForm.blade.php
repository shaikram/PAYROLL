@if (session('email') !== NULL)
      @extends('layout.app')
      @section('title')
      GALLERY | SHOWFORCE SECURITY AGENCY
      @endsection
      @section('links')
        @include('dashboard/links')
        <style type="text/css">
        		.fancybox-custom .fancybox-skin {
        			box-shadow: 0 0 50px #222;
        		}

        	</style>
      @endsection
      @section('content')
        @foreach ($data1 as $row)
            @include('dashboard/cont2')
            @include('dashboard/footer1')
        @endforeach
      @endsection
      {{-- @section('script')
        @include('dashboard/script')
      @endsection --}}
  @elseif (session('email') == NULL)
    <script type="text/javascript">
        window.location = "../login";
    </script>
  @else
    <script type="text/javascript">
        window.location = "../login";
    </script>
  @endif

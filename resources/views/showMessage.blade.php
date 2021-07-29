@if (session('email') !== NULL)
      @extends('layout.app')
      @foreach ($message as $res)
      @section('title')
      {{ ucwords($res->name) }} | SHOWFORCE SECURITY AGENCY
      @endsection
      @section('links')
        @include('dashboard/links')
      @endsection
      @section('content')
      @foreach ($data1 as $row)
            @include('dashboard/cont9')
            @include('dashboard/footer1')
      @endforeach
      @endsection
      @endforeach
      {{-- @section('script')
        @include('dashboard/script')
      @endsection --}}
  @elseif (session('email') == NULL)
    <script type="text/javascript">
        window.location = "login";
    </script>
  @else
    <script type="text/javascript">
        window.location = "login";
    </script>
  @endif

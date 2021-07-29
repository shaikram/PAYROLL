@if (session('email') !== NULL)
      @extends('layout.app')
      @section('title')
      LIST OF MEMBERS | SHOWFORCE SECURITY AGENCY
      @endsection
      @section('links')
        @include('dashboard/links')
      @endsection
      @section('content')
        @foreach ($data1 as $row)
          @if ($row->restriction == 'super admin')
            @include('dashboard/cont6')
            @include('dashboard/footer1')

          @elseif ($row->restriction == 'admin')
            <script type="text/javascript">
                window.location = "../login";
            </script>
          @endif
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

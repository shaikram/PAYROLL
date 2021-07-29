@extends('layout.app')
@section('title')
RESULT | SHOWFORCE SECURITY AGENCY
@endsection
@section('links')
  @include('require/links')

@endsection
@section('content')
  @include('require/bars')
  <div class="content">
    @include('require/nav')
    @include('require/containerr')
    @include('require/footer')
  </div>
@endsection
@section('scripts')
  @include('require/scripts')
  <script type="text/javascript">
  $(document).ready(function(){
    var result = document.getElementById('result').value;

        $("html, body").animate({
          scrollTop:$("#scroll" + result).offset().top
        },200);
  });


  </script>
@endsection

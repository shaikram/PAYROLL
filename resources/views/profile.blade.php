@extends('layout.app')
@section('title')
PROFILE | SHOWFORCE SECURITY AGENCY
@endsection
@section('links')
  @include('require/links')
  <style media="screen">
    .navs2{
      padding: 5px 10px 5px 10px;
      background: #1491d2;
      border-radius: 20px;
      margin-top: -5px;
      color:#fff;
    }
  </style>
@endsection
{{-- <a href="javascript:void(0);" id="ham_bar" style="position:sticky;" onclick="mobilebar()">
  <i class="fa fa-bars fa-2x fabars"></i>
</a> --}}
@section('content')
  @include('require/content')
@endsection
@section('scripts')
  @include('require/scripts')
@endsection

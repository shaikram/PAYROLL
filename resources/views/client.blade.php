@extends('layout.app')
@section('title')
CLIENT | SHOWFORCE SECURITY AGENCY
@endsection
@section('links')
  @include('require/links')
  <style media="screen">
    .navs5{
      padding: 5px 10px 5px 10px;
      background: #1491d2;
      border-radius: 20px;
      margin-top: -5px;
      color:#fff;
    }
  </style>
@endsection
@section('content')
  @include('require/bars')
  <div class="content">
    @include('require/nav')
    @include('require/containerc')
    @include('require/footer')
  </div>
@endsection
@section('scripts')
  @include('require/scripts')
@endsection

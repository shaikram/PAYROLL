@extends('layout.app')
@section('title')
SHOWFORCE SECURITY AGENCY
@endsection
@section('links')
  @include('inc/links')
  <style media="screen">
    .navs1{
      padding: 5px 10px 5px 10px;
      background: #1491d2;
      border-radius: 20px;
      color:#fff;
    }
  </style>
@endsection
@section('content')
  @include('inc/content')
@endsection
@section('scripts')
  @include('inc/script')
@endsection

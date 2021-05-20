@extends('layout.app')
@section('title')
MANAGEMENT | SHOWFORCE SECURITY AGENCY
@endsection
@section('links')
  @include('require/links')
@endsection
@section('content')
  @include('require/bars')
  <div class="content">
    @include('require/nav')
    @include('require/containerm')
    @include('require/footer')
  </div>
@endsection
@section('scripts')
  @include('require/scripts')
@endsection

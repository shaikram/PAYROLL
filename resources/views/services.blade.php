@extends('layout.app')
@section('title')
SERVICES | SHOWFORCE SECURITY AGENCY
@endsection
@section('links')
  @include('require/links')
@endsection
@section('content')
  @include('require/bars')
  <div class="content">
    @include('require/nav')
    @include('require/containers')
    @include('require/footer')
  </div>
@endsection
@section('scripts')
  @include('require/scripts')
@endsection

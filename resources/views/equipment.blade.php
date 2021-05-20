@extends('layout.app')
@section('title')
EQUIPMENT | SHOWFORCE SECURITY AGENCY
@endsection
@section('links')
  @include('require/links')
@endsection
@section('content')
  @include('require/bars')
  <div class="content">
    @include('require/nav')
    @include('require/containere')
    @include('require/footer')
  </div>
@endsection
@section('scripts')
  @include('require/scripts')
@endsection

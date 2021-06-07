{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  Hi, <strong>{{ session('email') }}!</strong> welcome to admin dashboard.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<section class="content content_div">
  <div class="container">
    <br>
  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')

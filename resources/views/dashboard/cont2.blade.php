{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer">

    <form class="row gfrmDiv" action="upload-photo" method="post" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
      @endif
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfHeader">
        <i class="fa fa-image fa-lg text-success"></i> Upload Picture
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        Choose Section <span class="text-danger">*</span><br>
        <select class="form-control" name="section" required>
          <option value="Showforce">Showforce</option>
          <option value="Meetings">Meetings</option>
          <option value="Accreditation">Accreditation</option>
          <option value="Vehicles">Vehicles</option>
        </select>
        <input type="hidden" name="uploader" value="{{ $row->userId }}">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        Choose photo <span class="text-danger">*</span><br>
        <input type="file" class="form-control" name="images[]" accept="image/png, image/jpg, image/jpeg" required multiple>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfDivBtn">
        <input type="submit" class="btn btn-outline-primary" name="" value="UPLOAD">
        <input type="reset" class="btn btn-outline-secondary" name="" value="CANCEL">
      </div>
    </form>

  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')

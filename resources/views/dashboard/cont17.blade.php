{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer">

    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 p-2">

      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 p-2">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
      </div>
    </div>
    <form class="row gfrmDiv" action="create-posting" method="post" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfHeader">
        @foreach ($client as $res)
          {{ $res->name }}
          <input type="hidden" name="client" value="{{ $res->clientId }}">
        @endforeach
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        <table class="g_table" width="100%" height="auto">
          <tr>
            <th colspan="3" class="posting_head">Choose {{ $nog }} Guards</th>
            <input type="hidden" id="limit" value="{{ $nog }}">
          </tr>
          <?php $a = 1;?>
          @foreach ($employee as $res)
            <tr>
              <td class="cbox">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="guard[]" value="{{ $res->empId }}">
              </td>
              <td>
                <h5 class="text-primary">{{ ucwords($res->fname." ".$res->mname." ".$res->lname) }}</h5>
                <span><b>Position: </b>{{ $res->designation }}</span>
              </td>
              <td>
                <p class="text-secondary pst_address"><b>Address:</b> {{ $res->address }}</p>
              </td>
            </tr>
            <?php $a++; ?>
          @endforeach
          <input type="hidden" name="uploader" value="{{ $row->userId }}">
        </table>


      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfDivBtn">
        <input type="submit" class="btn btn-outline-primary" name="" value="SUBMIT">
      </div>


    </form><br>



  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')
<script type="text/javascript">
$(document).ready(function(){
  var limit = document.getElementById('limit').value;

      $('input[type=checkbox]').on('change', function (e) {
        if ($('input[type=checkbox]:checked').length > limit) {
            $(this).prop('checked', false);
            alert("Only "+limit+" allowed!");
        }
      });
});
</script>

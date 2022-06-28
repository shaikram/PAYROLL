{{-- Navigation Page --}}
@include('dashboard/nav2')
{{-- Content --}}
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('message') }}!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@elseif (session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('error') }}!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<section class="content content_div">
  <div class="container">
    @foreach ($info as $res)
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-2">
        <a href="{{URL::asset('admin/'.$res->empId.'/employee-profile')}}" class="empNav"><i class="fa fa-info fa-lg"></i> Personal Info</a>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-10">
        <a href="{{URL::asset('admin/'.$res->empId.'/employee-salary')}}" class="empNav empActive"><i class="fa fa-dollar-sign fa-lg"></i> Salaries</a>
      </div>
      <br><br><br>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <table width="100%" height="auto" class="compensation">
          <thead>
            <tr>
              <td align="center" colspan="9" class="tbl_head">
                <span>{{ ucwords($res->username) }} Compensation Details</span>
              </td>
            </tr>
            <tr>
              <td align="center" class="tbl_head2">Company</td>
              <td align="center" class="tbl_head2">Pay Periods</td>
              <td align="center" class="tbl_head2">Duty</td>
              <td align="center" class="tbl_head2">Gross Pay</td>
              <td align="center" class="tbl_sss">sss</td>
              <td align="center" class="tbl_phil">Philhealth</td>
              <td align="center" class="tbl_hmdf">Pag-ibig</td>
              <td align="center" class="tbl_head2">Cash Bond</td>
              <td align="center" class="tbl_head2">Net Pay</td>
            </tr>
          </thead>
          <tbody>
            @if ($count == 0 )
              <tr>
                <td align="center" colspan="9" class="td_head2">
                  No Record
                </td>
              </tr>
              @else
                <?php $a = 1; ?>
                @foreach ($data2 as $result)
                  <tr>
                    <td class="td_head2" align="center">
                      {{ $result->name }}
                    </td>
                    <td class="td_head2" align="center">
                      {{ date('F d, Y', strtotime($result->from)) }} - {{ date('F d, Y', strtotime($result->to)) }}
                    </td>
                    <td class="td_head2" align="center">
                      {{ $result->duty }}
                      <input type="hidden" id="duty{{ $a }}" name="" value="{{ $result->duty }}">
                    </td>
                    <td class="td_head2" align="center">
                      <b>{{ $result->gp }}</b>
                      <input type="hidden" id="gp{{ $a }}" name="" value="{{ $result->gp }}">
                    </td>
                    <td class="td_sss" align="center">
                      {{ $result->sss }}
                      <input type="hidden" id="sss{{ $a }}" name="" value="{{ $result->sss }}">
                    </td>
                    <td class="td_phil" align="center">
                      {{ $result->philhealth }}
                      <input type="hidden" id="phil{{ $a }}" name="" value="{{ $result->philhealth }}">
                    </td>
                    <td class="td_hmdf" align="center">
                      {{ $result->hmdf }}
                      <input type="hidden" id="hmdf{{ $a }}" name="" value="{{ $result->hmdf }}">
                    </td>
                    <td class="td_head2" align="center">
                      {{ $result->cb }}
                      <input type="hidden" id="cb{{ $a }}" name="" value="{{ $result->cb }}">
                    </td>
                    <td class="td_head2" align="center">
                      <b>{{ $result->np }}</b>
                      <input type="hidden" id="np{{ $a }}" name="" value="{{ $result->np }}">
                    </td>
                  </tr>
                  <?php $a++; ?>
                @endforeach
            @endif
            <input type="hidden" id="count" name="" value="{{ $count }}">
            <tr>
              <td class="td_head2" align="center"><b>Total</b></td>
              <td class="td_head2"></td>
              <td class="td_head2" align="center">
                <b><span id="tDuty"></span></b>
              </td>
              <td class="td_head2" align="center">
                <b><span id="tGp"></span></b>
              </td>
              <td class="td_sss" align="center">
                <b><span id="tSSS"></span></b>
              </td>
              <td class="td_phil" align="center">
                <b><span id="tPhil"></span></b>
              </td>
              <td class="td_hmdf" align="center">
                <b><span id="tHmdf"></span></b>
              </td>
              <td class="td_head2" align="center">
                <b><span id="tCb"></span></b>
              </td>
              <td class="td_head2" align="center">
                <b><span id="tNp"></span></b>
              </td>
            </tr>

          </tbody>
        </table>
      </div>

    </div>

    @endforeach
  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')
<script type="text/javascript">
$(document).ready(function(){

  setInterval(function(){
    var count = document.getElementById('count').value;
    var tDuty = document.getElementById('tDuty');
    var tGp = document.getElementById('tGp');
    var tSSS = document.getElementById('tSSS');
    var tPhil = document.getElementById('tPhil');
    var tHmdf = document.getElementById('tHmdf');
    var tCb = document.getElementById('tCb');
    var tNp = document.getElementById('tNp');

    var totalDuty = 0;
    var totalGp = 0;
    var totalSSS = 0;
    var totalPhil = 0;
    var totalHmdf = 0;
    var totalCb = 0;
    var totalNp = 0;

    for (var i = 1; i <= count; i++) {
      var duty = document.getElementById('duty'+i).value;
      var gp = document.getElementById('gp'+i).value;
      var sss = document.getElementById('sss'+i).value;
      var phil = document.getElementById('phil'+i).value;
      var hmdf = document.getElementById('hmdf'+i).value;
      var cb = document.getElementById('cb'+i).value;
      var np = document.getElementById('np'+i).value;

      totalDuty += parseInt(duty);
      totalGp += parseFloat(gp.replace(/,/g, ''));
      totalSSS += parseFloat(sss.replace(/,/g, ''));
      totalPhil += parseFloat(phil.replace(/,/g, ''));
      totalHmdf += parseFloat(hmdf.replace(/,/g, ''));
      totalCb += parseFloat(cb.replace(/,/g, ''));
      totalNp += parseFloat(np.replace(/,/g, ''));

    }
                                                                                                                                                                                                                                                                                                                                                                                                            //
    if(tDuty.innerHTML.length == 0 && tGp.innerHTML.length == 0 && tSSS.innerHTML.length == 0 && tPhil.innerHTML.length == 0 && tHmdf.innerHTML.length == 0 && tCb.innerHTML.length == 0 && tNp.innerHTML.length == 0) {
      tDuty.innerHTML += totalDuty;
      tGp.innerHTML += totalGp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      tSSS.innerHTML += totalSSS.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      tPhil.innerHTML += totalPhil.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      tHmdf.innerHTML += totalHmdf.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      tCb.innerHTML += totalCb.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      tNp.innerHTML += totalNp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    }else{

    }



  },100);

});


</script>

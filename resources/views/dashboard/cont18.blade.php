{{-- Navigation Page --}}
@include('dashboard/nav2')
{{-- Content --}}

<section class="content content_div">
  <div class="container-fluid">
    @foreach ($client as $rs)


      <div class="row">
        <div class="row">
          <div class="col-sm-6 col-md-12 col-lg-12">
            <div class="d-flex justify-content-between">
              <div class="p-2">
                <h3 class="text-primary">{{ $rs->name }}</h3>
              </div>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <img src="../../client/{{ $rs->photo }}" style="float:left;" width="250px" height="auto">
          </div>
          <div class="col-sm-12 col-md-12 col-lg-12">
            <br>
            <h4 class="empH4">Employees</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">

            <table class="center">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>SSS</th>
                  <th>Pag-ibig</th>
                  <th>Philhealth</th>
                  <th>TIN No.</th>
                  <th>Designation</th>
                </tr>
              </thead>
              <tbody>
                @if ($count == 0)
                  <tr>
                    <td colspan="9">
                      {{ "There's no record" }}
                    </td>
                  </tr>

                  @else

                    <?php $a = 1;?>
                    @foreach ($posting as $res)
                        <tr>
                          <td><b>{{ $a }}</b></td>
                          <td>
                            {{ ucwords($res->fname) }}
                          </td>
                          <td>
                            {{ ucwords($res->mname) }}
                          </td>
                          <td>
                            {{ ucwords($res->lname) }}
                          </td>
                          <td>
                            {{ $res->sss }}
                          </td>
                          <td>
                            {{ $res->hmdf }}
                          </td>
                          <td>
                            {{ $res->philhealth }}
                          </td>
                          <td>
                            {{ $res->tin }}
                          </td>
                          <td>{{ $res->designation }}</td>
                        </tr>
                      <?php $a++; ?>
                    @endforeach
                @endif

              </tbody>


            </table>


            {{-- ==========================GENARATE PAYROLL =================--}}
            <div class="row">
              <br>
              <div class="col-sm-12 col-md-12 col-lg-12">
                <br>
                <h4 class="empH4">Generate Payroll</h4>
              </div>
            </div>

            <form class="" action="../save-payroll" method="post" id="validateP" enctype="multipart/form-data">

            <div class="row">
              <div class="col-sm-1 col-md-1 col-lg-1 text-right">
                <b>From: </b>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2">
                <input type="date" id="dateFrom" name="from">
              </div>
              <div class="col-sm-1 col-md-1 col-lg-1 text-right">
                <b>To: </b>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2">
                <input type="date" id="dateTo" name="to">
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2 text-right">
                <b>Upload DTR: </b>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2">
                <input type="file" id="dtr" name="dtr" value="" accept="image/png, image/jpg, image/jpeg">
              </div>

            </div><br>

              @csrf
              {{ csrf_field() }}
            <table class="center">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Days of duty</th>
                  <th>Rate</th>
                  <th>No. OT</th>
                  <th>Overtime Pay</th>
                  <th>No. of holidays</th>
                  <th>Type of holiday</th>
                  <th>GROSS PAY</th>
                  <th>SSS</th>
                  <th>Philhealth</th>
                  <th>Pag-ibig</th>
                  <th>Cash Bond</th>
                  <th>Cash Advance</th>
                  <th>Total Deductions</th>
                  <th>NET PAY</th>
                </tr>
              </thead>
              <tbody>
                @if ($count == 0)
                  <tr>
                    <td colspan="16">
                      {{ "There's no record" }}
                    </td>
                  </tr>
                  @else
                    <?php $a = 1;?>
                    @foreach ($posting as $res)
                        <tr>
                          <td><b>{{ $a }}</b></td>
                          <td>
                            {{ ucwords($res->username) }}
                            <input type="hidden" name="empId{{ $a }}" value="{{ $res->empId }}">
                          </td>
                          <td>
                            <input type="text" id="duty{{ $a }}" name="duty{{ $a }}" class="form-control payroll_Inp duty" value="15">
                          </td>
                          <td>
                            <input type="text" id="rate{{ $a }}" name="rate{{ $a }}" class="form-control payroll_Inp rate" value="{{ $res->rate }}" >

                          </td>
                          <td>
                            <input type="text" id="ot{{ $a }}" name="ot{{ $a }}" class="form-control payroll_Inp" value="0">
                          </td>
                          <td>
                            <input type="text" id="op{{ $a }}" name="op{{ $a }}" class="form-control payroll_Inp" value="{{ $res->rate }}" >

                          </td>
                          <td>
                            <input type="text" id="noh{{ $a }}" name="noh{{ $a }}" class="form-control payroll_Inp" value="0">
                          </td>
                          <td>
                            <select class="form-control" id="holType{{ $a }}" name="holType{{ $a }}">
                              <option value="0.30">Special</option>
                              <option value="1">Regular</option>
                            </select>
                          </td>
                          <td>
                            <input type="text" id="gp{{ $a }}" name="gp{{ $a }}" class="form-control payroll_Inp grossPay" value="" readonly>
                          </td>
                          <td>
                            <input type="text" id="sss{{ $a }}" name="sss{{ $a }}" class="form-control payroll_Inp grossPay" value="" readonly>
                          </td>
                          <td>
                            <input type="text" id="philhealth{{ $a }}" name="philhealth{{ $a }}" class="form-control payroll_Inp grossPay" value="{{ $res->rate }}" readonly>
                          </td>
                          <td>
                            <input type="text" id="hmdf{{ $a }}" name="hmdf{{ $a }}" class="form-control payroll_Inp grossPay" value="{{ $res->rate }}" readonly>
                          </td>
                          <td>
                            <input type="text" id="cb{{ $a }}" name="cb{{ $a }}" class="form-control payroll_Inp" value="200" >
                          </td>
                          <td>
                            <input type="text" id="ca{{ $a }}" name="ca{{ $a }}" class="form-control payroll_Inp" value="0" >
                          </td>
                          <td>
                            <input type="text" id="td{{ $a }}" name="td{{ $a }}" class="form-control payroll_Inp grossPay" name="" value="" readonly>
                          </td>
                          <td>
                            <input type="text" id="np{{ $a }}" name="np{{ $a }}" class="form-control payroll_Inp netPay" name="" value="" readonly>
                          </td>
                        </tr>
                      <?php $a++; ?>
                    @endforeach
                    <tr>
                      <td colspan="16" >
                        <input type="submit" style="float:right;margin-right:3%;" class="btn btn-primary" name="" value="Generate">
                      </td>
                    </tr>
                    <input type="hidden" name="count" id="count" value="{{ $count }}">
                    <input type="hidden" name="userId" value="{{ $row->userId }}">
                    <input type="hidden" name="clientId" value="{{ $res->clientId }}">
                @endif

              </tbody>

            </table>
            </form>
          </div>
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

    for (var i = 1; i <= count; i++) {

        var duty = document.getElementById('duty'+i);
        var rate = document.getElementById('rate'+i);
        var ot = document.getElementById('ot'+i);
        var op = document.getElementById('op'+i);
        var noh = document.getElementById('noh'+i);
        var holType = document.getElementById('holType'+i);
        var gp = document.getElementById('gp'+i);
        var sss = document.getElementById('sss'+i);
        var philhealth = document.getElementById('philhealth'+i);
        var hmdf = document.getElementById('hmdf'+i);
        var cb = document.getElementById('cb'+i);
        var ca = document.getElementById('ca'+i);
        var td = document.getElementById('td'+i);
        var np = document.getElementById('np'+i);

        var overtime = ot.value * op.value;
        var gop = duty.value * rate.value;
        var sum = gop + overtime;
        var totalH = noh.value * holType.value;
        var holiday = totalH * rate.value;
        var gdp = holiday + sum;
        var sssVal = 0.013 * gdp;
        var hmdfVal = 0.02 * gdp;
        var philhealthVal = 0.0275 * gdp;



        gp.value = gdp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        sss.value = sssVal.toFixed(2);
        philhealth.value = philhealthVal.toFixed(2);
        hmdf.value = hmdfVal.toFixed(2);

        var totalD = parseInt(sss.value) + parseInt(philhealth.value) + parseInt(hmdf.value) + parseInt(cb.value) + parseInt(ca.value);
        totalD.toFixed(2);
        td.value = totalD;

        var netPay = gdp - td.value;
        var npFormat = netPay.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        np.value = npFormat;
    }


   }, 100);

});
</script>
<script type="text/javascript" src={{ asset("js/Generate.js") }}></script>
{{--                                                                                                                                                                                                                       --}}

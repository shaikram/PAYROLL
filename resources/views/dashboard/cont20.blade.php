{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}
<section class="content content_div">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">


        {{-- ==========================GENARATE PAYROLL =================--}}
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <center>
            <img src="{{ URL::asset('dtr/SSA_HEADER.png') }}" width="60%" height="auto" alt="">
            </center>
            <br><br>
          </div>
          <br><br>
          <div class="col-sm-12 col-md-12 col-lg-12">

            @foreach ($client as $res)
              <h4 class="empH4">{{ $res->name }}'s Payroll</h4>
            @endforeach
          </div>

          <br><br><br>
        </div>

        <div class="row">
          @foreach ($date as $res)
            <div class="col-sm-12 col-md-12 col-lg-12 text-left">
                <b>From: </b>{{  date('F d, Y', strtotime($res->from)) }}<br>
                <b>To: </b>{{ date('F d, Y', strtotime($res->to)) }}<br>
                <b>Created by: </b>{{ ucwords($res->username) }}
            </div>
          @endforeach

        </div><br>

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
                @foreach ($salary as $res)
                    <tr>
                      <td><b>{{ $a }}</b></td>
                      <td>
                      {{ $res->username }}
                      </td>
                      <td>
                        {{ $res->duty }}
                      </td>
                      <td>
                        {{ $res->rate }}
                      </td>
                      <td>
                        {{ $res->ot }}
                      </td>
                      <td>
                        {{ $res->op }}
                      </td>
                      <td>
                        {{ $res->noh }}
                      </td>
                      <td>
                        @if ($res->holType == 0.30)
                          {{ "Special" }}
                          @else
                            {{ "Regular" }}
                        @endif
                      </td>
                      <td>
                        <b>{{ $res->gp }}</b>
                      </td>
                      <td>
                        {{ $res->sss }}
                      </td>
                      <td>
                        {{ $res->philhealth }}
                      </td>
                      <td>
                        {{ $res->hmdf }}
                      </td>
                      <td>
                        {{ $res->cb }}
                      </td>
                      <td>
                        {{ $res->ca }}
                      </td>
                      <td>
                        {{ $res->td }}
                      </td>
                      <td>
                        <b>{{ $res->np }}</b>
                      </td>
                    </tr>
                  <?php $a++; ?>
                @endforeach


            @endif

          </tbody>

        </table>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
          <br><br>
          <h4 class="empH4">Daily Time Record(D.T.R.)</h4>
          <br>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-12">
            @foreach ($date as $res)
              <img src="{{ URL::asset('dtr/'.$res->dtr.'') }}" width="100%" height="auto" alt="">
            @endforeach
          </div>

        </div>
      </div>
    </div>
    {{-- end 1st row --}}
  </div>
</section>

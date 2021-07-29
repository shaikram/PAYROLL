<div class="container-fluid pageContent">
  <center>
    <div class="centerdiv">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3">
          <div class="d-flex">
            <table width="100%" height="auto" class="qlinks_table">
              <tr>
                <td class="nql_td">
                  <span>
                    NAVIGATE QUICK LINKS
                  </span>
                </td>
              </tr>
              <tr>
                <td class="tdlinks" onclick="qlinks(1);">
                  <a style="color:#477d99;">
                    MANAGEMENT TEAM
                  </a>
                  <br>
                  <div class="qlinks_line"></div>
                </td>
              </tr>
              <tr>
                <td class="tdlinks" onclick="qlinks(2);">
                  <a style="color:#477d99;">
                    ORGANIZATIONAL CHART
                  </a>
                  <br>
                  <div class="qlinks_line"></div>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-9">
          {{-- =================COMPANY PROFILE=================== --}}
          <div class="d-flex p-2" id="scroll1">
            <span class="cnt_header">MANAGEMENT TEAM</span>
          </div>
          <div class="d-flex">
            <div class="cnt_line"></div>
          </div>
          <div class="d-flex p-2 div4cnt">
            <table class="manageTable" width="100%" height="auto">
              <thead>
                <tr>
                  <th align="right" colspan="2">
                    <center>MANAGEMENT TEAM</center>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($management as $res)
                  <tr>
                    <td align="center" class="mngPic">
                      <a class="fancybox-thumbs" data-fancybox-group="thumb" title="{{ $res->position }}" href="{{URL::asset('photo/'.$res->picture)}}">
                        <img src="{{URL::asset('photo/'.$res->picture)}}" class="mngImg" alt="">
                      </a>
                    </td>
                    <td class="mngInfo">
                      <span class="spanInfo"><b>Name:</b> {{ $res->username }}</span><br>
                      <span class="spanInfo"><b>Position:</b> {{ $res->position }}</span>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          {{-- =================COMPANY PROFILE=================== --}}
          <div class="d-flex p-2" id="scroll2">
            <span class="cnt_header">ORGANIZATIONAL CHART</span>
          </div>
          <div class="d-flex">
            <div class="cnt_line"></div>
          </div>
          <div class="d-flex p-2 div4cnt">
            <center>
            <a class="fancybox-thumbs" data-fancybox-group="thumb" title="Organizational Chart" href="{{URL::asset('photo/ochart.png')}}">
              <img src="{{URL::asset('photo/ochart.png')}}" class="ochart" alt="">
            </a>
          </center>
          </div>

        </div>
      </div>
    </div>
  </center>
</div>

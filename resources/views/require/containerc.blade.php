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
                    CLIENT
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
            <span class="cnt_header">CLIENT</span>
          </div>
          <div class="d-flex">
            <div class="cnt_line"></div>
          </div>
          <div class="d-flex div4cnt">
            <table class="manageTable" width="100%" height="auto">
              <thead>
                <tr>
                  <th align="right" colspan="2">
                    <center>MANAGEMENT TEAM</center>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($client as $res)
                  @if ($res->photo != 'unknown.png')
                    <tr>
                      <td align="center" class="mngPic">
                        <a class="fancybox-thumbs" data-fancybox-group="thumb" title="{{ $res->name }}" href="{{URL::asset('client/'.$res->photo)}}">
                          <img src="{{URL::asset('client/'.$res->photo)}}" class="mngImg" alt="">
                        </a>
                      </td>
                      <td class="mngInfo">
                        <span class="spanInfo"><b>Name:</b> {{ $res->name }}</span><br>
                        <span class="spanInfo"><b>Address:</b> {{ $res->address }}</span>
                      </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>



          </div>

        </div>
      </div>
    </div>
  </center>
</div>

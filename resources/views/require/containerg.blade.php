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
                    SHOWFORCE
                  </a>
                  <br>
                  <div class="qlinks_line"></div>
                </td>
              </tr>
              <tr>
                <td class="tdlinks" onclick="qlinks(2);">
                  <a style="color:#477d99;">
                    MEETINGS
                  </a>
                  <br>
                  <div class="qlinks_line"></div>
                </td>
              </tr>
              <tr>
                <td class="tdlinks" onclick="qlinks(3);">
                  <a style="color:#477d99;">
                    ACCREDITAION
                  </a>
                  <br>
                  <div class="qlinks_line"></div>
                </td>
              </tr>
              <tr>
                <td class="tdlinks" onclick="qlinks(4);">
                  <a style="color:#477d99;">
                    VEHICLES
                  </a>
                  <br>
                  <div class="qlinks_line"></div>
                </td>
              </tr>
              <tr>
                <td  class="tdlinks" onclick="qlinks(5);">
                  <a style="color:#477d99;">
                    MANAGEMENT
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
            <span class="cnt_header">SHOWFORCE</span>
          </div>
          <div class="d-flex">
            <div class="cnt_line"></div>
          </div>
          <div class="d-flex p-2 div4cnt">
            <div class="row">
              @foreach ($showforce as $res)
                <div class="col-sm-12 col-md-4 col-lg-3 imgFrame">
                  <a class="fancybox-thumbs" data-fancybox-group="thumb" title="SHOWFORCE" href="{{URL::asset('photo/'.$res->image)}}">
                    <img src="{{URL::asset('photo/'.$res->image)}}" class="albumImg" alt="">
                  </a>
                </div>
              @endforeach
            </div>
          </div>
          {{-- =================LETTER OF INTENT=================== --}}
          <div class="d-flex p-2" id="scroll2">
            <span class="cnt_header">MEETINGS</span>
          </div>
          <div class="d-flex">
            <div class="cnt_line"></div>
          </div>
          <div class="d-flex p-2 div4cnt">
            <div class="row">
              @foreach ($meetings as $res)
                <div class="col-sm-12 col-md-4 col-lg-3 imgFrame">
                  <a class="fancybox-thumbs" data-fancybox-group="thumb" title="MEETINGS" href="{{URL::asset('photo/'.$res->image)}}">
                    <img src="{{URL::asset('photo/'.$res->image)}}" class="albumImg" alt="">
                  </a>
                </div>
              @endforeach
            </div>
          </div>

          {{-- =================BASIC SERVICE FEATURE=================== --}}
          <div class="d-flex p-2" id="scroll3">
            <span class="cnt_header">ACCREDITAION</span>
          </div>
          <div class="d-flex">
            <div class="cnt_line"></div>
          </div>
          <div class="d-flex p-2 div4cnt">
            <div class="row">
              @foreach ($accrreditation as $res)
                <div class="col-sm-12 col-md-4 col-lg-3 imgFrame">
                  <a class="fancybox-thumbs" data-fancybox-group="thumb" title="ACCREDITAION" href="{{URL::asset('photo/'.$res->image)}}">
                    <img src="{{URL::asset('photo/'.$res->image)}}" class="albumImg" alt="">
                  </a>
                </div>
              @endforeach
            </div>
          </div>
          {{-- =================TECHNICAL & OPERATIONAL CAPABILITY=================== --}}
          <div class="d-flex p-2" id="scroll4">
            <span class="cnt_header">VEHICLES</span>
          </div>
          <div class="d-flex">
            <div class="cnt_line"></div>
          </div>
          <div class="d-flex p-2 div4cnt">
            <div class="row">
              @foreach ($vehicles as $res)
                <div class="col-sm-12 col-md-4 col-lg-3 imgFrame">
                  <a class="fancybox-thumbs" data-fancybox-group="thumb" title="VEHICLES" href="{{URL::asset('photo/'.$res->image)}}">
                    <img src="{{URL::asset('photo/'.$res->image)}}" class="albumImg" alt="">
                  </a>
                </div>
              @endforeach
            </div>
          </div>

          {{-- =================VISION=================== --}}
          <div class="d-flex p-2" id="scroll5">
            <span class="cnt_header">MANAGEMENT</span>
          </div>
          <div class="d-flex">
            <div class="cnt_line"></div>
          </div>
          <div class="d-flex p-2 div4cnt">
            <div class="row">
              @foreach ($management as $res)
                <div class="col-sm-12 col-md-4 col-lg-3 imgFrame">
                  <a class="fancybox-thumbs" data-fancybox-group="thumb" title="{{ $res->position }}" href="{{URL::asset('photo/'.$res->picture)}}">
                    <img src="{{URL::asset('photo/'.$res->picture)}}" class="albumImg" alt="">
                  </a>
                </div>
              @endforeach
            </div>
          </div>

        </div>
      </div>
    </div>
  </center>
</div>

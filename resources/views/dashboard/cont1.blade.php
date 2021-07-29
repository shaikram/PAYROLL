{{-- Navigation Page --}}
@include('dashboard/navbar')
{{-- Content --}}
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  Hi, <strong>{{ session('email') }}!</strong> welcome to admin dashboard.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<section class="content content_div">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-3 justify-content-center align-items-center">
        <center>

            <table class="prof_tble">
              <tr>
                <td align="center">
                  <div class="profile_div">
                    <img src="{{ asset('photo/'.$row->picture) }}" class="profile_img">
                  </div>
                </td>
              </tr>
              <tr>
                <td align="center">
                  <span class="username">
                    {{ $row->username }}
                  </span>
                </td>
              </tr>
              <tr>
                <td align="center">
                  <span class="position">
                    {{ $row->position }}
                  </span>
                </td>
              </tr>
            </table>


      </center>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-9 dashboarddiv">
        <ul class="dash_ul">
          <li>
            <a href="admin/gallery">
              <div class="tools_div">
                <center>
                  <table width="70%" height="auto" class="dash_table">
                    <tr>
                      <td align="center">
                        <img src="{{ asset('images/gallery.png') }}" class="dashimg">
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                        <span>
                          Gallery
                        </span>
                      </td>
                    </tr>
                  </table>
                </center>
              </div>
            </a>
          </li>
          @if ($row->restriction == 'super admin')
          <li>
            <a href="admin/add-member">
              <div class="tools_div">
                <center>
                  <table width="70%" height="auto" class="dash_table">
                    <tr>
                      <td align="center">
                        <img src="{{ asset('images/add.png') }}" class="dashimg">
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                        <span>
                          Add
                        </span>
                      </td>
                    </tr>
                  </table>
                </center>
              </div>
            </a>
          </li>
        @elseif ($row->restriction == 'admin')

        @endif
          @if ($row->restriction == 'super admin')
            <li>
              <a href="admin/member-list">
                <div class="tools_div">
                  <center>
                    <table width="70%" height="auto" class="dash_table">
                      <tr>
                        <td align="center">
                          <img src="{{ asset('images/admin.png') }}" class="dashimg">
                        </td>
                      </tr>
                      <tr>
                        <td align="center">
                          <span>
                            Admin
                          </span>
                        </td>
                      </tr>
                    </table>
                  </center>
                </div>
              </a>
            </li>
          @elseif ($row->restriction == 'admin')

          @endif

          <li>
            <a href="admin/add-employee">
              <div class="tools_div">
                <center>
                  <table width="90%" height="auto" class="dash_table">
                    <tr>
                      <td align="center">
                        <br>
                        <img src="{{ asset('images/employee.png') }}" class="dashimg">
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                        <span>
                          Add Employee
                        </span>
                      </td>
                    </tr>
                  </table>
                </center>
              </div>
            </a>
          </li>
          <li>
            <a href="admin/employee-list">
              <div class="tools_div">
                <center>
                  <table width="50%" height="auto" class="dash_table">
                    <tr>
                      <td align="center">
                        <img src="{{ asset('images/list.png') }}" class="dashimg">
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                        <span>
                          Employee
                        </span>
                      </td>
                    </tr>
                  </table>
                </center>
              </div>
            </a>
          </li>
          <li>
            <a href="admin/add-client">
              <div class="tools_div">
                <center>
                  <table width="75%" height="auto" class="dash_table">
                    <tr>
                      <td align="center">
                        <img src="{{ asset('images/client.png') }}" class="dashimg">
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                        <span>
                          Client
                        </span>
                      </td>
                    </tr>
                  </table>
                </center>
              </div>
            </a>
          </li>
          <li>
            <a href="admin/add-payroll">
              <div class="tools_div">
                <center>
                  <table width="70%" height="auto" class="dash_table">
                    <tr>
                      <td align="center">
                        <img src="{{ asset('images/payroll.png') }}" class="dashimg">
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                        <span>
                          Payroll
                        </span>
                      </td>
                    </tr>
                  </table>
                </center>
              </div>
            </a>
          </li>
        
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')

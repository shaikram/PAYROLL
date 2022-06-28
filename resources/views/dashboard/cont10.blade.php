{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer ">
      <form class="addM_form" id="addEmployee" method="post">
        <div class="alert alert-danger alert-dismissible fade show empError" id="empError" role="alert">

        </div>
        @csrf
        {{ csrf_field() }}
          <div class="card" style="margin-left:15%;">
              <div class="card-header">
                <i class="fa fa-user-plus fa-2x text-warning"></i> <span class="m_header">Add Employee</span>
              </div>
              <div class="card-body">
                <input type="text" id="inp1" class="form-control" maxlength="25" name="input1" placeholder="First Name"><br>
                <input type="text" id="inp2" class="form-control"  maxlength="25" name="input2" placeholder="Middle Name"><br>
                <input type="text" id="inp3" class="form-control"  maxlength="25" name="input3" placeholder="Last Name"><br>
                Designation <span class="text-danger">*</span><br>
                <select class="form-control" id="inp4" name="input4" required>
                  <option value="Security Guard">Security Guard(SG)</option>
                  <option value="Security Guard">Lady Guard(LG)</option>
                  <option value="Security Officer">Security Officer(SO)</option>
                  <option value="Assistant Detachment Commander">Assistant Detachment Commander(ADC)</option>
                  <option value="Detachment Commander">Detachment Commander(DC)</option>
                  <option value="Inspector">Inspector</option>
                </select><br>
                <input type="number" id="inp5" class="form-control"  maxlength="11" name="input5" placeholder="Contact No."><br>
                <textarea id="inp6" rows="3"  maxlength="250" class="form-control" name="input6" placeholder="Address..."></textarea><br>
                <input type="text" id="inp7" class="form-control"  maxlength="50" name="input7" placeholder="SSS Number"><br>
                <input type="text" id="inp8" class="form-control" maxlength="50" name="input8" placeholder="Pag-ibig Number"><br>
                <input type="text" id="inp9" class="form-control" maxlength="50" name="input9" placeholder="Philhealth Number"><br>
                <input type="text" id="inp10" class="form-control" maxlength="50" name="input10" placeholder="TIN Number"><br>
                <input type="hidden" name="input11" value="{{ $row->userId }}">
                <input type="submit" class="btn btn-primary" name="" value="SUBMIT">
                <input type="reset" class="btn btn-secondary" name="" value="CANCEL">
              </div>
              <div class="card-footer text-muted text-right">
                &copy; ShowForce Security Agency
              </div>
          </div>
      </form>
    </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')

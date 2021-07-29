{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer ">

      <form class="addM_form" id="addForm" method="post">
        @csrf
        {{ csrf_field() }}
          <div class="card" style="margin-left:15%;">
              <div class="card-header">
                <i class="fa fa-user-plus fa-2x text-success"></i> <span class="m_header">Add Member</span>
              </div>
              <div class="card-body">
                <input type="text" id="af1" class="form-control" maxlength="15" name="input1" placeholder="First Name"><br>
                <input type="text" id="af2" class="form-control"  maxlength="15" name="input2" placeholder="Middle Name"><br>
                <input type="text" id="af3" class="form-control"  maxlength="15" name="input3" placeholder="Last Name"><br>
                <textarea name="input4" id="af4" rows="3"  maxlength="150" class="form-control" placeholder="Address..."></textarea><br>
                Choose Position <span class="text-danger">*</span><br>
                <select class="form-control" id="af5" name="input5" required>
                  <option value="Chief Executive Officer">Chief Executive Officer</option>
                  <option value="President">President</option>
                  <option value="Vice President">Vice President</option>
                  <option value="General Manager">General Manager</option>
                  <option value="Marketing Manager">Marketing Manager</option>
                  <option value="Operation Manager">Operation Manager</option>
                  <option value="Admin Manager">Admin Manager</option>
                  <option value="Finance Manager">Finance Manager</option>
                </select><br>
                <input type="number" id="af6" class="form-control"  maxlength="11" name="input6" placeholder="Contact No."><br>
                <input type="email" id="af7" class="form-control"  maxlength="25" name="input7" placeholder="Email"><br>
                <input type="password" id="af8" class="form-control" maxlength="20" name="input8" placeholder="Password"><br>
                <input type="password" id="af9" class="form-control" maxlength="20" placeholder="Confirm Password"><br>
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

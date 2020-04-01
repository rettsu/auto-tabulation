<div id="login-page">
    <div class="container">
      <form class="form-login" method="post" action="<?php echo base_url('Login_controller/check_user') ?>" id="LoginFrm">
        <h2 class="form-login-heading">Welcome User</h2>
        <div class="login-wrap">
          <input type="text" name="userID" class="form-control" id="userID" placeholder="Company ID Number Here ..." autocomplete="off" autofocus required><br>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password Here ..." autocomplete="off" autofocus required>
          <hr>
          <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> LOG IN</button>
        </div>
        <button class="btn btn-sm btn-theme04 btn-block" href="#signupModal" data-toggle="modal" type="button"><i class="fa fa-user"></i> Sign up</button>
      </form>
    </div>
  </div>

<!-- Sign up Modal -->
<form class="form-login" id="signupForm">
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="signupModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">
            <span class="fa fa-edit"></span>
            Sign up here
          </h4>
        </div>
        
        <div class="modal-body">
          <div class="form-group">
              <input type="text" class="form-control round-form" name="firstName" id="firstName" placeholder="First Name here ..." autocomplete="off" required>
              <br>
              <input type="text" class="form-control round-form" name="middleName" id="middleName" placeholder="Middle Name here ..." autocomplete="off" required>
              <br>
              <input type="text" class="form-control round-form" name="lastName" id="lastName" placeholder="Last Name here ..." autocomplete="off" required>
              <br>
              <input type="text" class="form-control round-form" name="companyID" id="companyID" placeholder="Company ID here ..." autocomplete="off" required>
              <br>
              <input type="password" class="form-control round-form" name="password" id="password" placeholder="Password here ..." autocomplete="off" required>
          </div>
        </div>
        
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-theme04" type="button" id="btnModalCancelAddingParticipant">Cancel</button>
          <button class="btn btn-theme03" type="submit">Add</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- modal -->
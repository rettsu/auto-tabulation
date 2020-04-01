<section id="main-content">
  <section class="wrapper site-min-height">
    <br><br>
    <?php if ( $permission == "super_admin" ): ?>
    <div class="row">
      <div class="col-lg-12">
          <div class="row">
            <div class="col col-sm-offset-1 col-sm-10">
              <div class="panel">
                <div class="panel panel-header">
                  <h4>
                    &nbsp;&nbsp;Admin/s
                  </h4>
                </div>
                <a href="#addAdminModal" class="pull-right" id="addAdminBtn" data-toggle="modal" title="Add Admin" data-placement="bottom">
                  <span class="fa fa-plus"></span>
                </a>
                <div class="panel panel-body">
                  <table class="table table-bordered" style="background-color: white;">
                    <div class="row">
                      <thead style="text-align: center;">
                        <tr>
                          <div class="col col-sm-2">
                            <td style="font-weight: bold;">#</td>
                          </div>
                          <div class="col col-sm-5">
                            <td style="font-weight: bold;">Name</td>
                          </div>
                          <div class="col col-sm-5">
                            <td style="font-weight: bold;">Status</td>
                          </div>
                        </tr>
                      </thead>
                    </div>
                    <div class="row">
                      <tbody id="showAdmins">
                        
                      </tbody>
                    </div>
                  </table>
                </div>
              </div>
            </div>
          </div>
                 
      </div>
    </div>
  <?php endif; ?>

    <div class="row">
      <div class="col-lg-12">
          <div class="row">
            <div class="col col-sm-offset-1 col-sm-10">
              <div class="panel">
                <div class="panel panel-header">
                  <h4>
                    &nbsp;&nbsp;User/s
                  </h4>
                </div>
                <div class="panel panel-body">
                  <table class="table table-bordered" style="background-color: white;">
                    <div class="row">
                      <thead style="text-align: center;">
                        <tr>
                          <div class="col col-sm-2">
                            <td style="font-weight: bold;">#</td>
                          </div>
                          <div class="col col-sm-5">
                            <td style="font-weight: bold;">Name</td>
                          </div>
                          <div class="col col-sm-5">
                            <td style="font-weight: bold;">Status</td>
                          </div>
                        </tr>
                      </thead>
                    </div>
                    <div class="row">
                      <tbody id="showUsers">
                        
                      </tbody>
                    </div>
                  </table>
                </div>
              </div>
            </div>
          </div>
                 
      </div>
    </div>
  </section>
  <!-- /wrapper -->
</section>


<!-- Add Admin Modal -->
<form class="form-login" id="addAdminFrm">
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addAdminModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">
            <span class="fa fa-user"></span>
            Add Admin here
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
          <button class="btn btn-theme03" type="submit" id="BtnLogout">Add</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- modal -->
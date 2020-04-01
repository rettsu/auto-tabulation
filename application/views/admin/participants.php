<section id="main-content">
  <section class="wrapper site-min-height">
    <h3><i class="fa fa-angle-right"></i>Participants</h3>
    
    <div class="row mt">
      <div class="col-lg-12">
            <h5 id="tabHead">
              Participants
              <button class="btn btn-sm btn-clear-g pull-right tooltips" data-placement="bottom" data-original-title="Add Participant" data-toggle="modal" href="#addParticipantmodal" id="btnAddParticipant">
                <span class="fa fa-plus">&nbsp;</span>
                ADD
              </button>
             <!--  <button class="btn btn-sm btn-theme03 pull-right tooltips" id="btn-edit" data-placement="bottom" data-original-title="Edit Participant" data-toggle="modal" href="#editParticipantmodal">
                <span class="fa fa-edit"></span>
              </button> -->
            </h5>
            <input type="text" name="searchBranch" id="searchParticipant" class="pull-right form-control round-form" autofocus placeholder="Search Branch here ..." autocomplete="off">
            <!-- <span id="searchResult">Result here.</span> -->
          <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" style="background-color: white;">
                  <div class="row">
                    <thead style="text-align: center;">
                      <tr>
                        <div class="col col-sm-1">
                          <td style="font-weight: bold;">#</td>
                        </div>
                        <div class="col col-sm-3">
                          <td style="font-weight: bold;">Branch Code</td>
                        </div>
                        <div class="col col-sm-3">
                          <td style="font-weight: bold;">Branch Name</td>
                        </div>
                        <div class="col col-sm-3">
                          <td style="font-weight: bold;">Day Finished</td>
                        </div>
                        <div class="col col-sm-2">
                          <td style="font-weight: bold;">Action</td>
                        </div>
                      </tr>
                    </thead>
                  </div>
                  <div class="row">
                    <tbody id="showParticipants">
                      
                    </tbody>
                  </div>
                </table>
            </div>
          </div>
                 
      </div>
    </div>
  </section>
  <!-- /wrapper -->
</section>

<!-- Add Participant Modal -->
<form class="form-login" method="post" action="<?php echo base_url('Admin/addPartcipant') ?>" id="AddParticipantFrm">
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addParticipantmodal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">
            <span class="fa fa-user"></span>
            Add Participant here
          </h4>
        </div>
        
        <div class="modal-body">
          <div class="form-group">
              <input type="number" class="form-control round-form" name="branchCode" id="branchCode" placeholder="Branch Code here ..." autocomplete="off" autofocus required>
              <br>
              <input type="text" class="form-control round-form" name="branchName" id="branchName" placeholder="Branch Name here ..." autocomplete="off" required>
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

<!-- Edit Participant Modal -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editParticipantmodal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">
            <span class="fa fa-edit"></span>
            Edit Participant here
          </h4>
        </div>
        
        <div class="modal-body">
          <div class="form-group">
              <div class="row" id="topSearch">
                
              </div>
              <div id="bnameResult">
                <input type="text" class="form-control round-form" name="branchCodeResult" id="branchCodeResult" placeholder="Branch Code here ..." autocomplete="off" autofocus required>
                <br>
                <input type="text" class="form-control round-form" name="branchNameResult" id="branchNameResult" placeholder="Branch Name here ..." autocomplete="off" required>
                <br>
                <button class="btn btn-theme03 pull-right" type="button" id="BtnClear">Clear Data</button>
              </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-theme04" type="button" id="btnModalCancelAddingParticipant">Cancel</button>
          <button class="btn btn-theme03" type="button" id="BtnSave">Save</button>
        </div>
      </div>
    </div>
  </div>
<!-- modal -->
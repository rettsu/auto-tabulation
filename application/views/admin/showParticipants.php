<?php if ($result): ?>
  <?php foreach ($result as $i => $val): ?>
        <?php $i = $i + 1; ?>
          <tr>
            <div class="col col-sm-1">
                <td style="text-align: center;">
                    <span>
                      <?php echo $i; ?>
                    </span>
                </td>
            </div>
            <div class="col col-sm-3">
                <td style="font-size:1.5vw;">
                    <input type="text" class="form-control round-form" value="<?php echo $val->branchCode; ?>" name="branchCode<?php echo $val->id; ?>" id="branchCode<?php echo $val->id; ?>" autocomplete="off">
                    <h6>Type here your adjustment/s.</h6>
                </td>
            </div>
            <div class="col col-sm-3">
                <td style="font-size:1.5vw;">
                    <input type="text" class="form-control round-form" value="<?php echo $val->branchName; ?>" name="branchName<?php echo $val->id; ?>" id="branchName<?php echo $val->id; ?>" autocomplete="off">
                    <h6>Type here your adjustment/s.</h6>
                </td>
            </div>
            <div class="col col-sm-3">
                <td style="text-align: center;">
                   <span>
                      <?php echo $val->dayEntry - 1; ?>
                    </span>
                </td>
            </div>
            <div class="col col-sm-2">
                 <td  style="text-align: center;">
                    <button class="btn btn-theme02 edit-part" type="button" data="<?php echo $val->id; ?>" title="Edit Information">
                      <span class="fa fa-edit"></span>
                    </button>
                    <button class="btn btn-theme04 del-part" type="button" data="<?php echo $val->id; ?>" title="Remove Participant">
                        <span class="fa fa-trash"></span>
                    </button>
                </td>
            </div>
          </tr>
  <?php endforeach; ?>
<?php else: ?>
    <h5 id="noResult">No result found.</h5>
<?php endif; ?>

<script type="text/javascript">
    $(".edit-part").click(function(e){
      e.preventDefault();

      var id = $(this).attr("data");
      var txtBranchCode = $("#branchCode"+id).val();
      var txtBranchName = $("#branchName"+id).val();

      $.ajax({
        url     :     "<?php echo base_url("Admin/editInformation"); ?>",
        method  :     "POST",
        data    :     {id:id, branchCode:txtBranchCode, branchName:txtBranchName},
        success :     function(data){
          if ( data ) 
          {
            $.notify(txtBranchCode+ " succesfully updated!", {
              animate: {
                enter:  'animated fadeInRight',
                exit: 'animated fadeOutRight',
                type: 'success'
              }
            });

            showParticipants();
          }
        }
      });

      // alert(txtBranchCode+" "+txtBranchName);
      // alert(id);
    });

    $(".del-part").click(function(e){
      var id = $(this).attr("data");
      var txtBranchCode = $("#branchCode"+id).val();

      $.ajax({
        url     :     "<?php echo base_url("Admin/deleteInformation"); ?>",
        method  :     "POST",
        data    :     {id:id},
        success :     function(data){
          if ( data == "success" ) 
          {
            $.notify(txtBranchCode+ " succesfully deleted!", {
              animate: {
                enter:  'animated fadeInRight',
                exit: 'animated fadeOutRight',
                type: 'danger'
              }
            });

            showParticipants();
          }
        }
      });
      // alert(id);
    });

    function showParticipants() {
        $.ajax({
          type:       "post",
          url:        "showParticipants", 
          success:    function(data){
            if (data) 
            {
              $("#showParticipants").html(data);
            }
          }
        });
      }
</script>
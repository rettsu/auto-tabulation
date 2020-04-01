<?php if ($result): ?>
	<?php foreach ($result as $i => $val): ?>
          <tr>
            <div class="col col-sm-2">
                <td style="text-align: center;"><?php echo $val->branchName; ?></td>
            </div>
            <div class="col col-sm-2">
                <td style="text-align: center;">
                      <span style="text-align: center;">
                        <?php echo $val->dayEntry; ?>
                    </span>
                </td>
            </div>
            <div class="col col-sm-2">
                <td>
                    <input type="number" min="1" max="100" class="form-control" name="txtCreativity<?php echo $val->branchCode; ?>'" id="txtCreativity<?php echo $val->branchCode; ?>" autocomplete="off" required style="width:100%;">
                </td>
            </div>

            <div class="col col-sm-2">
                <td>
                    <input type="number" min="1" max="100" class="form-control" name="txtMusic<?php echo $val->branchCode; ?>" id="txtMusic<?php echo $val->branchCode; ?>" autocomplete="off" required style="width:100%;">
                </td>
            </div>

            <div class="col col-sm-2">
                <td>
                    <input type="number" min="1" max="100" class="form-control" name="txtOriginality<?php echo $val->branchCode; ?>" id="txtOriginality<?php echo $val->branchCode; ?>" autocomplete="off" required style="width:100%;">
                </td>
            </div>
            <div class="col col-sm-2" style="margin-right: -10px;">
                 <td>
                    <button class="btn btn-theme03 add-tab" style="width: 100%;" type="button" data="<?php echo $val->branchCode; ?>" title="Tabulate">
                    	<span class="fa fa-calculator"></span>
                    </button>
                </td>
            </div>
        	</tr>
	<?php endforeach; ?>
<?php else: ?>
	<h5 id="noResult">No result found.</h5>
<?php endif; ?>
<script type="text/javascript">
  $(".add-tab").click(function (e) {
        e.preventDefault();

        var id = $(this).attr("data");
        var txtCreativity = $("#txtCreativity"+id).val();
        var txtMusic = $("#txtMusic"+id).val();
        var txtOriginality = $("#txtOriginality"+id).val();
        var creativity, music, originality, overall;
        // alert(id);
        creativity = (parseFloat(txtCreativity)*50)/100;
        music = (parseFloat(txtMusic)*30)/100;
        originality = (parseFloat(txtOriginality)*20)/100;
        overall = parseFloat(creativity+music+originality);

        // alert(creativity+" "+music+" "+originality+" "+overall);

        $.ajax({
          url     :   "<?php echo base_url('Admin/AddTabulation'); ?>",
          method  :   "POST",
          data    :   {IDNumber:id, creativity:creativity, music:music, originality:originality, overall:overall},
          success :   function(data){
                if ( data == "success" ) 
                {
                  $.notify("Tabulation successful!", {
                      animate: {
                      enter:  'animated fadeInRight',
                      exit: 'animated fadeOutRight',
                      type: 'success'
                     }
                    });
                  $("#txtCreativity"+id).val('');
                  $("#txtMusic"+id).val('');
                  $("#txtOriginality"+id).val('');


                  showBranchesCode();
                }

          }
        });

      });


  function showBranchesCode() {

        $.ajax({
          type:       "post",
          url:      "showBranchesCode", 
          success:    function(data){
            if (data) 
            {
              $("#showBranchCode").html(data);
            }
          }
        });
      }
</script>
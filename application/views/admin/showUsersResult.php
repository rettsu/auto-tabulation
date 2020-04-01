<?php if ( $admin ): ?>
	<?php foreach ($admin as $i => $val) :?>
		<?php $i = $i + 1; ?>
		<tr>
      <div class="col col-sm-2">
        <td style="font-weight: bold; text-align: center;">
        	<?php echo $i; ?>
        </td>
      </div>
      
      <div class="col col-sm-5">
        <td style="font-weight: bold; text-align: center;">
        	<?php echo $val->first_name." ".$val->middle_name." ".$val->last_name; ?>
        </td>
      </div>
      
      <div class="col col-sm-3">
        <td style="font-weight: bold; text-align: center;">
        	<?php if ( $val->status == 1 ): ?>
        		<span style="color: green;"><?php echo "Active"; ?></span>
        	<?php else: ?>
        		<span style="color: red;"><?php echo "Offline"; ?></span>
        	<?php endif; ?>
        </td>
      </div>
      <?php if( $permission == "super_admin" ): ?>
        <div class="col col-sm-2">
          <td style="font-weight: bold; text-align: center;">
            <a href="#" data-toggle="tooltip" title="Remove" class="delUser" data="<?php echo $val->id; ?>"><span class="fa fa-trash" style="color: red;"></span></a>
          </td>
        </div>
      <?php endif; ?>
    </tr>
	<?php endforeach; ?>
<?php endif; ?>
<script type="text/javascript">
  $(".delUser").click(function(e){
    e.preventDefault();
    var id = $(this).attr("data");

    $.ajax({
        url     :     "<?php echo base_url("Admin/deleteAdmin"); ?>",
        method  :     "POST",
        data    :     {id:id},
        success :     function(data){
          if ( data == "success" ) 
          {
            $.notify("User removed!", {
              animate: {
                enter:  'animated fadeInRight',
                exit:   'animated fadeOutRight',
                type:   'danger'
              }
            });

          }
        }
      });
  });
</script>
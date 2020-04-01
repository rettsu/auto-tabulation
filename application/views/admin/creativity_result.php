<?php if( $result ): ?>
	<?php foreach ($result as $i => $val): ?>
		<?php $i = $i + 1; ?>
		<?php $rate = (($val->creativity * 100) / 50) / $val->day; ?>
			<tr>
      	<div class="col col-sm-1">
        	<td style="text-align: center;"><?php echo $i; ?></td>
        </div>
        <div class="col col-sm-3">
          <td style="text-align: center;"><?php echo $val->IDNumber; ?></td>
        </div> 
        <div class="col col-sm-3">
      		<td style="text-align: center;"><?php echo number_format($rate, 2, '.', ' '); ?></td>
        </div>
      	</tr>
	<?php endforeach; ?>
<?php endif; ?>
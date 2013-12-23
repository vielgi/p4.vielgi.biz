<h2>All Changes Made To User:</h2>

<?php foreach($logs as $log): ?>
<div class="clear">
	<div class="col-sm-3">
		<i class="fa fa-calendar"></i>
	    <?=Time::display($log["modified_date"],'F j, Y')?>
	    <i class="fa fa-clock-o"></i>
	    <?=Time::display($log["modified_date"],'g:ia')?>
	</div>
	<div class="col-sm-1">
		<?=$log["first_name"]?>
	</div>
	<div class="col-sm-1">
		<?=$log["last_name"]?> 
	</div>
	<div class="col-sm-2">	
		<?=$log["address1"]?> 
	</div>
	<div class="col-sm-2">
		<?=$log["address2"]?> 
	</div>
	<div class="col-sm-1">
		<?=$log["state"]?>  
	</div>
	<div class="col-sm-1">
		<?=$log["zip"]?>
	</div>	  
	<div class="col-sm-1">
		<?=$log["country"]?> 
	</div>
</div>
<?php endforeach; ?>




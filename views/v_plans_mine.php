<?php if ($successMsg) : ?>
<h3 class="alert alert-success">
    <?php echo $successMsg; ?>
</h3>
<?php endif; ?>

<h2>Update your plans</h2>
<?php foreach($plans as $plan): ?>
<div class="col-sm-4 clear">
    <strong>
        You posted on <?=Time::display($plan["modified_date"])?>
    </strong>
    <br />
    <small>
        Last Updated on planed on <?=Time::display($plan["modified_date"])?>
    </small>
    <br />

    <form method="post" action="">

<input type="text"  name="time" value="<?=$plan['time']?>" />
        
        <!-- <input type="hidden" name="plan_id" value=<?=$plan["plan_id"]?> />
        <br /> -->
        <br />
        <input type="Submit" name="btn" class="btn btn-primary" value="Update" />

        <input type="Submit" name="btn" class="btn btn-danger pull-right" value="Delete" />

    </form>
</div>
<?php endforeach; ?>

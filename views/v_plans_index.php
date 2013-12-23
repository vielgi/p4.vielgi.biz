<h2>All Published Plans</h2>
<?php foreach($plans as $plan): ?>
<div class="col-sm-6 clear">
    <strong>
        <i class="fa fa-user"></i>
       <?=$plan['first_name']?>

           <?=$plan['last_name']?>

    </strong>
    posted on
    <i class="fa fa-calendar"></i>
    <?=Time::display($plan['modified_date'],'F j, Y')?>
    <i class="fa fa-clock-o"></i>
    <?=Time::display($plan['modified_date'],'g:ia')?>
    <br />
    <blockquote>
       <?=$plan['description']?> for 
       <?=$plan['time']?> hours
    </blockquote>
    <br />
    <br />
</div>
<?php endforeach; ?>

<h2>All Public Goals:</h2>
<?php foreach($goals as $goal): ?>
<div class="col-sm-6 clear">
    <strong>
        <i class="fa fa-user"></i>
       <!--  <?=$goal['first_name']?> -->
    </strong>
    posted on
    <i class="fa fa-calendar"></i>
    <?=Time::display($goal['modified_date'],'F j, Y')?>
    <i class="fa fa-clock-o"></i>
    <?=Time::display($goal['modified_date'],'g:ia')?>
 
</div>
<?php endforeach; ?>

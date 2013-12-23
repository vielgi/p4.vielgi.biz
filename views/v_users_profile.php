<?php if ($successMsg) : ?>
<h3 class="alert alert-success">
    <?php echo $successMsg; ?>
</h3>
<?php endif; ?>


<form method="POST" action="profile" class="form-signin">

    <h2>
        Update Your Profile:
    </h2>
    <div class="form-group">
        <label class="col-sm-12" for="first_name">First Name:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="first_name" value="<?=$user['first_name']?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="last_name">Last Name:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="last_name" value="<?=$user['last_name']?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="email">Email:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="email" value="<?=$user['email']?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="address1">Address1:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="address1" value="<?=$user['address1']?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="address2">Address2:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="address2" value="<?=$user['address2']?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="city">City:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="city" value="<?=$user['city']?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="state">State:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="state" value="<?=$user['state']?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="zip">Zip:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="zip" value="<?=$user['zip']?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="country">Country:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="country" value="<?=$user['country']?>" />
        </div>
    </div>
    <div class="col-sm-4 clear">
         <input type="Submit" name="btn" class="btn btn-primary btn-lg btn-block" value="Submit" />
    </div>


</form>
    <div class="form-group clear">
        <input type="button" id='showAssumption' value='See History of Changes' />
        <input type="button" id='hideAssumption' value='Hide: History of Changes' style="display: none" />
        <div id='assumption'>
        </div>
    </div>



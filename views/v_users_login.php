<?php if (isset($successMsg) && $successMsg) : ?>
<h3 class="alert alert-success">
    <?php echo $successMsg; ?>
</h3>
<?php endif; ?>

<form method='POST' action="/users/p_login" class="form-signin">
    <h2 class="form-signin-heading">Login:</h2>
    <div class="form-group">
        <label class="col-sm-12" for="cemail">Email</label>
        <div class="col-sm-4">
            <input type='text' id="cemail" name='email' class="form-control" placeholder="Enter Email" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="cpassword">Password</label>
        <div class="col-sm-4">
            <input type="password" id="cpassword" class="form-control" name="password" placeholder="Enter Password" />
        </div>
    </div>
    <div class="col-sm-4 clear">
        <button type='submit' class='btn btn-primary btn-lg btn-block' data-loading-text="Working..." value='Login'>Login</button>
    </div>
</form>

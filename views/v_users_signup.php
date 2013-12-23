<?php if ($errorMsgs) : ?>
<h3 class="alert alert-danger">
    <?php echo $errorMsgs; ?>
</h3>
<?php endif; ?>
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>

<div>
    <h2>Sign Up</h2>

    <form method="POST" id="signupform" action='/users/signup' role="form">
        <div class="form-group">
            <label class="col-sm-12" for="cfirst_name">First Name</label>
            <div class="col-sm-4">
                <input type="text" id="cfirst_name" class="form-control" name="first_name" placeholder="Enter First Name" required/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-12" for="clast_name">Last Name</label>
            <div class="col-sm-4">
                <input type="text" id="clast_name" class="form-control" name="last_name" placeholder="Enter Last Name" required/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-12" for="cemail">Email</label>
            <div class="col-sm-4">
                <input type="email" id="cemail" class="form-control" name="email" placeholder="Enter Email" required/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-12" for="cpassword">Password</label>
            <div class="col-sm-4">
                <input type="password" id="cpassword" class="form-control" name="password" placeholder="Enter Password" required/>
            </div>
        </div>

        <div class="col-sm-4 clear">
            <button type='submit' class='btn btn-primary btn-lg btn-block' data-loading-text="Working..." value='Sign Up'>Sign Up</button>
        </div>

    </form>
</div>
<script type="text/javascript">
    $("#signupform").validate();
</script>

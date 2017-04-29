<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="registration" />
    <label for="firstName" class="control-label">Name: </label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" name="fname" placeholder="First"/>
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" name="lname" placeholder="Last"/>
    </div>

    <label for= "username" class="control-label">Username : </label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
        <input type="text" class="form-control" name="username" placeholder="username"/>
    </div>
    <label for="password" class="control-label">Password: </label>
    <input type="password" class="form-control" name="password" placeholder="password"/>
    <label for="cpassword" class="control-label">confirm Password: </label>
    <input type="password" class="form-control" name="password2" placeholder="confirm password"/>
    <label for="email" class="control-label">Email: </label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input type="text" class="form-control" name="email" placeholder="e.g @hotmail.com"/>
    </div>
    <label for ="address1" class="control-label padding-top-10">Address:</label>
    <input type= "text" class="form-control" name="address1" placeholder="Address line 1"/>

    <?php
    //Eric: Breaking up city, state, zip for visibility
    ?>
    <div id="location" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <label for ="city" class="control-label">City:</label>
            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input type ="text" class="form-control" name="city" placeholder="your city" aria-label="city"/>
            </div>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <label for="state" class="control-label">State:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input type ="text" class="form-control" name="state" placeholder="state"/>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <label for="zipcode" class="control-label">Zipcode:</label>
            <input type ="text" class="form-control" name="zipcode" placeholder="zipcode"/>
                </div>
        </div>
    </div>

    <div class="text-right">
        <!-- Button submit-->
        <input type="submit" class="btn btn-success" name="submit"/>
        <button type="reset" class="btn btn-primary">Reset</button>


    </div>
</form>
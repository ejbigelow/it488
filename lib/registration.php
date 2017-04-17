<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="registration" />
    <label for="firstName" class="control-label">Name: </label>
    <input type="text" class="form-control" id="fname" placeholder="First"/>
    <input type="text" class="form-control" id="lname" placeholder="Last"/>
    <label for= "username" class="control-label">Username : </label>
    <input type="text" class="form-control" id="username" placeholder="username"/>
    <label for="password" class="control-label">Password: </label>
    <input type="text" class="form-control" id="password" placeholder="password"/>
    <label for="cpassword" class="control-label">confirm Password: </label>
    <input type="text" class="form-control" id="password2" placeholder="confirm password"/>
    <label for="email" class="control-label">Email: </label>
    <input type="text" class="form-control" id="email" placeholder="e.g @hotmail.com"/>
    <label for ="address1" class="control-label padding-top-10">Address:</label>
    <input type= "text" class="form-control" id ="address1" placeholder="Address line 1"/>
    <label for ="city" class="control-label">City:</label>
    <input type ="text" class="form-control" id="city" placeholder="your city"/>
    <label for="state" class="control-label">State</label>
    <input type ="text" class="form-control" id="state" placeholder="your state/region"/>
    <label for="zipcode" class="control-label">Zipcode:</label>
    <input type ="text" class="form-control" id="zip" placeholder="your zipcode"/>
    <div class="text-right">
        <!-- Button submit-->
        <input type="submit" class="btn btn-success" name="submit"/>

    </div>
</form>
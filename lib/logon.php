<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/17/17
 * Time: 1:40 PM
 */
?>
<form class="form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" accept-charset="UTF-8" id="login-nav">
    <input type="hidden" name="logon" />
<div class="my-login-form">
    <!-- Username -->
    <legend>Sign In</legend>
    <div class="input-group" >
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username or email" />
    </div>
    <!-- Password-->
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
        <input type="password" class="form-control" id="password" name="Password" placeholder="Password" />
    </div>
    <div class="text-right">
        <!-- Button submit-->
        <button class="btn btn-success">Login</button>
        <!-- Button reset -->
        <button class="btn btn-primary">Reset</button>
    </div>

</div>

</div>
    </form>
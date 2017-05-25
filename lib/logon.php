<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/17/17
 * Time: 1:40 PM
 */
if (($_GET['page'] == 'checkout')&& ($noLogin == 1)) {
    $style="my-login-form-lg";
    unset($noLogin);
}
else {
    $style="my-login-form";
    $noLogin=1;

}
?>
<form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" accept-charset="UTF-8" id="login-nav">
   <input type="hidden" name="logon" />
<div class="<?php echo $style ?>">
    <h4>Sign In</h4>
    <hr />
    <!-- Username -->
    <div class="input-group" >
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" id="usernameLogin" name="username" placeholder="Username or email" />
    </div>
    <!-- Password-->
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
        <input type="password" class="form-control" id="passwordLogin" name="password" placeholder="Password" />
    </div>
        <a href="#" class="my-login-item">Having trouble?</a>
    <div class="text-right">
        <!-- Button submit-->
        <button class="btn btn-success">Login</button>
        <!-- Button reset -->
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>
    <div>
        <input type="checkbox" class="my-login-item" value="rememberMe" />  Remember Me

    </div>


</div>
    </form>
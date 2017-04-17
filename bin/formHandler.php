<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/17/17
 * Time: 12:21 PM
 */
var_dump($_POST);
if (isset($_POST['registration']) || isset($_POST['logon'])) {
    if (isset($_POST['registration'])) {
        $alert = 1;
        $type ="alert-success text-success alert-dismissible";
        $text = "You have successfully registered!";
    }
    elseif (isset($_POST['logon'])) {
        $alert = 1;
        $type ="alert-success text-success alert-dismissible";
        $text = "Logon submitted!";    }
    else {
        $alert = 1;
        $type = "alert-danger text-danger";
        $text = "an unknown result was triggered in". $_SERVER['PHP_SELF'];
    }
}
else {
}
?>
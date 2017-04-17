<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/17/17
 * Time: 12:21 PM
 */
var_dump($_POST);
if (isset($_POST['submit'])) {
    $alert = 1;
    $type ="alert-success text-success";
    $text = "You have successfully registered!";
}
else {
        echo $_SERVER['PHP_SELF'] .":cancelled";
}
?>
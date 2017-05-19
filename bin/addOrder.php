<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 5/19/17
 * Time: 1:21 PM
 */
/* set $debug to present $_POST array debugging*/
//$debug = 1;
if (!isset($_COOKIE['username'])) {
    echo 'please login to continue';
    include INC_ROOT . 'lib/logon.php';
    exit;
}
else {
    if (isset($debug)) {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }
    if (isset($_POST['insertOrder'])) {
        $inc = $_SESSION['items'];
        echo 'User ' . sanitize($_COOKIE['UID'], null) . ' Ordered these items.<br />';
        for ($i = 0; $i < $inc; $i++) {
            $item = cartToArray($i);
            echo getItem($item, name) . "<br />";
        }
    }
}
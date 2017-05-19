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
        echo 'sub';
        include INC_ROOT . 'bin/sqlConnector.php';
        $user = sanitize($_COOKIE['UID'], null);
        $sql = "INSERT INTO orders (CustomerID,	OrderDate)
        VALUES ('$user', NOW())";
        try {
            $handler->query($sql);
            $alert = 1;
            $type = "alert-success text-success alert-dismissible";
            $text = "You have successfully registered!";

        }
        catch(PDOException $e) {
            $alert = 1;
            $type = "alert-danger text-danger alert-dismissible";
            $text = $e->getMessage();
        }
        
        $inc = $_SESSION['items'];
        echo 'User ' . sanitize($_COOKIE['UID'], null) . ' Ordered these items.<br />';
        for ($i = 0; $i < $inc; $i++) {
            $item = cartToArray($i);
            echo getItem($item, name) . "<br />";
        }
    }
}
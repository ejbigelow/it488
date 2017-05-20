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
        if ($_SESSION['cartSubmitted'] == 1) {
            echo 'There has been a submission for this order. Please click Orders above.';
        }
        /* Insert Order into Database if not already submitted for this session */
        else {
            include INC_ROOT . 'bin/sqlConnector.php';
            $user = sanitize($_COOKIE['UID'], null);
            $sql = "INSERT INTO orders (CustomerID,	OrderDate)
        VALUES ('$user', NOW())";
            try {
                $handler->query($sql);
                $alert = 1;
                $type = "alert-success text-success alert-dismissible";
                $text = "You have successfully registered!";
                $_SESSION['cartSubmitted'] = 1;
            } catch (PDOException $e) {
                $alert = 1;
                $type = "alert-danger text-danger alert-dismissible";
                $text = $e->getMessage();
            }
        }
        /* Get Order number to insert with all items */
        try {
            $query = $handler->query("SELECT * FROM orders ORDER BY OrderID DESC Limit 1");
        }
        catch(PDOException $e){
            echo $e;
        }
        while ($r = $query->fetch()) {
            $last = $r['OrderID'];

        }

        $inc = $_SESSION['items'];
        for ($i = 0; $i < $inc; $i++) {
            $item = cartToArray($i);
            $itemPrice = getItem($item, price);
            insertOrderItems($last, $item, $itemPrice);

        }
    }
}
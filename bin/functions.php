<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/7/17
 * Time: 3:07 PM
 */


/**
 * Used to sanitize $_GET variables
 * @param $input text to be sanitized.
 * @param $call value to redirect the call.
 */
function sanitize($input, $call) {
    $newstr = filter_var($input, FILTER_SANITIZE_STRING);
    $page =$newstr;

    return $page;
}

/**
 * Added security no params this function creates an alphanumeric(4) to add to existing password to increase security.
 */
function salt() {
    $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $newsalt = substr(str_shuffle($char),0,4);
    return $newsalt;
}

/**
 * Function to verify that user doesn't exist otherwise determining unique users would fail
 * $user = username to check
 * $handler = sql connect string from formHandler
 */
function chkuser($user, $handler) {
    include INC_ROOT . 'bin/sqlConnector.php';
    $query = $handler->query("SELECT * FROM users");
    while($r = $query->fetch()) {
        if ($r['username'] == $user) {
            return true;
        }
        else {
            return false;
        }
    }
}
function chkemail($email) {
    include INC_ROOT . 'bin/sqlConnector.php';
    $query = $handler->query("SELECT * FROM users");
    while($r = $query->fetch()) {
        if ($r['email'] == $email) {
            return true;
        }
        else {
            return false;
        }
    }
}
function chkPassword($username, $password) {
    include INC_ROOT . 'bin/sqlConnector.php';
    $query = $handler->query("SELECT * FROM users WHERE username = '$username'");
    while ($r = $query->fetch()) {
        if ($r['username'] == $username) {
            $dbpass = $r['Password'];
            $dbsalt = $r['salt'];
        }
        $chkpass = $password . $dbsalt;
        if (md5($chkpass) == $dbpass) {
            return true;
        }
        else {
            return false;
        }


    }

}

function login($username,$success, $handler, $time)
{
    include INC_ROOT . 'bin/sqlConnector.php';
    $query = $handler->query("SELECT * FROM users WHERE username = '$username'");
    while ($r = $query->fetch()) {
        if ($r['username'] == $username) {
            $clientName = htmlentities($r['FirstName']) . " " . htmlentities($r['LastName']);
            $clientEmail = htmlentities($r['email']);
            $UID = htmlentities($r['UserID']);
            $userlevel = htmlentities($r['userLevel']);
            $dbpass = $r['Password'];
        }
        setcookie('name', "$clientName", $time);
        setcookie('username', $username, $time);
        setcookie('userLevel', $userlevel, $time);
        setcookie('password', $dbpass, $time);
        setcookie('email', $clientEmail, $time);
        setcookie('UID',$UID,$time);

        header("location:index.php");
    }
}
function getRows($table){
    include INC_ROOT . 'bin/sqlConnector.php';
    try {
        $query = $handler->query("SELECT * FROM $table");
    }
    catch(PDOException $e){
        echo $e;
    }
    $count = 0;
    while ($r = $query->fetch()) {
        $count = $count+1;
    }
    return $count;
}
function getCategory($cat){
    include INC_ROOT . 'bin/sqlConnector.php';
    try {
        $query = $handler->query("SELECT * FROM Product_Catagories WHERE catID='$cat'");
    }
    catch(PDOException $e){
        echo $e;
    }
    while ($r = $query->fetch()) {
        $category = $r['CatName'];

    }

    return $category;
}
function catImage($cat){
    include INC_ROOT . 'bin/sqlConnector.php';
    try {
        $query = $handler->query("SELECT * FROM products WHERE categoryID='$cat' Limit 1");
    }
    catch(PDOException $e){
        echo $e;
    }
    while ($r = $query->fetch()) {
        $img = $r['ImageID'];

    }

    return $img;
}
function easyRead($n){
    $number = $n;
    if ($number % 2 == 0) {
        echo "even";
    }
    else {
        echo "nope";
    }
    return;

}
function addToCart($item){
    if (!isset($_SESSION['item1'])) {
        $items = array();
        $_SESSION['item1'] = sanitize($item, null);
        $_SESSION['items'] = $_SESSION['items'] + 1;
        array_push($items, $item);
    } else {
        if (!isset($_SESSION['item2'])) {
            $_SESSION['item2'] = sanitize($item, null);
            $_SESSION['items'] = $_SESSION['items'] + 1;
        } else {
            if (!isset($_SESSION['item3'])) {
                $_SESSION['item3'] = sanitize($item, null);
                $_SESSION['items'] = $_SESSION['items'] + 1;
            }
            else {
                if (!isset($_SESSION['item4'])){
                    $_SESSION['item4'] = sanitize($item, null);
                    $_SESSION['items'] = $_SESSION['items'] + 1;
                }
                else {
                    if (!isset($_SESSION['item5'])){
                        $_SESSION['item5'] = sanitize($item, null);
                        $_SESSION['items'] = $_SESSION['items'] + 1;
                    }
                    else {

                        if (!isset($_SESSION['item6'])){
                            $_SESSION['item6'] = sanitize($item, null);
                            $_SESSION['items'] = $_SESSION['items'] + 1;
                        }
                        else {
                            if (!isset($_SESSION['item7'])){
                                $_SESSION['item7'] = sanitize($item, null);
                                $_SESSION['items'] = $_SESSION['items'] + 1;
                            }
                            else {
                                if (!isset($_SESSION['item8'])){
                                    $_SESSION['item8'] = sanitize($item, null);
                                    $_SESSION['items'] = $_SESSION['items'] + 1;
                                }
                                else {
                                    if (!isset($_SESSION['item9'])){
                                        $_SESSION['item9'] = sanitize($item, null);
                                        $_SESSION['items'] = $_SESSION['items'] + 1;
                                    }
                                    else {
                                        echo "<script>";
                                        echo "alert('Please empty your cart or submit order!');";
                                        echo "</script>";


                                    }
                                }
                            }

                        }
                    }

                }
            }
        }
    }
    return;
}
function cartToArray($pointer){
    $items = array();
    if (isset($_SESSION['item1'])) {
        array_push($items, $_SESSION['item1']);
    }
    if (isset($_SESSION['item2'])) {
        array_push($items, $_SESSION['item2']);
    }
    if (isset($_SESSION['item3'])) {
        array_push($items, $_SESSION['item3']);
    }
    if (isset($_SESSION['item4'])) {
        array_push($items, $_SESSION['item4']);
    }
    if (isset($_SESSION['item5'])) {
        array_push($items, $_SESSION['item5']);
    }
    if (isset($_SESSION['item6'])) {
        array_push($items, $_SESSION['item6']);
    }
    if (isset($_SESSION['item7'])) {
        array_push($items, $_SESSION['item7']);
    }
    if (isset($_SESSION['item8'])) {
        array_push($items, $_SESSION['item8']);
    }
    if (isset($_SESSION['item9'])) {
        array_push($items, $_SESSION['item9']);
    }
    $value = $items[$pointer];
    /*
    echo "<pre>";
    print_r($items);
    echo "</pre>";
    */
    return $value;
}

function getItem($item, $ref) {
    include INC_ROOT . 'bin/sqlConnector.php';
    try {
        $query = $handler->query("SELECT * FROM products WHERE ProductID='$item'");
    }
    catch(PDOException $e){
        echo $e;
    }
    $count = 0;
    while ($r = $query->fetch()) {
        $itemID = $r['ProductID'];
        $itemName = $r['ProductName'];
        $itemImage = $r['ImageID'];
        $itemDesc = addslashes($r['Description']);
        $itemUnitPrice = $r['UnitPrice'];
        $itemCategory = $r['CategoryID'];
        $itemsinstock = $r['UnitsInstock'];
    }
    $itemID = $item;
    if ($ref == 'name') {
        $value = $itemName;
    }
    elseif ($ref == 'img') {
        $value = $itemImage;
    }
    elseif ($ref == 'price') {
        $value = $itemUnitPrice;
    }
    else {
        $value = "no match";
    }
    return $value;
}

function insertOrderItems($order, $item, $itemPrice){
    include INC_ROOT . 'bin/sqlConnector.php';
    $sql = "INSERT INTO order_details (OrderID,	ProductID,	Quantity,	UnitPrice)
        VALUES ('$order','$item','1','$itemPrice')";            try {
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

return;

}

function getTotalOrders($uid) {
    include INC_ROOT . 'bin/sqlConnector.php';

    try {
        $query = $handler->query("SELECT * FROM orders WHERE CustomerID='$uid'");
    }
    catch(PDOException $e){
        echo $e;
    }
    $value = 0;
    while ($r = $query->fetch()) {
        if ($uid == $r['CustomerID']) {
            $value++;
        }
        else {
        }
    }

    return $value;

}
function getTotalOrderItems($orderID) {
    include INC_ROOT . 'bin/sqlConnector.php';

    try {
        $query = $handler->query("SELECT * FROM order_details WHERE OrderID='$orderID'");
    }
    catch(PDOException $e){
        echo $e;
    }
    $value = 0;
    while ($r = $query->fetch()) {
        if ($orderID == $r['OrderID']) {
            $value++;
            //echo $value;
        }
        else {
        }
    }
    return $value;

}
function getTotalOrderCost($orderID, $shipping) {
    setlocale(LC_MONETARY,"en_US");
    $itemSalesTax = 0.06;
    include INC_ROOT . 'bin/sqlConnector.php';

    try {
        $query = $handler->query("SELECT * FROM order_details WHERE OrderID='$orderID'");
    }
    catch(PDOException $e){
        echo $e;
    }
    $value = 0;
    while ($r = $query->fetch()) {
        if ($orderID == $r['OrderID']) {
            $itemQty = $r['Quantity'];
            $itemPrice = $r['UnitPrice'];
            $itemCost = $itemQty*$itemPrice+$value;
            $value = $itemCost;

        }

        else {
        }
    }
    $taxable = $value*$itemSalesTax;
    $value = $value+$taxable+$shipping;
    return money_format("%.2n", $value);
    //return money_format("%=*(#10.2n",$value);

}

function getOrders($uid) {
    include INC_ROOT . 'bin/sqlConnector.php';
    try {
        $query = $handler->query("SELECT * FROM users WHERE userID='$uid'");
    }
    catch(PDOException $e){
        echo $e;
    }
    while ($r = $query->fetch()) {
        if ($uid == $r['UserID']) {
            $username = $r['FirstName']. " ". $r['LastName'];
        }
        else {
        }
    }
    try {
        $query = $handler->query("SELECT * FROM orders WHERE CustomerID='$uid'");
    }
    catch(PDOException $e){
        echo $e;
    }
    $i = 1;
    while ($r = $query->fetch()) {
        if ($uid == $r['CustomerID']) {
            echo "    <tr class='clickable-row tableRowHighlight text-center' data-href=\"index.php?page=orders&orderID=".$r['OrderID']."\" class=\"text-center\">\n";
            echo "       <td>\n";
            echo           $r['OrderID']."\n";
            echo "       </td>\n";
            echo "       <td>\n";
            echo           $username."\n";
            echo "       </td>\n";
            echo "       <td>\n";
            echo          $r['OrderDate']."\n";
            echo "       </td>\n";
            echo "       </td>\n";
            echo "       <td>\n";
            $orderID = $r['OrderID'];
            echo getTotalOrderItems($orderID);
            echo "       </td>\n";
            echo "       <td>\n";
            $shipping = $r['ShipCost'];
            echo getTotalOrderCost($orderID, $shipping);
            echo "       </td>\n";
            echo "    </tr>\n";
        }
        else {
        }
    }
    echo "    </tr>\n";
    return;
}

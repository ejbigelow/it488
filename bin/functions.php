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
        $_SESSION['item1'] = sanitize($item, null);
    } else {
        if (!isset($_SESSION['item2'])) {
            $_SESSION['item2'] = sanitize($item, null);
        } else {
            if (!isset($_SESSION['item3'])) {
                $_SESSION['item3'] = sanitize($item, null);
            }
            else {
                if (!isset($_SESSION['item4'])){
                    $_SESSION['item4'] = sanitize($item, null);

                }
                else {
                    if (!isset($_SESSION['item5'])){
                        $_SESSION['item5'] = sanitize($item, null);

                    }
                    else {

                        if (!isset($_SESSION['item6'])){
                            $_SESSION['item6'] = sanitize($item, null);

                        }
                        else {
                            if (!isset($_SESSION['item7'])){
                                $_SESSION['item7'] = sanitize($item, null);

                            }
                            else {

                                if (!isset($_SESSION['item8'])){
                                    $_SESSION['item8'] = sanitize($item, null);

                                }
                                else {

                                    if (!isset($_SESSION['item9'])){
                                        $_SESSION['item9'] = sanitize($item, null);

                                    }
                                    else {
                                        echo "Error, please checkut first";

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




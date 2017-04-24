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
            $userlevel = htmlentities($r['userLevel']);
            $dbpass = $r['Password'];
        }
        setcookie('name', "$clientName", $time);
        setcookie('username', $username, $time);
        setcookie('userLevel', $userlevel, $time);
        setcookie('password', $dbpass, $time);

        header("location:index.php");
    }
}
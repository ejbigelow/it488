<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/17/17
 * Time: 12:21 PM
 */

    if (isset($_POST['registration']) || isset($_POST['logon'])) {
        if (isset($_POST['registration'])) {
            /* associated post variables returned sanitized*/
            $fname = sanitize($_POST['fname'], null);
            $lname = sanitize($_POST['lname'], null);
            $username = sanitize($_POST['username'], null);
            $email = sanitize($_POST['email'], null);
            $address1 = sanitize($_POST['address1'], null);
            $city = sanitize($_POST['city'], null);
            $state = sanitize($_POST['state'], null);
            $zip = sanitize($_POST['zip'], null);
            /* unsanitized */
            $password = $_POST['password'];
            $password_confirm = $_POST['password2'];
            if ($password != $password_confirm) {
                $alert = 1;
                $type = "alert-danger text-danger alert-dismissible";
                $text = "Your passwords must match!";
            }
            else {
                include INC_ROOT . 'bin/sqlConnector.php';
                /* Encrypt password into database */
                $encryptedPassword = md5($password);
                $textPassword = "$encryptedPassword";
                //$sql = "INSERT INTO users (FirstName,LastName,username,Password,email,address1,City,state, zipcode, joined) VALUES ( {$fname},{$lname},{$username},{$textPassword},{$email},{$address1},{$city},{$state},{$zip},NOW())";
                $sql = "INSERT INTO users (FirstName,LastName,username,Password,email,address1,City,state, zipcode, joined) VALUES ('$fname', '$lname','$username','$password','$email','$address1','$city','$state','$state', NOW())";

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
            }
        } elseif (isset($_POST['logon'])) {
            $alert = 1;
            $type = "alert-success text-success alert-dismissible";
            $text = "Logon submitted!";
        } else {
            $alert = 1;
            $type = "alert-danger text-danger";
            $text = "an unknown result was triggered in" . $_SERVER['PHP_SELF'];
        }
    } else {
    }
    echo '<pre>';
var_dump($_POST);
echo '</pre>';
header("location:../index.php");
?>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/17/17
 * Time: 12:21 PM
 */

if (isset($_POST['registration']) || isset($_POST['logon']) || isset($_POST['addProduct'])) {
    echo $_POST['zipcode'];
    if (isset($_POST['registration'])) {
        include INC_ROOT . 'bin/sqlConnector.php';
        /* associated post variables returned sanitized*/
        $fname = sanitize($_POST['fname'], null);
        $lname = sanitize($_POST['lname'], null);
        $username = sanitize($_POST['username'], null);
        chkuser($username, $handler);
        $email = sanitize($_POST['email'], null);
        $address1 = sanitize($_POST['address1'], null);
        $city = sanitize($_POST['city'], null);
        $state = sanitize($_POST['state'], null);
        $zip = sanitize($_POST['zipcode'], null);
        /* unsanitized */
        $password = addslashes($_POST['password']);
        $password_confirm = addslashes($_POST['password2']);

        if ($password != $password_confirm) {
            $alert = 1;
            $type = "alert-danger text-danger alert-dismissible";
            $text = "Your passwords must match!";
        }
        else {
            /* Salt and encrypt password into database */
            $salt = salt();
            $password = $password .$salt;
            $encryptedPassword = md5($password);
            $textPassword = "$encryptedPassword";
            if (chkuser($username, $handler) == false) {
                $sql = "INSERT INTO users (FirstName,LastName,username,Password,salt, userLevel,email,address1,City,state, zipcode, joined)
VALUES ('$fname', '$lname','$username','$textPassword','$salt', '2','$email','$address1','$city','$state','$zip', NOW())";
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
            else {
                $errorNum = 1;
                if (chkuser($username, $handler) == true) {
                    $error1 = "username";
                }
                if (chkemail($email, $handler) == true) {
                    $errorNum++;
                    $error2 = "email";
                }
                $alert = 1;
                $type = "alert-danger text-danger alert-dismissible";
                if ($errorNum == 1) {
                    $text = "duplicate user found please use a different one!";
                }
                elseif($errorNum == 2) {
                    $text = "duplicate email found please use a different one!";
                }
                else {
                    $text = "duplicate values found please check all values and resubmit.";
                }

            }


        }
    } elseif (isset($_POST['logon'])) {
        $username = sanitize($_POST['username'], null);
        $password = addslashes($_POST['password']);
        if (chkPassword($username,$password) == true) {

            $alert = 1;
            $type = "alert-success text-success alert-dismissible";
            $text = "Successful Logon!";
            $time = time()+60*60;
            login($username, 1, $handler, $time);

        }
        else {
            $alert = 1;
            $type = "alert-danger text-danger alert-dismissible";
            $text = "Invalid username or password";
        }
    }
    elseif (isset($_POST['addProduct'])) {
        $productName = sanitize($_POST['Pname'], null). '<br/>';
        $productQty = sanitize($_POST['Pqty'], null). '<br/>';
        $productUnitCost = sanitize($_POST['Ucost'], null). '<br/>';
        $productDescription = sanitize(addslashes($_POST['Pdesc']), null). '<br/>';
        $productImageFile = $_POST['productImageName'];
        $action = 'upload';
/*        echo $productName;
        echo $productQty;
        echo $productDescription;
*/      $alert = 1;
        $type = "alert-success text-success alert-dismissible";
        $text = "The product was successfully registered!";
    }
    else {
        $alert = 1;
        $type = "alert-danger text-danger";
        $text = "an unknown result was triggered in" . $_SERVER['PHP_SELF'];
    }

}

?>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/25/17
 * Time: 11:56 PM
 * code to enter product data in database
 */
if (isset($_COOKIE['userLevel']) && $_COOKIE['userLevel'] >= 5) {

    if (isset($_POST['addProduct'])) {
        include '../config.php';
        include '../bin/sqlConnector.php';
        /*gather variables*/
        $productName = $_POST['Pname'];
        $productCatagory = addslashes($_POST['Pcat']);
        $productQty = $_POST['Pqty'];
        $productUnitCost = $_POST['Ucost'];
        $productDescription = addslashes($_POST['Pdesc']);
        $productImgNum = $_POST['PID'];

        /*Prepare to insert*/
        $uploader = $_COOKIE['UID'];
        $sql = "INSERT INTO products (ProductName,CategoryID,UnitPrice,UnitsInstock,imageID,Discontinued,uploader,last_updated)
VALUES ('$productName', '$productCatagory', '$productUnitCost', '$productQty', $productImgNum,'1','$uploader', NOW())";
        try {
            $handler->query($sql);
            echo "product upload successful";
            $alert = 1;
            $type = "alert-success text-success alert-dismissible";
            $text = "The product was successfully registered!";
        } catch (PDOException $e) {
            $alert = 1;
            $type = "alert-danger text-danger alert-dismissible";
            $text = $e->getMessage();
            echo $text;

        }    }
    else {

    }
}
else {
    header('location: ../index.php');
}

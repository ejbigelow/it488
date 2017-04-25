<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/24/17
 * Time: 9:55 PM
 * test script
 */
include '../config.php';
include '../bin/sqlConnector.php';
if (isset($_POST['addProduct'])) {
    /*gather variables*/
    $productName = $_POST['Pname'];
    $productQty = $_POST['Pqty'];
    $productUnitCost = $_POST['Ucost'];
    $productDescription = addslashes($_POST['Pdesc']);
    $productImageFile = $_POST['image'];
    /*
    echo $productName . '<br />';
    echo $productQty . '<br />';
    echo $productUnitCost . '<br />';
    echo $productDescription . '<br />';
*/
    $fileImage = $_FILES["image"]["name"];
    $fileData = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $fileType = $_FILES["image"]["type"];
/*    echo "file stuff";
    echo $fileImage . '<br />';
    echo $fileType . '<br />';
*/  if (substr($fileType, 0, 5) == "image") {
        include '../config.php';
        include '../bin/sqlConnector.php';
        $uploader = $_COOKIE['UID'];
        /*imgID	name	imgType	imgData	uploader	last_updated*/
        $sql = "INSERT INTO image (Iname,imgType,imgData,uploader,last_updated) VALUES ('$fileImage','$fileType', '$fileData', '$uploader', NOW())";
        try {
            $handler->query($sql);
            echo "upload successful";
            $query = $handler->query("SELECT * FROM image WHERE Iname = '$fileImage'");
            while ($r = $query->fetch()) {
                $imgNumber = $r['imgID'];
                $imgName = $r['Iname'];
            }
            echo $imgNumber;
            echo $imgName;
            echo "<img src=\"image.php?imgID=".$imgNumber."\">";


            /*ProductID	ProductName	CategoryID	UnitPrice	UnitsInstock	imageID	Discontinued*/


        } catch (PDOException $e) {
            $alert = 1;
            $type = "alert-danger text-danger alert-dismissible";
            $text = $e->getMessage();
            echo $text;
        }
    } else {
        echo "only images";
    }
    $uploader = $_COOKIE['UID'];
    /*ProductID	ProductName	CategoryID	UnitPrice	UnitsInstock	imageID	Discontinued, uploader,	last_updated*/
    $sql = "INSERT INTO products (ProductName,CategoryID,	UnitPrice,UnitsInstock,imageID,Discontinued,uploader,last_updated)
VALUES ('$productName', '$productCatagory', '$productUnitCost', '$productQty', $imgNumber,'1','$uploader', NOW())";
    try {
        $handler->query($sql);
        echo "product upload successful";

        /*ProductID	ProductName	CategoryID	UnitPrice	UnitsInstock	imageID	Discontinued*/

        $alert = 1;
        $type = "alert-success text-success alert-dismissible";
        $text = "The product was successfully registered!";
    } catch (PDOException $e) {
        $alert = 1;
        $type = "alert-danger text-danger alert-dismissible";
        $text = $e->getMessage();
        echo $text;

    }
}

else {
    ?>
    <?php
    if ($_COOKIE['userLevel'] != 5) {
        header("location:../index.php?page=home");
    }
    else {
        ?>
        <p class="text-center">Add product</p>
        <form name="addProduct" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- Item specifics-->
                <div class="col-lg-1">
                    <label for="Pname" class="control-label">Product Name: </label>
                    <label for="Pqty" class="control-label">Quantity: </label>
                    <label for="Ucost" class="control-label">Unit cost: </label>
                    <label for="Pdesc" class="control-label">category: </label>
                    <label for="Pdesc" class="control-label">description: </label>
                    <label for="Pdesc" class="control-label">file: </label>



                </div>
                <div class="col-lg-4">

                    <input type="text" class="form-control my-product-form" name="Pname" placeholder="name of item">
                    <input type="text" class="form-control my-product-form" name="Pqty" placeholder="Quantity, number of units">
                    <input type="text" class="form-control my-product-form" name="Ucost" placeholder="Unit cost, cost per unit">
                    <textarea type="text" class="form-control my-product-form" name="Pdesc" placeholder="Brief description"></textarea>
                    <input type="file" class="form-control-file" id="image" name="image" aria-describedby="fileHelp">

                </div>
                <div class="col-lg-2"></div>
            </div>
            <div>
                <?php
                $type= "alert-info";
                $text = "After you press add item you will have a chance to add a picture";
                echo "<div class=\"alert ";
                echo $type;
                echo "\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><h4>";
                echo $text;
                echo "</h4></div>";
                ?>
            </div>
            <div class="text-right">
                <!-- Button submit-->
                <button class="btn btn-success" name="addProduct">add item</button>
                <!-- Button reset -->
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </form>
        <?php

    }
    ?>



    <?php
}
?>

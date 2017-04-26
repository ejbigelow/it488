<?php
if (isset($_COOKIE['userLevel']) && $_COOKIE['userLevel'] >= 5) {

    if (isset($_POST['addPicture'])) {
        ?>
        <?php
        if ($_FILES["image"]["name"] == '') {
            header('location: imageUploaderFrame.php');
        } else {
            include '../config.php';
            include '../bin/sqlConnector.php';
            $fileImage = $_FILES["image"]["name"];
            $fileData = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
            $fileType = $_FILES["image"]["type"];
            $fileAltText = $_POST['altText'];
            $fileDescription = $_POST['imgDesc'];
            if (substr($fileType, 0, 5) == "image") {
                include '../config.php';
                include '../bin/sqlConnector.php';
                $uploader = $_COOKIE['UID'];
                $sql = "INSERT INTO image (Iname,imgType,imgData, altText, Description, uploader,last_updated) VALUES ('$fileImage','$fileType', '$fileData', '$fileAltText', '$fileDescription','$uploader', NOW())";
                try {
                    $handler->query($sql);
                    $query = $handler->query("SELECT * FROM image WHERE Iname = '$fileImage'");
                    while ($r = $query->fetch()) {
                        $imgNumber = $r['imgID'];
                        $imgName = $r['Iname'];
                    }
                } catch (PDOException $e) {
                    $alert = 1;
                    $type = "alert-danger text-danger alert-dismissible";
                    $text = $e->getMessage();
                    echo $text;
                }

            } else {
                echo "only images";
            }
        }
    }
    else {

    }
    ?>

    <?php
}
else {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ACME llc. Order form:
        Please select a file </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <link href="../css/custom.css" rel="stylesheet">
</head>
<div class="panel panel-default container">
    <div class="panel-heading">
        <h3 class="panel-title">Please add your product info</h3>
    </div>
    <div class="panel-body">
        <form name="addProduct" class="form-horizontal" action="insertProduct.php" method="post">
            <div class="row">
                <!-- Item specifics-->
                <label for="Pname" class="control-label col-sm-2 col-sm-offset-2">Product Name: </label>
                <div class="input-group col-sm-2">
                    <input type="text" class="form-control" name="Pname" placeholder="name of item">
                </div>
                <label for="Pqty" class="control-label col-sm-2 col-sm-offset-2">Quantity: </label>
                <div class="input-group col-sm-2">
                    <input type="text" class="form-control" name="Pqty" placeholder="Quantity, number of units">
                </div>
                <label for="Ucost" class="control-label col-sm-2 col-sm-offset-2">Unit cost: </label>
                <div class="input-group col-sm-2">
                    <input type="text" class="form-control" name="Ucost" placeholder="Unit cost, cost per unit">
                </div>
                <label for="Pcat" class="control-label col-sm-2 col-sm-offset-2">category: </label>
                <div class="input-group col-sm-2">
                    <select class="form-control" name="Pcat">
                        <option value="1">Electronics</option>
                        <option value="2">Housewares</option>
                        <option value="3">Outdoor</option>
                        <option value="4">Tools</option>
                    </select>
                </div>
                <label for="PID" class="control-label col-sm-2 col-sm-offset-2">Image ID: </label>
                <div class="input-group col-sm-2">
                    <input type="text" class="form-control" name="PID" value="<?php echo $imgNumber; ?>" readonly>
                </div>
                <label for="Pdesc" class="control-label col-sm-2 col-sm-offset-2">description: </label>
                <div class="input-group col-sm-2">
                    <textarea type="text" class="form-control" name="Pdesc" placeholder="Brief description"></textarea>
                </div>
                <div class="col-sm-2 col-sm-offset-2">
                    <?php
                    echo "<img class=\"img img-responsive\"src=\"image.php?imgID=" . $imgNumber . "\">";
                    ?>

                </div>
                <div class="col-sm-2">
                    Name: <?php echo $imgName; ?><br />
                    ID: <?php echo $imgNumber; ?><br/>
                    Alt Text: <?php echo $fileAltText; ?><br/>
                    Description: <?php echo $fileDescription; ?><br/>
                </div>
            </div>

            <div class="row text-right">
                <!-- Button submit -->
                <button class="btn btn-success" name="addProduct">add item</button>
                <!-- Button reset -->
                <button type="reset" class="btn btn-primary">Reset</button>
    </div>
</div>

</div>


</html>

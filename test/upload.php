<?php
if (isset($_COOKIE['userLevel']) && $_COOKIE['userLevel'] >= 5) {
    if (isset($_FILES)) {
        if ($_FILES["image"]["name"] == '') {
            header('location: imageUploaderFrame.php');
        } else {
            include '../config.php';
            include '../bin/sqlConnector.php';
            $fileImage = $_FILES["image"]["name"];
            $fileData = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
            $fileType = $_FILES["image"]["type"];
            if (substr($fileType, 0, 5) == "image") {
                include '../config.php';
                include '../bin/sqlConnector.php';
                $uploader = $_COOKIE['UID'];
                $sql = "INSERT INTO image (Iname,imgType,imgData,uploader,last_updated) VALUES ('$fileImage','$fileType', '$fileData', '$uploader', NOW())";
                try {
                    $handler->query($sql);
                    $query = $handler->query("SELECT * FROM image WHERE Iname = '$fileImage'");
                    while ($r = $query->fetch()) {
                        $imgNumber = $r['imgID'];
                        $imgName = $r['Iname'];
                    }
                    echo "<img src=\"image.php?imgID=" . $imgNumber . "\">";
                } catch (PDOException $e) {
                    $alert = 1;
                    $type = "alert-danger text-danger alert-dismissible";
                    $text = $e->getMessage();
                    echo $text;
                }
                unset($_FILES);

            } else {
                echo "only images";
            }
        }
    }
    else {

        }
}
else {
    $alert = 1;
    $type = "alert-danger text-danger alert-dismissible";
    $text = "You must log in to use this form";
    header('location:../index.php');
}
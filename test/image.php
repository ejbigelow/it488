<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/24/17
 * Time: 11:18 PM
 */
include '../config.php';
include '../bin/sqlConnector.php';
if (isset($_GET['imgID'])) {
    $id = $_GET['imgID'];
    $query = $handler->query("SELECT * FROM image WHERE imgID = '$id'");
    while ($r = $query->fetch()) {
        $imageData = $r['imgData'];
        $imageCType = $r['imgType'];
        $imgName = $r['Iname'];
    }
    header("content-type: image/png");
    echo $imageData;
}
else {
    echo "an unknown error occurred when retrieving image: probably missing an id.";
}

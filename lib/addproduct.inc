<?php
if ($_COOKIE['userLevel'] != 5) {
    header("location:../index.php?page=home");
}
else {
    echo "admin user";
}
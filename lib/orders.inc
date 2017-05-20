<h1>A list of your current orders</h1>
<hr />
<?php
if (isset($_GET['orderID'])) {
    echo 'looking at order: '. $_GET['orderID'];
}
else {
    $uid = sanitize($_COOKIE['UID'], null);
    echo "order: " . getOrders($uid) . "<br />";
}
?>
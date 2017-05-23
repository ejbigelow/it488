<h1>A list of your current orders</h1>
<hr />
<?php
if (isset($_GET['orderID'])) {
    session_destroy();
    $orderID = sanitize($_GET['orderID'], null);
    include 'order.inc';
}
else {
$uid = sanitize($_COOKIE['UID'], null);
$inc = getTotalOrders($uid);

?>
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });

</script>
<table width="100%">
    <tr>
        <th class="text-center">Order number</th>
        <th class="text-center">Name</th>
        <th class="text-center">Order date</th>
        <th class="text-center">Total items</th>
        <th class="text-center">Total Cost</th>
    </tr>
    <?php


    getOrders($uid);


    }
    ?>

</table>

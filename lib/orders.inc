<h1>A list of your current orders</h1>
<hr />
<?php
if (isset($_GET['orderID'])) {
    echo 'looking at order: '. $_GET['orderID'];
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
<table border="1" width="100%">
    <tr>
        <th width="33%" class="text-center">Order number</th>
        <th width="33%" class="text-center">Name</th>
        <th width="33%" class="text-center">Order date</th>
    </tr>
    <?php


    getOrders($uid);


    }
    ?>

</table>

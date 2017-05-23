<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 5/20/17
 * Time: 11:18 AM
 */
?>Viewing order: <?php echo $orderID."<br />";
?>
    <table width="100%">
        <tr>
            <th class="text-center">&nbsp;</th>
            <th class="text-center">Name</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Total Cost</th>
        </tr>
<?php
recallOrderDetails($orderID);
?>
<?php
if (isset($_GET['item'])) {
    $item = sanitize($_GET['item'], null);

}
else {

}
include INC_ROOT . 'bin/sqlConnector.php';
try {
    $query = $handler->query("SELECT * FROM products WHERE ProductID='$item'");
}
catch(PDOException $e){
    echo $e;
}
$count = 0;
while ($r = $query->fetch()) {
    $itemID = $r['ProductID'];
    $itemName = $r['ProductName'];
    $itemImage = $r['ImageID'];
    $itemDesc = addslashes($r['Description']);
    $itemUnitPrice = $r['UnitPrice'];
    $itemCategory = $r['CategoryID'];
    $itemsinstock = $r['UnitsInstock'];
}
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <?php echo $itemName; ?> in <a href="index.php?page=catalogue&catalogID=<?php echo $itemCategory; ?>"><?php echo getCategory($itemCategory); ?></a>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <?php
                if ($itemCategory == 2) {
                    include INC_ROOT . 'inc/colorChart.php';
                }
                ?>
                <img class="img-responsive" src="bin/image.php?imgID=<?php echo $itemImage; ?>" alt="">
            </div>
            <div class="col-sm-6 col-xs-6">
                <div class="col-xs-12">Product name: <?php echo $itemName; ?></div>
                <div class="col-xs-12">Available in Stock: <?php echo $itemsinstock; ?></div>
                <div class="col-xs-12">Price: $<?php echo $itemUnitPrice; ?></div>
                <div class="col-xs-12"><hr /></div>
                <div class="col-xs-12"><?php echo $itemDesc; ?></div>



            </div>
        </div>

        <div class="form-group"><br/></div>
        <div class="form-group"><br/></div>
        <div class="form-group">
            <?php
            $return = $_SERVER['HTTP_REFERER'];
            $checkReturn = substr_count("$return", "checkout");
            if ($checkReturn == 1) {
                $return = "http://67.253.94.5/it488/index.php?page=checkout";
            }
            else {
            }
            ?>
            <div class="col-sm-3 col-xs-3 text-left">
                <a href="index.php?page=checkout&item=<?php echo $itemID;?>" class="btn btn-success"><span
                        class="glyphicon glyphicon-shopping-cart align-left" aria-hidden="true">Buy</span></a>
                <a href="<?php echo $return; ?>" class="btn btn-default">Back</a>
            </div>
        </div>


    </div>


</div>


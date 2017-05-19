
<!-- Carousel Header -->

<div id="myCarousel" class="carousel slide" data-ride="carousel" xmlns="http://www.w3.org/1999/html">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/patio.jpg" alt="Outdoor">
        </div>

        <div class="item">
            <img src="img/electronic.jpg" alt="Electronics">
        </div>

        <div class="item">
            <img src="img/household.jpeg" alt="Household appliances">
        </div>


    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--end carousel -->
<!-- Page Features -->
<?php
include INC_ROOT . 'bin/sqlConnector.php';
if (isset($_GET['catalogID'])) {
    $catID = sanitize($_GET['catalogID'], null);
    echo "<h1 class='text-center'>Shopping in ". getCategory($catID)."</h1>";

    $output = $handler->query("SELECT * FROM products WHERE CategoryID='$catID'");
}
else {
  $output = $handler->query("SELECT * FROM products");
}
try {
    $query = $output;
}
catch(PDOException $e){
    echo $e;
}
/*Row test*/
?>
<?php
$count = 0;
while ($r = $query->fetch()) {
    $itemAvailability = $r['Discontinued'];
    if ($itemAvailability != 1) {
        $itemID = $r['ProductID'];
        $itemName = $r['ProductName'];
        $itemImage = $r['ImageID'];
        $itemDesc = addslashes($r['Description']);
        $itemUnitPrice = $r['UnitPrice'];
        $itemCategory = $r['CategoryID'];
        $itemRecent = $r['last_updated'];
    }
    if ($itemAvailability != 1) {

        ?>
        <!--- <?php echo $itemName; ?> Start--->
        <div class="col-lg-3 col-md-3, col-sm-3 col-xs-4">
            <div class="panel panel-default floating-box ">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $itemName; ?></h3>
                </div>
                <div class="panel-body">
                    <img class="img-responsive thumbnail" src="bin/image.php?imgID=<?php echo $itemImage; ?>" alt="">
                    <h4 class="visible-md hidden-lg hidden-sm hidden-xs"><?php echo $itemName; ?></h4>
                    <h5 class="visible-sm hidden-md hidden-lg hidden-xs"><?php echo $itemName; ?></h5>
                    <h6 class="visible-xs hidden-md hidden-sm hidden-lg"><?php echo $itemName; ?></h6>

                    <h3 class="visible-lg hidden-md hidden-sm hidden-xs"><?php echo $itemName; ?></h3>
                    <p class="visible-lg hidden-md hidden-sm hidden-xs"><?php echo stripcslashes($itemDesc); ?></p>
                    <p>Price: <?php echo $itemUnitPrice; ?></p>
                    <p>Category: <a href="index.php?page=catalogue&catalogID=<?php echo $itemCategory; ?>"><?php echo getCategory($itemCategory); ?></a></p>
                    <a href="index.php?page=checkout&item=<?php echo $itemID;?>" class="btn btn-primary"><span
                            class="glyphicon glyphicon-shopping-cart align-left" aria-hidden="true"></span></a>
                    <a href="index.php?page=description&item=<?php echo $itemID; ?>" class="btn btn-default">view</a>
                </div>
            </div>
        </div>
        <!--- <?php echo $itemName; ?> End--->

        <?php
    }
}
?>
<!--- Row (feature) End-->

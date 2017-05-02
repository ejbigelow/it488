<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/29/17
 * Time: 4:02 PM
 */
?>

<!--
    This catalog code
-->

<!-- Carousel Header -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
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
<!--end carrusel -->

<!-- Title -->
<div class="row">
    <div class="col-lg-12">
        <h3>New Arrivals</h3>
    </div>
</div>
<!-- /.row -->
<?php
include INC_ROOT . 'bin/sqlConnector.php';
try {
    $query = $handler->query("SELECT * FROM products");
}
catch(PDOException $e){
    echo $e;
}
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
        if ($count == 1 || $count == 4) {
            echo "     <!-- Row " . $count . " -->\n";
            echo "<div id=\"row col-sm-12" . $count . "\" class=\"row\">\n";
            echo $count;

        } else {
        }
        ?>
        <!-- Page Features -->
        <!--- <?php echo $itemName; ?> Start--->
        <div style="height: 250px" id="<?php echo $itemName; ?>" class="col-md-3 col-sm-3 hero-feature">
            <div class="thumbnail">
                <img class="img-responsive" src="test/image.php?imgID=<?php echo $itemImage; ?>" alt="">

                <div class="caption">
                    <h3><?php echo $itemName; ?></h3>

                    <p><?php echo stripcslashes($itemDesc); ?></p>

                    <p>Price: <?php echo $itemUnitPrice; ?></p>

                    <p>Category: <a
                            href="index.php?page=catelogue&catID=<?php echo $itemCategory; ?>"><?php echo getCategory($itemCategory); ?></a>
                    </p>
                    <a href="test/checkout.html" class="btn btn-primary"><span
                            class="glyphicon glyphicon-shopping-cart align-left" aria-hidden="true"></span></a>
                    <a href="index.php?page=description&item=<?php echo $itemID; ?>" class="btn btn-default">view</a>
                </div>
            </div>
        </div>
        <!--- <?php echo $itemName; ?> End--->
        <?php
        $count = $count + 1;
        if ($count == 4) {
            echo "</div>\n";
        }
    }
    else {
        /*Do not show item if Discontinued*/
    }
}
?>
<!--- Row (feature) End-->


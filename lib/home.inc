<div id="myCarousel" class="carousel slide" data-ride="carousel"  style="width: 800px; margin: 0 auto">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

        <div class="item active">
            <img src="img/orders.jpg" alt="Welcome to Orders.com" style="width:100%; height: 75% ; align-items: center">
            <div class="carousel-caption">
                <h3>Welcome to Orders.com</h3>
                <p>Best shop online experience</p>
            </div>
        </div>

        <div class="item">
            <img src="img/cart.jpg" alt="Shopping cart" style="width:100%; height: 75% ; align-items: center">
            <div class="carousel-caption">
                <h3>Purchases Online</h3>
                <p>We have what you looking for!</p>
            </div>
        </div>

        <div class="item">
            <img src="img/free-shipping-image.jpg" alt="Free Shipping" style="width:100%; height: 75%; align-items: center">
            <div class="carousel-caption">
                <h3>Free Shopping</h3>
                <p>We ship to almost everywhere</p>
            </div>
        </div>

        <div class="item">
            <img src="img/outdoor.jpeg" alt="Outdoor Furniture" style="width:100%; height: 75%; align-items: center">
            <div class="carousel-caption">
                <h3>50% off on selected furniture</h3>
                <p>End soon!</p>
            </div>
        </div>

        <div class="item">
            <img src="img/homeapplicances.jpg" alt="Home Appliances discounts" style="width:100%; height:75%; align-items: center">
            <div class="carousel-caption">
                <h3>15% off on home appliances</h3>
                <p>during mothers day!!!</p>
            </div>
        </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="row center-block">
    <?php
    include INC_ROOT . 'bin/sqlConnector.php';
        $output = $handler->query("SELECT * FROM Product_Catagories");
    try {
        $query = $output;
    }
    catch(PDOException $e){
        echo $e;
    }        while ($r = $query->fetch()) {
            $itemID = $r['ProductID'];
            //here
            $itemName = $r['CatName'];
            $itemImage = catImage($itemCategory);
            $itemDesc = addslashes($r['Description']);
            $itemUnitPrice = $r['UnitPrice'];
            //here
            $itemCategory = $r['catID'];
            $itemRecent = $r['last_updated'];

            ?>
            <!--- <?php echo $itemName; ?> Start--->
            <a href ="index.php?page=catalogue&catalogID=<?php echo $itemCategory; ?>">
            <div class="col-lg-3 col-md-3, col-sm-3 col-xs-4">
                <div class="panel panel-default floating-box ">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Shop <?php echo $itemName; ?></h3>
                    </div>
                    <div class="panel-body">
                        <img class="img-responsive thumbnail" src="bin/image.php?imgID=<?php echo catImage($itemCategory); ?>" alt=""></a>
                    </div>
                </div>
            </div>
            <?php
    }
    ?>
</div>

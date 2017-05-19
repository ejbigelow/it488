<?php
if (isset($_GET['item'])) {
    $item = sanitize($_GET['item'], null);
    addToCart($item);
}
$testinc = $_SESSION['items'];

if (isset($cartOverLoad)) {


}
?>
<div class="container ">
    <div class="row cart-head">
        <div class="container">
            <div class="row">
                <p></p>
            </div>
            <div class="row">
                <div style="display: table; margin: auto;">
                    <span class="step step_complete"> <a href="index.php" class="check-bc">Home page</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row cart-body">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Review Order <div class="pull-right"><small><a class="afix-1" href="index.php?page=destroy">cancel order</a></small></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div id="itemPictureHeader" class="col-lg-3">
                        </div>
                        <div id="itemNameHeader" class="col-lg-2">
                            Name
                        </div>
                        <div id="itemPriceHeader" class="col-lg-2">
                            Unit Price
                        </div>
                        <div id="itemQtyHeader" class="col-lg-2">
                            Quantity
                        </div>
                        <div id="itemTotalHeader" class="col-lg-2 text-center">
                            total
                        </div>
                    </div>
                    <!--Loop items here-->
                    <?php
                    $inc = $_SESSION['items'];
                    for ($i=0;$i<$inc;$i++) {
                        echo "<!--Start or item" . $i . "-->\n";
                        if ($i % 2 == 0) {
                            $even = 1;
                        }
                        else {
                            unset($even);
                        }
                        ?>
                        <div class="row <?php
                        if (isset($even)) {
                            echo "evenRow";
                        }
                        $item = cartToArray($i);
                       ?>

                        ">
                            <div id="itemPicture" class="col-lg-3">
                                <img class="img-responsive" src="bin/image.php?imgID=<?php echo getItem($item, img); ?>" alt="sample img"/>
                            </div>
                            <div id="itemName" class="col-lg-2 itemCartName">
                                <?php
                                echo getItem($item, name);
                                ?>
                            </div>
                            <div id="itemPrice" class="col-lg-2">
                                <!-- make dynamic-->
                                <input type="text" class="form-control" id="price<?php echo $i; ?>" value="<?php echo getItem($item, price)?>"
                                       readonly/><span></span>
                            </div>
                            <div id="itemQty" class="col-lg-2">
                                <!-- make dynamic-->
                                <input onchange="findTotal()" type="text" class="form-control" id="qty<?php echo $i; ?>" />
                            </div>
                            <div id="itemTotal<?php echo $i; ?>" class="col-lg-3 itemCartName text-right">
                            </div>
                        </div>
                        <hr style="width: 50%"/>
                        <?php
                    }
                    ?>
                    <!--End any loops here-->
                    <hr />
                    <!-- Totals -->
                    <div class="row" id="Totals">
                        <!--leave left blank-->
                        <div class="col-lg-6"></div>
                        <div class="col-lg-3 text-right">
                            <p>Sub Total:</p>
                            <p>Shipping:</p>
                            <p>*Sales Tax(6%):</p>
                            <p>Total: $</p>
                        </div>
                        <div class="col-lg-3 text-right">
                            <p id="displaySubtotal">&nbsp;</p>
                            <form>
                                <select class="form-control" onchange="findTotal()" id="cshipping">
                                    <option value="0.00" selected>Free (+&dollar;0.00)</option>
                                    <option value="10.00">First Class (+&dollar;10.00)</option>
                                    <option value="20.00">Next Day Air (+&dollar;20.00)</option>
                                </select>
                            </form>
                            <p id="displaySalesTax">&nbsp;</p>
                            <p id="displayTotal">&nbsp;</p>
                        </div>
                    </div>
                    <p>*Based on your State's tax regulations we will include this amount into your fee on your State's behalf.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">

</div>
<div class="row cart-footer">

</div>
<!--
<script src="../js/cart.js"></script>
-->
<script type="text/javascript">
    <!--java script total formula-->

    function findTotal(){
        <!--items multiplication-->
        <?php
        for ($i=0;$i<$inc;$i++) {
        echo "        var qty".$i." = Number(document.getElementById('qty".$i."').value);\n";

        }
        for ($i=0;$i<$inc;$i++) {
        echo "        var price".$i." = Number(document.getElementById('price".$i."').value);\n";

        }
        for ($i=0;$i<$inc;$i++) {
        echo "        var ptotal".$i."=qty".$i."*price".$i.";\n";
        }
        for ($i=0;$i<$inc;$i++) {
        echo "        var ptotalFix".$i." = ptotal".$i.".toFixed(2);\n";
        }
        echo "        /* Subtotal */\n";



 ?>
        /*Fixed variables*/
        var shipping = Number(document.getElementById('cshipping').value);

        /*item totals */
        <?php
            for ($i=0;$i<$inc;$i++) {
                    echo "        document.getElementById('itemTotal".$i."').innerHTML = '$' + ptotalFix".$i.";\n";

            }
            echo "        /* Cart total */\n";
            echo "         var subtotal = 0.00;\n";
            for ($i =0;$i<$inc;$i++) {
            echo "          var subtotal = subtotal + ptotal".$i.";\n";
            echo "            console.log(subtotal);\n";
            }
        ?>
        /* order sub total */
        document.getElementById("displaySubtotal").innerHTML = '$' + subtotal.toFixed(2);

        /* display sales tax */
        var totalTax = subtotal*0.06.toFixed(2);
        document.getElementById("displaySalesTax").innerHTML = '$' + totalTax.toFixed(2);
        /* display order total */
        var total = shipping + subtotal + totalTax;
        document.getElementById("displayTotal").innerHTML = total.toFixed(2);

    }
    <!--End java script sum-->

</script>

</body>
<?php
function cartToArray($pointer){
    $items = array();
    if (isset($_SESSION['item1'])) {
        array_push($items, $_SESSION['item1']);
    }
    if (isset($_SESSION['item2'])) {
        array_push($items, $_SESSION['item2']);
    }
    if (isset($_SESSION['item3'])) {
        array_push($items, $_SESSION['item3']);
    }
    if (isset($_SESSION['item4'])) {
        array_push($items, $_SESSION['item4']);
    }
    if (isset($_SESSION['item5'])) {
        array_push($items, $_SESSION['item5']);
    }
    if (isset($_SESSION['item6'])) {
        array_push($items, $_SESSION['item6']);
    }
    if (isset($_SESSION['item7'])) {
        array_push($items, $_SESSION['item7']);
    }
    if (isset($_SESSION['item8'])) {
        array_push($items, $_SESSION['item8']);
    }
    if (isset($_SESSION['item9'])) {
        array_push($items, $_SESSION['item9']);
    }
    $value = $items[$pointer];
    /*
    echo "<pre>";
    print_r($items);
    echo "</pre>";
    */
    return $value;
}
?>
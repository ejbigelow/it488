<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ACME llc. Order form:
        Checkout        </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link href="../css/custom.css" rel="stylesheet">


</head>
<body>


<div class="container ">
    <div class="row cart-head">
        <div class="container">
            <div class="row">
                <p></p>
            </div>
            <div class="row">
                <div style="display: table; margin: auto;">
                    <span class="step step_complete"> <a href="index.html" class="check-bc">Home page</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row cart-body">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Review Order <div class="pull-right"><small><a class="afix-1" href="index.html">cancel order</a></small></div>
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
                        <div id="itemTotalHeader" class="col-lg-2">
                            total
                        </div>
                    </div>
                    <!--Loop items here-->
                    <?php
                    $inc = 1;
                    for ($i=1;$i<=$inc;$i++) {
                        echo "<!--Start or item" . $i . "-->\n";

                        ?>
                        <div class="row">
                            <div id="itemPicture" class="col-lg-3">
                                <img class="img-responsive" src="../img/242x200.png" alt="sample img"/>
                            </div>
                            <div id="itemName" class="col-lg-2 itemCartName">
                                whirlygig
                            </div>
                            <div id="itemPrice" class="col-lg-2">
                                <input type="text" class="form-control" name="price" id="price" value="1.00"
                                       readonly/><span></span>
                            </div>
                            <div id="itemQty" class="col-lg-2">
                                <input onchange="findTotal()" type="text" class="form-control" id="qty"
                                       placeholder="Qty"/>
                            </div>
                            <div id="itemTotal" class="col-lg-2 itemCartName">
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

<script src="../js/cart.js"></script>


</body>

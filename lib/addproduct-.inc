<?php
if ($_COOKIE['userLevel'] != 5) {
    header("location:../index.php?page=home");
}
else {
    ?>
    <p class="text-center">Add product</p>
    <form name="addProduct" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <!-- Item specifics-->
            <div class="col-lg-1">
                <label for="Pname" class="control-label">Product Name: </label>
                <label for="Pqty" class="control-label">Quantity: </label>
                <label for="Ucost" class="control-label">Unit cost: </label>
                <label for="Pdesc" class="control-label">category: </label>
                <label for="Pdesc" class="control-label">description: </label>
                <label for="Pdesc" class="control-label">file: </label>



            </div>
            <div class="col-lg-4">

                <input type="text" class="form-control my-product-form" name="Pname" placeholder="name of item">
                <input type="text" class="form-control my-product-form" name="Pqty" placeholder="Quantity, number of units">
                <input type="text" class="form-control my-product-form" name="Ucost" placeholder="Unit cost, cost per unit">
                <textarea type="text" class="form-control my-product-form" name="Pdesc" placeholder="Brief description"></textarea>
                <input type="file" class="form-control-file" id="exampleInputFile" name="productImageName" aria-describedby="fileHelp">

            </div>
            <div class="col-lg-2"></div>
        </div>
        <div>
            <?php
            $type= "alert-info";
            $text = "After you press add item you will have a chance to add a picture";
            echo "<div class=\"alert ";
            echo $type;
            echo "\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><h4>";
            echo $text;
            echo "</h4></div>";
            ?>
        </div>
        <div class="text-right">
            <!-- Button submit-->
            <button class="btn btn-success" name="addProduct">add item</button>
            <!-- Button reset -->
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form>
    <?php

}
?>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/25/17
 * Time: 9:55 PM
 */
if (isset($_COOKIE['userLevel']) && $_COOKIE['userLevel'] >= 5) {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ACME llc. Order form:
            Please select a file </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <link href="../css/custom.css" rel="stylesheet">
    </head>
    <div class="panel panel-default container">
        <div class="panel-heading">
            <h3 class="panel-title">Please select your product image</h3>
        </div>
        <div class="panel-body">
            <form id="addPicture" class="form-horizontal" action="lib/form2.php" method="post" enctype="multipart/form-data">
                <div class="">
                    <!-- Username -->
                    <label for= "altText" class="control-label col-sm-2 col-sm-offset-2">Alt text: </label>
                    <div class="input-group col-sm-5" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
                        <input type="text" class="form-control "  name="altText" placeholder="alternate text for screen readers" required/>
                    </div>
                    <!-- Password-->
                    <label for= "username" class="control-label col-sm-2  col-sm-offset-2">Description: </label>

                    <div class="input-group col-sm-5">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-film"></i></span>
                        <input type="text" class="form-control" name="imgDesc" placeholder="Description" required/>
                    </div>
                    <label for="Pdesc" class="control-label col-sm-2 col-sm-offset-2">Select file: </label>
                    <input type="file" class="form-control-file col-sm-5" id="image" name="image" />

                </div>
                <div class="text-right row">
                    <!-- Button submit-->
                    <button class="btn btn-success" name="addPicture">add item</button>
                    <!-- Button reset -->
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div>
        </div>

        </form>
    </div>
    </div>
    </div>

    </html>
    <?php
}
else {
    header('location: ../index.php');
}

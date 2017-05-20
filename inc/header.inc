<!DOCTYPE html>
<?php
if (isset($_GET['page'])) {
    $test = $_GET['page'];
    $page = sanitize($test, null);
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ACME llc. Order form:
        <?php
        if ($page == null) {
            echo " Home";
        }
        else {
            echo " ". sanitize($_GET['page'], null);
        }

        ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <script>
    </script>
</head>
<body>
<?php
/*Get all page includes*/
include INC_ROOT . 'inc/modalLoaderUserReg.php';
include INC_ROOT . 'bin/highlink.php';
?>
<div class="navbar navbar-default navbar-inverse navbar-fixed-top navbar-full">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".mainMenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            if (isset($_COOKIE['name'])) {
                echo "<a href=\"index.php\" class=\"navbar-brand hidden-sm\">".$_COOKIE['name']."</a>";

            }
            else {
                echo "<a href=\"index.php\" class=\"navbar-brand hidden-sm\">ORDERS.COM</a>";
            }
            ?>

        </div>
        <!-- Menu Items -->
        <div class="collapse navbar-collapse mainMenu">
            <ul class="nav navbar-nav">
                <?php echo $home;?><a href="index.php">Home</a></li>
                <?php echo $about;?><a href="index.php?page=about">About</a></li>
                <?php echo $privacy;?><a href="index.php?page=privacy">Privacy</a></li>
                <?php echo $catalogue;?><a href="index.php?page=catalogue">Catalogue</a></li>
                <?php echo $events; ?><a href="index.php?page=events">Events</a></li>
                <?php echo $help; ?><a href="index.php?page=help">Help</a></li>
                <?php if (isset($_SESSION['item1'])) {
                    echo "<li><a href='index.php?page=checkout'>View cart</a></li>";
                }
                ?>
            </ul>
            <!-- This entire section will remain hidden during phase1 but will be accessible via URL and challenge -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form pull-left hidden-md hidden-sm hidden-xs" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </form>
                </li>
                <!--User Sign-up/ Orders link -->
                <?php
                if (isset($_COOKIE['name']) && $_COOKIE['userLevel'] < 5) {
                    echo "<li><a data-toggle=\"modal\" href=\"index.php?page=orders\"><span class=\"hidden-sm\"></span>Orders</a></li>";
                }
                elseif (isset($_COOKIE['name']) && $_COOKIE['userLevel'] == 5) {
                    echo "<li class=\"dropdown\">";
                    echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><span class=\"glyphicon glyphicon-cog\"></span><span class=\"hidden-sm\">Admin menu</span> <span class=\"caret\"> </span></a>";
                    echo "<ul id=\"login-dp\" class=\"dropdown-menu\">";
                    echo "<li><a href=\"index.php?page=addproduct\">Add product</a>";
                    echo "</ul>";
                }
                else {
                    echo "<li><a data-toggle=\"modal\" href=\"#myModal\"><span class=\"glyphicon glyphicon-user\"></span><span class=\"hidden-sm\"> Sign Up</span></a></li>";

                }
                ?>

                <!--User logon -->
                <?php
                if (isset($_COOKIE['name'])) {
                    echo "<li><a href=\"index.php?page=logout\"><span class=\"glyphicon glyphicon-log-in\"></span><span class=\"hidden-sm\">  Logout</span></a></li>";
                }
                else {

                    echo "<li class=\"dropdown\">";
                    echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><span class=\"glyphicon glyphicon-log-in\"></span><span class=\"hidden-sm\">  Login</span> <span class=\"caret\"></span></a>";
                    echo "<ul id=\"login-dp\" class=\"dropdown-menu\">";
                    echo "<li>";
                    include INC_ROOT . "lib/logon.php";
                    echo "</li>";
                }
                ?>
            </ul>
            </li>
            </ul>
            <!-- Stop hiding here -->
        </div>
    </div>
</div>
<!--
    BREAK AND START BODY HERE
-->

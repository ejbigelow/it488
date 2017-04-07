<div class="container">
    <div class="well">
        <?php
        if (isset($page)) {
            echo $page;
        }

        else {

            $precheck = 1;
//object to manage sql connections
            include 'bin/sqlConnector.php';

            echo "<h3>Congratulations! Sequel and your configurations are setup correctly.</h3>";
        }
        ?>
    </div>
</div>

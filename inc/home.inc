<div class="container">
    <?php
    /**
    alert box
     * @alert Boolean to trigger alert box
     * @type = bootstrap alert type, success, warning, or error.
     * @text = text to display
     */
    if (isset($alert)) {
        echo "<div class=\"alert ";
        echo $type;
        echo "\"><h4>";
        echo $text;
        echo "</h4></div>";
    }
    //remove the message
    unset($alert);
    ?>
    <div class="well">
        <?php
        if (isset($page)) {
            echo sanitize($page, null);
        }

        else {

       //     $precheck = 1;
//object to manage sql connections
            include 'bin/sqlConnector.php';

            echo "<h3>Congratulations! Sequel and your configurations are setup correctly.</h3>";
        }
        ?>
    </div>
</div>

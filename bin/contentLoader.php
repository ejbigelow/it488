<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/17/17
 * Time: 4:15 PM
 * This file verifies and loads pages from the library home, about, catalogue, etc
 */
?>
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
        echo "\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><h4>";
        echo $text;
        echo "</h4></div>";
    }
    //remove the message
    unset($alert);
    ?>
    <?php
    if (isset($page)) {

            $file = INC_ROOT . "lib/" . sanitize($page, null) . ".inc";
            include $file;
    }
    else {
        include INC_ROOT . 'lib/home.inc';

    }
    ?>
</div>
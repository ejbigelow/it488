<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 3/29/17
 * Time: 11:54 AM
 */
define('INC_ROOT', dirname(__DIR__). '/it488/') ;
//PHP
include INC_ROOT . 'bin/functions.php';
include INC_ROOT . 'bin/formHandler.php';


//HTML
include INC_ROOT . 'inc/header.inc';
include INC_ROOT . 'bin/contentLoader.php';
include INC_ROOT . 'inc/footer.inc';

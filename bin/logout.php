<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/24/17
 * Time: 12:20 PM
 * simple logout script
 */

include INC_ROOT . 'bin/functions.php';

$time = time()-60;
login($_COOKIE['username'], 1,$handler,$time);

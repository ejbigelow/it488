<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/7/17
 * Time: 3:07 PM
 */

/**
 * Used to sanitize $_GET variables
 * @param $input text to be sanitized.
 * @param $call value to redirect the call.
 */
function sanitize($input, $call) {
    $newstr = filter_var($input, FILTER_SANITIZE_STRING);
   $page =$newstr;

return $page;
}

/**
*/


/**
*/
function getTitle($page){
    $pretext = "Welcome to ACME: ";

}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/7/17
 * Time: 3:07 PM
 */

/**
 * @param $input text to be sanitized.
 * @param $call value to redirect the call.
 */
function sanitize($input, $call) {
    echo "sanitized ";

    if ($call == NULL) {
        echo "no calling page";
    }
    else {
        echo "calling".$call;
    }
return $input;
}

/**
*/


/**
*/
function getTitle($page){
    $pretext = "Welcome to ACME: ";

}
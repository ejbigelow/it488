<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 3/29/17
 * Time: 11:55 AM
 */
/**
 * EMBEDDING CREDENTIALS AS I DO HERE IS UNADVISABLE IN A PRODUCTION SITE; HOWEVER, IT IS PERFECTLY FINE IN MOST DEVELOPMENT
 * CASES. GENERALLY, THIS TYPE OF FILE WOULD BE DISTRIBUTED VIA A SECURE METHOD AND ADDED TO THE .gitignore FILE TO PREVENT
 * IT BEING STAGED.
 *
 *
 *
 */
try {
    $handler = new PDO('mysql:dbname=IT488;host=localhost','root','SFT.678');
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo "Something has gone wrong with your connection to the Database<br/>";
    if (isset($precheck)) {
        echo "Please make sure your database is created with a database named 'IT488' with the correct credentials.";
    }
}


try {

    include $include;
}
catch(exception $e) {
    echo $e;
}


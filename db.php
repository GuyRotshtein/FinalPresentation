<?php
    $dbhost = 
    $dbuser = 
    $dbpass = 
    $dbname = 

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // connection status check
    if(mysqli_connect_errno()) {
        die("DB connection failure;" . mysqli_connect_error() . ". error code: " . mysqli_connect_errno() . ".");

    }

?>
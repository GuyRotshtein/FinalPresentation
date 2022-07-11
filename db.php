<?php
    $dbhost = "148.66.138.145";
    $dbuser = "dbusrShnkr22";
    $dbpass = "studDBpwWeb1!";
    $dbname = "dbShnkr22studWeb1";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // connection status check
    if(mysqli_connect_errno()) {
        die("DB connection failure;" . mysqli_connect_error() . ". error code: " . mysqli_connect_errno() . ".");
    };
?>
<?php

include "db.php";
//include "config.php";
session_start();

if (!empty($_POST["submit"])) {
    $query = "SELECT * FROM dbShnkr22studWeb1.tbl_218_owner WHERE email= '" . $_POST["uMail"] . "' and password = '" . $_POST["uPass"] . "' ";

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    $_SESSION["imge"] = $row["imge"];
    $_SESSION['owner_name'] = explode(" ",$row['name']);
    
    if (is_array($row)) {
        $_SESSION["owner_id"] = $row["owner_id"];
        header('Location: homePage.php');
    } else {
        $message = "Invalid email or password!";
        header('Location: index.html');
    }
}
?>
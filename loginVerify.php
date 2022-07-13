<?php

include "db.php";
//include "config.php";
session_start();

if (!empty($_POST["submit"])) {
    $query = "SELECT * FROM dbShnkr22studWeb1.tbl_218_owner WHERE email= '" . $_POST["uMail"] . "' and password = '" . $_POST["uPass"] . "' ";

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["owner_id"] = $row["owner_id"];
        header('Location: homePage.php');
    } else {
        $message = "Invalid email or password!";
    }
}
?>
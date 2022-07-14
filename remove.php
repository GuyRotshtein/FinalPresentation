<?php
include "db.php";
include "config.php";

session_start();
header("Cache-Control: no-cache, no-store", true);

if(!isset($_SESSION["owner_id"])){header('Location: index.php');}

if(!isset($_GET['pet_id'])){header('Location: listPage.php');}
$id = $_GET['pet_id'];

//delete event 
$removeEvent = "DELETE FROM dbShnkr22studWeb1.tbl_218_owner WHERE event_id = 1";

$result = mysqli_query($connection, $removeEvent);
$row = mysqli_fetch_assoc($result);

header("Location: objectPage.php?event = ". $id);
?>

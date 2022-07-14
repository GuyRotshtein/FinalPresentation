<?php
include "db.php";
session_start();
header("Cache-Control: no-cache, no-store", true);
if (!isset($_SESSION["owner_id"])) {
    header('Location: index.html');
}

$id = $_GET['pet_id'];
$query = "SELECT * FROM dbShnkr22studWeb1.tbl_218_pet WHERE pet_id = " . $id;
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="./js/addPetPage.js" type="module"></script>
    <title>ManaPet - add a new pet</title>
</head>

<body>
    <header>
        <a class="topLogo" href="./#"><img src="./images/logo.png"></a>
        <h1>ManaPet</h1>
        <h4 class="brudCrumbs">Your logistics assistant for the pet's daily life my ass</h4>
        <div class="statusBox">
            <span class="clockWidget">time</span>
            <br>
            <span class="timeWidget">good time, user</span>
            <img src="./images/greg.png">
        </div>
        <nav>
            <a href="./index.html">Home Page</a>
            <a href="./listPage.html" class="selected">My Pets</a>
            <a href="#">Events</a>
            <a href="#">Calendar</a>
            <a href="#">Logistics</a>
        </nav>
        <input class="searchInput" type="text" placeholder="Search">
        <svg class="menuHumburger" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </header>
    <nav class="breadCrumbs">
        <a href="./homePage.php" class="firstBreadCrumb">Home</a>
        <a href="./listPage.php" class="BreadCrumb">My Pets</a>
        <a href="./objectPage.php" class="BreadCrumb"><?php echo $row["pet_name"];?></a>
        <a href="#" class="currentBreadCrumb">Delete pet</a>
    </nav>
    <section>
        <h1 class="formTitle">Delete <?php echo $row["pet_name"];?> ?</h1>
        <div id="formWrapper">
            <form action="/objectPage.php" method="GET">
                <?php echo '<input type="hidden" name="pet_id" value="'.$id.'">'; ?>
                <button type="submit" class="btn btn-primary">Cancel deleting <?php echo $row['pet_name']; ?></button>
            </form>
            <form action="/Petdeleted.php" method="GET">
            <?php echo '<input type="hidden" name="pet_id" value="'.$id.'">'; ?>
                <button type="submit" class="deleteButton" class="btn btn-primary">Confirm deleting <?php echo $row['pet_name']; ?></button>
            </form>
        </div>
    </section>

</body>

</html>
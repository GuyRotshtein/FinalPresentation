<?php
session_start();
header("Cache-Control: no-cache, no-store", true);

if(!isset($_SESSION["owner_id"])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <script defer src="./js/javascript.js" type="module"></script>
    <title>successfully added new pet</title>
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
        <a href="#" class="currentBreadCrumb">Pet added</a>
    </nav>
    <section>
        <h1 class="success">Pet was added successfully</h1>
        <?php
        $pet_name = $_GET["petName"];
        $species = $_GET["species"];
        $age = $_GET["age"];

        echo "<h1>Name: " . $pet_name .  "</h1><br>";
        echo "<h3>Species: " . $species .  "</h3><br>";
        echo "<h3>Age: " . $age .  "</h3><br>";
        ?>
    </section>
</body>

</html>
<?php
    //close DB connection
    mysqli_close($connection);
?>
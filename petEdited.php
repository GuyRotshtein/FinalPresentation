<?php
session_start();
include "db.php";
include "config.php";

header("Cache-Control: no-cache, no-store", true);
if (!isset($_SESSION["owner_id"])) {
    header('Location: index.html');
}


$id = $_GET['pet_id'];
if(!isset($_GET['pet_id'])){header('Location: listPage.php');}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="./js/listPage.js" type="module"></script>
    <title>successfully edited pet info</title>
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
            <a href="./homePage.php">Home Page</a>
            <a href="./listPage.php" class="selected">My Pets</a>
            <a href="#">Events</a>
            <a href="#">Calendar</a>
            <a href="#">Logistics</a>
            <a href="logout.php">Log out</a>
        </nav>
        <input class="searchInput" type="text" placeholder="Search">
        <svg class="menuHumburger" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </header>
    <nav class="breadCrumbs">
        <a href="./homePage.php" class="firstBreadCrumb">Home</a>
        <a href="./listPage.php" class="BreadCrumb">My Pets</a>
        <a href="#" class="currentBreadCrumb">Edited</a>
    </nav>
    <section>
        <div class="eventFormWrapper">
                <?php
                $pet_name = $_GET["petName"];
                $species = $_GET["species"];
                $age = $_GET["age"];
                $picture = $_GET["petPicture"];
                $general_species = $_GET["generalSpecies"];
                if(!isset($_GET['petPicture'])){ $picture = $_GET['old_pic'];}
                if(!isset($_GET['species'])){ $picture = $_GET['old_species'];}

                $sql = "UPDATE dbShnkr22studWeb1.tbl_218_pet 
                        SET pet_name = '$pet_name', species = '$species', general_species = '$general_species', age = '$age', picture = '$picture'
                WHERE pet_id = $id";

                $owner_id = $_SESSION["owner_id"];
                if ($connection->query($sql) === TRUE) {
                        echo '<form action="http://se.shenkar.ac.il/students/2021-2022/web1/dev_218/listPage.php" method="GET">';
                        echo '<h2 class="success">' . $pet_name . ' had their details updated successfully</h2>';
                        echo '<button type="submit" class="btn btn-primary"> Return to List page </button>';
                        echo '</form>'; 
                }else {
                    echo '<form action="http://se.shenkar.ac.il/students/2021-2022/web1/dev_218/editPetPage.php" method="GET">';
                    echo '<h4 class=success"> An error occured:' . $sql . '<br>' . $connection->error . '</h4>';
                    echo '<button type="submit" class="btn btn-primary"> Return to form page </button>';
                    echo '</form>';
                }
                ?>
            </form>
        </div>
    </section>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>
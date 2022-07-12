<?php
include "db.php";
include "config.php";
session_start();

$query = "SELECT * FROM dbShnkr22studWeb1.tbl_218_pet WHERE pet_id = '1'";

global $result, $row;
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css">
    <title>ManaPet - My pets</title>
    <script defer src="./js/javascript.js" type="module"></script>
</head>
<body>
    <header>
        <a class="topLogo" href="./#"><img src="./images/logo.png"></a>
        <h1>ManaPet</h1>
        <h4 class="brudCrumbs">Your logistics assistant for the pet's daily life</h4>
        <div class="statusBox">
            <span class="clockWidget">time</span>
            <br>
            <span class="timeWidget">good day, user</span>
            <img src="./images/greg.png">
        </div>
        <nav>
            <a href="./homePage.php">Home Page</a>
            <a href="./Listpage.php"  class="selected">My Pets</a>
            <a href="#">Events</a>
            <a href="#">Calendar</a>
            <a href="#">Logistics</a>
        </nav>
        <input class="searchInput" type="text" placeholder="Search">
        <svg class="menuHumburger" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </header>
    <nav class="breadCrumbs">
        <a href="./homePage.php" class="firstBreadCrumb">Home</a>
        <a href="./Listpage.php" class="BreadCrumb">My Pets</a>
        <a href="./Listpage.php" class="currentBreadCrumb">Pet List</a>
    </nav>

    <div class="humburger">
        <div class="information">
            <img src="./images/greg.png" alt="">
            <h3>Greg</h3>
        </div>

        <div class="listMenu">
            <ul>
                <li class="selectedOnMenu"><a href="./homePage.php">HomePage</a></li>
                <li><a href="./Listpage.php">My Pets</a></li>
                <li><a href="#">Daily Events</a></li>
                <li><a href="#">Calendar</a></li>
                <li><a href="#">Logistic</a></li>
                <div class="line">texttext</div>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
            <a href="#">About us</a>
            <span>|</span>
            <a href="#">Support</a>
        </div>
    </div> 
    <div id="petListBackground">
        <article id="listHeader">
            <h1>My pets</h1>
            <h2>Upcoming Replacements</h2>
            <h3>Task status</h3>
        </article>
        <div id="petList">
            <a class="petEntry" href="./objectPage.php">
                <div class="entryBackground"></div>
                <div class="petEntryLogistic">
                    <span>
                        Kibble 25kg food bag <br/>
                        in: 3 days
                    </span>
                </div>
                <div class="petEntryName"> 
                    <?php echo '<img src="/images/pets/'.$row['pet_id'].'/'.$row['picture'].'"/>'; ?>
                    <span>
                        <?php if(isset($row['pet_name'])) { echo $row['pet_name']; } else { echo "ERROR"; } ?>
                    </span>
                </div>
                <div class="petEntryStatus">
                    <div>
                        <img src="./images/icons/Error_Icon_1.png">
                        <span class="missedTaskColor">Task missed !</span>
                    </div>
                    <div>
                        <img src="./images/icons/Notification_Important_Icon_1.png">
                        <span class="todayTaskColor">Close Task</span>
                    </div>
                </div>
            </a>
            <!-- Pets here! -->
            <div class="addEntry" href="#">
                <a href="./addPetPage.html"><img src="./images/icons/Add_an_essential_1.png"></a>
            </div>

            <div class="emptyEntry"></div>

            <div class="emptyEntry"></div>

            <div class="emptyEntry"></div>

            <div class="emptyEntry"></div>
            
            <div class="emptyEntry"></div>
        </div>
    </div>
</body>
</html>
<?php mysqli_close($connection); ?>
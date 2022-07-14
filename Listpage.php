<?php
include "db.php";
include "config.php";
session_start();
header("Cache-Control: no-cache, no-store", true);

if(!isset($_SESSION["owner_id"])){
    header('Location: index.php');
}

$query =    'SELECT * 
            FROM dbShnkr22studWeb1.tbl_218_pet 
            INNER JOIN dbShnkr22studWeb1.tbl_218_owners_pets
            ON dbShnkr22studWeb1.tbl_218_pet.pet_id = dbShnkr22studWeb1.tbl_218_owners_pets.pet_id
            AND dbShnkr22studWeb1.tbl_218_owners_pets.owner_id = '.$_SESSION['owner_id'].'';       

$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>ManaPet - My pets</title>
    <script defer src="./js/listPage.js" type="module">test()</script>
    </script>   
</head>

<body>
    <header>
        <a class="topLogo" href="./#"><img src="./images/logo.png"></a>
        <h1>ManaPet</h1>
        <h4 class="brudCrumbs">Your logistics assistant for the pet's daily life</h4>
        <div class="statusBox">
            <span class="clockWidget">time</span>
            <br>
            <span class="timeWidget">good day, </span>
            <?php echo '<img src="./images/users/' . $_SESSION["owner_id"] . '/' . $_SESSION["imge"] . '" alt="Profile picture"/>'; ?>
        </div>
        <nav>
            <a href="./homePage.php">Home Page</a>
            <a href="./listPage.php" class="selected">My Pets</a>
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
        <a href="./listPage.php" class="currentBreadCrumb">Pet List</a>
    </nav>

    <div class="humburger">
        <div class="information">
            <img src="./images/greg.png" alt="">
            <h3>Greg</h3>
        </div>

        <div class="listMenu">
            <ul>
                <li class="selectedOnMenu"><a href="./homePage.php">HomePage</a></li>
                <li><a href="./listPage.php">My Pets</a></li>
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
            <?php 
            // add loop w/ row
            while($row = mysqli_fetch_assoc($result)) {
                echo '
                        <form action="./objectPage.php" method="GET">
                            <input type="hidden" name="Pet_id" value="'.$row['pet_id'].'">
                            <a class="petEntry" href="./objectPage.php?pet_id='.$row['pet_id'].'">
                                <div class="entryBackground"></div>
                                <div class="petEntryLogistic">
                                    <span>
                                        Kibble 25kg food bag <br />
                                        in: 3 days
                                    </span>
                                </div>
                                <div class="petEntryName">
                                    <img src="/images/upload/'. $row['picture'] .'"/>
                                    <span>
                                        ' . $row['pet_name'] . '
                                    </span>
                                 </div>
                                <div class="petEntryStatus">';
                // add a missed task check
                if ($row['age'] === 0) {
                echo '
                                    <div>
                                        <img src="./images/icons/Error_Icon_1.png">
                                        <span class="missedTaskColor">Task missed !</span>
                                    </div>
                ';
                }
                // add a close task check
                if ($row['age'] === 0) {
                    echo '
                                        <div>
                                            <img src="./images/icons/Notification_Important_Icon_1.png">
                                            <span class="todayTaskColor">Close Task</span>
                                        </div>
                ';
                } else {
                    echo '
                                        <div>
                                            <img src="./images/icons/Clock_Icon_1.png">
                                            <span class="regularTaskColor">No Close tasks</span>
                                        </div>
                ';
                }
                echo '
                                </div>
                            </a>
                        </form>
                ';
            }
            ?>
            <!-- Pets here! -->
            <div class="addEntry" href="#">
                <a href="./addPetPage.php"><img src="./images/icons/Add_an_essential_1.png"></a>
            </div>
        </div>
    </div>
</body>

</html>
<?php mysqli_close($connection); ?>
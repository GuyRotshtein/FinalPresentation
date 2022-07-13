<?php 
    include "db.php";

    session_start();
header("Cache-Control: no-cache, no-store", true);

if(!isset($_SESSION["owner_id"])){
    header('Location: index.php');
}

    // get data for events 

    $query = "SELECT * FROM dbShnkr22studWeb1.tbl_218_event AS tb1 JOIN dbShnkr22studWeb1.tbl_218_owners_pets AS tb2 
    ON tb1.pet_id = tb2.pet_id WHERE tb2.owner_id =". $_SESSION['owner_id'];
   
    //$query = "SELECT * FROM dbShnkr22studWeb1.tbl_218_pet";
    $result = mysqli_query($connection, $query);
    
    if(!$result){
         die("DB connect faild!");
    }        

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>ManaPet - Home</title>
    <script defer src="./js/javascript.js" type="module"></script>
</head>

<body>
    <header>
        <a class="topLogo" href="./#"><img src="./images/logo.png" /></a>
        <h1>ManaPet</h1>
        <h4 class="brudCrumbs">
            Your logistics assistant for the pet's daily life
        </h4>
        <div class="statusBox">
            <span class="clockWidget">time</span>
            <br />
            <span class="timeWidget">good time, user</span>
            <img src="./images/greg.png" />
        </div>
        <nav>
            <a href="./homePage.php" class="selected">Home Page</a>
            <a href="./listPage.php">My Pets</a>
            <a href="#">Events</a>
            <a href="#">Calendar</a>
            <a href="#">Logistics</a>
        </nav>
        <input class="searchInput" type="text" placeholder="Search" />
        <svg class="menuHumburger" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </header>

    <div class="humburger">
        <div class="information">
            <img src="./images/greg.png" alt="" />
            <h3>Greg</h3>
        </div>

        <div class="listMenu">
            <ul>
                <li class="selectedOnMenu"><a href="./homepage.php">HomePage</a></li>
                <li><a href="./listPage.php">My Pets</a></li>
                <li><a href="#">Daily Events</a></li>
                <li><a href="#">Calendar</a></li>
                <li><a href="#">Logistic</a></li>
                <div class="line"></div>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
            <a href="#">About us</a>
            <span>|</span>
            <a href="#">Support</a>
        </div>
    </div>

    <section>
        <!-- Up Coming Events -->
        <div class="upComingEvents">
            <div class="headerEvents">
                <h5 class="status">Status</h5>
                <h3 class="upComEvent">Upcoming events</h3>
                <h5 class="petName">Pet's name</h5>
                <h5 class="taskDeadline">Task deadline</h5>
            </div>
            <div class="eventList">
                <?php 
                    while($replacement = mysqli_fetch_assoc($result)){
                        echo '<div class="newEvent">';
                        echo '<div class="checkBoxDone">
                            <span>Mark as done</span>
                            <input type="checkbox" />
                            </div>';
                        echo ' <div class="eventContent">';
                        echo '<h5 class="missedTaskColor">' . $replacement["description"] . '</h5>';
                        echo '</div>';
                        echo ' <img class="petPicture" src="./images/'.$replacement["picture"].'" />';
                        echo '<h5 class="eventPetName">' .$replacement["pet_name"] . '</h5>';
                        echo '<span class="taskBackdrop eventTime">';
                        echo '<h5 class="missedTaskColor">'. $replacement["task_deadline"] . '</h5>';
                        echo '</span>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
        <!-- Requring Replacement -->
        <div class="reqReplacement">
            <div class="headerEvents">
                <h5 class="status">Status</h5>
                <h3 class="upComEvent">Upcoming Replacements</h3>
                <h5 class="petName">Pet's name</h5>
                <h5 class="taskDeadline">Expiration deadline</h5>
            </div>
            <div class="replacementList">
                <?php 
                    // while($replacement1 = mysqli_fetch_assoc($result1)){
                    //     echo '<div class="newEvent">';
                    //     echo '<div class="checkBoxDone">
                    //         <span>Mark as done</span>
                    //         <input type="checkbox" />
                    //         </div>';
                    //     echo '<svg class="iconStatus" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    //         fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                    //         <path
                    //         d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                    //         </svg>';
                    //     echo ' <div class="eventContent">';
                    //     echo '<h5 class="missedTaskColor">' . $replacement1["description"] . '</h5>';
                    //     echo '</div>';
                    //     echo ' <img class="petPicture" src="./images/'.$replacement1["picture"].'" />';
                    //     echo '<h5 class="eventPetName">' .$replacement1["pet_name"] . '</h5>';
                    //     echo '<span class="taskBackdrop eventTime">';
                    //     echo '<h5 class="missedTaskColor">'. $replacement1["expiration_deadline"] . '</h5>';
                    //     echo '</span>';
                    //     echo '</div>';
                    // }
                ?>
            </div>
        </div>
    </section>
</body>

</html>

<?php
    //close DB connection
    mysqli_close($connection);
?>
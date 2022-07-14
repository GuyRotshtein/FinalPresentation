<?php 
    include "db.php";

    session_start();
header("Cache-Control: no-cache, no-store", true);

if(!isset($_SESSION["owner_id"])){
    header('Location: index.html');
}

    //get user 
    $details_owner = "SELECT * FROM dbShnkr22studWeb1.tbl_218_owner WHERE owner_id = ". $_SESSION['owner_id'];
    $details_result = mysqli_query($connection, $details_owner);
    $details = mysqli_fetch_assoc($details_result);
    
    if(!$details["imge"]){
        $imge = "defaultUser.jpg";
    }else{
        $imge = $details["imge"];
    }

    // get data for events 
    $events_query = "SELECT * 
    FROM dbShnkr22studWeb1.tbl_218_event 
    INNER JOIN dbShnkr22studWeb1.tbl_218_owners_pets
    ON dbShnkr22studWeb1.tbl_218_event.pet_id = dbShnkr22studWeb1.tbl_218_owners_pets.pet_id
    INNER JOIN dbShnkr22studWeb1.tbl_218_pet
    ON dbShnkr22studWeb1.tbl_218_pet.pet_id = dbShnkr22studWeb1.tbl_218_owners_pets.pet_id
    INNER JOIN dbShnkr22studWeb1.tbl_218_owner
    ON dbShnkr22studWeb1.tbl_218_owner.owner_id = dbShnkr22studWeb1.tbl_218_owners_pets.owner_id
    AND dbShnkr22studWeb1.tbl_218_owners_pets.owner_id =". $_SESSION['owner_id'];

    $events_result = mysqli_query($connection, $events_query);
   
    // get data for replacement 
    $replacement_query = "SELECT * 
    FROM dbShnkr22studWeb1.tbl_218_replacement 
    INNER JOIN dbShnkr22studWeb1.tbl_218_owners_pets
    ON dbShnkr22studWeb1.tbl_218_replacement.pet_id = dbShnkr22studWeb1.tbl_218_owners_pets.pet_id
    INNER JOIN dbShnkr22studWeb1.tbl_218_pet
    ON dbShnkr22studWeb1.tbl_218_pet.pet_id = dbShnkr22studWeb1.tbl_218_owners_pets.pet_id
    INNER JOIN dbShnkr22studWeb1.tbl_218_owner
	ON dbShnkr22studWeb1.tbl_218_owner.owner_id = dbShnkr22studWeb1.tbl_218_owners_pets.owner_id
    AND dbShnkr22studWeb1.tbl_218_owners_pets.owner_id =" . $_SESSION['owner_id'];
    
    $replacement_result = mysqli_query($connection, $replacement_query);

    if(!$events_result || !$replacement_result || !$details_result){
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
    <script defer src="./js/homePage.js" type="module"></script>
</head>

<body>
    <header>
        <a class="topLogo" href="./#"><img src="./images/logo.png" /></a>
        <h1>ManaPet</h1>
        <h4 class="brudCrumbs">
            Your logistics assistant for the pet's daily life
        </h4>
        <div class="statusBox">
            <span class="clockWidget"> </span>
            <br />
            <span class="timeWidget"></span></br><?php echo '<span class="ownerName">'.$details["name"].'</span>'?>
            <img src="/images/<?php echo $imge; ?>">
        </div>
        <nav>
            <a href="./homePage.php" class="selected">Home Page</a>
            <a href="./listPage.php">My Pets</a>
            <a href="#">Events</a>
            <a href="#">Calendar</a>
            <a href="#">Logistics</a>
            <a href="logout.php">Log out</a>
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
                    while($event = mysqli_fetch_assoc($events_result)){
                        echo '<div class="newEvent">';
                        echo '<div class="checkBoxDone">
                            <span>Mark as done</span>
                            <input type="checkbox" />
                            </div>';
                        echo '<svg class="iconStatus" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16"><path class="path"/></svg>';
                        echo ' <div class="eventContent">';
                        echo '<h5 class="getInfo">' . $event["information"] . '</h5>';
                        echo '</div>';
                        echo ' <img class="petPicture" src="./images/upload/'.$event["picture"].'" />';
                        echo '<h5 class="eventPetName">' .$event["pet_name"] . '</h5>';
                        echo '<span class="taskBackdrop eventTime">';
                        echo '<h5 class="getDate">'. $event["task_deadline"] . '</h5>';
                        echo'<h5 class="fromTo">' . $event["from"] . ' - ' . $event["to"] . '</h5>';
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
                    while($replacement = mysqli_fetch_assoc($replacement_result)){
                        echo '<div class="newEvent">';
                        echo '<div class="checkBoxDone">
                            <span>Mark as done</span>
                            <input type="checkbox" />
                            </div>';
                        echo '<svg class="iconStatus" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16"><path class="path"/></svg>';
                        echo ' <div class="eventContent">';
                        echo '<h5 class="getInfo">' . $replacement["information"] . '</h5>';
                        echo '</div>';
                        echo ' <img class="petPicture" src="./images/upload/'.$replacement["picture"] .'" />';
                        echo '<h5 class="eventPetName">' .$replacement["pet_name"] . '</h5>';
                        echo '<span class="taskBackdrop eventTime">';
                        echo '<h5 class="getDate">'. 'End in: ' . $replacement["expiration_deadline"] . '</h5>';
                        echo '</span>';
                        echo '</div>';
                    }
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
<?php
include "db.php";
include "config.php";

session_start();
header("Cache-Control: no-cache, no-store", true);

if(!isset($_SESSION["owner_id"])){header('Location: index.html');}

if(!isset($_GET['pet_id'])){header('Location: listPage.php');}
$id = $_GET['pet_id'];

$query = "SELECT * FROM dbShnkr22studWeb1.tbl_218_pet WHERE pet_id = " . $id;


//get user 
$details_owner = "SELECT * FROM dbShnkr22studWeb1.tbl_218_owner WHERE owner_id = ". $_SESSION['owner_id'];
$details_result = mysqli_query($connection, $details_owner);
$details = mysqli_fetch_assoc($details_result);

$query_owners = "SELECT * 
FROM dbShnkr22studWeb1.tbl_218_owner 
RIGHT JOIN dbShnkr22studWeb1.tbl_218_owners_pets
ON dbShnkr22studWeb1.tbl_218_owner.owner_id = dbShnkr22studWeb1.tbl_218_owners_pets.owner_id
AND dbShnkr22studWeb1.tbl_218_owners_pets.pet_id =" . $id;

$query_events = "SELECT * FROM dbShnkr22studWeb1.tbl_218_event 
RIGHT JOIN dbShnkr22studWeb1.tbl_218_pet 
ON dbShnkr22studWeb1.tbl_218_event.pet_id = dbShnkr22studWeb1.tbl_218_pet.pet_id
AND dbShnkr22studWeb1.tbl_218_pet.pet_id =" . $id;

$result_owners = mysqli_query($connection, $query_owners);
$result_events = mysqli_query($connection, $query_events);
$result = mysqli_query($connection, $query);
$row_events = mysqli_fetch_array($result_events);
$row = mysqli_fetch_array($result);

if(!$row["picture"]){
    $row['picture'] = "defaultPet.png";
}else{
    $imge = $row["picture"];
}

if(!$result_owners || !$result_events){
    die("DB query faild!");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>ManaPet - pet page</title>
    <script defer src="./js/objectPage.js" type="module"></script>
</head>

<body>
<header>
    <a class="topLogo" href="./#"><img src="./images/logo.png"></a>
    <h1>ManaPet</h1>
    <h4 class="brudCrumbs">Your logistics assistant for the pet's daily life</h4>
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
    <a href="objectPage.php?pet_id=<?php echo $id?>" class="BreadCrumb">Sir Barkley</a>
    <a href="objectPage.php?pet_id=<?php echo $id?>" class="currentBreadCrumb">Pet Page</a>
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
    <!--    Pet information    -->
    <div class="info">
        <div>
                <img class="profilePic" src=<?php echo '"./images/upload/'.$row["picture"].'"'; ?>>
            <img class="cameraIcon" src="./images/Camera_Alt_Icon_1.png" alt="">
            <input type="file">
        </div>
        <div>
                <?php echo '
                <h1>Name: <span>'.$row["pet_name"].'</span></h1>
                <h5>Species: '.$row["species"].'</h5>
                <h5>Age: Born in '.$row["age"].'</h5>
                <br>
                <form action="/editPetPage.php" method="GET">
                <button type="submit" class = "petEdit">Edit pet</button>
                </form>
                '; ?>      
                
        </div>
    </div>
    <!--  Owners list  -->
    <div class="owners">
        <div class="headerOwners">
            <h5>Owners list</h5>
            <a href="#">Edit List</a>
        </div>
            <div class="ownersList">
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo '<div class="owner">';
                    echo '<h4>'.$row["name"].'</h4>';
                    echo '<h3>Details</h3>';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle details" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg>';
                    echo '</div>';
                }
                ?>
            </div>
    </div>

    <div id="objectListArea">
        <div class="upTasks">
            <div class="headerTasks">
                <h5><a href="#" id="tasksPrev" class="tableEnd">&#60;&#60; Previous</a></h5>
                <h3>Upcoming Tasks</h3>
                <h4><a href="#" id="tasksNext" class="tableEnd">Next &#62;&#62;</a></h4>
            </div>
            <div id="myForm" class="tasks"></div> <!-- Here adding new task from javascript file-->
        </div>

        <div class="logStatus">
            <div class="headerStatus">
                <h5><a href="#" id="statusPrev" class="tableEnd">&#60;&#60; Previous</a></h5>
                <h3>Logistic Status</h3>
                <h4 class><a href="#" id="statusNext" class="tableEnd">Next &#62;&#62;</a></h4>
            </div>
            <div class="status"></div>
        </div>
    </div>

</section>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>

<?php 
include "db.php";
session_start();
header("Cache-Control: no-cache, no-store", true);
if(!isset($_SESSION["owner_id"])){
    header('Location: index.php');
}

$query =    'SELECT * 
            FROM dbShnkr22studWeb1.tbl_218_pet 
            RIGHT JOIN dbShnkr22studWeb1.tbl_218_owners_pets
            ON dbShnkr22studWeb1.tbl_218_pet.pet_id = dbShnkr22studWeb1.tbl_218_owners_pets.pet_id
            AND dbShnkr22studWeb1.tbl_218_owners_pets.owner_id = '.$_SESSION['owner_id'].'';       

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

$categoryData = file_get_contents("./localData/categories.json",1);
$categories = json_decode($categoryData,true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script>
    function renderImage(){
    var selected = document.getElementById("inputPetPicture");
    var imgURL="";
    console.log(selected.value)
    if (!selected || !selected.value){
        console.log("oops")
        return
    }
    if(selected.value == '1.png'){
        imgURL = "/images/upload/1.png";
    } else if(selected.value == '2.png'){
        imgURL = "/images/upload/2.png";
    } else if(selected.value == '3.png'){
        imgURL = "/images/upload/3.png";
    } else {
        imgURL = "";
    }
    console.log("Image URL: "+imgURL)
    document.getElementById("PetImg").src = imgURL;
};

    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
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
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </header>
    <nav class="breadCrumbs">
        <a href="./homePage.php" class="firstBreadCrumb">Home</a>
        <a href="./listPage.php" class="BreadCrumb">My Pets</a>
        <a href="#" class="currentBreadCrumb">Add a pet</a>
    </nav>
 
<!--
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
-->

    <section>
        <h1 class="formTitle">Add a new pet</h1>
        <div id="formWrapper">
        <form action="/petCreated.php" method="GET">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" class="form-control" id="inputName" name="petName" aria-describedby="emailHelp" placeholder="Enter pet name" required autocomplete="off">
            </div>
            <div class="form-group">
              <label for="inputGeneralSpecies">General pet species</label>
              <select class="form-control" id="inputGeneralSpecies" name="generalSpecies" placeholder="Select from dropdown">
                <option hidden disabled selected value> Choose from dropdown </option>
                <?php 
                    foreach($categories['Species'] as $option)
                    echo '<option value="'. $option . '"> '. $option.' </option>';
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="inputSpecies">Species</label>
              <input type="text" class="form-control" id="inputSpecies" name="species" placeholder="Enter pet species" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputAge">Age</label>
                <input type="date" class="form-control" id="inputAge" name="age" placeholder="Enter pet age" required autocomplete="off">
            </div>                
            <div class="form-group">
                <label for="inputPetPicture">Pet Picture</label>
                <select class="form-control" id="inputPetPicture" onchange="renderImage()" name="petPicture" autocomplete="off">
                <?php 
                    echo '
                        <option hidden disabled selected value> Choose from dropdown </option>
                    ';
                    foreach($categories['Images'] as $pic)
                    echo '<option value="'. $pic . '.png"> Picture number '. $pic.' </option>';
                ?>
              </select>
              <span> <img id="PetImg" src="/images/icons/camera_1.png"> </span>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </form >
        </div>
    </section>

</body>

</html>
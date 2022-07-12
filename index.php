<?php

include "db.php";
//include "config.php";
session_start();

if (!empty($_POST["submit"])) {
    $query = "SELECT * FROM dbShnkr22studWeb1.tbl_218_owner WHERE email= '" . $_POST["uMail"] . "' and password = '" . $_POST["uPass"] . "' ";

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["owner_id"] = $row["owner_id"];
        header('Location: homepage.php');
    } else {
        $message = "Invalid email or password!";
    }
}
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
    <script defer src="./js/loginPage.js" type="module"></script>
    <title>ManaPet - log in</title>
</head>

<body>
    <div id="loginWrapper">
        <header>
            <a class="topLogo" href="./#"><img src="./images/logo.png"></a>
            <h1>ManaPet</h1>
            <h4 class="brudCrumbs">Your logistics assistant for the pet's daily life</h4>
            <div class="statusBox">
                <span class="clockWidget"> time go here</span>
                <br>
                <span class="timeWidget"> good time , user </span>
                <img src="./images/greg.png">
            </div>

        </header>
        <main>
            <section id="loginBox">
                <div id="loginBG">
                    <img src="./images/Backgrounds/istockphoto-496514979-170667a.jpg">
                    <div id="imageFade"></div>
                </div>

                <div id="formWrapper">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="uMail" placeholder="Enter your Email address" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="uPass" placeholder="Enter your password" required autocomplete="off">
                        </div>
                        <input name="submit" type="submit" class="btn btn-primary" value="Log in">
                        <div class="errorMessage"><?php if (isset($message)) {echo $message;}?></div>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>

<?php
    //close DB connection
    mysqli_close($connection);
?>
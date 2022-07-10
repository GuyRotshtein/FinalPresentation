<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>successfully added new pet</title>
</head>
<body>
    <header>
        <a class="topLogo" href="./#"><img src="./images/logo.png"></a>
        <h1>ManaPet</h1>
        <h4>Your logistics assistant for the pet's daily life</h4>
        <div class="statusBox">
            <span class="clockWidget"> time go here</span>
            <br>
            <span class="timeWidget"> good time username </span>
            <img src="./images/greg.png">
        </div>
        <nav>
            <a href="./#" class="selected">test 1</a>
            <a href="./#">test 2</a>
            <a href="./#">test 3</a>
            <a href="./#">test 4</a>
            <a href="./#">test 5</a>
        </nav>
        <input type="text" placeholder="Search">
    </header>
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
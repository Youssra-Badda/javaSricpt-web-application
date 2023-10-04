<?php 
session_start();

// echo $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>My Profile</title>
</head>
<body>

        <div class="navbar">
            <div class="icon">
                <h2 class="logo">BeautySalon</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="Home.php">HOME</a></li> 
                    
                    <li><a href="Home.php">SERVICE</a></li>
                    <li><a href="#con">CONTACT</a></li>
                    <li><a href="../logout.php">Deconexion</a></li>
                </ul>
            </div>

            

        </div>
    <div id="container2">
      <h1 >   Vos informations </h1>
      <form action="" methode="post" id ="form">
            <label for="">Nom :</label>
            <input type="text" id="nom" name="nom"/><br>
            <label for="">Prenom :</label>
            <input type="text" id="prenom" name="prenom"/><br>
            <label for="">Email :</label>
            <input type="email" id="email" name="email"/><br>
            <label for="">Tele :</label>
            <input type="tel" id="tele" name="tele"/><br>
            <label for="">Username :</label>
            <input type="text" id="username" name="username"/><br>
            <label for="">Adress :</label>
            <input type="text" id="adrs" name="adrs"/><br>
            <label for="">password :</label>
            <input type="password" id="password" name="password"/><br>
            <button id="edit" onclick="modifierClient()">Modifier</button>
        </form>


    </div>
    <?php include('../includes/footer.php') ?>
<script src="script.js" type="module" ></script>
</body>
</html>
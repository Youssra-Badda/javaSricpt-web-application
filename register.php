<?php
require 'function.php';
if(isset($_SESSION["id"])){
  header("Location: ./client/Home.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="./css/style.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="./css/home.css">
    <meta charset="utf-8">
    <title>Inscription</title>
    <style>

.footer {
    background-color: #9F86C0;
    padding: 20px;
    text-align: center;
    height: 70px;
  }
  
  .footer h3 {
    margin-bottom: 30px;
  }
  
  .footer-contact p {
    margin: 5px 0;
    display: inline;
  }
  
  .footer-info p {
    margin: 10px 0;
  }
  
    </style>
  </head>
  <body>
  <div class="navbar">
            <div class="icon">
                <h2 class="logo">BeautySalon</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="./client/Home.php">HOME</a></li> 
                    
                    <li><a href="./client/Home.php">SERVICE</a></li>
                    <li><a href="#con">CONTACT</a></li>
                    <li><a href="index.php">Login</a></li>
                </ul>
            </div>

            

        </div>
    <div id="container2">
        <h1>Formulaire d'inscription</h1>
        <form autocomplete="off" action="" method="post">
            
            <input type="hidden" id="action" value="register">
            <label for="">Nom</label>
            <input type="text" id="name" value=""> <br>
            <label for="">Prenom</label>
            <input type="text" id="prenom" value=""> <br>
            <label for="">Email</label>
            <input type="email" id="email" value=""> <br>
            <label for="">Tele</label>
            <input type="tel" id="tele" value=""> <br>
            <label for="">Adress : </label>
            <input type="text" id="adrs" value=""> <br>
            <label for="">Username</label>
            <input type="text" id="username" value=""> <br>
            <label for="">Password</label>
            <input type="password" id="password" value=""> <br>
            <button type="button" onclick="submitData();">Register</button><br>
          
        </form>
        <br>
    </div>
    <?php include('includes/footer.php') ?>
    <?php require 'script.php'; ?>
  </body>
</html>

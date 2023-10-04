<?php
require 'function.php';
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM personne WHERE ID_Pesonne = $id "));
  if(strpos($user["username"], "admin") !== false){
    header("Location: ./admin/admin.php");
  }else{
    header("Location: client/Home.php");
  }

  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

    <div class="main">
        <?php include('includes/header.php') ?>


        <div class="content" id="h">
            <h1>Bienvenu Chez <br><span id="titre">beautySalon</span> </h1>
            <br><br>
            <span id="ab">About us</span>
            <p class="par">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt neque 
                 expedita atque eveniet <br> quis nesciunt. Quos nulla vero consequuntur, fugit nemo ad delectus 
                <br> a quae totam ipsa illum minus laudantium?</p>
            <p class="par">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt neque 
            expedita atque eveniet <br> quis nesciunt. Quos nulla vero consequuntur, fugit nemo ad delectus 
                <br> a quae totam ipsa illum minus laudantium?</p><br>
                <b style="color: #9F86C0; font-size: 25px;">SalonBeauty 25 ans d'experience</b><br>
            <p class="par">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt neque 
            expedita atque eveniet <br> quis nesciunt. Quos nulla vero consequuntur, fugit nemo ad delectus 
                <br> a quae totam ipsa illum minus laudantium?</p>
            <span id="service">Notre Services</span><br>
            
            <p class="par">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis minima reprehenderit culpa atque, voluptatum architecto repudiandae, hic quisquam vero exercitationem quidem excepturi aut qui ratione nobis quo. Quia, debitis vero.</p>
            


                <!-- <div class="form" hidden>
                    <h2>Login Here</h2>
                    <input type="email" name="email" placeholder="Enter Email Here">
                    <input type="password" name="" placeholder="Enter Password Here">
                    <button class="btnn"><a href="#">Login</a></button>

                    <p class="link">Don't have an account<br>
                    <a href="#">Sign up </a> here</a></p>
                    <p class="liw">Log in with</p>

                    <div class="icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                    </div>

                </div> -->
                <!--  -->
                <div class="form" id="for">
                    <h2>Connexion</h2>
                    <form autocomplete="off" action="" method="post">
                        <input type="hidden" id="action" value="login">
                        
                        <input type="text" id="username" placeholder="Entrer le nom d'utilisateur"value=""> <br>
                       
                        <input type="password" id="password" placeholder="Entrer le mot de passe" value=""> <br>
                        <button type="button" class="btnn" onclick="submitData();">Login</button>
                        <br>
                        <br>
                        <p class="link">Don't have an account<br>
                        <a href="register.php">Sign up </a> here</a></p>
                        
                    </form>     
                    <?php require 'script.php'; ?>
                </div>




                <!--  -->
                    </div>
                     
                     <!-- service -->
                <div id="container1">
                    <div class="box">
                        <h2>Broshing</h2>
                        <img src="img/broching.jpg" alt="Image 1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi officiis et ipsa placeat inventore reprehenderit labor</p>
                    </div>
                    
                    <div class="box">
                        <h2>soin de visage</h2>
                        <img src="img/soin2.jpg" alt="Image 1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi officiis et ipsa placeat inventore reprehenderit labor</p>
                    </div>
                    <div class="box">
                        <h2>Manucure</h2>
                        <img src="img/manucure.avif" alt="Image 1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi officiis et ipsa placeat inventore reprehenderit labor</p>
                    </div>

                </div>



                </div>
           
               
        </div>
        
    </div>
    <?php include('includes/footer.php') ?>

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
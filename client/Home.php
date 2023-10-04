<?php
require '../function.php';

if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM personne WHERE ID_Pesonne = $id"));
  
}
else{
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home client</title>
  </head>
  <body>
      
   
    <!-- <a href="../logout.php">Logout</a> -->
    <div id="home">
    <div class="navbar">
            <div class="icon">
                <h2 class="logo">BeautySalon</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">SERVICE</a></li>
                    <li><a href="ClientRendez-vous.php">RENDEZ-VOUS</a></li>
                    <li><a href="profile.php" >PROFILE</a></li>
                    <li><a href="../logout.php">Deconexion</a></li>
                </ul>
            </div>

            

        </div> 
        
        <div class="content">
          
            <h1>Bienvenu <?php echo $user["prenom"] ; ?> Chez <br><span id="titre">beautySalon</span> </h1>
        </div><br>
         
        <div id="container1">
          
        </div><br>
       


      


   </div>
   <?php include('../includes/footer.php') ?>
   <script src="script.js" type="module" ></script>
  </body>
</html>

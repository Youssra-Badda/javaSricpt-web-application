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
    <!-- <link rel="stylesheet" href="home.css"> -->
    <link rel="stylesheet" href="ouij.css">
    
    <title>Admin</title>
  </head>
  <body>
  <!-- <header>
               <div id="h1"> <h1>Welcome  <?php echo $user["prenom"] ; ?></h1> </div>
                <div id="input"><form>
                   
                    <input type="search">
                    <button>search</button>
                </form>
                 <a href="logout.php">Se déconnecter</a> 
            </div>
              
            </header> -->
            <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">BeautySalon</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="admin.php">HOME</a></li>
                    <!-- <li><a href="#">ABOUT</a></li> -->
                    <li><a href="Clients.php">CLIENTS</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="../logout.php">DECONNEXION</a></li>
                </ul>
            </div>

            

        </div> 
    
        <style>
                       .image-lien {
                            cursor: pointer;
                            }
                        </style>
        <div id="container1">
                    <div class="box">

                        <h2 style="color: white;">CAISSE</a></h2>
                     <a href="caisse3.php" class="image-lien">
                     <img src="img2/OIP.jpg" style="width: 200px; height: 150px;"  alt="Image 1"></a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi officiis et ipsa placeat inventore reprehenderit labor</p>
                    </div>
                    <div class="box">
                        <h2 style="color: white;">PRESTATIONS</h2>
                        <a href="prestations.php" class="image-lien">
                        <img src="img2/o.jpg" style="width: 200px; height: 150px;" alt="Image 1"></a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi officiis et ipsa placeat inventore reprehenderit labor</p>
                    </div>
                    <div class="box">
                        <h2  style="color: white;">DEPENSES</h2>
                        <a href="Depenses.php" class="image-lien">
                        <img src="img2/k.png" style="width: 200px; height: 150px;" alt="Image 1"></a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi officiis et ipsa placeat inventore reprehenderit labor</p>
                    </div>
                   
                    <div class="box">
                        <h2 style="color: white;">RENDEZ-VOUS</h2>
                        <a href="AdministrateurRendezVous.php" class="image-lien">
                        <img src="img2/servise.jpg" style="width: 200px; height: 150px;"alt="Image 1"></a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi officiis et ipsa placeat inventore reprehenderit labor</p>
                    </div>
                   
                   
                    <!-- <div class="box">
                        <h2>Broshing</h2>
                        <img src="img2/R.jpg"alt="Image 1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi officiis et ipsa placeat inventore reprehenderit labor</p>
                    </div>
          -->
         
          <!-- <div id="div1"> -->
<!-- <div id="div11">
  <a href="#"><h3>caisse</h3></a>

</div>
<div id="div12"><a href="#"><h3>client</h3></a></div>
<div id="div13"><a href="#"><h3>prestations</h3></a></div>
<div id="div14"><a href="#"><h3>profil</h3></a></div>

            </div> -->
      
  </body>
</html>

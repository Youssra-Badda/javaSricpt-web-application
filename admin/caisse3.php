<!DOCTYPE html>
<html>
<head>
  <title>Page de caisse</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 <style>
      .navbar{
    width: 100%;
    height: 80px;
    margin: auto;
    background-color: #FB6F92;    
    position: fixed;
    z-index: 999;
    top: 0;
    left: 0;
    border-radius: 7px;
}


.icon{
    width: 200px;
    float: left;
    height: 70px;
}

.logo{
    color: #5E548E;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float: left;
    padding-top: 12px;
    margin-top: 5px
}

.menu{
    width: 400px;
    float: left;
    height: 70px;
    margin-left: 320px;
    padding-top: 8px;
}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li{
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;
    width : 70px;
}

ul li a{
    text-decoration: none;
    color: #fff;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}

ul li a:hover{
    color: #5E548E;
}



 </style>

</head>
<body>

  <!-- <header>
  <h1>Page de caisse</h1>
    <nav>
    
      <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">profil</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
    
  </header> -->
         <div class="navbar">
            <div class="icon">
                <h2 class="logo">BeautySalon</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="./admin.php">HOME</a></li> 
                  
                    <li><a href="prestations.php">SERVICE</a></li>
                    <li><a href="#con">CONTACT</a></li>
                    <li><a href="../logout.php">deconexion</a></li>
                </ul>
            </div>

            

        </div>
  
  <main id="cais">
    <form id="montantForm">
      <label for="montant">Montant:</label>
      <input type="number" id="montant" name="montant">
      <button type="submit" id="submit">Ajouter</button>
    </form>
    
    <div id="difference">
      <!-- La différence sera affichée ici -->
    </div>
  </main>
  
  <footer>
    <p id="con">&copy; 2023 BeautySalon</p>
  </footer>
  
 
  <script>
    //+++++++++fct ajout
    function ajouterMontant(event) {
      event.preventDefault(); // Empêcher le rechargement de la page

      var montant = document.getElementById('montant').value; // Récupérer le montant depuis le champ de saisie

      // Requête Ajax pour l'ajout du montant dans la base de données
      ajaxRequest('ajouter_montant.php', 'POST', 'montant=' + encodeURIComponent(montant), function(response) {
        //alert(response); // Afficher la réponse du serveur (message de succès ou d'erreur)
        document.getElementById('montant').value = ''; // Réinitialiser le champ de saisie après l'ajout du montant

        // Requête Ajax pour mettre à jour la différence entre la somme de la caisse et la somme des prestations
        miseAJourDifference();
      });
    }
    //+++++++++fct caisse

    function miseAJourDifference() {
      ajaxRequest('calculer_difference.php', 'GET', null, function(response) {
        var differenceElement = document.getElementById('difference');
        differenceElement.innerHTML = response;
      });
    }

    function ajaxRequest(url, method, data, callback) {
      var xhr = new XMLHttpRequest();
      xhr.open(method, url, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          callback(xhr.responseText);
        }
      };
      xhr.send(data);
    }

    window.onload = function() {
      miseAJourDifference(); // Mettre à jour la différence initiale entre la somme de la caisse et la somme des prestations
      document.getElementById('montantForm').addEventListener('submit', ajouterMontant); // Ajouter un gestionnaire d'événement pour le formulaire
    };
  </script>

  <p id="difference">
   <?php
    // Inclure ici le code PHP pour afficher la différence initiale entre la somme de la caisse et la somme des prestations

     ?>
     
  
</body>
</html>
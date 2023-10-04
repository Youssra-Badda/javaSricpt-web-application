<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         table {
  width: 100%;
  border-collapse: collapse;
}

table th,
table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

table th {
  background-color: #f2f2f2;
}

table tr:hover {
  background-color: #f5f5f5;
}



    </style>
</head>
<body>
     <div>
         <table id="RVclient">
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Etat</th>
            </tr>

         </table>
     </div>
     <script src="script.js" type="module" ></script>
</body>
</html> -->

<!-- ************************************************************* -->

<?php 
session_start();
$_SESSION['idR']=$_GET['id'];

// echo $_SESSION['idR'];
?>
<!DOCTYPE html>
<html>
<head>
    <style>
.montant-total-negative {
    color: red;
    font-weight: bold;
}
.montant-total-positive {
    color: green;
    font-weight: bold;
}

    </style>
    <meta charset="UTF-8">
    <title>Gestion des dépenses</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<link rel="stylesheet" href="../css/spur.css">
</head> 

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Beauty<span>Salon</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          <li class="nav-item"><a href="admin" class="nav-link">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

<body>
<div>
    <div class="container">
        <h1 class="mt-8" style=" text-align: center;" > Gestion des Rendez-vous</h1>

        <!-- Affichage des dépenses existantes -->
        <div class="container" style=" border: 1px solid black ;">
        <h2>Liste des Rendez-vous</h2>
        <table class="table" >
            <thead class="bg-dark text-white">
                <tr>
                
                    <th class="text-center ">Date</th>
                    <th class="text-center">Heure</th>
                    <th class="text-center">Etat</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="RVclient">
               
            </tbody>
        </table>
    </div>
        <!-- Formulaire pour ajouter une nouvelle dépense -->
        <div class="container" style=" border: 1px solid black ;">
        <h2>Modifer un Rendez-vous</h2>
        <form id="formulaire" >
            <div class="mb-3">
                <label for="date" class="form-label">Date :</label>
                <input type="date" name="date" id="date" class="form-control" required>
                <small id="stitre" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div>
            <div class="mb-3">
                <label for="Heure" class="form-label">Heure :</label>
                <input type="time" name="Heure" id="Heure" class="form-control" required>
                <small id="sdescription" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div>
            <div class="mb-3">
                <label for="Etat" class="form-label">Etat :</label>
                <input type="text" name="Etat" id="Etat" class="form-control" required>
                <small id="smontant" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div>
            
            <div class="col-12 d-flex justify-content-center">
                <button id="ajouter" type="button" class="btn btn-primary col-2" >Modifier</button>
            </div>
        </form>
</div>
    </div>


    <!-- <div class="container">
        <h1 style="color:red">Etat de la caisse <div id="caisse"></div></h2>
</div> -->


<footer class="ftco-footer ftco-no-pb ftco-section">
    <div class="container-fluid px-0 bg-primary py-3">
      <div class="row no-gutters">
        <div class="col-md-12 text-center">

          <p class="mb-0">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Beauty Salon Management System 
          </p>
          </div>
        </div>
      </div>
    </footer>







<div class="modal" tabindex="-1" role="dialog" id="successModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white"><span class="fa fa-check me-2"><span> Succès</h5>
                    <button type="button" class="close" onclick="$('#successModal').hide()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="messageSuccessModal">Opération réussite</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="$('#successModal').hide()">Fermer</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="failedModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white"><span class="fa fa-times me-2"><span> Erreur</h5>
                    <button type="button" class="close" onclick="$('#failedModal').hide()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="messageFailedModal">Opération réussite</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="$('#failedModal').hide()">Fermer</button>
                </div>
                </div>
            </div>
        </div>


<script src="../js/bootstrap.bundle.min.js"  ></script>
    <script src="./js/script1.js"  type="module" ></script>
</body>
</html>
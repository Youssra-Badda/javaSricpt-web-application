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
    <title>Gestion des prestations</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<link rel="stylesheet" href="../css/spur.css">
</head> 
<!-- menu -->


<body>
<div>
    <div class="container">
        <h1 class="mt-8" style=" text-align: center;" > Gestion des prestations</h1>

        <form>
			<div class="form-row">
				<div class="form-group col-md-4">
                        <label class="small font-weight-bold">Par Titre</label>
						<input type="text" class="form-control form-control-sm" id="TitreSearch">
                </div>
				<div class="form-group col-md-4">
						<label class="small font-weight-bold"></label>
						<button onclick="getListprestations();" class="btn btn-secondary btn-sm d-block"><i class="fa fa-search mr-12"></i>Recherche</button>
				</div>
			</div>
		</form>
        <!-- Affichage des dépenses existantes -->
        <div class="container" style=" border: 1px solid black ;">
        <h2>Liste des prestations</h2>
        <table id= "myTable" class="table" >
            <thead class="bg-dark text-white">
                <tr>
                    <th class="text-center ">Titre</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Prix</th>
                    <th class="text-center">image</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="listprestations">
               
            </tbody>
        </table>
</div>
        <!-- Formulaire pour ajouter une nouvelle dépense -->
        <div class="container" style=" border: 1px solid black ;">
        <h2>Ajouter une prestation</h2>
        <form id="formulaire" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
                <small id="stitre" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
                <small id="sdescription" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix :</label>
                <input type="number" name="prix" id="prix" class="form-control" required>
                <small id="sprix" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div>
            <div class="mb-3">
                <label for="image" id="idm" class="form-label">Image :</label>
                <input type="file" name="image" id="image" class="form-control" required >
                <small id="simage" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div>
            <!-- <div class="mb-3">
                <label for="date" class="form-label">Date :</label>
                <input type="date" name="date" id="date" class="form-control" required>
                <small id="sdate" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div> -->
            <div class="col-12 d-flex justify-content-center">
                <button id="ajouter" type="button" class="btn btn-primary col-2" onclick="insertprestations(0,'ajouter')">Ajouter</button>
            </div>
        </form>
</div>
    </div>


    <!-- <div class="container">
        <h1 style="color:red">Etat de la caisse <div id="caisse"></div></h2>
</div> -->

<!-- <div class="container">
    <h3>État de la caisse du salon</h3>
    <p class="montant-total-negative" id="caisse"></p>
    
 
</div> -->
<!-- fin de formulaire -->








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


<script src="./js/bootstrap.bundle.min.js"  ></script>
    <script src="scriptpres.js"  ></script>
       
    <script>
        document.getElementById("TitreSearch").addEventListener("input", function() {
        var input = this.value.toLowerCase();
        var table = document.getElementById("myTable");
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
            var rowData = rows[i].getElementsByTagName("td");
            var matchFound = false;

        for (var j = 0; j < rowData.length; j++) {
            var cellData = rowData[j].textContent.toLowerCase();
            if (cellData.indexOf(input) > -1) {
                matchFound = true;
                break;
                }
                }

             if (matchFound) {
                rows[i].style.display = "";
            } else {
              rows[i].style.display = "none";
            }
     }
  });
</script>
</body>
</html>





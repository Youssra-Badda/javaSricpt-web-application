<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <title>Gestion des dépenses</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/spur.css">
    <style>
table.table th,
table.table td {
  border: 1px solid  #FFB5A7; /* Ajoute une bordure de 1 pixel solide de couleur noire */
  padding: 8px; /* Ajoute de l'espace à l'intérieur des cellules du tableau */
}
body {
  margin: 0;
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #100b0f;
  text-align: left;
  background-color: #FCD5CE }
 
    .bg-pink {
        background-color: #FFB5A7;
    }
    /* #failedModal .modal-content {
  border-radius: 10px;
}

#failedModal .modal-header {
  border-bottom: none;
}

#failedModal .modal-title {
  font-weight: bold;
  font-size: 20px;
}

#failedModal .close {
  color: white;
  opacity: 0.8;
  transition: opacity 0.2s ease-in-out;
}

#failedModal .close:hover {
  opacity: 1;
}

#failedModal .modal-body {
  padding: 20px;
}

#failedModal .modal-footer {
  justify-content: flex-end;
  border-top: none;
}

#failedModal .btn-danger {
  background-color: #dc3545;
  border-color: #dc3545;
  border-radius: 5px;
  color: white;
  font-weight: bold;
}

#failedModal .btn-danger:hover {
  background-color: #c82333;
  border-color: #bd2130;
}
#successModal .modal-content {
    background-color: #a72868;
  border-radius: 10px;
}

#successModal .modal-header {
    background-color: #a72868;
  border-bottom: none;
}

#successModal .modal-title {
    background-color: #a72868;
  font-weight: bold;
  font-size: 20px;
}

#successModal .close {
    background-color: #a72868;
  color: white;
  opacity: 0.8;
  transition: opacity 0.2s ease-in-out;

}

#successModal .close:hover {
  opacity: 1;
}

#successModal .modal-body {
    background-color: #a72868;
  padding: 20px;
}

#successModal .modal-footer {
    background-color: #a72868;
  justify-content: flex-end;
  border-top: none;
}

#successModal .btn-success {
  background-color: #a72868;
  border-color: #a72868;
  border-radius: 5px;
  color: white;
  font-weight: bold;
}

#successModal .btn-success:hover {
  background-color: #a72868;
  border-color:#a72868;
} */



</style>
    
</head> 
<body>
<div>
    <div class="container">
    <h2>Liste des dépenses</h2>
        <div style="border: 3px solid #FFB5A7"class="container">
        
        <form>
			<div class="form-row">
				<div class="form-group col-md-4">
                        <label class="small font-weight-bold">Par Titre</label>
						<input type="text" class="form-control form-control-sm" id="TitreSearch">
                </div>
				<div class="form-group col-md-4">
						<label class="small font-weight-bold">les dépenses</label>
						<button onclick="getListdepenses()" class="btn btn-secondary btn-sm d-block"><i class="fa fa-search mr-12"></i>Recherche</button>
				</div>
			</div>
		</form>
 
        <table class="table" id="myTable" >
            <thead class="bg-pink  text-white">
           
                <tr>
                    <th class="text-center ">Titre</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Montant</th>
                    <th class="text-center">Date</th>
                    <th class="text-center action-column">Action</th>
                </tr>
            </thead>
            <tbody id="listdepenses">
               
            </tbody>
        </table>
        </div>
        <!-- Formulaire pour ajouter une nouvelle dépense -->
        <h2>Ajouter une dépense</h2>
        <div  style="border: 3px solid #FFB5A7" class="container">
        
        <form id="formulaire" >
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
                <label for="montant" class="form-label">Montant :</label>
                <input type="number" name="montant" id="montant" class="form-control" required>
                <small id="smontant" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date :</label>
                <input type="date" name="date" id="date" class="form-control" required>
                <small id="sdate" style="color:red" hidden>Ce champs doit etre rempli</small>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button style="border: none;background-color: #ffb5a7;   border-radius:25px; "id="ajouter" type="button" class="btn btn-primary col-2" onclick="insertdepenses(0,'ajouter')">Ajouter</button>
            </div>
        </form>
    </div>
</div>
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
    <script src="./js/script3.js"  ></script>
    
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





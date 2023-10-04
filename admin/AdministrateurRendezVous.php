<?php
session_start();
$_SESSION['id']=1;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des clients</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/spur.css">
</head> 
<body>
    <div class="container">
        <h2>Les rendez-vous de mes clients </h2>
        
                                <form>
										<div class="form-row">
												<div class="form-group col-md-4">
                                                        <label class="small font-weight-bold">Par Nom</label>
														<input type="text" class="form-control form-control-sm" id="NomSearch">
                                                </div>
												<div class="form-group col-md-4">
														<label class="small font-weight-bold">les Clients</label>
														<button onclick="listRendezvousMesclient()" class="btn btn-secondary btn-sm d-block"><i class="fa fa-search mr-12"></i>Recherche</button>
												</div>
										</div>
								</form>
        <table class="table" id="myTable" >
            <thead class="bg-dark text-white">
                <tr>
                    <th class="text-center ">Nom</th>
                    <th class="text-center">Prenom</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Telephone</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="listRendezvousMesclient">
               
            </tbody>
        </table>
</div>
<!-- 
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
        
</div> -->
<script src="./js/script4.js"></script>
<script>
  document.getElementById("NomSearch").addEventListener("input", function() {
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



//*************************************************************************************************************
getListclient();
  function getListclient() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/traitement1.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var data1 = "action=" + encodeURIComponent("afficherTous") ;
    xhr.send(data1);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Réponse du serveur
      var data = JSON.parse(xhr.responseText);
      // Traiter les enregistrements
      console.log(data)
      addDataToTable(data)
    }
  };}
  function addDataToTable(data) { 
    var table = document.getElementById('listclients');
    for (var i = 0; i < data.length; i++) {
      var row = `<tr>
                 
                  <td>${data[i].nom}</td>
                  <td>${data[i].prenom}</td>
                  <td>${data[i].Adresse}</td>
                  <td>${data[i].Email}</td>
                  <td>${data[i].tele}</td>
                  <td>
                    <button class='btn btn-danger' onclick="deleteclient(${data[i].ID_Pesonne})">Supprimer</button>
                  </td>
                </tr>`
      table.innerHTML += row
    }
  }
function deleteclient(idclient) {

  var listclients = document.getElementById("listclients");
  listclients.innerHTML = "";
  let conf = confirm("Voulez-vous vraiment supprimer ce client  ?");
  if (conf) {
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/traitement1.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    data1 = "action=" + encodeURIComponent("supprimer")+"&id="+encodeURIComponent(idclient);
    xhr.send(data1);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
     console.log(xhr.responseText);
     if(xhr.responseText=="success"){
      getListclient();
      $("#messageSuccessModal").html("supression avec succes.")
      $("#successModal").show();
    }else{
      getListclient();
             $("#messageFailedModal").html("Ce client est réservé dans votre salon! Veuillez supprimer ces rendez-vous tout d'abord.")
        $("#failedModal").show();
    }}
  };

  }
}

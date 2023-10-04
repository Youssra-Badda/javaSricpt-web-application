listRendezvousMesclient();
function listRendezvousMesclient(){
   
   
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./php/traitement4.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var data1 = "action=" + encodeURIComponent("AfficherTousRendezvous") ;
        xhr.send(data1);
        xhr.onreadystatechange = function(data) {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Réponse du serveur
           console.log(xhr.responseText);
            var data = JSON.parse(xhr.responseText); 
            
            addDataToTable(data)  ;
           // addDataToTable(data);
    }
   
        
}
function addDataToTable(data) {
   
    var table = document.getElementById('listRendezvousMesclient')
    for (var i = 0; i < data.length; i++) {
      var row = `<tr>
                 
                  <td>${data[i].nom}</td>
                  <td>${data[i].prenom}</td>
                  <td>${data[i].Email}</td>
                  <td>${data[i].tele}</td>
                  <td>
                    <button class='btn btn-primary me-2' "><a href="RendezVsClient.php?id=${data[i].ID_Pesonne}" style="color:white;">Rendez-Vous</a></button>
                    
                  </td>
                </tr>`
      table.innerHTML += row
    }
  }}
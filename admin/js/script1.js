import getXhr from "../../client/Ajax.js";
getListRendezVous();
function validateForm() {
    if (document.getElementById("date").value.trim().length == 0) {
      document.getElementById("stitre").hidden = false;
    } else if (document.getElementById("Heure").value.trim().length == 0) {
      document.getElementById("sdescription").hidden = false;
    } else if (document.getElementById("Etat").value.trim().length == 0) {
      document.getElementById("smontant").hidden = false;
    }

  }

  function getListRendezVous() { 
    // console.log("je suis au debut de l'evenement ");
    
     
     
     var xhr = getXhr();
     const data = new FormData();
     xhr.open("POST", "./php/traitement.php", true);
     data.append("action", "afficher");
    
     xhr.send(data);
    
    xhr.onreadystatechange = function() {
      
    if (xhr.readyState === 4 && xhr.status === 200) {
     
      // Réponse du serveur
      var rendezV =JSON.parse(xhr.responseText);
      addDataToTable(rendezV);
    }

}
}
// *******************************************
function deleteR(idrendezvous) {
  var listclients = document.getElementById("RVclient");
  listclients.innerHTML = "";
  let conf = confirm("Voulez-vous vraiment supprimer cet rendez-vous?");
  if (conf) {
    
    var xhr = getXhr();
    xhr.open("POST", "./php/traitement.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var data1 = "action=" + encodeURIComponent("supprimer")+"&id="+encodeURIComponent(idrendezvous);
    xhr.send(data1);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
     if(xhr.responseText=="success"){
      getListRendezVous();
      $("#messageSuccessModal").html("Suppression réussie!")
      $("#successModal").show();
    }else{
             $("#messageFailedModal").html("Suppression échouée!")
        $("#failedModal").show();
    }}
  
  }}else{
      getListRendezVous();
  }

}
function getRendez_vous(idrendezvous){
   
  var smallElements = document.querySelectorAll("small");
  smallElements.forEach(function(small) {
    small.hidden = true;
  });
  var xhr = getXhr();
  xhr.open("POST", "./php/traitement.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var rendezvous = JSON.parse(xhr.responseText);
        
        document.getElementById("date").value = rendezvous[0].date;
        document.getElementById("Heure").value = rendezvous[0].heure;
        document.getElementById("Etat").value = rendezvous[0].Etat;
        
        document.getElementById("ajouter").onclick = function() {
          insertrerendezvous(rendezvous[0].id_RV, "modifierRV");
        };
      } else {
        document.getElementById("messageFailedModal").innerHTML = "Une erreur est survenue!";
        document.getElementById("failedModal").style.display = "block";
      }
    }
  };
  
  var formData = "id=" + encodeURIComponent(idrendezvous) + "&action=afficherRV";
  xhr.send(formData);
}




// function  addDataToTable(data){
//     var tab = document.getElementById('RVclient');
//     for (var i = 0; i < data.length; i++) {
      
//       var row = `<tr>
//                     <td>${data[i].date}</td>
//                     <td>${data[i].heure}</td>
//                     <td>${data[i].Etat}</td>
//                     <td>
//                       <button onclick="getRendez_vous(${data[i].id_RV})">Modifier</button>
//                       <button onclick="deleteR(${data[i].id_RV})">Supprimer</button>
//                     </td>
//                 </tr>`
//       tab.innerHTML += row;
//     }
//   }

  


// **************************************8
function addDataToTable(data) {
  var tab = document.getElementById('RVclient');
  for (var i = 0; i < data.length; i++) {
    
    (function(idRV) {
      var row = document.createElement('tr');
      var cell1 = document.createElement('td');
      var cell2 = document.createElement('td');
      var cell3 = document.createElement('td');
      var cell4 = document.createElement('td');
      var modifyButton = document.createElement('button');
      var deleteButton = document.createElement('button');
      
      cell1.textContent = data[i].date;
      cell2.textContent = data[i].heure;
      cell3.textContent = data[i].Etat;
      modifyButton.textContent = 'Modifier';
      deleteButton.textContent = 'Supprimer';
      deleteButton.className='btn btn-danger' ;
      modifyButton.className='btn btn-primary me-2';
  
      modifyButton.addEventListener('click', function() {
        getRendez_vous(idRV);
      });
      
      deleteButton.addEventListener('click', function() {
        deleteR(idRV);
      });
  
      cell4.appendChild(modifyButton);
      cell4.appendChild(deleteButton);
  
      row.appendChild(cell1);
      row.appendChild(cell2);
      row.appendChild(cell3);
      row.appendChild(cell4);
  
      tab.appendChild(row);
    })(data[i].id_RV);
  }
}



//*************************** */

function insertrerendezvous(idrendezvous,Action){
  var smallElements = document.querySelectorAll("small");
  smallElements.forEach(function(small) {
    small.hidden = true;
  });
  
  var date=document.getElementById("date").value;
  var heure=document.getElementById("Heure").value;
  var etat=document.getElementById("Etat").value;
 
  var action=Action;
  var formData = "id=" + encodeURIComponent(idrendezvous) +
             "&date=" + encodeURIComponent(date) +
             "&Heure=" + encodeURIComponent(heure) +
             "&Etat=" + encodeURIComponent(etat) +
             "&action=" + Action;
  if(date== "" || heure== "" || etat== ""){
   validateForm();
  }
  else{
      var listrendevous = document.getElementById("RVclient");
      listrendevous.innerHTML = "";
      var xhr = getXhr();
      xhr.open("POST", "./php/traitement.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      
      
          xhr.onreadystatechange = function() {
              if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                  getListRendezVous();
                  document.getElementById("formulaire").reset();
                  
                
                  document.getElementById("messageSuccessModal").innerHTML = "Modification réussie !";
                  document.getElementById("successModal").style.display = "block";
                } else {
                  getListrendevouz();
                  document.getElementById("formulaire").reset();
                  
                  document.getElementById("messageFailedModal").innerHTML = "Modification échouée !";
                  document.getElementById("failedModal").style.display = "block";
                }
              }
            };
            
            xhr.onerror = function() {
              getListdepenses();
              document.getElementById("formulaire").reset();
              
              document.getElementById("messageFailedModal").innerHTML = "Modification échouée !";
              document.getElementById("failedModal").style.display = "block";
            };
            
            xhr.send(formData);
           
               
      
  }
}










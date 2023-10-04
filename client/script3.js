getListrendevouz();
function validateForm() {
    if (document.getElementById("date").value.trim().length == 0) {
      document.getElementById("sdate").hidden = false;
    } else if (document.getElementById("time").value.trim().length == 0) {
      document.getElementById("stime").hidden = false;
    }
  }
function getListrendevouz() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/traitement3.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var data1 = "action=" + encodeURIComponent("afficherTous") ;
    xhr.send(data1);
    xhr.onreadystatechange = function() {
      
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Réponse du serveur
      console.log("rponnseeeee : "+xhr.responseText);
      var data = JSON.parse(xhr.responseText);
      // Traiter les enregistrementssssss
      console.log(data)
      addDataToTable(data)
    }
  };}
  function addDataToTable(data) { 
    var table = document.getElementById('listrendevous');
    for (var i = 0; i < data.length; i++) {
      var row = `<tr>
                 
                  <td>${data[i].date}</td>
                  <td>${data[i].heure}</td>
                  <td>${data[i].Etat}</td>
                  <td>
                    <button class='btn btn-danger' onclick="deleterendezvous(${data[i].id_RV})">Supprimer</button>
                    <button class='btn btn-primary me-2' onclick="getrendezvous(${data[i].id_RV})">Modifier</button>
                  </td>
                </tr>`
      table.innerHTML += row
    }
  }
  function deleterendezvous(idrendezvous) {
    var listclients = document.getElementById("listrendevous");
    listclients.innerHTML = "";
    let conf = confirm("Voulez-vous vraiment supprimer cet rendez-vous?");
    if (conf) {
      
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "./php/traitement3.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      data1 = "action=" + encodeURIComponent("supprimer")+"&id="+encodeURIComponent(idrendezvous);
      xhr.send(data1);
      xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
       if(xhr.responseText=="success"){
        getListrendevouz();
        $("#messageSuccessModal").html("Suppression réussie!")
        $("#successModal").show();
      }else{
               $("#messageFailedModal").html("Suppression échouée!")
          $("#failedModal").show();
      }}
    
    }}else{
        getListrendevouz();
    }

}
    function getrendezvous(idrendezvous){
   
        var smallElements = document.querySelectorAll("small");
        smallElements.forEach(function(small) {
          small.hidden = true;
        });
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./php/traitement3.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              var rendezvous = JSON.parse(xhr.responseText);
              console.log( document.getElementById("time").value)
              document.getElementById("date").value = rendezvous[0].date;
              document.getElementById("time").value = rendezvous[0].heure;
              document.getElementById("ajouter").innerHTML = "Modifier";
              document.getElementById("ajouter").onclick = function() {
                insertrerendezvous(rendezvous[0].id_RV, "modifier");
              };
            } else {
              document.getElementById("messageFailedModal").innerHTML = "Une erreur est survenue!";
              document.getElementById("failedModal").style.display = "block";
            }
          }
        };
        
        var formData = "id=" + encodeURIComponent(idrendezvous) + "&action=afficher";
        xhr.send(formData);
      }
    
        // Faites ce que vous souhaitez avec la valeur formatée, comme l'afficher à l'utilisateur ou l'envoyer à un serveur.
      
      function insertrerendezvous(idrendezvous,Action){
            var smallElements = document.querySelectorAll("small");
            smallElements.forEach(function(small) {
              small.hidden = true;
            });
            
            var date=document.getElementById("date").value;
            var time=document.getElementById("time").value;
            console.log(time)
            var action=Action;
            var formData = "id=" + encodeURIComponent(idrendezvous) +
                       "&date=" + encodeURIComponent(date) +
                       "&heure=" + encodeURIComponent(time) +
                       "&action=" + Action;
            if(date== "" || time== ""){
             validateForm();
            }
            else{
                var listrendevous = document.getElementById("listrendevous");
                listrendevous.innerHTML = "";
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "./php/traitement3.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                if(idrendezvous == 0){
                    xhr.onreadystatechange = function() {
                      if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                          getListrendevouz();
                          console.log(xhr.responseText)
                          document.getElementById("formulaire").reset();
                          document.getElementById("messageSuccessModal").innerHTML = "Ajout réussi !";
                          document.getElementById("successModal").style.display = "block";
                        } else {
                          document.getElementById("formulaire").reset();
                          document.getElementById("messageFailedModal").innerHTML = "Ajout échoué !";
                          document.getElementById("failedModal").style.display = "block";
                        }
                      }
                    };
                    
                    xhr.onerror = function() {
                      document.getElementById("formulaire").reset();
                      document.getElementById("messageFailedModal").innerHTML = "Ajout échoué !";
                      document.getElementById("failedModal").style.display = "block";
                    };
                    
                    xhr.send(formData);
                }
                else{
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                          if (xhr.status === 200) {
                            getListrendevouz();
                            document.getElementById("formulaire").reset();
                            document.getElementById("ajouter").innerHTML = "Ajouter";
                            document.getElementById("ajouter").onclick = function() {
                                insertrerendezvous(0, "ajouter");
                            };
                            document.getElementById("messageSuccessModal").innerHTML = "Modification réussie !";
                            document.getElementById("successModal").style.display = "block";
                          } else {
                            getListrendevouz();
                            document.getElementById("formulaire").reset();
                            document.getElementById("ajouter").innerHTML = "Ajouter";
                            document.getElementById("ajouter").onclick = function() {
                              insertrerendezvous(0, "ajouter");
                            };
                            document.getElementById("messageFailedModal").innerHTML = "Modification échouée !";
                            document.getElementById("failedModal").style.display = "block";
                          }
                        }
                      };
                      
                      xhr.onerror = function() {
                        getListdepenses();
                        document.getElementById("formulaire").reset();
                        document.getElementById("ajouter").innerHTML = "Ajouter";
                        document.getElementById("ajouter").onclick = function() {
                          insertrerendezvous(0, "ajouter");
                        };
                        document.getElementById("messageFailedModal").innerHTML = "Modification échouée !";
                        document.getElementById("failedModal").style.display = "block";
                      };
                      
                      xhr.send(formData);
                     
                         
                }
            }
          }
          






      
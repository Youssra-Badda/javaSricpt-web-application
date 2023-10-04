getListdepenses();
function validateForm() {
    if (document.getElementById("titre").value.trim().length == 0) {
      document.getElementById("stitre").hidden = false;
    } else if (document.getElementById("description").value.trim().length == 0) {
      document.getElementById("sdescription").hidden = false;
    } else if (document.getElementById("montant").value.trim().length == 0) {
      document.getElementById("smontant").hidden = false;
    } else if (document.getElementById("date").value.trim().length == 0) {
      document.getElementById("sdate").hidden = false;
    }
  }
function getListdepenses(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/traitement2.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var data1 = "action=" + encodeURIComponent("afficherTous") ;
    xhr.send(data1);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Réponse du serveur
      var data = JSON.parse(xhr.responseText);
      // Traiter les enregistrements
      addDataToTable(data)
    }
  };
  }
  function addDataToTable(data) {
   
    var table = document.getElementById('listdepenses')
    for (var i = 0; i < data.length; i++) {
      var row = `<tr>
                 
                  <td>${data[i].Titre}</td>
                  <td>${data[i].Description}</td>
                  <td>${data[i].Montant}</td>
                  <td>${data[i].Date}</td>
                  <td>
                    <button  style=" padding: 10px 20px; font-size: 16px;border: none;color : white; background-color: #ffb5a7;   border-radius:15px; " onclick="getdepenses(${data[i].ID})">Modifier</button>
                    <button   style="padding: 10px 20px; font-size: 16px; border: none;color : white;  background-color: #ffb5a7;   border-radius:15px; "onclick="deletedepenses(${data[i].ID})">Supprimer</button>
                  </td>
                </tr>`
      table.innerHTML += row
    }
  }
  function deletedepenses(iddepenses) {
    var listclients = document.getElementById("listdepenses");
    listclients.innerHTML = "";
    let conf = confirm("Voulez-vous vraiment supprimer cet depense ?");
    if (conf) {
      
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "./php/traitement2.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      data1 = "action=" + encodeURIComponent("supprimer")+"&id="+encodeURIComponent(iddepenses);
      xhr.send(data1);
      xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
       // getListdepenses();
       console.log(xhr.responseText);
       if(xhr.responseText=="success"){
        getListdepenses();
        $("#messageSuccessModal").html("Suppression réussie!")
        $("#successModal").show();
      }else{
               $("#messageFailedModal").html("Suppression échouée!")
          $("#failedModal").show();
      }}
    };

    }
  }
  function getdepenses(iddepenses){
   
    var smallElements = document.querySelectorAll("small");
    smallElements.forEach(function(small) {
      small.hidden = true;
    });
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/traitement2.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var depense = JSON.parse(xhr.responseText);
          document.getElementById("titre").value = depense[0].Titre;
          document.getElementById("description").value = depense[0].Description;
          document.getElementById("montant").value = depense[0].Montant;
          document.getElementById("date").value = depense[0].Date;
          document.getElementById("ajouter").innerHTML = "Modifier";
          document.getElementById("ajouter").onclick = function() {
            insertdepenses(depense[0].ID, "modifier");
          };
        } else {
          document.getElementById("messageFailedModal").innerHTML = "Une erreur est survenue!";
          document.getElementById("failedModal").style.display = "block";
        }
      }
    };
    
    var formData = "id=" + encodeURIComponent(iddepenses) + "&action=afficher";
    xhr.send(formData);
  }
    

   function insertdepenses(iddepenses,Action){
    var smallElements = document.querySelectorAll("small");
    smallElements.forEach(function(small) {
      small.hidden = true;
    });
    
    var titre=document.getElementById("titre").value;
    var description=document.getElementById("description").value;
    var  montant=document.getElementById("montant").value;
    var date=document.getElementById("date").value;
    var action=Action;
    var formData = "id=" + encodeURIComponent(iddepenses) +
               "&titre=" + encodeURIComponent(titre) +
               "&description=" + encodeURIComponent(description) +
               "&montant=" + encodeURIComponent(montant) +
               "&date=" + encodeURIComponent(date) +
               "&action=" + Action;
    if(titre== "" || description == "" || montant == "" || date == ""){
      validateForm();
    }
    else{
        var listdepenses = document.getElementById("listdepenses");
        listdepenses.innerHTML = "";
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./php/traitement2.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if(iddepenses == 0){
            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                  getListdepenses();
                  
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
                    getListdepenses();
                  
                    document.getElementById("formulaire").reset();
                    document.getElementById("ajouter").innerHTML = "Ajouter";
                    document.getElementById("ajouter").onclick = function() {
                      insertdepenses(0, "ajouter");
                    };
                    document.getElementById("messageSuccessModal").innerHTML = "Modification réussie !";
                    document.getElementById("successModal").style.display = "block";
                  } else {
                    getListdepenses();
                    document.getElementById("formulaire").reset();
                    document.getElementById("ajouter").innerHTML = "Ajouter";
                    document.getElementById("ajouter").onclick = function() {
                      insertdepenses(0, "ajouter");
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
                  insertdepenses(0, "ajouter");
                };
                document.getElementById("messageFailedModal").innerHTML = "Modification échouée !";
                document.getElementById("failedModal").style.display = "block";
              };
              
              xhr.send(formData);
             
                 
        }
    }
  }
  document.getElementById("TitreSearch").addEventListener("input", function() {
    var input = this.value.toLowerCase();
    var table = document.getElementById("mytable");
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
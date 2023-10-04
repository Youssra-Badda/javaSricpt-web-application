getListprestations();
function validateForm() {
    if (document.getElementById("titre").value.trim().length == 0) {
      document.getElementById("stitre").hidden = false;
    } else if (document.getElementById("description").value.trim().length == 0) {
      document.getElementById("sdescription").hidden = false;
    } else if (document.getElementById("prix").value.trim().length == 0) {
      document.getElementById("sprix").hidden = false;
    
  } else if (document.getElementById("image").value.trim().length == 0) {
    document.getElementById("simage").hidden = false;
  } 
  }
function getListprestations(){
   
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./traitementpres.php", true);
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
  };

  
  }
  
  function addDataToTable(data) {
   
    var table = document.getElementById('listprestations')
    for (var i = 0; i < data.length; i++) {
      var row = `<tr>
                 
                  <td>${data[i].Titre}</td>
                  <td>${data[i].Description}</td>
                  <td>${data[i].prix}</td>
                 
                  <td>
                    <button class='btn btn-primary me-2' onclick="getprestations(${data[i].ID})">Modifier</button>
                    <button class='btn btn-danger' onclick="deleteprestations(${data[i].ID})">Supprimer</button>
                  </td>
                </tr>`
      table.innerHTML += row
    }
  }
  function deleteprestations(iddepenses) {
    var listclients = document.getElementById("listprestations");
    listclients.innerHTML = "";
    let conf = confirm("Voulez-vous vraiment supprimer cette prestation ?");
    if (conf) {
      
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "./traitementpres.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      data1 = "action=" + encodeURIComponent("supprimer")+"&id="+encodeURIComponent(iddepenses);
      xhr.send(data1);
      xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
       // getListdepenses();
       console.log(xhr.responseText);
       if(xhr.responseText=="success"){
        getListprestations();
        $("#messageSuccessModal").html("Suppression réussie!")
        $("#successModal").show();
      }else{
               $("#messageFailedModal").html("Suppression échouée!")
          $("#failedModal").show();
      }}
    };

    }
  }
  function getprestations(iddepenses){
   
    var smallElements = document.querySelectorAll("small");
    smallElements.forEach(function(small) {
      small.hidden = true;
    });
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./traitementpres.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var depense = JSON.parse(xhr.responseText);
          document.getElementById("titre").value = depense[0].Titre;
          document.getElementById("description").value = depense[0].Description;
          document.getElementById("prix").value = depense[0].prix;
          // document.getElementById("image").value = depense[0].image;

          document.getElementById("image").hidden=true;
          document.getElementById("idm").hidden=true;
          document.getElementById("ajouter").innerHTML = "Modifier";
          document.getElementById("ajouter").onclick = function() {
            insertprestations(depense[0].ID, "modifier");
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
    

   function insertprestations(iddepenses,Action){
    var smallElements = document.querySelectorAll("small");
    smallElements.forEach(function(small) {
      small.hidden = true;
    });
    // var formData = {
    //   id: iddepenses,
    //   titre: $("#titre").val(),
    //   description: $("#description").val(),
    //   montant: $("#montant").val(),
    //   date: $("#date").val(),
    //   action: Action,
    // };
    var titre=document.getElementById("titre").value;
    var description=document.getElementById("description").value;
    var  prix=document.getElementById("prix").value;
    var image=document.getElementById("image").value;
   
    var action=Action;
    var formData = "id=" + encodeURIComponent(iddepenses) +
               "&titre=" + encodeURIComponent(titre) +
               "&description=" + encodeURIComponent(description) +
               "&prix=" + encodeURIComponent(prix) +
               "&image=" + encodeURIComponent(image) +
               "&action=" + Action;
    if(titre== "" || description == "" || prix == "" ){
      validateForm();
    }
    else{
        var listdepenses = document.getElementById("listprestations");
        listdepenses.innerHTML = "";
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./traitementpres.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if(iddepenses == 0){
            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                  getListprestations();
                  
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
          
          document.getElementById("image").hidden=false;
          document.getElementById("idm").hidden=false;
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                  if (xhr.status === 200) {
                    getListprestations();
                  
                    document.getElementById("formulaire").reset();
                    document.getElementById("ajouter").innerHTML = "Ajouter";
                    document.getElementById("ajouter").onclick = function() {
                      insertprestations(0, "ajouter");
                    };
                    document.getElementById("messageSuccessModal").innerHTML = "Modification réussie !";
                    document.getElementById("successModal").style.display = "block";
                  } else {
                    getListdepenses();
                    document.getElementById("formulaire").reset();
                    document.getElementById("ajouter").innerHTML = "Ajouter";
                    document.getElementById("ajouter").onclick = function() {
                      insertprestations(0, "ajouter");
                    };
                    document.getElementById("messageFailedModal").innerHTML = "Modification échouée !";
                    document.getElementById("failedModal").style.display = "block";
                  }
                }
              };
              
              xhr.onerror = function() {
                getListprestations();
                document.getElementById("formulaire").reset();
                document.getElementById("ajouter").innerHTML = "Ajouter";
                document.getElementById("ajouter").onclick = function() {
                  insertprestations(0, "ajouter");
                };
                document.getElementById("messageFailedModal").innerHTML = "Modification échouée !";
                document.getElementById("failedModal").style.display = "block";
              };
              
              xhr.send(formData);
             
                 
        }
    }
  }
  
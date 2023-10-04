import getXhr from "./Ajax.js";


getAllprestations ();
window.addEventListener('load', function(event) { 
    // console.log("je suis au debut de l'evenement ");
     event.preventDefault();
     var xhr = getXhr();
     const data = new FormData();
     xhr.open("POST", "./php/traitement.php", true);
     data.append("action", "afficherClient");
    
    
     
    
     //var data1 = "action=" + encodeURIComponent("afficherClient") ;
     xhr.send(data);
    xhr.onreadystatechange = function() {
        
    if (xhr.readyState === 4 && xhr.status === 200) {
      
      // Réponse du serveur
      var client =JSON.parse(xhr.responseText);
        document.getElementById("nom").value=client[0].nom;
        document.getElementById("prenom").value=client[0].prenom;
        document.getElementById("email").value=client[0].Email;
        document.getElementById("tele").value=client[0].tele;
        document.getElementById("adrs").value=client[0].Adresse;
        document.getElementById("username").value=client[0].username;
        document.getElementById("password").value=client[0].password;
      // Traiter les enregistrements
       
    //   //addDataToForm(data);
    }

    }


   
});

//modifier client 
var formulaire =document.getElementById("form");
var editBtn=document.getElementById("edit");
editBtn.addEventListener('click',function(event){
  event.preventDefault();
  const xhr = getXhr();

  var url = "./php/traitement.php";
 
  var data = new FormData(formulaire);
 
  data.append("action","modifierClient");
  xhr.open("POST", url, true);
 
     xhr.send(data);
     xhr.onreadystatechange = function() {
      console.log("traite1");
       if (xhr.readyState === 4 && xhr.status === 200) {
           console.log("traite");
           if(xhr.responseText== "success"){
              alert("la modification se fait avec succes");
           }
       }
     }

});

function getAllprestations (){
   
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/traitement.php", true);
  var data=new FormData();
  data.append("action","displayAll");
  //var data1 = "action=" + encodeURIComponent("displayAll") ;
  xhr.send(data);
  xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Réponse du serveur
    
    var per = JSON.parse(xhr.responseText);
    
    // Traiter les enregistrements
    console.log(per);
    addDataToDiv(per);
  }
};


}


/**
 * 
 * <div class="box">
            <h2>Titre 1</h2>
            <img src="../img/p2.jpg" alt="Image 1">
            <p>Description 1</p>
          </div>
 */


function  addDataToDiv(data){
  var div = document.getElementById('container1');
  for (var i = 0; i < data.length; i++) {
    
    var row = ` <div class="box">
                  <h2 style="color:white;">${data[i].Titre} <span style="padding-left:110px;">${data[i].prix} DH</span></h2>
                  <img src="../img/${data[i].image.replace("C:fakepath", "")}"    alt="Image 1">
                  <p style="width:300px;">${data[i].Description}</p>
                </div>`
    div.innerHTML += row;
  }
}

 

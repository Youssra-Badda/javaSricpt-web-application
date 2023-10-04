<?php
include_once('function.php');

//client
$id1 =$_SESSION['idR'];

$date = isset($_POST['date']) ? $_POST['date'] : NULL;
$heure = isset($_POST['Heure']) ? $_POST['Heure'] : NULL;
$etat= isset($_POST['Etat']) ? $_POST['Etat'] : NULL;


$id = isset($_POST['id']) ? $_POST['id'] : NULL;

$action = isset($_POST['action']) ? $_POST['action'] : NULL;

if ($action == "afficher") {
    
    $res = getRendezV($id1);
    echo $res;
}else if ($action == "supprimer") {
  
  $res = delRendez_vous($id ,$id1);
  
  if ($res == true)
      echo "success";
  else
      echo "error";
}else if($action == "modifierRV"){
  
  $res = updaterendezvous($id,$date,$heure,$etat );
  if ($res == "success")
      echo "success";
  else
      echo "error";
}else if($action =="afficherRV"){
  $res = getrendezvous($id);
  echo $res;
}
<?php
include_once('function.php');


$nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
$email = isset($_POST['email']) ? $_POST['email'] : NULL;
$tele = isset($_POST['tele']) ? $_POST['tele'] : NULL;
$pass = isset($_POST['password']) ? $_POST['password'] : NULL;
$username = isset($_POST['username']) ? $_POST['username'] : NULL;
$ads = isset($_POST['Adresse']) ? $_POST['Adresse'] : NULL;
$id = $_SESSION['id'];

$action = isset($_POST['action']) ? $_POST['action'] : NULL;

if ($action == "afficherClient") {
    
    $res = getclient($id);
    echo $res;
}else if($action == "modifierClient"){
    $res = editclient($id,$nom,$prenom,$email,$tele,$pass,$username,$ads);
    if ($res == "success")
        echo "success";
    else
        echo "error";
}else if ($action == "displayAll"){
    $res = getAllPrestation();
    echo $res;
}
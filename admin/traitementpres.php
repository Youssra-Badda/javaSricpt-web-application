<?php
include_once('fonctions.php');

$titre = isset($_POST['titre']) ? $_POST['titre'] : NULL;
$description = isset($_POST['description']) ? $_POST['description'] : NULL;
$prix= isset($_POST['prix']) ? $_POST['prix'] : NULL;
$image= isset($_POST['image']) ? $_POST['image'] : NULL;
$id = isset($_POST['id']) ? $_POST['id'] : NULL;
$action = isset($_POST['action']) ? $_POST['action'] : NULL;
if ($action == "ajouter") {
    $res = insertprestations($titre, $description, $prix,$image);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} else if ($action == "modifier") {
    $res = updateprestations($id,$titre, $description, $prix,$image);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} else if ($action == "supprimer") {
    $res = deleteprestations($id);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} else if ($action == "afficher") {
    $res = getprestations($id);
    echo $res;
} else if ($action == "afficherTous") {
    $res = getAllprestations();
    echo $res;

}else {
    echo "action non reconnue";}

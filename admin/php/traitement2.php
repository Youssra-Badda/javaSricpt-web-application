<?php
include_once('fonctions.php');
$titre = isset($_POST['titre']) ? $_POST['titre'] : NULL;
$description = isset($_POST['description']) ? $_POST['description'] : NULL;
$montant= isset($_POST['montant']) ? $_POST['montant'] : NULL;
$date= isset($_POST['date']) ? $_POST['date'] : NULL;
$id = isset($_POST['id']) ? $_POST['id'] : NULL;
$action = isset($_POST['action']) ? $_POST['action'] : NULL;
if ($action == "ajouter") {
    $res = insertdepenses($titre, $description, $montant, $date);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} else if ($action == "modifier") {
    $res = updatedepenses($id,$titre, $description, $montant, $date);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} else if ($action == "supprimer") {
    $res = deletedepenses($id);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} else if ($action == "afficher") {
    $res = getdepenses($id);
    echo $res;
} else if ($action == "afficherTous") {
    $res = getAlldepenses();
    echo $res;
} else {
    echo "action non reconnue";}
?>
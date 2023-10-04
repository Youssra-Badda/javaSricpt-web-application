<?php
include_once('fonctions.php');
$date = isset($_POST['date']) ? $_POST['date'] : NULL;
$heure = isset($_POST['heure']) ? $_POST['heure'] : NULL;
$id = isset($_POST['id']) ? $_POST['id'] : NULL;
$action = isset($_POST['action']) ? $_POST['action'] : NULL;
if ($action == "ajouter") {
    $res = insertrendervous($date, $heure);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} else if ($action == "modifier") {
    $res = updaterendezvous($id,$date, $heure);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} else if ($action == "supprimer") {
    $res = deleterendezvous($id);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} else if ($action == "afficher") {
    $res = getrendezvous($id);
    echo $res;
} else if ($action == "afficherTous") {
    $res = getAllrendezvous();
    echo $res;
} 
else {
    echo "action non reconnue";}

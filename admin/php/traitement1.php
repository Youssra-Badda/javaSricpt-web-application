<?php
include_once('fonctions.php');
$id = isset($_POST['id']) ? $_POST['id'] : NULL;
$action = isset($_POST['action']) ? $_POST['action'] : NULL;
 if ($action == "supprimer") {
    $res = deleteclient($id);
    if ($res == "success")
        echo "success";
    else
        echo "error";
} 
else if ($action == "afficherTous") {
    $res = getAllclients();
    echo $res;
} else {
    echo "action non reconnue";}

<?php
include_once('fonctions.php');
$action = isset($_POST['action']) ? $_POST['action'] : NULL;
 if ($action == "AfficherTousRendezvous") {
    $res = getAllClientRendezVous();
    echo $res;
}  else {
    echo "action non reconnue";}
    // $res = getAllClientRendezVous();
    // echo $res;
?>
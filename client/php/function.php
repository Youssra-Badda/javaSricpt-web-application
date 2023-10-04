<?php
//Connection a la base de donnée
session_start();
function connectionDB()
{
    $db = new PDO('mysql:host=localhost;dbname=beauty_db', 'root', '');
    return $db;
}
function getclient($id)
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM personne WHERE ID_Pesonne = '" . $id . "'");
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}

function editclient($id,$Nom,$prenom,$email,$tele,$pass,$username,$ads){
    $db = connectionDB();//nom prenom Email tele password username Adresse
    $res = $db->exec("UPDATE personne SET nom = '" . $Nom . "', prenom = '" . $prenom . "', Email = '" . $email ."', tele = '" . $tele . "', password = '" . $pass ."', username = '" . $username ."', Adresse = '" . $ads .   "' WHERE ID_Pesonne = '" . $id . "'");
    if ($res)
        return "success";
    else
        return "error";
}
function getAllPrestation()
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM prestations ");//chaaangeee
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}


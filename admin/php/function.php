<?php
session_start();

function connectionDB()
{
    $db = new PDO('mysql:host=localhost;dbname=beauty_db', 'root', '');
    return $db;
}
function getRendezV($id)
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM rendezvous WHERE Id_client = '" . $id . "'");
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}

//delete rendez-vous
function delRendez_vous($id ,$id1 )
{
    $db = connectionDB();
    $res = $db->exec("DELETE FROM rendezvous WHERE id_RV = '" . $id . "' AND  Id_client =  '".$id1."'");
    
    if ($res)
       
        return $res;
    else
        
        return "error";
}
function getrendezvous($id)
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM rendezvous  WHERE id_RV= '" . $id . "'");
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}
//modifer Rendez-vous
function updaterendezvous($id,$date, $heure,$etat )
{
    $db = connectionDB();
    $res = $db->exec("UPDATE rendezvous  SET date= '" . $date. "', heure = '" . $heure . "', 	Etat = '" .$etat ."' WHERE id_RV= '" . $id . "' ");
    if ($res)
        return "success";
    else
        return "error";
}




<?php
session_start();
// $_SESSION['id']=2;
//Connection a la base de donnée
function connectionDB()
{
    $db = new PDO('mysql:host=localhost;dbname=beauty_db', 'root', '');
    return $db;
}


/************************************************************* */
//insertion depenses
function insertdepenses($titre, $description,$montant,$date)
{
    $db = connectionDB();
    $res = $db->exec("INSERT INTO depenses  (Titre,Description,Montant,Date) VALUES ('" . $titre. "', '" . $description. "', '" . $montant. "','" . $date. "')");
    if ($res)
        return "success";
    else
        return "error";
}

//suppressiondepenses
function deletedepenses($id)
{
    $db = connectionDB();
    $res = $db->exec("DELETE FROM depenses WHERE id = '" . $id . "'");
    if ($res)
        return "success";
    else
        return "error";
}

//modificationdepenses
function updatedepenses($id,$titre, $description,$montant,$date)
{
    $db = connectionDB();
    $res = $db->exec("UPDATE depenses SET Titre= '" . $titre. "', Description = '" . $description . "', Montant = '" . $montant . "', Date = '" . $date . "' WHERE ID = '" . $id . "'");
    if ($res)
        return "success";
    else
        return "error";
}


//afficher un depenses
function getdepenses($id)
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM depenses WHERE id = '" . $id . "'");
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}
//afficher tous les depenses
function getAlldepenses()
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM depenses ");
    //parcourir $res qui contient beaucoups de ligne et le retouner sous format de json
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}
// function caisse(){
//         $db = connectionDB();
//         $res = $db->query("SELECT SUM(Montant) FROM depenses ");
//         $rows = $res->fetch(PDO::FETCH_ASSOC);
//         $res1 = $db->query("SELECT SUM(prix) FROM prestations ");
//         $rows1 = $res1->fetch(PDO::FETCH_ASSOC);
    
//         $difference = $rows1['SUM(prix)'] - $rows['SUM(Montant)'];
//         return json_encode($difference);
// }
// ***********************************************************************************************************
// function insertclient($Nom, $prenom,$Adresse,$Email,$Téléphone)
// {
//     $db = connectionDB();
//     $res = $db->exec("INSERT INTO personne  (nom,prenom,Email,tele,Adresse) VALUES ('" . $Nom. "', '" . $prenom. "', '" . $Adresse. "','" . $Email. "','" . $Téléphone. "')");
//     if ($res)
//         return "success";
//     else
//         return "error";
// }

//suppressiondepenses
function deleteclient($id)
{
    $db = connectionDB();
    $res = $db->exec("DELETE FROM personne WHERE ID_Pesonne = '" . $id . "'");
    if ($res)
        return "success";
    else
        return "error";
}


    
//modificationdepenses
// function updateclients($id,$Nom, $prenom,$Adresse,$Email,$Téléphone)
// {
//     $db = connectionDB();
//     $res = $db->exec("UPDATE clients SET Nom= '" . $Nom. "', prenom = '" . $prenom . "', Adresse = '" . $Adresse . "', Email = '" . $Email . "', Téléphone= '" . $Téléphone . "' WHERE ID = '" . $id . "'");
//     if ($res)
//         return "success";
//     else
//         return "error";
// }


//afficher un depenses
//afficher tous les depenses
function getAllclients()
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM personne ");
    //parcourir $res qui contient beaucoups de ligne et le retouner sous format de json
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}
/**************************************************************************************************************** */
function getAllrendezvous()
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM rendezvous  WHERE Id_client = '" . $_SESSION['id'] . "'");
    //parcourir $res qui contient beaucoups de ligne et le retouner sous format de json
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}
function deleterendezvous($id)
{
    $db = connectionDB();
    $res = $db->exec("DELETE FROM rendezvous WHERE id_RV= '" . $id . "'");
    if ($res)
        return "success";
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
function updaterendezvous($id,$date, $heure)
{
    $db = connectionDB();
    $res = $db->exec("UPDATE rendezvous  SET date= '" . $date. "', heure = '" . $heure . "' WHERE id_RV= '" . $id . "' ");
    if ($res)
        return "success";
    else
        return "error";
}
function insertrendervous($date, $heure)
{
    $etat="en attente";
    $db = connectionDB();
    $res = $db->exec("INSERT INTO rendezvous  (Id_client,date,Etat,heure) VALUES ('" . $_SESSION["id"]. "', '" . $date. "', '" . $etat ."','" . $heure. "')");
    if ($res)
        return "success";
    else
        return "error";
}
/*****************************************************************************************************/
function getAllClientRendezVous()
{
    $db = connectionDB();
   
    $res = $db->query(" SELECT DISTINCT p.ID_Pesonne,p.nom ,p.prenom, p.Email,p.tele FROM personne p JOIN rendezvous rv ON p.ID_Pesonne = rv.Id_client");
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}
function getRendezV($id)
{
    $db = connectionDB();
    $res = $db->query("SELECT date,heure,Etat FROM rendezvous WHERE Id_client = '" . $id . "'");
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}
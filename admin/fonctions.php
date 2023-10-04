<?php

//Connection a la base de donnée
function connectionDB()
{
    $db = new PDO('mysql:host=localhost;dbname=beauty_db', 'root', '');
    return $db;
}




/************************************************************* */
//insertion depenses
function insertprestations($titre, $description,$prix,$image)
{
    $db = connectionDB();
    $res = $db->exec("INSERT INTO prestations  (Titre,Description,prix,image) VALUES ('" . $titre. "', '" . $description. "', '" . $prix. "', '" . $image. "')");
    if ($res)
        return "success";
    else
        return "error";
     
    $targetDirectory = 'img2'; // Spécifiez le chemin vers le dossier où vous souhaitez stocker l'image
    $targetFile = $targetDirectory . basename($_FILES['image']['name']);

    // Vérifiez si le fichier a été correctement téléchargé
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        echo 'L\'image a été téléchargée avec succès.';
        // À ce stade, vous pouvez enregistrer le chemin du fichier dans votre base de données.
    } else {
        echo 'Une erreur s\'est produite lors du téléchargement de l\'image.';
    }

}

//suppressiondepenses
function deleteprestations($id)
{
    $db = connectionDB();
    $res = $db->exec("DELETE FROM prestations WHERE id = '" . $id . "'");
    if ($res)
        return "success";
    else
        return "error";
}

//modificationdepenses
function updateprestations($id,$titre, $description,$prix)
{
    $db = connectionDB();
    $res = $db->exec("UPDATE prestations SET Titre= '" . $titre. "', Description = '" . $description . "', prix = '" . $prix . "'  WHERE ID = '" . $id . "'");
    if ($res)
        return "success";
    else
        return "error";
}


//afficher un depenses
function getprestations($id)
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM prestations WHERE id = '" . $id . "'");
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}
//afficher tous les depenses
function getAllprestations()
{
    $db = connectionDB();
    $res = $db->query("SELECT * FROM prestations ");
    //parcourir $res qui contient beaucoups de ligne et le retouner sous format de json
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($rows);
}


<?php 
try {
    // Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=beauty_db', 'root', '');

    // Requête pour obtenir la somme des montants dans la caisse
    $requeteSommeCaisse = "SELECT SUM(montant) AS somme_caisse FROM caisse1";

    // Exécution de la requête
    $resultatCaisse = $connexion->query($requeteSommeCaisse);
    $sommeCaisse = $resultatCaisse->fetchColumn();

    // Requête pour obtenir la somme des prix dans le tableau "prestations"
    $requeteSommePrestations = "SELECT SUM(Montant) AS somme_prestations FROM  depenses";

    // Exécution de la requête
    $resultatPrestations = $connexion->query($requeteSommePrestations);
    $sommePrestations = $resultatPrestations->fetchColumn();

    // Calcul de la différence entre la somme de la caisse et la somme des prestations
    $difference = $sommeCaisse - $sommePrestations;

    // Affichage de la différence
    echo "<p>L'etat de la caisse est  : " . $difference . " DH</p>";
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
  ?>
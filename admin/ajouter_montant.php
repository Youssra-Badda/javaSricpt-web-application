<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le montant depuis le formulaire
    $montant = $_POST['montant'];

    try {
      // Connexion à la base de données
       $connexion = new PDO('mysql:host=localhost;dbname=beauty_db', 'root', '');

      // Requête d'insertion
      $requete = "INSERT INTO caisse1 (montant) VALUES (:montant)";

      // Préparation de la requête
      $statement = $connexion->prepare($requete);

      // Liaison du paramètre
      $statement->bindParam(':montant', $montant);

      // Exécution de la requête
      if ($statement->execute()) {
          echo "Montant ajouté avec succès.";
      } else {
          echo "Erreur lors de l'ajout du montant.";
      }
    } catch (PDOException $e) {
      echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
  }
  ?>
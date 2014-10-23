<?php
    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);
 
        // Connexion à la base de données
        include("db.php");
 
        // Requête SQL
        $requete = "SELECT * FROM tag WHERE tag LIKE '". $q ."%' LIMIT 0, 10";
 
        // Exécution de la requête SQL
        $resultat = $dbh->query($requete) or die(print_r($dbh->errorInfo()));
 
        // On parcourt les résultats de la requête SQL
        while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            // On ajoute les données dans un tableau
            $suggestions['suggestions'][] = $donnees['tag'];
        }
 
        // On renvoie le données au format JSON pour le plugin
        echo json_encode($suggestions);
    }
?>
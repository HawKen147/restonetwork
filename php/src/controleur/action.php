<?php
if(!isset($_SESSION)){
    session_start();
}
require("BDD.php");


////////////////////////////////////////////////////////////////////////////////////////////////
///// creer des divs puis rentrer les fonctions pour afficher les tournois /////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

//send sql request to the DB
function sql_request($requete, $parametres = []) {
    try {
        $pdo = seConnecterBDD(); 
        // Préparer la requête
        $stmt = $pdo->prepare($requete);
        // Exécuter la requête avec les paramètres fournis (s'il y en a)
        $stmt->execute($parametres);
        // Renvoyer le résultat de la requête
        return $stmt;
    } catch (PDOException $e) {
        // Gérer les erreurs PDO ici
        echo "Erreur SQL : " . $e->getMessage();
        return false;
    }
}

function get_restaurant(){
    $sql = "SELECT * FROM Restaurant";
    $resultat = sql_request($sql, []);
    return $resultat;
}
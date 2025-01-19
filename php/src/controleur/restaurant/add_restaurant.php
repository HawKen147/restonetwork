<?php
session_start();
include("../action.php");

///////////////////////////////////////////////////////////////////////////
//////////////////  Crate a new Tournament  ///////////////////////////////
///////////////////////////////////////////////////////////////////////////
if (isset($_POST["nom_restaurant"]) && isset($_POST["adresse_restaurant"])){
    $nom_restaurant = htmlspecialchars($_POST["nom_restaurant"]);
    $adresse_restaurant = htmlspecialchars($_POST["adresse_restaurant"]);
    $sql = "INSERT INTO `Restaurant` (`Nom_restaurant`, `Adresse_restaurant`) VALUES (?, ?)";
    $resultat =  sql_request($sql, [$nom_restaurant, $adresse_restaurant]);
    $_SESSION["result"] = "Le restaurant a bien été ajouté";
    header("Location:../../gestion/gestion_restaurant.php");
} else {
    $_SESSION["result"] = "un problème est survenue";
    header("Location:../../gestion/gestion_restaurant.php");
}



<?php
session_start();
include("../action.php");

///////////////////////////////////////////////////////////////////////////
//////////////////  Crate a new Tournament  ///////////////////////////////
///////////////////////////////////////////////////////////////////////////
if (isset($_POST["nom_restaurant"]) && isset($_POST["id_restaurant"]) && isset($_POST["adresse_restaurant"])){
    $nom_restaurant = htmlspecialchars($_POST["nom_restaurant"]);
    $adresse_restaurant = htmlspecialchars($_POST["adresse_restaurant"]);
    $id_restaurant = htmlspecialchars($_POST["id_restaurant"]);
    $sql = "UPDATE `Restaurant` SET `nom_restaurant`= ?,`Adresse_restaurant`= ? WHERE `ID_restaurant` = ? ";
    $resultat =  sql_request($sql, [$nom_restaurant, $adresse_restaurant, $id_restaurant]);
    $_SESSION["result"] = "Mise a jour à été éffectué";
    header("Location:../../gestion/gestion_restaurant.php");
} else {
    $_SESSION["result"] = "un problème est survenue";
    header("Location:../../gestion/gestion_restaurant.php");
}



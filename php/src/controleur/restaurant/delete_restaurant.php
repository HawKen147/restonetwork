<?php
session_start();
include("../action.php");


///////////////////////////////////////////////////////////////////////////
//////////////////  Crate a new Tournament  ///////////////////////////////
///////////////////////////////////////////////////////////////////////////
if (isset($_POST["nom_restaurant"]) && isset($_POST["id_restaurant"])){
    $nom_restaurant = htmlspecialchars($_POST["nom_restaurant"]);
    $id_restaurant = htmlspecialchars($_POST["id_restaurant"]);
    $sql = "DELETE FROM `Restaurant` WHERE `ID_restaurant` = ?";
    $resultat =  sql_request($sql, [$id_restaurant]);
    $_SESSION["result"] = "Le restaurant a bien été supprimé";
    header("Location:../../gestion/gestion_restaurant.php");
} else {
    $_SESSION["result"] = "un problème est survenue";
    header("Location:../../gestion/gestion_restaurant.php");
}



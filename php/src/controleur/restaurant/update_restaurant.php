<?php
include("../action.php");

///////////////////////////////////////////////////////////////////////////
//////////////////  Crate a new Tournament  ///////////////////////////////
///////////////////////////////////////////////////////////////////////////

if (isset($_POST["nom_restaurant"]) && isset($_POST["id_restaurant"]) && isset($_POST["addresse_restaurant"])){
    $nom_restaurant = htmlspecialchars($_POST["nom_restaurant"]);
    $adresse_restaurant = htmlspecialchars($_POST["addresse_restaurant"]);
    $id_restaurant = htmlspecialchars($_POST["id_restaurant"]);
    $sql = "UPDATE `Restaurant` SET `Name`= ?,`Adresse`= ? WHERE `ID_restaurant` = ? ";
    $resultat =  sql_request($sql, [$nom_restaurant, $adresse_restaurant, $id_restaurant]);
    return $resultat;
} else {
    header("Location:../gestion/gestion_restaurant.php");
}



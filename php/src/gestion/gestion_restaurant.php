<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
        include_once("../model/head.php")
    ?>
</head>
<header>
    <?php
        include_once("../model/header.php")
    ?>
</header>
<body>
    <p>Choisissez ce que vous voulez faire</p>
    <form action="controleur/bdd_restaurant" method="post">
        <select name="restaurant" id="restaurant" onchange="getSelectValue(this);">
            <option value="">--Choisissez une action--</option>
            <option value="update">mettre à jour</option>
            <option value="add">ajouter</option>
            <option value="delete">supprimer</option>
        </select>
    </form>
    <br>
    <div id="form_retaurant">

    </div>
</body>
<footer>
</footer>
<script src="../js/ajax_gestion_restaurant.js"></script>
<script src="../js/ajax_update_restaurant.js"></script>
</html>
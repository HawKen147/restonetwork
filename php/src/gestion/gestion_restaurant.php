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
    <span><? if (isset($_SESSION["result"])){ 
            echo ($_SESSION['result']); 
            unset($_SESSION["result"]);  
            };?>
    </span>
    <form>
        <select name="choix" id="choix" onchange="getSelectValue(this);">
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
<script src="../js/update_fields_choice_restau.js"></script>
<script src="../js/update_fields_choice_delete_restaurant.js"></script>
</html>
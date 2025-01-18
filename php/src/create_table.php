<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<head>
    <?php
        include_once("model/head.php")
    ?>
</head>
</head>
<header>
    <?php
        include_once("model/header.php")
    ?>
</header>
<body>
    <form action="controleur/creates_tables.php" method="post">
        <p>Cliquer sur le bouton pour créer la base de donnée et les tables</p>
        <input type="submit" class="button" value="Envoyer">
    </form>
    <br>
    <?php 
        if (isset($_SESSION["resultat_sql"])){
            echo ($_SESSION["resultat_sql"]);
            unset ($_SESSION["resultat_sql"]);
        }
    ?>
</body>
<footer>

</footer>
</html>
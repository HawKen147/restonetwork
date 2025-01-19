<?php
    session_start();
    include_once("controleur/action.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
        include_once("model/head.php")
    ?>
</head>
<header>
    <?php
        include_once("model/header.php")
    ?>
</header>
<body>
    <table>
        <caption>
          Liste des restaurants
        </caption>
        <thead>
            <tr>
                <th scope="col">Nom du restaurant</th>
                <th scope="col">Adresse du restaurant</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $resultat = get_restaurant();
            $lignes = $resultat->fetchAll(PDO::FETCH_ASSOC);
            foreach($lignes as $ligne){
        ?>
            <tr>
                <th scope="row"><?= $ligne['Nom_restaurant']?></th>
                <th scope="row"><?= $ligne['Adresse_restaurant']?></th>
            </tr>
        <?php 
        }
        ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>
<footer>

</footer>
</html>
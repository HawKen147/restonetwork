<?php
include_once("../../controleur/action.php");

$resultat = get_restaurant();
$lignes = $resultat->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['restaurant'])) {
    $choix = htmlspecialchars($_POST['restaurant'], ENT_QUOTES, 'UTF-8');
    if ($choix == "update") {
        ?>
        <form action="../../controleur/restaurant/update_restaurant.php" method="post" onchange="getSelectValueUpdateRestaurant(this);">
            <label for="restaurant">Choisissez un restaurant :</label>
            <select name="restaurant" id="restaurant">
                <option value="">--Choisissez un restaurant--</option>
                <?php foreach($lignes as $ligne): ?>
                    <option value="<?= htmlspecialchars($ligne["ID_restaurant"], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($ligne["Nom_restaurant"], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <label for="nom_restaurant">Nom du restaurant :</label>
            <input type="text" 
                   name="nom_restaurant" 
                   id="nom_restaurant" 
                   placeholder="Nom du restaurant"
                   value="">

            <br>

            <label for="adresse_restaurant">Adresse du restaurant :</label>
            <input type="text" 
                   name="adresse_restaurant" 
                   id="adresse_restaurant" 
                   placeholder="Adresse du restaurant">
            <br>

            <input type="submit" class="button" value="Envoyer">
        </form>
        <?php
    } elseif ($choix == "add"){
        echo('
            <form action="controleur/restaurant/add_restaurant.php" method="post">
                <input type="texte" placeholder="Nom du restaurant" name="nom_restaurant" id="nom_restaurant">
                <br>
                <input type="texte" placeholder="Adresse du restaurant" name="nom_restaurant" id="nom_restaurant">
                <br>
                <input type="submit" class="button" value="Envoyer">
            </form>');
    }
    elseif ($choix == "delete"){
        echo('
            <form action="controleur/restaurant/delete_restaurant.php" method="post">
                <select name="restaurant" id="restaurant">
                <option value="">--Choisissez un restaurant--</option>);
            </form>');
    } else {
        
    }
}

?>



<?php
session_start();
include_once("../../controleur/action.php");

$resultat = get_restaurant();
$lignes = $resultat->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['choix'])) {
    $choix = htmlspecialchars($_POST['choix'], ENT_QUOTES, 'UTF-8');
    if ($choix == "update") {
        ?>
        <label for="restaurant">Choisissez un restaurant :</label>
        <select name="restaurant" id="restaurant" onchange="updateFields();">
            <option value="">--Choisissez un restaurant--</option>
            <?php foreach($lignes as $ligne): ?>
                <option id_restaurant="<?= htmlspecialchars($ligne["ID_restaurant"], ENT_QUOTES, 'UTF-8') ?>" 
                        data-nom="<?= htmlspecialchars($ligne["Nom_restaurant"], ENT_QUOTES, 'UTF-8')?>" 
                        data-adresse="<?= htmlspecialchars($ligne["Adresse_restaurant"], ENT_QUOTES, 'UTF-8')?>">
                    <?= htmlspecialchars($ligne["Nom_restaurant"], ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <form action="../../controleur/restaurant/update_restaurant.php" method="post">
            <label for="nom_restaurant">Nom du restaurant :</label>
            <input type="text" 
                   name="nom_restaurant" 
                   id="nom_restaurant" 
                   placeholder="Nom du restaurant">
            <br>
            <label for="adresse_restaurant">Adresse du restaurant :</label>
            <input type="text" 
                   name="adresse_restaurant" 
                   id="adresse_restaurant" 
                   placeholder="Adresse du restaurant">
            <br>
            <input type="hidden" name="id_restaurant" id="id_restaurant">
            <input type="submit" class="button" value="Envoyer">
        </form>
        <?php
    } elseif ($choix == "add"){
        ?>
            <form action="../../controleur/restaurant/add_restaurant.php" method="post">
                <input type="texte" placeholder="Nom du restaurant" name="nom_restaurant" id="nom_restaurant">
                <br>
                <input type="texte" placeholder="Adresse du restaurant" name="adresse_restaurant" id="adresse_restaurant">
                <br>
                <input type="submit" class="button" value="Envoyer">
            </form>
    
    <?php
    } elseif ($choix == "delete"){
        ?>
        <form action="../../controleur/restaurant/delete_restaurant.php" method="post">
            <label for="restaurant">Choisissez un restaurant :</label>
            <select name="nom_restaurant" id="nom_restaurant" onchange="updateFieldsHidden();">
                <option value="">--Choisissez un restaurant--</option>
                <?php foreach($lignes as $ligne): ?>
                <option id_restaurant="<?= htmlspecialchars($ligne["ID_restaurant"], ENT_QUOTES, 'UTF-8') ?>" 
                    data-nom="<?= htmlspecialchars($ligne["Nom_restaurant"], ENT_QUOTES, 'UTF-8')?>" 
                    data-adresse="<?= htmlspecialchars($ligne["Adresse_restaurant"], ENT_QUOTES, 'UTF-8')?>">
                <?= htmlspecialchars($ligne["Nom_restaurant"], ENT_QUOTES, 'UTF-8') ?>
                </option>
        <?php endforeach; ?>
            </select>
            <br>
            <input type="hidden" id="id_restaurant" name="id_restaurant">
            <input type="submit" class="button" value="Envoyer">
        </form>
    <?php 
    } else {
        
    }
}

?>






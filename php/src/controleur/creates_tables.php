<?php
session_start();
require_once("bdd.php");

# Creer la table restaurant
function create_table_restaurant() {
	$sql = "CREATE TABLE IF NOT EXISTS Restaurant (
    `ID_restaurant` INT AUTO_INCREMENT,
    `Nom_restaurant` VARCHAR(255) NOT NULL,
    `Adresse_restaurant` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`ID_restaurant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

# Creer la table menu
function create_table_menu() {
	$sql = "CREATE TABLE IF NOT EXISTS Menu (
    `ID_menu` INT AUTO_INCREMENT,
    `Plat` VARCHAR(255) NOT NULL,
    `Rest_ID` INT NOT NULL,
    `Prix` DECIMAL(10, 2) NOT NULL,
	PRIMARY KEY (`ID_menu`),
	CONSTRAINT FK_Rest_ID FOREIGN KEY (`Rest_ID`) REFERENCES Restaurant(`ID_restaurant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

// creer la table etudiant 
function create_table_employe(){
	$sql="CREATE TABLE IF NOT EXISTS Employe (
    ID_employe INT AUTO_INCREMENT,
    Nom_employe VARCHAR(255) NOT NULL,
    Prenom_employe VARCHAR(255) NOT NULL,
    Poste VARCHAR(255) NOT NULL,
    Rest_ID_employe INT NOT NULL,
    Date_Embauche DATE NOT NULL,
    Salaire DECIMAL(10, 2) NOT NULL,
	PRIMARY KEY (`ID_employe`),
    CONSTRAINT FK_Rest_ID_employe FOREIGN KEY (`Rest_ID_employe`) REFERENCES Restaurant(`ID_restaurant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

function create_table_stock(){
	$sql = "CREATE TABLE IF NOT EXISTS Stock (
    ID_stock INT AUTO_INCREMENT,
    Nom_stock VARCHAR(255) NOT NULL,
    Quantite INT NOT NULL,
    ID_Restau_stock INT NOT NULL,
    PRIMARY KEY (`ID_stock`),
    CONSTRAINT FK_ID_Restau_stock FOREIGN KEY (`ID_Restau_stock`) REFERENCES Restaurant(`ID_restaurant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

function create_table_fournisseur () {
	$sql = "CREATE TABLE IF NOT EXISTS Fournisseur (
    ID_fournisseur INT AUTO_INCREMENT,
    Nom_fournisseur VARCHAR(255) NOT NULL,
    Numero_fournisseur VARCHAR(255) NOT NULL,
    Mail_fournisseur VARCHAR(255) NOT NULL,
    Adresse_fournisseur VARCHAR(255) NOT NULL,
	PRIMARY KEY (`ID_fournisseur`))";
	$result = sql_request_table_database($sql);
	return $result;
};

function create_table_client (){
	$sql = "CREATE TABLE IF NOT EXISTS Client (
    ID_client INT AUTO_INCREMENT,
    Nom_client VARCHAR(255) NOT NULL,
    Prenom_client VARCHAR(255) NOT NULL,
    Email_client VARCHAR(255) NOT NULL,
    Date_Inscription DATE NOT NULL,
    Telephone_client VARCHAR(15),
	PRIMARY KEY (`ID_client`))";
	$result = sql_request_table_database($sql);
	return $result;
};

function create_table_relation_Client_Restau (){
	$sql = "CREATE TABLE IF NOT EXISTS Relation_Client_Restau (
    ID_CliRes INT AUTO_INCREMENT,
    ID_Client_restau INT NOT NULL,
    ID_Rest_client INT NOT NULL,
	PRIMARY KEY (`ID_CliRes`),
	CONSTRAINT FK_ID_Client_restau FOREIGN KEY (`ID_Client_restau`) REFERENCES Client(`ID_client`),
	CONSTRAINT FK_ID_Rest_client FOREIGN KEY (`ID_Rest_client`) REFERENCES Restaurant(`ID_restaurant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

function create_table_commande (){
	$sql = "CREATE TABLE IF NOT EXISTS Commande (
    ID_commande INT AUTO_INCREMENT,
    ID_Client_commande INT NOT NULL,
    ID_Restau_commande INT NOT NULL,
    DateCommande DATE NOT NULL,
    Montant_commande DECIMAL(10, 2) NOT NULL,
	PRIMARY KEY	(`ID_commande`),
    CONSTRAINT FK_ID_Client_commande FOREIGN KEY (`ID_Client_commande`) REFERENCES Client(`ID_client`),
    CONSTRAINT FK_ID_Restau_commande FOREIGN KEY (`ID_Restau_commande`) REFERENCES Restaurant(`ID_restaurant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

function create_table_prepare (){
	$sql = "CREATE TABLE IF NOT EXISTS Prepare (
    ID_CoRes INT AUTO_INCREMENT,
    ID_Comm_prepare INT NOT NULL,
    ID_Rest_prepare INT NOT NULL,
	PRIMARY KEY (`ID_CoRes`),
    CONSTRAINT FK_ID_comm_prepare FOREIGN KEY (`ID_comm_prepare`) REFERENCES Commande(`ID_commande`),
    CONSTRAINT FK_ID_rest_prepare FOREIGN KEY (`ID_Rest_prepare`) REFERENCES Restaurant(`ID_restaurant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

####################################################################
################### Exécution des requetes SQL #####################
####################################################################

// envoie les requetes de creations de tables / base de données
function sql_request_table_database($sql){
	// Se connecter au serveur MySQL (sans sélectionner de base de données pour le moment)
	$pdo = seConnecterBDD();

	// Définir le mode d'erreur de PDO sur Exception
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
	    // Exécuter la requête de création de base de données
	    $pdo->exec($sql);
		return true;
	} catch (PDOException $e) {
	    // En cas d'erreur lors de l'exécution de la requête, afficher l'erreur
	    return "Erreur lors de la création de la table : " . $e->getMessage() . "<br> requete SQL : " . $sql;
	}
}

####################################################################
#################### appel toutes les fonctions ####################
####################################################################
$request_results = "";

$result = create_table_restaurant();

if ($result === true){
	$request_results .= "La table restaurant à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_menu();
if ($result === true){
	$request_results .= "La table menu à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_employe();
if ($result === true){
	$request_results .= "La table employe à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_stock();
if ($result === true){
	$request_results .= "La table stock à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_fournisseur();
if ($result === true){
	$request_results .= "La table fournisseur académique à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_client();
if ($result === true){
	$request_results .= "La table client à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_relation_Client_Restau();
if ($result === true){
	$request_results .= "La table relation_Client_Restau à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_commande();
if ($result === true){
	$request_results .= "La table commande à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_prepare();
if ($result === true){
	$request_results .= "La table prepare à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$_SESSION["resultat_sql"] = $request_results;

header("Location:../create_table.php");
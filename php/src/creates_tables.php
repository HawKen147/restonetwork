<?php
require_once("BDD.php");

# Creer la table restaurant
function create_table_restaurant() {
	$sql = "CREATE TABLE Restaurant (
    `ID_restaurant` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Name` VARCHAR(255) NOT NULL,
    `Adresse` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`ID_restaurant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

# Creer la table menu
function create_table_menu() {
	$sql = "CREATE TABLE Menu (
    `ID_menu` INT AUTO_INCREMENT,
    `Plat` VARCHAR(255) NOT NULL,
    `Rest_ID` INT NOT NULL,
    `Prix` DECIMAL(10, 2) NOT NULL,
	PRIMARY KEY (`ID_menu`),
	CONSTRAINT FK_Rest_ID FOREIGN KEY (`Rest_ID`) REFERENCES restaurant(`ID_restaurant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

// creer la table etudiant 
function create_table_etudiant() {
	$sql = "CREATE TABLE IF NOT EXISTS etudiant (
        `id_etudiant` INT NOT NULL AUTO_INCREMENT,
		`nom` VARCHAR(50) NOT NULL ,
		`prenom` VARCHAR(50) NOT NULL ,
		`date_naissance` DATE NOT NULL ,
		`email` VARCHAR(250) NOT NULL ,
		PRIMARY KEY (`id_etudiant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

// creer la table enseignant
function create_table_enseignant() {
	$sql = "CREATE TABLE IF NOT EXISTS enseignant (
        `id_enseignant` INT NOT NULL AUTO_INCREMENT,
		`nom` VARCHAR(50) NOT NULL ,
		`prenom` VARCHAR(50) NOT NULL ,
		`date_naissance` DATE NOT NULL ,
		`email` VARCHAR(250) NOT NULL ,
		PRIMARY KEY (`id_enseignant`))";
	$result = sql_request_table_database($sql);
	return $result;
};

// creer la table cours
function create_table_cours() {
	$sql = "CREATE TABLE IF NOT EXISTS cours ( 
		`id_cours` INT NOT NULL AUTO_INCREMENT,
		`nom_cours` VARCHAR(50) NOT NULL, 
		`description` TEXT NOT NULL,
		`credits` INT NOT NULL,
        `id_departement` INT NOT NULL,
        `id_enseignant` INT NOT NULL,
        CONSTRAINT FK_id_departement FOREIGN KEY (`id_departement`) REFERENCES departement(`id_departement`),
		CONSTRAINT FK_id_enseignant FOREIGN KEY (`id_enseignant`) REFERENCES enseignant(`id_enseignant`),
		PRIMARY KEY (`id_cours`))";
	$result = sql_request_table_database($sql);
	return $result;	
};

// creer la table departement
function create_table_departement() {
	$sql = "CREATE TABLE IF NOT EXISTS departement ( 
		`id_departement` INT NOT NULL AUTO_INCREMENT ,
		`nom_departement` VARCHAR(50) NOT NULL , 
		`responsable` VARCHAR(50) NOT NULL ,
		PRIMARY KEY (`id_departement`))";
	$result = sql_request_table_database($sql);
	return $result;	
};

//creer la table resultat academique
function create_table_resultat_academique(){
	$sql = "CREATE TABLE IF NOT EXISTS resultat_academique (
		`id_resultat` INT NOT NULL AUTO_INCREMENT,
		`id_etudiant`  INT NOT NULL ,
		`id_cours` INT NOT NULL,
        `note` FLOAT NOT NULL,
        `date` DATE NOT NULL,
		CONSTRAINT FK_id_etudiant FOREIGN KEY (`id_etudiant`) REFERENCES etudiant(`id_etudiant`) ,
		CONSTRAINT FK_id_cours FOREIGN KEY (`id_cours`) REFERENCES cours(`id_cours`),
        PRIMARY KEY (`id_resultat`))";
	$result = sql_request_table_database($sql);
	return $result;
}

//Creer la table qui associe l'etudiant aux cours'
function create_table_inscription(){
	$sql = "CREATE TABLE IF NOT EXISTS inscription (
        `id_etudiant_inscription` INT NOT NULL,
		`id_cours_inscription` INT NOT NULL,
		CONSTRAINT FK_id_etudiant_inscription FOREIGN KEY (`id_etudiant_inscription`) REFERENCES etudiant(`id_etudiant`) ,
		CONSTRAINT FK_id_cours_inscription FOREIGN KEY (`id_cours_inscription`) REFERENCES cours(`id_cours`))";
	$result = sql_request_table_database($sql);
	return $result;
}

####################################################################
##################### Exécute les requetes SQL #####################
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

$result = create_table_etudiant();
if ($result === 1){
	$request_results .= "La table étudiante à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_enseignant();
if ($result === 1){
	$request_results .= "La table enseignant à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_departement();
if ($result === 1){
	$request_results .= "La table departement à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_inscription();
if ($result === 1){
	$request_results .= "La table inscription à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_resultat_academique();
if ($result === 1){
	$request_results .= "La table resultat académique à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

$result = create_table_cours();
if ($result === 1){
	$request_results .= "La table cours à bien été créé <br> ";
} else {
	$request_results .= $result . '<br>';
}

echo ($request_results);
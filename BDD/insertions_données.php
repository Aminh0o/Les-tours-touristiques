<?php
	header('content-type: text/html; charset=utf-8');
	
	$nom_bdd = "discoverAlgeria";
	$server = "localhost"; $user = "root"; $password = "";
	try {

		//Création d'une connexion avec le SGBD
		$connexion = new PDO("mysql:host=$server", $user, $password);
		
		//Création de la BDD
		$requete_sql = "CREATE DATABASE IF NOT EXISTS " . $nom_bdd ;
		$connexion->exec($requete_sql);
		echo "BDD $nom_bdd créée avec succès.<br>";
		
		$connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
        
        /**************************************************************/
        //Insertions dans la table ADMINISTRATEUR
		$requete_sql_administrateur = "INSERT INTO ADMINISTRATEUR (ID_COMPTE, NOM, PRENOM, LOGIN_ADMIN, MOT_DE_PASSE) VALUES 
		('', '', , ,), ('', '', , ,)";
		
		$connexion->exec($requete_sql_administrateur);
		echo "Insertion réussie au niveau de la table ADMINISTRATEUR.<br>";
		
		
		//Clôture de la connexion
		$connexion = null;
	} catch (PDOException $e) {
		echo "Erreur ! " . $e->getMessage() . "<br/>";
	}
?>
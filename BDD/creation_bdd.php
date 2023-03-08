<?php
	header('content-type: text/html; charset=utf-8');
	
	$nom_bdd = "DiscoverAlgeria";
	$server = "localhost"; $user = "root"; $password = "";
	try {
		//Création d'une connexion avec le SGBD
		$connexion = new PDO("mysql:host=$server", $user, $password);
		
		//Création de la BDD
		$requete_sql = "CREATE DATABASE IF NOT EXISTS " . $nom_bdd ;
		$connexion->exec($requete_sql);
		echo "BDD $nom_bdd créée avec succès.<br>";
		
		//Clôture de la connexion
		$connexion = null;
	} catch (PDOException $e) {
		echo "Erreur ! " . $e->getMessage() . "<br/>";
	}
?>
<?php
	header('content-type: text/html; charset=utf-8');
	
	$nom_bdd = "DiscoverAlgeria";
	$server = "localhost"; $user = "root"; $password = "";
	try 
	{
		//Création d'une connexion avec le SGBD
		$connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
		
		/**********************************************************/
		//Création de la table UTILISATEUR
		$requete_sql_utilisateur = "CREATE TABLE IF NOT EXISTS UTILISATEUR (
			ID_UTILISATEUR       varchar(10) not null,
			ID_EMETTEUR          varchar(10) not null,
			NOM                  text,
			PRENOM               text,
			EMAIL                varchar(20),
			DATE_DE_NAISSANCE    date,
			TELEPHONE            numeric(10,0),
			MOT_DE_PASSE         varchar(10),
			primary key (ID_UTILISATEUR)
		)";
		
		$connexion->exec($requete_sql_utilisateur);
		echo "Table UTILISATEUR créée avec succès.<br>";
		
		/**********************************************************/
		//Création de la table ADMINISTRATEUR
		$requete_sql_administrateur = "CREATE TABLE IF NOT EXISTS ADMINISTRATEUR (
			ID_ADMIN             varchar(10) not null,
            ID_RESERVATION       varchar(10) not null,
            ID_RECRUTEMENT       varchar(10) not null,
            ID_EMETTEUR          varchar(10) not null,
            ID_AVIS              int not null,
            NUMEROPACK           int not null,
            ID_COMPTE            varchar(10) not null,
            NOM                  text,
            PRENOM               text,
            LOGIN_ADMIN          varchar(20) not null,
            MOT_DE_PASSE         varchar(10) not null,
            primary key (ID_ADMIN)
		)";
		
		$connexion->exec($requete_sql_administrateur);
		echo "Table ADMINISTRATEUR créée avec succès.<br>";

        /**********************************************************/
		//Création de la table ADMIN_HEBERGEMENT
		$requete_sql_admin_heberg = "CREATE TABLE IF NOT EXISTS ADMIN_HEBERGEMENT (
			ID_ADMIN_HEBERG      varchar(10) not null,
			ID_HEBERGEMENT       varchar(10) not null,
			ID_EMETTEUR          varchar(10) not null,
			NOM                  text,
			PRENOM               text,
			LOGIN_ADMIN_HEBERG   varchar(20) not null,
			MOT_DE_PASSE         varchar(10) not null,
			primary key (ID_ADMIN_HEBERG)
		)";
		
		$connexion->exec($requete_sql_admin_heberg);
		echo "Table ADMIN_HEBERGEMENT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table ADMIN_RESTAURATION
		$requete_sql_admin_rest = "CREATE TABLE IF NOT EXISTS ADMIN_RESTAURATION (
			ID_ADMIN_REST        varchar(10) not null,
			ID_RESTAURATION      varchar(10) not null,
			ID_EMETTEUR          varchar(10) not null,
			NOM                  text,
			PRENOM               text,
            LOGIN_ADMIN_REST     varchar(20) not null,
            MOT_DE_PASSE         varchar(10) not null,
            primary key (ID_ADMIN_REST)
		)";
		
		$connexion->exec($requete_sql_admin_rest);
		echo "Table ADMIN_RESTAURATION créée avec succès.<br>";

        /**********************************************************/
		//Création de la table ADMIN_TRANSPORT
		$requete_sql_admin_transp = "CREATE TABLE IF NOT EXISTS ADMIN_TRANSPORT (
            ID_ADMIN_TRANSP      varchar(10) not null,
			ID_TRANSPORT         varchar(10) not null,
			ID_EMETTEUR          varchar(10) not null,
			NOM                  text,
			PRENOM               text,
			LOGIN_ADMIN_TRANSP   varchar(20) not null,
			MOT_DE_PASSE         varchar(10) not null,
			primary key (ID_ADMIN_TRANSP)
		)";
		
		$connexion->exec($requete_sql_admin_transp);
		echo "Table ADMIN_TRANSPORT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table GUIDE
		$requete_sql_guide = "CREATE TABLE IF NOT EXISTS GUIDE (
			ID_GUIDE             varchar(10) not null,
			ID_EMETTEUR          varchar(10) not null,
			NOM                  text,
			PRENOM               text,
			LOGIN_GUIDE          varchar(20) not null,
			MOT_DE_PASSE         varchar(10),
			primary key (ID_GUIDE)
		)";
		
		$connexion->exec($requete_sql_guide);
		echo "Table GUIDE créée avec succès.<br>";
		
        /**********************************************************/
		//Création de la table COMPTE
		$requete_sql_compte = "CREATE TABLE IF NOT EXISTS COMPTE (
			ID_COMPTE            varchar(10) not null,
			NOM                  text not null,
			LOGIN_COMPTE         varchar(20) not null,
			MOT_DE_PASSE         varchar(10) not null,
			primary key (ID_COMPTE)
		)";
		
		$connexion->exec($requete_sql_compte);
		echo "Table COMPTE créée avec succès.<br>";

        /**********************************************************/
		//Création de la table NOTIFICATION
		$requete_sql_notif = "CREATE TABLE IF NOT EXISTS NOTIF (
			ID_EMETTEUR          varchar(10) not null,
			ID_RECEPTEUR         varchar(10),
			MESSAGE_NOTIF        text,
			ETAT                 text,
			primary key (ID_EMETTEUR)
		)";
		
		$connexion->exec($requete_sql_notif);
		echo "Table NOTIFICATION créée avec succès.<br>";
		

        /**********************************************************/
		//Création de la table PACK
		$requete_sql_pack = "CREATE TABLE IF NOT EXISTS PACK (
			NUMEROPACK           int not null,
			CATEGORIE            varchar(10) not null,
			WILAYA               varchar(20) not null,
			PRIX                 float not null,
			primary key (NUMEROPACK)
		)";
		
		$connexion->exec($requete_sql_pack);
		echo "Table PACK créée avec succès.<br>";
		
        /**********************************************************/
		//Création de la table RECRUTEMENT
		$requete_sql_recrutement = "CREATE TABLE IF NOT EXISTS RECRUTEMENT (
            ID_RECRUTEMENT       varchar(10) not null,
			DATE_D_ENVOI         date not null,
			CV                   varchar(100) not null,
			primary key (ID_RECRUTEMENT)
		)";
		
		$connexion->exec($requete_sql_recrutement);
		echo "Table RECRUTEMENT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table RESERVATION
		$requete_sql_reservation = "CREATE TABLE IF NOT EXISTS RESERVATION (
			ID_RESERVATION       varchar(10) not null,
			DATE_RESERVATION     date not null,
			NBR_PLACES_DEMANDE   int not null,
			primary key (ID_RESERVATION)
		)";
		
		$connexion->exec($requete_sql_reservation);
		echo "Table RESERVATION créée avec succès.<br>";

        /**********************************************************/
		//Création de la table TOUR
		$requete_sql_tour = "CREATE TABLE IF NOT EXISTS TOUR (
            ID_TOUR              varchar(10) not null,
			NOMTOUR              text not null,
			DUREETOUR            time not null,
			primary key (ID_TOUR)
		)";
		
		$connexion->exec($requete_sql_tour);
		echo "Table TOUR créée avec succès.<br>";

        /**********************************************************/
		//Création de la table TRANSPORT
		$requete_sql_transport = "CREATE TABLE IF NOT EXISTS TRANSPORT (
			ID_TRANSPORT         varchar(10) not null,
			NOMACCOMPAGNE        text not null,
			TYPE_TRANSPORT       varchar(10) not null,
			ADRESSE              text not null,
			TELEPHONE            numeric(10,0) not null,
			primary key (ID_TRANSPORT)
		)";
		
		$connexion->exec($requete_sql_transport);
		echo "Table TRANSPORT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table RESTAURATION
		$requete_sql_restauration = "CREATE TABLE IF NOT EXISTS RESTAURATION (
            ID_RESTAURATION      varchar(10) not null,
			NOM                  text not null,
			ADRESSE              text not null,
			TELEPHONE            numeric(10,0) not null,
			primary key (ID_RESTAURATION)
		)";
		
		$connexion->exec($requete_sql_restauration);
		echo "Table RESTAURATION créée avec succès.<br>";

        /**********************************************************/
		//Création de la table HEBERGEMENT
		$requete_sql_hebergement = "CREATE TABLE IF NOT EXISTS HEBERGEMENT (
           ID_HEBERGEMENT       varchar(10) not null,
		   NOM                  text not null,
		   TYPE_HEBERG          varchar(10) not null,
		   RATING               numeric(5,0) not null,
		   ADRESSE              text not null,
		   TELEPHONE            numeric(10,0) not null,
		   primary key (ID_HEBERGEMENT)
		)";
		
		$connexion->exec($requete_sql_hebergement);
		echo "Table HEBERGEMENT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table AVIS
		$requete_sql_avis = "CREATE TABLE IF NOT EXISTS AVIS (
           ID_AVIS              int not null,
		   MESSAGE_AVIS         text not null,
		   EMAIL                varchar(20) not null,
		   ID_USER              varchar(10) not null,
		   RATING               numeric(5,0),
		   primary key (ID_AVIS)
		)";
		 
		$connexion->exec($requete_sql_avis);
		echo "Table AVIS créée avec succès.<br>";

        /**********************************************************/
		//Création de la table PASSAGER
		$requete_sql_passager = "CREATE TABLE IF NOT EXISTS PASSAGER (
           ID_PASSAGER          varchar(10) not null,
		   NOM                  text not null,
		   PRENOM               text not null,
		   DATE_DE_NAISSANCE    date,
		   primary key (ID_PASSAGER)
		)";
		  
		$connexion->exec($requete_sql_passager);
		echo "Table PASSAGER créée avec succès.<br>";

        /**********************************************************/
		//Création de la table ACCOMPAGNER
		$requete_sql_accompagner = "CREATE TABLE IF NOT EXISTS ACCOMPAGNER (
			ID_PASSAGER          varchar(10) not null,
			ID_UTILISATEUR       varchar(10) not null,
			primary key (ID_PASSAGER, ID_UTILISATEUR)
		)";
		   
		$connexion->exec($requete_sql_accompagner);
		echo "Table ACCOMPAGNER créée avec succès.<br>";

        /**********************************************************/
		//Création de la table CONTENIR
		$requete_sql_contenir = "CREATE TABLE IF NOT EXISTS CONTENIR (
            ID_TOUR              varchar(10) not null,
			NUMEROPACK           int not null,
			ID_RESTAURATION      varchar(10) not null,
			ID_TRANSPORT         varchar(10) not null,
			ID_HEBERGEMENT       varchar(10) not null,
			ID_GUIDE             varchar(10) not null,
			primary key (ID_TOUR, NUMEROPACK, ID_RESTAURATION, ID_TRANSPORT, ID_HEBERGEMENT, ID_GUIDE)
		)";
		   
		$connexion->exec($requete_sql_contenir);
		echo "Table CONTENIR créée avec succès.<br>";

        /**********************************************************/
		//Création de la table FAIRE
		$requete_sql_faire = "CREATE TABLE IF NOT EXISTS FAIRE (
            ID_UTILISATEUR       varchar(10) not null,
			ID_RESERVATION       varchar(10) not null,
			primary key (ID_UTILISATEUR, ID_RESERVATION)
		)";
		   
		$connexion->exec($requete_sql_faire);
		echo "Table FAIRE créée avec succès.<br>";

        /**********************************************************/
		//Création de la table LAISSER
		$requete_sql_laisser = "CREATE TABLE IF NOT EXISTS LAISSER (
            ID_UTILISATEUR       varchar(10) not null,
			ID_AVIS              int not null,
			primary key (ID_UTILISATEUR, ID_AVIS)
		)";
		   
		$connexion->exec($requete_sql_laisser);
		echo "Table LAISSER créée avec succès.<br>";

        /**********************************************************/
		//Création de la table POSSEDE
		$requete_sql_possede = "CREATE TABLE IF NOT EXISTS POSSEDE (
            ID_ADMIN_HEBERG      varchar(10) not null,
			ID_ADMIN_REST        varchar(10) not null,
			ID_ADMIN_TRANSP      varchar(10) not null,
			ID_GUIDE             varchar(10) not null,
			ID_COMPTE            varchar(10) not null,
			primary key (ID_COMPTE, ID_ADMIN_HEBERG, ID_ADMIN_REST, ID_ADMIN_TRANSP, ID_GUIDE)
		)";
		   
		$connexion->exec($requete_sql_possede);
		echo "Table POSSEDE créée avec succès.<br>";

        /**********************************************************/
		//Création de la table DEMANDER
		$requete_sql_demander = "CREATE TABLE IF NOT EXISTS DEMANDER (
            ID_UTILISATEUR       varchar(10) not null,
			ID_RECRUTEMENT       varchar(10) not null,
			primary key (ID_UTILISATEUR, ID_RECRUTEMENT)
		)";
		   
		$connexion->exec($requete_sql_demander);
		echo "Table DEMANDER créée avec succès.<br>";		

        /**********************************************************/
		//Création de la table CONCERNER
		$requete_sql_concerner = "CREATE TABLE IF NOT EXISTS CONCERNER (
            NUMEROPACK           int not null,
			ID_RESERVATION       varchar(10) not null,
			primary key (NUMEROPACK, ID_RESERVATION)
		)";
		   
		$connexion->exec($requete_sql_concerner);
		echo "Table CONCERNER créée avec succès.<br>";

		//Clôture de la connexion
		$connexion = null;
	} catch (PDOException $e) 
	{
		echo "Erreur ! " . $e->getMessage() . "<br/>";
	}
?>
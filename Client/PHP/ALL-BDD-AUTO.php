<?php

	header('content-type: text/html; charset=utf-8');
	
	$nom_bdd = "essai";
	$server = "localhost"; 
    $user = "root"; 
    $password = "";
	try 
	{
		//Création d'une connexion avec le SGBD
		$connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);

		/**********************************************************/
		//Création de la table UTILISATEUR
		$requete_sql_utilisateur = "CREATE TABLE IF NOT EXISTS UTILISATEUR (
            ID_UTILISATEUR       INT AUTO_INCREMENT PRIMARY KEY,
            ID_NOTIF             int(10) not null,
            NOM                  text,
            PRENOM               text,
	        EMAIL                varchar(20),
	        DATE_DE_NAISSANCE    date,
	        TELEPHONE            numeric(10,0),
	        MOT_DE_PASSE         varchar(10)
		)";
		
		$connexion->exec($requete_sql_utilisateur);
		echo "Table UTILISATEUR créée avec succès.<br>";
		
		/**********************************************************/
		//Création de la table ADMINISTRATEUR
		$requete_sql_administrateur = "CREATE TABLE IF NOT EXISTS ADMINISTRATEUR(
	        ID_ADMIN             INT AUTO_INCREMENT PRIMARY KEY,
            ID_RESERVATION       int(10) not null,
            ID_RECRUTEMENT       int(10) not null,
            ID_NOTIF             int(10) not null,
            ID_AVIS              int not null,
            NUMEROPACK           int not null,
            ID_COMPTE            int(10) not null,
            NOM                  text,
            PRENOM               text,
            LOGIN_ADMIN          varchar(20) not null,
            MOT_DE_PASSE         varchar(10) not null
		)";
		
		$connexion->exec($requete_sql_administrateur);
		echo "Table ADMINISTRATEUR créée avec succès.<br>";

        /**********************************************************/
		//Création de la table ADMIN_HEBERGEMENT
		$requete_sql_admin_heberg = "CREATE TABLE IF NOT EXISTS ADMIN_HEBERGEMENT (
            ID_ADMIN_HEBERG      INT AUTO_INCREMENT PRIMARY KEY,
            ID_HEBERGEMENT       int(10) not null,
            ID_NOTIF             int(10) not null,
            NOM                  text,
            PRENOM               text,
            LOGIN_ADMIN_HEBERG   varchar(20) not null,
            MOT_DE_PASSE         varchar(10) not null
		)";
		
		$connexion->exec($requete_sql_admin_heberg);
		echo "Table ADMIN_HEBERGEMENT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table ADMIN_RESTAURATION
		$requete_sql_admin_rest = "CREATE TABLE IF NOT EXISTS ADMIN_RESTAURATION (
            ID_ADMIN_REST        INT AUTO_INCREMENT PRIMARY KEY,
            ID_RESTAURATION      int(10) not null,
            ID_NOTIF             int(10) not null,
            NOM                  text,
            PRENOM               text,
            LOGIN_ADMIN_REST     varchar(20) not null,
            MOT_DE_PASSE         varchar(10) not null
		)";
		
		$connexion->exec($requete_sql_admin_rest);
		echo "Table ADMIN_RESTAURATION créée avec succès.<br>";

        /**********************************************************/
		//Création de la table ADMIN_TRANSPORT
		$requete_sql_admin_transp = "CREATE TABLE IF NOT EXISTS ADMIN_TRANSPORT (
            ID_ADMIN_TRANSP      INT AUTO_INCREMENT PRIMARY KEY,
	        ID_TRANSPORT         int(10) not null,
	        ID_NOTIF             int(10) not null,
	        NOM                  text,
	        PRENOM               text,
	        LOGIN_ADMIN_TRANSP   varchar(20) not null,
	        MOT_DE_PASSE         varchar(10) not null
		)";
		
		$connexion->exec($requete_sql_admin_transp);
		echo "Table ADMIN_TRANSPORT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table GUIDE
		$requete_sql_guide = "CREATE TABLE IF NOT EXISTS GUIDE (
	        ID_GUIDE             INT AUTO_INCREMENT PRIMARY KEY,
	        ID_NOTIF             int(10) not null,
	        NOM                  text,
	        PRENOM               text,
	        LOGIN_GUIDE          varchar(20) not null,
	        MOT_DE_PASSE         varchar(10)
		)";
		
		$connexion->exec($requete_sql_guide);
		echo "Table GUIDE créée avec succès.<br>";
		
        /**********************************************************/
		//Création de la table COMPTE
		$requete_sql_compte = "CREATE TABLE IF NOT EXISTS COMPTE (
	        ID_COMPTE            INT AUTO_INCREMENT PRIMARY KEY,
	        NOM                  text not null,
	        LOGIN_COMPTE         varchar(20) not null,
	        MOT_DE_PASSE         varchar(10) not null
		)";
		
		$connexion->exec($requete_sql_compte);
		echo "Table COMPTE créée avec succès.<br>";

        /**********************************************************/
		//Création de la table NOTIFICATION
		$requete_sql_notif = "CREATE TABLE IF NOT EXISTS NOTIF (
			ID_NOTIF             INT AUTO_INCREMENT PRIMARY KEY,
	        ID_EMETTEUR          int(10),
	        ID_RECEPTEUR         int(10),
	        MESSAGE_NOTIF        text,
	        ETAT                 text
		)";
		
		$connexion->exec($requete_sql_notif);
		echo "Table NOTIFICATION créée avec succès.<br>";
		

        /**********************************************************/
		//Création de la table PACK
		$requete_sql_pack = "CREATE TABLE IF NOT EXISTS PACK (
            NUMEROPACK           INT AUTO_INCREMENT PRIMARY KEY,
	        NOMPACK              varchar(10) not null,
	        DATE_CREATION        date not null,
	        CATEGORIE            varchar(10) not null,
	        WILAYA               varchar(20) not null,
	        TYPE_PACK            varchar(10) not null,
	        PRIX                 float not null	
		)";
		
		$connexion->exec($requete_sql_pack);
		echo "Table PACK créée avec succès.<br>";
		
        /**********************************************************/
		//Création de la table RECRUTEMENT
		$requete_sql_recrutement = "CREATE TABLE IF NOT EXISTS RECRUTEMENT (
            ID_RECRUTEMENT       INT AUTO_INCREMENT PRIMARY KEY,
            NOM_RECRUTEUR        VARCHAR(30) NOT NULL,
            GENDER               VARCHAR(10) NOT NULL,
            DATE_DE_ENVOI        DATE NOT NULL,
            CV                   VARCHAR(100) NOT NULL
		)";
		
		$connexion->exec($requete_sql_recrutement);
		echo "Table RECRUTEMENT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table RESERVATION
		$requete_sql_reservation = "CREATE TABLE IF NOT EXISTS RESERVATION (
	        ID_RESERVATION       INT AUTO_INCREMENT PRIMARY KEY,
	        NOM_RESERVATION      varchar(10) not null,
	        DATE_RESERVATION     date not null,
	        NBR_PLACES_DEMANDE   int not null
		)";
		
		$connexion->exec($requete_sql_reservation);
		echo "Table RESERVATION créée avec succès.<br>";

        /**********************************************************/
		//Création de la table TOUR
		$requete_sql_tour = "CREATE TABLE IF NOT EXISTS TOUR (
            ID_TOUR              INT AUTO_INCREMENT PRIMARY KEY,
	        NOMTOUR              text not null,
	        DATE_TOUR            date not null,
	        WILAYA               varchar(15) not null,
	        PLACE                varchar(15) not null,
	        HEURE_DEPART         time not null,
	        HEURE_ARRIVE         time not null,
	        CATEGORIE            varchar(10) not null
		)";
		
		$connexion->exec($requete_sql_tour);
		echo "Table TOUR créée avec succès.<br>";

        /**********************************************************/
		//Création de la table TRANSPORT
		$requete_sql_transport = "CREATE TABLE IF NOT EXISTS TRANSPORT (
	        ID_TRANSPORT         INT AUTO_INCREMENT PRIMARY KEY,
	        NOMACCOMPAGNE        text not null,
	        TYPE_TRANSPORT       varchar(10) not null,
	        ADRESSE              text not null,
	        TELEPHONE            numeric(10,0) not null
		)";
		
		$connexion->exec($requete_sql_transport);
		echo "Table TRANSPORT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table RESTAURATION
		$requete_sql_restauration = "CREATE TABLE IF NOT EXISTS RESTAURATION (
            ID_RESTAURATION      INT AUTO_INCREMENT PRIMARY KEY,
	        NOM                  text not null,
	        ADRESSE              text not null,
	        TELEPHONE            numeric(10,0) not null
		)";
		
		$connexion->exec($requete_sql_restauration);
		echo "Table RESTAURATION créée avec succès.<br>";

        /**********************************************************/
		//Création de la table HEBERGEMENT
		$requete_sql_hebergement = "CREATE TABLE IF NOT EXISTS HEBERGEMENT (
            ID_HEBERGEMENT       INT AUTO_INCREMENT PRIMARY KEY,
	        NOM                  text not null,
            TYPE_HEBERG          varchar(10) not null,
	        RATING               numeric(5,0) not null,
	        ADRESSE              text not null,
	        TELEPHONE            numeric(10,0) not null
		)";
		
		$connexion->exec($requete_sql_hebergement);
		echo "Table HEBERGEMENT créée avec succès.<br>";

        /**********************************************************/
		//Création de la table AVIS
		$requete_sql_avis = "CREATE TABLE IF NOT EXISTS AVIS (
            ID_AVIS              INT AUTO_INCREMENT PRIMARY KEY,
	        MESSAGE_AVIS         text not null,
	        EMAIL                varchar(20) not null,
	        ID_USER              int(10) not null,
	        RATING               numeric(5,0),
			ETAT                 varchar(15)
		)";
		 
		$connexion->exec($requete_sql_avis);
		echo "Table AVIS créée avec succès.<br>";

        /**********************************************************/
		//Création de la table PASSAGER
		$requete_sql_passager = "CREATE TABLE IF NOT EXISTS PASSAGER (
            ID_PASSAGER          INT AUTO_INCREMENT PRIMARY KEY,
	        NOM                  text not null,
	        PRENOM               text not null,
	        DATE_DE_NAISSANCE    date
		)";
		  
		$connexion->exec($requete_sql_passager);
		echo "Table PASSAGER créée avec succès.<br>";

        /**********************************************************/
		//Création de la table ACCOMPAGNER
		$requete_sql_accompagner = "CREATE TABLE IF NOT EXISTS ACCOMPAGNER (
	        ID_PASSAGER          INT,
	        ID_UTILISATEUR       INT,
	        primary key (ID_PASSAGER, ID_UTILISATEUR)
		)";
		   
		$connexion->exec($requete_sql_accompagner);
		echo "Table ACCOMPAGNER créée avec succès.<br>";

        /**********************************************************/
		//Création de la table CONTENIR
		$requete_sql_contenir = "CREATE TABLE IF NOT EXISTS CONTENIR (
            ID_TOUR              INT,
	        NUMEROPACK           INT,
	        ID_RESTAURATION      INT,
	        ID_TRANSPORT         INT,
	        ID_HEBERGEMENT       INT,
	        ID_GUIDE             INT,
	        primary key (ID_TOUR, NUMEROPACK, ID_RESTAURATION, ID_TRANSPORT, ID_HEBERGEMENT, ID_GUIDE)
		)";
		   
		$connexion->exec($requete_sql_contenir);
		echo "Table CONTENIR créée avec succès.<br>";

        /**********************************************************/
		//Création de la table FAIRE
		$requete_sql_faire = "CREATE TABLE IF NOT EXISTS FAIRE (
            ID_UTILISATEUR       INT,
	        ID_RESERVATION       INT,
	        primary key (ID_UTILISATEUR, ID_RESERVATION)
		)";
		   
		$connexion->exec($requete_sql_faire);
		echo "Table FAIRE créée avec succès.<br>";

        /**********************************************************/
		//Création de la table LAISSER
		$requete_sql_laisser = "CREATE TABLE IF NOT EXISTS LAISSER (
            ID_UTILISATEUR       INT,
	        ID_AVIS              INT,
	        primary key (ID_UTILISATEUR, ID_AVIS)
		)";
		   
		$connexion->exec($requete_sql_laisser);
		echo "Table LAISSER créée avec succès.<br>";

        /**********************************************************/
		//Création de la table POSSEDE
		$requete_sql_possede = "CREATE TABLE IF NOT EXISTS POSSEDE (
            ID_ADMIN_HEBERG      INT,
            ID_ADMIN_REST        INT,
            ID_ADMIN_TRANSP      INT,
            ID_GUIDE             INT,
            ID_COMPTE            INT,
            primary key (ID_COMPTE, ID_ADMIN_HEBERG, ID_ADMIN_REST, ID_ADMIN_TRANSP, ID_GUIDE)
		)";
		   
		$connexion->exec($requete_sql_possede);
		echo "Table POSSEDE créée avec succès.<br>";

        /**********************************************************/
		//Création de la table DEMANDER
		$requete_sql_demander = "CREATE TABLE IF NOT EXISTS DEMANDER (
            ID_UTILISATEUR       INT,
            ID_RECRUTEMENT       INT,
	        primary key (ID_UTILISATEUR, ID_RECRUTEMENT)
		)";
		   
		$connexion->exec($requete_sql_demander);
		echo "Table DEMANDER créée avec succès.<br>";		

        /**********************************************************/
		//Création de la table CONCERNER
		$requete_sql_concerner = "CREATE TABLE IF NOT EXISTS CONCERNER (
            NUMEROPACK           INT,
	        ID_RESERVATION       INT,
            primary key (NUMEROPACK, ID_RESERVATION)
		)";
		   
		$connexion->exec($requete_sql_concerner);
		echo "Table CONCERNER créée avec succès.<br>";

		/**********************************************************/
		//Modification de la table ADMINISTRATEUR
		$requete_sql_ADMINISTRATEUR = "alter table ADMINISTRATEUR add constraint FK_GERER foreign key (ID_RESERVATION)
		references RESERVATION (ID_RESERVATION) on delete restrict on update restrict";

		$connexion->exec($requete_sql_ADMINISTRATEUR);
		echo "Table ADMINISTRATEUR modifier avec succès.<br>";

		$requete_sql_ADMINISTRATEUR2 = "alter table ADMINISTRATEUR add constraint FK_GERER1 foreign key (ID_RECRUTEMENT)
		references RECRUTEMENT (ID_RECRUTEMENT) on delete restrict on update restrict";	
		
		$connexion->exec($requete_sql_ADMINISTRATEUR2);
		echo "Table ADMINISTRATEUR modifier avec succès.<br>";
	
		$requete_sql_ADMINISTRATEUR3 = "alter table ADMINISTRATEUR add constraint FK_GERER2 foreign key (ID_AVIS)
		references AVIS (ID_AVIS) on delete restrict on update restrict";
		
		$connexion->exec($requete_sql_ADMINISTRATEUR3);
		echo "Table ADMINISTRATEUR modifier avec succès.<br>";
		
		$requete_sql_ADMINISTRATEUR4 = "alter table ADMINISTRATEUR add constraint FK_GERER3 foreign key (NUMEROPACK)
		references PACK (NUMEROPACK) on delete restrict on update restrict";
		
		$connexion->exec($requete_sql_ADMINISTRATEUR4);
		echo "Table ADMINISTRATEUR modifier avec succès.<br>";
		
		$requete_sql_ADMINISTRATEUR5 = "alter table ADMINISTRATEUR add constraint FK_GERER4 foreign key (ID_COMPTE)
		references COMPTE (ID_COMPTE) on delete restrict on update restrict";
		
		$connexion->exec($requete_sql_ADMINISTRATEUR5);
		echo "Table ADMINISTRATEUR modifier avec succès.<br>";
		
		$requete_sql_ADMINISTRATEUR6 = "alter table ADMINISTRATEUR add constraint FK_RECEVER1 foreign key (ID_NOTIF)
		references NOTIF (ID_NOTIF) on delete restrict on update restrict";	  
		
		$connexion->exec($requete_sql_ADMINISTRATEUR6);
		echo "Table ADMINISTRATEUR modifier avec succès.<br>";
		
		/**********************************************************/
		//Modification de la table ADMIN_HEBERGEMENT
		$requete_sql_ADMIN_HEBERGEMENT = "alter table ADMIN_HEBERGEMENT add constraint FK_GERER7 foreign key (ID_HEBERGEMENT)
		references HEBERGEMENT (ID_HEBERGEMENT) on delete restrict on update restrict";

		$connexion->exec($requete_sql_ADMIN_HEBERGEMENT);
		echo "Table ADMIN_HEBERGEMENT modifier avec succès.<br>";
				
		$requete_sql_ADMIN_HEBERGEMENT2 = "alter table ADMIN_HEBERGEMENT add constraint FK_RECEVER5 foreign key (ID_NOTIF)
		references NOTIF (ID_NOTIF) on delete restrict on update restrict";
				
		$connexion->exec($requete_sql_ADMIN_HEBERGEMENT2);
		echo "Table ADMIN_HEBERGEMENT modifier avec succès.<br>";

		/**********************************************************/
		//Modification de la table ADMIN_RESTAURATION
		$requete_sql_RESTAURATION = "alter table ADMIN_RESTAURATION add constraint FK_GERER5 foreign key (ID_RESTAURATION)
		references RESTAURATION (ID_RESTAURATION) on delete restrict on update restrict";

		$connexion->exec($requete_sql_RESTAURATION);
		echo "Table ADMIN_RESTAURATION modifier avec succès.<br>";
			
		$requete_sql_RESTAURATION2 = "alter table ADMIN_RESTAURATION add constraint FK_RECEVER4 foreign key (ID_NOTIF)
		references NOTIF (ID_NOTIF) on delete restrict on update restrict";
		
		$connexion->exec($requete_sql_RESTAURATION2);
		echo "Table ADMIN_RESTAURATION modifier avec succès.<br>";

		/**********************************************************/
		//Modification de la table ADMIN_TRANSPORT
		$requete_sql_TRANSPORT= "alter table ADMIN_TRANSPORT add constraint FK_GERER6 foreign key (ID_TRANSPORT)
		references TRANSPORT (ID_TRANSPORT) on delete restrict on update restrict"; 

		$connexion->exec($requete_sql_TRANSPORT);
		echo "Table ADMIN_TRANSPORT modifier avec succès.<br>";
			
		$requete_sql_TRANSPORT2 = "alter table ADMIN_TRANSPORT add constraint FK_RECEVER2 foreign key (ID_NOTIF)
		references NOTIF (ID_NOTIF) on delete restrict on update restrict";
					
		$connexion->exec($requete_sql_TRANSPORT2);
		echo "Table ADMIN_TRANSPORT modifier avec succès.<br>";

		/**********************************************************/
		//Modification de la table GUIDE	
		$requete_sql_GUIDE = "alter table GUIDE add constraint FK_RECEVER3 foreign key (ID_NOTIF)
		references NOTIF (ID_NOTIF) on delete restrict on update restrict";
		   
		$connexion->exec($requete_sql_GUIDE);
		echo "Table GUIDE modifier avec succès.<br>";

		/**********************************************************/
	    //Modification de la table UTILISATEUR
		
		$requete_sql_UTILISATEUR= "alter table UTILISATEUR add constraint FK_RECEVER foreign key (ID_NOTIF)
		references NOTIF (ID_NOTIF) on delete restrict on update restrict";
			
		$connexion->exec($requete_sql_UTILISATEUR);
		echo "Table UTILISATEUR modifier avec succès.<br>";

        /**********************************************************/
		//Modification de la table ACCOMPAGNER
		$requete_sql_ACCOMPAGNER1 = "alter table ACCOMPAGNER add constraint FK_ACCOMPAGNER1 foreign key (ID_UTILISATEUR)
        references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict";

        $connexion->exec($requete_sql_ACCOMPAGNER1);
        echo "Table ACCOMPAGNER modifiée avec succès.<br>";

        $requete_sql_ACCOMPAGNER2 = "alter table ACCOMPAGNER add constraint FK_ACCOMPAGNER2 foreign key (ID_PASSAGER)
        references PASSAGER (ID_PASSAGER) on delete restrict on update restrict";

        $connexion->exec($requete_sql_ACCOMPAGNER2);
		echo "Table ACCOMPAGNER modifiée avec succès.<br>";

        /**********************************************************/
		//Modification de la table CONCERNER
		$requete_sql_CONCERNER1 = "alter table CONCERNER add constraint FK_CONCERNER3 foreign key (NUMEROPACK)
        references PACK (NUMEROPACK) on delete restrict on update restrict";

        $connexion->exec($requete_sql_CONCERNER1);
        echo "Table CONCERNER modifiée avec succès.<br>";

        $requete_sql_CONCERNER2 = "alter table CONCERNER add constraint FK_CONCERNER4 foreign key (ID_RESERVATION)
        references RESERVATION (ID_RESERVATION) on delete restrict on update restrict";

        $connexion->exec($requete_sql_CONCERNER2);
		echo "Table CONCERNER modifiée avec succès.<br>";

        /**********************************************************/
		//Modification de la table DEMANDER
		$requete_sql_DEMANDER1 = "alter table DEMANDER add constraint FK_DEMANDER1 foreign key (ID_UTILISATEUR)
        references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict";

        $connexion->exec($requete_sql_DEMANDER1);
        echo "Table DEMANDER modifiée avec succès.<br>";

        $requete_sql_DEMANDER2 = "alter table DEMANDER add constraint FK_DEMANDER2 foreign key (ID_RECRUTEMENT)
        references RECRUTEMENT (ID_RECRUTEMENT) on delete restrict on update restrict";

        $connexion->exec($requete_sql_DEMANDER2);
		echo "Table DEMANDER modifiée avec succès.<br>";

        /**********************************************************/
		//Modification de la table POSSEDE
		$requete_sql_POSSEDE1 = "alter table POSSEDE add constraint FK_POSSEDE1 foreign key (ID_ADMIN_HEBERG)
        references ADMIN_HEBERGEMENT (ID_ADMIN_HEBERG) on delete restrict on update restrict";

        $connexion->exec($requete_sql_POSSEDE1);
        echo "Table POSSEDE modifiée avec succès.<br>";

        $requete_sql_POSSEDE2 = "alter table POSSEDE add constraint FK_POSSEDE2 foreign key (ID_ADMIN_REST)
        references ADMIN_RESTAURATION (ID_ADMIN_REST) on delete restrict on update restrict";

        $connexion->exec($requete_sql_POSSEDE2);
		echo "Table POSSEDE modifiée avec succès.<br>";

        $requete_sql_POSSEDE3 = "alter table POSSEDE add constraint FK_POSSEDE3 foreign key (ID_ADMIN_TRANSP)
        references ADMIN_TRANSPORT (ID_ADMIN_TRANSP) on delete restrict on update restrict";

        $connexion->exec($requete_sql_POSSEDE3);
		echo "Table POSSEDE modifiée avec succès.<br>";

        $requete_sql_POSSEDE4 = "alter table POSSEDE add constraint FK_POSSEDE4 foreign key (ID_GUIDE)
        references GUIDE (ID_GUIDE) on delete restrict on update restrict";

        $connexion->exec($requete_sql_POSSEDE4);
		echo "Table POSSEDE modifiée avec succès.<br>";

        $requete_sql_POSSEDE5 = "alter table POSSEDE add constraint FK_POSSEDE5 foreign key (ID_COMPTE)
        references COMPTE (ID_COMPTE) on delete restrict on update restrict";

        $connexion->exec($requete_sql_POSSEDE5);
		echo "Table POSSEDE modifiée avec succès.<br>";

        /**********************************************************/
		//Modification de la table LAISSER
		$requete_sql_LAISSER1 = "alter table LAISSER add constraint FK_LAISSER1 foreign key (ID_AVIS)
        references AVIS (ID_AVIS) on delete restrict on update restrict";

        $connexion->exec($requete_sql_LAISSER1);
        echo "Table LAISSER modifiée avec succès.<br>";

        $requete_sql_LAISSER2 = "alter table LAISSER add constraint FK_LAISSER2 foreign key (ID_UTILISATEUR)
        references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict";

        $connexion->exec($requete_sql_LAISSER2);
		echo "Table LAISSER modifiée avec succès.<br>";

        /**********************************************************/
		//Modification de la table FAIRE
		$requete_sql_FAIRE1 = "alter table FAIRE add constraint FK_FAIRE1 foreign key (ID_RESERVATION)
        references RESERVATION (ID_RESERVATION) on delete restrict on update restrict";

        $connexion->exec($requete_sql_FAIRE1);
        echo "Table FAIRE modifiée avec succès.<br>";

        $requete_sql_FAIRE2 = "alter table FAIRE add constraint FK_FAIRE2 foreign key (ID_UTILISATEUR)
        references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict";

        $connexion->exec($requete_sql_FAIRE2);
		echo "Table FAIRE modifiée avec succès.<br>";

        /**********************************************************/
		//Modification de la table CONTENIR
		$requete_sql_CONTENIR1 = "alter table CONTENIR add constraint FK_CONTENIR1 foreign key (ID_GUIDE)
        references GUIDE (ID_GUIDE) on delete restrict on update restrict";

        $connexion->exec($requete_sql_CONTENIR1);
        echo "Table CONTENIR modifiée avec succès.<br>";

        $requete_sql_CONTENIR2 = "alter table CONTENIR add constraint FK_CONTENIR2 foreign key (ID_TOUR)
        references TOUR (ID_TOUR) on delete restrict on update restrict";

        $connexion->exec($requete_sql_CONTENIR2);
		echo "Table CONTENIR modifiée avec succès.<br>";

        $requete_sql_CONTENIR3 = "alter table CONTENIR add constraint FK_CONTENIR3 foreign key (NUMEROPACK)
        references PACK (NUMEROPACK) on delete restrict on update restrict";

        $connexion->exec($requete_sql_CONTENIR3);
		echo "Table CONTENIR modifiée avec succès.<br>";

        $requete_sql_CONTENIR4 = "alter table CONTENIR add constraint FK_CONTENIR4 foreign key (ID_RESTAURATION)
        references RESTAURATION (ID_RESTAURATION) on delete restrict on update restrict";

        $connexion->exec($requete_sql_CONTENIR4);
		echo "Table CONTENIR modifiée avec succès.<br>";

        $requete_sql_CONTENIR5 = "alter table CONTENIR add constraint FK_CONTENIR5 foreign key (ID_TRANSPORT)
        references TRANSPORT (ID_TRANSPORT) on delete restrict on update restrict";

        $connexion->exec($requete_sql_CONTENIR5);
		echo "Table CONTENIR modifiée avec succès.<br>";

        $requete_sql_CONTENIR6 = "alter table CONTENIR add constraint FK_CONTENIR6 foreign key (ID_HEBERGEMENT)
        references HEBERGEMENT (ID_HEBERGEMENT) on delete restrict on update restrict";

        $connexion->exec($requete_sql_CONTENIR6);
		echo "Table CONTENIR modifiée avec succès.<br>";
		
        /**********************************************************/
        //Insertion de données pour la table TRANSPORT
        $requete_sql_Transport_data1 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('tramway_alger','tramway','alger','NULL')";
        
        $requete_sql_Transport_data2 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('tramway_oran','tramway','oran','NULL')";
        
        $requete_sql_Transport_data3 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('tramway_constantine','tramway','constantine','NULL')";
        
        $requete_sql_Transport_data4 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('etusa_alger','bus','alger','021650598')";
        
        $requete_sql_Transport_data5 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('etusa_oran','bus','oran','021664468')";
        
        $requete_sql_Transport_data6 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('etus_tlemcen','bus','tlemcen','021669218')";
        
        $requete_sql_Transport_data7 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('etus_constantine','bus','constantine','021655758')";
        
        $requete_sql_Transport_data8 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('transport_urbain','bus','bejaia','034114640')";
        
        $requete_sql_Transport_data9 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans_tamanrasset','bus','sahara','029344767')";
        
        $requete_sql_Transport_data10 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('téléphérique_alger','telepherique','alger','NULL')";
        
        $requete_sql_Transport_data11 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('téléphérique_oran','telepherique','oran','NULL')";
        
        $requete_sql_Transport_data12 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('téléphérique_tlemcen','telepherique','tlemcen','NULL')";
        
        $requete_sql_Transport_data13 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('téléphérique_constantine','telepherique','constantine','NULL')";
        
        $requete_sql_Transport_data14 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('téléphérique_bejaia','telepherique','bejaia','NULL')";

        $requete_sql_Transport_data15 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('air_algerie_alger','avion','alger','021986363')";
        
        $requete_sql_Transport_data16 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('air_algerie_oran','avion','oran','041334726')";
        
        $requete_sql_Transport_data17 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('air_algerie_tlemcen','avion','tlemcen','043264521')";
        
        $requete_sql_Transport_data18 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('air_algerie_constantine','avion','constantine','031930090')";
        
        $requete_sql_Transport_data19 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('air_algerie_bejaia','avion','bejaia','034211336')";
        
        $requete_sql_Transport_data20 = "INSERT INTO TRANSPORT (NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES 
        ('air_algerie_tamanrasset','avion','sahara','029344499')";
        
        $connexion->exec($requete_sql_Transport_data1);
        $connexion->exec($requete_sql_Transport_data2);
        $connexion->exec($requete_sql_Transport_data3);
        $connexion->exec($requete_sql_Transport_data4);
        $connexion->exec($requete_sql_Transport_data5);
        $connexion->exec($requete_sql_Transport_data6);
        $connexion->exec($requete_sql_Transport_data7);
        $connexion->exec($requete_sql_Transport_data8);
        $connexion->exec($requete_sql_Transport_data9);
        $connexion->exec($requete_sql_Transport_data10);
        $connexion->exec($requete_sql_Transport_data11); 
        $connexion->exec($requete_sql_Transport_data12);
        $connexion->exec($requete_sql_Transport_data13); 
        $connexion->exec($requete_sql_Transport_data14); 
        $connexion->exec($requete_sql_Transport_data15); 
        $connexion->exec($requete_sql_Transport_data16); 
        $connexion->exec($requete_sql_Transport_data17); 
        $connexion->exec($requete_sql_Transport_data18); 
        $connexion->exec($requete_sql_Transport_data19);
        $connexion->exec($requete_sql_Transport_data20);
        echo "Insertion réussie au niveau de la table TRANSPORT.<br>";

        /**********************************************************/
		//Insertion de données pour la table HEBERGEMENT
			
		$requete_sql_Hebergement_data1 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('ibis_alger','hotel','3','alger','0770134965')";
			
		$requete_sql_Hebergement_data2 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('sheraton_alger','hotel','5','alger','021377777')";
			
		$requete_sql_Hebergement_data3 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('el_djazair','hotel','5','alger','023481108')";
			
		$requete_sql_Hebergement_data4 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('dar_diaf','hotel','3','alger','023371010')";
			
		$requete_sql_Hebergement_data5 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('nazel_el_yassamine','hotel','2','alger','044475003')";

        $requete_sql_Hebergement_data6 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
        ('dar_el_beida_aeroport','hotel','3','alger','023813739')";

		$requete_sql_Hebergement_data7 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
        ('inn_by_marriott','residence','3','alger','023741333')";

		$requete_sql_Hebergement_data8 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
        ('welcome_to_alger_dar_el_beida','residence','3','alger','NULL')";
        
        $requete_sql_Hebergement_data9 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
        ('renaissance_tlemcen','hotel','5','tlemcen','043401111')";

		$requete_sql_Hebergement_data10 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('ibis-tlemcen','hotel','4','tlemcen','043981010')";
		  
		$requete_sql_Hebergement_data11 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('zianide','hotel','4','tlemcen','043277102')";
		  
		$requete_sql_Hebergement_data12 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('pomaria','hotel','3','tlemcen','043215141')";
  
		$requete_sql_Hebergement_data13 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('stambouli','hotel','3','tlemcen','043274587')";
  
		$requete_sql_Hebergement_data14 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('saim','hotel','2','tlemcen','0773910873')";
  
		$requete_sql_Hebergement_data15 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('méridian','hotel','5','oran','041984000')";
  
		$requete_sql_Hebergement_data16 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('sherato_oran','hotel','5','oran','041590100')";
  
		$requete_sql_Hebergement_data17 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('ibis_oran','hotel','3','oran','041982300')";
  
		$requete_sql_Hebergement_data18 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('best_western_colombe','hotel','3','oran','041746175')";
  
		$requete_sql_Hebergement_data19 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('rodina','hotel','4','oran','0555557412')";
  
		$requete_sql_Hebergement_data20 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('résidence_emir','residence','3','oran','0560993311')";
  
		$requete_sql_Hebergement_data21 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('the_adress_residence_sm','residence','5','oran','0540049294')";
  
		$requete_sql_Hebergement_data22 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('chahinas','residence','4','tlemcen','0697225562')";
  
		$requete_sql_Hebergement_data23 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('résidence_anfel','residence','5','tlemcen',' 0697621306')";
  
		$requete_sql_Hebergement_data24 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('marriott_constantine','hotel','5','constantine','031731073')";
  
		$requete_sql_Hebergement_data25 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('el_khayem','hotel','4','constantine','031744220')";
  
		$requete_sql_Hebergement_data26 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('novotel','hotel','4','constantine',' 031992000')";
  
		$requete_sql_Hebergement_data27 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('ibis_constantine','hotel','3','constantine',' 031992000')";
  
		$requete_sql_Hebergement_data28 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('hocine_el_khroub','hotel','4','constantine','031750000')";
  
		$requete_sql_Hebergement_data29 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('elbey','hotel','3','constantine','031649494')";
  
		$requete_sql_Hebergement_data30 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('hotel_des_princes','hotel','3','constantine','031912770')";
  
		$requete_sql_Hebergement_data31 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('lantana','residence','5','constantine','0560243468')";
  
		$requete_sql_Hebergement_data32 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('les_palmiers','residence','4','constantine','031819110')";
  
		$requete_sql_Hebergement_data33 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('le_cristal','hotel','3','bejaia','034818585')";
  
		$requete_sql_Hebergement_data34 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('altantis','hotel','4','bejaia','034180055')";
  
		$requete_sql_Hebergement_data35 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('les_hammadites','hotel','4','bejaia','034816512')";

		$requete_sql_Hebergement_data36 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('immomalak','residence','5','bejaia','034129407')";

		$requete_sql_Hebergement_data37 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('location_daoud','residence','4','bejaia','0561548829')";

		$requete_sql_Hebergement_data38 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('raja','hotel','2','sahara','021614545')";

		$requete_sql_Hebergement_data39 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('takialt','hotel','3','sahara','049367800')";

		$requete_sql_Hebergement_data40 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('tahat','hotel','3','sahara','029312355')";

		$requete_sql_Hebergement_data41 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('touat','hotel','4','sahara','049369821')";

		$requete_sql_Hebergement_data42 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('mraguen','residence','2','sahara','049967793')";

		$requete_sql_Hebergement_data43 = "INSERT INTO HEBERGEMENT (NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('khodja','residence','4','sahara','0663445010')";

		
				
		$connexion->exec($requete_sql_Hebergement_data1);
		$connexion->exec($requete_sql_Hebergement_data2);
		$connexion->exec($requete_sql_Hebergement_data3);
		$connexion->exec($requete_sql_Hebergement_data4);
		$connexion->exec($requete_sql_Hebergement_data5);
		$connexion->exec($requete_sql_Hebergement_data6);
		$connexion->exec($requete_sql_Hebergement_data7);
		$connexion->exec($requete_sql_Hebergement_data8);
		$connexion->exec($requete_sql_Hebergement_data9);
        $connexion->exec($requete_sql_Hebergement_data10);
        $connexion->exec($requete_sql_Hebergement_data11);
        $connexion->exec($requete_sql_Hebergement_data12);
        $connexion->exec($requete_sql_Hebergement_data13);
        $connexion->exec($requete_sql_Hebergement_data14);
        $connexion->exec($requete_sql_Hebergement_data15);
        $connexion->exec($requete_sql_Hebergement_data16);
        $connexion->exec($requete_sql_Hebergement_data17);
        $connexion->exec($requete_sql_Hebergement_data18);
        $connexion->exec($requete_sql_Hebergement_data19);
        $connexion->exec($requete_sql_Hebergement_data20);
        $connexion->exec($requete_sql_Hebergement_data21);
        $connexion->exec($requete_sql_Hebergement_data22);
        $connexion->exec($requete_sql_Hebergement_data23);
        $connexion->exec($requete_sql_Hebergement_data24);
        $connexion->exec($requete_sql_Hebergement_data25);
        $connexion->exec($requete_sql_Hebergement_data26);
        $connexion->exec($requete_sql_Hebergement_data27);
        $connexion->exec($requete_sql_Hebergement_data28);
        $connexion->exec($requete_sql_Hebergement_data29);
        $connexion->exec($requete_sql_Hebergement_data30);
        $connexion->exec($requete_sql_Hebergement_data31);
        $connexion->exec($requete_sql_Hebergement_data32);
        $connexion->exec($requete_sql_Hebergement_data33);
        $connexion->exec($requete_sql_Hebergement_data34);
        $connexion->exec($requete_sql_Hebergement_data35);
		$connexion->exec($requete_sql_Hebergement_data36);
		$connexion->exec($requete_sql_Hebergement_data37);
		$connexion->exec($requete_sql_Hebergement_data38);
		$connexion->exec($requete_sql_Hebergement_data39);
		$connexion->exec($requete_sql_Hebergement_data40);
		$connexion->exec($requete_sql_Hebergement_data41);
		$connexion->exec($requete_sql_Hebergement_data42);
		$connexion->exec($requete_sql_Hebergement_data43);
		echo "Insertion réussie au niveau de la table HEBERGEMENT.<br>";

        /**********************************************************/
		//Insertion de données pour la table RESTAURATION
		$requete_sql_Restauration_data1 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('la_grotte_des_saveurs','alger','0555337076')";

		$requete_sql_Restauration_data2 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('la_maison_couscouse','alger','0770346044')";

		$requete_sql_Restauration_data3 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('casbah_istanbul','alger','0554130625')";

		$requete_sql_Restauration_data4 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('le_roi_de_la_loubia','alger','021740291')";

		$requete_sql_Restauration_data5 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('la_baie_alger','alger','021738357')";

		$requete_sql_Restauration_data6 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('taj_mahal','alger','021341824')";

		$requete_sql_Restauration_data7 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('etalon','alger','0661572950')";

		$requete_sql_Restauration_data8 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('le_normand','alger','044199560')";

		$requete_sql_Restauration_data9 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('le_marquise','oran','0671807878')";

		$requete_sql_Restauration_data10 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('le_cintra','oran','0560000346')";

		$requete_sql_Restauration_data11 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('marrakech','oran','0669319213')";

		$requete_sql_Restauration_data12 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('barbaroussa','oran','0799371612')";

		$requete_sql_Restauration_data13 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('el_halabi','oran','0552586565')";

		$requete_sql_Restauration_data14 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('equinoxe','tlemcen','043417360')";

		$requete_sql_Restauration_data15 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('echapatoire','tlemcen','043213563')";

		$requete_sql_Restauration_data16 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('latina','tlemcen','O552994245')";

		$requete_sql_Restauration_data17 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('le_gourmet','tlemcen','0699453413')";

		$requete_sql_Restauration_data18 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('dar_al_soltane','constantine','031642256')";

		$requete_sql_Restauration_data19 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('jannah','constantine','031731073')";

		$requete_sql_Restauration_data20 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('siniet_el_bey','constantine','0776050404')";

		$requete_sql_Restauration_data21 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('venezia','constantine','0557715363')";

		$requete_sql_Restauration_data22 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('el_baik','constantine','0561836666')";

		$requete_sql_Restauration_data23 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('cirta','constantine','0798502726')";

		$requete_sql_Restauration_data24 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('les_platannes','constantine','031928622')";

		$requete_sql_Restauration_data25 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('la_citadelle','bejaia','0553905401')";

		$requete_sql_Restauration_data26 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('tacos_city','bejaia','0770550297')";

		$requete_sql_Restauration_data27 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('plaza','bejaia','0540442880')";

		$requete_sql_Restauration_data28 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('le_petit_bateau','bejaia','0550601397')";

		$requete_sql_Restauration_data29 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('essalem','bejaia','034114536')";

		$requete_sql_Restauration_data30 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('hotel_tahat','sahara','029312121')";

		$requete_sql_Restauration_data31 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('edhabi','sahara','029321092')";

		$requete_sql_Restauration_data32 = "INSERT INTO RESTAURATION (NOM, ADRESSE, TELEPHONE) VALUES 
		('adriane','sahara','0676421796')";
			
		$connexion->exec($requete_sql_Restauration_data1);
		$connexion->exec($requete_sql_Restauration_data2);
		$connexion->exec($requete_sql_Restauration_data3);
		$connexion->exec($requete_sql_Restauration_data4);
		$connexion->exec($requete_sql_Restauration_data5);
		$connexion->exec($requete_sql_Restauration_data6);
		$connexion->exec($requete_sql_Restauration_data7);
		$connexion->exec($requete_sql_Restauration_data8);
		$connexion->exec($requete_sql_Restauration_data9);
		$connexion->exec($requete_sql_Restauration_data10);
		$connexion->exec($requete_sql_Restauration_data11);
		$connexion->exec($requete_sql_Restauration_data12);
		$connexion->exec($requete_sql_Restauration_data13);
		$connexion->exec($requete_sql_Restauration_data14);
		$connexion->exec($requete_sql_Restauration_data15);
		$connexion->exec($requete_sql_Restauration_data16);
		$connexion->exec($requete_sql_Restauration_data17);
		$connexion->exec($requete_sql_Restauration_data18);
		$connexion->exec($requete_sql_Restauration_data19);
		$connexion->exec($requete_sql_Restauration_data20);
		$connexion->exec($requete_sql_Restauration_data21);
		$connexion->exec($requete_sql_Restauration_data22);
		$connexion->exec($requete_sql_Restauration_data23);
		$connexion->exec($requete_sql_Restauration_data24);
		$connexion->exec($requete_sql_Restauration_data25);
		$connexion->exec($requete_sql_Restauration_data26);
		$connexion->exec($requete_sql_Restauration_data27);
		$connexion->exec($requete_sql_Restauration_data28);
		$connexion->exec($requete_sql_Restauration_data29);
		$connexion->exec($requete_sql_Restauration_data30);
		$connexion->exec($requete_sql_Restauration_data31);
		$connexion->exec($requete_sql_Restauration_data32);
		echo "Insertion réussie au niveau de la table RESTAURATION.<br>";

		/**********************************************************/
		//Insertion de données pour la table ADMINISTRATEUR
		$requete_sql_Administrateur_data1 = "INSERT INTO ADMINISTRATEUR (NOM, PRENOM, LOGIN_ADMIN, MOT_DE_PASSE) VALUES 
		('bourek','mohammed','mohammed2023','2023')";
		
		$connexion->exec($requete_sql_Administrateur_data1);
		echo "Insertion réussie au niveau de la table ADMINISTRATEUR.<br>";

		/**********************************************************/
		//Insertion de données pour la table ADMIN_TRANSPORT
		$requete_sql_Admin_Transp_data1 = "INSERT INTO ADMIN_TRANSPORT (NOM, PRENOM, LOGIN_ADMIN_TRANSP, MOT_DE_PASSE) VALUES 
		('bouchaour','amine','amine1444','1444')";
		
		$connexion->exec($requete_sql_Admin_Transp_data1);
		echo "Insertion réussie au niveau de la table ADMIN_TRANSPORT.<br>";

		/**********************************************************/
		//Insertion de données pour la table ADMIN_HEBERGEMENT
		$requete_sql_Admin_Heberg_data1 = "INSERT INTO ADMIN_HEBERGEMENT (NOM, PRENOM, LOGIN_ADMIN_HEBERG, MOT_DE_PASSE) VALUES 
		('bourek','mohammed','mohammed1444','1444')";
		
		$connexion->exec($requete_sql_Admin_Heberg_data1);
		echo "Insertion réussie au niveau de la table ADMIN_HEBERGEMENT.<br>";

		/**********************************************************/
		//Insertion de données pour la table ADMIN_RESTAURATION
		$requete_sql_Admin_Rest_data1 = "INSERT INTO ADMIN_RESTAURATION (NOM, PRENOM, LOGIN_ADMIN_REST, MOT_DE_PASSE) VALUES 
		('bouguern','diaa','sifou1444','1444')";
		
		$connexion->exec($requete_sql_Admin_Rest_data1);
		echo "Insertion réussie au niveau de la table ADMIN_RESTAURATION.<br>";

		/**********************************************************/
		//Insertion de données pour la table GUIDE
		$requete_sql_guide_data1 = "INSERT INTO GUIDE (NOM, PRENOM, LOGIN_GUIDE, MOT_DE_PASSE) VALUES 
		('bouguern','diaa','sifou2023','2023')";
		
		$connexion->exec($requete_sql_guide_data1);
		echo "Insertion réussie au niveau de la table GUIDE.<br>";
		
		//Clôture de la connexion
		$connexion = null;
	} 
	catch (PDOException $e) 
	{
		echo "Erreur ! " . $e->getMessage() . "<br/>";
	}
?>
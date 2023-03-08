<?php
	header('content-type: text/html; charset=utf-8');
	
	$nom_bdd = "DiscoverAlgeria";
	$server = "localhost"; $user = "root"; $password = "";
	try 
	{
		//Création d'une connexion avec le SGBD
		$connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
		
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
		
		$requete_sql_ADMINISTRATEUR6 = "alter table ADMINISTRATEUR add constraint FK_RECEVER1 foreign key (ID_EMETTEUR)
		references NOTIFICATION (ID_EMETTEUR) on delete restrict on update restrict";	  
		
		$connexion->exec($requete_sql_ADMINISTRATEUR6);
		echo "Table ADMINISTRATEUR modifier avec succès.<br>";
		
		/**********************************************************/
		//Modification de la table ADMIN_HEBERGEMENT
		$requete_sql_ADMIN_HEBERGEMENT = "alter table ADMIN_HEBERGEMENT add constraint FK_GERER7 foreign key (ID_HEBERGEMENT)
		references HEBEGEMENT (ID_HEBERGEMENT) on delete restrict on update restrict";

		$connexion->exec($requete_sql_ADMIN_HEBERGEMENT);
		echo "Table ADMIN_HEBERGEMENT modifier avec succès.<br>";
				
		$requete_sql_ADMIN_HEBERGEMENT2 = "alter table ADMIN_HEBERGEMENT add constraint FK_RECEVER5 foreign key (ID_EMETTEUR)
		references NOTIFICATION (ID_EMETTEUR) on delete restrict on update restrict";
				
		$connexion->exec($requete_sql_ADMIN_HEBERGEMENT2);
		echo "Table ADMIN_HEBERGEMENT modifier avec succès.<br>";

		/**********************************************************/
		//Modification de la table ADMIN_RESTAURATION
		$requete_sql_RESTAURATION = "alter table ADMIN_RESTAURATION add constraint FK_GERER5 foreign key (ID_RESTAURATION)
		references RESTAURATION (ID_RESTAURATION) on delete restrict on update restrict";

		$connexion->exec($requete_sql_RESTAURATION);
		echo "Table ADMIN_RESTAURATION modifier avec succès.<br>";
			
		$requete_sql_RESTAURATION2 = "alter table ADMIN_RESTAURATION add constraint FK_RECEVER4 foreign key (ID_EMETTEUR)
		references NOTIFICATION (ID_EMETTEUR) on delete restrict on update restrict";
		
		$connexion->exec($requete_sql_RESTAURATION2);
		echo "Table ADMIN_RESTAURATION modifier avec succès.<br>";

		/**********************************************************/
		//Modification de la table ADMIN_TRANSPORT
		$requete_sql_TRANSPORT= "alter table ADMIN_TRANSPORT add constraint FK_GERER6 foreign key (ID_TRANSPORT)
		references TRANSPORT (ID_TRANSPORT) on delete restrict on update restrict"; 

		$connexion->exec($requete_sql_TRANSPORT);
		echo "Table ADMIN_TRANSPORT modifier avec succès.<br>";
			
		$requete_sql_TRANSPORT2 = "alter table ADMIN_TRANSPORT add constraint FK_RECEVER2 foreign key (ID_EMETTEUR)
		references NOTIFICATION (ID_EMETTEUR) on delete restrict on update restrict";
					
		$connexion->exec($requete_sql_TRANSPORT2);
		echo "Table ADMIN_TRANSPORT modifier avec succès.<br>";

		/**********************************************************/
		//Modification de la table GUIDE	
		$requete_sql_GUIDE = "alter table GUIDE add constraint FK_RECEVER3 foreign key (ID_EMETTEUR)
		references NOTIFICATION (ID_EMETTEUR) on delete restrict on update restrict";
		   
		$connexion->exec($requete_sql_GUIDE);
		echo "Table GUIDE modifier avec succès.<br>";

		/**********************************************************/
	    //Modification de la table UTILISATEUR
		
		$requete_sql_UTILISATEUR= "alter table UTILISATEUR add constraint FK_RECEVER foreign key (ID_EMETTEUR)
		references NOTIFICATION (ID_EMETTEUR) on delete restrict on update restrict";
			
		$connexion->exec($requete_sql_UTILISATEUR);
		echo "Table UTILISATEUR modifier avec succès.<br>";
		
		/**********************************************************/
		//Clôture de la connexion
		$connexion = null;
	} 
	catch (PDOException $e) 
	{
		echo "Erreur ! " . $e->getMessage() . "<br/>";
	}
?>
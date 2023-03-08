<?php
	header('content-type: text/html; charset=utf-8');
	
	$nom_bdd = "DiscoverAlgeria";
	$server = "localhost"; $user = "root"; $password = "";
	try 
    {
		//Création d'une connexion avec le SGBD
		$connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);	


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
        references HEBEGEMENT (ID_HEBERGEMENT) on delete restrict on update restrict";

        $connexion->exec($requete_sql_CONTENIR6);
		echo "Table CONTENIR modifiée avec succès.<br>";

        /**********************************************************/
		//Clôture de la connexion
		$connexion = null;
	} 
    catch (PDOException $e) {
		echo "Erreur ! " . $e->getMessage() . "<br/>";
	}
?>
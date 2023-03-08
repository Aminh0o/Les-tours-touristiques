<?php

	header('content-type: text/html; charset=utf-8');
	
	$nom_bdd = "DiscoverAlgeria";
	$server = "localhost"; $user = "root"; $password = "";
	try 
	{
		//Création d'une connexion avec le SGBD
		$connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
		
        /**********************************************************/
        //Insertion de données pour la table TRANSPORT
        $requete_sql_Transport_data1 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans1','tramway_alger','tramway','alger','NULL')";
        
        $requete_sql_Transport_data2 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans2','tramway_oran','tramway','oran','NULL')";
        
        $requete_sql_Transport_data3 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans3','tramway_constantine','tramway','constantine','NULL')";
        
        $requete_sql_Transport_data4 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans4','etusa_alger','bus','alger','021650598')";
        
        $requete_sql_Transport_data5 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans5','etusa_oran','bus','oran','021664468')";
        
        $requete_sql_Transport_data6 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans6','etus_tlemcen','bus','tlemcen','021669218')";
        
        $requete_sql_Transport_data7 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans7','etus_constantine','bus','constantine','021655758')";
        
        $requete_sql_Transport_data8 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans8','transport_urbain','bus','bejaia','034114640')";
        
        $requete_sql_Transport_data9 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans9','trans_tamanrasset','bus','tamanrasset','029344767')";
        
        $requete_sql_Transport_data10 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans10','téléphérique_alger','telepherique','alger','NULL')";
        
        $requete_sql_Transport_data11 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans11','téléphérique_oran','telepherique','oran','NULL')";
        
        $requete_sql_Transport_data12 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans12','téléphérique_tlemcen','telepherique','tlemcen','NULL')";
        
        $requete_sql_Transport_data13 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans13','téléphérique_constantine','telepherique','constantine','NULL')";
        
        $requete_sql_Transport_data14 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans14','téléphérique_bejaia','telepherique','bejaia','NULL')";

        $requete_sql_Transport_data15 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans15','air_algerie_alger','avion','alger','021986363')";
        
        $requete_sql_Transport_data16 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans16','air_algerie_oran','avion','oran','041334726')";
        
        $requete_sql_Transport_data17 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans17','air_algerie_tlemcen','avion','tlemcen','043264521')";
        
        $requete_sql_Transport_data18 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans18','air_algerie_constantine','avion','constantine','031930090')";
        
        $requete_sql_Transport_data19 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES
        ('trans19','air_algerie_bejaia','avion','bejaia','034211336')";
        
        $requete_sql_Transport_data20 = "INSERT INTO TRANSPORT (ID_TRANSPORT, NOMACCOMPAGNE, TYPE_TRANSPORT, ADRESSE, TELEPHONE) VALUES 
        ('trans20','air_algerie_tamanrasset','avion','tamanrasset','029344499')";
        
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
			
		$requete_sql_Hebergement_data1 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('heberg1','ibis_alger','hotel','3','alger','0770134965')";
			
		$requete_sql_Hebergement_data2 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('heberg2','sheraton_alger','hotel','5','alger','021377777')";
			
		$requete_sql_Hebergement_data3 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('heberg3','el_djazair','hotel','5','alger','023481108')";
			
		$requete_sql_Hebergement_data4 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('heberg4','dar_diaf','hotel','3','alger','023371010')";
			
		$requete_sql_Hebergement_data5 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
		('heberg5','nazel_el_yassamine','hotel','2','alger','044475003')";

        $requete_sql_Hebergement_data6 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
        ('heberg6','dar_el_beida_aeroport','hotel','3','alger','023813739')";

		$requete_sql_Hebergement_data7 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
        ('heberg7','inn_by_marriott','residence','3','alger','023741333')";

		$requete_sql_Hebergement_data8 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES 
        ('heberg8','welcome_to_alger_dar_el_beida','residence','3','alger','NULL')";
        
        $requete_sql_Hebergement_data9 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
        ('heberg9','renaissance_tlemcen','hotel','5','tlemcen','043401111')";

		$requete_sql_Hebergement_data10 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg10','ibis-tlemcen','hotel','4','tlemcen','043981010')";
		  
		$requete_sql_Hebergement_data11 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg11','zianide','hotel','4','tlemcen','043277102')";
		  
		$requete_sql_Hebergement_data12 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg12','pomaria','hotel','3','tlemcen','043215141')";
  
		$requete_sql_Hebergement_data13 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg13','stambouli','hotel','3','tlemcen','043274587')";
  
		$requete_sql_Hebergement_data14 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg14','saim','hotel','2','tlemcen','0773910873')";
  
		$requete_sql_Hebergement_data15 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg15','méridian','hotel','5','oran','041984000')";
  
		$requete_sql_Hebergement_data16 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg16','sherato_oran','hotel','5','oran','041590100')";
  
		$requete_sql_Hebergement_data17 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg17','ibis_oran','hotel','3','oran','041982300')";
  
		$requete_sql_Hebergement_data18 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg18','best_western_colombe','hotel','3','oran','041746175')";
  
		$requete_sql_Hebergement_data19 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg19','rodina','hotel','4','oran','0555557412')";
  
		$requete_sql_Hebergement_data20 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg20','résidence_emir','residence','3','oran','0560993311')";
  
		$requete_sql_Hebergement_data21 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg21','the_adress_residence_sm','residence','5','oran','0540049294')";
  
		$requete_sql_Hebergement_data22 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg22','chahinas','residence','4','tlemcen','0697225562')";
  
		$requete_sql_Hebergement_data23 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg23','résidence_anfel','residence','5','tlemcen',' 0697621306')";
  
		$requete_sql_Hebergement_data24 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg24','marriott_constantine','hotel','5','constantine','031731073')";
  
		$requete_sql_Hebergement_data25 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg25','el_khayem','hotel','4','constantine','031744220')";
  
		$requete_sql_Hebergement_data26 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg26','novotel','hotel','4','constantine',' 031992000')";
  
		$requete_sql_Hebergement_data27 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg27','ibis_constantine','hotel','3','constantine',' 031992000')";
  
		$requete_sql_Hebergement_data28 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg28','hocine_el_khroub','hotel','4','constantine','031750000')";
  
		$requete_sql_Hebergement_data29 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg29','elbey','hotel','3','constantine','031649494')";
  
		$requete_sql_Hebergement_data30 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg30','hotel_des_princes','hotel','3','constantine','031912770')";
  
		$requete_sql_Hebergement_data31 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg31','lantana','residence','5','constantine','0560243468')";
  
		$requete_sql_Hebergement_data32 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg32','les_palmiers','residence','4','constantine','031819110')";
  
		$requete_sql_Hebergement_data33 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg33','le_cristal','hotel','3','bejaia','034818585')";
  
		$requete_sql_Hebergement_data34 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg34','altantis','hotel','4','bejaia','034180055')";
  
		$requete_sql_Hebergement_data35 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg35','les_hammadites','hotel','4','bejaia','034816512')";

		$requete_sql_Hebergement_data36 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg36','immomalak','residence','5','bejaia','034129407')";

		$requete_sql_Hebergement_data37 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg37','location_daoud','residence','4','bejaia','0561548829')";

		$requete_sql_Hebergement_data38 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg38','raja','hotel','2','tamanrasset','021614545')";

		$requete_sql_Hebergement_data39 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg39','takialt','hotel','3','adrar','049367800')";

		$requete_sql_Hebergement_data40 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg40','tahat','hotel','3','tamanrasset','029312355')";

		$requete_sql_Hebergement_data41 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg41','touat','hotel','4','adrar','049369821')";

		$requete_sql_Hebergement_data42 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg42','mraguen','residence','2','adrar','049967793')";

		$requete_sql_Hebergement_data43 = "INSERT INTO HEBERGEMENT (ID_HEBERGEMENT, NOM, TYPE_HEBERG, RATING, ADRESSE, TELEPHONE) VALUES
		('heberg43','khodja','residence','4','tamanrasset','0663445010')";

		
				
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
		$requete_sql_Restauration_data1 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto1','la_grotte_des_saveurs','alger','0555337076')";

		$requete_sql_Restauration_data2 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto2','la_maison_couscouse','alger','0770346044')";

		$requete_sql_Restauration_data3 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto3','casbah_istanbul','alger','0554130625')";

		$requete_sql_Restauration_data4 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto4','le_roi_de_la_loubia','alger','021740291')";

		$requete_sql_Restauration_data5 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto5','la_baie_alger','alger','021738357')";

		$requete_sql_Restauration_data6 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto6','taj_mahal','alger','021341824')";

		$requete_sql_Restauration_data7 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto7','etalon','alger','0661572950')";

		$requete_sql_Restauration_data8 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto8','le_normand','alger','044199560')";

		$requete_sql_Restauration_data9 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto9','le_marquise','oran','0671807878')";

		$requete_sql_Restauration_data10 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto10','le_cintra','oran','0560000346')";

		$requete_sql_Restauration_data11 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto11','marrakech','oran','0669319213')";

		$requete_sql_Restauration_data12 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto12','barbaroussa','oran','0799371612')";

		$requete_sql_Restauration_data13 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto13','el_halabi','oran','0552586565')";

		$requete_sql_Restauration_data14 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto14','equinoxe','tlemcen','043417360')";

		$requete_sql_Restauration_data15 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto15','echapatoire','tlemcen','043213563')";

		$requete_sql_Restauration_data16 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto16','latina','tlemcen','O552994245')";

		$requete_sql_Restauration_data17 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto17','le_gourmet','tlemcen','0699453413')";

		$requete_sql_Restauration_data18 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto18','dar_al_soltane','constantine','031642256')";

		$requete_sql_Restauration_data19 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto19','jannah','constantine','031731073')";

		$requete_sql_Restauration_data20 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto20','siniet_el_bey','constantine','0776050404')";

		$requete_sql_Restauration_data21 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto21','venezia','constantine','0557715363')";

		$requete_sql_Restauration_data22 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto22','el_baik','constantine','0561836666')";

		$requete_sql_Restauration_data23 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto23','cirta','constantine','0798502726')";

		$requete_sql_Restauration_data24 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto24','les_platannes','constantine','031928622')";

		$requete_sql_Restauration_data25 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto25','la_citadelle','bejaia','0553905401')";

		$requete_sql_Restauration_data26 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto26','tacos_city','bejaia','0770550297')";

		$requete_sql_Restauration_data27 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto27','plaza','bejaia','0540442880')";

		$requete_sql_Restauration_data28 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto28','le_petit_bateau','bejaia','0550601397')";

		$requete_sql_Restauration_data29 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto29','essalem','bejaia','034114536')";

		$requete_sql_Restauration_data30 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto30','hotel_tahat','tamanrasset','029312121')";

		$requete_sql_Restauration_data31 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto31','edhabi','tamanrasset','029321092')";

		$requete_sql_Restauration_data32 = "INSERT INTO RESTAURATION (ID_RESTAURATION, NOM, ADRESSE, TELEPHONE) VALUES 
		('resto32','adriane','tamanrasset','0676421796')";
			
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
		//Insertion de données pour la table TOUR
		
		$requete_sql_Tour_data1 = "INSERT INTO TOUR (ID_TOUR, NOMTOUR, DUREETOUR) VALUES 
		('','','')";

		$requete_sql_Tour_data2 = "INSERT INTO TOUR (ID_TOUR, NOMTOUR, DUREETOUR) VALUES 
		('','','')";

		$requete_sql_Tour_data3 = "INSERT INTO TOUR (ID_TOUR, NOMTOUR, DUREETOUR) VALUES 
		('','','')";

		$requete_sql_Tour_data4 = "INSERT INTO TOUR (ID_TOUR, NOMTOUR, DUREETOUR) VALUES 
		('','','')";

		$requete_sql_Tour_data5 = "INSERT INTO TOUR (ID_TOUR, NOMTOUR, DUREETOUR) VALUES 
		('','','')";
		
		$connexion->exec($requete_sql_Tour_data1);
		$connexion->exec($requete_sql_Tour_data2);
		$connexion->exec($requete_sql_Tour_data3);
		$connexion->exec($requete_sql_Tour_data4);
		$connexion->exec($requete_sql_Tour_data5);
		echo "Insertion réussie au niveau de la table TOUR.<br>";

		/**********************************************************/
		//Insertion de données pour la table COMPTE
		
		$requete_sql_Compte_data1 = "INSERT INTO COMPTE (ID_COMPTE, NOM, LOGIN_COMPTE, MOT_DE_PASSE) VALUES 
		('','','','')";

		$requete_sql_Compte_data2 = "INSERT INTO COMPTE (ID_COMPTE, NOM, LOGIN_COMPTE, MOT_DE_PASSE) VALUES 
		('','','','')";

		$requete_sql_Compte_data3 = "INSERT INTO COMPTE (ID_COMPTE, NOM, LOGIN_COMPTE, MOT_DE_PASSE) VALUES 
		('','','','')";

		$requete_sql_Compte_data4 = "INSERT INTO COMPTE (ID_COMPTE, NOM, LOGIN_COMPTE, MOT_DE_PASSE) VALUES 
		('','','','')";

		$requete_sql_Compte_data5 = "INSERT INTO COMPTE (ID_COMPTE, NOM, LOGIN_COMPTE, MOT_DE_PASSE) VALUES 
		('','','','')";
		
		$connexion->exec($requete_sql_Compte_data1);
		$connexion->exec($requete_sql_Compte_data2);
		$connexion->exec($requete_sql_Compte_data3);
		$connexion->exec($requete_sql_Compte_data4);
		$connexion->exec($requete_sql_Compte_data5);
		echo "Insertion réussie au niveau de la table COMPTE.<br>";


		//Clôture de la connexion
		$connexion = null;
	} 
	catch (PDOException $e) 
	{
		echo "Erreur ! " . $e->getMessage() . "<br/>";
	}
?>
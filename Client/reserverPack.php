<?php

    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";

    $first_name = $_POST["nomUtilisateur"];
    $last_name = $_POST["prenomUtilisateur"];
    $date_naissance = $_POST["dateNaissance"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $date_reservation = $_POST["date_reservation"];
    $wilyaya = $_POST["wilaya"];
    $categorie = $_POST["categorie"];

    $date_reservation = $_POST['date_reservation'];
    $nbr_places_demande = $_POST['nbr_places_demande'];

    $utilisateurs = array();
    for ($i = 0; $i < $nbr_places_demande; $i++) 
    {
        $nom = $_POST['nomPassager'.$i];
        $prenom = $_POST['prenomPassager'.$i];
        $date_naissance = $_POST['naissance'.$i];

        $utilisateur = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $date_naissance
        );

        array_push($utilisateurs, $utilisateur);
    }
    $choix = $_POST['accompagner'];

    session_start();

    try
    {
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
 
        if ($choix == 'yes') 
        {
            $requette_utilisateur = "INSERT INTO PASSAGER (NOM, PRENOM, DATE_DE_NAISSANCE)
                                     VALUES ('$first_name', '$last_name', '$date_naissance')";
            $resultat_utilisateur = $connexion->exec($requette_utilisateur);
            echo "<p> je pense cbn (table passager utilisateur principal) <a href='InterfaceClient.html'> </p>";

            $passager = array(
                'nom' => $nom_passager,
                'prenom' => $prenom_passager,
                'dateNaissance' => $date_de_naissance_passager,
            );
            $utilisateurs[] = $passager;
            
            $_SESSION['listeUtilisateurs'] = $utilisateurs;
            echo "<p> je pense cbn (table passager les autres) <a href='InterfaceClient.html'> </p>";
     
            for ($i = 0; $i < count($utilisateurs)-1; $i++) 
            {
                $nom = $utilisateurs[$i]['nom'];
                $prenom = $utilisateurs[$i]['prenom'];
                $date_naissance = $utilisateurs[$i]['dateNaissance'];
            
                $requete_passager = "INSERT INTO PASSAGER (NOM, PRENOM, DATE_DE_NAISSANCE)
                                     VALUES ('$nom', '$prenom', '$date_naissance')";
                $resultat_passager = $connexion->exec($requete_passager);
            }
            

            $requette="INSERT INTO RESERVATION (ID_RESERVATION,DATE_RESERVATION, NBR_PLACES_DEMANDE)
                       VALUES ('1', '$date_reservation', '$nbr_places_demande'+1)";
            $resultat = $connexion->exec($requette);
            echo "<p> je pense cbn (table reservation) <a href='InterfaceClient.html'> </p>";
        }

        else if ($choix == 'no') 
        {
            $requette1="INSERT INTO PASSAGER (NOM, PRENOM, DATE_DE_NAISSANCE)
                        VALUES ('$first_name', '$last_name', '$date_naissance')";
            $resultat1 = $connexion->exec($requette1);
        
            echo "<p> je pense cbn (table passager utilisateur principal) <a href='InterfaceClient.html'> </p>";
        
            
            $requette2="INSERT INTO RESERVATION (ID_RESERVATION,DATE_RESERVATION, NBR_PLACES_DEMANDE)
                        VALUES ('1', '$date_reservation', '1')";
            $resultat2 = $connexion->exec($requette2);
        
            echo "<p> je pense cbn (table reservation) <a href='InterfaceClient.html'> </p>";
        } 
    }
    catch (PDOException $e) 
    {
        echo "Erreur ! " . $e->getMessage() . "<br/>";
    }
?>

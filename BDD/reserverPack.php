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
    $wilyaya = $_POST["wilaya"];
    $categorie = $_POST["categorie"];

    $date_reservation = date('Y-m-d H:i:s');
    $nbr_places_demande = $_POST['nbr_places_demande'];

    $choix = $_POST['accompagner'];

    session_start();

    try
    {
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
 
        if ($choix == 'yes') 
        {
            $utilisateurs = array();
            for ($i = 0; $i < $nbr_places_demande; $i++) 
            {
                $nom_passager = $_POST['nomPassager'.$i];
                $prenom_passager = $_POST['prenomPassager'.$i];
                $date_de_naissance_passager = $_POST['naissance'.$i];
        
                $utilisateur = array(
                    'nom' => $nom_passager,
                    'prenom' => $prenom_passager,
                    'dateNaissance' => $date_de_naissance_passager
                );
        
                array_push($utilisateurs, $utilisateur);
            }
            
            $passager = array(
                'nom' => $nom_passager,
                'prenom' => $prenom_passager,
                'dateNaissance' => $date_de_naissance_passager,
            );
            $utilisateurs[] = $passager;
            
            $_SESSION['listeUtilisateurs'] = $utilisateurs;
            
     
            for ($i = 0; $i < count($utilisateurs)-1; $i++) 
            {
                $nom = $utilisateurs[$i]['nom'];
                $prenom = $utilisateurs[$i]['prenom'];
                $date_naissance = $utilisateurs[$i]['dateNaissance'];
            
                $requete_passager = "INSERT INTO PASSAGER (NOM, PRENOM, DATE_DE_NAISSANCE)
                                     VALUES ('$nom', '$prenom', '$date_naissance')";
                $resultat_passager = $connexion->exec($requete_passager);
            }
            

            $requette="INSERT INTO RESERVATION (NOM_RESERVATION, DATE_RESERVATION, NBR_PLACES_DEMANDE)
                       VALUES ('$last_name', '$date_reservation', '$nbr_places_demande'+1)";
            $resultat = $connexion->exec($requette);
            echo "<script>alert('Votre reservation a été sauvegarder'); window.location.href='interfaceClient.php'</script>";
        }

        else if ($choix == 'no') 
        { 
            $requette1="INSERT INTO RESERVATION (NOM_RESERVATION, DATE_RESERVATION, NBR_PLACES_DEMANDE)
                        VALUES ('$last_name', '$date_reservation', '1')";
            $resultat1 = $connexion->exec($requette1);
            echo "<script>alert('Votre reservation a été sauvegarder'); window.location.href='interfaceClient.php'</script>";
        } 
    }
    catch (PDOException $e) 
    {
        echo "Erreur ! " . $e->getMessage() . "<br/>";
    }
?>

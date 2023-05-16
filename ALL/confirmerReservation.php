<?php

    $server="localhost";
    $nom_bdd="discoveralgeria";
    $user="root";
    $password="";
    session_start();

    $first_name = $_SESSION["first_name"];
    $last_name = $_SESSION["last_name"];
    $date_naissance = $_SESSION["date_naissance"];
    $date_reservation = $_SESSION["date_reservation"];
    $telephone = $_SESSION["telephone"];
    $email = $_SESSION["email"];
    $wilaya = $_SESSION["wilaya"];
    $categorie = $_SESSION["categorie"];
    $type = $_SESSION["type"];
    $nbr_places_demande = $_SESSION["nbr_places_demande"];
    $choix = $_SESSION["choix"];
    $id_pack = $_SESSION["id_pack"];
    $accommodation = $_SESSION["accommodation"];
    $feeding = $_SESSION["feeding"];
    $transportation = $_SESSION["transportation"];
    $utilisateurs = $_SESSION['listeUtilisateurs'];

    //connexion vers la bdd 
    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);

    //pour recupérer le prix du pack accédé 
    $req_pack_prix = "SELECT PRIX FROM PACK WHERE NUMEROPACK = '$id_pack' ";
    $res_pack_prix = $connexion->query($req_pack_prix);
    $tuple_pack_prix = $res_pack_prix->fetch(PDO::FETCH_ASSOC);
    $prix = $tuple_pack_prix["PRIX"];
    $child = 0;
    foreach ($utilisateurs as $children)
    {
        $plus12 = $children['plus12'];
        if ($plus12 == 1) 
        { 
            $prix *= 0.88; /*appliquer 100% - 12% = 0.88*/
            $child ++; 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="confirmerReservation.css">
    <link href="icons/icons/css/icons.css" rel="stylesheet">
    <title>Confirm Reservation</title>
</head>
<body>
    <header>
        <div class="sectionGauche">
            <a href="InterfaceClient.php"><img src="icons/logoo.png" id="logo"></a>
        </div>
    </header>

    <section class="confirmation-container">
        <h1 class="confirmation-titre">Confirmation Pack</h1>
        <p class="confirmation-texte">
            Dear <b>"<?php echo $first_name; ?>&nbsp;<?php echo $last_name; ?>"</b>,
            thank you !<br><br><br>
            &nbsp&nbsp&nbsp&nbspWe are pleased to confirm your reservation of the 
            <b><?php echo $categorie; ?></b> pack in <b><?php echo $wilaya; ?></b> at <b> <?php echo $date_reservation; ?></b><br>
            &nbsp&nbsp&nbsp&nbspwith the following details:</p>
        <h2 class="confirmation-details-titre">Your Details</h2>
        <hr>
        <div class="confirmation-details-container">
            <table class="confirmation-details-table">
                <tbody>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>Phone number:</td>
                        <td><?php echo $telephone; ?></td>
                    </tr>
                    <tr>
                        <td>Date of birth:</td>
                        <td><?php echo $date_naissance; ?></td>
                    </tr>
                    <tr>
                        <td>Accompanied:</td>
                        <td><?php echo $choix; ?></td>
                    </tr>
                    <tr>
                        <td>People with you:</td>
                        <td><?php echo $nbr_places_demande; ?></td>
                    </tr>
                    <tr>
                        <td>Children:</td>
                        <td><?php echo $child; ?></td>
                    </tr>
                    <tr>
                        <td>Type:</td>
                        <td><?php echo $type; ?></td>
                    </tr>
                    <tr>
                        <td>Options included:</td>
                        <td>
                            <?php echo $accommodation;?><br>
                            <?php echo $transportation;?><br>
                            <?php echo $feeding;?>
                        </td>
                    </tr>  
                </tbody>
            </table>
            <div class="price">
                <hr>
                <h4>Price:</h4>
                <h4><?php echo $prix; ?> DA</h4>
            </div>
            <form method="POST"><button id="confirm" name="confirm">Confirm</button></form>
            <?php  
                if (isset($_POST["confirm"]))
                {
                    $first_name = $_SESSION["first_name"];
                    $date_reservation = $_SESSION["date_reservation"];
                    $nbr_places_demande = $_SESSION["nbr_places_demande"];
                    $choix = $_SESSION["choix"];
                    $utilisateurs = $_SESSION['listeUtilisateurs'];
                    try
                    { 
                        if ($choix == 'yes') 
                        {
                            //pour récupérer le id de l'utilisateur qui fait la réservation
                            $req_id_utilisateur = "SELECT ID_UTILISATEUR FROM UTILISATEUR WHERE NOM='$first_name' ";
                            $res_id_utilisateur = $connexion->query($req_id_utilisateur);
                            $tuple_id_utilisateur = $res_id_utilisateur->fetch(PDO::FETCH_ASSOC);
                            $id_utilisateur = $tuple_id_utilisateur["ID_UTILISATEUR"];
              
                            foreach ($utilisateurs as $passager) 
                            {
                                $nom = $passager['nom'];
                                $prenom = $passager['prenom'];
                                $date_naissance = $passager['dateNaissance'];
                                
                                $requete_passager ="INSERT INTO PASSAGER (NOM, PRENOM, DATE_DE_NAISSANCE)
                                                    VALUES ('$nom', '$prenom', '$date_naissance')";
                                $resultat_passager = $connexion->exec($requete_passager);
            
                                //récupérer le id de chaque passager
                                $id_passager = $connexion->lastInsertId();
            
                                //pour inserer dans la table ACCOMPAGNER
                                $req_accompagner = "INSERT INTO ACCOMPAGNER(ID_PASSAGER,ID_UTILISATEUR) VALUES ('$id_passager','$id_utilisateur')";
                                $connexion->exec($req_accompagner);
                            }
                            
                            $requette="INSERT INTO RESERVATION (NOM_RESERVATION, DATE_RESERVATION, NBR_PLACES_DEMANDE)
                                       VALUES ('$first_name', '$date_reservation', '$nbr_places_demande'+1)";
                            $resultat = $connexion->exec($requette);
            
                            $id_reservation = $connexion->lastInsertId();
            
                            $req_faire = "INSERT INTO FAIRE(ID_UTILISATEUR,ID_RESERVATION) VALUES ('$id_utilisateur','$id_reservation')";
                            $connexion->exec($req_faire);
            
                            $req_concerner = "INSERT INTO CONCERNER(NUMEROPACK,ID_RESERVATION) VALUES ('$id_pack','$id_reservation')";
                            $connexion->exec($req_concerner);

                            $req_notif="INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) 
                                        VALUES ('$id_utilisateur',99,'Une réservation envoyée par utilisateur $id_utilisateur et concernant le pack $id_pack avec un prix de $prix DA et options :  $transportation ,$accommodation ,$feeding')";
                            $connexion->exec($req_notif);
            
                            header("Location: interfaceClient.php");
                        }
                
                        else if ($choix == 'no') 
                        { 
                            //pour récupérer le id de l'utilisateur qui fait la réservation
                            $req_id_utilisateur = "SELECT ID_UTILISATEUR FROM UTILISATEUR WHERE NOM='$first_name' ";
                            $res_id_utilisateur = $connexion->query($req_id_utilisateur);
                            $tuple_id_utilisateur = $res_id_utilisateur->fetch(PDO::FETCH_ASSOC);
                            $id_utilisateur = $tuple_id_utilisateur["ID_UTILISATEUR"];
            
                            $requette1="INSERT INTO RESERVATION (NOM_RESERVATION, DATE_RESERVATION, NBR_PLACES_DEMANDE)
                                        VALUES ('$first_name', '$date_reservation', '1')";
                            $resultat1 = $connexion->exec($requette1);
            
                            $id_reservation = $connexion->lastInsertId();
            
                            $req_faire = "INSERT INTO FAIRE(ID_UTILISATEUR,ID_RESERVATION) VALUES ('$id_utilisateur','$id_reservation')";
                            $connexion->exec($req_faire);
            
                            $req_concerner = "INSERT INTO CONCERNER(NUMEROPACK,ID_RESERVATION) VALUES ('$id_pack','$id_reservation')";
                            $connexion->exec($req_concerner);

                            $req_notif="INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) 
                                        VALUES ('$id_utilisateur',99,'une réservation envoyer par user $id_utilisateur et concernant le pack $id_pack avec prix de $prix DA et options : $transportation ,$accommodation ,$feeding')";
                            $connexion->exec($req_notif);

                            header("Location: interfaceClient.php");
                        } 
                    }
                    catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
                }
            ?>
        </div>
    </section>
</body>
</html>
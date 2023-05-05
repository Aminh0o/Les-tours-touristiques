<?php

    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    session_start();

    if (isset($_POST["submit"]))
    {
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
                header("Location: interfaceClient.php");
            }
    
            else if ($choix == 'no') 
            { 
                $requette1="INSERT INTO RESERVATION (NOM_RESERVATION, DATE_RESERVATION, NBR_PLACES_DEMANDE)
                            VALUES ('$last_name', '$date_reservation', '1')";
                $resultat1 = $connexion->exec($requette1);
                header("Location: interfaceClient.php");
            } 
        }
        catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="reserverPack.css">
    <script src="JS/reserverPack.js"></script>
</head>
<body>
    <header>
        <div class="sectionGauche">
            <a href="InterfaceClient.php"><img src="icons/logoo.png" id="logo"></a>
        </div>
    </header>

    <section class="reservationForm">
        <h1 id="title">RESERVE A PACK</h1>
        <form method="POST" class="form">
            <div class="leftInput">
                <label>First Name :</label>
                <input type="text" size="20" name="nomUtilisateur" placeholder="Enter your first name" ><br>
                
                <label>Last Name :</label>
                <input type="text" size="20" name="prenomUtilisateur" placeholder="Enter your last name" ><br>
                
                <label>Birth Date :</label>
                <input type="date" name="dateNaissance"><br>
                
                <label>Phone Number :</label>
                <input type="number" name="telephone" size="10" placeholder="Enter your telephone number" ><br>
                
                <label>E-mail :</label>
                <input type="email" name="email" placeholder="Enter your email address" ><br>
                
            </div>

            <div class="rightInput">
                <div class="accompagner">
                    <h4>Are you accompanied ?</h4>
                    <label for="SIaccompagner">Yes</label>
                    <input type="radio" name="accompagner" id="SIaccompagner" value="yes" onclick="afficherAccompagner()">
                    <label for="SINONaccompagner">No</label>
                    <input type="radio" name="accompagner" id="SINONaccompagner" value="no" onclick="afficherAccompagner()" checked>
                </div>

                <label>Choose the place you want to visit :</label>
                <select name="wilaya" id="wilaya">
                    <option value="alger" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'alger') echo 'selected'; ?>>ALGIERS</option>
                    <option value="tlemcen" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'tlemcen') echo 'selected'; ?>>TLEMCEN</option>
                    <option value="oran" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'oran') echo 'selected'; ?>>ORAN</option>
                    <option value="constantine" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'constantine') echo 'selected'; ?>>CONSTANTINE</option>
                    <option value="bejaia" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'bejaia') echo 'selected'; ?>>BEJAIA</option>
                    <option value="sahara" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'sahara') echo 'selected'; ?>>SAHARA</option>
                </select>

                <label>Choose your pack option :</label>
                <select name="categorie" id="categorie" >
                    <option value="royal" <?php if (isset($_GET['categorie']) && $_GET['categorie'] == 'royal') echo 'selected'; ?>>ROYAL</option>
                    <option value="special" <?php if (isset($_GET['categorie']) && $_GET['categorie'] == 'special') echo 'selected'; ?>>SPECIAL</option>
                    <option value="normal" <?php if (isset($_GET['categorie']) && $_GET['categorie'] == 'normal') echo 'selected'; ?>>NORMAL</option>
                </select>

                <label>Choose your pack type :</label>
                <select name="type" id="type" >
                    <option value="FAMILY" <?php if (isset($_GET['type']) && $_GET['type'] == 'family') echo 'selected'; ?>>FAMILY</option>
                    <option value="ADULT" <?php if (isset($_GET['type']) && $_GET['type'] == 'adult') echo 'selected'; ?>>ADULT</option>
                    <option value="PERSONAL" <?php if (isset($_GET['type']) && $_GET['type'] == 'personal') echo 'selected'; ?>>PERSONAL</option>
                </select>

                <label>Choose your pack included options :</label>
                <select name="includedOption" id="includedOption" multiple>
                    <option value="guide">Guide</option>
                    <option value="accommodation">Accommodation</option>
                    <option value="transportation">Transportation</option>
                    <option value="feeding">Feeding</option>
                </select>
            </div>     

            <div id="accompagnerChoice" class="accompagnerChoice">
                <label>How many people do you want to go with ?</label>
                <input type="number" name="nbr_places_demande" id="nbr_places_demande" size="5" placeholder="Enter a number !" >

                <button onclick="ajouterUtilisateur(event)">Add</button>
                
                <table>
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Birth Date</th>
                        </tr>
                    </thead>
                    <tbody id="listeUtilisateurs" name="listeUtilisateurs"></tbody>
                </table>
            </div>

            <button id="submit" name="submit">Submit</button>
        </form>
    </section>
</body>
</html>
<?php

    $server="localhost";
    $nom_bdd="discoveralgeria";
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
        /*$wilaya = $_POST["wilaya"];
        $categorie = $_POST["categorie"];*/
        $wilaya = isset($_GET['wilaya']) && $_GET['wilaya'] ? $_GET['wilaya'] : $_POST["wilaya"];
        $categorie = isset($_GET['categorie']) && $_GET['categorie'] ? $_GET['categorie'] : $_POST["categorie"];
        $type = isset($_GET['type']) && $_GET['type'] ? $_GET['type'] : $_POST["type"];

        if(isset($_POST["accommodation"])) { $_SESSION["accommodation"] = "accommodation included"; }
            else {$_SESSION["accommodation"] = "accommodation not-included";}
        if(isset($_POST["transportation"])) { $_SESSION["transportation"] = "transportation included"; }
            else {$_SESSION["transportation"] = "transportation not-included";}
        if(isset($_POST["feeding"])) { $_SESSION["feeding"] = "feeding included"; }
            else {$_SESSION["feeding"] = "feeding not-included";}

        $date_reservation = date('Y-m-d H:i:s');
        $nbr_places_demande = $_POST['nbr_places_demande'];
    
        $choix = $_POST['accompagner'];
        $id_pack = $_GET['id'];

        $utilisateurs = array();
                    
        for ($i = 0; $i < $nbr_places_demande; $i++) 
        {
            $nom_passager = $_POST['nomPassager'.$i];
            $prenom_passager = $_POST['prenomPassager'.$i];
            $date_de_naissance_passager = $_POST['naissance'.$i];
            $plus12_passager = isset($_POST['plus12'.$i]) ? 1 : 0;
        
            $utilisateur = array
            (
                'nom' => $nom_passager,
                'prenom' => $prenom_passager,
                'dateNaissance' => $date_de_naissance_passager,
                'plus12' => $plus12_passager
            );
        
            array_push($utilisateurs, $utilisateur);
        }

        session_start();
        $_SESSION["first_name"] = $first_name;
        $_SESSION["last_name"] = $last_name;
        $_SESSION["date_naissance"] = $date_naissance;
        $_SESSION["date_reservation"] = $date_reservation;
        $_SESSION["telephone"] = $telephone;
        $_SESSION["email"] = $email;
        $_SESSION["wilaya"] = $wilaya;
        $_SESSION["categorie"] = $categorie;
        $_SESSION["type"] = $type;
        $_SESSION["nbr_places_demande"] = $nbr_places_demande;
        $_SESSION["choix"] = $choix;
        $_SESSION["id_pack"] = $id_pack;
        $_SESSION['listeUtilisateurs'] = $utilisateurs;
        
        header("Location: confirmerReservation.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="reserverPack.css">
    <link href="icons/icons/css/icons.css" rel="stylesheet">
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
                    <option value="alger" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'ALGER') echo 'selected'; ?>>ALGIERS</option>
                    <option value="tlemcen" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'TLEMCEN') echo 'selected'; ?>>TLEMCEN</option>
                    <option value="oran" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'ORAN') echo 'selected'; ?>>ORAN</option>
                    <option value="constantine" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'CONSTANTINE') echo 'selected'; ?>>CONSTANTINE</option>
                    <option value="bejaia" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'BEJAIA') echo 'selected'; ?>>BEJAIA</option>
                    <option value="sahara" <?php if (isset($_GET['wilaya']) && $_GET['wilaya'] == 'SAHARA') echo 'selected'; ?>>SAHARA</option>
                </select>

                <label>Choose your pack option :</label>
                <select name="categorie" id="categorie" >
                    <option value="royal" <?php if (isset($_GET['categorie']) && $_GET['categorie'] == 'royal') echo 'selected'; ?>>ROYAL</option>
                    <option value="special" <?php if (isset($_GET['categorie']) && $_GET['categorie'] == 'special') echo 'selected'; ?>>SPECIAL</option>
                    <option value="normal" <?php if (isset($_GET['categorie']) && $_GET['categorie'] == 'normal') echo 'selected'; ?>>NORMAL</option>
                </select>

                <label>Choose your pack type :</label>
                <select name="type" id="type" >
                    <option value="FAMILY" <?php if (isset($_GET['type']) && $_GET['type'] == 'FAMILY') echo 'selected'; ?>>FAMILY</option>
                    <option value="ADULT" <?php if (isset($_GET['type']) && $_GET['type'] == 'ADULT') echo 'selected'; ?>>ADULT</option>
                    <option value="PERSONAL" <?php if (isset($_GET['type']) && $_GET['type'] == 'PERSONAL') echo 'selected'; ?>>PERSONAL</option>
                </select>

                <div>
                    <label>Choose your pack included options :</label>
                    <div class="includedOption">
                        <label class="checkbox-label">
                            <span class="checkbox-text">Accommodation</span>
                            <input type="checkbox" name="accommodation" value="accommodation" class="checkbox-input">
                        </label>
                        <label class="checkbox-label">
                            <span class="checkbox-text">Transportation</span>
                            <input type="checkbox" name="transportation" value="transportation" class="checkbox-input">
                        </label>
                        <label class="checkbox-label">
                            <span class="checkbox-text">Feeding</span>
                            <input type="checkbox" name="feeding" value="feeding" class="checkbox-input">
                        </label>
                    </div>
                </div>

                <?php
                    if (isset($_GET['wilaya'])) 
                    {
                        $wilaya = $_GET['wilaya'];
                        echo "  <script>
                                    document.getElementById('wilaya').disabled = true;
                                    document.getElementById('categorie').disabled = true;
                                    document.getElementById('type').disabled = true;
                                    document.getElementById('wilaya').value = ".$wilaya.";
                                </script>";
                    }
                ?>

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
                            <th>-12</th>
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
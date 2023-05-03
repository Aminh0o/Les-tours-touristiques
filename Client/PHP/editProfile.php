<?php
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    session_start();
    if( isset($_GET["id"]) && isset($_POST["update"]) )
    {
        $id_user = $_GET["id"];
        $update_query = "";
        $update_params = [];

        try 
        {
            if (isset($_POST["nomUtilisateur"]) && !empty($_POST["nomUtilisateur"])) 
            {
                $update_query .= "NOM = ?, ";
                $update_params[] = $_POST["nomUtilisateur"];
            }
            if (isset($_POST["prenomUtilisateur"]) && !empty($_POST["prenomUtilisateur"])) 
            {
                $update_query .= "PRENOM = ?, ";
                $update_params[] = $_POST["prenomUtilisateur"];
            }
            if (isset($_POST["dateNaissance"]) && !empty($_POST["dateNaissance"])) 
            {
                $update_query .= "DATE_DE_NAISSANCE = ?, ";
                $update_params[] = $_POST["dateNaissance"];
            }
            if (isset($_POST["telephone"]) && !empty($_POST["telephone"])) 
            {
                $update_query .= "TELEPHONE = ?, ";
                $update_params[] = $_POST["telephone"];
            }
            if (isset($_POST["email"]) && !empty($_POST["email"])) 
            {
                $update_query .= "EMAIL = ?, ";
                $update_params[] = $_POST["email"];
            }
            if (isset($_POST["confirm-password"]) && !empty($_POST["confirm-password"])) 
            {
                $update_query .= "MOT_DE_PASSE = ?, ";
                $update_params[] = $_POST["confirm-password"];
            }
            if(!empty($update_query))
            {
                $update_query = rtrim($update_query, ", ");
                $update_params[] = $id_user;
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
                $requette  = " UPDATE UTILISATEUR SET $update_query WHERE ID_UTILISATEUR = ? ";
                $resultat = $connexion->prepare($requette);
                $resultat->execute($update_params);
                header("location: InterfaceClient.php");
            }
        }
        catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signupClient.css">
    <title>Edit Profile</title>
</head>
<body>
    <header>
        <div class="sectionGauche">
          <a href="InterfaceClient.php"><img src="icons/logoo2.png" id="logo"></a>
        </div>
        <h1>Edit Profile</h1>
    </header>
    
    <form method="POST" class="form">
        <label>First Name :</label>
        <input type="text" size="20" name="nomUtilisateur" placeholder="Enter your new first name"><br>
  
        <label>Last Name :</label>
        <input type="text" size="20" name="prenomUtilisateur" placeholder="Enter your new last name"><br>
  
        <label>Birth Date :</label>
        <input type="date" name="dateNaissance"><br>

        <label>Phone Number :</label>
        <input type="number" name="telephone" size="10" placeholder="Enter your new telephone number"><br>
  
        <label>E-mail :</label>
        <input type="email" name="email" placeholder="Enter your new email address" ><br>
        
        <label for="password">New Password:</label>
        <input type="password" size="30" id="mot_de_passe1" name="password" placeholder="Enter your new password" oninput="verifier_mot_passe()"><br>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" size="30" id="mot_de_passe2" name="confirm-password" placeholder="Confirm your new password" oninput="verifier_mot_passe()"><br>
        
        <input type="submit" value="update" name="update" id="submit">
    </form>

    <script>
		function verifier_mot_passe()
		{
			var x,y; 
			x = document.getElementById("mot_de_passe1").value ; 
			y = document.getElementById("mot_de_passe2").value ; 
			if ((x == "" || y == "") || (x != y)) 
			{
				document.getElementById("mot_de_passe1").style.color="red";
				document.getElementById("mot_de_passe2").style.color="red";
				document.getElementById("submit").disabled=true;
			}
			else 
			{ 
				document.getElementById("mot_de_passe1").style.color="green"; 
				document.getElementById("mot_de_passe2").style.color="green";
				document.getElementById("submit").disabled=false;
			}	
		}
	</script>
    
</body>
</html>

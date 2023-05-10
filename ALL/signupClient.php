<?php
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    session_start();

    if (isset($_POST["submit"]))
    {
      $nom = $_POST["nomUtilisateur"];
      $prenom = $_POST["prenomUtilisateur"];
      $date = $_POST["dateNaissance"];
      $telephone = $_POST["telephone"];
      $email = $_POST["email"];
      $mdps1 = $_POST["mot_de_passe1"];
      $mdps2 = $_POST["mot_de_passe2"];

      try
      {
        if($nom && $prenom && $date && $telephone && $email && $mdps1 && $mdps2 )
        {
          if($mdps1 == $mdps2)
          {
            $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
            $requette=" INSERT INTO UTILISATEUR (`NOM`,`PRENOM`,`EMAIL`,`DATE_DE_NAISSANCE`,`TELEPHONE`,`MOT_DE_PASSE`) 
                        VALUES('$nom','$prenom','$email','$date','$telephone','$mdps2')";           
            $resultat = $connexion->exec($requette); 
            header("Location: login.php");
          }
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
  <title>Sign Up</title>
  <link rel="stylesheet" href="signupClient.css">
</head>
<body>
  <header>
    <div class="sectionGauche">
      <a href="InterfaceClient.php"><img src="icons/logoo2.png" id="logo"></a>
    </div>
    <h1>SIGN UP</h1>
  </header>

  <div>
    <form method="POST" class="form">
      <label>First Name :</label>
      <input type="text" size="20" name="nomUtilisateur" placeholder="Enter your first name" required><br>

      <label>Last Name :</label>
      <input type="text" size="20" name="prenomUtilisateur" placeholder="Enter your last name" required><br>

      <label>Birth Date :</label>
      <input type="date" name="dateNaissance"><br>

      <label>Phone Number :</label>
      <input type="number" name="telephone" size="10" placeholder="Enter your telephone number" required><br>

      <label>E-mail :</label>
      <input type="email" name="email" placeholder="Enter your email address" required><br>
      
      <label>Password :</label>
      <input type="password" size="30" id="mot_de_passe1" name="mot_de_passe1" placeholder="Enter your password" oninput="verifier_mot_passe()" required><br>
      <input type="password" size="30" id="mot_de_passe2" name="mot_de_passe2" placeholder="Re-enter your password" oninput="verifier_mot_passe()" required><br>

      <input type="submit" value="submit" name="submit" id="submit">
    </form>
  </div>

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
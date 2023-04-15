<?php
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    session_start();

    try{
        if(isset($_POST['email']) && isset($_POST['password'])) 
        {
            $email = $_POST["email"];
            $mdps = $_POST["password"];

            if($email && $mdps)
            {
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $resultat = $connexion->query("SELECT * FROM UTILISATEUR WHERE EMAIL='$email' AND MOT_DE_PASSE='$mdps' LIMIT 1");
                $utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);
                
                if($utilisateur)
                {
                    $_SESSION["utilisateur"] = $utilisateur;
                    $_SESSION["email"]= $utilisateur['EMAIL'];
                    $_SESSION['loggedIn'] = true;
                    header("Location: InterfaceClient.php");
                    exit();
                }
                else
                {
                    echo "Email ou mot de passe incorrect.";
                }
            }
            else
            {
                echo "Veuillez saisir votre email et mot de passe.";
            }
        }
    }
    catch (PDOException $e) 
    {
        echo "Erreur ! " . $e->getMessage() . "<br/>";
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="loginClient.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <form class="form" method="POST">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Submit">
        <p>Don't have an account ? <br>&nbsp;&nbsp;<a href="signupClient.html">Sign Up</a></p>
      </form>
</body>
</html>
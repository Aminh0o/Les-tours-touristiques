<?php
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    session_start();
    
    try
    {
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
                    $resultat = $connexion->query("SELECT * FROM ADMINISTRATEUR WHERE LOGIN_ADMIN='$email' AND MOT_DE_PASSE='$mdps' LIMIT 1");
                    $admin = $resultat->fetch(PDO::FETCH_ASSOC);
                    
                    if($admin)
                    {
                        $_SESSION["administrateur"] = $admin;
                        $_SESSION["email"]= $admin['LOGIN_ADMIN'];
                        header("Location: AdminPrincipal.php");
                        exit();
                    }
                    else
                    {
                        $resultat = $connexion->query("SELECT * FROM GUIDE WHERE LOGIN_GUIDE='$email' AND MOT_DE_PASSE='$mdps' LIMIT 1");
                        $guide = $resultat->fetch(PDO::FETCH_ASSOC);
                    
                    if($guide)
                    {
                        $_SESSION["GUIDE"] = $guide;
                        $_SESSION["email"]= $guide['LOGIN_GUIDE'];
                        header("Location: guide.html");
                        exit();
                    }
                    else
                    {
                        echo "Email ou mot de passe incorrect.";
                    }
                }
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <div class="sectionGauche">
            <a href="InterfaceClient.html"><img src="icons/logoo.png" id="logo"></a>
        </div>
        <h1>Login</h1>
    </header>
    <form class="form" method="POST">
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" required><br><br>
        
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Submit">
        <p>Don't have an account ? <br>&nbsp;&nbsp;<a href="signupClient.html">Sign Up</a></p>
      </form>
</body>
</html>
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
                    $_SESSION["mdps"]= $utilisateur['MOT_DE_PASSE'];
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
                        header("Location: AdminPrincipal.php#NavGestion2");
                        exit();
                    }
                    else
                    {
                        $resultat = $connexion->query("SELECT * FROM GUIDE WHERE LOGIN_GUIDE='$email' AND MOT_DE_PASSE='$mdps' LIMIT 1");
                        $guide = $resultat->fetch(PDO::FETCH_ASSOC);
                        
                        if($guide)
                        {
                            $_SESSION["GUIDE"] = $guide;
                            $_SESSION['loggedIn'] = true;
                            $_SESSION["email"]= $guide['LOGIN_GUIDE'];
                            header("Location: guide.php");
                            exit();
                        }
                        else
                        {
                            $resultat = $connexion->query("SELECT * FROM ADMIN_HEBERGEMENT WHERE LOGIN_ADMIN_HEBERG	='$email' AND MOT_DE_PASSE='$mdps' LIMIT 1");
                            $admin_heberg = $resultat->fetch(PDO::FETCH_ASSOC);
                    
                            if($admin_heberg)
                            {
                                $_SESSION["ADMIN_HEBERG"] = $admin_heberg;
                                $_SESSION['loggedIn'] = true;
                                $_SESSION["email"]= $admin_heberg['LOGIN_ADMIN_HEBERG'];
                                header("Location: adminHeberg.php");
                            }
                
                            else
                            {
                                $resultat = $connexion->query("SELECT * FROM ADMIN_TRANSPORT WHERE LOGIN_ADMIN_TRANSP	='$email' AND MOT_DE_PASSE='$mdps' LIMIT 1");
                                $admin_transp = $resultat->fetch(PDO::FETCH_ASSOC);
                        
                                if($admin_transp)
                                {
                                    $_SESSION["ADMIN_TRANSP"] = $admin_transp;
                                    $_SESSION['loggedIn'] = true;
                                    $_SESSION["email"]= $admin_transp['LOGIN_ADMIN_TRANSP'];
                                    header("Location: adminTransport.php");
                                }
                           
                                else
                                {
                                    $resultat = $connexion->query("SELECT * FROM ADMIN_RESTAURATION WHERE LOGIN_ADMIN_REST	='$email' AND MOT_DE_PASSE='$mdps' LIMIT 1");
                                    $admin_resto = $resultat->fetch(PDO::FETCH_ASSOC);
                        
                                    if($admin_resto)
                                    {
                                        $_SESSION["ADMIN_REST"] = $admin_resto;
                                        $_SESSION['loggedIn'] = true;
                                        $_SESSION["email"]= $admin_resto['LOGIN_ADMIN_REST'];
                                        header("Location: adminFood.php");
                                    }
                                    else
                                    {
                                        echo "  <script>
                                                    alert('Email ou mot de passe incorrect.');
                                                    window.location.href = 'login.php';
                                                </script>";
                                    }
                      
                                }
                    
                            }
                
                        }
            
                    }
        
                }
    
            }
            else
            {
                echo "  <script>
                            alert('Veuillez saisir votre email et mot de passe.');
                            window.location.href = 'login.php';
                        </script>";
            }
        }
    }
    catch (PDOException $e) {  echo "Erreur ! " . $e->getMessage() . "<br/>"; }   
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
            <a href="InterfaceClient.php"><img src="icons/logoo.png" id="logo"></a>
        </div>
        <h1>Login</h1>
    </header>
    <form class="form" method="POST">
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" required><br><br>
        
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Submit">
        <p>Don't have an account ? <br>&nbsp;&nbsp;<a href="signupClient.php">Sign Up</a></p>
      </form>
</body>
</html>
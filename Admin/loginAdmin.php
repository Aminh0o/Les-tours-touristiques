<?php
session_start();
$server="localhost";
$nom_bdd="essai";
$user="root";
$password="";

try{
    if(isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $mdps = $_POST['password'];
        
        if($login && $mdps)
        {
            $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
            $resultat = $connexion->query("SELECT * FROM ADMINISTRATEUR WHERE LOGIN_ADMIN='$login' AND MOT_DE_PASSE='$mdps' LIMIT 1");
            $admin = $resultat->fetch(PDO::FETCH_ASSOC);
            
            if($admin)
            {
                $_SESSION["administrateur"] = $admin;
                $_SESSION["login"]= $admin['LOGIN_ADMIN'];
        
                header("Location: AdminPrincipal.php");
                
            }
            else
            {
                echo "<script>alert('Email ou mot de passe incorrect.');
                window.location.href = 'loginAdmin.php';
                </script>";
            }
        }
        else
        {
            echo "<script>alert('Veuillez saisir votre email et mot de passe.');
            window.location.href = 'loginAdmin.php';
            </script>";
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
    <title>Interface Login-Admin</title>
    <link rel="stylesheet" href="loginAdmin.css">
</head>
<body>
    <header>
        <h1>LoginAdmin</h1>
    </header>
    <form method="POST"  id="form" class="form" >
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" placeholder="Enter your login " required><br><br>
        
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required><br><br>
        
        <input type="submit" name="submit" value="Authentification"  id="submit">
      </form>
      <script>
        var login = document.getElementById('login');
        var password= document.getElementById('password');
        var submitButton = document.getElementById('submit');

            submitButton.disabled = true;

        function checkInputs() {
    if (login.value.trim() !== '' && password.value.trim() !== '') {
             submitButton.disabled = false;
  }
   else {
        submitButton.disabled = true;
  }
}


login.addEventListener('input',checkInputs);
password.addEventListener('input',checkInputs);

      </script>
</body>
</html>
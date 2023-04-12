<?php

    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    $login = $_POST["login"];
    $mdps = $_POST["password"];
   
    try{
        if($login && $mdps)
        {
            $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
            $resultat = $connexion->query("SELECT * FROM ADMINISTRATEUR WHERE LOGIN_ADMIN='$login' AND MOT_DE_PASSE='$mdps' LIMIT 1");
            $admin = $resultat->fetch(PDO::FETCH_ASSOC);
            
            if($admin)
            {
                $_SESSION["administrateur"] = $admin;
                header("Location: AdminPrincipal.php");
                exit();
            }
            else
            {
                echo "<script>alert('Email ou mot de passe incorrect.');
                window.location.href = 'loginAdmin.html';
                </script>";
            }
        }
        else
        {
            echo "<script>alert('Veuillez saisir votre email et mot de passe.');
            window.location.href = 'loginAdmin.html';
            </script>";
        }
    }
    catch (PDOException $e) 
    {
        echo "Erreur ! " . $e->getMessage() . "<br/>";
    }
?>

<?php
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    $name = $_POST["text"];
    $mdps = $_POST["password"];
    session_start();

    try{
        if($email && $mdps)
        {
            $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
            $resultat = $connexion->query("SELECT * FROM GUIDE WHERE LOGIN_GUIDE='$name' AND MOT_DE_PASSE='$mdps' LIMIT 1");
            $guide = $resultat->fetch(PDO::FETCH_ASSOC);
            
            if($guide)
            {
                $_SESSION["GUIDE"] = $guide;
                header("Location: guide.html");
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
    catch (PDOException $e) 
    {
        echo "Erreur ! " . $e->getMessage() . "<br/>";
    }
?>

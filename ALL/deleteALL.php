<?php 
session_start();
$server="localhost";
        $nom_bdd="discoveralgeria";
        $user="root";
        $password="";
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        $req  = "DELETE FROM TOUR ";
        $connexion->query($req);
        header("location:cruds.php");
?>
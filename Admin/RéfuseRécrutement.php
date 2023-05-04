<?php
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    session_start();
    if(isset($_GET["id"]))
{
        $id_recrute = $_GET["id"];
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        $req  = "DELETE FROM RECRUTEMENT WHERE ID_RECRUTEMENT = '$id_recrute'";
        $connexion->query($req);
        header("location:gestionRecrutement.php");
}
?>
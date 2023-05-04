<?php
session_start();
$server="localhost";
        $nom_bdd="essai";
        $user="root";
        $password="";
if(isset($_GET["id"]))
{
        $id_avis = $_GET["id"];
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        $req  = "DELETE FROM AVIS WHERE ID_AVIS = '$id_avis'";
        $connexion->query($req);
     header("location:gestionAvis.php");
}
?>

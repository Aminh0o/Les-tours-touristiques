<?php
session_start();
$server="localhost";
        $nom_bdd="discoveralgeria";
        $user="root";
        $password="";
if(isset($_GET["id"]))
{
        $id_compte = $_GET["id"];
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        $req  = "DELETE FROM COMPTE WHERE ID_COMPTE = '$id_compte'";
        $connexion->query($req);
       header("location:gestionComptes.php");
}
?>

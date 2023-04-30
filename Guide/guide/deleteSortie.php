<?php 
session_start();
$server="localhost";
        $nom_bdd="essai";
        $user="root";
        $password="";
if(isset($_GET["id"]))
{
        $session_id = $_GET["id"];
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        $req  = "DELETE FROM TOUR WHERE ID_TOUR = '$session_id'";
        $connexion->query($req);
        header("location:cruds.php");
}
?>
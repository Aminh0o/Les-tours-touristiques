<?php
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    session_start();
    if(isset($_GET["id"]))
{
        $id_reservation = $_GET["id"];
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        $req  = "DELETE FROM RESERVATION WHERE ID_RESERVATION = '$id_reservation'";
        $connexion->query($req);
        header("location:gestionReservation.php");
}
?>

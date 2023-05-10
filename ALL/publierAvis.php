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
        $req  = "UPDATE AVIS SET ETAT='publie' WHERE ID_AVIS = '$id_avis'";
        $connexion->query($req);

        $req_id_user = "SELECT ID_USER FROM AVIS WHERE ID_AVIS = '$id_avis' ";
        $res_id_user = $connexion->query($req_id_user);
        $tuple_id_user = $res_id_user->fetch(PDO::FETCH_ASSOC);
        $id_user = $tuple_id_user["ID_USER"];

        $req_notif = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES (99,'$id_user','votre avis a été publier dans le site , Merci !!')";
        $connexion->query($req_notif);
        header("location:gestionAvis.php");
}
?>

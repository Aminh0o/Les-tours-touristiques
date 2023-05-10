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
    

    $req2 = "SELECT NOM_RECRUTEUR FROM RECRUTEMENT WHERE ID_RECRUTEMENT='$id_recrute' ";
    $res2 = $connexion->query($req2);
    $tuple2 = $res2->fetch(PDO::FETCH_ASSOC);
    $nom = $tuple2["NOM_RECRUTEUR"];

    $req3 = "SELECT ID_UTILISATEUR FROM UTILISATEUR WHERE NOM='$nom' ";
    $res3 = $connexion->query($req3);
    $tuple3 = $res3->fetch(PDO::FETCH_ASSOC);
    $id = $tuple3["ID_UTILISATEUR"];

    $req4 = "SELECT LOGIN_COMPTE,MOT_DE_PASSE FROM COMPTE WHERE NOM='$nom'";
    $res4 = $connexion->query($req4);
    $tuple4 = $res4->fetch(PDO::FETCH_ASSOC);
    $login = $tuple4["LOGIN_COMPTE"];
    $mdp = $tuple4["MOT_DE_PASSE"];


    $req_notif_accepter = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES 
    (99,'$id','your Recruitment request has been accepted , 
    here is your account : your_login:".$login.",your_password:".$mdp."')";
    $connexion->query($req_notif_accepter);

  
    header("location:AdminPrincipal.php");
}


?>
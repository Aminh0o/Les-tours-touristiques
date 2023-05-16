<?php
    $server="localhost";
    $nom_bdd="discoveralgeria";
    $user="root";
    $password="";
    session_start();
    if(isset($_GET["id"]))
  {
        $id_recrute = $_GET["id"];
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        $req  = "DELETE FROM RECRUTEMENT WHERE ID_RECRUTEMENT = '$id_recrute'";
        

        $req2 = "SELECT NOM_RECRUTEUR FROM RECRUTEMENT WHERE ID_RECRUTEMENT='$id_recrute' ";
        $res2 = $connexion->query($req2);
        $tuple2 = $res2->fetch(PDO::FETCH_ASSOC);
        $nom = $tuple2["NOM_RECRUTEUR"];

        $req3 = "SELECT ID_UTILISATEUR FROM UTILISATEUR WHERE NOM='$nom' ";
        $res3 = $connexion->query($req3);
        $tuple3 = $res3->fetch(PDO::FETCH_ASSOC);
        $id = $tuple3["ID_UTILISATEUR"];

        $req_notif_refu = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES (99,'$id','your recruitment request has been refused')";
        $connexion->query($req_notif_refu);

        $connexion->query($req);
        header("location:AdminPrincipal.php");
}
?>
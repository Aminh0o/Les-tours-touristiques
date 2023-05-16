<?php
    $server="localhost";
    $nom_bdd="discoveralgeria";
    $user="root";
    $password="";
    session_start();
    if(isset($_GET["id"]))
{
        $id_pack = $_GET["id"];
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        $req  = "DELETE FROM PACK WHERE NUMEROPACK = '$id_pack'";
        $connexion->query($req);
        header("location:gestionPack.php");
}
?>

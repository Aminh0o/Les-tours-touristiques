<?php
$server="localhost";
$nom_bdd="essai";
$user="root";
$password="";
$namePack = $_POST["nomPack"];
$categorie = $_POST["catégorie"];
$wilaya = $_POST["wilaya"];
$place = $_POST["places"];
$prixPack = $_POST["prixPack"];
$dateExpiration = $_POST["dateExpiration"];
session_start();

try{
    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
    if($wilaya == 13)
        $wilaya = "TLEMCEN";
    else if($wilaya == 16)
        $wilaya = "ALGER";
    else if($wilaya == 31)
        $wilaya = "ORAN";
     else if($wilaya == 06)
        $wilaya = "BEJAIA";
      else if($wilaya == 25)
        $wilaya = "CONSTANTINE";
    if(isset($wilaya) && isset($categorie) && isset($prixPack) && !empty($prixPack))
    {
    $res = "INSERT INTO PACK (CATEGORIE,WILAYA,PRIX) VALUES
    ('$categorie','$wilaya','$prixPack') ";
    $connexion->exec($res);
    echo "<script> alert('un nouveau pack a été crée ')
    window.location.href = 'gestionPack.php';
    </script>";
    }
    else
    {
        echo "<script> alert('échec de création de pack ')
    window.location.href = 'créationPack.html';
    </script>";
    }
    
}
catch (PDOException $e) 
{
    echo "Erreur ! " . $e->getMessage() . "<br/>";
}

?>
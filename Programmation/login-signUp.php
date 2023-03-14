<?php
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    $nom = $_POST["nomUtilisateur"];
    $prenom = $_POST["prenomUtilisateur"];
    $date = $_POST["dateNaissance"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $mdps1 = $_POST["mot_de_passe1"];
    $mdps2 = $_POST["mot_de_passe2"];
session_start();
try{
if($nom && $prenom && $date && $telephone && $email && $mdps1 && $mdps2 )
{
    if($mdps1 == $mdps2)
    {
    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);

    $requette="INSERT INTO UTILISATEUR (`ID_UTILISATEUR`,`ID_EMETTEUR`,`NOM`,`PRENOM`,`EMAIL`,`DATE_DE_NAISSANCE`,`TELEPHONE`,`MOT_DE_PASSE`) 
    VALUES('1','1','$nom','$prenom','$email','$date','$telephone','$mdps2')";
    $resultat = $connexion->exec($requette);     
    echo "<h1>bsa7tek hbibi</h1>";
    echo "<a href='InterfaceClient.php'>nwaliw l'interface hna jpns</a>";
    }
    else echo "saged l mot de passe";
}
else echo"invalide";
}
catch (PDOException $e) 
{
    echo "Erreur ! " . $e->getMessage() . "<br/>";
}
?>

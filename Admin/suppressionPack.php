<?php
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
    $numeroPack = $_POST["NumeroPack"];
    session_start();
    try{
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);

        if(isset($numeroPack)){
            $req = "DELETE FROM PACK WHERE NUMEROPACK = '$numeroPack' ";
            $res = $connexion->exec($req);
            if($res){
               
                echo "<script> alert('Le pack $numeroPack a éte supprimer')
                window.location.href = 'gestionPack.php';
                </script>";
                         }
            else{
               
                echo "<script>alert('Le pack n\\'existe pas dans la base de données.');
                window.location.href = 'suppressionPack.html';
                </script>";
               
            }
        }
        else{
            echo "<script>alert('Veuillez fournir un numéro de pack valide.');
            window.location.href = 'suppressionPack.html';
            </script>";
        }
    }
    catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
?>

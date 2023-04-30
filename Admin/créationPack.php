<?php
session_start();
$server="localhost";
$nom_bdd="essai";
$user="root";
$password="";

/**/
try{
    if(isset($_POST['nomPack']) && isset($_POST['catégorie']) && isset($_POST['wilaya']) && isset($_POST['prixPack']) && !empty($_POST['prixPack']))
    {
        $namePack = $_POST["nomPack"];
        $categorie = $_POST["catégorie"];
        $wilaya = $_POST["wilaya"];
        $prixPack = $_POST["prixPack"];
        $dateCreation = $_POST["dateCréation"];
        $dateExpiration = $_POST["dateExpiration"];
        $typePack = $_POST["typePack"];
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

    if($typePack=="ADULT")
        $typePack = "ADULT";
    else if($typePack=="FAMILY")
        $typePack = "FAMILY";
    else
    $typePack = "PERSONAL";

    if(isset($_POST["hebergement"]) ){$_SESSION["heberg"] = "Included";$_SESSION["nomPack"] = $_POST["nomPack"];  }
    if(isset($_POST["transport"]) ){$_SESSION["transpo"] = "Included";$_SESSION["nomPack"] = $_POST["nomPack"];  }
    if(isset($_POST["feeding"]) ){$_SESSION["food"] = "Included";$_SESSION["nomPack"] = $_POST["nomPack"];  }
    if(isset($_POST["guide"]) ){$_SESSION["guide"] = "Included";$_SESSION["nomPack"] = $_POST["nomPack"];  }
   

    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);

    /*$ID_user = "SELECT ID_UTILISATEUR FROM UTILISATEUR WHERE EMAIL = 'amine.bhr@gmail.com' ";
    $resultat_id_recp = $connexion->query($ID_user);
    $id_user =  $resultat_id_recp->fetch(PDO::FETCH_ASSOC);
    $id_utilisateur = $id_user["ID_UTILISATEUR"];*/

   /* $ID_admin = "SELECT ID_ADMIN FROM ADMINISTRATEUR WHERE LOGIN_ADMIN = 'mohamed2023' ";
    $resultat_id_emet = $connexion->query($ID_admin);
    $id_admin = $resultat_id_emet->fetch(PDO::FETCH_ASSOC);
    $id_administrateur = $id_admin["ID_ADMIN"];*/

   
    $res = "INSERT INTO PACK (NOMPACK,DATE_CREATION,CATEGORIE,WILAYA,TYPE_PACK,PRIX) VALUES
    ('$namePack','$dateCreation','$categorie','$wilaya','$typePack','$prixPack') ";
    $connexion->exec($res);

    /*$notif1 = "INSERT INTO NOTIF (ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES
     ('$id_administrateur','$id_utilisateur','Un Nouveau pack a été ajouter dans le site')";
    $connexion->exec($notif1);*/
    echo "<script> alert('un nouveau pack a été crée ')
    window.location.href = 'gestionPack.php';
    </script>";
    
 }
}
catch (PDOException $e) 
{
    echo "Erreur ! " . $e->getMessage() . "<br/>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="créationPack.css">
    <title>PACK - Création</title>
</head>
<body>
  <header>
    <h1>Création du PACK</h1>
  </header>
    <div>
        <form   method="POST" id="form" class="form">
          <label>Name</label>
          <input type="text" size="20" name="nomPack" placeholder="Enter name of pack" required><br>
    
          <label>Category</label>
          <select name="catégorie" id="pack" required>
                <option value="normal">NORMAL</option>
                <option value="special">SPECIAL</option>
                <option value="royal">ROYAL</option>
          </select>
          
          <label>Date de Création</label>
          <input type="date" name="dateCréation" id="dateCréation">

          <label>Date d'expiration</label>
          <input type="date" name="dateExpiration" id="dateExpiration">
    
          <label>Wilaya</label>
          <select name="wilaya" id="wilaya" required>
            <option value="13">TLEMCEN</option>
            <option value="31">ORAN</option>
            <option value="16">ALGER</option>
            <option value="25"> CONSTANTINE</option>
            <option value="06">BEJAIA</option>
            <option value="sahara">SAHARA</option>
      </select>

        <label>Type Pack</label>
        <input type="radio" name="typePack" value="ADULT" checked>  ADULT
        <input type="radio" name="typePack" value="FAMILY">         FAMILY
        <input type="radio" name="typePack" value="PERSONAL">       PERSONAL
      
      <label>Pack Options</label>
      <input type="checkbox" name="hebergement"> hebergement
      <input type="checkbox" name="transport">  transport
      <input type="checkbox" name="feeding" >   feeding
      <input type="checkbox" name="guide" >    guide
      


     
        
       <label>Price</label>
        <input type="number" name="prixPack" ><br>
        <input type="submit"  value="Crée" name="submit" id="submit">
          
        </form>
   
      </div>
      
      <script>
       /* var compteur = 1;
    function ajouterInput()
    {
        var nvInput = document.createElement("input");
        var frere = document.getElementById("AddPlace");
            nvInput.type = "text";
            nvInput.placeholder = "Enter other places";
            nvInput.name = "place" + compteur;
             compteur++;

        var nvPlace = document.getElementById("form");
        nvPlace.appendChild(nvInput);
        nvPlace.insertBefore(nvInput,frere);
     
    }*/
      </script>
</body>
</html>


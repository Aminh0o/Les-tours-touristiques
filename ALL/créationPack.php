<?php
session_start();
$server="localhost";
$nom_bdd="discoveralgeria";
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
      else{
          $wilaya = "SAHARA";
        }

    if($typePack=="ADULT")
        $typePack = "ADULT";
    else if($typePack=="FAMILY")
        $typePack = "FAMILY";
    else
    $typePack = "PERSONAL";

 
  
    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);

    
    $res = "INSERT INTO PACK (NOMPACK,DATE_CREATION,CATEGORIE,WILAYA,TYPE_PACK,PRIX,DATE_EXPIRATION) VALUES
    ('$namePack','$dateCreation','$categorie','$wilaya','$typePack','$prixPack','$dateExpiration') ";
    $connexion->exec($res);

    $id_pack = $connexion->lastInsertId();

    $req_admin = "UPDATE ADMINISTRATEUR SET NUMEROPACK='$id_pack' ";
    $connexion->exec($req_admin);

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
  <?php echo "<a href='gestionPack.php'><img src='icons/Logoo2.png' id='logo'></a>"; ?>
  
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
      
  
              
       <label>Price</label>
        <input type="number" name="prixPack" ><br>
        <input type="submit"  value="Crée" name="submit" id="submit">
          
        </form>
   
      </div>
      
</body>
</html>


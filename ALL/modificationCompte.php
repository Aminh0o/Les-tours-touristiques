<?php
session_start();
$server="localhost";
$nom_bdd="discoveralgeria";
$user="root";
$password="";
if(isset($_GET["id"]) && isset($_POST["update"])){
    $id_Compte = $_GET["id"]; 
    $update_query = "";
    $update_params = [];
    if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
        $update_query .= "NOM = ?, ";
        $update_params[] = $_POST["nom"];
    }
    if (isset($_POST["login"]) && !empty($_POST["login"])) {
        $update_query .= "LOGIN_COMPTE = ?, ";
        $update_params[] = $_POST["login"];
    }
  
    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $update_query .= "MOT_DE_PASSE = ?, ";
        $update_params[] = $_POST["password"];
    }
   if(!empty($update_query))
   {
    $update_query = rtrim($update_query, ", ");
    $update_params[] = $id_Compte;
    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
    $req  = "UPDATE COMPTE SET $update_query WHERE ID_COMPTE = ?";
    $stmt = $connexion->prepare($req);
    $stmt->execute($update_params);
    header("location:gestionComptes.php");
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="créationPack.css">
    <title>Compte - Modification</title>
</head>
<body>
  <header>
    <h1>Modification du Compte</h1>
  </header>
  <?php echo "<a href='gestionComptes.php'><img src='icons/Logoo2.png' id='logo'></a>"; ?>
    <div>
        <form method="POST" id="form" class="form">
          <label>First Name</label>
          <input type="text" size="20" name="nom" placeholder="Enter first name" ><br>



          <label>Login</label>
          <input type="text" size="20" name="login" placeholder="Enter login" ><br>

          <label>passsword</label>
          <input type="text" size="20" name="password" placeholder="Enter password" ><br>
    
         
        <input type="submit"  value="update" name="update" id="submit">
          
        </form>
   
      </div>
      
</body>
</html>
<?php
session_start();
$server="localhost";
$nom_bdd="discoveralgeria";
$user="root";
$password="";
if(isset($_POST["submit"]))
{
    $nom = $_POST["nom"];
    $prenom = $_POST["prénom"];
    $role = $_POST["role"];
    $login = $_POST["login"];
    $mdps = $_POST["password"];
    try{
    if($role == "guide"){
        
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);

        $table_guide = "INSERT INTO GUIDE (NOM,PRENOM,LOGIN_GUIDE,MOT_DE_PASSE) VALUES ('$nom','$prenom','$login','$mdps')";
        $connexion->exec($table_guide);

        $id_guide = $connexion->lastInsertId();

        $table_compte = "INSERT INTO COMPTE (NOM,LOGIN_COMPTE,MOT_DE_PASSE) VALUES ('$nom','$login','$mdps')";
        $connexion->exec($table_compte);

        $id_compte = $connexion->lastInsertId();

        $table_possede = "INSERT INTO POSSEDE(ID_GUIDE,ID_COMPTE) VALUES ('$id_guide','$id_compte')";
        $connexion->exec($table_possede);

        
    } 
    else if($role == "admin_heberg"){
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);

        $table_admin_heberg = "INSERT INTO ADMIN_HEBERGEMENT (NOM,PRENOM,LOGIN_ADMIN_HEBERG,MOT_DE_PASSE) VALUES ('$nom','$prenom','$login','$mdps')";
        $connexion->exec($table_admin_heberg);

        $id_admin_heberg = $connexion->lastInsertId();

        $table_compte = "INSERT INTO COMPTE (NOM,LOGIN_COMPTE,MOT_DE_PASSE) VALUES ('$nom','$login','$mdps')";
        $connexion->exec($table_compte);

        $id_compte = $connexion->lastInsertId();

        $table_possede = "INSERT INTO POSSEDE(ID_ADMIN_HEBERG,ID_COMPTE) VALUES ('$id_admin_heberg','$id_compte')";
        $connexion->exec($table_possede);
    }
    else if($role == "admin_transpo"){
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);

        $table_admin_transpo = "INSERT INTO ADMIN_TRANSPORT (NOM,PRENOM,LOGIN_ADMIN_TRANSP,MOT_DE_PASSE) VALUES ('$nom','$prenom','$login','$mdps')";
        $connexion->exec($table_admin_transpo);

        $id_admin_transp = $connexion->lastInsertId();

        $table_compte = "INSERT INTO COMPTE (NOM,LOGIN_COMPTE,MOT_DE_PASSE) VALUES ('$nom','$login','$mdps')";
        $connexion->exec($table_compte);

        $id_compte = $connexion->lastInsertId();

        $table_possede = "INSERT INTO POSSEDE(ID_ADMIN_HEBERG,ID_COMPTE) VALUES ('$id_admin_transp','$id_compte')";
        $connexion->exec($table_possede);

        
    }
   else{
    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);

    $table_admin_rest = "INSERT INTO ADMIN_RESTAURATION (NOM,PRENOM,LOGIN_ADMIN_REST,MOT_DE_PASSE) VALUES ('$nom','$prenom','$login','$mdps')";
    $connexion->exec($table_admin_rest);

    $id_admin_rest = $connexion->lastInsertId();

    $table_compte = "INSERT INTO COMPTE (NOM,LOGIN_COMPTE,MOT_DE_PASSE) VALUES ('$nom','$login','$mdps')";
    $connexion->exec($table_compte);

    $id_compte = $connexion->lastInsertId();

    $table_possede = "INSERT INTO POSSEDE(ID_ADMIN_HEBERG,ID_COMPTE) VALUES ('$id_admin_rest','$id_compte')";
    $connexion->exec($table_possede);

   }

  }
  catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>";}
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="créationPack.css">
    <title>Compte - Création</title>
</head>
<body>
  <header>
    <h1>Création du Compte</h1>
  </header>
  <?php echo "<a href='gestionRecrutement.php'><img src='icons/Logoo2.png' id='logo'></a>"; ?>
    <div>
        <form method="POST" id="form" class="form">
          <label>First Name</label>
          <input type="text" size="20" name="nom" placeholder="Enter first name" required><br>

          <label>last Name</label>
          <input type="text" size="20" name="prénom" placeholder="Enter last name" required><br>

          <label>Role</label>
          <select name="role" id="pack" required>
                <option value="guide">GUIDE</option>
                <option value="admin_heberg">ADMIN_HEBERG</option>
                <option value="admin_transpo">ADMIN_TRANSPO</option>
                <option value="admin_resto">ADMIN_RESTO</option>
          </select>

          <label>Login</label>
          <input type="text" size="20" name="login" placeholder="Enter login" required><br>

          <label>passsword</label>
          <input type="text" size="20" name="password" placeholder="Enter password" required><br>
    
         
        <input type="submit"  value="Crée" name="submit" id="submit">
          
        </form>
   
      </div>
      
</body>
</html>
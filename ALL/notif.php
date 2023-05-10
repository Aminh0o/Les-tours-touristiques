<?php
$server = "localhost";
$nom_bdd = "essai";
$user = "root";
$password = "";

if(isset($_POST["buttonSend"]))
{
   $nom_recepteur = $_POST["recepteur"];
   $message = $_POST["messageNotif"];

   try{
      $id_emetteur = $_GET["id"];
      $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
   
      
          $req_notif_admin = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES ('$id_emetteur',99,'$message')";
          $connexion->exec($req_notif_admin);

   } catch (PDOException $e){echo "Erreur ! " . $e->getMessage() . "<br/>";}
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Notifications</title>
      <link rel="stylesheet" href="notif.css">
      <link href="icons/icons/css/icons.css" rel="stylesheet">
   </head>
   <body>
      <div>
      <?php 
      if($_GET["id"]==299)
          echo "<a href='adminHeberg.php'><img src='icons/logoo1.png' id='logo'></a>"; 
      else if($_GET["id"]==199)
          echo "<a href='adminTransport.php'><img src='icons/logoo1.png' id='logo'></a>"; 
      else if($_GET["id"]==399)
          echo "<a href='adminFood.php'><img src='icons/logoo1.png' id='logo'></a>"; 
      ?>
       </div>
      <div class="wrapper">
         <div class="title">
           <span class="fi-sr-bell-ring" class="img-item"></span>
         </div>
         <form method="post">
            <div class="field">
               <input type="text" name="recepteur" required>
               <label>TO</label>
            </div>

           
  
            <div class="field">
                <textarea name="messageNotif" ></textarea>
                <label>Message</label>
            </div>
            <div class="field">
               <input type="submit" id="buttonSend" name="buttonSend" value="Send"></input>
            </div>                    
         </form>
      </div>
   </body>
</html>
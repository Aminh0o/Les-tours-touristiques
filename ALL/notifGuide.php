<?php
$server = "localhost";
$nom_bdd = "essai";
$user = "root";
$password = "";

if(isset($_POST["buttonSend"]))
{
   $nom_recepteur = $_POST["recepteur"];
   $message = $_POST["messageNotif"];
   $role = $_POST["role"];

   try{
      
      $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
      if($role == "user")
      {
        $req_id_user = "SELECT ID_UTILISATEUR FROM UTILISATEUR WHERE NOM='$nom_recepteur' ";
        $res_id_user = $connexion->query( $req_id_user);
        $tuple_id_user =  $res_id_user->fetch(PDO::FETCH_ASSOC);
        $id_user =  $tuple_id_user["ID_UTILISATEUR"];
        
        $req_notif_user = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES (999,'$id_user','$message')";
        $connexion->exec($req_notif_user);}

        else {
         $req_notif_admin = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES (999,99,'$message')";
         $connexion->exec($req_notif_admin);
        }

   
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
   <style>
      .wrapper{height: 130%;}
   </style>
   <body>
      <div>
         <a href="guide.php"><img src="icons/logoo1.png" id="logo"></a>
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
               <select name="role" >
                  <option value="user">USER</option>
                  <option value="admin">ADMINISTRATEUR</option>
               </select>
            </div>

            <div class="field">
               <select id="message-select">
                  <option value="">Choisir un message</option>
                  <option value="message1">Contact user</option>
                  <option value="message2">for ADMINISTRATEUR</option>
               </select>
            </div>
            
            <div class="field">
               <textarea name="messageNotif" id="message-textarea"></textarea>
               <label>Message</label>
            </div>
            
            <div class="field">
               <input type="submit" id="buttonSend" name="buttonSend" value="Send"></input>
            </div>                    
         </form>
      </div>
      <script>
         var choisirElement = document.getElementById('message-select');
         var textareaElement = document.getElementById('message-textarea');
         
         choisirElement.addEventListener('change', function() 
         {
            var selectedValue = choisirElement.value;
            if (selectedValue === 'message1') 
            { textareaElement.value = 'Good Morning Mr. ,I am your guide Bouguern, your Tour is organized at   and the Departure time will be:  and Return time will be:  '; } 
            else if (selectedValue === 'message2') { textareaElement.value = 'the Message was sent to the user'; } 
           
         });
      </script>
   </body>
</html>
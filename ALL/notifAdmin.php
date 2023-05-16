<?php
$server = "localhost";
$nom_bdd = "discoveralgeria";
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
          
         

          $req_notif_user = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES (99,'$id_user','$message')";
          $connexion->exec($req_notif_user);

         }
       else if($role == "guide")
        {
            $req_id_guide = "SELECT ID_GUIDE FROM GUIDE WHERE NOM='$nom_recepteur' ";
            $res_id_guide = $connexion->query($req_id_guide);
            $tuple_id_guide = $res_id_guide->fetch(PDO::FETCH_ASSOC);
            $id_guide = $tuple_id_guide["ID_GUIDE"];

            $req_notif_guide = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES (99,'$id_guide','$message')";
            $connexion->exec($req_notif_guide);

            $id_notif = $connexion->lastInsertId();

            $updt_guide = "UPDATE GUIDE SET ID_NOTIF='$id_notif' ";
            $connexion->exec($updt_guide);
            
        }

      else if($role == "admin_transp")
       {
         $req_id_admin_tranp = "SELECT ID_ADMIN_TRANSP FROM ADMIN_TRANSPORT WHERE NOM='$nom_recepteur' ";
         $res_id_admin_tranp = $connexion->query($req_id_admin_tranp);
         $tuple_id_admin_trasnp = $res_id_admin_tranp->fetch(PDO::FETCH_ASSOC);
         $id_admin_trasnp = $tuple_id_admin_trasnp["ID_ADMIN_TRANSP"];

         $req_notif_admin_transp = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES (99,'$id_admin_trasnp','$message')";
         $connexion->exec($req_notif_admin_transp);
       }
     else if($role == "admin_heberg")
      {
        $req_id_admin_heberg = "SELECT ID_ADMIN_HEBERG FROM ADMIN_HEBERGEMENT WHERE NOM='$nom_recepteur' ";
        $res_id_admin_heberg = $connexion->query($req_id_admin_heberg);
        $tuple_id_admin_heberg = $res_id_admin_heberg->fetch(PDO::FETCH_ASSOC);
        $id_admin_heberg = $tuple_id_admin_heberg["ID_ADMIN_HEBERG"];

        $req_notif_admin_heberg = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES (99,'$id_admin_heberg','$message') ";
        $connexion->exec($req_notif_admin_heberg);
      }
     else
     {
        $req_id_admin_rest = "SELECT ID_ADMIN_REST FROM ADMIN_RESTAURATION WHERE NOM='$nom_recepteur' ";
        $res_id_admin_rest = $connexion->query($req_id_admin_rest);
        $tuple_id_admin_rest = $res_id_admin_rest->fetch(PDO::FETCH_ASSOC);
        $id_admin_rest = $tuple_id_admin_rest["ID_ADMIN_REST"];

        $req_notif_admin_rest = "INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES (99,'$id_admin_rest','$message')";
        $connexion->exec($req_notif_admin_rest);
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
   <body>
      <div>
         <a href="AdminPrincipal.php"><img src="icons/logoo1.png" id="logo"></a>
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
                  <option value="guide">GUIDE</option>
                  <option value="admin_transp">ADMIN_TRANSPORT</option>
                  <option value="admin_heberg">ADMIN_HEBERGEMENT</option>
                  <option value="admin_rest">ADMIN_RESTAURATION</option>
               </select>
            </div>

            <div class="field">
               <select id="message-select">
                  <option value="">Choisir un message</option>
                  <option value="message1">reservation accepté</option>
                  <option value="message2">pour guide</option>
                  <option value="message3">pour l'admin d'hebergement</option>
                  <option value="message4">pour l'admin de nourriture</option>
                  <option value="message5">pour l'admin de transport</option>
              
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
            { textareaElement.value = 'Hello Mr () your reservation of Pack in { } is accepted, the guide: ( ) will send you the informations of your tour planning'; } 
            else if (selectedValue === 'message2') 
            { textareaElement.value = 'Monsieur le guide (), voila les données de la réservation du pack () au wilaya (), votre groupe est :\n1-\n2-\n3-\n4-'; } 
            else if (selectedValue === 'message3') 
            { textareaElement.value = 'vérifier si les heberegements sont disponible pour la reservation de pack () au wilaya ()';} 
            else if (selectedValue === 'message4') 
            { textareaElement.value = 'vérifier si les restos sont disponible pour la reservation de pack () au wilaya ()';} 
            else if (selectedValue === 'message5') 
            { textareaElement.value = 'vérifier si les transports sont disponible pour la reservation de pack () au wilaya ()';} 
           
            else { textareaElement.value = ''; }
         });
      </script>
   </body>
</html>
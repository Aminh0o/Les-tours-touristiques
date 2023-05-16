<?php
    $server="localhost";
    $nom_bdd="discoveralgeria";
    $user="root";
    $password="";
    session_start();
    if(isset($_POST["submit"]))
    {
      $name = $_POST["nom_recrute"];
      $gender = $_POST["gender"];
      $cv = $_POST["CV"];
      $date_envoi = date("Y-m-d");
      try
      {
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        if($gender=="male"){
            $gender="male";
        }
        else{
            $gender="female";
        }
     $id_user = $_SESSION["id_user"];

     $admin = "SELECT ID_ADMIN FROM ADMINISTRATEUR";
     $res_admin = $connexion->query($admin);
     $id_admin = $res_admin->fetch(PDO::FETCH_ASSOC);
     $id_recepteur = $id_admin['ID_ADMIN'];
     
        $req="INSERT INTO RECRUTEMENT (NOM_RECRUTEUR,GENDER,DATE_DE_ENVOI,CV) VALUES ('$name','$gender','$date_envoi','$cv')";
        $connexion->exec($req);

        $id_recrutement = $connexion->lastInsertId();

  
        $req2 = "INSERT INTO NOTIF (ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF) VALUES ('$id_user','$id_recepteur','une demande de recrutement envoyer par user ".$id_user."')";
        $connexion->exec($req2);
       
        $id_emetteur = $connexion->lastInsertId();

        $req4 = "INSERT INTO DEMANDER(ID_UTILISATEUR,ID_RECRUTEMENT) VALUES ('$id_user','$id_recrutement')";
        $connexion->exec($req4);

        $req3 = "UPDATE ADMINISTRATEUR SET ID_NOTIF='$id_emetteur' , ID_RECRUTEMENT='$id_recrutement' ";
        $connexion->exec($req3);
                
        echo "<script> alert('Your request was send')
        window.location.href = 'InterfaceClient.php';
      </script>";
    }
    catch (PDOException $e) 
    {
        echo "Erreur ! " . $e->getMessage() . "<br/>";
    }
}
?>
<!DOCTYPE html>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="recrute.css" />
    <title>RECRUTEMENT</title>
  </head>
  <body>
    <section class="container">
      <header>WELCOME</header>
      <form  method="post" class="form">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name"  name="nom_recrute"required />
        </div>
        <!--
        <div class="input-box">
          <label>Email Address</label>
          <input type="text" placeholder="Enter email address" required />
        </div>
        -->
        <div class="column">

         
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" placeholder="Enter phone number" required />
          </div> 
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">


            <div class="gender">
              <input type="radio" id="check-male" name="gender" value= "male" checked />
              <label for="check-male">male</label>
            </div>


            <div class="gender">
              <input type="radio" id="check-female" value="female" name="gender" />
              <label for="check-female">Female</label>
            </div>

          </div>

        </div>
        <div >
          
          <div class="column">
            <div class="select-box">
              <select>
                <option hidden>Wilaya</option>
                <option>Algiers</option>
                <option>Tlemcen</option>
                <option>Oran</option>
                <option>Constantine</option>
                <option>Béjaïa</option>
                <option>Sahara</option>
              </select>
            </div>
          </div>
          <div class="column">
            <div class="custom-file-upload">
              <label for="mon_fichier">Send your CV :</label>
              <input type="file" id="mon_fichier" name="CV" accept=".pdf,.docx,.png,.jpeg">

            </div>
          </div>
        </div>

        <button name="submit">Submit</button>
      </form>
    </section>
  </body>
</html>


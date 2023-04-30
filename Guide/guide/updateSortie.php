<?php 
session_start();
$server="localhost";
        $nom_bdd="essai";
        $user="root";
        $password="";
if(isset($_GET["id"]) && isset($_POST["update"])){
        $idTour = $_GET["id"]; 
        $update_query = "";
        $update_params = [];
        if(isset($_POST["nomTour"]) && !empty($_POST["nomTour"]))
        {
            $update_query .= "NOMTOUR = ?, ";
            $update_params[] = $_POST["nomTour"];
        }
        if(isset($_POST["dateTour"]) && !empty($_POST["dateTour"]))
        {
            $update_query .= "DATE_TOUR = ?, ";
            $update_params[] = $_POST["dateTour"];
        }
        if(isset($_POST["wilaya"]) && !empty($_POST["wilaya"]))
        {
            $update_query .= "WILAYA = ?, ";
            $update_params[] = $_POST["wilaya"];
        }
        if(isset($_POST["place"]) && !empty($_POST["place"]))
        {
            $update_query .= "PLACE = ?, ";
            $update_params[] = $_POST["place"];
        }
        if(isset($_POST["heurDepart"]) && !empty($_POST["heurDepart"]))
        {
            $update_query .= "HEURE_DEPART = ?, ";
            $update_params[] = $_POST["heurDepart"];
        }

        if(isset($_POST["heurArrive"]) && !empty($_POST["heurArrive"]))
        {
            $update_query .= "HEURE_ARRIVE = ?, ";
            $update_params[] = $_POST["heurArrive"];
        }

        if(isset($_POST["category"]) && !empty($_POST["category"]))
        {
            $update_query .= "CATEGORIE = ?, ";
            $update_params[] = $_POST["category"];
        }
       if(!empty($update_query))
       {
        $update_query = rtrim($update_query, ", ");
        $update_params[] = $idTour;
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        $req  = "UPDATE TOUR SET $update_query WHERE ID_TOUR = ?";
        $stmt = $connexion->prepare($req);
        $stmt->execute($update_params);
        header("location:cruds.php");
    }
}
?>
 <!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8" />
        <title>Oragniser Une Sortie</title>
        <link rel="stylesheet" href="cruds.css" />
  
  </head>
  <body>
    
<form  method="post">
      <div class="inputs">
      <input placeholder="title" type="text" id="title" name="nomTour">
        <div class="plan">
          <input type="date" id="date" name="dateTour" >
          <input  placeholder="Wilaya" type="text" id="wilaya"name="wilaya">
          <input  placeholder="Place 1" type="text" id="place1"name="place">
          <input type="time" id="heur_depart" name="heurDepart">
          <input type="time" id="heur_arrive" name="heurArrive">
        </div>
        
        <input placeholder="category" type="text" id="category" name="category">
        <button id="submit" name="update">Update</button>
   


      </div>
      </form>
      
    </body>
</html>
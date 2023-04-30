
<?php
session_start();

   
try
    {
      
      function showData(){

        $server="localhost";
        $nom_bdd="essai";
        $user="root";
        $password="";
        
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
        if(isset($_POST["submit"])) {
          $nomTour = $_POST['nomTour'];
          $dateTour = $_POST['dateTour'];
          $wilaya = $_POST['wilaya'];
          $place = $_POST['place'];
          $heure_depart = $_POST['heurDepart'];
          $heure_arrive = $_POST['heurArrive'];
          $category = $_POST['category'];
       
        $req= "INSERT INTO TOUR (NOMTOUR,DATE_TOUR,	WILAYA,PLACE,HEURE_DEPART,HEURE_ARRIVE,CATEGORIE) VALUES ('$nomTour','$dateTour','$wilaya','$place','$heure_depart','$heure_arrive','$category')";
        $connexion->exec($req); }
        
      
         $req1= "SELECT * FROM TOUR";
         $res=$connexion->query($req1);
         while($row=$res->fetch(PDO::FETCH_ASSOC)){
          echo" 
          <tr>
            <td>".$row["ID_TOUR"]."</td>
            <td>".$row["NOMTOUR"]."</td>
            <td>".$row["DATE_TOUR"]."</td>
            <td>".$row['WILAYA']."</td>
            <td>".$row['PLACE']."</td>
            <td>".$row['HEURE_DEPART']."</td>
            <td>".$row['HEURE_ARRIVE']."</td>
            <td>".$row['CATEGORIE']."</td>
            <td><a href='updateSortie.php?id=".$row["ID_TOUR"]."'><button id='update' name='update'>update</button></a></td>
            <td><a href='deleteSortie.php?id=".$row["ID_TOUR"]."'><button id='delete'>delete</button></a></td>
          </tr>
        ";
       
      }
      
    
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
        <meta charset="UTF-8" />
        <title>Oragniser Une Sortie</title>
        <link rel="stylesheet" href="cruds.css" />
  
  </head>

  <body>

    <div class="cruds">

      <div class="heade">
       
        <h2>DISCOVER ALGERIA</h2>
        <p>oraganiser une sortie</p>

      </div>
      
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
        <button id="submit" name="submit">Create</button>
   


      </div>
      </form>
     
      <div class="outputs"></div>
        <div class="searchBloc">
           <input type="text" id="search" placeholder="Search">
           <div class="btnSearch">
            <button id="searchTitle"> Search by Title</button>
            <button id="searchTcategory"> Search by Category </button>

           </div>

        </div>
       

       <div id="deleteALL">
       <a href="deleteALL.php"><button >Delete ALL</button></a>
       </div>

      <table>

       <tr>
         <th>id</th>
         <th>Title</th>
         <th>Date</th>
         <th>Wilaya</th>
         <th>Place</th>
         <th>Heure depart</th>
         <th>Heure arrive</th>
         <th>Category</th>
         <th>Update</th>
         <th>Delete</th>
       </tr>

       <tbody id="tbody">
       <?php showData();?>
        
       </tbody>

      </table>


    </div>

     
  </body>


</html>




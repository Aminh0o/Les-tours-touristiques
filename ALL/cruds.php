
<?php
session_start();

   
try
    {
      
      function showData(){
        $server="localhost";
        $nom_bdd="discoveralgeria";
        $user="root";
        $password="";
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
      
        // Handle form submission
        if(isset($_POST["submit"])) {
          $nomTour = $_POST['nomTour'];
          $dateTour = $_POST['dateTour'];
          $wilaya = $_POST['wilaya'];
          $place = $_POST['place'];
          $heure_depart = $_POST['heurDepart'];
          $heure_arrive = $_POST['heurArrive'];
          $category = $_POST['category'];
         
          $req= "INSERT INTO TOUR (NOMTOUR,DATE_TOUR,WILAYA,PLACE,HEURE_DEPART,HEURE_ARRIVE,CATEGORIE) VALUES ('$nomTour','$dateTour','$wilaya','$place','$heure_depart','$heure_arrive','$category')";
          $connexion->exec($req);
          $req_notif="INSERT INTO NOTIF(ID_EMETTEUR,ID_RECEPTEUR,MESSAGE_NOTIF)VALUES (999,99,'Une nouvelle Sortie a été plannifier ($nomTour)pour cette date $dateTour dans Wilaya $wilaya')";
          $connexion->exec($req_notif);
        }
      
        // Handle search form submission
        if (isset($_POST['searchTitle'])) {
          $searchTerm = $_POST['search'];
          $req1 = "SELECT * FROM TOUR WHERE NOMTOUR LIKE '%$searchTerm%'";
          $res = $connexion->query($req1);
          while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
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
                <td><a href='updateSortie.php?id=".$row["ID_TOUR"]."'> <i id='update' class='fa-sharp fa-solid fa-pen-to-square' class='item'></i></a></td>
                <td><a href='deleteSortie.php?id=".$row["ID_TOUR"]."'> <i id='delete' class='fa-solid fa-trash'></i></a></td>
              </tr>";
          }
        } 
        else if (isset($_POST['searchTcategory'])) {
          $searchTerm = $_POST['search'];
          $req1 = "SELECT * FROM TOUR WHERE CATEGORIE ='$searchTerm'";
          $res = $connexion->query($req1);
          while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
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
                <td><a href='updateSortie.php?id=".$row["ID_TOUR"]."'> <i id='update' class='fa-sharp fa-solid fa-pen-to-square' class='item'></i></a></td>
                <td><a href='deleteSortie.php?id=".$row["ID_TOUR"]."'> <i id='delete' class='fa-solid fa-trash'></i></a></td>
              </tr>";
          }
        }
        else {
          // Display all tours
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
                <td><a href='updateSortie.php?id=".$row["ID_TOUR"]."'> <i id='update' class='fa-sharp fa-solid fa-pen-to-square' class='item'></i></a></td>
                <td><a href='deleteSortie.php?id=".$row["ID_TOUR"]."'> <i id='delete' class='fa-solid fa-trash'></i></a></td>
              </tr>";
          }
        }
      }   
      
  function DeleteData($id)
  {
  
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
        <link rel="stylesheet" href="icons/icons/css/icons.css">
  </head>

  <body>
     <header class="header">
        <div class="sectionGauche">
            <a href="guide.php"><img src="icons/Logoo2.png" id="logo"></a>
        </div>
     </header>

    <div class="cruds">

      <div class="heade">
       
      <h2>ORGANIZE A TOUR TRAVEL</h2>
        

      </div>
      
      <form  method="post">
      <div class="inputs">
        <div class="Tilte">
          <h3>Title</h3>
          <div class="border-line"></div>
           <input  placeholder="Tilte"type="text" id="title" name="nomTour" >
        <div class="plan">
          <h3>TOUR INFORMATION</h3>
          <div class="border-line"></div>
          <input type="date" id="date" name="dateTour" >
          <input  placeholder="Wilaya" type="text" id="wilaya"name="wilaya">
          <input  placeholder="Place " type="text" id="place1"name="place">
          
        </div>

        <div class="time">
          <h3>DEPARTURE AND RETURN TIME</h3>
          <div class="border-line"></div>
          <input type="time" id="heur_depart" name="heurDepart">
          <input type="time" id="heur_arrive" name="heurArrive">

        </div>
         <h3>CATEGORY</h3>
         <div class="border-line"></div>
        <input placeholder="category" type="text" id="category" name="category">
        <button id="submit" name="submit">Create</button>
   


      </div>
      </form>
     
      <div class="outputs"></div>
        <div class="searchBloc">
           <input type="text" name="search" id="search" placeholder="Search">
           <div class="btnSearch">
            <button id="searchTitle" name="searchTitle"> Search by Title</button>
            <button id="searchTcategory" name="searchTcategory"> Search by Category </button>

           </div>

        </div>
       

       <div>
       <a href="deleteALL.php"><button >Delete ALL</button></a>
       </div>

      <table class="table">
      <thead>
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
      </thead>

       <tbody id="tbody">
       <?php showData();?>
        
       </tbody>

      </table>


    </div>

     
  </body>


</html>




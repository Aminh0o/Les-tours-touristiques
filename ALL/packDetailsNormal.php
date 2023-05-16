<?php
  session_start();
    $server="localhost";
    $nom_bdd="discoveralgeria";
    $user="root";
    $password="";
   
 if(isset($_SESSION['categorieNormal']) && isset($_GET["id"])){
    $categorieNormal= $_SESSION['categorieNormal'];
    $NumeroPack = $_GET["id"];
 try{
    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
    $req = "SELECT * FROM PACK where CATEGORIE='$categorieNormal' AND NUMEROPACK='$NumeroPack' ";
    $res =  $connexion->query($req);
    $tuple = $res->fetch(PDO::FETCH_ASSOC);
 }
 catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PACK Details</title>
    <link rel="stylesheet" href="packDetails.css">
    <link href="img/icons/css/icons.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="sectionGauche">
            <a href="InterfaceClient.php"><img src="icons/logoo.png" id="logo"></a>
        </div>
    </header>
    <div class="infoGlobal">
		<h1>PACK DETAILS</h1>
		<div class="photoSlider">
            <img src="images/Alger.jpg" alt="Slide 1">
			<img src="images/oran-santaCruz3.jpg" alt="Slide 2">
			<img src="images/tlemcen-mansourah2.jpeg" alt="Slide 3">
            <img src="images/bejaia-beniAbbas.jpg" alt="Slide 4">
            <img src="images/Sahara4.png" alt="Slide 5">
            <img src="images/constantine3.jpg" alt="Slide 6">
		</div>
        <div class="packDescription">
            <h4>Full description :</h4>
            <p>
                This is a budget-friendly package that is designed for travelers who want to experience a destination 
                without spending too much. It typically includes 2 to 3-star accommodation, shared transfers, 
                basic meals, and standard tours to popular attractions. This pack is ideal for backpackers, solo travelers, 
                and anyone who wants to explore a destination while staying within a limited budget.
            </p>
        </div>
		<div class="info">
			<h2>PACK Informations :</h2>
			<ul>
                
                <li>
                    <span class="fi-sr-map-marker" class="img-item"></span>
                    <b>Wilaya:</b> 
                    <p>
                    <?php echo $tuple['WILAYA'];?>
                    </p>
                </li>
                <li>
                    <span class="fi-sr-layers" class="img-item"></span>
                    <b>Category:</b>
                    <p><?php echo $tuple['CATEGORIE'];?></p>
                </li>
                <li>
                    <span class="fi-sr-people" class="img-item"></span>
                    <b>Type:</b>
                    <p> <?php echo $tuple['TYPE_PACK'];?></p>
                </li>
                <li>
                    <span class="fi-sr-apartment" class="img-item"></span>
                    <b>Accommodation:</b>
                    <p>Included</p>
                </li>
				<li>
                    <span class="fi-sr-bus" class="img-item"></span>
                    <b>Transportation:</b> 
                    <p>Included</p>
                </li>
                <li>
                    <span class="fi-sr-hamburger-soda" class="img-item"></span>
                    <b>Feeding:</b> 
                    <p>Included</p>
                </li>
				<li>
                    <span class="fi-sr-circle-user" class="img-item"></span>
                    <b>Guide:</b>
                    <p>Included</p>
                </li>
                <li>
                    <span class="fi-sr-calendar-days" class="img-item"></span>
                    <b>Date de creation:</b> 
                    <p><?php echo $tuple['DATE_CREATION'];?></p>
                </li>
				<li>
                    <span class="fi-sr-coins" class="img-item"></span>
                    <b>Price:</b>
                    <p><?php echo $tuple['PRIX']." DA";?></p>
                </li>

			</ul>
		</div>
        <div class="addedInfo">
            <ul>
            <li>
                    <h2>Accommodation included: </h2>
                    <?php 
                      $server="localhost";
                      $nom_bdd="discoveralgeria";
                      $user="root";
                      $password="";
                      try
                      {
                        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                        $wilaya = strtolower($tuple['WILAYA']);
                        $req = "SELECT NOM FROM HEBERGEMENT WHERE ADRESSE = '$wilaya' LIMIT 3 ";
                        $res = $connexion->query($req);
                        while($tuple1=$res->fetch(PDO::FETCH_ASSOC))
                        {
                            echo " <p>".$tuple1["NOM"]."</p>";
                        }
                      } 
                      catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>"; }
                    ?>
                </li>
                <li>
                    <h2>Transportation included: </h2>
                    <?php 
                      $server="localhost";
                      $nom_bdd="discoveralgeria";
                      $user="root";
                      $password="";
                      try
                      {
                        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                        $wilaya = strtolower($tuple['WILAYA']);
                        $req = "SELECT NOMACCOMPAGNE FROM TRANSPORT WHERE ADRESSE = '$wilaya' LIMIT 3 ";
                        $res = $connexion->query($req);
                        while($tuple1=$res->fetch(PDO::FETCH_ASSOC))
                        {
                            echo " <p>".$tuple1["NOMACCOMPAGNE"]."</p>";
                        }
                      } 
                      catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>"; }
                    ?>
                  
                </li>
                <li>
                    <h2>Feeding included: </h2>
                    <?php 
                      $server="localhost";
                      $nom_bdd="discoveralgeria";
                      $user="root";
                      $password="";
                      try
                      {
                        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                        $wilaya = strtolower($tuple['WILAYA']);
                        $req = "SELECT NOM FROM RESTAURATION WHERE ADRESSE = '$wilaya' LIMIT 3 ";
                        $res = $connexion->query($req);
                        while($tuple1=$res->fetch(PDO::FETCH_ASSOC))
                        {
                            echo " <p>".$tuple1["NOM"]."</p>";
                        }
                      } 
                      catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>"; }
                    ?>
                  
                </li>
            </ul>
        </div>
        <?php 
            echo "  <button>
                        <a href='reserverPack.php?id=".$_GET["id"]."&wilaya=".$tuple['WILAYA']."&categorie=".$tuple['CATEGORIE']."&type=".$tuple['TYPE_PACK']."'>RESERVE</a>
                    </button>";
        ?>
	</div>
</body>
</html>
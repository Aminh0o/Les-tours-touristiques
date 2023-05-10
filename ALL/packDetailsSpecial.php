<?php
  
  session_start();
 
    $server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";

 if(isset($_SESSION['categorieSpecial']) && isset($_GET['id'])){
    $categorieSpecial = $_SESSION['categorieSpecial'];
        $numeroPack = $_GET['id'];

                  try {
                    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                    $req = "SELECT * FROM PACK where CATEGORIE='$categorieSpecial' AND NUMEROPACK='$numeroPack'  ";
                    $res =  $connexion->query($req);
                    $tuple = $res->fetch(PDO::FETCH_ASSOC);
                      
                     
                  } catch (PDOException $e) {
                    echo "Erreur ! " . $e->getMessage() . "<br/>";
                  }
                
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
                This is a mid-range package that is designed for travelers who want to have a unique and memorable 
                experience without breaking the bank. It typically includes 3 to 4-star accommodation, group transfers, 
                local cuisine, and guided tours to popular attractions. This pack is ideal for families, groups of friends, 
                and budget-conscious travelers who want to explore a destination while enjoying comfortable 
                and convenient facilities.
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
			</ul>
		</div>
        <div class="addedInfo">
            <ul>
                <li>
                    <h2>Accommodation included: </h2>
                    <?php 
                      $server="localhost";
                      $nom_bdd="essai";
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
                      $nom_bdd="essai";
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
                      $nom_bdd="essai";
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
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
            <a href="InterfaceClient.html"><img src="icons/logoo.png" id="logo"></a>
        </div>
    </header>
    <div class="infoGlobal">
		<h1>PACK DETAILS</h1>
		<div class="photoSlider">
			<img src="images/Alger.jpg" alt="Slide 1">
			<img src="images/alger11.png" alt="Slide 2">
			<img src="images/alger7.jpg" alt="Slide 3">
		</div>
        <div class="packDescription">
            <h4>Full description :</h4>
            <p>
                Explore the historic and cultural sites of Algiers with our guided tour. Visit the iconic Casbah, 
                the Grand Mosque, and the Martyrs' Memorial. Take a stroll through the beautiful Jardin d'Essai 
                and admire the stunning architecture of the Dame d'Afrique and Ketchoua Mosque. Discover the rich 
                history of Algiers at the National Museum and the impressive Palais el Rais. End your tour in the serene 
                town of Zeralda. Join us for an unforgettable experience!
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
                <?php 
                 if(isset($_SESSION["heberg"])) {
                    echo "
                        <li>
                        <span class='fi-sr-apartment' class='img-item'></span>
                            <b>Accommodation:</b>
                            <p>". $_SESSION["heberg"]."</p>
                           
                        </li>";}
                else{
                    echo "
                    <li>
                    <span class='fi-sr-apartment' class='img-item'></span>
                        <b>Accommodation:</b>
                        <p>Not Included</p> 
                       
                    </li>";
                }
                    if(isset($_SESSION["transpo"])){
                    echo "
                        <li>
                            <span class='fi-sr-bus' class='img-item'></span>
                            <b>Transportation:</b> 
                            <p> ".$_SESSION["transpo"]."</p>
                        </li>";}
                    else{
                        echo "<li>
                        <span class='fi-sr-bus' class='img-item'></span>
                        <b>Transportation:</b> 
                        <p>Not Included</p>
                    </li>";
                    }
                    if(isset($_SESSION["food"])){
                    echo "
                        <li>
                            <span class='fi-sr-hamburger-soda' class='img-item'></span>
                            <b>Feeding:</b> 
                            <p>".$_SESSION["food"]."</p>
                        </li>";}
                    else{
                        echo "  <li>
                        <span class='fi-sr-hamburger-soda' class='img-item'></span>
                        <b>Feeding:</b> 
                        <p>Not Included</p>
                    </li>";
                    }
                    if(isset($_SESSION["guide"])){
                    echo "
                        <li>
                            <span class='fi-sr-circle-user' class='img-item'></span>
                            <b>Guide:</b>
                            <p>".$_SESSION["guide"]."</p>
                        </li>";}
                    else{
                     echo "<li>
                     <span class='fi-sr-circle-user' class='img-item'></span>
                     <b>Guide:</b>
                     <p>Not Included</p>
                 </li>";
                    }
                
            ?>
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
                    <p>a</p>
                    <p>b</p>
                    <p>c</p>
                </li>
                <li>
                    <h2>Transportation included: </h2>
                    <p>a</p>
                    <p>b</p>
                    <p>c</p>
                </li>
                <li>
                    <h2>Feeding included: </h2>
                    <p>a</p>
                    <p>b</p>
                    <p>c</p>
                </li>
            </ul>
        </div>
        <button><a href="reserverPack.html">RESERVE</a></button>
	</div>
</body>
</html>
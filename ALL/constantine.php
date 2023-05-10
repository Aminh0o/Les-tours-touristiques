<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSTANTINE</title>
    <link rel="stylesheet" href="places.css">
    <style>
        .exploreWilaya p { margin-top: -30%;}
        .exploreWilaya h2 { margin-left: -5%; font-size: 30px;}
        .photoSlider { height: 420px; }
        .packs { margin-top: -30%;}
        .packDescription h4 { margin-top: -50%; margin-left: -5%;}
        .packDescription p { top: -142%; left: -30%;}
        #Card .cardInfo p { margin-top: -15%;}
        #transport { margin-top: -55%; }
        #hebergement { margin-top: 4%; }
        #restaurant { margin-top: 0%; }
    </style>
</head>
<body>
    <div>
        <img id="dynamicImageCover" src="images/constantine5.jpg">
        <header>
            <div class="sectionGauche">
                <a href="InterfaceClient.php"><img src="icons/logoo1.png" id="logo"></a>
		    </div>
		    <nav class="menu">
                <ul>
                    <li><a href="#home" id="navHome" onclick="ScrollNav(this)"><p>Home</p></a></li>
                    <li><a href="#pack" id="navPack" onclick="ScrollNav(this)"><p>Packs</p></a></li>
                    <li><a href="#place" id="navPlace" onclick="ScrollNav(this)"><p>Places</p></a></li>
                    <li><a href="#transport" id="navTransport" onclick="ScrollNav(this)"><p>Transportations</p></a></li>
                    <li><a href="#hebergement" id="navHebergement" onclick="ScrollNav(this)"><p>Accommodations</p></a></li>
                    <li><a href="#restaurant" id="navRestaurants" onclick="ScrollNav(this)"><p>Feeding</p></a></li>
                </ul>
            </nav>
        </header>

        <?php 
            function afficher_Pack_royal()
            {
                $server="localhost";
                $nom_bdd="essai";
                $user="root";
                $password="";
                session_start();
                $_SESSION['TypePackRoyal'] = array();
                try
                {
                    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                    $req = "SELECT * FROM PACK where CATEGORIE='royal' AND WILAYA='CONSTANTINE' ";
                    $res =  $connexion->query($req);
                    while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
                        $_SESSION['categorieRoyal'] = $tuple['CATEGORIE']; 
                        echo " 
                            <div id='pack-royal'>
                                <div class='pack'>
                                    <img src='icons/gold.jpg'>
                                    <div class='packName'>
                                        <h3 id='nomRoyal'>" .$tuple['NOMPACK']. " &nbsp ".$tuple['NUMEROPACK']."</h3>
                                        <p id='categorieRoyal'>".$tuple['CATEGORIE']."</p>
                                    </div>
                                    <div class='packInfo'>
                                        <div class='packDescription'>
                                            <h4>".$tuple['WILAYA']."</h4>
                                            <h6>Type :</h6>
                                            <p>".$tuple['TYPE_PACK']."</p>
                                        </div>
                                        <a href='packDetailsRoyal.php?id=".$tuple['NUMEROPACK']."' class='buttonPack'>View Details</a>
                                    </div>
                                </div>
                            </div>";	}	
                }
                catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
            }
            function afficher_Pack_special()
            {
                $server="localhost";
                $nom_bdd="essai";
                $user="root";
                $password="";
                try
                {
                    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                    $req = "SELECT * FROM PACK where CATEGORIE='special' AND WILAYA='CONSTANTINE' ";
                    $res =  $connexion->query($req);
                    while($tuple = $res->fetch(PDO::FETCH_ASSOC) ){
                        $_SESSION['categorieSpecial'] = $tuple['CATEGORIE'];
                            echo " 
                            <div id='pack-special'>
                                <div class='pack'>
                                    <img src='icons/silver.jpg'>
                                    <div class='packName'>
                                        <h3 id='nomRoyal'>" .$tuple['NOMPACK']. " &nbsp ".$tuple['NUMEROPACK']."</h3>
                                        <p id='categorieRoyal'>".$tuple['CATEGORIE']."</p>
                                    </div>
                                    <div class='packInfo'>
                                        <div class='packDescription'>
                                            <h4>".$tuple['WILAYA']."</h4>
                                            <h6>Type :</h6>
                                            <p>".$tuple['TYPE_PACK']."</p>
                                        </div>
                                        <a href='packDetailsSpecial.php?id=".$tuple['NUMEROPACK']."' class='buttonPack'>View Details</a>
                                    </div>
                                </div>      
                            </div>";
                        
                        	}	
                }
                catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
            }
            function afficher_Pack_normal()
            {
                $server="localhost";
                $nom_bdd="essai";
                $user="root";
                $password="";
                try
                {
                    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                    $req = "SELECT * FROM PACK where CATEGORIE='normal' AND WILAYA='CONSTANTINE' ";
                    $res =  $connexion->query($req);
                    while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
                        $_SESSION['categorieNormal'] = $tuple['CATEGORIE'];
                        echo " 
                            <div id='pack-normal'>
                                <div class='pack'>
                                    <img src='icons/bronze.jpg'>
                                    <div class='packName'>
                                        <h3 id='nomRoyal'>" .$tuple['NOMPACK']. " &nbsp ".$tuple['NUMEROPACK']."</h3>
                                        <p id='categorieRoyal'>".$tuple['CATEGORIE']."</p>
                                    </div>
                                    <div class='packInfo'>
                                        <div class='packDescription'>
                                            <h4>".$tuple['WILAYA']."</h4>
                                            <h6>Type :</h6>
                                            <p>".$tuple['TYPE_PACK']."</p>
                                        </div>
                                        <a href='packDetailsNormal.php?id=".$tuple['NUMEROPACK']."' class='buttonPack'>View Details</a>
                                    </div>
                                </div>
                            </div>";	}
                }
                catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
            }
            ?>

        <main>
            <section id="home">
                <div class="exploreWilaya">
                    <h2><b>EXPLORE</b> CONSTANTINE!</h2>
                    <div class="photoSlider">
                        <img src="images/constantine1.jpg" alt="Slide 1">
                        <img src="images/constantine2.jpg" alt="Slide 2">
                        <img src="images/constantine3.jpg" alt="Slide 3">
                        <img src="images/constantine11.jpg" alt="Slide 4">
                        <img src="images/constantine9.jpg" alt="Slide 5">
                        <img src="images/constantine6.jpg" alt="Slide 6">
                    </div>
                    <p>
                        Constantine is a city in northeastern Algeria known for its stunning natural scenery, 
                        rich cultural heritage, and beautiful architecture. Notable attractions include 
                        the Amir Abdelkader Mosque, Ahmed Bey Palace, Pont des Chutes, CIRTA Museum, Tomb of Massinissa,
                        and Grotte des Ours.
                    </p>
                </div>
            </section>

            <section id="pack">
                <div class="packs">
                <?php afficher_Pack_royal(); ?>
                <?php afficher_Pack_special();?>
                <?php afficher_Pack_normal(); ?> 
                </div>
            </section>

            <section id="place">
                <section>
                    <div class="cards">
                        <div class="card">
                            <img src="images/constantine-Amir-Abdelkader1.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Amir Abdelkader Mosque</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A mosque in Constantine built in honor of the Algerian national hero Amir Abdelkader, 
                                    known for its stunning Ottoman-inspired architecture.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/constantine-ahmed-bey.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Ahmed Bey Palace</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A historic palace in Constantine that served as the residence of the last Ottoman bey 
                                    of Constantine, now home to a museum showcasing traditional Algerian arts and crafts.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/constantine-pont-des-chutes.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Pont des chutes</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A picturesque bridge located near the city of Constantine, overlooking the Rhumel River 
                                    and the spectacular Rhumel Gorge.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/constantine-cirta.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>CIRTA Museum</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A museum in Constantine dedicated to the ancient city of Cirta, showcasing a vast collection 
                                    of archaeological artifacts and mosaics.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/constantine-massinissa.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Tomb of MASSINISSA</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A tomb located near the city of Constantine, believed to be the final resting place 
                                    of Massinissa, the founder of the Numidian Kingdom and one of the most significant 
                                    figures in North African history.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/constantine-grottes-des-ours.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Grotte des Ours</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A natural cave located in the city of Constantine, known for its impressive rock 
                                    formations and underground lake.
                                </p>
                            </div>
                        </div>
                    </div> 
            </section>

            <?php 
            function TransportCostantine(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM TRANSPORT WHERE ADRESSE='CONSTANTINE' ";
                $res =  $connexion->query($req);
                while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='card'>
                    <h1>".$tuple["ID_TRANSPORT"]."</h1>
                    <div class='cardInfo'>
                        <a href=''><h3>".$tuple["NOMACCOMPAGNE"]."</h3></a>
                        <div class='border-line'></div>
                        <ul class='card-text'>
                            <li>
                                <h6>Type :</h6>
                                <p>".$tuple["TYPE_TRANSPORT"]."</p>
                            </li>
                            <li>
                                <h6>Phone Number :</h6>
                                <p>".$tuple["TELEPHONE"]."</p>
                            </li>
                        </ul>
                    </div>
                </div>
                    ";
                }
            } 
            catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
        }
            
            ?>


            <section id="transport">
                <section>
                    <div class="cards">
                    <?php TransportCostantine();?>
                    </div> 
            </section>

            <?php 
            function HebergementCostantine(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM HEBERGEMENT WHERE ADRESSE='CONSTANTINE' ";
                $res =  $connexion->query($req);
                while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='card'>
                    <h1>".$tuple["ID_HEBERGEMENT"]."</h1>
                    <div class='cardInfo'>
                        <a href=''><h3>".$tuple["NOM"]."</h3></a>
                        <div class='border-line'></div>
                        <ul class='card-text'>
                            <li>
                                <h6>Type :</h6>
                                <p>".$tuple["TYPE_HEBERG"]."</p>
                            </li>
                            <li id='rating' class='avis-rating'> 
                                <h6>Rating :</h6>";
                                for($i = 1 ; $i <= 5 ; $i++)
                                {
						     if($i <=$tuple["RATING"])
						{  echo " <label for='star'".$i."></label>"; }
					       }
                        echo"
                            </li>
                            <li>
                                <h6>Phone Number :</h6>
                                <p>".$tuple["TELEPHONE"]."</p>
                            </li>
                        </ul>
                    </div>
                </div>
                    ";
                }
            } 
            catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
        }
            ?>

            <section id="hebergement">
                <section>
                    <div class="cards">
                    <?php HebergementCostantine();?> 
                    </div> 
            </section>

            <?php 
            function RestaurationCostantine(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM RESTAURATION WHERE ADRESSE='CONSTANTINE' ";
                $res =  $connexion->query($req);
                while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='card'>
                    <h1>".$tuple["ID_RESTAURATION"]."</h1>
                    <div class='cardInfo'>
                        <a href=''><h3>".$tuple["NOM"]."</h3></a>
                        <div class='border-line'></div>
                        <ul class='card-text'>
                            <li>
                                <h6>Phone Number :</h6>
                                <p>".$tuple["TELEPHONE"]."</p>
                            </li>
                        </ul>
                    </div>
                </div>
                    ";
                }
            } 
            catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
            }   
            ?>


            <section id="restaurant">
                <section>
                    <div class="cards">
                    <?php RestaurationCostantine();?>
                    </div> 
            </section>
        </main>
        
        <script>
            function ScrollNav(link)
            {
                var Navigation = 
                [
                    document.getElementById("home"),
                    document.getElementById("pack"),
                    document.getElementById("place"),
                    document.getElementById("transport"),
                    document.getElementById("hebergement"),
                    document.getElementById("restaurant")
                ];
                for (var i = 0 ; i<Navigation.length ; i++)
                {
                    if(Navigation[i].id === link.getAttribute("href").substring(1))
                        Navigation[i].style.visibility = 'visible';
                    else
                        Navigation[i].style.visibility = 'hidden';  
                }
            }
            ScrollNav(document.querySelector('a[href="#home"]'));
        </script>
    </div>   
</body>
</html>
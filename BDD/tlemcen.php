<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLEMCEN</title>
    <link rel="stylesheet" href="places.css">
    <style>
        .exploreWilaya p { margin-top: -30%;}
        .exploreWilaya h2 { margin-left: -2%;}
        .photoSlider { height: 420px; }
        .packs { margin-top: -35%;}
        .packDescription p { top: -200%; }
        #Card .cardInfo p { margin-top: -15%;}
        #transport { margin-top: -67%; }
        #hebergement { margin-top: 4%; }
        #restaurant { margin-top: 2%; }
    </style>
</head>
<body>
    <div>
        <img id="dynamicImageCover" src="images/tlemcen-mansourah4.jpeg">
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
                    $req = "SELECT * FROM PACK where CATEGORIE='royal' AND WILAYA='TLEMCEN' ";
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
                    $req = "SELECT * FROM PACK where CATEGORIE='special' AND WILAYA='TLEMCEN' ";
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
                    $req = "SELECT * FROM PACK where CATEGORIE='normal' AND WILAYA='TLEMCEN' ";
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
                    <h2><b>EXPLORE</b> TLEMCEN!</h2>
                    <div class="photoSlider">
                        <img src="images/tlemcen-lala-setti.jpeg" alt="Slide 1">
                        <img src="images/tlemcen-mansourah2.jpeg" alt="Slide 2">
                        <img src="images/tlemcen4.jpeg" alt="Slide 3">
                        <img src="images/tlemcen-ourit.jpeg" alt="Slide 4">
                    </div>
                    <p>
                        Tlemcen is a city located in western Algeria near the border with Morocco. It covers an area of 
                        approximately 118 square kilometers and has a population of over 140,000 people. 
                        The city is known for its rich history, culture, and architecture. Notable attractions include 
                        the Lalla Setti plateau, Mansourah, El Mechouar, El Ourit, Sidi Boumediene, Ghar Boumaaza, Porsey,
                        and The Beni Aad Caves.<br>
                        Tlemcen is a fascinating city that offers visitors a glimpse into Algeria's rich history and culture.
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
                            <img src="images/tlemcen-lalasetti3.jpeg">
                            <div class="cardInfo">
                                <a href=""><h3>Lalla Setti</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A historic shrine located in Tlemcen, Algeria, dedicated to a woman known as Sitt al-Badawiyya, 
                                    who is revered as a saint.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tlemcen-mansourah3.jpeg">
                            <div class="cardInfo">
                                <a href=""><h3>Mansourah</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A medieval ruined city and UNESCO World Heritage site located in Tlemcen, Algeria, 
                                    founded by the Almohad caliph Yaqub al-Mansur.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tlemcen-mechouar.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>El Mechouar</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A fortified palace built during the 18th century, located in Tlemcen, Algeria,
                                    which served as the residence of the rulers of the Tlemcen Kingdom.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tlemcen-porsey.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Porsey</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A coastal town located in the Tlemcen Province of Algeria, known for its beautiful 
                                    beaches and scenic views.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tlemcen-ourit2.jpeg">
                            <div class="cardInfo">
                                <a href=""><h3>El Ourit</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A historic neighborhood located in Tlemcen, Algeria, known for its traditional 
                                    architecture and narrow streets.
                                </p>
                            </div>
                        </div>
                        <div class="card" id="Card">
                            <img src="images/tlemcen-gharBoumaaza.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Boumaaza-Cave</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A natural cave located in Tlemcen, Algeria, with archaeological evidence of human 
                                    presence dating back to the Neolithic era.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tlemcen-sidiBoumedienne.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Sidi Boumediene</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A mausoleum located in Tlemcen, Algeria, dedicated to Sidi Boumediene, 
                                    a revered Sufi saint who played a key role in spreading Islam in North Africa.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tlemcen-beniAdd.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Beni-Aad Caves</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    are a network of natural caves located in the Tlemcen region of northern Algeria, 
                                    known for their unique geological formations and historical significance.
                                </p>
                            </div>
                        </div>
                    </div> 
            </section>
            <?php 
            function TransportTlm(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM TRANSPORT WHERE ADRESSE='TLEMCEN' ";
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
                    <?php TransportTlm();?> 
                    </div> 
            </section>

            <?php 
            function HebergementTlm(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM HEBERGEMENT WHERE ADRESSE='TLEMCEN' ";
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
                            <li id='rating'> 
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
                    <?php HebergementTlm();?>    
                    </div> 
            </section>

            <?php 
            function RestaurationTlm(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM RESTAURATION WHERE ADRESSE='TLEMCEN' ";
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
                    <?php RestaurationTlm();?>
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
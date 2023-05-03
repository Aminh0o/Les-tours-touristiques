<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORAN</title>
    <link rel="stylesheet" href="places.css">
    <style>
        .exploreWilaya p { margin-top: -30%;}
        .exploreWilaya h2 { margin-left: -2%;}
        .photoSlider { height: 420px; }
        .packs { margin-top: -35%;}
        .packDescription p { top: -30%; }
        #Card .cardInfo p { margin-top: -15%;}
        #transport { margin-top: -45%; }
        #hebergement { margin-top: 4%; }
        #restaurant { margin-top: 1%; }
    </style>
</head>
<body>
    <div>
        <img id="dynamicImageCover" src="images/oran-santaCruz3.jpg">
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
                    $req = "SELECT * FROM PACK where CATEGORIE='royal' AND WILAYA='ORAN' ";
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
                    $req = "SELECT * FROM PACK where CATEGORIE='special' AND WILAYA='ORAN' ";
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
                    $req = "SELECT * FROM PACK where CATEGORIE='normal' AND WILAYA='ORAN' ";
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
                    <h2><b>EXPLORE</b> ORAN!</h2>
                    <div class="photoSlider">
                        <img src="images/oran-frontDeMer.jpg" alt="Slide 1">
                        <img src="images/oran-santaCruz3.jpg" alt="Slide 2">
                        <img src="images/oran-theatre.jpg" alt="Slide 3">
                        <img src="images/oran3.jpg" alt="Slide 4">
                        <img src="images/oran-tourine.jpg" alt="Slide 5">
                    </div>
                    <p>
                        Oran is a bustling coastal city in northwestern Algeria with a population of over 1 million 
                        people. The city is known for its stunning architecture, rich cultural heritage, 
                        and lively atmosphere. Some of the notable attractions include the 16th-century 
                        Fort Santa Cruz, the Front de Mer promenade, the Oran Theater, the historic bullfighting 
                        The Tourine Arena, and the Ahmed Zabana Museum, which showcases the city's history 
                        and traditions.
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
                            <img src="images/oran-santaCruz.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Fort Santa Cruz</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A historic fort located in Oran that dates back to the Spanish colonial era.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/oran-frontDeMer.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Front de Mer</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A scenic waterfront promenade in Oran that offers stunning views of the Mediterranean Sea.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/oran-theatre2.webp">
                            <div class="cardInfo">
                                <a href=""><h3>Oran Theater</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A cultural center and theater in Oran that hosts various artistic performances and events.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/oran-tourine.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>The Tourine Arena</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A popular open-air amphitheater in Oran that is known for its spectacular panoramic views.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/oran-zabana.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Ahmed Zabana Museum</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A museum in Oran dedicated to the life and legacy of Ahmed Zabana,
                                    a prominent Algerian revolutionary figure.
                                </p>
                            </div>
                        </div>
                    </div> 
            </section>

            <?php 
            function TransportOran(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM TRANSPORT WHERE ADRESSE='ORAN' ";
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
                    <?php TransportOran();?> 
                    </div> 
            </section>

            <?php 
            function HebergementOran(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM HEBERGEMENT WHERE ADRESSE='ORAN' ";
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
                    <?php HebergementOran();?>  
                    </div> 
            </section>

            <?php 
            function RestaurationOran(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM RESTAURATION WHERE ADRESSE='ORAN' ";
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
                    <?php RestaurationOran();?>
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
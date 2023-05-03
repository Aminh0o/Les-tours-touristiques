<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEJAIA</title>
    <link rel="stylesheet" href="places.css">
    <style>
        .exploreWilaya p { margin-top: -30%;}
        .photoSlider { height: 420px; }
        .packs { margin-top: -38%;}
        .packDescription p { top: -51%;}
        .cardInfo p { margin-top: -10%;}
        .card-text p { margin-top: 3%;}
        #transport { margin-top: -40%; }
        #hebergement { margin-top: 4%; }
        #restaurant { margin-top: 0%; }
    </style>
</head>
<body>
    <div>
        <img id="dynamicImageCover" src="images/bejaia.jpg">
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
                    $req = "SELECT * FROM PACK where CATEGORIE='royal' AND WILAYA='BEJAIA' ";
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
                    $req = "SELECT * FROM PACK where CATEGORIE='special' AND WILAYA='BEJAIA' ";
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
                    $req = "SELECT * FROM PACK where CATEGORIE='normal' AND WILAYA='BEJAIA' ";
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
                    <h2><b>EXPLORE</b> BEJAIA!</h2>
                    <div class="photoSlider">
                        <img src="images/bejaia-beniAbbas.jpg" alt="Slide 1">
                        <img src="images/bejaia3.jpg" alt="Slide 2">
                        <img src="images/bejaia2.jpg" alt="Slide 3">
                    </div>
                    <p>
                        Béjaïa is a coastal city in Algeria with a population of over 180,000 people. 
                        It's known for its beautiful coastline, natural scenery, and cultural heritage. 
                        Visitors can explore the Yemma Gouraya mountain peak and the scenic seaside promenade La Brise de Mer. 
                        The village of Beni Abbas offer stunning views, while the The Bordj Moussa Museum showcases 
                        the region's history and culture. The Congrès de la Soummam is a historic 
                        site, and the Ruines Romaines - Ifrane - are a set of Roman ruins located outside the city.
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
                            <img src="images/bejaia-yemmaGouraya.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Yemma Gouraya</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    Yemma Gouraya is a mountain peak and popular tourist destination in Bejaia, Algeria, 
                                    known for its stunning views of the Mediterranean Sea.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/bejaia-BeniAbbas1.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Village Beni-Abbas</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    Beni Abbas is a picturesque village located in the mountains of Bejaia, Algeria, 
                                    famous for its traditional architecture and beautiful natural scenery.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/bejaia-bordjMoussa.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Bordj Moussa Museum</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    The Bordj Moussa Museum is a historical museum located in Bejaia, Algeria,
                                    that showcases the region's rich history and cultural heritage.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/bejaia1.jpeg">
                            <div class="cardInfo">
                                <a href=""><h3>The Congress of the Soummam</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    The Congress of the Soummam is a historical site in Bejaia, Algeria, 
                                    where the Algerian War of Independence was planned and launched in 1956.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/bejaia-ruineRomaine.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Ruines Romaines</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    The Roman ruins of Ifrane are ancient archaeological sites located in Bejaia, Algeria, 
                                    that date back to the 2nd century AD and offer a glimpse into the region's rich Roman history.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/bejaia-briseMer.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>La Brise de Mer</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    La Brise de Mer is a beautiful seaside promenade in Bejaia, Algeria, 
                                    that offers stunning views of the Mediterranean Sea and is a popular spot for locals and tourists alike.
                                </p>
                            </div>
                        </div>
                    </div> 
            </section>

            <?php 
            function TransportBejaia(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM TRANSPORT WHERE ADRESSE='BEJAIA' ";
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
                    <?php TransportBejaia();?>
                    </div> 
            </section>

            <?php 
            function HebergementBejaia(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM HEBERGEMENT WHERE ADRESSE='BEJAIA' ";
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
                    <?php HebergementBejaia();?>  
                    </div> 
            </section>

            <?php 
            function RestaurationBejaia(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM RESTAURATION WHERE ADRESSE='BEJAIA' ";
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
                    <?php RestaurationBejaia();?>
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
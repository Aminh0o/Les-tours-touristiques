<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALGIERS</title>
    <link rel="stylesheet" href="places.css">
    <style>
        .exploreWilaya p { margin-top: -35%;}
        .photoSlider { height: 420px; }
        .packs { margin-top: -38%;}
        .packDescription p { top: -41%;}
        .cardInfo p { margin-top: -10%;}
        .card-text p { margin-top: 3%;}
        #transport { margin-top: -50%; }
        #hebergement { margin-top: -30%; }
        #restaurant { margin-top: -95%; }
    </style>
</head>
<body>
    <div>
        <img id="dynamicImageCover" src="images/alger10.png">
        <header>
            <div class="sectionGauche">
                <a href="InterfaceClient.php"><img src="icons/Logoo1.png" id="logo"></a>
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
                $nom_bdd="discoveralgeria";
                $user="root";
                $password="";
                session_start();
                $_SESSION['TypePackRoyal'] = array();
                try
                {
                    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                    $req = "SELECT * FROM PACK where CATEGORIE='royal' AND WILAYA='ALGER' ";
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
                $nom_bdd="discoveralgeria";
                $user="root";
                $password="";
                try
                {
                    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                    $req = "SELECT * FROM PACK where CATEGORIE='special' AND WILAYA='ALGER' ";
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
                $nom_bdd="discoveralgeria";
                $user="root";
                $password="";
                try
                {
                    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                    $req = "SELECT * FROM PACK where CATEGORIE='normal' AND WILAYA='ALGER' ";
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
                    <h2><b>EXPLORE</b> ALGIERS!</h2>
                    <div class="photoSlider">
                        <img src="images/Alger.jpg" alt="Slide 1">
                        <img src="images/alger11.png" alt="Slide 2">
                        <img src="images/alger-DameAfrique.jpg" alt="Slide 3">
                        <img src="images/alger-Jama3Kbir.jpg" alt="Slide 4">
                        <img src="images/alger2.jpg" alt="Slide 5">
                        <img src="images/alger3.jpg" alt="Slide 6">
                    </div>
                    <p>
                        Algiers is the capital of Algeria, covering an area of approximately 1,191 square kilometers
                        and with a population of over 3.4 million people. It is a vibrant city known for its 
                        Mediterranean climate, beautiful architecture, and lively markets. Some notable 
                        attractions in the city include the Casbah, the Grand Mosque, The Memorial of the Martyrs, 
                        The Notre-Dame d'Afrique, Dar Ahmed Bey, The National Museum.<br>
                        Overall, Algiers is a fascinating and dynamic place that offers visitors a unique and unforgettable 
                        experience.
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
                            <img src="images/alger-qasabah.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Casbah</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    The Casbah of Algiers is a historic citadel that dates back to the 17th century 
                                    and is a UNESCO World Heritage site.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/alger-grand-mosqué.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Grand Mosque</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    The Grand Mosque of Algiers is an iconic Islamic landmark 
                                    and one of the largest mosques in Africa.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/Alger4.jfif">
                            <div class="cardInfo">
                                <a href=""><h3>Memorial of the Martyrs</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    The Memorial of the Martyrs is a monument dedicated to 
                                    the Algerian soldiers who died during the war of independence against France.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/alger-DameAfrique.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Notre-Dame d'Afrique</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    The Notre-Dame d'Afrique is a Catholic basilica that overlooks the city of Algiers 
                                    and is a popular tourist attraction.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/alger-DarBey.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Dar Ahmed-Bey</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    Dar Ahmed Bey is a historical palace in Algiers that now serves as a museum of 
                                    traditional Algerian arts and crafts.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/alger-musééeNational.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>National Museum</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    The National Museum of Algeria is a cultural institution that showcases the country's
                                    rich history and diverse heritage through its vast collection of artifacts and artworks.
                                </p>
                            </div>
                        </div>
                    </div> 
            </section>

            <?php 
            function TransportAlger(){
            $server="localhost";
            $nom_bdd="discoveralgeria";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM TRANSPORT WHERE ADRESSE='ALGER' ";
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
                        <?php TransportAlger();?>   
                    </div> 
            </section>

            <?php 
            function HebergementAlger(){
            $server="localhost";
            $nom_bdd="discoveralgeria";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM HEBERGEMENT WHERE ADRESSE='ALGER' ";
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
                    <?php HebergementAlger();?>    
                    </div> 
            </section>

            <?php 
            function RestaurationAlger(){
            $server="localhost";
            $nom_bdd="discoveralgeria";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM RESTAURATION WHERE ADRESSE='ALGER' ";
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
                    <?php RestaurationAlger();?>
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
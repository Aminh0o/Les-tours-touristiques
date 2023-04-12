<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALGER</title>
    <link rel="stylesheet" href="places.css">
</head>
<body>
    <div>
        <img id="dynamicImageCover" src="images/alger10.png">
        <header>
            <div class="sectionGauche">
                <a href="InterfaceClient.html"><img src="icons/logoo.png" id="logo"></a>
		    </div>
		    <nav class="menu">
                <ul>
                    <li><a href="#home" id="navHome" onclick="ScrollNav(this)"><p>Home</p></a></li>
                    <li><a href="#pack" id="navPack" onclick="ScrollNav(this)"><p>Packs</p></a></li>
                    <li><a href="#place" id="navPlace" onclick="ScrollNav(this)"><p>Places</p></a></li>
                    <li><a href="#transport" id="navTransport" onclick="ScrollNav(this)"><p>Transports</p></a></li>
                    <li><a href="#hebergement" id="navHebergement" onclick="ScrollNav(this)"><p>Hebergements</p></a></li>
                    <li><a href="#restaurant" id="navRestaurants" onclick="ScrollNav(this)"><p>Restaurants</p></a></li>
                    <li>
                        <button>
                            <p>RESERVE</p>
                            <span class="fi fi-sr-angle-down"></span>
                        </button>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
        <?php 
            function afficher_Pack_royal()
            {
                $server="localhost";
                $nom_bdd="essai";
                $user="root";
                $password="";
                try
                {
                    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                    $req = "SELECT CATEGORIE,NUMEROPACK FROM PACK where CATEGORIE='royal' ";
                    $res =  $connexion->query($req);
                    while($tuple = $res->fetch(PDO::FETCH_ASSOC))
                        echo " 
                            <div id='pack-royal'>
                                <div class='pack'>
                                    <img src='icons/gold.jpg'>
                                    <div class='packName'>
                                        <h3 id='nomRoyal'>" .$tuple['NUMEROPACK']. "</h3>
                                        <p id='categorieRoyal'>".$tuple['CATEGORIE']."</p>
                                    </div>
                                    <div class='packInfo'>
                                        <p class='packDescription'>Description</p>
                                        <a href='#' class='buttonPack'>View Details</a>
                                    </div>
                                </div>
                            </div>";		
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
                    $req = "SELECT CATEGORIE,NUMEROPACK FROM PACK where CATEGORIE='special' ";
                    $res =  $connexion->query($req);
                    while($tuple = $res->fetch(PDO::FETCH_ASSOC))
                        echo " 
                            <div id='pack-special'>
                                <div class='pack'>
                                    <img src='icons/silver.jpg'>
                                    <div class='packName'>
                                        <h3 id='nomSpecial'>" .$tuple['NUMEROPACK']. " </h3>
                                        <p id='categorieSpecial'>" .$tuple['CATEGORIE']." </p>
                                    </div>
                                    <div class='packInfo'>
                                        <p class='packDescription'>Description</p>
                                        <a href='#' class='buttonPack'>View Details</a>
                                    </div>
                                </div>      
                            </div>";		
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
                    $req = "SELECT CATEGORIE,NUMEROPACK FROM PACK where CATEGORIE='normal' ";
                    $res =  $connexion->query($req);
                    while($tuple = $res->fetch(PDO::FETCH_ASSOC))
                        echo " 
                            <div id='pack-normal'>
                                <div class='pack'>
                                    <img src='icons/bronze.jpg'>
                                    <div class='packName'>
                                        <h3 id='nomNormal'> ".$tuple['NUMEROPACK']." </h3>
                                        <p id='categorieNormal'> ".$tuple['CATEGORIE']." </p>
                                    </div>
                                    <div class='packInfo'>
                                        <p class='packDescription'>Description</p>
                                        <a href='#' class='buttonPack'>View Details</a>
                                    </div>
                                </div>
                            </div>";	
                }
                catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
            }
            ?>
            <section id="home">
                <div class="exploreWilaya">
                    <h2><b>EXPLORE</b> ALGER!</h2>
                    <p>
                        Alger is located in the north-central region of Algeria and is the capital of the country. 
                        It covers an area of approximately 1,191 square kilometers and has a population of over 
                        3.4 million people. Alger is a vibrant and bustling city that is rich in history, culture, 
                        and tradition. It is known for its Mediterranean climate, beautiful architecture, and lively markets. 
                        The city boasts several attractions, including the Casbah of Algiers, the Notre-Dame d'Afrique, 
                        and the Jardin d'Essai du Hamma botanical garden. Alger is also an important economic hub and is home 
                        to many businesses, government agencies, and international organizations. Its strategic location on the 
                        Mediterranean Sea has made it a center for commerce and trade for centuries. Overall, 
                        Wilaya Alger is a fascinating and dynamic place that is steeped in history and offers visitors a unique 
                        and unforgettable experience.
                    </p>
                </div>
            </section>

            <section id="pack">
                <div class="packs">
                    <div id="pack-royal">
                        <div class="pack">
                            <img src="icons/gold.jpg">
                            <div class="packName">
                                <h3 id="nomRoyal">PACK 1</h3>
                                <p id="categorieRoyal">ROYAL</p>
                            </div>
                            <div class="packInfo">
                                <p class="packDescription">Description</p>
                                <a href="#" class="buttonPack">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div id="pack-special">
                        <div class="pack">
                            <img src="icons/silver.jpg">
                            <div class="packName">
                                <h3 id="nomSpecial">PACK 2</h3>
                                <p id="categorieSpecial">SPECIAL</p>
                            </div>
                            <div class="packInfo">
                                <p class="packDescription">Description</p>
                                <a href="#" class="buttonPack">View Details</a>
                            </div>
                        </div>      
                    </div>
                    <div id="pack-normal">
                        <div class="pack">
                            <img src="icons/bronze.jpg">
                            <div class="packName">
                                <h3 id="nomNormal">PACK 3</h3>
                                <p id="categorieNormal">NORMAL</p>
                            </div>
                            <div class="packInfo">
                                <p class="packDescription">Description</p>
                                <a href="#" class="buttonPack">View Details</a>
                            </div>
                        </div>
                    </div> 
                    <?php afficher_Pack_royal(); ?>
                    <?php afficher_Pack_special(); ?>
                    <?php afficher_Pack_normal(); ?>      
                </div>
            </section>

            <section id="place"></section>
            <section id="transport"></section>
            <section id="hebergement"></section>
            <section id="restaurant"></section>
        </main>
        
        <footer>

        </footer>

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
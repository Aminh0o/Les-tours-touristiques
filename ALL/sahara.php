<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAHARA</title>
    <link rel="stylesheet" href="places.css">
    <style>
        .exploreWilaya p { margin-top: -30%;}
        .photoSlider { height: 420px; }
        .packs { margin-top: -30%;}
        .packDescription p { top: -130%; }
        #transport { margin-top: -45%; }
        #hebergement { margin-top: 5%; }
        #restaurant { margin-top: 1%; }
    </style>
</head>
<body>
    <div>
        <img id="dynamicImageCover" src="images/Sahara.png">
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
                    $req = "SELECT * FROM PACK where CATEGORIE='royal' AND WILAYA='SAHARA' ";
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
                    $req = "SELECT * FROM PACK where CATEGORIE='special' AND WILAYA='SAHARA' ";
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
                    $req = "SELECT * FROM PACK where CATEGORIE='normal' AND WILAYA='SAHARA' ";
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
                    <h2><b>EXPLORE</b> SAHARA!</h2>
                    <div class="photoSlider">
                        <img src="images/Sahara2.png" alt="Slide 1">
                        <img src="images/Sahara3.png" alt="Slide 2">
                        <img src="images/Sahara4.png" alt="Slide 3">
                        <img src="images/Sahara5.jpg" alt="Slide 4">
                        <img src="images/Sahara6.jpg" alt="Slide 5">
                    </div>
                    <p>
                        The Algerian Sahara is a vast and diverse region that covers a large part of the country. 
                        Tamanrasset, Adrar, and Djanet are some of the most popular destinations in the region. 
                        Tamanrasset has Ksar Moussa, while Adrar has Sefar and Tamasakht. 
                        Djanet is a gateway to the Dunes of Tin Merzouga and the Tadrart Rouge rock formations.
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
                            <img src="images/ksarMoussa.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Ksar Moussa</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A historic fortified granary located in the Algerian Sahara.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tenessa.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Tenessa</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A small oasis town located in the Tamanrasset province of southern Algeria.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tagrera.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Tagrera</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A prehistoric site in the Adrar region of Algeria, known for its rock art.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/sefar.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Sefar</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A village in the Djanet area of southern Algeria, surrounded by dramatic rock formations and natural arches.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tamasakht.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Tamasakht</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    An oasis town located in the Tamanrasset province of southern Algeria.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="images/tin-merzouga.jpg">
                            <div class="cardInfo">
                                <a href=""><h3>Tin Merzouga Dunes</h3></a>
                                <div class="border-line"></div>
                                <p class="card-text">
                                    A series of towering sand dunes located in the heart of the Algerian Sahara, near the town of Djanet.
                                </p>
                            </div>
                        </div>
                    </div> 
            </section>

            <?php 
            function TransportSahara(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM TRANSPORT WHERE ADRESSE='SAHARA' ";
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
                    <?php TransportSahara();?>
                    </div> 
            </section>
             
            <?php 
            function HebergementSahara(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM HEBERGEMENT WHERE ADRESSE='SAHARA' ";
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
                    <?php HebergementSahara();?>
                    </div> 
            </section>

            <?php 
            function RestaurationSahara(){
            $server="localhost";
            $nom_bdd="essai";
            $user="root";
            $password="";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req = "SELECT * FROM RESTAURATION WHERE ADRESSE='SAHARA' ";
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
                    <?php RestaurationSahara();?>
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
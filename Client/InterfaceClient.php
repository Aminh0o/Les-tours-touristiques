<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Des Tours</title>
    <link rel="stylesheet" href="InterfaceClient.css">
	<link rel="stylesheet" href="icons/icons/css/icons.css">
	<script src="JS/loginClient.js"></script>
	<script src="JS/client.js"></script>
</head>

<body>

	<button id="scrollButton" href="#"><span class="fi fi-sr-angle-up" id="scroll-img"></span></button>

	<div class="box">
	<img id="dynamicImageCover" src="images/Sahara4.png">
	<header id="header">
		<div class="sectionGaucheHeader">
			<img src="icons/logoo1.png" id="logoHeader">
		</div>
		<nav class="menu">

			<div class="menu-responsive-button">
				<button>
					<span class="fi-sr-align-justify"></span>
				</button>
			</div>

			<ul class="menu-items">
				<li>
					<span class="fi-sr-map-marker" class="img-item">
						<a href="#explore" id="navExplore"><p>Explore</p></a>
					</span>
				</li>
				<li>
					<span class="fi-sr-earth-africa" class="img-item">
						<a href="#places" id="navPlace"><p>Places</p></a>
					</span>
				</li>
				<li>
					<span class="fi-sr-comment-info" class="img-item">
						<a href="#about" id="navAbout"><p>About</p></a>
					</span>
				</li>
				<li>
					<span class="fi-sr-paper-plane" class="img-item">
						<a href="#contact" id="navContact"><p>Contact</p></a>
					</span>
				</li>

				<!---------------------------------------------------------------------------------------------------->
                <?php 
				function isLoggedIn() 
				{
					session_start();
					return isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'];
				}

                if (isLoggedIn()) 
                {
                    echo "  <li>
					            <span class='fi-sr-bell-ring' class='img-item'>
						            <a href='' id='navNotif'><p>Notifications</p></a>
					            </span>
				            </li>
				            <li>
					            <span class='fi-sr-user' class='img-item'>
						            <a id='navProfil' onclick='afficherProfile()'>
							            <p>Profil</p>
						            </a>
					            </span>
				            </li>";
                }
                else 
				{
					echo "	<li>
					            <span class='fi-sr-sign-in-alt' class='img-item'>
						            <a href='login.php' id='navLogin'><p>Login</p></a>
					            </span>
				            </li>";
				}

				function afficherName()
				{
					$server="localhost";
					$nom_bdd="essai";
					$user="root";
					$password="";
					if ( isset($_SESSION["email"]))
					{
						$login = $_SESSION["email"];
						try
						{
							$connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
							$req = "SELECT * FROM UTILISATEUR where EMAIL = '$login'";
							$res =  $connexion->query($req);
							$tuple = $res->fetch(PDO::FETCH_ASSOC);
							$_SESSION["id_user"] = $tuple["ID_UTILISATEUR"];
							echo "<h2>".$tuple['NOM']."</h2>";	
						}
						catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
					}
				}
                ?>
			</ul>

			<div id="profile" class="profile">
				<button>
					<span class="fi fi-sr-x" id="quitMenu"></span>
				</button>
				<div class="nameProfile">
				    <?php afficherName(); ?>
				</div>
				<hr>
				<?php echo "<a href='editProfile.php?id=".$_SESSION["id_user"]."' class='menuProfile'>"; ?>
					<span class="fi fi-sr-settings" class="iconProfile">
					<p>Edit Profile</p>
				</a>
				<a href="logoutClient.php" class="menuProfile">
					<span class="fi fi-sr-sign-out-alt" class="iconProfile">
					<p>Logout</p>
				</a>
			</div>
		</nav>

		<div class="sectionDroiteHeader">
			<form>
				<input type="text" id="searchInput" placeholder="Rechercher...">
				<button onclick="searchSections(event)">Search</button>
			</form>
		</div>
	</header>
	
	<section>
		<div class="paragraphWelcome">
			<h1 id="introTitle">WELCOME</h1>
			<h3 id="introTitle">TO ALGERIA !</h3>
		</div>
	</section>

	<section>
		<h1 id="explore" class="title">Explore <b>ALGERIA</b> With Confidence !</h1>
		<div class="explore">
			<div class="paragraphExplore">
				<p>
					Algeria is a vibrant North African country, rich in history, culture, 
					and natural beauty. From the bustling streets of its vibrant cities to 
					the vast Sahara desert, Algeria is a land of diverse landscapes and experiences. 
					Its ancient ruins, offer a glimpse into the country's fascinating past, 
					while its vibrant markets, lively music scene, and delicious cuisine reflect its 
					dynamic present. Whether you're seeking adventure in the desert, relaxation on 
					the coast, or a glimpse into a unique culture <br>
					<b>Algeria is a destination that won't disappoint</b>
				</p>
			</div>
			<h3 id="paragraphExploreQuestion">Where you want to go now ?</h3>
			<div class="beginTravel">
				<h3 id="beginTravelParagraph">Start your tour simply here !</h3>
				<form method="POST" name="formReservation">
					<button onclick="<?php if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) { ?>
					        alert('Please login to make a reservation.'); 
							window.location.href='login.php'; return false; 
						<?php } ?>">
						<a href="reserverPack.php">Let's Go</a>
					</button>
				</form>
			</div>
		</div>
	</section>

	<section id="places" class="places">
		<h1 class="title" id="topPlaces">TOP PLACES</h1>
		<div class="place">
			<div class="place-card">
				<img src="images/alger-qasabah.jpg" id="algerImages">
				<div class="placeInfo">
					<h3>ALGIERS</h3>
					<div class="border-line"></div>
					<p class="place-text">The capital city of Algeria, Alger, is a vibrant and bustling metropolis that 
						offers visitors a mix of modern amenities and historic charm</p>
					<button><a href="alger.php" class="buttonPlace">Voir Details</a></button>
				</div>
			</div>
			<div class="place-card">
				<img src="images/tlemcen4.jpeg" id="tlemcenImages">
				<div class="placeInfo">
					<h3>TLEMCEN</h3>
					<div class="border-line"></div>
					<p class="place-text">Tlemcen is a city in northwestern Algeria with a rich cultural heritage and historic</p>
					<button><a href="tlemcen.php" class="buttonPlace">Voir Details</a></button>
				</div>
			</div>
			<div class="place-card">
				<img src="images/oran.jpg" id="oranImages">
				<div class="placeInfo">
					<h3>ORAN</h3>
					<div class="border-line"></div>
					<p class="place-text">Oran is a coastal city located in the northwestern part of Algeria, 
						known for its vibrant music scene, stunning beaches, and historic landmarks</p>
					<button><a href="oran.php" class="buttonPlace">Voir Details</a></button>
				</div>
			</div>
			<div class="place-card">
				<img src="images/bejaia.jpg" id="bejaiaImages">
				<div class="placeInfo">
					<h3>BEJAIA</h3>
					<div class="border-line"></div>
					<p class="place-text">Bejaia is a coastal city located in the northeastern part of Algeria, 
						known for its stunning beaches, rugged cliffs, and historic landmarks</p>
					<button><a href="bejaia.php" class="buttonPlace">Voir Details</a></button>
				</div>
			</div>
			<div class="place-card">
				<img src="images/constantine1.jfif" id="constantineImages">
				<div class="placeInfo">
					<h3>CONSTANTINE</h3>
					<div class="border-line"></div>
					<p class="place-text">Constantine is a city located in the northeastern part of Algeria, 
						known for its stunning natural beauty and rich history. The city is perched on a hill overlooking 
						a deep gorge, and is home to several historic landmarks.	
					</p>
					<button><a href="constantine.php" class="buttonPlace">Voir Details</a></button>
				</div>
			</div>
			<div class="place-card">
				<img src="images/Sahara5.jpg" id="saharaImages">
				<div class="placeInfo">
					<h3>SAHARA</h3>
					<div class="border-line"></div>
					<p class="place-text">The Sahara Algerien is a vast desert located in the southern part of Algeria, 
						known for its stunning landscapes, diverse wildlife, and rich cultural heritage</p>
					<button><a href="sahara.php" class="buttonPlace">Voir Details</a></button>
				</div>
			</div>
		</div>  
	</section>

	<section id="top-attractions">
		<h1 class="title" id="topAttractions">TOP ATTRACTIONS</h1>
		<div class="attraction">
			<div class="attraction-card">
				<img src="images/tassili1.jpg">
				<div class="attractionInfo">
					<a href=""><h3>Tassili n'Ajjer</h3></a>
					<div class="border-line"></div>
					<p class="attraction-text">Tassili n'Ajjer is a vast plateau located in southeastern Algeria, 
						known for its striking red sandstone formations, deep canyons, and ancient rock art. 
						It's a UNESCO World Heritage Site and a popular destination for adventure seekers who 
						want to explore the Sahara Desert.</p>
				</div>
			</div>
			<div class="attraction-card">
				<img src="images/chrea.jpg">
				<div class="attractionInfo">
					<a href=""><h3>Chréa</h3></a>
					<div class="border-line"></div>
					<p class="attraction-text">Chréa is a beautiful mountain resort located in the Blida province, 
						about 50 km away from the capital city, Algiers. It's a popular destination for skiing 
						and hiking enthusiasts, offering breathtaking views of the Atlas Mountains and a cool 
						climate all year round.
					</p>
				</div>
			</div>
			<div class="attraction-card">
				<img src="images/timgad.jpg">
				<div class="attractionInfo">
					<a href=""><h3>Timgad</h3></a>
					<div class="border-line"></div>
					<p class="attraction-text">Timgad is a UNESCO World Heritage Site and one of the best-preserved 
						ancient Roman cities in the world, located in the Batna province, northeastern Algeria. 
					</p>
				</div>
			</div>
		</div> 

	</section>

	<section>
		<h1 class="title" id="about">ABOUT US</h1>
		<div class="about">
			<p id="becomeGuideParagraph">
				We are a team of passionate individuals dedicated to promoting tourism in Algeria. 
				Our goal is to provide visitors with an unforgettable experience while discovering 
				the diverse and rich culture of our country.<br>
				Join us on a journey of discovery as we showcase the best of Algeria's natural and cultural heritage. 
				We promise to deliver a memorable and unique experience that you will cherish for years to come.
			</p>
			<div class="becomeGuide">
				<h3 id="becomeGuideTitle">Want to become a guide ?</h3>
				<button onclick="<?php if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) { ?>
						alert('Please login to join us as a guide.'); 
						window.location.href='login.php'; return false;
					<?php } ?>">
					<a href="joinUS.html">Join here</a>
				</button>
			</div>
		</div>
	</section>

	<section>
		<h1 class="title" id="avis">AVIS</h1>
		<div class="avis">
		
		    <div class="avis-card-placement">
			<?php 
			
			    $server="localhost";
    		    $nom_bdd="essai";
    		    $user="root";
    		    $password="";
		
			    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
				
				$req2 = "SELECT * FROM AVIS WHERE ETAT = 'publie' ";
				$res2 = $connexion->query($req2);
        
				while($tuple2 = $res2->fetch(PDO::FETCH_ASSOC))
				{
					echo " <div class='avis-card'>
                                <div class='avis-icon-top'>
                                    <span class='fi-sr-message-quote'></span>
                                </div>
                                <div class='avis-text'>
                                    <p>".$tuple2["MESSAGE_AVIS"]."</p>
                                </div>
				            <div class='avis-rating'>";
                    for($i = 1 ; $i <= 5 ; $i++)
                    {
						if($i <=$tuple2["RATING"])
						{ echo " <label for='star'".$i."></label>"; }
					}
					
					$id_user = $tuple2["ID_USER"];
					$req1 = "SELECT NOM FROM UTILISATEUR WHERE ID_UTILISATEUR='$id_user' ";
					$res1 = $connexion->query($req1);
					$tuple1 = $res1->fetch(PDO::FETCH_ASSOC);
					
					echo "  </div>
					        <div class='avis-name'>
							    <h3>".$tuple1["NOM"]."</h3>
                            </div>
							<div class='avis-icon-down'>
							    <span class='fi-sr-message-quote'></span>
							</div>
						</div> ";
				}
			?>
			</div>
		</div>
	</section>

	<?php 
	    $server="localhost";
		$nom_bdd="essai";
		$user="root";
		$password="";
		if(isset($_POST["nomComment"]) && isset($_POST["emailComment"]) && isset($_POST["messageComment"]) && isset($_POST["rating"]))
		{
			$connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
			$nomComment = $_POST["nomComment"];
			$emailComment = $_POST["emailComment"];
			$subjectComment = $_POST["subjectComment"];
			$rating = $_POST["rating"];
			$messageComment = $_POST["messageComment"];

			if($rating == "1") $rating = 1;
			else if($rating == "2") $rating = 2;
			else if($rating == "3") $rating = 3;
			else if( $rating == "4") $rating = 4;
			else if($rating == "5") $rating = 5;
			
			$id_user = $_SESSION["id_user"];
			$req = "INSERT INTO AVIS(MESSAGE_AVIS, EMAIL, ID_USER, RATING) VALUES ('$messageComment','$emailComment','$id_user','$rating')";
			$connexion->exec($req);
		}
	?>

	<section>
		<h1 class="title" id="contact">CONTACT US</h1>
		<div class="contactUS">
			<form class="contact-us" method="post" >
				<div class="inputContact">
					<input type="text" name="nomComment" class="inputComment" id="nomComment" placeholder="Name" required/>
					<input type="email" name="emailComment" class="inputComment" id="emailComment" placeholder="Email" required/>
					<input type="text" name="subjectComment" class="inputComment" id="subjectComment" class="form" placeholder="Subject"/>
					<input type="number" name="phoneComment" class="inputComment" id="phoneComment" placeholder="Phone"/>
				<div class="ratingContact">
					<span>Rate your experience :</span>
					<input type="radio" name="rating" id="star1" value="5"/><label for="star1"></label>
					<input type="radio" name="rating" id="star2" value="4"/><label for="star2"></label>
					<input type="radio" name="rating" id="star3" value="3"/><label for="star3"></label>
					<input type="radio" name="rating" id="star4" value="2"/><label for="star4"></label>
					<input type="radio" name="rating" id="star5" value="1"/><label for="star5"></label>
				</div>
				</div>	
				<div class="messageContact">	
					<textarea name="messageComment" id="messageComment" placeholder="Message" pattern=".{0,100}" required></textarea>
					<button type="submit" id="buttonComment" name="buttonComment"
					        onclick="<?php if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) { ?>
							alert('Please login to add a comment.'); 
						    window.location.href='login.php'; return false;
					    <?php } ?>">
						Send
						<span class="fi-sr-paper-plane"></span>
					</button> 
				</div>
			</form>
		</div>
	</section>

	<footer>
		<div class="sectionGaucheFooter">
			<div class="footer-liens">
				<h3>Quick Links</h3>
				<ul>
				  <li><a href="#">Home</a></li>
				  <li><a href="#explore">Explore</a></li>
				  <li><a href="#places">Places</a></li>
				  <li><a href="#about">About</a></li>
				</ul>
			</div>
		</div>
		<div class="sectionMilieuFooter">
			<a href="#">
				<img src="icons/logoo1.png" id="logoFooter">
			</a>
			<ul class="social-icons">
				<li><a href="https://www.facebook.com"><img src="icons/facebook.png" class="icons-footer"></a></li>
				<li><a href="https://www.twitter.com"><img src="icons/twitter.png" class="icons-footer"></a></li>
				<li><a href="https://www.instagram.com"><img src="icons/instagram.png" class="icons-footer"></a></li>
			</ul>
		</div>
		<div class="sectionDroiteFooter">
			<div class="footer-contact">
				<h3>Contact</h3>
				<p><span class="fi-sr-marker"></span>Université-Abou-Bekr-Belkaid <b>Tlemcen</b></p>
				<p><span class="fi-sr-circle-envelope"></span>discover_algeria@gmail.com</p>
				<p><span class="fi-sr-circle-phone"></span>+213 43 21 63 70</p>
			</div>
		</div>
	</footer>
</body>
<!--------------------------------------------------------------------------------------------------Background loop-->
<script>
	var images = 
	[		
		"images/ruins3.jpg",				
		"images/alger10.png",		
		"images/alger2.jpg",		
		"images/Sahara5.jpg"	
	];
	var dynamicImages = document.getElementById("dynamicImageCover");
	var compteur = 0;

	function changeImage() 
	{
		dynamicImages.src = images[compteur];
		compteur = (compteur + 1) % images.length;
	}
	setInterval(changeImage, 5000);
</script>
</html>
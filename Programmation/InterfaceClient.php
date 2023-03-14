<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Des Tours</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<div>
	<img id="dynamicImageCover" src="images/Sahara.png">
    <header id="header">
        <img src="images/logo.png" id="logo" width="70px" height="70px">
        <input type="search" placeholder="Rechercher..." id="search">
        <nav class="navBar">
			<a href="pack.html" id="navPack"><p>Packs</p></a>
			<a href="" id="navAboutAlgeria"><p>About Algeria</p></a>
			<a href="signup.html" id="navSignUp"><p>Sign Up</p></a>
			<button>Menu</button>
		</nav>
    </header>

	<div class="welcome">
		<h1>WELCOME</h1>
		<h3>To Algeria !</h3>
		<p>
			L'Algérie est un pays riche en histoire et en culture, avec de nombreux sites 
			touristiques intéressants et importants à découvrir.
		</p>
	</div>

	<aside>
		<div class="packs">
			<a href="#"><img src="images/Constantine 🇩🇿 vue de Ciel 🇩🇿.jfif"></a>
			<a href="#"><img src="images/téléchargé.jfif"></a>
			<a href="#"><img src="images/Algeria.jfif"></a>
		</div>
	</aside>
    </div>

	<script>
		window.onscroll = function() 
		{
			var header = document.getElementById("header");
			if (window.pageYOffset > 0) 
			{ header.classList.add("scrolled"); }
			else 
			{ header.classList.remove("scrolled");}
		};
	</script>
	    <script>
			var images = [
			  "images/Sahara.png",
			  "images/Sahara2.png",
			  "images/Sahara3.png",
			  "images/Sahara4.png",
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


</body>
</html>
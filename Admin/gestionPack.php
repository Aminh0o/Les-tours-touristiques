<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DES PACKS</title>
    <link rel="stylesheet" href="gestionPack.css">
</head>
<body>
	<?php 
	
	 function afficherPack()
	 {
	session_start();
	 $server="localhost";
     $nom_bdd="essai";
     $user="root";
     $password="";
		try{
		   $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
		   $req = "SELECT * FROM PACK ORDER BY NUMEROPACK ASC";
		   $res =  $connexion->query($req);
		   while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
			echo "<tr>";
			echo "<td>" . $tuple["NUMEROPACK"] . "</td>";
			echo "<td>" . $tuple["NOMPACK"] . "</td>";
			echo "<td>" . $tuple["CATEGORIE"] . "</td>";
			echo "<td>" . $tuple["WILAYA"] . " </td>";
			echo "<td>" . $tuple["TYPE_PACK"] . " </td>";
			echo "<td>" . $tuple["DATE_CREATION"] . " </td>";
			echo "<td>" . $tuple["PRIX"] . " DA</td>";
			
			if(isset($_SESSION["heberg"]) && $_SESSION["nomPack"]==$tuple["NOMPACK"]) 
			{$heberg = $_SESSION["heberg"];echo "<td>" . $heberg. " </td>";}
			else
			{$heberg = "Not Included";echo "<td>" . $heberg. " </td>";}

			if(isset($_SESSION["transpo"]) && $_SESSION["nomPack"]==$tuple["NOMPACK"]) 
			{$transpo = $_SESSION["transpo"];echo "<td>" . $transpo. " </td>";}
			else
			{$transpo = "Not Included";echo "<td>" . $transpo. " </td>";}

			if(isset($_SESSION["food"]) && $_SESSION["nomPack"]==$tuple["NOMPACK"]) 
			{$food = $_SESSION["food"];echo "<td>" . $food. " </td>";}
			else
			{$food = "Not Included";echo "<td>" . $food. " </td>";}

			if(isset($_SESSION["guide"]) && $_SESSION["nomPack"]==$tuple["NOMPACK"]) 
			{$guide = $_SESSION["guide"];echo "<td>" . $guide. " </td>";}
			else
			{$guide = "Not Included";echo "<td>" . $guide. " </td>";}

            echo "<td><a href='modificationPack.php?id=".$tuple["NUMEROPACK"]."'><button>Modifier</button></a></td>";
			echo "<td><a href='suppressionPack.php?id=".$tuple["NUMEROPACK"]."'><button>Supprimer</button></a></td>";
			echo "</tr>";
    		}
		
		   
	   }
	   catch (PDOException $e) 
   {
	   echo "Erreur ! " . $e->getMessage() . "<br/>";
   }
			
		
    }
	?>
    <h1>Liste des packs</h1>
	<table>
		<thead>
			<tr>
				<th>Numéro du pack</th>
				<th>Nom du pack</th>
				<th>Catégorie</th>
				<th>Wilaya</th>
				<th>Type Du Pack</th>
				<th>Date de création</th>
                <th>Prix</th>
				<th>With Héberg</th>
				<th>With transport</th>
				<th>With food</th>
				<th>With guide</th>
				<th>Modifier</th>
				<th>supprimer</th>
				
			</tr>
		</thead>
		<tbody>
			 <?php  afficherPack(); ?>
		</tbody>
	</table>
	
	<a href="créationPack.php"><button id="cree">Créer un pack</button></a>
</body>
</html>
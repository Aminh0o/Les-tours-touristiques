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
     $nom_bdd="discoveralgeria";
     $user="root";
     $password="";
		try{
		   $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
		   $req = "SELECT * FROM PACK ORDER BY NUMEROPACK ASC";
		   $res =  $connexion->query($req);
		   while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
			$date_expiration = $tuple["DATE_EXPIRATION"];
			$id_pack = $tuple["NUMEROPACK"];
			if (strtotime(date("Y-m-d")) == strtotime($date_expiration)) {
				$supp_pack = "DELETE FROM PACK WHERE NUMEROPACK='$id_pack' ";
				$connexion->query($supp_pack);
			 }
			echo "<tr>";
			echo "<td>" . $tuple["NUMEROPACK"] . "</td>";
			echo "<td>" . $tuple["NOMPACK"] . "</td>";
			echo "<td>" . $tuple["CATEGORIE"] . "</td>";
			echo "<td>" . $tuple["WILAYA"] . " </td>";
			echo "<td>" . $tuple["TYPE_PACK"] . " </td>";
			echo "<td>" . $tuple["DATE_CREATION"] . "</td>";
			echo "<td>" . $tuple["DATE_EXPIRATION"]."</td>";
			echo "<td>" . $tuple["PRIX"] . " DA</td>";
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
        <a href="AdminPrincipal.php#NavGestion2"><img src="icons/logoo1.png" id="logo"></a>
    
	<table>
		<thead>
			<tr>
				<th>Numéro du pack</th>
				<th>Nom du pack</th>
				<th>Catégorie</th>
				<th>Wilaya</th>
				<th>Type Du Pack</th>
				<th>Date de création</th>
				<th>Date d'expiration</th>
                <th>Prix</th>
				<th>Modification</th>
				<th>suppression</th>
				
			</tr>
		</thead>
		<tbody>
			 <?php  afficherPack(); ?>
		</tbody>
	</table>
	
	<a href="créationPack.php"><button id="cree">Créer un pack</button></a>
</body>
</html>
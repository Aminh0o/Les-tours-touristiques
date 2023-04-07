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
	 $server="localhost";
     $nom_bdd="essai";
     $user="root";
     $password="";
	 $date = date("Y-m-d H:i:s");
		try{
		   $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
		   $req = "SELECT * FROM PACK ORDER BY NUMEROPACK ASC";
		   $res =  $connexion->query($req);
		   while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
			echo "<tr>";
			echo "<td>" . $tuple["NUMEROPACK"] . "</td>";
			echo "<td>" . $tuple["CATEGORIE"] . "</td>";
			echo "<td>" . $tuple["WILAYA"] . " </td>";
			echo "<td>" . $date . " </td>";
			echo "<td>" . $tuple["PRIX"] . " DA</td>";
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
				<th>Catégorie</th>
				<th>Wilaya</th>
				<th>Date de création</th>
                <th>Prix</th>
			</tr>
		</thead>
		<tbody>
			 <?php afficherPack(); ?>
		</tbody>
	</table>
	<a href="créationPack.html"><button>Créer un pack</button></a>
	<a href='modificationPack.html'><button>Modifier un pack</button></a>
	<a href='suppressionPack.html'><button>Supprimer un pack</button></a>

</body>
</html>
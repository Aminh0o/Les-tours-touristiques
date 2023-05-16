<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DES RECRUTEMENTS</title>
    <link rel="stylesheet" href="gestionPack.css">
</head>
<body>
	<?php 
	 function afficherDemandesRecrutement()
	 {
        
	 $server="localhost";
     $nom_bdd="discoveralgeria";
     $user="root";
     $password="";
		try{
		   $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
		   $req = "SELECT * FROM RECRUTEMENT ORDER BY ID_RECRUTEMENT ASC";
		   $res =  $connexion->query($req);
		   while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
			echo "<tr>";
			echo "<td>" . $tuple["ID_RECRUTEMENT"] . "</td>";
			echo "<td>" . $tuple["NOM_RECRUTEUR"] . "</td>";
			echo "<td>" . $tuple["GENDER"] . " </td>";
			echo "<td>" . $tuple["DATE_DE_ENVOI"] . " </td>";
			echo "<td>" . $tuple["CV"] . "</td>";
			echo "<td><a href='AccéptationRecrutement.php?id=".$tuple["ID_RECRUTEMENT"]."'><button>Accepter</button></a></td>";
			echo "<td><a href='RéfuseRécrutement.php?id=".$tuple["ID_RECRUTEMENT"]."'><button >Réfuser</button></a></td>";
			echo "</tr>";
    		}
			   
	   }
	   catch (PDOException $e) 
   {
	   echo "Erreur ! " . $e->getMessage() . "<br/>";
   }		
		
    }
	?>
    <h1>Liste des Recrutements</h1>
	<a href="gestionComptes.php"><img src="icons/logoo1.png" id="logo"></a>
	<table>
		<thead>
			<tr>
				<th>ID Récrutement</th>
				<th>Nom Récruteur</th>
				<th>Genre</th>
				<th>Date d'envoi</th>
				<th>CV</th>
				<th>Accepetation</th>
				<th>Suppression</th>
			</tr>
		</thead>
		<tbody>
			 <?php afficherDemandesRecrutement(); ?>
		</tbody>
	</table>
	
	
	

</body>
</html>
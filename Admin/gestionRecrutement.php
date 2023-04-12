<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DES RECRUTEMENT</title>
    <link rel="stylesheet" href="gestionPack.css">
</head>
<body>
	<?php 
	 function afficherDemandesRecrutement()
	 {
        /*
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
		*/
    }
	?>
    <h1>Liste des Récrutements</h1>
	<table>
		<thead>
			<tr>
				<th>ID Récrutement</th>
				<th>Date d'envoi</th>
				<th>CV</th>
			</tr>
		</thead>
		<tbody>
			 <?php afficherDemandesRecrutement(); ?>
		</tbody>
	</table>
	<a href="AccéptationRecrutement.php">
        <button style="margin-top: 50px;margin-left: 250px;">Accépter un Récrutement</button></a>
	<a href='RéfuseRécrutement.php'><button>Réfuser un Récrutement</button></a>
	

</body>
</html>
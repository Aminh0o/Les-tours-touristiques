<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DES RESERVATIONS</title>
    <link rel="stylesheet" href="gestionPack.css">
</head>
<body>
	<?php 
	 function afficherDemandesRecrutement()
	 {
        
	 $server="localhost";
     $nom_bdd="essai";
     $user="root";
     $password="";
		try{
		   $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
		   $req = "SELECT * FROM RESERVATION ORDER BY ID_RESERVATION ASC";
		   $res =  $connexion->query($req);
		   while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
			echo "<tr>";
			echo "<td>" . $tuple["ID_RESERVATION"] . "</td>";
			echo "<td>" . $tuple["NOM_RESERVATION"] . "</td>";
			echo "<td>" . $tuple["DATE_RESERVATION"] . " </td>";
			echo "<td>" . $tuple["NBR_PLACES_DEMANDE"] . "</td>";
			echo "<td>	<a href='supprimerReservation.php?id=".$tuple["ID_RESERVATION"]."'><button>Supprimer</button></a></td>";
			echo "</tr>";
    		}
			
		   
	   }
	   catch (PDOException $e) 
   {
	   echo "Erreur ! " . $e->getMessage() . "<br/>";
   }		
		
    }
	?>
    <h1>Liste des Reservations</h1>
	<a href="AdminPrincipal.php"><img src="icons/logoo1.png" id="logo"></a>
	<table>
		<thead>
			<tr>
				<th>ID Reservation</th>
				<th>Nom Reservation</th>
				<th>Date de Reservation</th>
				<th>Nombre Places Demandé</th>
				<th>Suppression</th>
			</tr>
		</thead>
		<tbody>
			 <?php afficherDemandesRecrutement(); ?>
		</tbody>
	</table>
	
	

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DES AVIS</title>
    <link rel="stylesheet" href="gestionPack.css">
</head>
<body>
	<?php 
	 function afficherAvis()
	 {
	/* $server="localhost";
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
    <h1>Liste des AVIS</h1>
	<table>
		<thead>
			<tr>
				<th>ID Avis</th>
				<th>Message Avis</th>
				<th>Email</th>
				<th>ID_User</th>
                <th>Rating</th>
			</tr>
		</thead>
		<tbody>
			 <?php afficherAvis(); ?>
		</tbody>
	</table>
	<a href="publierAvis.php">
        <button style="margin-right: 20px;margin-left: 300px;">Publier une avis</button></a>
	<a href='suppressionAvis.php'><button>supprimer une avis</button></a>
	

</body>
</html>
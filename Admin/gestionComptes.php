<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DES COMPTES</title>
    <link rel="stylesheet" href="gestionPack.css">
</head>
<body>
	<?php 
	 function afficherComptes()
	 {
    
	 $server="localhost";
     $nom_bdd="essai";
     $user="root";
     $password="";
		try{
		   $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
		   $req = "SELECT * FROM COMPTE ORDER BY ID_COMPTE ASC";
		   $res =  $connexion->query($req);
		   while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
			echo "<tr>";
			echo "<td>" . $tuple["ID_COMPTE"] . "</td>";
			echo "<td>" . $tuple["NOM"] . "</td>";
			echo "<td>" . $tuple["LOGIN_COMPTE"] . " </td>";
			echo "<td>" . $tuple["MOT_DE_PASSE"] . "</td>";
			echo "<td><a href='modificationCompte.php?id=".$tuple["ID_COMPTE"]."'><button>Modifier</button></a></td>";
			echo "<td><a href='suppressionCompte.php?id=".$tuple["ID_COMPTE"]."'><button>Supprimer</button></a></td>";
			echo "</tr>";
    		}

	   }
	   catch (PDOException $e) 
   {
	   echo "Erreur ! " . $e->getMessage() . "<br/>";
   }		
		
    }
	?>
    <h1>Liste des Comptes</h1>
	<a href="AdminPrincipal.php"><img src="icons/logoo1.png" id="logo"></a>
	<table>
		<thead>
			<tr>
				<th>ID Compte</th>
				<th>NOM </th>
				<th>Login Compte</th>
				<th>Mot de passe</th>
				<th>Modification</th>
				<th>Suppression</th>
                
			</tr>
		</thead>
		<tbody>
			 <?php afficherComptes(); ?>
		</tbody>
	</table>
	<a href="créationCompte.php"><button id="cree">Créer un Compte</button></a>
	

</body>
</html>
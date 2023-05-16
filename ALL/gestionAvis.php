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
	 $server="localhost";
     $nom_bdd="discoveralgeria";
     $user="root";
     $password="";
		
   try {
    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
    $req = "SELECT * FROM AVIS ORDER BY ID_AVIS ASC";
    $res =  $connexion->query($req);
while($tuple = $res->fetch(PDO::FETCH_ASSOC)) {
	$_SESSION["id"] = $tuple["ID_AVIS"];
    echo "<tr>";
    echo "<td>" . $tuple["ID_AVIS"] . "</td>";
    echo "<td>" . $tuple["MESSAGE_AVIS"] . "</td>";
    echo "<td>" . $tuple["EMAIL"] . "</td>";
    echo "<td>" . $tuple["ID_USER"] . "</td>";
    echo "<td>" . $tuple["RATING"] . "</td>";
	echo "<td><a href='publierAvis.php?id=".$_SESSION["id"]."'><button type='button' >publier</button></a></td>";
	echo "<td><a href='suppressionAvis.php?id=".$_SESSION["id"]."'><button type='button' name='submitSupprimer'>Supprimer</button></a></td>";
	echo "</tr>";
}



} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

		
    }
	?>
    <h1>Liste des AVIS</h1>
	<a href="AdminPrincipal.php#NavGestion2"><img src="icons/logoo1.png" id="logo"></a>
	<table>
		<thead>
			<tr>
				<th>ID Avis</th>
				<th>Message Avis</th>
				<th>Email</th>
				<th>ID_User</th>
                <th>Rating</th>
				<th>Publier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<tbody>
			 <?php afficherAvis(); ?>
		</tbody>
	</table>
	

	

</body>
</html>
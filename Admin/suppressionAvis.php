<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="suppressionPack.css">
    <title>Avis - Suppression</title>
</head>
<body>
    <header>
        <h1>Suppression d'avis</h1>
      </header>
        <div>
            <form class="form" method="post" action="suppressionPack.php">
              <label>ID Avis</label>
              <input type="number" size="20" name="NumeroPack" placeholder="Enter ID de avis à supprimer"><br>
        
              <input type="submit"  value="supprimer" name="submit" id="submit">
            </form>
        </div>
</body>
</html>
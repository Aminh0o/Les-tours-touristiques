<?php
        session_start();
        $server="localhost";
                $nom_bdd="essai";
                $user="root";
                $password="";
        if(isset($_GET["id"]) && isset($_POST["update"])){
                $id_PACK = $_GET["id"]; 
                $update_query = "";
                $update_params = [];
                if (isset($_POST["catégorie"]) && !empty($_POST["catégorie"])) {
                    $update_query .= "CATEGORIE = ?, ";
                    $update_params[] = $_POST["catégorie"];
                }
                if (isset($_POST["typePack"]) && !empty($_POST["typePack"])) {
                    $update_query .= "TYPE_PACK = ?, ";
                    $update_params[] = $_POST["typePack"];
                }
                if (isset($_POST["wilaya"]) && !empty($_POST["wilaya"])) {
                    $wilaya = "";
                    switch ($_POST["wilaya"]) {
                        case 13:
                            $wilaya = "TLEMCEN";
                            break;
                        case 16:
                            $wilaya = "ALGER";
                            break;
                        case 31:
                            $wilaya = "ORAN";
                            break;
                        case 6:
                            $wilaya = "BEJAIA";
                            break;
                        case 25:
                            $wilaya = "CONSTANTINE";
                            break;

                        case "sahara":
                            $wilaya = "SAHARA";
                         break;

                        default:
                            http_response_code(400);
                            echo "La valeur de la wilaya est invalide.";
                            exit;
                    }

                    $update_query .= "WILAYA = ?, ";
                    $update_params[] = $wilaya;
                }
                if (isset($_POST["PrixPack"]) && !empty($_POST["PrixPack"])) {
                    $update_query .= "PRIX = ?, ";
                    $update_params[] = $_POST["PrixPack"];
                }
               if(!empty($update_query))
               {
                $update_query = rtrim($update_query, ", ");
                $update_params[] = $id_PACK;
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
                $req  = "UPDATE PACK SET $update_query WHERE NUMEROPACK = ?";
                $stmt = $connexion->prepare($req);
                $stmt->execute($update_params);
                header("location:gestionPack.php");
            }
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modificationPack.css">
    <title>PACK - Modification</title>
</head>
<body>
    <header>
        <h1>Modification du PACK</h1>
      </header>
      <div>
            <form class="form" method="post" >
              <label>Category</label>
              <select name="catégorie" id="pack" >
                    <option value="normal">NORMAL</option>
                    <option value="special">SPECIAL</option>
                    <option value="royal">ROYAL</option>
              </select>
              
        
              <label>Wilaya</label>
              <select name="wilaya" id="wilaya">
                <option value="13">TLEMCEN</option>
                <option value="31">ORAN</option>
                <option value="16">ALGER</option>
                <option value="25"> CONSTANTINE</option>
                <option value="06">BEJAIA</option>
                <option value="sahara">SAHARA</option>
            </select>

            <label>Type Pack</label>
            <input type="radio" name="typePack" value="ADULT" checked >ADULT
            <input type="radio" name="typePack" value="FAMILY">FAMILY
            <input type="radio" name="typePack" value="PERSONAL">PERSONAL

           

            <label>PRIX</label>
              <input type="number" size="20" name="PrixPack" placeholder="Enter the new Price of pack"><br>

            <input type="submit"  value="modifier" name="update" id="submit">

        </form>
    </div>
</body>
</html>

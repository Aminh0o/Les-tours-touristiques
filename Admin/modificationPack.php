<?php
    $server = "localhost";
    $nom_bdd = "essai";
    $user = "root";
    $password = "";
    session_start();

    try {
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST["NumeroPack"]) && !empty($_POST["NumeroPack"])) {
            $numeroPack = $_POST["NumeroPack"];

            
            $req_check = "SELECT COUNT(*) FROM PACK WHERE NUMEROPACK = ?";
            $stmt_check = $connexion->prepare($req_check);
            $stmt_check->execute([$numeroPack]);
            $pack_count = $stmt_check->fetchColumn();

            if ($pack_count > 0) {
                $update_query = "";
                $update_params = [];

                if (isset($_POST["catégorie"]) && !empty($_POST["catégorie"])) {
                    $update_query .= "CATEGORIE = ?, ";
                    $update_params[] = $_POST["catégorie"];
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

                if (!empty($update_query)) {
                    $update_query = rtrim($update_query, ", ");
                    $update_params[] = $numeroPack;

                    $req = "UPDATE PACK SET $update_query WHERE NUMEROPACK = ?";
                    $stmt = $connexion->prepare($req);
                    $stmt->execute($update_params);
                    echo "<script> alert('Le pack a été mis à jour avec succès.')
                    window.location.href = 'gestionPack.php';
                    </script>";
                } else {
                    http_response_code(400);
                    echo "<script> alert('Aucune donnée valide n'a été fournie pour mettre à jour le pack.')
                    window.location.href = 'modificationPack.html';
                    </script>";  
                }
            } 
            else
            {
                echo "<script> alert('aucune pack existe dans la base de données')
                window.location.href = 'gestionPack.php';
                    </script>";
            }
        }
    }
        catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
<?php
          session_start();
          $server = "localhost";
          $nom_bdd = "essai";
          $user = "root";
          $password = "";
            if(isset($_SESSION["login"])){
              $email = $_SESSION["login"];
             
            try {
              $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
              $req = "SELECT * FROM ADMINISTRATEUR WHERE LOGIN_ADMIN = '$email' ";
              $resultat = $connexion->query($req);
          
              $tuple = $resultat->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
       
              echo "Erreur ! " . $e->getMessage() . "<br/>";
            }
          }     
?>

<?php
$data1 = array();
$wilayas = array('ALGER', 'TLEMCEN', 'ORAN', 'COSTANTINE', 'BEJAIA', 'SAHARA');
foreach ($wilayas as $wilaya) {
    $sql = "SELECT COUNT(*) FROM PACK WHERE WILAYA = :wilaya";
    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(":wilaya" => $wilaya));
    $count1 = $stmt->fetchColumn();
    $data1[] = $count1;
}
$data2 = array();
$categories = array('ROYAL', 'SPECIAL', 'NORMAL');
foreach ($categories as $categorie) {
    $sql = "SELECT COUNT(*) FROM PACK WHERE CATEGORIE = :categorie";
    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(":categorie" => $categorie));
    $count2 = $stmt->fetchColumn();
    $data2[] = $count2;
}

?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="AdminPrincipal.css" />
    <link href="img/icons/css/icons.css" rel="stylesheet">
    <script src="chart.js" ></script>
    <script src="helpers.esm.min.js"></script>
  </head>
  <body>
    <header class="header">
      
      <div class="sectionGauche">
        <form>
          <input type="text" placeholder="Rechercher...">
          <button type="submit">Search</button>
        </form>
      </div>
      <div class="sectionMilieu">
        <a href="InterfaceClient.html"><img src="img/logoo.png" id="logo"></a>
      </div>

      <div class="sectionDroite">
        <a href="" id="notification-paragraph">
          <span class="fi fi-sr-bell-ring" id="notification-img"></span>
            <p>Notifications</p>
        </a>
      </div>
     
  
    <nav id="navBar">
      <ul>
        <li class="nav-logo" >
          <a href="#NavGestion1" onclick="ScrollNav(this)">

           <span class="fi fi-sr-user" class="img-item">
              <?php echo "<span class='nav-item' id='admin'>".$tuple["NOM"]."</span></a>"; ?> 
          </li>

        <li>
          <a href="#NavGestion2" onclick="ScrollNav(this)">
            <span class="fi fi-sr-home" class="img-item">
            <span class="nav-item">HOME</span>
          </a>
        </li>
        <li>
          <a href="#message" onclick="ScrollNav(this)">
            <span class="fi fi-sr-envelope" class="img-item">
            <span class="nav-item">MESSAGE</span>
          </a>
        </li>
        <li>
          <a href="#stats" onclick="ScrollNav(this)">
            <span class="fi fi-sr-clipboard-list-check" class="img-item">
            <span class="nav-item">STATS</span>
          </a>
        </li>
        <li class="gestionButton" id="gestionButton">
          <a href="#NavGestion3" onclick="ScrollNav(this)">
            <span class="fi fi-sr-settings" class="img-item">
            <span class="nav-item">GESTIONS</span>
          </a>
        </li>
        <li class="nav-logout">
          <a href="logoutAdmin.php">
            <span class="fi fi-sr-sign-out-alt" class="img-item">
            <span class="nav-item">LOGOUT</span>
          </a>
        </li>

      </ul>
    </nav>

    <section id="NavGestion1">
       <div>
        
       </div> 
    </section>

    <section class="gestion" id="stats">
          <div>
            <canvas id="graphe1" width="380px" height="200px"></canvas>
          </div>

          <div>
            <canvas id="graphe2" width="380px" height="200px"></canvas>
          </div>

    </section>

    
    
    <section  id="NavGestion2">
  
    </section>
    
     <section  class="gestion" id="NavGestion3">
        <div class="PackGestion">
        <h3>GESTION DES PACKS</h3>
        <p> gérer tous les packs  </p>
        <a href="gestionPack.php"><button >View Détails</button></a>
       </div>

       <div class="PackGestion">
        <h3>GESTION DES AVIS</h3>
        <p>gérer tous les avis des utilisateurs </p>
        <a href="gestionAvis.php"><button>View Détails</button></a>
       </div>

       <div class="PackGestion">
        <h3>GESTION DES COMPTES</h3>
        <p>gérer tous les comptes   </p>
        <a href="gestionComptes.php"><button>View Details</button></a>
       </div>

       <div class="PackGestion">
        <h3>GESTION DES RECRUTEMENT</h3>
        <p>gérer tous les demandes de recrutement  </p>
        <a href="gestionRecrutement.php"><button>View Détails</button></a>
       </div>

       <div class="PackGestion">
        <h3>GESTION DES RESERVATION</h3>
        <p>gérer tous les réservations  </p>
        <a href="gestionReservation.php"> <button>View Détails</button></a> 
       </div>
     </section>
     <footer>

     </footer>
     
     <script>
      //******************************************************//
      function ScrollNav(link)
      {
        var NavGestion = [
          document.getElementById("NavGestion1"),
        document.getElementById("NavGestion2"),
        document.getElementById("NavGestion3"),
        document.getElementById("stats")];
        for(var i = 0 ; i<NavGestion.length ; i++ )
        {
          if(NavGestion[i].id === link.getAttribute("href").substring(1))
          {
            NavGestion[i].style.visibility = 'visible';
            }
          else
          NavGestion[i].style.visibility = 'hidden';  
        }
        
      }
      ScrollNav(document.querySelector('a[href="#stats"]'));
      //******************************************************//
      var graphe1 = document.getElementById("graphe1").getContext("2d");
      var myChart1 = new Chart(graphe1, {
    type: 'bar',
    data: {
        labels: ['ALGER', 'TLEMCEN', 'ORAN', 'COSTANTINE', 'BEJAIA', 'SAHARA'],
        datasets: [{
            label: 'Nombre des Packs par Wilaya',
            data: <?php echo json_encode($data1); ?>,
            backgroundColor: ['lightgreen', 'lightblue', 'gold'],
            borderColor: ['green', 'navy', 'black'],
            borderWidth: 2
        }]
    },
    options: {
      responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        title: {
            display: true,
        },
        legend: {
          
            display: false
        }
    }
});

//******************************************************//
var graphe2 = document.getElementById("graphe2").getContext("2d");
      var myChart2 = new Chart(graphe2, {
    type: 'bar',
    data: {
        labels: ['ROYAL', 'SPECIAL', 'NORMAL'],
        datasets: [{
            label: 'Nombre des Packs par Catégorie',
            data: <?php echo json_encode($data2); ?>,
            backgroundColor: ['yellow', 'aqua','pink', 'lightgreen', 'lightblue', 'gold'],
            borderColor: ['red', 'blue', 'fuchsia','green', 'navy', 'black'],
            borderWidth: 2
        }]
    },
    options: {
      responsive: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        title: {
            display: true,
        },
        legend: {
          
            display: false
        }
    }
});




     </script>

  </body>
</html>
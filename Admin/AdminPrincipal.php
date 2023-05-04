<?php
          session_start();
          $server = "localhost";
          $nom_bdd = "essai";
          $user = "root";
          $password = "";
            if(isset($_SESSION["email"])){
              $email = $_SESSION["email"];
             
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
    $sql1 = "SELECT COUNT(*) FROM PACK WHERE WILAYA = :wilaya";
    $res1 = $connexion->prepare($sql1);
    $res1->execute(array(":wilaya" => $wilaya));
    $count1 = $res1->fetchColumn();
    $data1[] = $count1;
}
$data2 = array();
$categories = array('ROYAL', 'SPECIAL', 'NORMAL');
foreach ($categories as $categorie) {
    $sql2 = "SELECT COUNT(*) FROM PACK WHERE CATEGORIE = :categorie";
    $res2 = $connexion->prepare($sql2);
    $res2->execute(array(":categorie" => $categorie));
    $count2 = $res2->fetchColumn();
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
        <a href="InterfaceClient.php"><img src="icons/logoo1.png" id="logo"></a>
      </div>
      
    </header>

    <nav id="navBar">
      
      <ul>
        <li class="nav-logo" >
          <a href="#NavGestion1" onclick="ScrollNav(this)">
            <span class="fi-sr-user" class="img-item">
            <?php echo "<span class='nav-item' id='admin'>".$tuple["NOM"]."</span>"; ?>
          </a>
        </li>

        <li>
          <a href="#NavGestion2" onclick="ScrollNav(this)">
            <span class="fi-sr-home" class="img-item">
            <span class="nav-item">HOME</span>
          </a>
        </li>
        
        <li>
          <a href="#notifications" onclick="ScrollNav(this)">
            <span class="fi-sr-bell-ring" class="img-item">
            <span class="nav-item">NOTIFS</span>
          </a>
        </li>
        <li>
          <a href="#stats" onclick="ScrollNav(this)">
            <span class="fi-sr-clipboard-list-check" class="img-item">
            <span class="nav-item">STATS</span>
          </a>
        </li>
        <li class="gestionButton" id="gestionButton">
          <a href="#NavGestion3" onclick="ScrollNav(this)">
            <span class="fi-sr-settings" class="img-item">
            <span class="nav-item">GESTIONS</span>
          </a>
        </li>
        <li class="nav-logout">
          <a href="logoutAdmin.php">
            <span class="fi-sr-sign-out-alt" class="img-item">
            <span class="nav-item">LOGOUT</span>
          </a>
        </li>
      </ul>
    </nav>

    <section  id="NavGestion1">
      
    </section>
    <section  id="NavGestion2">
    <aside>
    <a href="InterfaceClient.php"><button>Interface Client</button></a>
    <a href="InterfaceClient.php"><button>Interface Guide</button></a>
    <a href="adminHeberg.php"><button>Interface Admin-heberg</button></a>
    <a href="InterfaceClient.php"><button>Interface Admin-resto</button></a>
    <a href="InterfaceClient.php"><button>Interface Admin-Transpo</button></a>
   </aside>

   <?php 
    function listeClients()
    {
          $server = "localhost";
          $nom_bdd = "essai";
          $user = "root";
          $password = "";
          try {
            $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
            $req = "SELECT NOM,EMAIL FROM UTILISATEUR";
            $resultat = $connexion->query($req);
            while( $tuple = $resultat->fetch(PDO::FETCH_ASSOC)){
              echo "
              <tr>
              <td>".$tuple["NOM"]."</td>
             <td>".$tuple["EMAIL"]."</td>
               </tr>
              
              ";
            }
          }
           catch (PDOException $e) {
     
            echo "Erreur ! " . $e->getMessage() . "<br/>";
          }

    }
   
   ?>

   <main>
   <div id='list-client'>
    <h3>liste des clients</h3>
   <table>
		<thead>
			<tr>
				<th>NOM</th>
				<th>EMAIL</th>
			</tr>
		</thead>
		<tbody>
			<?php listeClients(); ?>
		</tbody>
	</table>
   </div>

   <?php
      $server = "localhost";
      $nom_bdd = "essai";
      $user = "root";
      $password = "";
      $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
            $req1 = "SELECT count(*) as 'nombre_guide'  FROM GUIDE";
            $resultat1 = $connexion->query($req1);
            $nombre_guide = $resultat1->fetch(PDO::FETCH_ASSOC);

            $req2 = "SELECT count(*) as 'nombre_admin_transpo'  FROM ADMIN_TRANSPORT";
            $resultat2 = $connexion->query($req2);
            $nombre_admin_transpo = $resultat2->fetch(PDO::FETCH_ASSOC);

            $req3 = "SELECT count(*) as 'nombre_admin_hebergement'  FROM ADMIN_HEBERGEMENT";
            $resultat3 = $connexion->query($req3);
            $nombre_admin_heberg = $resultat3->fetch(PDO::FETCH_ASSOC);

            $req4 = "SELECT count(*) as 'nombre_admin_resto'  FROM ADMIN_RESTAURATION";
            $resultat4 = $connexion->query($req4);
            $nombre_admin_resto = $resultat4->fetch(PDO::FETCH_ASSOC);
    ?>
        
         <div id="nombre_guides">
          <h3>Nombres des Guides ajouter</h3>
          <?php  echo "<p>".$nombre_guide["nombre_guide"]."</p>"; ?>
         </div>

         <div id="nombre_admin_heberg">
          <h3>Nombres des Admin-heberg</h3>
          <?php  echo "<p>".$nombre_admin_heberg["nombre_admin_hebergement"]."</p>"; ?>
         </div>

         <div id="nombre_admin_transpo">
          <h3>Nombres des Admins-transpo</h3>
          <?php  echo "<p>".$nombre_admin_transpo["nombre_admin_transpo"]."</p>"; ?>
         </div>

         <div id="nombre_admin_resto">
          <h3>Nombres des Admins-resto</h3>
          <?php  echo "<p>".$nombre_admin_resto["nombre_admin_resto"]."</p>"; ?>
         </div>
       
   

   </main>



    </section>

    <section class="gestion" id="stats">
          <div>
            <canvas id="graphe1" width="430px" height="200px"></canvas>
          </div>

          <div>
            <canvas id="graphe2" width="380px" height="200px"></canvas>
          </div>

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
        <h3>GESTION DES RECRUTEMENTS</h3>
        <p>gérer tous les demandes de recrutement  </p>
        <a href="gestionRecrutement.php"><button>View Détails</button></a>
       </div>

       <div class="PackGestion">
        <h3>GESTION DES RESERVATIONS</h3>
        <p>gérer tous les réservations  </p>
        <a href="gestionReservation.php"> <button>View Détails</button></a> 
       </div>
    </section>

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
      ScrollNav(document.querySelector('a[href="#NavGestion2"]'));
      //*********************************************************//
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
                    beginAtZero: true,
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
                    beginAtZero: true,
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
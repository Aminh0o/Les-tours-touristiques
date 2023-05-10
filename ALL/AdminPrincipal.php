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
              $_SESSION["id_admin"] = $tuple["ID_ADMIN"];
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
    <link href="icons/icons/css/icons.css" rel="stylesheet">
    <script src="JS/chart.js" ></script>
    <script src="JS/helpers.esm.min.js"></script>
    <script src="JS/toastify-js/src/toastify.js"></script>
  </head>
  <body>
  
    <header class="header">
      <div class="sectionGauche">
        <a href="InterfaceClient.php"><img src="icons/logoo1.png" id="logo"></a>
      </div>
      <div class="sectionDroite">
            <a style="text-decoration: none;" href="notifAdmin.php"><span class="fi-sr-paper-plane"></span></a>
      </div>
    </header>

    <nav id="navBar">
      
      <ul>
        <li class="nav-logo" >
          <a href="#NavGestion1" >
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
          <a href="logout.php">
            <span class="fi-sr-sign-out-alt" class="img-item">
            <span class="nav-item">LOGOUT</span>
          </a>
        </li>
      </ul>
    </nav>

    <section  id="NavGestion2">
    <aside>
    <a href="InterfaceClient.php"><button>Interface Client</button></a>
    <a href="guide.php"><button>Interface Guide</button></a>
    <a href="adminHeberg.php"><button>Interface Admin-heberg</button></a>
    <a href="adminFood.php"><button>Interface Admin-resto</button></a>
    <a href="adminTransport.php"><button>Interface Admin-Transpo</button></a>
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
            $req = "SELECT * FROM UTILISATEUR";
            $resultat = $connexion->query($req);
            while( $tuple = $resultat->fetch(PDO::FETCH_ASSOC)){
              echo "
              <tr>
              <td>".$tuple["ID_UTILISATEUR"]."</td>
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
    <div class="affichage-donnes">
      <div id="nombre_guides" class="nombre-donnes">
        <h3>Nombres des Guides ajouter</h3>
        <?php  echo "<p>".$nombre_guide["nombre_guide"]."</p>"; ?>
      </div>
      
      <div id="nombre_admin_heberg" class="nombre-donnes">
        <h3>Nombres des Admin-heberg</h3>
        <?php  echo "<p>".$nombre_admin_heberg["nombre_admin_hebergement"]."</p>"; ?>
      </div>
      
      <div id="nombre_admin_transpo" class="nombre-donnes">
        <h3>Nombres des Admins-transpo</h3>
        <?php  echo "<p>".$nombre_admin_transpo["nombre_admin_transpo"]."</p>"; ?>
      </div>
      
      <div id="nombre_admin_resto" class="nombre-donnes">
        <h3>Nombres des Admins-resto</h3>
        <?php  echo "<p>".$nombre_admin_resto["nombre_admin_resto"]."</p>"; ?>
      </div>
    </div>

    <div class="list-client">
      <h3>liste des clients</h3>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>EMAIL</th>
          </tr>
        </thead>
        <tbody>
        <?php listeClients(); ?>
        </tbody>
      </table>
    </div>

    

    <div class="list-passager">
      <h3>liste des passagers</h3>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom Passager</th>
            <th>ID user</th>
          </tr>
        </thead>
        <tbody>
          <?php listePassager(); ?>
        </tbody>
      </table>
    </div>
    <?php 
    
    function listePassager()
    {
          $server = "localhost";
          $nom_bdd = "essai";
          $user = "root";
          $password = "";
          try {
            $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
            $req = "SELECT * FROM PASSAGER";
            $resultat = $connexion->query($req);
            while( $tuple = $resultat->fetch(PDO::FETCH_ASSOC)){
              $id_passger = $tuple["ID_PASSAGER"];
              $req_id_user_accomp = "SELECT ID_UTILISATEUR FROM ACCOMPAGNER WHERE ID_PASSAGER='$id_passger'";
              $res_id_user_accomp = $connexion->query($req_id_user_accomp);
              $tuple_id_user_accomp = $res_id_user_accomp->fetch(PDO::FETCH_ASSOC);
              $id_user = $tuple_id_user_accomp["ID_UTILISATEUR"];
              echo "
              <tr>
              <td>".$tuple["ID_PASSAGER"]."</td>
              <td>".$tuple["NOM"]."</td>
             <td>".$id_user."</td>
               </tr>
              
              ";
            }
          }
           catch (PDOException $e) {
            echo "Erreur ! " . $e->getMessage() . "<br/>";
          }
    }
    
    ?>

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

    
    <section  id="notifications" class="notifications">

      <div class="notifications-card">
        <h1>Notifications List</h1>
        <ul class="notif-list">
        <?php 
     
     $server = "localhost";
     $nom_bdd = "essai";
     $user = "root";
     $password = "";

     $id_admin = $tuple["ID_ADMIN"];

     try{

        $req = "SELECT * FROM NOTIF WHERE ID_RECEPTEUR='$id_admin' ORDER BY ID_NOTIF DESC";
        $info = $connexion->query($req);
        while($tuple = $info->fetch(PDO::FETCH_ASSOC))
        {
         $id_emetteur = $tuple["ID_EMETTEUR"];
         $_SESSION["id_notif"] = $tuple["ID_NOTIF"];

         if($id_emetteur==299)
         {
          echo "
          <li class='notif-item'>
       <div class='notif-icon'>
         <span class='fi-sr-bell-ring'></span>
       </div>
       <div class='notif-contenu'>
         <p class='notif-titre'>".$tuple["MESSAGE_NOTIF"]." </p>
         <p class='notif-message'>You have received a new message from  &nbsp<b>ADMIN_HEBERGEMENT</b></p>
       </div>
        </li>
          ";
         }
        else if($id_emetteur==199)
        {
          echo "
          <li class='notif-item'>
       <div class='notif-icon'>
         <span class='fi-sr-bell-ring'></span>
       </div>
       <div class='notif-contenu'>
         <p class='notif-titre'>".$tuple["MESSAGE_NOTIF"]." </p>
         <p class='notif-message'>You have received a new message from  &nbsp<b>ADMIN_TRANSPORT</b></p>
       </div>
        </li>

          ";
        }
        else if($id_emetteur==399)
        {
          echo "
          <li class='notif-item'>
       <div class='notif-icon'>
         <span class='fi-sr-bell-ring'></span>
       </div>
       <div class='notif-contenu'>
         <p class='notif-titre'>".$tuple["MESSAGE_NOTIF"]." </p>
         <p class='notif-message'>You have received a new message from  &nbsp<b>ADMIN_RESTAURATION</b></p>
       </div>
        </li>";
        }
        else if($id_emetteur==999)
        {
          echo "
          <li class='notif-item'>
       <div class='notif-icon'>
         <span class='fi-sr-bell-ring'></span>
       </div>
       <div class='notif-contenu'>
         <p class='notif-titre'>".$tuple["MESSAGE_NOTIF"]." </p>
         <p class='notif-message'>You have received a new message from  &nbsp<b>GUIDE</b></p>
       </div>
        </li>";
        }
        
         else{
         $req_nom = "SELECT NOM FROM UTILISATEUR WHERE ID_UTILISATEUR='$id_emetteur' ";
         $res_nom = $connexion->query($req_nom);
         $tuple_nom = $res_nom->fetch(PDO::FETCH_ASSOC);
          
          echo "
          <li class='notif-item'>
        <div class='notif-icon'>
         <span class='fi-sr-bell-ring'></span>
        </div>
       <div class='notif-contenu'>
         <p class='notif-titre'>".$tuple["MESSAGE_NOTIF"]." </p>
         <p class='notif-message'>You have received a new message from  &nbsp<b>". $tuple_nom["NOM"]."</b></p>
       </div>
        </li>
          ";}
        }
     }
     catch (PDOException $e) {

       echo "Erreur ! " . $e->getMessage() . "<br/>";
     }
?>

        </ul>
      </div>
    </section>

    

     <script>
      function ScrollNav(link)
      {
        var NavGestion = [
        document.getElementById("NavGestion2"),
        document.getElementById("notifications"),
        document.getElementById("stats"),
        document.getElementById("NavGestion3") ];
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
      </script>

      <script>
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
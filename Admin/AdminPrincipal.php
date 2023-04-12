<?php
function admin(){
session_start();
$server="localhost";
$nom_bdd="essai";
$user="root";
$password="";

  try{
    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd",$user,$password);
    $res = $connexion->query("SELECT NOM FROM ADMINISTRATEUR ");
    if($res && $res->rowCount() > 0) {
        $tuple = $res->fetch(PDO::FETCH_ASSOC);
        echo "<span class='nav-item' id='admin'>".$tuple["NOM"]."</span></a>";
    } 
  }
  

  catch (PDOException $e) 
  {
    echo "Erreur ! " . $e->getMessage() . "<br/>";
  }


}
?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="AdminPrincipal.css" />
    <link href="img/icons/css/icons.css" rel="stylesheet">
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
        <a href="InterfaceClient.php"><img src="img/logoo.png" id="logo"></a>
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
              <?php admin(); ?> 
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
          <a href="#report" onclick="ScrollNav(this)">
            <span class="fi fi-sr-clipboard-list-check" class="img-item">
            <span class="nav-item">REPORT</span>
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

    <section  id="NavGestion1">
    
    <div class="PackGestion">
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
      function ScrollNav(link)
      {
        var NavGestion = [document.getElementById("NavGestion1"),
        document.getElementById("NavGestion2"),
        document.getElementById("NavGestion3")];
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
      ScrollNav(document.querySelector('a[href="#NavGestion3"]'));
     </script>

  </body>
</html>
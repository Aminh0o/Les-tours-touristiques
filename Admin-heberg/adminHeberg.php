<?php
          session_start();
          $server = "localhost";
          $nom_bdd = "essai";
          $user = "root";
          $password = "";
            if(isset( $_SESSION["email"])){
              $email = $_SESSION["email"];
             
            try {
              $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
              $req = "SELECT * FROM ADMIN_HEBERGEMENT WHERE LOGIN_ADMIN_HEBERG = '$email' ";
              $resultat = $connexion->query($req);
          
              $tuple = $resultat->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
       
              echo "Erreur ! " . $e->getMessage() . "<br/>";
            }
          }     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sousAdmins.css" />
    <link href="img/icons/css/icons.css" rel="stylesheet">
    <title>Hebergement</title>
</head>

<body>
    <header class="header">
        <div class="sectionGauche">
            <a href="InterfaceClient.php"><img src="img/logoo.png" id="logo"></a>
        </div>
    </header>
  
      <nav id="navBar">
        <ul>
          <li class="nav-logo" >
            <a href="#NavGestion1" onclick="ScrollNav(this)">
              <span class="fi-sr-user" class="img-item">
              <?php 
              if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true)
              {
              echo"<span class='nav-item'>".$tuple["NOM"]."  </span>";
            }
            else
             echo"<span class='nav-item'>NAME</span>";
              ?>
            </a>
          </li>
  
          <li>
            <a href="#hebergement" onclick="ScrollNav(this)">
              <span class="fi-sr-apartment" class="img-item">
              <span class="nav-item">HEBERGEMENTS</span>
            </a>
          </li>
          <li>
            <a href="#notifications" onclick="ScrollNav(this)">
              <span class="fi-sr-bell-ring" class="img-item">
              <span class="nav-item">NOTIFS</span>
            </a>
          </li>
        
          <li class="nav-logout">
            <a href="logoutAdminHeberg.php">
              <span class="fi-sr-sign-out-alt" class="img-item">
              <span class="nav-item">LOGOUT</span>
            </a>
          </li>
        </ul>
      </nav>

      <section id="NavGestion1">

      </section>
  
      <section  id="hebergement">
      </section>

      <section id="notifications">

      </section>
    
        <script>
          function ScrollNav(link)
      {
        var NavGestion = [
        document.getElementById("NavGestion1"),
        document.getElementById("hebergement"),
        document.getElementById("notifications")];
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
      ScrollNav(document.querySelector('a[href="#NavGestion1"]'));
        </script>
</body>
</html>
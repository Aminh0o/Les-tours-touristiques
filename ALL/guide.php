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
              $req = "SELECT * FROM GUIDE WHERE LOGIN_GUIDE = '$email' ";
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
    <link rel="stylesheet" href="guide.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link href="icons/icons/css/icons.css" rel="stylesheet">
    <title>GUIDE</title>
</head>
<body>
    <header class="header">
        <div class="sectionGauche">
          <a href="InterfaceClient.php"><img src="icons/Logoo1.png" id="logo"></a>
        </div>
        <div class="sectionDroite">
        <?php echo "<a style='text-decoration: none;' href='notifGuide.php?'><span class='fi-sr-paper-plane'></span></a>";?>
        </div>
    </header>
  
      <nav id="navBar">
        <ul>
          <li class="nav-logo" >
            <a href="#NavGestion1" >
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
            <a href="#yt" onclick="ScrollNav(this)">
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
            <a href="#Report" onclick="ScrollNav(this)">
              <span class="fi-sr-chart-pie" class="img-item">
              <span class="nav-item">Skills</span>
            </a>
          </li>
          <li>
            <a href="cruds.php" onclick="ScrollNav(this)">
              <span class="fi-sr-chart-gantt" class="img-item">
              <span class="nav-item">Oragniser sortie</span>
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

      <section class="yt" id="yt" >
       
        <div class="profile-card">
          
         <div class="image-container">
              <img src="images/guide-touristique.jpeg" style="width: 100%">
              <div class="title">
        
               <?php 
              if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true)
              {
              echo"<h2>".$tuple["NOM"]."  </h2>";
            }
            else
             echo"<h2>NAME</h2>";
              ?>
 
              </div>
          </div>
        <div class="main-container">
 
           <p><i class="fa-solid fa-briefcase info"></i>guide Touristique</p>
           <p><i class="fa-solid fa-house info"></i>Oran</p>
           <p><i class="fa-solid fa-envelope info"></i>sifousimpa@gmail.com</p>
           <p><i class="fa-solid fa-phone info"></i>0659763456</p>
           <hr>  
         </div>
        </div>

     </section>

     <section class="notifications" id="notifications">
     <div class="notifications-card">
        <h1>Notifications List</h1>
        <ul class="notif-list">
        <?php 
          $server = "localhost";
          $nom_bdd = "essai";
          $user = "root";
          $password = "";
          
          $id_guide = $tuple["ID_GUIDE"];
          try
          {
            $req = "SELECT * FROM NOTIF WHERE ID_RECEPTEUR='$id_guide' ORDER BY ID_NOTIF DESC";
            $info = $connexion->query($req);
            while($tuple = $info->fetch(PDO::FETCH_ASSOC))
            {
              $id_emetteur = $tuple["ID_EMETTEUR"];
              $_SESSION["id_notif"] = $tuple["ID_NOTIF"];
              echo  "
                      <li class='notif-item'>
                        <div class='notif-icon'>
                          <span class='fi-sr-bell-ring'></span>
                        </div>
                        <div class='notif-contenu'>
                          <p class='notif-titre'>".$tuple["MESSAGE_NOTIF"]." </p>
                          <p class='notif-message'>You have received a new message from <b>ADMINISTRATEUR</b></p>
                        </div>
                      </li>
                    ";
            }
          }
          catch (PDOException $e) { echo "Erreur ! " . $e->getMessage() . "<br/>"; }
        ?>
        </ul>
      </div>
     </section>

     <section class="Report" id="Report">
        <div class="Skills">
            <div class="Skills_CARD">
              <h1>YOUR STATIC</h1>
              <div class="border-line"></div>
                <p><b><i class="fa-solid fa-asterisk info"></i>Skills</b></p>
                
                <div class="skill">
                  <p><b>Language usage</b></p>
                  <div class="skill-bar">
                    <div class="progress-bar" style="width: 0%;" data-progress="80%">80%</div>
                  </div>
                </div>
                
                <div class="skill">
                  <p><b>Knowing The places</b></p>
                  <div class="skill-bar">
                    <div class="progress-bar" style="width: 0%;" data-progress="98%">98%</div>
                  </div>
                </div>
                
                <div class="skill">
             
             <p><b>Group</b></p>
             <div class="skill-bar">
               <div class="progress-bar" style="width: 0%;" data-progress="60%">60%</div>
             </div>
             <script src="JS/progressBar.js"></script>
           </div>
           
           <div class="containe">
             <div class="circular-progress">
                 <span class="progress-value">0%</span>
             </div>
 
             <span class="text">OVER ALL</span>
             <script src="JS/progress.js"></script>
         </div>
         </div>
        </div>
        </div>

     </section>
     
     <Script>

      function ScrollNav(link){
       var NavGestion = [
       document.getElementById("yt"),
       document.getElementById("Report"),
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
       ScrollNav(document.querySelector('a[href="#yt"]'));
      </Script>
</body>
</html>
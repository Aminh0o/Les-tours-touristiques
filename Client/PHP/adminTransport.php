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
              $req = "SELECT * FROM ADMIN_TRANSPORT WHERE LOGIN_ADMIN_TRANSP = '$email' ";
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
    <link rel="stylesheet" href="sousAdmin.css"/>
    <link href="icons/icons/css/icons.css" rel="stylesheet">
    <title>Transport</title>
  </head>
  <body>
    <header class="header">
        <div class="sectionGauche">
            <a href="InterfaceClient.php"><img src="icons/Logoo1.png" id="logo"></a>
        </div>
        <div class="sectionDroite">
            <a style="text-decoration: none;" href="notif.php"><span class="fi-sr-paper-plane"></span></a>
        </div>
    </header>

    <nav id="navBar">
      <ul>
        <li class="nav-logo" >
          <a href="#profil">
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
          <a href="#transport" onclick="ScrollNav(this)">
            <span class="fi-sr-bus" class="img-item">
            <span class="nav-item">TRANSPORTS</span>
          </a>
        </li>
        <li>
          <a href="#notifications" onclick="ScrollNav(this)">
            <span class="fi-sr-bell-ring" class="img-item">
            <span class="nav-item">NOTIFS</span>
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
    
    <?php 
     
        $server = "localhost";
        $nom_bdd = "essai";
        $user = "root";
        $password = "";
      
          
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);

                $req1 = "SELECT count(*) 'nombre_transp_alger' FROM TRANSPORT WHERE ADRESSE = 'alger' ";
                $resultat1 = $connexion->query($req1);
                $tuple1 = $resultat1->fetch(PDO::FETCH_ASSOC);

                $req2 = "SELECT count(*) 'nombre_transp_tlm' FROM TRANSPORT WHERE ADRESSE = 'tlemcen' ";
                $resultat2 = $connexion->query($req2);
                $tuple2 = $resultat2->fetch(PDO::FETCH_ASSOC);

                $req3 = "SELECT count(*) 'nombre_transp_oran' FROM TRANSPORT WHERE ADRESSE = 'oran' ";
                $resultat3 = $connexion->query($req3);
                $tuple3 = $resultat3->fetch(PDO::FETCH_ASSOC);

                $req4 = "SELECT count(*) 'nombre_transp_cos' FROM TRANSPORT WHERE ADRESSE = 'constantine' ";
                $resultat4 = $connexion->query($req4);
                $tuple4 = $resultat4->fetch(PDO::FETCH_ASSOC);

                $req5 = "SELECT count(*) 'nombre_transp_bej' FROM TRANSPORT WHERE ADRESSE = 'bejaia' ";
                $resultat5 = $connexion->query($req5);
                $tuple5 = $resultat5->fetch(PDO::FETCH_ASSOC);

                $req6 = "SELECT count(*) 'nombre_transp_sah' FROM TRANSPORT WHERE ADRESSE = 'sahara' ";
                $resultat6 = $connexion->query($req6);
                $tuple6 = $resultat6->fetch(PDO::FETCH_ASSOC);
                
             
            }
            catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>";}
    ?>

  
    <section id="transport" class="THR">
      <div class="wilaya-card">
        <div class="wilaya">
          <a href="#?wilaya=alger" onclick="afficherTableauAlger()">
            <h2 class="wilaya-title">ALGIERS</h2>
            <h3 class="wilaya-subtitle">Transport</h3>
            <?php echo "<p class='wilaya-number'>#".$tuple1["nombre_transp_alger"]."</p>" ?>
            
          </a>
        </div>

        <div class="wilaya">
          <a href="#?wilaya=tlemcen" onclick="afficherTableauTlm() ">
            <h2 class="wilaya-title">TLEMCEN</h2>
            <h3 class="wilaya-subtitle">Transport</h3>
            <?php echo "<p class='wilaya-number'>#".$tuple2["nombre_transp_tlm"]."</p>" ?>
          </a>
        </div>

        <div class="wilaya">
          <a href="#?wilaya=oran" onclick="afficherTableauOran() ">
            <h2 class="wilaya-title">ORAN</h2>
            <h3 class="wilaya-subtitle">Transport</h3>
            <?php echo "<p class='wilaya-number'>#".$tuple3["nombre_transp_oran"]."</p>" ?>
          </a>
        </div>

        <div class="wilaya">
          <a href="#?wilaya=constantine" onclick="afficherTableauCos()">
            <h2 class="wilaya-title">CONSTANTINE</h2>
            <h3 class="wilaya-subtitle">Transport</h3>
            <?php echo "<p class='wilaya-number'>#".$tuple4["nombre_transp_cos"]."</p>" ?>
          </a>
        </div>

        <div class="wilaya">
          <a href="#?wilaya=bejaia" onclick="afficherTableauBejaia() ">
            <h2 class="wilaya-title">BEJAIA</h2>
            <h3 class="wilaya-subtitle">Transport</h3>
            <?php echo "<p class='wilaya-number'>#".$tuple5["nombre_transp_bej"]."</p>" ?>
          </a>
        </div>

        <div class="wilaya">
          <a href="#?wilaya=sahara" onclick=" afficherTableauSahara() ">
            <h2 class="wilaya-title">SAHARA</h2>
            <h3 class="wilaya-subtitle">Transport</h3>
            <?php echo "<p class='wilaya-number'>#".$tuple6["nombre_transp_sah"]."</p>" ?>
          </a>
        </div>
      </div>
    </section>

    <section  id="notifications" class="notifications">
      <div class="notifications-card">
        <h1>Notifications List</h1>
        <ul class="notif-list">
          <li class="notif-item">
            <div class="notif-icon">
              <span class="fi-sr-bell-ring"></span>
            </div>
            <div class="notif-contenu">
              <p class="notif-titre">New Message</p>
              <p class="notif-message">You have received a new message from <b>aminho</b></p>
            </div>
          </li>
          <li class="notif-item">
            <div class="notif-icon">
              <i class="fi-sr-bell-ring"></i>
            </div>
            <div class="notif-contenu">
              <p class="notif-titre">New Message</p>
              <p class="notif-message">You have received a new message from <b>aminho</b></p>
            </div>
          </li>
          <li class="notif-item">
            <div class="notif-icon">
              <i class="fi-sr-bell-ring"></i>
            </div>
            <div class="notif-contenu">
              <p class="notif-titre">New Message</p>
              <p class="notif-message">You have received a new message from <b>aminho</b></p>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <?php 
      function afficherTransportAlger()
      {
        $server = "localhost";
        $nom_bdd = "essai";
        $user = "root";
        $password = "";
            try{
                $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
                $req = "SELECT * FROM TRANSPORT WHERE ADRESSE = 'alger' ";
                $resultat = $connexion->query($req);
                while($tuple = $resultat->fetch(PDO::FETCH_ASSOC))
                {
                    echo "
                    <tr>
                  <td>".$tuple["ID_TRANSPORT"]."</td>
                  <td>".$tuple["NOMACCOMPAGNE"]."</td>
                  <td>".$tuple["TYPE_TRANSPORT"]."</td>
                  <td>".$tuple["ADRESSE"]."</td>
                  <td>".$tuple["TELEPHONE"]."</td>
                  <td><button>DELETE</button></td>
                </tr>
                    ";
                }
             
            }
            catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>";}
        }

        function afficherTransportTlm()
        {
          $server = "localhost";
          $nom_bdd = "essai";
          $user = "root";
          $password = "";
              try{
                  $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
                  $req = "SELECT * FROM TRANSPORT WHERE ADRESSE = 'tlemcen' ";
                  $resultat = $connexion->query($req);
                  while($tuple = $resultat->fetch(PDO::FETCH_ASSOC))
                  {
                      echo "
                      <tr>
                    <td>".$tuple["ID_TRANSPORT"]."</td>
                    <td>".$tuple["NOMACCOMPAGNE"]."</td>
                    <td>".$tuple["TYPE_TRANSPORT"]."</td>
                    <td>".$tuple["ADRESSE"]."</td>
                    <td>".$tuple["TELEPHONE"]."</td>
                    <td><button>DELETE</button></td>
                  </tr>
                      ";
                  }
               
              }
              catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>";}
          }
          function afficherTransportOran()
          {
            $server = "localhost";
            $nom_bdd = "essai";
            $user = "root";
            $password = "";
                try{
                    $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
                    $req = "SELECT * FROM TRANSPORT WHERE ADRESSE = 'oran' ";
                    $resultat = $connexion->query($req);
                    while($tuple = $resultat->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "
                        <tr>
                      <td>".$tuple["ID_TRANSPORT"]."</td>
                      <td>".$tuple["NOMACCOMPAGNE"]."</td>
                      <td>".$tuple["TYPE_TRANSPORT"]."</td>
                      <td>".$tuple["ADRESSE"]."</td>
                      <td>".$tuple["TELEPHONE"]."</td>
                      <td><button>DELETE</button></td>
                    </tr>
                        ";
                    }
                 
                }
                catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>";}
            }
            function afficherTransportCos()
            {
              $server = "localhost";
              $nom_bdd = "essai";
              $user = "root";
              $password = "";
                  try{
                      $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
                      $req = "SELECT * FROM TRANSPORT WHERE ADRESSE = 'constantine' ";
                      $resultat = $connexion->query($req);
                      while($tuple = $resultat->fetch(PDO::FETCH_ASSOC))
                      {
                          echo "
                          <tr>
                        <td>".$tuple["ID_TRANSPORT"]."</td>
                        <td>".$tuple["NOMACCOMPAGNE"]."</td>
                        <td>".$tuple["TYPE_TRANSPORT"]."</td>
                        <td>".$tuple["ADRESSE"]."</td>
                        <td>".$tuple["TELEPHONE"]."</td>
                        <td><button>DELETE</button></td>
                      </tr>
                          ";
                      }
                   
                  }
                  catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>";}
              }

              function afficherTransportBejaia()
              {
                $server = "localhost";
                $nom_bdd = "essai";
                $user = "root";
                $password = "";
                    try{
                        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
                        $req = "SELECT * FROM TRANSPORT WHERE ADRESSE = 'bejaia' ";
                        $resultat = $connexion->query($req);
                        while($tuple = $resultat->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "
                            <tr>
                          <td>".$tuple["ID_TRANSPORT"]."</td>
                          <td>".$tuple["NOMACCOMPAGNE"]."</td>
                          <td>".$tuple["TYPE_TRANSPORT"]."</td>
                          <td>".$tuple["ADRESSE"]."</td>
                          <td>".$tuple["TELEPHONE"]."</td>
                          <td><button>DELETE</button></td>
                        </tr>
                            ";
                        }
                     
                    }
                    catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>";}
                }

                function afficherTransportSahara()
                {
                  $server = "localhost";
                  $nom_bdd = "essai";
                  $user = "root";
                  $password = "";
                      try{
                          $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
                          $req = "SELECT * FROM TRANSPORT WHERE ADRESSE = 'sahara' ";
                          $resultat = $connexion->query($req);
                          while($tuple = $resultat->fetch(PDO::FETCH_ASSOC))
                          {
                              echo "
                              <tr>
                            <td>".$tuple["ID_TRANSPORT"]."</td>
                            <td>".$tuple["NOMACCOMPAGNE"]."</td>
                            <td>".$tuple["TYPE_TRANSPORT"]."</td>
                            <td>".$tuple["ADRESSE"]."</td>
                            <td>".$tuple["TELEPHONE"]."</td>
                            <td><button>DELETE</button></td>
                          </tr>
                              ";
                          }
                       
                      }
                      catch (PDOException $e) {echo "Erreur ! " . $e->getMessage() . "<br/>";}
                  }
    ?>
      <!--  Tableau Alger  --> 
      <section class="tableau" id="tableau">
        <div class="tableau-list" id="tableau">
          <h1>Listes des Transports </h1>
          <button id="quitButton">
            <span class="fi fi-sr-x" id="quitTableau"></span>
          </button>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOM</th>
                  <th>TYPE </th>
                  <th>ADRESSE</th>
                  <th>TELEPHONE</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
            <?php afficherTransportAlger();?>
            
              </tbody>
            </table>
            <button id="addButton">ADD</button>
          </div>
        </section>
         <!--  Tableau Tlemcen  -->     
   <section class="tableau" id="tableau2">
        <div class="tableau-list" id="tableau">
          <h1>Listes des Transports </h1>
          <button id="quitButton">
            <span class="fi fi-sr-x" id="quitTableau2"></span>
          </button>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOM</th>
                  <th>TYPE </th>
                  <th>ADRESSE</th>
                  <th>TELEPHONE</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
            <?php afficherTransportTlm();?>
            
              </tbody>
            </table>
            <button id="addButton">ADD</button>
          </div>
        </section>
          <!--  Tableau Oran  --> 
        <section class="tableau" id="tableau3">
        <div class="tableau-list" id="tableau">
          <h1>Listes des Transports </h1>
          <button id="quitButton">
            <span class="fi fi-sr-x" id="quitTableau3"></span>
          </button>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOM</th>
                  <th>TYPE </th>
                  <th>ADRESSE</th>
                  <th>TELEPHONE</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
            <?php afficherTransportOran();?>
            
              </tbody>
            </table>
            <button id="addButton">ADD</button>
          </div>
        </section>
          <!--  Tableau Costantine  --> 
        <section class="tableau" id="tableau4">
        <div class="tableau-list" id="tableau">
          <h1>Listes des Transports </h1>
          <button id="quitButton">
            <span class="fi fi-sr-x" id="quitTableau4"></span>
          </button>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOM</th>
                  <th>TYPE </th>
                  <th>ADRESSE</th>
                  <th>TELEPHONE</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
            <?php afficherTransportCos();?>
            
              </tbody>
            </table>
            <button id="addButton">ADD</button>
          </div>
        </section>
          <!--  Tableau Bejaia  -->
     <section class="tableau" id="tableau5">
        <div class="tableau-list" id="tableau">
          <h1>Listes des Transports </h1>
          <button id="quitButton">
            <span class="fi fi-sr-x" id="quitTableau5"></span>
          </button>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOM</th>
                  <th>TYPE </th>
                  <th>ADRESSE</th>
                  <th>TELEPHONE</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
            <?php afficherTransportBejaia();?>
            
              </tbody>
            </table>
            <button id="addButton">ADD</button>
          </div>
        </section>
          <!--  Tableau Sahara  -->

          <section class="tableau" id="tableau6">
        <div class="tableau-list" id="tableau">
          <h1>Listes des Transports </h1>
          <button id="quitButton">
            <span class="fi fi-sr-x" id="quitTableau6"></span>
          </button>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOM</th>
                  <th>TYPE </th>
                  <th>ADRESSE</th>
                  <th>TELEPHONE</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
            <?php afficherTransportSahara();?>
            
              </tbody>
            </table>
            <button id="addButton">ADD</button>
          </div>
        </section>

    <script>
      function ScrollNav(link)
      {
        var NavGestion = 
        [
          document.getElementById("transport"),
          document.getElementById("notifications")
        ];
        for(var i = 0 ; i<NavGestion.length ; i++ )
        {
          if(NavGestion[i].id === link.getAttribute("href").substring(1))
          { NavGestion[i].style.visibility = 'visible'; }
          else
            NavGestion[i].style.visibility = 'hidden';  
        }
      }
      ScrollNav(document.querySelector('a[href="#transport"]'));
    </script>
    <script>
      function afficherTableauAlger() 
      {
      
        var tableau = document.getElementById("tableau");
        tableau.style.visibility = "visible";
    
        var quitBtn = document.getElementById("quitTableau");
        quitBtn.onclick = function() 
        {
          tableau.style.visibility = "hidden";
        }
      }

      function afficherTableauTlm() 
      {
      
        var tableau = document.getElementById("tableau2");
        tableau.style.visibility = "visible";
    
        var quitBtn = document.getElementById("quitTableau2");
        quitBtn.onclick = function() 
        {
          tableau.style.visibility = "hidden";
        }
      }

      function afficherTableauOran() 
      {
      
        var tableau = document.getElementById("tableau3");
        tableau.style.visibility = "visible";
    
        var quitBtn = document.getElementById("quitTableau3");
        quitBtn.onclick = function() 
        {
          tableau.style.visibility = "hidden";
        }
      }
      function afficherTableauCos() 
      {
      
        var tableau = document.getElementById("tableau4");
        tableau.style.visibility = "visible";
    
        var quitBtn = document.getElementById("quitTableau4");
        quitBtn.onclick = function() 
        {
          tableau.style.visibility = "hidden";
        }
      }
      function afficherTableauBejaia() 
      {
      
        var tableau = document.getElementById("tableau5");
        tableau.style.visibility = "visible";
    
        var quitBtn = document.getElementById("quitTableau5");
        quitBtn.onclick = function() 
        {
          tableau.style.visibility = "hidden";
        }
      }

      function afficherTableauSahara() 
      {
      
        var tableau = document.getElementById("tableau6");
        tableau.style.visibility = "visible";
    
        var quitBtn = document.getElementById("quitTableau6");
        quitBtn.onclick = function() 
        {
          tableau.style.visibility = "hidden";
        }
      }
    </script>
  </body>
</html>
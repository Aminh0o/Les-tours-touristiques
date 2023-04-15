
<?php
$server="localhost";
    $nom_bdd="essai";
    $user="root";
    $password="";
   
    
    



$title = $_POST['title'];
$date = $_POST['date'];
$wilaya = $_POST['wilaya'];
$place1 = $_POST['place1'];
$place2 = $_POST['place2'];
$place3 = $_POST['place3'];
$heure_depart = $_POST['heure_depart'];
$heure_arrive = $_POST['heure_arrive'];
$count = $_POST['count'];
$category = $_POST['category'];
session_start();

try{
// create sortie
if (isset($_COOKIE['sortie'])) {
  $dataPro = json_decode($_COOKIE['sortie'], true);
} else {
  $dataPro = array();
}

$newPro = array(
  'title' => $title,
  'date' => $date,
  'wilaya' => $wilaya,
  'place1' => $place1,
  'place2' => $place2,
  'place3' => $place3,
  'heure_depart' => $heure_depart,
  'heure_arrive' => $heure_arrive,
  'count' => $count,
  'category' => $category
);

$dataPro[] = $newPro;
setcookie('sortie', json_encode($dataPro), time() + (86400 * 30), "/");

clearData();
showData();

// clear inputs
function clearData() {
  $_POST = array();
}

// afficher les donnees
function showData() {
  $table = '';
  if (isset($_COOKIE['sortie'])) {
    $dataPro = json_decode($_COOKIE['sortie'], true);
    foreach($dataPro as $i => $pro) {
      $table .= '
        <tr>
          <td>'.($i+1).'</td>
          <td>'.$pro['title'].'</td>
          <td>'.$pro['date'].'</td>
          <td>'.$pro['wilaya'].'</td>
          <td>'.$pro['place1'].'</td>
          <td>'.$pro['place2'].'</td>
          <td>'.$pro['place3'].'</td>
          <td>'.$pro['heure_depart'].'</td>
          <td>'.$pro['heure_arrive'].'</td>
          <td>'.$pro['category'].'</td>
          <td><button id="update">update</button></td>
          <td><button onclick="deleteData('.$i.')" id="delete">delete</button></td>
        </tr>
      ';
    }
  }
  
  echo '<table><thead><tr><th>ID</th><th>Title</th><th>Date</th><th>Wilaya</th><th>Place1</th><th>Place2</th><th>Place3</th><th>Heure Depart</th><th>Heure Arrive</th><th>Category</th><th></th><th></th></tr></thead><tbody>'.$table.'</tbody></table>';

  if (isset($_COOKIE['sortie']) && count($dataPro) > 0) {
    echo '<button onclick="deleteALL()">Delete ALL</button>';
  }
}

// supprimer un donnee
function deleteData($i) {
  $dataPro = json_decode($_COOKIE['sortie'], true);
  array_splice($dataPro, $i, 1);
  setcookie('sortie', json_encode($dataPro), time() + (86400 * 30), "/");
  showData();
}

function deleteALL() {
  setcookie('sortie', '', time() - 3600, "/");
  showData();
}
}
catch (PDOException $e) 
{
    echo "Erreur ! " . $e->getMessage() . "<br/>";
}
?>

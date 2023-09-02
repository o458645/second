<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Student</title>
  <link rel="stylesheet" href="style.css">
 
  
</head>
<body>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="test.css">
  </head>
  <body>
  <div class="header">
      <nav>
        <ul>
          <li class="hover-historique">
            <a href="test.html">Paiement</a>
            <div id="historique-options" class="dropdown">
              <ul>
                <li><a href="Add_Paiement.php">Ajoute paiement</a></li>
              </ul>
            </div>
          </li>
          <li class="hover-paiement">
            <a href="test.html">Historique</a>
            <div id="paiement-options" class="dropdown">
              <ul>
                <li><a href="table.php">Afficher Eleve</a></li>
                <li><a href="history.php">Afficher Paiement</a></li>
                <li><a href="History1.php">Afficher Paiement par Mois selectioner</a></li>
              </ul>
            </div>
          </li>
          <li class="hover-eleve">
            <a href="test.html">Eleve</a>
            <div id="eleve-options" class="dropdown">
              <ul>
              <li><a href="Add_Student.php">Ajouter</a></li>
                <li><a href="Delete_Student.php">Supprimer</a></li>
                <li><a href="Update_Student.php">Modifier</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
    </div>
    <script type="text/javascript" src="test.js"></script>
  </body>
</html>
  <div id="bordr">
    <form method="post">
      <label for="Massar">Massar</label>
      <input type="text" name="Massar">
      <br><br>
      <label for="nom">nom</label>
      <input type="text" name="nom">
      <br><br>
      <label for="prenom">prenom</label>
      <input type="text" name="prenom">
      <br><br>
      <label for="class">class</label>
      <input type="text" name="class">
      <br><br>
      <label for="mta">mta</label>
      <input type="number" name="mta">
      <br><br>
      <input id="button" type="submit" value="Update" name="btn">
    </form>
  </div>
  <style>
      #bordr {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
  </style>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB_NAME = "dbscolarite";
$conn = mysqli_connect($servername, $username, $password, $DB_NAME);

// Check if form submitted
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $Massar = $_POST['Massar'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $class = $_POST['class'];
  $mta = $_POST['mta'];

  // Update data in eleve table
  $sql = "UPDATE eleve SET nom='$nom', prenom='$prenom', `classe`='$class', mta='$mta' WHERE Massar='$Massar'";

  if ($conn->query($sql)) {
    echo "<div id='bordr'>Student updated successfully</div>";
  } else {
    echo "<div id='bordr'>Error updating student: " . $conn->error . "</div>";
  }
}

$conn->close();
?>

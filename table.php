<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="css2.css">
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
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB_NAME = "dbscolarite";

$conn = mysqli_connect($servername, $username, $password, $DB_NAME);

// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo"<div id='bordr'>";
$resultat = mysqli_query($conn, "SELECT DISTINCT eleve.Massar, eleve.nom, eleve.prenom, eleve.classe FROM eleve");


if ($resultat === false) {
  echo "Error executing query: " . mysqli_error($conn);
} else {
  echo "<table style='border-collapse: collapse; width: 100%;'>";
  echo "<tr>";
  echo "<th style='border: 1px solid black; padding: 8px;'>Massar</th>";
  echo "<th style='border: 1px solid black; padding: 8px;'>Nom</th>";
  echo "<th style='border: 1px solid black; padding: 8px;'>Prénom</th>";
  echo "<th style='border: 1px solid black; padding: 8px;'>Classe</th>";
  echo "</tr>";
  if (mysqli_num_rows($resultat) > 0) {
      while ($ligne = mysqli_fetch_array($resultat)) {
          echo "<tr>";
          echo "<td style='border: 1px solid black; padding: 8px;'>" . $ligne['Massar'] . "</td>";
          echo "<td style='border: 1px solid black; padding: 8px;'>" . $ligne['nom'] . "</td>";
          echo "<td style='border: 1px solid black; padding: 8px;'>" . $ligne['prenom'] . "</td>";
          echo "<td style='border: 1px solid black; padding: 8px;'>" . $ligne['classe'] . "</td>";
          echo "</tr>";
      }
  } else {
      echo "<tr><td colspan='5' style='border: 1px solid black; padding: 8px;'>Aucun enregistrement trouvé</td></tr>";
  }
  echo "</table>";
}

echo"</div>";
$conn->close();
?>
<style>
  #bordr {
  margin: 40px auto;
  max-width: 480px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f5f5f5;
  font-family: Arial, sans-serif;
}

</style>

</body>
</html>

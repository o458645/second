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
<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB_NAME = "dbscolarite";
$conn = mysqli_connect($servername, $username, $password, $DB_NAME);

// Check if the connection succeeded
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<div id='bordr'>";
$resultat = mysqli_query($conn, "SELECT id, ideleve, mois, mtp, datep FROM paie");

if (mysqli_num_rows($resultat) > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr>";
    echo "<th style='border: 1px solid black ; padding: 8px;'>id</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>ideleve</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>mois</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>mtp</th>";
    echo "<th style='border: 1px solid black; padding: 8px;'>datep</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($resultat)) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px;'>{$row['id']}</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>{$row['ideleve']}</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>{$row['mois']}</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>{$row['mtp']}</td>";
        echo "<td style='border: 1px solid black; padding: 8px;'>{$row['datep']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found in the 'paie' table.";
}

echo "</div>";

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
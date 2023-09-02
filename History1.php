<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
	<form method="POST">
		<p>Mois</p>
		<select id="input" name="moiss" id="moiss">
			<option value="01">Janvier</option>
			<option value="02">Février</option>
			<option value="03">Mars</option>
			<option value="04">Avril</option>
			<option value="05">Mai</option>
			<option value="06">Juin</option>
			<option value="07">Juillet</option>
			<option value="08">Août</option>
			<option value="09">Septembre</option>
			<option value="10">Octobre</option>
			<option value="11">Novembre</option>
			<option value="12">Décembre</option>
		</select><br>
		<input id="button" type="submit" value="VALIDER">
	</form>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB_NAME = "dbscolarite";
$conn = mysqli_connect($servername, $username, $password, $DB_NAME);

// Vérifie si le formulaire a été soumis
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['moiss'])) {
    $mois = $_POST['moiss'];
    $stmt = $conn->prepare("SELECT * FROM eleve JOIN paie ON eleve.Massar=paie.ideleve WHERE mois=?");
    $stmt->bind_param("s", $mois);
    $stmt->execute();
    $resultat = $stmt->get_result();
  echo"<div id='bordr'>";
    if ($resultat->num_rows > 0) {
      echo "<div id='stft' style='border: 1px solid black; width: fit-content; margin: 0 auto;'>";
      echo "<table style='border-collapse: collapse; width: 100%;'>";
      echo "<tr>";
      echo "<th style='border: 1px solid black; padding: 8px;'>Massar</th>";
      echo "<th style='border: 1px solid black; padding: 8px;'>Nom</th>";
      echo "<th style='border: 1px solid black; padding: 8px;'>Prénom</th>";
      echo "<th style='border: 1px solid black; padding: 8px;'>Classe</th>";
      echo "<th style='border: 1px solid black; padding: 8px;'>MTA</th>";
      echo "</tr>";

      while ($row = $resultat->fetch_assoc()) {
          echo "<tr>";
          echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['Massar']) . "</td>";
          echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['nom']) . "</td>";
          echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['prenom']) . "</td>";
          echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['classe']) . "</td>";
          echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['mta']) . "</td>";
          echo "</tr>";
      }

      echo "</table>";
      echo "</div>";
      echo"</div>";
  } else {
      echo "<div id='error-message' style='text-align: center;'>Aucun paiement effectué ce mois-ci.</div>";
  }

  $stmt->close();
} else {
  // Afficher un message d'erreur ou rediriger l'utilisateur
}

$conn->close();
?>
<style>
  #bordr {
    margin-top:40px;
    padding-top:40px;
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

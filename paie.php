<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
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
                <li><a href="History1.php">Afficher Paiement par Mois  selectioner</a></li>
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

<div id="stf">
    <div id="center">
	<form method="POST" action="paie.php">
		<label for="">mois</label><br>
		<select id="input" name="moiss" id="moiss" placeholder="mois">
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
</div>
<style>
    
    #stf {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc; /* Add border property */
        border-radius: 5px;
        font-family: Arial, sans-serif;
    }
    #stft {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc; /* Add border property */
        border-radius: 5px;
        font-family: Arial, sans-serif;
        margin-top:30px;
    }

    #center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    #error-message {
        color: red;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
    }
</style>

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

    if ($resultat->num_rows > 0) {
        echo "<div id='stft'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Massar</th>";
        echo "<th>Nom</th>";
        echo "<th>Prénom</th>";
        echo "<th>Classe</th>";
        echo "<th>MTA</th>";
        echo "</tr>";

        while ($row = $resultat->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Massar']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['classe']) . "</td>";
            echo "<td>" . htmlspecialchars($row['mta']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<div id='error-message'>Aucun paiement effectué ce mois-ci.</div>";
    }

    $stmt->close();
} else {
    // Afficher un message d'erreur ou rediriger l'utilisateur
}

$conn->close();

?>
</body>
</html>

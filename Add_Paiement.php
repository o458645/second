
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input id="input" type="text" name="ideleve" placeholder="ideleve" style="text-align:center" ><br><br>
            <select style="padding-left:47%" name="mois" id="input" placeholder="mois">
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
            </select><br><br>
            <input type="number" name="mtp"  placeholder="mtp" style="text-align:center"><br><br>
            <input style="padding-left:38%" type="date" name="datep"><br><br>
            <input id="button" type="submit" value="Add paiement" name="btn">
        </form>
    </div>
   
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$DB_NAME = "dbscolarite";
$conn = new PDO("mysql:host=$servername;dbname=$DB_NAME", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if form submitted
if (isset($_POST['btn'])) {
    // Insert data into paie table
    $ideleve = $_POST["ideleve"];
    $mois = $_POST["mois"];
    $mtp = $_POST["mtp"];
    $datep = $_POST["datep"];

    $stmt = $conn->prepare("INSERT INTO paie (ideleve, mois, mtp, datep) VALUES (?, ?, ?, ?)");
    $stmt->execute([$ideleve, $mois, $mtp, $datep]);

    if ($stmt->rowCount() > 0) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
}
?>

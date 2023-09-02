
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
    <div id="bordr">
    <form method="post">
        <label for="">Massar</label>
        <input type="text" name="Massar">
        <br><br>
        <label for="">nom</label>
        <input type="text" name="nom">
        <br><br>
        <label for="">prenom</label>
        <input type="text" name="prenom">
        <br><br>
        <label for="">class</label>
        <input type="text" name="class">
        <br><br>
        <label for="">mta</label>
        <input type="number" name="mta"><br><br>
        <input id="button" type="submit" value="Ajouter" name="btn">
        
    </form>
    </div>
 
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBNAME = "dbscolarite";

$conn = mysqli_connect($servername, $username, $password, $DBNAME);
$db = new PDO("mysql:host=localhost;dbname=dbscolarite", $username, $password);

// Check if form submitted
if (isset($_POST['btn'])) {
    // Get form data
    $Massar = $_POST['Massar'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $class = $_POST['class'];
    $mta = $_POST['mta'];

    // Insert data into eleve table
    $stmt = $db->prepare("INSERT INTO eleve (Massar, nom, prenom, classe, mta) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$Massar, $nom, $prenom, $class, $mta]);

    if ($stmt->rowCount() > 0) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
}
?>
<script>
    
    const historiqueOptions = document.getElementById("historique-options");
      const paiementOptions = document.getElementById("paiement-options");
      const eleveOptions = document.getElementById("eleve-options");
      const hoverHistorique = document.querySelector(".hover-historique");
      const hoverPaiement = document.querySelector(".hover-paiement");
      const hoverEleve = document.querySelector(".hover-eleve");

      hoverHistorique.addEventListener("mouseover", function() {
        historiqueOptions.classList.remove("hidden");
      });

      hoverHistorique.addEventListener("mouseout", function() {
        historiqueOptions.classList.add("hidden");
      });

      hoverPaiement.addEventListener("mouseover", function() {
        paiementOptions.classList.remove("hidden");
      });

      hoverPaiement.addEventListener("mouseout", function() {
        paiementOptions.classList.add("hidden");
      });

      hoverEleve.addEventListener("mouseover", function() {
        eleveOptions.classList.remove("hidden");
      });

      hoverEleve.addEventListener("mouseout", function() {
        eleveOptions.classList.add("hidden");
      });
    
</script>
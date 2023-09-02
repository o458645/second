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
  <div id="bordr">
    <form method="post">
        <label for="">Massar</label>
        <input type="text" name="Massar">
        <br><br>
        <input id="button" type="submit" value="Delete" name="btn">
        
    </form>
    </div>
</html>
</html>
<style>
  #bordr {
  border: 1px solid #ccc;
  padding: 20px;
  width: 300px;
  margin: 0 auto;
  border-radius:15px;
  background-color: #f5f5f5;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  font-weight: bold;
}

input[type="text"] {
  padding: 5px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 15px;
}

#button {
  background-color: #ff0000;
  color: #ffffff;
  border: none;
  padding: 8px 16px;
  cursor: pointer;
  border-radius:15px;
}

#button:hover {
  background-color: #cc0000;
  box-shadow: 0 15px 15px #ff0000;
  color: #ffffff;
}

</style>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB_NAME = "dbscolarite";
$conn = mysqli_connect($servername, $username, $password, $DB_NAME);

// Check if form submitted
if (isset($_POST['btn'])) {
  $massar = $_POST['Massar'];

  if (!$conn) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
  } else {
    // Delete student from eleve table
    $sql = "DELETE FROM eleve WHERE Massar='$massar'";
    if (mysqli_query($conn, $sql)) {
      echo "Student deleted successfully.";
    } else {
      echo "Error deleting student: " . mysqli_error($conn);
    }
  }
}
?>

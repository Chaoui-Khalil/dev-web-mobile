<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style22.css">
</head>
<body>
    <h2>Liste des utilisateurs</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "ensa2025@"; 
    $database = "php";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $response = $conn->query('SELECT * FROM myguests');
        while($data = $response->fetch()){
            echo "<div class='etage'>
                    Nom: " . $data['firtname'] . " & Prenom: " . $data['lastname'] . "
                    <div class='buttonB'>
                        <form method='post' action='delete.php' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $data['id'] . "'>
                            <button type='submit' class='btn'>Supprimer</button>
                        </form>
                        <form method='get' action='edit.php' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $data['id'] . "'>
                            <button type='submit' class='btn'>Modifier</button>
                        </form>
                    </div><br>
                </div>";


        }
        $response->closeCursor();
    } catch(PDOException $e) {
             echo "connection failed : " . $e->getMessage();
   }
    ?>
    
    <div class="page1">
         <a href="page1.php">Ajouter</a>
    </div>
</body>
</html>
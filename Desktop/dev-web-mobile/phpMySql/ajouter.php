<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nom"]) || empty($_POST["prenom"])) {
            echo "Le nom ou le prenom est requis.";
        } else {
            $name = htmlspecialchars(stripslashes(trim($_POST["nom"])));
            $prenom = htmlspecialchars(stripslashes(trim($_POST["prenom"])));
            // echo "<br> Nom: $name <br> Prenom: $prenom";

            $servername="localhost";
            $username="root";
            $password="ensa2025@"; 
            $database="php";
            try {
                 $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 echo "Connected successfully";
            } catch(PDOException $e) {
                      echo "connection failed : " . $e->getMessage();
            }
        }
        $sql = "INSERT INTO myguests (firtname, lastname) VALUES ('$name' , '$prenom')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        echo "$last_id";
    }
    ?>
</body>
</html>
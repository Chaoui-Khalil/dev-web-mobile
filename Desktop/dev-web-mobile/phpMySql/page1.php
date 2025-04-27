<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style11.css">
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
                 echo "Connected successfully"."<br>";
            } catch(PDOException $e) {
                      echo "connection failed : " . $e->getMessage();
            }
            $sql = "INSERT INTO myguests (firtname, lastname) VALUES ('$name' , '$prenom')";
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
            echo "$last_id";
        }
    }
    ?>
    <form action="" method="POST">
        <div class="box">
            <div class="login">
                <header class="title">
                    <h1>Add</h1>
                </header>
                <div class="nom">
                    <input type="text" id="nom" name="nom" placeholder="Nom" >
                </div>
                <div class="prenom">
                    <input type="text" id="prenom" name="prenom" placeholder="Prenom">
                </div>
                <div class="btn">
                    <button type="submit" class="btn1">Ajouter</button>
                </div>
            <div class="login">
            <div class="page2">
                <a href="page2.php">Afficher</a>
            </div>
        </div>
    </form>
</body>
</html>
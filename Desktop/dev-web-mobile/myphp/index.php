<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="welcome.php" method="POST">
        Nom: <input type="text" name="name" /><br />
        Prenom: <input type="text" name="prenom" /><br />
        E-mail: <input type="text" name="email" /><br />
        <input type="submit" />
    </form>
    
    <br />

    <!-- Bienvenue
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si le champ "name" est vide
        if (empty($_POST["name"]) or empty($_POST["email"])) {
            echo "Le nom est requis ou bien email est requis.";
        } else {
            // Nettoyer la donnée
            $name = trim($_POST["name"]);
            $name = stripslashes($name);
            $name = htmlspecialchars($name);
            $prenom = trim($_POST["prenom"]);
            $prenom = stripslashes($prenom);
            $prenom = htmlspecialchars($prenom);
            $email = trim($_POST["email"]);
            $email = stripslashes($email);
            $email = htmlspecialchars($email);
            echo "Nom: " . $name . "<br> Prenom: " . $prenom . "<br> Email: " . $email;
        }
    }
    ?> -->
</body>
</html>

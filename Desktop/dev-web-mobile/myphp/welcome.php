Bienvenue 
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
            echo "<br> Nom: " . $name . "<br> Prenom: " . $prenom . "<br> Email: " . $email;
        }
    }
    ?>
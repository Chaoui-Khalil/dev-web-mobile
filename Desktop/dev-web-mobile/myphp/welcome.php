<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
</head>
<body>
    <h2>Bienvenue</h2>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["email"])) {
        echo "Le nom ou l'email est requis.";
    } else {
        $name = htmlspecialchars(stripslashes(trim($_POST["name"])));
        $prenom = htmlspecialchars(stripslashes(trim($_POST["prenom"])));
        $email = htmlspecialchars(stripslashes(trim($_POST["email"])));

        echo "<br> Nom: $name <br> Prenom: $prenom <br> Email: $email";

        // Gestion de l'image
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $target_dir = "uploads/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $valid_extensions = ["jpg", "jpeg", "png", "gif"];

            if (in_array($imageFileType, $valid_extensions)) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "<br><br><strong>Photo :</strong><br>";
                    echo "<img src='$target_file' width='200' />";
                } else {
                    echo "<br>Erreur lors du téléchargement de l'image.";
                }
            } else {
                echo "<br>Extension non autorisée.";
            }
        } else {
            echo "<br>Aucune image envoyée ou erreur lors de l'envoi.";
        }
    }
}
?>

</body>
</html>

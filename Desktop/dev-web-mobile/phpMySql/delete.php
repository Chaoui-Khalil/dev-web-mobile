<?php
$servername = "localhost";
$username = "root";
$password = "ensa2025@"; 
$database = "php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM myguests WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: page2.php"); // Remplace index.php par le nom de ta page principale
        exit();
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

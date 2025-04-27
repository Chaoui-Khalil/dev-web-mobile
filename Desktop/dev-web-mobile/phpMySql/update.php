<?php
$servername = "localhost";
$username = "root";
$password = "ensa2025@"; 
$database = "php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $firtname = $_POST['firtname'];
    $lastname = $_POST['lastname'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE myguests SET firtname = :firtname, lastname = :lastname WHERE id = :id");
        $stmt->bindParam(':firtname', $firtname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: page2.php"); // Reviens à la page principale
        exit();
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

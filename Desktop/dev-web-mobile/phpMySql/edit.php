<?php
$servername = "localhost";
$username = "root";
$password = "ensa2025@"; 
$database = "php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM myguests WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    Nom: <input type="text" name="firtname" value="<?= $data['firtname'] ?>"><br>
    Prénom: <input type="text" name="lastname" value="<?= $data['lastname'] ?>"><br>
    <button type="submit">Enregistrer</button><br>
    <a href="page2.php">retourner</a>
</form>

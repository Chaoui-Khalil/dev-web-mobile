<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire avec image</title>
</head>
<body>
    <form action="welcome.php" method="POST" enctype="multipart/form-data">
        Nom: <input type="text" name="name" /><br />
        Prenom: <input type="text" name="prenom" /><br />
        E-mail: <input type="text" name="email" /><br />
        Photo: <input type="file" name="image" /><br />
        <input type="submit" value="Envoyer" />
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <form action="connect.php" name="connect" method="post">
        <label for="name">Pseudo : </label><input type="text" name="name" id="name">
        <label for="pass">Mot de passe : </label><input type="password" name="pass" id="pass">
        <input type="submit" value="Connexion">
    </form>
    <a href="sign.php">Inscription</a>

</body>

</html>
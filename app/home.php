<?php
session_start();
require('Database.php');
$db = new Database();
$rq = $db->query('SELECT articles.id as iDa,articles.title,articles.date,articles.content,articles.user,user.id,user.name as name FROM articles INNER JOIN user ON user.id = articles.user')->fetchAll();

if (!isset($_SESSION['id'])) {
    header('location:index.php');
}

if (isset($_GET['off'])) {
    session_destroy();
    header('location:index.php');
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <a href="?off">Déconnexion</a>
    <h1>Blog</h1>
    <?php foreach ($rq as $r) : ?>
        <h3><?php echo $r->title; ?></h3>
        <em><?php echo $r->date . " " . "<b>" . $r->name . "</b>";  ?></em>
        <p><?php echo $r->content ?></p>
        <a href="article.php?id=<?php echo $r->iDa; ?>">lire la suite</a>
        <?php if ($_SESSION['name'] == 'admin') : ?>
            <a href="delete.php?id=<?php echo $r->iDa; ?>">supprimer l'article</a>
        <?php endif; ?>
    <?php endforeach; ?>
    <a href="insert.php">Ajouter un billet</a>
</body>

</html>
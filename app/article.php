<?php
session_start();
require('Database.php');
$db = new Database();

if (!isset($_SESSION['id'])) {
    header('location:index.php');
}

$id = $_GET['id'] ?? null;

$rq = $db->query('SELECT articles.id,articles.title,articles.date,articles.content,articles.user as autor,user.id,user.name as name,user.role FROM articles INNER JOIN user ON user.id = articles.user WHERE articles.id = ?', [$id])->fetch();

if ($id == null || $rq == false) {
    header('location:home.php');
}

$edit = $_GET['edit'] ?? null;
$rq2 = $db->query('SELECT user.id as id,user.role as role FROM user WHERE user.name = ?', [$_SESSION['name']])->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $rq->title; ?></title>
</head>

<body>
    <h1><?php echo $rq->title; ?></h1>
    <em><?php echo $rq->date; ?></em>
    <b><?php echo $rq->name ?></b>
    <p><?php echo $rq->content; ?></p>
    <a href="home.php">Retour</a>
    <?php if ($rq2->role == 1 || $rq2->id == $rq->autor) : ?>
        <a href="article.php?id=<?php echo $id ?>&edit=true">Modifier</a>
        <form action="edit.php?id=<?php echo $id ?>" method="post" style="display:<?php echo ($edit ? '' : 'none') ?>;">
            <textarea name="text" id="content" cols="50" rows="10"><?php echo $rq->content; ?></textarea>
            <input type="submit" value="Editer">
        </form>
    <?php endif; ?>
</body>

</html>
<?php

require('Database.php');
$db = new Database();


$id = $_GET['id'] ?? null;
if ($id == null) {
    header('location:index.php');
}

$rq = $db->query('SELECT * FROM articles WHERE id = ?', [$id])->fetch();

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
    <b><?php echo $rq->user ?></b>
    <p><?php echo $rq->content; ?></p>
    <a href="index.php">Retour</a>
</body>

</html>
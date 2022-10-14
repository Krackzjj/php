<?php

$pdo = new PDO("mysql:dbname=data;host=db;charset=utf8", 'root', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req = $pdo->query('SELECT * FROM articles');
$res = $req->fetchAll(PDO::FETCH_OBJ);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Blog</h1>
    <?php foreach ($res as $r) : ?>
        <h3><?php echo $r->title; ?></h3>
    <?php endforeach ?>
</body>

</html>
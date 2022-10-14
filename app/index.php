<?php

require('Database.php');
$db = new Database();

$rq = $db->query('SELECT * FROM articles')

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
    <?php foreach ($rq as $r) : ?>
        <h3><?php echo $r->title; ?></h3>
        <em><?php echo $r->date . " " . "<b>" . $r->user . "</b>";  ?></em>
        <p><?php echo $r->content ?></p>
        <a href="article.php?id=<?php echo $r->id; ?>">lire la suite</a>
    <?php endforeach; ?>
</body>

</html>
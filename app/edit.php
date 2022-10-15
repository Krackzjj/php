<?php
require('Database.php');
$db = new Database();

$id = $_GET['id'] ?? null;
$mod = $_POST['text'] ?? null;

if ($mod != null) {
    $db->query('UPDATE articles SET content = ? WHERE id = ?', [$mod, $id]);
    header('location:article.php?id=' . $id);
}

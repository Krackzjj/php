<?php
session_start();
require('Database.php');
$db = new Database();
$name = $_POST['name'] ?? null;

$rq = $db->query('SELECT id,name,password FROM user WHERE name = ?', [$name])->fetch();
$pass = password_verify($_POST['pass'], $rq->password) ?? null;

if ($rq && $pass) {
    $_SESSION['id'] = session_id();
    $_SESSION['name'] = $rq->name;
    $_SESSION['userid'] = $rq->id;
    header('location:home.php');
} else {
    echo 'bug';
}

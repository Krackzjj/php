<?php
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$name = $_POST['name'];

require('Database.php');
$db = new Database();

$db->query('INSERT INTO user (user.name,user.password) VALUES (?,?)', [$name, $pass]);
header('location:index.php');

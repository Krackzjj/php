<?php
session_start();
require('Database.php');
$db = new Database();

$text = $_POST['insert'];
$title = $_POST['title'];
$user = $_SESSION['userid'];


$db->query('INSERT INTO articles (articles.title,articles.content,articles.user) VALUES (?,?,?)', [$title, $text, $user]);

header('location:home.php');

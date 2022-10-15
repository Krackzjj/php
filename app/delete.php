<?php
session_start();
require('Database.php');
$db = new Database();



$id = $_GET['id'];
$db->query('DELETE FROM articles WHERE id=? ', [$id]);
header('location:home.php');

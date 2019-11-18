<?php
require_once '../connection.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$job = $_POST['job'];
$sql = "INSERT INTO users (name, surname, email, phone, job) VALUES ('$name', '$surname', '$email', '$phone', '$job')";
$pdo->exec($sql);
$pdo = null;  
header("Location: /");
?>
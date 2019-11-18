<?php 
    require_once('../connection.php');

    $id = $_POST['delete_id'];

    $sth = $pdo->prepare("UPDATE users SET del = 1 WHERE id = '$id'");
    $sth->execute();
?>

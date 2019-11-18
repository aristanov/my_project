<?php 

    require_once('../connection.php');  //Загружаем настройки БД

    $id = $_POST['delete_id'];  //Получаем id строки, которую необходимо удалить

    //Вместо удаления устанавливаем столбец 'del' в БД в значение 1 (0 - строка не удалена, 1 - строка удалена)

    $sth = $pdo->prepare("UPDATE users SET del = 1 WHERE id = '$id'");  
    $sth->execute();
?>

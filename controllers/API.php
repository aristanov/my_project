<?php
/*
Данный скрипт предназначен для работы с Google Sheets
При запуске выгружает сводные данные о пользователях (удалленых и добавленных)
Запуск возможен как напрямую через консоль или браузер, так и через планировщики задач(Windows, Cron)
*/
require __DIR__ . '/vendor/autoload.php'; //Смотри официальную документацию Google Sheets API
require_once '../connection.php';   //Загружаем настройки БД

$sth = $pdo->prepare("SELECT * FROM users WHERE data > date_sub(curdate(), interval 1 day)");   //Извлекаем данные за последние сутки
$sth -> execute();

//Инициализируем нового пользователя Google API и устанавливаем настройки
$client = new Google_Client();
$client->setApplicationName('Google Sheets API PHP');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig('ваш персональный токен');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

//Получаем доступ к тадлице
$service = new Google_Service_Sheets($client);
$spreadsheetId = 'Id вашей таблицы';
$range = 'Название рабочего листа';

while ($row = $sth->fetch(PDO::FETCH_LAZY)){    //цикл по коллекции, полученной из БД
    
    //Устанавливаем параметры и добавляем новую строку в таблицу

    $values = [
        [strval($row['name']),strval($row['surname']), strval($row['email']), strval($row['phone']), strval($row['job']), strval($row['date']), strval($row['del'])],
    ];

    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);

    $params = [
        'valueInputOption' => 'RAW'
    ];
    $insert = [
        'insertDataOption' => 'INSERT_ROWS'
    ];

    $result = $service->spreadsheets_values->append(
        $spreadsheetId,
        $range,
        $body,
        $params,
        $insert
    );
}
?>
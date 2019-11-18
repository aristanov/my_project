<?php
require __DIR__ . '/vendor/autoload.php';
require_once '../connection.php';

$sth = $pdo->prepare("SELECT * FROM users WHERE data > date_sub(curdate(), interval 1 day)");
$sth -> execute();


$client = new Google_Client();
$client->setApplicationName('Google Sheets API PHP');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig('ваш персональный токен');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');


$service = new Google_Service_Sheets($client);
$spreadsheetId = 'Id вашей таблицы';

$range = 'Название рабочего листа';

while ($row = $sth->fetch(PDO::FETCH_LAZY)){

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
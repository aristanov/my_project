Тестовое задание на PHP
Функционал
----------

Добавление/удаление и просмотр данных о пользователях, а также работа с Google Sheets API

Установка
---------

Для работы приложения необходима база данных Mysql с таблицей следующего формата:

| Field   | Type        | Null | Key | Default           | Extra                       |
|---------|-------------|------|-----|-------------------|-----------------------------|
| id      | int(10)     | NO   | PRI | NULL              | auto_increment              |
| name    | varchar(20) | NO   |     | NULL              |                             |
| surname | varchar(30) | NO   |     | NULL              |                             |
| email   | varchar(40) | NO   |     | NULL              |                             |
| phone   | varchar(11) | NO   |     | NULL              |                             |
| job     | varchar(40) | NO   |     | NULL              |                             |
| data    | timestamp   | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
| del     | tinyint(1)  | NO   |     | 0                 |                             |


Также необходим веб-сервер (при разработке использовался встроенный PHP-сервер)

Для работы с сервисом Google Sheets API, необходимо ознакомиться с официальной документацией сервиса: 
https://developers.google.com/sheets/api
Собственный токен не размещен в репозитории в целях безопасности

API.php записывает сводные данные в Google Sheets, для работы по расписанию можно применять Cron или Планировщик задач Windows(запуск файла startscript.bat)
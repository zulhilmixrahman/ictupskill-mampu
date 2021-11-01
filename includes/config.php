<?php
// Reference: https://www.php.net/manual/en/pdo.connections.php
try {
    $db_host = 'localhost';
    $db_name = '';
    $db_user = 'root';
    $db_pass = '';

    $dbcon = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (\Throwable $th) {
    exit('DB Connection Failed');
}
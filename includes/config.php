<?php
// Reference: https://www.php.net/manual/en/pdo.connections.php
try {
    $db_host = 'localhost';
    $db_name = 'mampu';
    $db_user = 'root';
    $db_pass = '';

    $dbcon = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (\Throwable $th) {
    exit('DB Connection Failed');
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'e30258ab6dffcf';                     //SMTP username
$mail->Password   = 'db47bf78903790';                               //SMTP password
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

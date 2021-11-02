<?php
include '../includes/config.php';

$email = $_POST['emel'];
$name = $_POST['nama'];
//$password = $_POST['katalaluan'];
$password = password_hash($_POST['katalaluan'], PASSWORD_BCRYPT);

$query = "INSERT INTO users
SET email = :emel, name = :nama, password = :katalaluan";
$sql = $dbcon->prepare($query);
$sql->bindParam(':emel', $email);
$sql->bindParam(':nama', $name);
$sql->bindParam(':katalaluan', $password);
$sql->execute();

header("Location: /user/list.php");
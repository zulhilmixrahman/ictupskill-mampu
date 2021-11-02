<?php
include '../includes/config.php';

$email = $_POST['emel'];
$name = $_POST['nama'];
$id = $_POST['id'];

$query = "UPDATE users
SET email = :emel, name = :nama
WHERE id = :pk";
$sql = $dbcon->prepare($query);
$sql->bindParam(':emel', $email);
$sql->bindParam(':nama', $name);
$sql->bindParam(':pk', $id);
$sql->execute();

header("Location: /user/list.php");
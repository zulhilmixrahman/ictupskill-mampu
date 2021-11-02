<?php 
include '../includes/config.php';

$sql = $dbcon->prepare("DELETE FROM users WHERE id = :pk");
$sql->bindParam(':pk', $_GET['id']);
$sql->execute();

header("Location: /user/list.php");

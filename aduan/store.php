<?php
include '../includes/config.php';

$pengguna = $_POST['pengguna'];
$title = $_POST['tajuk'];
$detail = $_POST['keterangan'];
$submited = $_POST['tarikh_hantar'];

$query = "INSERT INTO complaints
SET user_id = :userid, title = :tajuk, detail = :keterangan, submited_at = :tarikh";
$sql = $dbcon->prepare($query);
$sql->bindParam(':userid', $pengguna);
$sql->bindParam(':tajuk', $title);
$sql->bindParam(':keterangan', $detail);
$sql->bindParam(':tarikh', $submited);
$sql->execute();

header("Location: /aduan/list.php");
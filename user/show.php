<?php include '../includes/config.php' ?>
<?php include '../includes/header.php' ?>

<?php
$sql = $dbcon->prepare("SELECT * FROM users WHERE id = :pk");
$sql->bindParam(':pk', $_GET['id']);
$sql->execute();
$pengguna = $sql->fetch();
?>

<div class="container p-0">
    <h1 class="h3 mb-3">Maklumat Pengguna</h1>

    <div class="row">
        <div class="col text-start">
            <a href="/user/list.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="row">
        <div class="col-2">ID</div>
        <div class="col"><?php echo $pengguna['id'] ?></div>
    </div>

    <div class="row">
        <div class="col-2">Nama</div>
        <div class="col"><?php echo $pengguna['name'] ?></div>
    </div>

    <div class="row">
        <div class="col-2">Emel</div>
        <div class="col"><?php echo $pengguna['email'] ?></div>
    </div>
</div>

<?php include '../includes/footer.php' ?>
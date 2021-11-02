<?php include '../includes/config.php' ?>
<?php include '../includes/header.php' ?>

<?php
$sql = $dbcon->prepare("SELECT * FROM users WHERE id = :pk");
$sql->bindParam(':pk', $_GET['id']);
$sql->execute();
$pengguna = $sql->fetch();
?>

<div class="container p-0">
    <h1 class="h3 mb-3">Kemaskini Pengguna</h1>

    <div class="row">
        <div class="col text-start">
            <a href="/user/list.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <form action="/user/update.php" method="post">

    <div class="form-group">
        <label class="form-label">Emel</label>
        <input type="email" name="emel" class="form-control" value="<?php echo $pengguna['email'] ?>">
    </div>

    <div class="form-group">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pengguna['name'] ?>"> 
    </div>
    
    <input type="hidden" name="id" value="<?php echo $pengguna['id'] ?>">
    <button type="submit" class="btn btn-warning">Kemaskini</button>

    </form>
</div>

<?php include '../includes/footer.php' ?>
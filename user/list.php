<?php include '../includes/config.php' ?>
<?php include '../includes/header.php' ?>

<?php
if($_SESSION['is_admin'] == 0){
    header('Location: /aduan/list.php');
}

if(isset($_GET['carian'])){
    $carian = '%' . $_GET['carian'] . '%';
} else {
    $carian = '%';
}
$query = "SELECT * FROM users WHERE name LIKE :name";
$sql = $dbcon->prepare($query);
$sql->bindParam(':name', $carian);
$sql->execute();
$users = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container p-0">
    <h1 class="h3 mb-3">Senarai Pengguna</h1>

    <div class="row mb-2">
        <div class="col">
            <form class="row">
                <div class="col">
                    <input type="text" name="carian" class="form-control">
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-3 text-end">
            <a href="/user/create.php" class="btn btn-primary">
            Tambah
            </a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Emel</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            <?php foreach ($users as $pengguna): ?>
            <tr>
                <td><?php echo $index++ ?></td>
                <td><?php echo $pengguna['name'] ?></td>
                <td><?php echo $pengguna['email'] ?></td>
                <td class="text-center">
                    <a href="/user/show.php?id=<?php echo $pengguna['id'] ?>" class="btn btn-success">Papar</a>
                    <a href="/user/edit.php?id=<?php echo $pengguna['id'] ?>" class="btn btn-warning">Kemaskini</a>
                    <a href="/user/delete.php?id=<?php echo $pengguna['id'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php' ?>
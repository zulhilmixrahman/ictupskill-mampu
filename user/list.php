<?php include '../includes/config.php' ?>
<?php include '../includes/header.php' ?>

<?php
$sql = $dbcon->query("SELECT * FROM users", PDO::FETCH_ASSOC);
$users = $sql->fetchAll();
?>

<div class="container p-0">
    <h1 class="h3 mb-3">Senarai Pengguna</h1>

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
            <?php foreach ($users as $pengguna): ?>
            <tr>
                <td><?php echo $pengguna['id'] ?></td>
                <td><?php echo $pengguna['name'] ?></td>
                <td><?php echo $pengguna['email'] ?></td>
                <td class="text-center">
                    <a href="/user/show.php?id=<?php echo $pengguna['id'] ?>" class="btn btn-success">Papar</a>
                    <a href="#" class="btn btn-warning">Kemaskini</a>
                    <a href="#" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php' ?>
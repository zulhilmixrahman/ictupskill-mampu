<?php include '../includes/config.php' ?>
<?php include '../includes/header.php' ?>

<?php
$sql = $dbcon->query("
SELECT complaints.*, users.name 
FROM complaints
JOIN users ON complaints.user_id = users.id
", PDO::FETCH_ASSOC);
$complaints = $sql->fetchAll();
?>

<div class="container p-0">
    <h1 class="h3 mb-3">Senarai Aduan</h1>

    <div class="row mb-2">
        <div class="col text-end">
            <a href="/aduan/create.php" class="btn btn-primary">
            Aduan Baru
            </a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pengguna</th>
                <th>Aduan</th>
                <th>Keterangan</th>
                <th>Tarikh</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            <?php foreach ($complaints as $aduan): ?>
            <tr>
                <td><?php echo $index++ ?></td>
                <td><?php echo $aduan['name'] ?></td>
                <td><?php echo $aduan['title'] ?></td>
                <td><?php echo $aduan['detail'] ?></td>
                <!-- <td><?php //echo $aduan['submited_at'] ?></td> -->
                <td><?php echo date('d/m/Y', strtotime($aduan['submited_at'])) ?></td>
                <td class="text-center">
                    <a href="/aduan/delete.php?id=<?php echo $aduan['id'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php' ?>
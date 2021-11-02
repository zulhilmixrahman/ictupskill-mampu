<?php include '../includes/config.php' ?>
<?php include '../includes/header.php' ?>

<div class="container p-0">
    <h1 class="h3 mb-3">Aduan Baru</h1>

    <div class="row">
        <div class="col text-start">
            <a href="/aduan/list.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <form action="/aduan/store.php" method="post">

    <div class="form-group">
        <label class="form-label">Pengguna</label>
        <?php
        $sql = $dbcon->query("SELECT * FROM users", PDO::FETCH_ASSOC);
        $users = $sql->fetchAll();
        ?>
        <select name="pengguna" class="form-select">
            <option>-- Pilih Pengguna --</option>
            <?php
            foreach ($users as $key => $value) {
                echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Aduan</label>
        <input type="text" name="tajuk" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label class="form-label">Hantar Pada</label>
        <input type="date" name="tarikh_hantar" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include '../includes/footer.php' ?>
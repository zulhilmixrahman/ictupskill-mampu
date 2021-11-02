<?php include '../includes/config.php' ?>
<?php include '../includes/header.php' ?>

<div class="container p-0">
    <h1 class="h3 mb-3">Tambah Pengguna</h1>

    <div class="row">
        <div class="col text-start">
            <a href="/user/list.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <form action="/user/store.php" method="post">

    <div class="form-group">
        <label class="form-label">Emel</label>
        <input type="email" name="emel" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>

    <div class="form-group">
        <label class="form-label">Katalaluan</label>
        <input type="text" name="katalaluan" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>

    </form>
</div>

<?php include '../includes/footer.php' ?>
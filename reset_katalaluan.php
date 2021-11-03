<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>My Application</title>
</head>

<body>
<?php 
include 'includes/config.php';

if(!isset($_GET['token'])){
    header('Location: /login.php');
} else {
    $sql = $dbcon->prepare("SELECT * FROM users WHERE token = :token");
    $sql->bindParam(':token', $_GET['token']);
    $sql->execute();
    $token = $sql->fetch();

    if($token == null){
        echo '<script>alert("Invalid Token");</script>';
        header('refresh:1; url=/login.php');
    }
}

if(isset($_POST['password'])){
    // Check Katalaluan == Ulang Katalaluan
    if($_POST['password'] != $_POST['confirm_password']){
        echo '<script>alert("Katalaluan Tidak Padan");</script>';
        header('refresh:1;');
    } else {
        // Kemaskini Katalaluan
        $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = $dbcon->prepare("UPDATE users SET password = :newpswd, token = NULL WHERE id = :id");
        $sql->bindParam(':newpswd', $new_password);
        $sql->bindParam(':id', $token['id']);
        $sql->execute();

        echo '<script>alert("Katalaluan Telah Dikemaskini");</script>';
        header('Location: /login.php');
    }
}
?>
    <div class="container vh-100">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5">
                    <div class="card-header">
                        Tukar Katalaluan
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Emel Pengguna: <?php echo $token['email'] ?></label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Katalaluan Baru</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ulang Katalaluan</label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Kemaskini Katalaluan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/public/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
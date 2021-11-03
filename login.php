<?php 
include 'includes/config.php';

// Login Validation
if(isset($_POST['email'])){
    // Search user by email/username
    $sql = $dbcon->prepare("SELECT * FROM users WHERE email = :pk");
    $sql->bindParam(':pk', $_POST['email']);
    $sql->execute();
    $pengguna = $sql->fetch();

    // Validate Password
    if(password_verify($_POST['password'], $pengguna['password'])){
        // If Valid Password, Create Session
        session_start();
        $_SESSION['user_id'] = $pengguna['id'];
        $_SESSION['name'] = $pengguna['name'];
        $_SESSION['email'] = $pengguna['email'];
        $_SESSION['is_admin'] = $pengguna['is_admin'];

        // Redirect to home
        header('Location: /aduan/list.php');
    } else {
        echo "not found";
    }
}
?>
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
    <div class="container vh-100">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5">
                    <div class="card-header">
                        Log Masuk Sistem
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Emel Pengguna</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kata Laluan</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Log Masuk</button>
                                <a href="/lupa_katalaluan.php" class="btn btn-link">Lupa Kata Laluan?</a>
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
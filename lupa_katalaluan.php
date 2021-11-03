<?php 
include 'includes/config.php';

try {
    if(isset($_POST['email'])){
        // Search user by email/username
        $sql = $dbcon->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindParam(':email', $_POST['email']);
        $sql->execute();
        $pengguna = $sql->fetch();

        if($pengguna){
            $token = hash('sha256', rand(10000, 99999));
            $sql = $dbcon->prepare("UPDATE users SET token = :token WHERE id = :id");
            $sql->bindParam(':token', $token);
            $sql->bindParam(':id', $pengguna['id']);
            $sql->execute();
            
            // Send Email
            //Recipients
            $mail->setFrom('noreply@kpkt.gov.my', 'KPKT');
            $mail->addAddress($pengguna['email'], $pengguna['name']);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset Katalaluan';
            $mail->Body    = 'Sila Reset Katalaluan anda di 
            <a href="http://mampu.test/reset_katalaluan.php?token=' . $token . '">
            link
            </a>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        }

        echo '<script>alert("Email Reset Katalaluan Telah Dihantar");</script>';
        header('refresh:1; url=/login.php');
    }
} catch (\Throwable $th) {
    die($th->getMessage());
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
                        Lupa Katalaluan
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Emel Pengguna</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Semak Akaun</button>
                                <a href="/login.php" class="btn btn-link">Log Masuk</a>
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
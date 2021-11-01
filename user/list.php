<?php include '../includes/config.php' ?>
<?php include '../includes/header.php' ?>

<?php
$sql = $dbcon->query("SELECT * FROM users", PDO::FETCH_ASSOC);
$users = $sql->fetchAll();
?>
    <div class="container p-0">
        <h1 class="h3 mb-3">Title</h1>
        Content
    </div>

    <?php include '../includes/footer.php' ?>
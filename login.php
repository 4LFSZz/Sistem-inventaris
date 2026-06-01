<?php
require 'config/Database.php';
$db = new Database();
session_start();

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $result = $db->getLogin($username);
    $data = $result->fetch_assoc();
    $items = $result->num_rows;

    if ($items == 1) {
        if (password_verify($password, $data['password'])) {

            $_SESSION['login'] = true;

            header('Location: index.php');
            exit();
        } else {
            $_SESSION['pesan'] = 'Password anda salah';
            $_SESSION['status'] = 'danger';

            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['pesan'] = 'Username anda salah';
        $_SESSION['status'] = 'danger';

        header('Location: login.php');
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;" data-bs-theme="light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
            <h4 class="text-center text-uppercase mb-3">Login Admin</h4>
            <div class="col-5 m-auto">
                <div class="card p-3">

                    <?php
                    if (isset($_SESSION['pesan']) && ($_SESSION['status'])) {
                    ?>
                        <div class="alert alert-<?= $_SESSION['status']; ?>" role="alert">
                            <?= $_SESSION['pesan'] ?>
                        </div>
                    <?php
                        unset($_SESSION['pesan']);
                        unset($_SESSION['status']);
                    }
                    ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputUser" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleInputUser" placeholder="Masukan Username Anda" name="username" required>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan Password Anda" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="background-color: rgb(93, 151, 192);">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>

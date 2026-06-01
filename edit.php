<?php
require 'C:\xampp\htdocs\Sistem invertaris\Config\Database.php';
session_start();


$db = new Database();

$id = $_GET['id'];
$row = $db->getBarangById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = htmlspecialchars($_POST['nama_barang']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $stok = htmlspecialchars($_POST['stok']);
    $harga = htmlspecialchars($_POST['harga']);

    $db->updateBarang($id, $nama_barang, $kategori, $stok, $harga);

    $_SESSION['pesan'] = 'Barang berhasil diubah';
    $_SESSION['status'] = 'success';
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<style>
    label {
        display: inline-block;
        width: 100px;
        margin-right: 30px;
        text-align: baseline;
    }

    input {
        margin-top: 10px;
    }

    form {
        border: none;
        width: 500px;
        margin-left: 0px auto;
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;" data-bs-theme="light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="logout.php" onclick="return confirm('Logout?')">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <br>

    <div class="containter-fluid">
        <div class="row">
            <div class="col-5 m-auto">
                <div class="card p-3">
                    <div class="card-body">
                        <h2>Edit Barang</h2>
                        <form method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama" name="nama_barang" value="<?= $row['nama_barang'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $row['kategori'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok" value="<?= $row['stok'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                                <input class="form-control" name="harga" id="harga" value="<?= $row['harga'] ?>">
                            </div>
                            <br>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary" style="background-color: rgb(93, 151, 192);">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>

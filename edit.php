<?php
require 'C:\xampp\htdocs\Sistem invertaris\Config\Database.php';
$db = new Database();

$id = $_GET['id'];
$row = $db->getBarangById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $db->updateBarang($id, $nama_barang, $kategori, $stok, $harga);
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

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
<br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2>Edit Barang</h2>
                        <form method="post">
                            <label for="data">Nama Barang:</label>
                            <input type="text" name="nama_barang" value="<?= $row['nama_barang'] ?>" size="20">
                            <br>
                            <label for="data">Kategori:</label>
                            <input type="text" name="kategori" value="<?= $row['kategori'] ?>" size="20">
                            <br>
                            <label for="data">Stok:</label>
                            <input type="text" name="stok" value="<?= $row['stok'] ?>" size="20">
                            <br>
                            <label for="data">Harga:</label>
                            <input type="text" name="harga" value="<?= $row['harga'] ?>" size="20">
                            <br> <br>
                            <button href="index.php" class="btn btn-secondary">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
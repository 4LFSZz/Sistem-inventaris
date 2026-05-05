<?php
require 'C:\xampp\htdocs\Sistem invertaris\Config\Database.php';
require 'C:\xampp\htdocs\Sistem invertaris\Config\Barang.php';

$db = new Database();
$data = $db->getAllBarang();
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

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col"> <br>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0">Data Barang</h2>
                    </div>
                    <a href="tambah.php">
                        <button class="btn btn-primary">Tambah Data</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>harga</th>
                        <th></th>
                    </tr>

                    <?php
                    while ($row = $data->fetch_assoc()) {
                        $elektronik = new Barang($row['id_barang'], $row['nama_barang'], $row['kategori'], $row['stok'], $row['harga']);
                    ?>

                        <tr>
                            <td><?= $elektronik->id ?></td>
                            <td><?= $elektronik->nama_barang ?></td>
                            <td><?= $elektronik->kategori ?></td>
                            <td><?= $elektronik->stok ?></td>
                            <td><?= $elektronik->harga ?></td>
                            <td>
                                <a href="edit.php?id=<?= $elektronik->id ?>"><button class="btn btn-secondary">Edit</button></a>
                                <a href="hapus.php?id=<?= $elektronik->id ?>" onclick="return confirm('Yakin hapus?')">
                                    <button class="btn btn-secondary">Hapus</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
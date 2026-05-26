<?php
require 'C:\xampp\htdocs\Sistem invertaris\Config\Database.php';
require 'C:\xampp\htdocs\Sistem invertaris\Config\Barang.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css">
</head>
</head>

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

    <div class="container">
        <div class="row mb-4">
            <div class="col"> <br>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0">Data Barang</h2>
                    </div>
                    <a href="tambah.php">
                        <button class="btn btn-primary" style="background-color: rgb(93, 151, 192);">Tambah Data</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- pop up notifikasi -->
                <?php
                if (isset($_SESSION['pesan']) && ($_SESSION['status'])) {
                ?>
                    <div class="alert alert-<?= $_SESSION['status']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['pesan'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['pesan']);
                    unset($_SESSION['status']);
                }
                ?>

                <table class="table table-striped" id="isi">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 0;

                        while ($row = $data->fetch_assoc()) {
                            $elektronik = new Barang($row['id_barang'], $row['nama_barang'], $row['kategori'], $row['stok'], $row['harga']);
                            $no++;
                        ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $elektronik->nama_barang ?></td>
                                <td><?= $elektronik->kategori ?></td>
                                <td><?= $elektronik->stok ?></td>
                                <td><?= $elektronik->harga ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $elektronik->id ?>"><button class="btn btn-secondary">Edit</button></a>
                                    <a href="hapus.php?id=<?= $elektronik->id ?>" onclick="return confirm('Yakin hapus?')">
                                        <button class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>


    <script>
        new DataTable('#isi');
    </script>
</body>

</html>
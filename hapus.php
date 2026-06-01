<?php
require 'config/Database.php';
session_start();

$id = $_GET['id'];
$db = new Database();
$db->deletebarang($id);

    $_SESSION['pesan'] = 'Barang berhasil di hapus';
    $_SESSION['status'] = 'success';

header('Location: index.php');

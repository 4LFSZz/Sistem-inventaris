
<?php
require_once 'C:\xampp\htdocs\Sistem invertaris\vendor\autoload.php';
require 'C:\xampp\htdocs\Sistem invertaris\Config\Database.php';

$db = new Database();

$faker = Faker\Factory::create('id_ID');

for ($i = 0 ; $i<4 ; $i++) {
$nama_barang = $faker->randomElement(["kompor listrik", "stop kontak", "saklar", "lampu"]);
$kategori = $faker->randomElement(["elektronik", "komponen"]);
$stok = $faker->numberBetween(1,10);
$harga = $faker->numberBetween(30000, 45000, 600000);

$res = $db->insertBarang($nama_barang, $kategori, $stok, $harga);
}

if ($res) {
    echo 'Data masuk...';
} else {
    echo 'Gagal masuk';
}


?>
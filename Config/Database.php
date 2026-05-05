<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'db_toko';
    private $connectDB;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->connectDB = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connectDB->connect_error) {
            die('Error' . $this->connectDB->connect_error);
        }
    }
    public function getAllBarang()
    {
        $sql = "SELECT * FROM tb_barang";
        $result = $this->connectDB->query($sql);
        return $result;
    }

    public function getBarangById($id)
    {
        $sql = "SELECT * FROM tb_barang WHERE id_barang = ?";
        $stmt = $this->connectDB->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function insertBarang($nama_barang, $kategori, $stok, $harga)
    {
        $sql = "INSERT INTO tb_barang (nama_barang, kategori, stok, harga) VALUES (?,?,?,?)";
        $stmt = $this->connectDB->prepare($sql);
        $stmt->bind_param('ssss', $nama_barang, $kategori, $stok, $harga);
        return $stmt->execute();
    }

    public function updateBarang($id, $nama_barang, $kategori, $stok, $harga)
    {
        $sql = "UPDATE tb_barang SET nama_barang = ?, kategori = ?, stok = ?, harga = ? WHERE id_barang = ?";
        $stmt = $this->connectDB->prepare($sql);
        $stmt->bind_param('ssssi', $nama_barang, $kategori, $stok, $harga, $id);
        return $stmt->execute();
    }

    public function deleteBarang($id)
    {
        $sql = "DELETE FROM tb_barang WHERE id_barang = ?";
        $stmt = $this->connectDB->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}

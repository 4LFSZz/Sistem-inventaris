<?php
class Barang
{
    public $id;
    public $nama_barang;
    public $kategori;
    public $stok;
    public $harga;

    public function __construct($id, $nama_barang, $kategori, $stok, $harga)
    {
        $this->id = $id;
        $this->nama_barang = $nama_barang;
        $this->kategori = $kategori;
        $this->stok = $stok;
        $this->harga = $harga;
    }

    public function tampilkanData()
    {
        echo "ID: $this->id<br>";
        echo "Nama: $this->nama_barang<br>";
        echo "Kategori: $this->kategori<br>";
        echo "Stok: $this->stok<br>";
        echo "Harga: $this->harga<br>";
    }
}

<?php

class Produk {
    public $id_produk;
    public $nama_produk;
    public $harga;
    public $stok;

    public function __construct($id_produk=null, $nama_produk=null, $harga=null, $stok=null) {
        $this->id_produk = $id_produk;
        $this->nama_produk = $nama_produk;
        $this->harga = $harga;
        $this->stok = $stok;
    }


}
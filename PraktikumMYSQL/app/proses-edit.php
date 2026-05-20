<?php

include("../config/database.php");

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang_buku'];
    $penerbit = $_POST['penerbit_buku'];
    $tahun_terbit = $_POST['tahun_penerbitan_buku'];
    $stok = $_POST['stok_buku'];

    $sql = "UPDATE buku SET kode_buku='$kode_buku', judul_buku='$judul', penulis_buku='$pengarang', penerbit_buku='$penerbit', tahun_penerbit='$tahun_terbit', Stok='$stok' WHERE id_buku=$id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: list-buku.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }

} else {
    die("Akses dilarang...");
}

?>

<?php
include("../config/database.php");

if (isset($_POST['simpan'])) {
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang_buku'];
    $penerbit = $_POST['penerbit_buku'];
    $tahun = $_POST['tahun_penerbitan_buku'];
    $stok = $_POST['stok_buku'];
    $sql = "INSERT INTO buku (kode_buku, judul_buku, penulis_buku, penerbit_buku, tahun_penerbit, Stok) VALUE ('$kode_buku', '$judul', '$pengarang', '$penerbit', '$tahun', $stok)";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: ../index.php?status=sukses');
    } else {
        header('Location: ../index.php?status=gagal');
    }

} else {
    die("Akses dilarang...");
}

?>

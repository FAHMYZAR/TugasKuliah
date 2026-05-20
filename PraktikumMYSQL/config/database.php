<?php

$server = "mysql_db";
$user = "root";
$password = "root";
$nama_database = "perpustakaan";

$port = 3306;

$db = mysqli_connect($server, $user, $password, $nama_database, $port);

if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>

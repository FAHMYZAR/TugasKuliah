<?php

// $server = "mysql_db";
// $server = "localhost";
// $user = "root";
// $password = "";
// $nama_database = "perpustakaan";

// $port = 3306;

$server = "mysql";
$user = "perpus_user";
$password = "perpus123";
$nama_database = "perpustakaan";
$port = 3306;

$db = mysqli_connect($server, $user, $password, $nama_database, $port);

if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>

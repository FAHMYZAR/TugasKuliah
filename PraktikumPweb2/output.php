<?php

class Mahasiswa
{
    public $nama;
    public $nim;
    public $kelas;
    public $jurusan;
    public $jk;
    public $ipk;

    public function __construct($nama, $nim, $kelas, $jurusan, $jk, $ipk)
    {
        if ($ipk < 0 || $ipk > 4) {
            echo "IPK harus antara 0 - 4";
            exit;
        }

        $this->nama    = $nama;
        $this->nim     = $nim;
        $this->kelas   = $kelas;
        $this->jurusan = $jurusan;
        $this->jk      = $jk;
        $this->ipk     = $ipk;
    }
}
class Beasiswa extends Mahasiswa
{
    public function dapatBeasiswa()
    {
        return $this->ipk >= 3;
    }
}
$nama    = $_POST['nama'];
$nim     = $_POST['nim'];
$kelas   = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$jk      = $_POST['jk'];
$ipk     = $_POST['ipk'];

$mhs = new Beasiswa($nama, $nim, $kelas, $jurusan, $jk, $ipk);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Hasil Data Mahasiswa</title>
    <style>
        body {
            font-family: monospace;
        }
        table {
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        .pesan {
            margin-top: 15px;
            font-weight: bold;
        }
        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Ress Data Mahasiswa</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Jenis Kelamin</th>
            <th>IPK</th>
            <th>Beasiswa</th>
        </tr>
        <tr>
            <td><?= $mhs->nama ?></td>
            <td><?= $mhs->nim ?></td>
            <td><?= $mhs->kelas ?></td>
            <td><?= $mhs->jurusan ?></td>
            <td><?= $mhs->jk ?></td>
            <td><?= $mhs->ipk ?></td>
            <td><?php 
            if ($mhs->dapatBeasiswa()){
                echo "Dapat 1Juta";
            } else {
                echo "Tidak Dapat";
            } ?></td>
        </tr>
    </table>
    <?php if ($mhs->dapatBeasiswa()): ?>
        <div class="pesan">
            Yey Selamat <b><?= $mhs->nama ?></b>, Kamu berhasil mendapatkan Beasiswa sebanyak <b>Rp.1.000.000</b> 🎊🎉
        </div>
    <?php endif; ?>
    <br>
    <a href="index.php"> <button>Kembali</button> </a>
</body>
</html>
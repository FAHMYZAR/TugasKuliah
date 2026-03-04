<?php
session_start();

class Mahasiswa {

    private string $nama;
    private string $nim;
    private string $kelas;
    private string $jurusan;
    private string $jenisKelamin;
    private float $ipk;

    public function __construct($nama, $nim, $kelas, $jurusan, $jenisKelamin, $ipk) {

        if ($ipk < 0 || $ipk > 4) {
            echo "ipk harus 0-4";
            return;
        }

        $this->nama = $nama;
        $this->nim = $nim;
        $this->kelas = $kelas;
        $this->jurusan = $jurusan;
        $this->jenisKelamin = $jenisKelamin;
        $this->ipk = $ipk;
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function getNim(): string {
        return $this->nim;
    }

    public function getKelas(): string {
        return $this->kelas;
    }

    public function getJurusan(): string {
        return $this->jurusan;
    }

    public function getJenisKelamin(): string {
        return $this->jenisKelamin;
    }

    public function getIpk(): float {
        return $this->ipk;
    }

    public function proses(): void {
        echo "Data Mahasiswa dengan nama <b>{$this->nama}</b> berhasil diproses.<br>";
    }
}

class Beasiswa extends Mahasiswa {
    public function cekBeasiswa(): void {
        if ($this->getIpk() >= 3.0) {
            echo "Dapat Rp. 1.000.000";
        } else {
            echo "Tidak Dapat";
        }
    }   
}

if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = [];
}

$mahasiswa = &$_SESSION['mahasiswa'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $kelas = $_POST["kelas"];
    $jurusan = $_POST["jurusan"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $ipk = floatval($_POST["ipk"]);

    $mahasiswa[] = new Mahasiswa($nama,$nim,$kelas,$jurusan,$jenis_kelamin,$ipk);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Penerimaan Beasiswa</title>
    <style>
      body {
        font-family: monospace;
      }

      .container {
        max-width: 700px;
        margin: 40px auto;
      }
      table {
        width: 100%;
        margin-top: 20px;
      }
      th,td {
        border: 2px solid black;
        padding: 8px;
      }
      form {
        margin-bottom: 20px;
      }
      input,select {
        width: 100%;
        padding: 6px;
      }
      button {
        margin-bottom: 15px;
      }
      .data-mahasiswa {
        margin-top: 20px;
      }
      .horizontal-grup {
        display: flex;
        gap: 10px;
      }
    </style>
</head>
<body>
    <div class="container">
        <h1>Penerimaan Beasiswa</h1>
        <button><a href="urlsource.php" target="_blank">SOURCE CODE</a></button>
        
        <form method="post">
            <label>Nama</label>
            <input type="text" name="nama" required>
            <label>NIM</label>
            <input type="text" name="nim" required>
            <label>Kelas</label>
            <input type="text" name="kelas" required>
            <label>Jurusan</label>
            <input type="text" name="jurusan" required>
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label>IPK</label>
            <input type="number" step="0.01" name="ipk" required>
            <br><br>
            <div class="horizontal-grup">
                <input type="submit" value="Proses">
                <input type="reset" value="Batal">
            </div>
        </form>
        <div class="data-mahasiswa">
            <?php if (!empty($mahasiswa)): ?>`
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
                    <?php foreach ($mahasiswa as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getNama() ?></td>
                        <td><?= $mhs->getNim() ?></td>
                        <td><?= $mhs->getKelas() ?></td>
                        <td><?= $mhs->getJurusan() ?></td>
                        <td><?= $mhs->getJenisKelamin() ?></td>
                        <td><?= $mhs->getIpk() ?></td>
                        <td>
                            <?php 
                                $beasiswa = new Beasiswa(
                                    $mhs->getNama(),
                                    $mhs->getNim(),
                                    $mhs->getKelas(),
                                    $mhs->getJurusan(),
                                    $mhs->getJenisKelamin(),
                                    $mhs->getIpk()
                                );
                                $beasiswa->cekBeasiswa();
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            <?php else: ?>
                <p>Belum ada data mahasiswa yang diproses.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>



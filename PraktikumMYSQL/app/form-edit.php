<?php

include("../config/database.php");

if (!isset($_GET['id'])) {
    header('Location: list-buku.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM buku WHERE id_buku=$id limit 1";
$query = mysqli_query($db, $sql);
$buku = mysqli_fetch_array($query);

if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku | Sistem Perpustakaan</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="../index.php" class="nav-link" style="display: inline-block; margin-bottom: 16px;">← Beranda</a>
            <h1>Edit Buku</h1>
            <p class="text-muted">Ubah informasi buku yang sudah tersimpan</p>
        </div>
    </header>

    <div class="page-content">
        <div class="container" style="max-width: 600px;">
            <div class="card">
                <form action="proses-edit.php" method="POST">
                    <fieldset>
                        <input type="hidden" name="id" value="<?php echo $buku['id_buku'] ?>" />

                        <div class="form-group">
                            <label for="kode_buku">Kode Buku *</label>
                            <input type="text" id="kode_buku" name="kode_buku" placeholder="Masukkan kode buku" value="<?php echo $buku['kode_buku'] ?>" required />
                        </div>

                        <div class="form-group">
                            <label for="judul_buku">Judul Buku *</label>
                            <input type="text" id="judul_buku" name="judul_buku" placeholder="Masukkan judul buku" value="<?php echo $buku['judul_buku'] ?>" required />
                        </div>

                        <div class="form-group">
                            <label for="pengarang_buku">Pengarang Buku *</label>
                            <input type="text" id="pengarang_buku" name="pengarang_buku" placeholder="Masukkan nama pengarang" value="<?php echo $buku['penulis_buku'] ?>" required />
                        </div>

                        <div class="form-group">
                            <label for="penerbit_buku">Penerbit Buku *</label>
                            <input type="text" id="penerbit_buku" name="penerbit_buku" placeholder="Masukkan nama penerbit" value="<?php echo $buku['penerbit_buku'] ?>" required />
                        </div>

                        <div class="form-group">
                            <label for="tahun_penerbitan_buku">Tahun Penerbitan *</label>
                            <input type="number" id="tahun_penerbitan_buku" name="tahun_penerbitan_buku" min="1900" max="2099" placeholder="Masukkan tahun penerbitan" value="<?php echo $buku['tahun_penerbit'] ?>" required />
                        </div>

                        <div class="form-group">
                            <label for="stok_buku">Stok Buku *</label>
                            <input type="number" id="stok_buku" name="stok_buku" min="0" placeholder="Masukkan jumlah stok" value="<?php echo $buku['Stok'] ?>" required />
                        </div>

                        <div class="form-actions">
                            <input type="submit" value="Simpan Perubahan" name="simpan" class="btn-primary" />
                            <a href="list-buku.php" class="btn btn-back">Kembali</a>
                        </div>
                    </fieldset>
                </form>
            </div>

            <p class="text-small text-muted" style="margin-top: 24px;">* Semua field harus diisi</p>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Sistem Perpustakaan. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

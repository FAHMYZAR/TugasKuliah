<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penambahan Buku | Sistem Perpustakaan</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="../index.php" class="nav-link" style="display: inline-block; margin-bottom: 16px;">← Beranda</a>
            <h1>Tambah Buku Baru</h1>
            <p class="text-muted">Lengkapi formulir di bawah untuk menambahkan buku ke perpustakaan</p>
        </div>
    </header>

    <div class="page-content">
        <div class="container" style="max-width: 600px;">
            <div class="card">
                <form action="proses-pendaftaran.php" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="kode_buku">Kode Buku *</label>
                            <input type="text" id="kode_buku" name="kode_buku" placeholder="Contoh: BK001" required />
                        </div>

                        <div class="form-group">
                            <label for="judul_buku">Judul Buku *</label>
                            <input type="text" id="judul_buku" name="judul_buku" placeholder="Masukkan judul buku" required />
                        </div>

                        <div class="form-group">
                            <label for="pengarang_buku">Pengarang Buku *</label>
                            <input type="text" id="pengarang_buku" name="pengarang_buku" placeholder="Masukkan nama pengarang" required />
                        </div>

                        <div class="form-group">
                            <label for="penerbit_buku">Penerbit Buku *</label>
                            <input type="text" id="penerbit_buku" name="penerbit_buku" placeholder="Masukkan nama penerbit" required />
                        </div>

                        <div class="form-group">
                            <label for="tahun_penerbitan_buku">Tahun Penerbitan *</label>
                            <input type="number" id="tahun_penerbitan_buku" name="tahun_penerbitan_buku" min="1900" max="2099" placeholder="Contoh: 2026" required />
                        </div>

                        <div class="form-group">
                            <label for="stok_buku">Stok Buku *</label>
                            <input type="number" id="stok_buku" name="stok_buku" min="0" placeholder="Masukkan jumlah stok" required />
                        </div>

                        <div class="form-actions">
                            <input type="submit" value="Simpan Buku" name="simpan" class="btn-primary" />
                            <input type="reset" value="Bersihkan" name="reset" class="btn-tertiary" />
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
            <p>&copy; 2026 Sistem Perpustakaan. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

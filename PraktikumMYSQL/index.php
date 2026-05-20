<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan | Kuliah Pemroograman Web Lanjut</title>
    <link rel="stylesheet" href="app/styles.css">
</head>

<body>
    <header>
        <div class="container">
            <p class="text-small text-muted">Sistem Informasi</p>
            <h1>SISTEM PERPUSTAKAAN</h1>
            <h4 class="text-muted">Kuliah Pemroograman Web Lanjut</h4>
        </div>
    </header>

    <div class="page-content">
        <div class="container">
            <?php if (isset($_GET['status'])): ?>
                <div class="alert <?php echo $_GET['status'] == 'sukses' ? 'alert-success' : 'alert-error'; ?>">
                    <?php
                        if ($_GET['status'] == 'sukses') {
                            echo "✓ Buku berhasil disimpan!";
                        } else {
                            echo "✗ Buku gagal disimpan!";
                        }
                    ?>
                </div>
            <?php endif; ?>

            <h2>Selamat Datang</h2>
            <p>Kelola koleksi buku perpustakaan dengan mudah melalui sistem ini.</p>

            <div style="display: flex; gap: 16px; margin-top: 32px;">
                <a href="app/form-daftar.php" class="btn btn-primary">+ Daftar Buku Baru</a>
                <a href="app/list-buku.php" class="btn btn-secondary">Lihat Katalog Buku</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Sistem Perpustakaan. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

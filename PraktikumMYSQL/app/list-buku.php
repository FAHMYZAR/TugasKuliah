<?php include("../config/database.php"); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku | Sistem Perpustakaan</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="../index.php" class="nav-link" style="display: inline-block; margin-bottom: 16px;">← Beranda</a>
            <h1>Katalog Buku</h1>
            <p class="text-muted">Daftar lengkap buku yang tersedia di perpustakaan</p>
        </div>
    </header>

    <div class="page-content">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <h3 style="margin: 0;">Daftar Buku</h3>
                <a href="form-daftar.php" class="btn btn-primary">+ Tambah Buku Baru</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th style="width: 100px;">Tahun</th>
                        <th style="width: 60px;">Stok</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM buku";
                    $query = mysqli_query($db, $sql);

                    $no = 0;
                    while ($buku = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        $no++;
                        echo "<td>".$no."</td>";
                        echo "<td><strong>".$buku['kode_buku']."</strong></td>";
                        echo "<td>".$buku['judul_buku']."</td>";
                        echo "<td>".$buku['penulis_buku']."</td>";
                        echo "<td>".$buku['penerbit_buku']."</td>";
                        echo "<td>".$buku['tahun_penerbit']."</td>";
                        echo "<td>".$buku['Stok']."</td>";
                        echo "<td class='actions'>";
                        echo "<a href='form-edit.php?id=".$buku['id_buku']."' class='btn btn-tertiary btn-small'>Edit</a> ";
                        echo "<a href='hapus.php?id=".$buku['id_buku']."' class='btn btn-danger btn-small' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div style="margin-top: 24px; padding: 16px; background-color: #f4f4f4; border-left: 4px solid #0f62fe;">
                <p class="text-small"><strong>Total Buku:</strong> <?php echo mysqli_num_rows($query); ?> item</p>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2026 Sistem Perpustakaan. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

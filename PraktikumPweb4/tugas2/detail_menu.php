<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Menu</title>
    <style>
        body {
            font-family: monospace;
            background-color: #edf2f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .detail-card {
            background-color: #8d99ae;
            padding: 30px;
            border-radius: 20px;
            width: 100%;
            max-width: 450px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            color: #2b2d42;
        }

        img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 20px;
            border: 4px solid #2b2d42;
        }

        h2 {
            margin: 10px 0;
            text-transform: uppercase;
            font-size: 1.8em;
        }

        .harga-tag {
            font-size: 1.6em;
            color: #f1faee;
            background: #2b2d42;
            padding: 12px;
            border-radius: 10px;
            display: block;
            margin: 15px 0;
            font-weight: bold;
        }

        .info-box {
            text-align: left;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 10px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .back-btn {
            display: inline-block;
            color: #2b2d42;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #2b2d42;
            padding: 10px 25px;
            border-radius: 8px;
            transition: 2s;
        }

        .back-btn:hover {
            background: #2b2d42;
            color: white;
        }
    </style>
</head>
<body>

<div class="detail-card">
    <?php
        $nama  = $_GET['nama'] ?? 'Menu';
        $harga = $_GET['harga'] ?? '0';
        $img   = $_GET['img'] ?? 'https://placeholder.com';
        $desc  = $_GET['desc'] ?? 'Deskripsi tidak tersedia.';
    ?>

    <img src="<?= htmlspecialchars($img) ?>" alt="Makanan">
    <h2><?= htmlspecialchars($nama) ?></h2>
    
    <div class="harga-tag">Rp <?= number_format($harga, 0, ',', '.') ?></div>
    
    <div class="info-box">
        <strong>Deskripsi Produk:</strong><br>
        <?= htmlspecialchars($desc) ?>
    </div>

    <a href="menu.php" class="back-btn">← KEMBALI KE MENU</a>
</div>

</body>
</html>

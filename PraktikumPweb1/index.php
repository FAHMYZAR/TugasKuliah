<?php
// Variabel Barang
$nama_barang = "Buku";
$harga_barang = 50000;
$stok_barang = 10;

// Array Barang
$barang = [
    "nama" => "Pensil",
    "harga" => 2000,
    "stok" => 50
];

// Variabel Lain
$diskon = 0.1;
$tersedia = true;
$deskripsi = "Belum ada deskripsi";

// Operasi Logika
$logic_ops = [
    [
        'label' => 'AND',
        'expr' => 'true && false',
        'result' => true && false
    ],
    [
        'label' => 'OR',
        'expr' => 'true || false',
        'result' => true || false
    ],
    [
        'label' => 'NOT',
        'expr' => '!true',
        'result' => !true
    ]
];

// Operator Pembanding
$a = 6;
$b = 2;
$compare_ops = [
    [
        'expr' => "$a > $b",
        'result' => $a > $b
    ],
    [
        'expr' => "$a < $b",
        'result' => $a < $b
    ],
    [
        'expr' => "$a == $b",
        'result' => $a == $b
    ],
    [
        'expr' => "$a != $b",
        'result' => $a != $b
    ],
    [
        'expr' => "$a >= $b",
        'result' => $a >= $b
    ],
    [
        'expr' => "$a <= $b",
        'result' => $a <= $b
    ]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Belajar Variabel PHP</title>
    <style>
        body {
            font-family: "monospace";
            margin: 0;
            background: #f4f6f8;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 24px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        h1, h2 {
            color: #222;
            margin-bottom: 8px;
        }
        .section {
            margin-bottom: 32px;
        }
        .info-list, .logic-table, .compare-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }
        .info-list td {
            padding: 6px 0;
        }
        .logic-table th, .logic-table td,
        .compare-table th, .compare-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .logic-table th, .compare-table th {
            background: #f0f0f0;
        }
        .true { color: #2e7d32; font-weight: bold; }
        .false { color: #c62828; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <button><a href="https://github.com/FAHMYZAR/TugasKuliah/blob/main/PraktikumPweb1/index.php" target="_blank"> SOURCE CODE </a></button>
        <h1>Informasi Barang</h1>
        
        <div class="section">
            <table class="info-list">
                <tr><td>Nama Barang:</td><td><?php echo $nama_barang; ?></td></tr>
                <tr><td>Harga Barang:</td><td><?php echo number_format($harga_barang,0,',','.'); ?></td></tr>
                <tr><td>Stok Barang:</td><td><?php echo $stok_barang; ?></td></tr>
            </table>
        </div>
        <h2>Belajar Array</h2>
        <div class="section">
            <table class="info-list">
                <tr><td>Nama Barang Array:</td><td><?php echo $barang["nama"]; ?></td></tr>
                <tr><td>Harga Barang Array:</td><td><?php echo number_format($barang["harga"],0,',','.'); ?></td></tr>
                <tr><td>Stok Barang Array:</td><td><?php echo $barang["stok"]; ?></td></tr>
            </table>
        </div>
        <h2>Lainnya</h2>
        <div class="section">
            <table class="info-list">
                <tr><td>Diskon:</td><td><?php echo ($diskon * 100) . "%"; ?></td></tr>
                <tr><td>Tersedia:</td>
                    <td>
                        <span class="<?php echo $tersedia ? 'true' : 'false'; ?>">
                            <?php echo $tersedia ? "Ya" : "Tidak"; ?>
                        </span>
                    </td>
                </tr>
                <tr><td>Deskripsi:</td><td><?php echo $deskripsi; ?></td></tr>
            </table>
        </div>
        <h2>Operasi Logika</h2>
        <div class="section">
            <table class="logic-table">
                <tr>
                    <th>Operasi</th>
                    <th>Ekspresi</th>
                    <th>Hasil</th>
                </tr>
                <?php foreach($logic_ops as $op): ?>
                <tr>
                    <td><?php echo $op['label']; ?></td>
                    <td><?php echo $op['expr']; ?></td>
                    <td>
                        <span class="<?php echo $op['result'] ? 'true' : 'false'; ?>">
                            <?php echo $op['result'] ? 'true' : 'false'; ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <h2>Operator Pembanding</h2>
        <div class="section">
            <table class="compare-table">
                <tr>
                    <th>Ekspresi</th>
                    <th>Hasil</th>
                </tr>
                <?php foreach($compare_ops as $op): ?>
                <tr>
                    <td><?php echo $op['expr']; ?></td>
                    <td>
                        <span class="<?php echo $op['result'] ? 'true' : 'false'; ?>">
                            <?php echo $op['result'] ? 'true' : 'false'; ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>
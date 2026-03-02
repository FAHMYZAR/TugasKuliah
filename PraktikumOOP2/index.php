<?php

class Produk {
    private string $nama;
    private int $harga;
    private int $stok;

    public function __construct(string $nama, int $harga, int $stok) {
        if ($harga < 0 || $stok < 0) {
            echo "Harga dan stok tidak boleh negatif.";
            return;
        }

        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function getHarga(): int {
        return $this->harga;
    }

    public function getStok(): int {
        return $this->stok;
    }

    public function hitungTotal(int $jumlah): int {
        return $this->harga * $jumlah;
    }

    public function kurangiStok(int $jumlah): void {
        if ($jumlah <= 0) {
            echo "Jumlah yang dibeli harus lebih dari 0.";
            return;
        }

        if ($jumlah > $this->stok) {
            echo "Stok tidak mencukupi. di produk {$this->nama} hanya tersedia {$this->stok} unit.";
            return;
        }

        $this->stok -= $jumlah;
    }
}

class Transaksi {
    private Produk $produk;
    private int $jumlahBeli;
    private float $diskon;
    private int $totalBayar;

    public function __construct(Produk $produk, int $jumlahBeli, float $diskon) {

        // buat validasi jumlah beli <= 0 dan diskon < 0 atau > 1
        if ($jumlahBeli <= 0) {
            echo "Jumlah beli harus lebih dari 0.";
            return;
        }

        if ($diskon < 0 || $diskon > 1) {
            echo "Diskon harus antara 0 dan 1.";
            return;
        }

        $this->produk = $produk;
        $this->jumlahBeli = $jumlahBeli;
        $this->diskon = $diskon;

        $this->produk->kurangiStok($jumlahBeli);
        $total = $this->produk->hitungTotal($jumlahBeli);
        // method diskon persen jadi tuh set 0-1, misal 0.1 untuk 10% diskon, dst...
        $this->totalBayar = (int)($total - ($total * $diskon));
    }

    public function getProduk(): Produk {
        return $this->produk;
    }

    public function getJumlahBeli(): int {
        return $this->jumlahBeli;
    }

    public function getTotalBayar(): int {
        return $this->totalBayar;
    }

    public function cetakStruk(): string {
        return 
            "Struk Pembelian:\n" .
            "Produk : {$this->produk->getNama()}\n" .
            "Jumlah : {$this->jumlahBeli}\n" .
            "Total  : " . number_format($this->totalBayar, 0, ',', '.');
    }
}

$pr = [
    new Produk("Laptop", 15000000, 10),
    new Produk("Smartphone", 5000000, 20),
    // tambahin 3 produk
    new Produk("Headphone", 1000000, 15),
    new Produk("Smartwatch", 2000000, 5),
    new Produk("Tablet", 3000000, 8),
];

$tr = [
    new Transaksi($pr[0], 2, 0.1),
    new Transaksi($pr[1], 1, 0.5),
    // tambah 3 transaksi
    new Transaksi($pr[2], 3, 0.2),
    new Transaksi($pr[3], 1, 0.15),
    new Transaksi($pr[1], 2, 0.25),
];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Produk</title>
    <style>
        body { 
            font-family: monospace;
        }
        .container { 
            max-width: 800px; 
            margin: 40px auto; 
        }
        table { 
            width: 100%; 
            margin-bottom: 24px; 
        }
        th, td { 
            border: 2px solid #000; 
            padding: 8px; 
        }
        h1, h2 { 
            margin-bottom: 10px; 
        }
        form { 
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
<div class="container">

<h1>Inventory Produk</h1>
<button><a href="https://raw.githubusercontent.com/FAHMYZAR/TugasKuliah/refs/heads/main/Praktikum2/index.php" target="_blank"> SOURCE CODE </a></button>
<h2>Daftar Produk</h2>
<table>
<tr>
    <th>Nama</th>
    <th>Harga</th>
    <th>Stok</th>
</tr>
<?php foreach ($pr as $p): ?>
<tr>
    <td><?= $p->getNama(); ?></td>
    <td><?= number_format($p->getHarga(), 0, ',', '.'); ?></td>
    <td><?= $p->getStok(); ?></td>
</tr>
<?php endforeach; ?>
</table>

<h2>Riwayat Transaksi</h2>
<table>
<tr>
    <th>Produk</th>
    <th>Jumlah</th>
    <th>Total</th>
</tr>
<?php foreach ($tr as $t): ?>
<tr>
    <td><?= $t->getProduk()->getNama(); ?></td>
    <td><?= $t->getJumlahBeli(); ?></td>
    <td><?= number_format($t->getTotalBayar(), 0, ',', '.'); ?></td>
</tr>
<?php endforeach; ?>
</table>

<h2>Struk</h2>
<pre>
<?php
foreach ($tr as $t) {
    echo $t->cetakStruk() . "\n\n";
}
?>
</pre>

</div>
</body>
</html>
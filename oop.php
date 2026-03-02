<?php

class Produk {
    private string $nama;
    private int $harga;
    private int $stok;

    public function __construct(string $nama, int $harga, int $stok) {
        if ($harga < 0 || $stok < 0) {
            throw new InvalidArgumentException("Harga dan stok tidak boleh negatif.");
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
            throw new InvalidArgumentException("Jumlah beli harus lebih dari 0.");
        }

        if ($jumlah > $this->stok) {
            throw new RuntimeException("Stok tidak mencukupi.");
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

        if ($jumlahBeli <= 0) {
            throw new InvalidArgumentException("Jumlah beli harus lebih dari 0.");
        }

        if ($diskon < 0 || $diskon > 1) {
            throw new InvalidArgumentException("Diskon harus antara 0 dan 1.");
        }

        $this->produk = $produk;
        $this->jumlahBeli = $jumlahBeli;
        $this->diskon = $diskon;

        $this->produk->kurangiStok($jumlahBeli);
        $total = $this->produk->hitungTotal($jumlahBeli);
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
];

$tr = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mode'])) {

    $mode = $_POST['mode'];

    if ($mode === 'add' && isset($_POST['nama'], $_POST['harga'], $_POST['stok'])) {

        $nama = htmlspecialchars($_POST['nama']);
        $harga = (int)$_POST['harga'];
        $stok = (int)$_POST['stok'];

        try {
            $pr[] = new Produk($nama, $harga, $stok);
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }

    if ($mode === 'buy' && isset($_POST['nama'], $_POST['jumlah'], $_POST['diskon'])) {

        $nama = $_POST['nama'];
        $jumlah = (int)$_POST['jumlah'];
        $diskon = (float)$_POST['diskon'];

        $produkDipilih = null;

        foreach ($pr as $p) {
            if ($p->getNama() === $nama) {
                $produkDipilih = $p;
                break;
            }
        }

        if ($produkDipilih) {
            try {
                $tr[] = new Transaksi($produkDipilih, $jumlah, $diskon);
            } catch (Throwable $e) {
                echo $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Produk</title>
    <style>
        body { font-family: monospace; background: #f4f6f8; margin: 0; }
        .container { max-width: 800px; margin: 40px auto; padding: 24px; background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
        table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f0f0f0; }
        h1, h2 { margin-bottom: 10px; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container">

<h1>Inventory Produk</h1>

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

<h2>Tambah Produk</h2>
<form method="post">
    <input type="hidden" name="mode" value="add">
    Nama:<br>
    <input type="text" name="nama" required><br>
    Harga:<br>
    <input type="number" name="harga" required><br>
    Stok:<br>
    <input type="number" name="stok" required><br><br>
    <button type="submit">Tambah</button>
</form>

<h2>Beli Produk</h2>
<form method="post">
    <input type="hidden" name="mode" value="buy">
    Produk:<br>
    <select name="nama">
        <?php foreach ($pr as $p): ?>
        <option value="<?= $p->getNama(); ?>"><?= $p->getNama(); ?></option>
        <?php endforeach; ?>
    </select><br>
    Jumlah:<br>
    <input type="number" name="jumlah" required><br>
    Diskon (0-1):<br>
    <input type="number" step="0.01" name="diskon" required><br><br>
    <button type="submit">Beli</button>
</form>

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
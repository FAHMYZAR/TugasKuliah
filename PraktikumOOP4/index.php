<?php

class RekeningBank {

    public string $nomorRekening;
    public string $namaPemilik;
    private int $saldo;
    private string $pin;
    public string $jenisRekening;

    public function __construct($nomorRekening, $namaPemilik, $saldoAwal, $pin, $jenisRekening) {

        if ($saldoAwal < 0) {
            echo "Saldo awal tidak valid.<br>";
            return;
        }

        $this->nomorRekening = $nomorRekening;
        $this->namaPemilik = $namaPemilik;
        $this->saldo = $saldoAwal;
        $this->pin = $pin;
        $this->jenisRekening = $jenisRekening;
    }

    public function tampilkanInfo(): void {
        echo "<br> <b> >>Informasi Rekening </b> <br>";
        echo "Nomor Rekening : {$this->nomorRekening}<br>";
        echo "Nama Pemilik   : {$this->namaPemilik}<br>";
        echo "Jenis Rekening : {$this->jenisRekening}<br>";
        echo "Saldo          : Rp" . number_format($this->saldo, 0, ',', '.') . "<br>";
    }

    public function setorUang(int $jumlah): void {
        if ($jumlah <= 0) {
            echo "Jumlah setor tidak valid<br>";
            return;
        }

        $this->saldo += $jumlah;

        echo "Setor berhasil<br>";
        echo "Saldo sekarang : Rp" . number_format($this->saldo, 0, ',', '.') . "<br>";
    }

    public function tarikUang(int $jumlah, string $pin): void {

        if ($pin !== $this->pin) {
            echo "PIN salah<br>";
            return;
        }

        if ($jumlah > $this->saldo) {
            echo "Saldo tidak cukup<br>";
            return;
        }

        if (($this->saldo - $jumlah) < 50000) {
            echo "Penarikan gagal<br>";
            echo "Saldo minimal harus 50000<br>";
            return;
        }

        $this->saldo -= $jumlah;

        echo "Penarikan berhasil<br>";
        echo "Saldo sekarang : Rp" . number_format($this->saldo, 0, ',', '.') . "<br>";
    }

    public function getSaldo(): int {
        return $this->saldo;
    }

    public function ubahPin(string $pinLama, string $pinBaru): void {
        if ($pinLama === $this->pin) {
            $this->pin = $pinBaru;
            echo "PIN berhasil diubah<br>";
        } else {
            echo "PIN lama salah<br>";
        }
    }

    // Transfer Uang
    public function transferUang(RekeningBank $tujuan, int $jumlah, string $pin): void {

        if ($pin !== $this->pin) {
            echo "PIN salah<br>";
            return;
        }

        if ($jumlah > $this->saldo) {
            echo "Saldo tidak cukup<br>";
            return;
        }

        if (($this->saldo - $jumlah) < 50000) {
            echo "Transfer gagal<br>";
            echo "Saldo minimal harus 50000<br>";
            return;
        }

        $this->saldo -= $jumlah;
        $tujuan->saldo += $jumlah;

        echo "Transfer berhasil<br>";
        echo "Saldo pengirim : Rp" . number_format($this->saldo, 0, ',', '.') . "<br>";
        echo "Saldo penerima : Rp" . number_format($tujuan->saldo, 0, ',', '.') . "<br>";
    }

    // Cejk PIN
    public function cekPin(string $pin): void {
        if ($pin === $this->pin) {
            echo "PIN valid ".$pin."<br>";
        } else {
            echo "PIN salah ".$pin."<br>";
        }
    }
}

$rekening1 = new RekeningBank("123456", "Andi", 500000, "1234", "Tabungan");
$rekening2 = new RekeningBank("654321", "Budi", 200000, "5678", "Giro");

echo "<button><a href='https://github.com/fahmyzzx/PraktikumOOP4' target='_blank'>👉Source Code</a></button>";
$rekening1->tampilkanInfo();

$rekening1->setorUang(200000);
$rekening1->tarikUang(100000, "1234");

$rekening1->ubahPin("1234", "5678");

echo "<br> <b> >>Transfer </b> <br>";
$rekening1->transferUang($rekening2, 100000, "5678");

echo "<br> <b> >>Cek PIN </b> <br>";
$rekening1->cekPin("5678");

?>
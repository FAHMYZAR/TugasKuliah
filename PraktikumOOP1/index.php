<?php

class Rekening {
    private string $nomorRekening;
    private string $pemilik;
    private int $saldo;

    public function __construct(string $nomorRekening, string $pemilik, int $saldo) {
        if ($saldo < 0) {
            echo "Saldo awal tidak boleh negatif.";
            return;
        }

        $this->nomorRekening = $nomorRekening;
        $this->pemilik = $pemilik;
        $this->saldo = $saldo;
    }

    public function getNomorRekening(): string {
        return $this->nomorRekening;
    }

    public function getPemilik(): string {
        return $this->pemilik;
    }

    public function getSaldo(): int {
        return $this->saldo;
    }

    public function setor(int $jumlah): void {
        if ($jumlah <= 0) {
            echo "Jumlah setoran harus lebih dari 0.";
            return;
        }

        $this->saldo += $jumlah;
        echo "Berhasil setor Rp" . number_format($jumlah, 0, ',', '.') . 
             ". Saldo: Rp" . number_format($this->saldo, 0, ',', '.') . "<br>";
    }

    public function tarik(int $jumlah): void {
        if ($jumlah <= 0) {
            echo "Jumlah penarikan harus lebih dari 0";
            return;
        }

        if ($jumlah > $this->saldo) {
            echo "Saldo tidak mencukupi";
            return;
        }

        $this->saldo -= $jumlah;

        echo "Berhasil tarik Rp" . number_format($jumlah, 0, ',', '.') . 
             ". Saldo: Rp" . number_format($this->saldo, 0, ',', '.') . "<br>";
    }
}

// Penggunaan
$rekening = new Rekening("01113322574", "Fahmi Baik", 1000000);
echo "Nomor Rekening: " . $rekening->getNomorRekening() . "<br>";
echo "Pemilik: " . $rekening->getPemilik() . "<br>";
echo "Saldo awal: Rp" . number_format($rekening->getSaldo(), 0, ',', '.') . "<br><br>";

$rekening->setor(500000);
$rekening->tarik(200000);
$rekening->tarik(2000000);

echo "<br><br>Saldo saat ini: Rp" . 
     number_format($rekening->getSaldo(), 0, ',', '.');

?>
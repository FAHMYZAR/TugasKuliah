<?php

class BankMini {
    private $saldo;

    private $bunga;

    private $jangkawaktu;
    public function __construct($saldo, $bunga, $jangkawaktu) {
        $this->saldo = $saldo;
        $this->bunga = $bunga;
        $this->jangkawaktu = $jangkawaktu;
    }

    public function get_saldo() {
        return $this->saldo;
    }   
    public function get_bunga() {
        return $this->bunga;
    }
    public function get_jangkawaktu() {
        return $this->jangkawaktu;
    }
    public function set_saldo($saldo) {
        $this->saldo = $saldo;
    }
    public function set_bunga($bunga) {
        $this->bunga = $bunga;
    }
    public function set_jangkawaktu($jangkawaktu) {
        $this->jangkawaktu = $jangkawaktu;
    }

    public function hitung_bunga() {
        $bunga_terhitung = $this->saldo * ($this->bunga / 100) * ($this->jangkawaktu / 12);
        return $bunga_terhitung;
    }
    public function get_saldo_bunga() {
        $saldo_bunga = $this->saldo + $this->hitung_bunga();
        return $saldo_bunga;
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $saldo = $_POST["saldo"];
    $bunga = $_POST["bunga"];
    $jangkawaktu = $_POST["jangkawaktu"];
    $bankMini = new BankMini($saldo, $bunga, $jangkawaktu);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Mini</title>
</head>
<body>
    
</body>
</html>
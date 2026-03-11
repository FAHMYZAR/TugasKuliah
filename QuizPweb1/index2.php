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
    <h1>Bank Mini</h1>
    <button><a href="https://github.com/FAHMYZAR/TugasKuliah/blob/main/QuizPweb1/index2.php" target="_blank">Source Code</a></button>

    <br><br>
    <form method="post" action="">
        <label for="saldo">Saldo:</label>
        <input type="number" id="saldo" name="saldo" min="0" required><br><br>
        <label for="bunga">Bunga (%):</label>
        <input type="number" id="bunga" name="bunga" min="0" step="0.01" required><br><br>
        <label for="jangkawaktu">Jangka Waktu (bulan):</label>
        <input type="number" id="jangkawaktu" name="jangkawaktu" min="1" required><br><br>
        <input type="submit" value="Hitung Bunga">
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Saldo</th>
            <th>Bunga (%)</th>
            <th>Jangka Waktu (bulan)</th>
            <th>Bunga Terhitung</th>
            <th>Saldo + Bunga</th>
        </tr>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<tr>";
            echo "<td>" . number_format($bankMini->get_saldo(), 2) . "</td>";
            echo "<td>" . $bankMini->get_bunga() . "</td>";
            echo "<td>" . $bankMini->get_jangkawaktu() . "</td>";
            echo "<td>" . number_format($bankMini->hitung_bunga(), 2) . "</td>";
            echo "<td>" . number_format($bankMini->get_saldo_bunga(), 2) . "</td>";
            echo "</tr>";
        }
        ?>
</body>
</html>
<?php

class BintangSegitiga {
    public function cetak($jumlah) {
        for ($i = 1; $i <= $jumlah; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo "* ";
            }
            echo "<br>";
        }
    }
}

$bintang = new BintangSegitiga();
?>



<DOCTYPE html>
<html>
<head>
    <title>Quiz PWEB 1</title>
</head>
<body>
    <h1>Quiz PWEB 1</h1>    
    <button> <a href="https://example.com">Source Code</a> </button>
    <form method="post" action="">
        <label for="jumlah">Jumlah Bintang:</label>
        <input type="number" id="jumlah" name="jumlah" min="1" required>
        <input type="submit" value="Cetak Bintang">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jumlah = $_POST["jumlah"];
        $bintang->cetak($jumlah);
    }
    ?>
</body>
</html> 
<?php

$diameter = 330;

function luasLingkaran($d) {
    $radius = $d / 2;
    return 3.14 * pow($radius, 2);
}

function kelilingLingkaran($d) {
    return 3.14 * $d;
}

function volumeBola($d) {
    $radius = $d / 2;
    return (4/3) * 3.14 * pow($radius, 3);
}

echo "<button><a href="https://github.com/FAHMYZAR/TugasKuliah/blob/main/PraktikumPweb3/index.php" target="_blank"> SOURCE CODE </a></button><br><br>";

echo "<h2>Tugas Pertama</h2>";
echo "Diameter: $diameter <br>";
echo "Luas Lingkaran: " . luasLingkaran($diameter) . "<br>";
echo "Keliling Lingkaran: " . kelilingLingkaran($diameter) . "<br>";
echo "Volume Bola: " . volumeBola($diameter);


echo "<hr>";
echo "<a href='https://tugas-fahmy.icbear.space/PraktikumPweb3/form_hitung.php'>Tugas Kedua</a>";
echo "<br>";
echo "<a href='https://tugas-fahmy.icbear.space/PraktikumPweb3/suhu.php'>Tugas Ketiga</a>";

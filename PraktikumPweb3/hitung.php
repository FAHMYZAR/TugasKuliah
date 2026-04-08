<?php

function kali($a, $b) {
    return $a * $b;
}

function bagi($a, $b) {
    if ($b == 0) {
        return "Tidak bisa dibagi 0!";
    }
    return $a / $b;
}

function sisa_bagi($a, $b) {
    return $a % $b;
}

if (isset($_POST['submit'])) {
    $a = $_POST['val1'];
    $b = $_POST['val2'];
    $aksi = $_POST['submit'];

    if ($aksi == "Kali") {
        $hasil = kali($a, $b);
    } elseif ($aksi == "Bagi") {
        $hasil = bagi($a, $b);
    } elseif ($aksi == "Sisa Bagi") {
        $hasil = sisa_bagi($a, $b);
    }

    echo "Hasil dari (" . $a . " " . $aksi . " " . $b . ") = " . $hasil;
}

<?php

function Kelvin($c) {
    return 273.15 + $c;
}

function Fahrenheit($c) {
    return 32 + (1.8 * $c);
}

$hasil = false;

if (isset($_POST['celcius'])) {
    $c = $_POST['celcius'];
    $k = Kelvin($c);
    $f = Fahrenheit($c);
    $hasil = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konversi Suhu</title>
    <style>
        body {
            font-family: monospace;
        }
        .box {
            width: 400px;
            padding: 20px;
            background: #ddd;
            border: 2px solid #999;
        }
        h2 {
            text-align: center;
        }
        input {
            width: 200px;
            padding: 5px;
        }

    </style>
</head>

<body>

<div class="box">

    <h2>Konversi Suhu Celcius ke<br>Kelvin dan Fahrenheit</h2>

    <form method="POST">
        Suhu Celcius 
        <input type="number" name="celcius" required>
        <hr>
        <button type="submit">KONVERSI</button>
    </form>

    <?php if ($hasil): ?>
        <hr>
        <h3>Hasil Konversi Suhu</h3>

        Derajat Celcius : <?php echo $c; ?> <br>
        Derajat Kelvin : <?php echo $k; ?> <br>
        Derajat Fahrenheit : <?php echo $f; ?>

    <?php endif; ?>

</div>

</body>
</html>
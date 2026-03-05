<!DOCTYPE html>
<html>

<head>
    <title>Penerimaan Beasiswa</title>
    <style>
        body{
            font-family: monospace;
        }
        input{
            display:block;
            margin-bottom:10px;
            padding:5px;
        }
        .radio-group{
            display:flex;
            gap:20px;
            margin-bottom:10px;
        }
        .button-group{
            display:flex;
            gap:10px;
        }
    </style>
</head>
<body>
    <button>Kode 👉<a href="https://github.com/FAHMYZAR/TugasKuliah/blob/main/PraktikumPweb2/index.php" target="_blank"> SOURCE CODE </a></button>
    <h2>1. Penerimaan Beasiswa</h2>

    <form action="output.php" method="post">
        Nama
        <input type="text" name="nama" required> 
        NIM
        <input type="text" name="nim" required> 
        Kelas
        <input type="text" name="kelas" required> 
        Jurusan
        <input type="text" name="jurusan" required> 
        Jenis Kelamin
        <div class="radio-group">
            <label>
                <input type="radio" name="jk" value="Laki-laki" required> Laki-laki</label>
            <label>
                <input type="radio" name="jk" value="Perempuan"> Perempuan</label>
        </div>
        IPK
        <input type="number" step="0.01" name="ipk" required>
        <div class="button-group">
            <input type="submit" value="Proses">
            <input type="reset" value="Batal">
        </div>
    </form>

    <h2>2. Membuat script perulangan</h2>
    <?php $i = 0; 
    do {
        echo "Saya Sedang Belajar Dasar Pemrograman Web ke (" . $i . ") 👨🏻‍💻 <br>";
        $i++;
    } while ($i <= 20);?>
</body>
</html>
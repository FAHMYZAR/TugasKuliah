<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Daftar</title>
    <style>
        body {
            background: #edf2f4;
            font-family: monospace;
            font-size: +1.8em;
            display: grid;
            place-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: #8d99ae;
            padding: 25px;
            border-radius: 12px;
            width: 320px;
            color: #2b2d42;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h3 {
            text-align: center;
            margin-top: 0;
        }

        input[type="text"], 
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 6px;
            border: none;
            box-sizing: border-box;
        }

        .option-group {
            margin: 10px 0;
            font-size: 14px;
        }

        .option-group b {
            display: block;
            margin-bottom: 5px;
        }

        label {
            cursor: pointer;
            margin-right: 10px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2b2d42;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
            transition: 0.3s;
        }

        button:hover {
            background: #6a994e;
        }
        .back { 
            margin-top: 20px; 
            display: inline-block; 
            color: #2b2d42; 
            font-size: 12px;
            text-decoration: none; 
        }
    </style>
</head>
<body>

<div class="card">
    <h3>Form Daftar</h3>
    <form action="proses_daftar.php" method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>

        <div class="option-group">
            <b>Jenis Kelamin:</b>
            <label><input type="radio" name="jk" value="Laki-laki" required> Laki-laki</label>
            <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
        </div>

        <div class="option-group">
            <b>Hobi:</b>
            <label><input type="checkbox" name="hobi[]" value="Game"> Game</label>
            <label><input type="checkbox" name="hobi[]" value="Ngoding"> Ngoding</label>
        </div>

        <button type="submit">Daftar</button>
        <a href="../index.php" class="back">← Kembali ke Menu</a>
    </form>
</div>

</body>
</html>

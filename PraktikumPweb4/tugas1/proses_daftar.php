<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body { 
            background: #edf2f4; 
            font-family: monospace; 
            display: flex; 
            justify-content: center; 
            padding-top: 50px; 
        }
        .container { 
            background: white; 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
            width: 80%;
            max-width: 500px;
        }
        table { 
            border-collapse: collapse; 
            width: 100%; 
            margin-top: 20px; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 12px; 
            text-align: left; 
        }
        th { 
            background: #2b2d42; 
            color: white; 
        }
        .back { 
            margin-top: 20px; 
            display: inline-block; 
            color: #8d99ae; 
            text-decoration: none; 
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Hasil Pendaftaran</h2>
    <table>
        <thead>
            <tr>
                <th>Field</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nama</td>
                <td><?= htmlspecialchars($_POST['nama'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= htmlspecialchars($_POST['email'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><?= htmlspecialchars($_POST['jk'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>
                    <?php 
                    if (!empty($_POST['hobi'])) {
                        echo implode(", ", $_POST['hobi']); 
                    } else {
                        echo "Tidak ada hobi";
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="form_daftar.php" class="back">← Kembali ke Form</a>
</div>

</body>
</html>

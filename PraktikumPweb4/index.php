<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pweb</title>
    <style>
        body {
            font-family: monospace;
            font-size: +1.8em;
            background-color: #edf2f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: auto;
            background-color: #8d99ae;
            padding: 80px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            text-align: center;
        }
        .horizontal-layout {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: +0.5em;
            cursor: pointer;
            background-color: #2b2d42;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        button:hover {            
            background-color: #6a994e;
        }   
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Praktikum Pweb 4</h1>
            <p>Nama : Nuriskha Ainun Fahmi</p>
            <p>NIM : 243200330</p>
        </div>
        <div class="content">
            <h2>Pilih Tugas</h2>
            <div class="horizontal-layout">
                <button name="btn-1" onclick="window.location.href='tugas1/form_daftar.php'">Tugas 1</button>
                <button name="btn-2" onclick="window.location.href='tugas2/menu.php'">Tugas 2</button>
            </div>
        </div>
    </div>
</body>
</html>
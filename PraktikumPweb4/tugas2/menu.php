<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu Makanan</title>
    <style>
        body {
            font-family: monospace;
            background-color: #edf2f4;
            margin: 0;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            text-align: center;
        }

        h1 {
            color: #2b2d42;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
        }

        .menu-card {
            background-color: #8d99ae;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: #2b2d42;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            background-color: #a2abbd;
        }

        .menu-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .menu-card h3 {
            margin: 15px 0 5px;
            font-size: 1.1em;
        }

        .harga {
            font-weight: bold;
            color: #f1faee;
            background: #2b2d42;
            display: inline-block;
            padding: 5px 12px;
            border-radius: 5px;
            margin: 10px auto;
            font-size: 0.9em;
        }

        .btn-detail {
            display: block;
            padding: 10px;
            background-color: #6a994e;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-detail:hover {
            background-color: #2b2d42;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>MENU RESTAURANT</h1>
    <div class="menu-grid">
        <?php
        $menus = [
            ["Nasi Goreng", 15000, "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlXys44w9w3hgP17LHrqu6_PuyAjLWab1V_A&s", "Nasi goreng dengan bumbu rempah tradisional, telur mata sapi, dan acar segar."],
            ["Mie Ayam", 12000, "https://assets.pikiran-rakyat.com/crop/138x260:960x854/1200x675/photo/2023/09/05/802104878.jpg", "Mie kenyal dengan topping ayam kecap gurih, sawi hijau, dan pangsit renyah."],
            ["Bakso Sapi", 18000, "https://palpos.disway.id/upload/de0bdab54ed5699c39ffbb1e536c4303.jpg", "Bakso daging sapi asli yang empuk disajikan dengan kuah kaldu hangat."],
            ["Sate Ayam", 25000, "https://awsimages.detik.net.id/community/media/visual/2021/04/27/sate-usus-dan-kulit-sambal-rica-1.png?w=600&q=90", "Sate ayam pilihan dengan siraman bumbu kacang kental dan irisan lontong."],
            ["Ayam Geprek", 17000, "https://bit.ly", "Ayam krispi yang digeprek dengan sambal bawang segar level pedas nampol."],
            ["Rendang Sapi", 30000, "https://bit.ly", "Daging sapi yang dimasak lama dengan santan dan rempah asli Minang."],
            ["Gado-Gado", 15000, "https://bit.ly", "Sayuran segar dengan siraman saus kacang legit, telur, dan kerupuk udang."],
            ["Soto Ayam", 16000, "https://bit.ly", "Soto kuah kuning bening dengan suwiran ayam, koya, dan perasan jeruk nipis."],
            ["Ikan Bakar", 45000, "https://bit.ly", "Ikan segar yang dibakar dengan bumbu kecap madu, pedas manis meresap."],
            ["Es Teh Manis", 5000, "https://bit.ly", "Minuman teh dingin yang segar dengan manis gula asli sebagai pelengkap."]
        ];

        foreach ($menus as $m) {
            $params = "nama=".urlencode($m[0])."&harga=".$m[1]."&img=".urlencode($m[2])."&desc=".urlencode($m[3]);
            echo "
            <div class='menu-card'>
                <img src='{$m[2]}' alt='{$m[0]}'>
                <div>
                    <h3>{$m[0]}</h3>
                    <div class='harga'>Rp ".number_format($m[1], 0, ',', '.')."</div>
                </div>
                <a href='detail_menu.php?$params' class='btn-detail'>DETAIL</a>
            </div>";
        }
        ?>
    </div>
</div>

</body>
</html>

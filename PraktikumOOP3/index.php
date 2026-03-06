<?php

class BukuDigital {

    public $id_buku;
    public $judul;
    public $penulis;
    public $tahun;
    public $status = "Tersedia";

    public static $totalBuku = 0;

    public function __construct($id_buku=null,$judul=null,$penulis=null,$tahun=null){

        $this->id_buku = $id_buku;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahun = $tahun;
    }

    public function pinjam(){
        if($this->status == "Tersedia"){
            $this->status = "Dipinjam";
        }
    }

    public function kembalikan(){
        $this->status = "Tersedia";
    }

    // belum, nanti kalo dah pake konek db. gantinya pakai unset dibawah
    // public function __destruct(){
    //     echo "Buku dengan ID ".$this->id_buku." dengan nama: ".$this->judul." telah dihapus.<br>";
    //     self::$totalBuku--;
    // }
}

$buku = [
    new BukuDigital(1,"Python Programming","Andi",2022),
    new BukuDigital(null,"Algoritma dan Struktur Data","Budi"),
    new BukuDigital(null,"Machine Learning",null,2024),
    new BukuDigital(4,"Web Development","Dewi",2021),
];

$buku[0]->pinjam();
$buku[1]->kembalikan();
$buku[3]->pinjam();


if(isset($_GET['unset_i'])){
    $index = $_GET['unset_i'];
    if(isset($buku[$index])){
        echo "Buku dengan nama: (".$buku[$index]->judul.") telah dihapus.<br>";
        //ga pake destruct
        unset($buku[$index]);
    } else {
        echo "Index buku tidak ditemukan.<br>";
    }
}

$totalBuku = count($buku);

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Sistem Perpustakaan Digital</title>
      <style>
         body{
            font-family: monospace;
         }
         table{
            border-collapse: collapse;
            margin-top:20px;
         }
         th,td{
            border:1px solid black;
            padding:8px;
         }
         .colbawah{
            text-align:center;
         }
      </style>
   </head>
   <body>
      <h2>Sistem Perpustakaan Digital</h2>
      <button>Ini 👉<a href="https://github.com/FAHMYZAR/TugasKuliah/blob/main/PraktikumOOP3/index.php" target="_blank">Source Code</a></button>
      <table>
         <tr>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Status</th>
         </tr>
         <?php foreach($buku as $b){ ?>
         <tr>
            <td><?php echo $b->id_buku ?? "null"; ?></td>
            <td><?php echo $b->judul ?? "null"; ?></td>
            <td><?php echo $b->penulis ?? "null"; ?></td>
            <td><?php echo $b->tahun ?? "null"; ?></td>
            <td><?php echo $b->status; ?></td>
         </tr>
         <?php } ?>
         <tr>
            <td colspan="3" class="colbawah"><b>Total Buku</b></td>
            <td colspan="2" class="colbawah"><b><?php echo $totalBuku; ?></b></td>
         </tr>
      </table>
        <h3>Unset Buku</h3>

        <form method="GET">
            <input type="number" name="unset_i" placeholder="Masukkan index buku">
            <button type="submit">Unset Buku</button>
        </form>
   </body>
</html>

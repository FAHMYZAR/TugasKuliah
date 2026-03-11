<?php
class ProgramNilaiSiswa {
    private $nilai;
    private $nilaiTugas;
    private $nilaiUTS;
    private $nilaiUAS;

    public function __construct($nilai, $nilaiTugas, $nilaiUTS, $nilaiUAS) {
        $this->nilai = $nilai;
        $this->nilaiTugas = $nilaiTugas;
        $this->nilaiUTS = $nilaiUTS;
        $this->nilaiUAS = $nilaiUAS;
    }
    public function getNilaiSiswa() {
        $nilaiAkhir = ($this->nilaiTugas * 0.3) + ($this->nilaiUTS * 0.3) + ($this->nilaiUAS * 0.4);
        return $nilaiAkhir;
    }
    public function getGrade() {
        $nilaiAkhir = $this->getNilaiSiswa();
        if ($nilaiAkhir >= 90) {
            return "A";
        } elseif ($nilaiAkhir >= 80) {
            return "B";
        } elseif ($nilaiAkhir >= 70) {
            return "C";
        } elseif ($nilaiAkhir >= 60) {
            return "D";
        } else {
            return "E";
        }
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilaiTugas = $_POST["nilaiTugas"];
    $nilaiUTS = $_POST["nilaiUTS"];
    $nilaiUAS = $_POST["nilaiUAS"];
    $programNilaiSiswa = new ProgramNilaiSiswa(0, $nilaiTugas, $nilaiUTS, $nilaiUAS);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Nilai Siswa</title>
</head>
<body>
    <h1>Program Nilai Siswa</h1>
    <button><a href="https://github.com/FAHMYZAR/TugasKuliah/blob/main/QuizPweb1/index3.php" target="_blank">Source Code</a></button>
    <br><br>    
    <form method="post" action="">
        <label for="nilaiTugas">Nilai Tugas:</label>
        <input type="number" id="nilaiTugas" name="nilaiTugas" min="0" max="100" required><br><br>
        <label for="nilaiUTS">Nilai UTS:</label>
        <input type="number" id="nilaiUTS" name="nilaiUTS" min="0" max="100" required><br><br>
        <label for="nilaiUAS">Nilai UAS:</label>
        <input type="number" id="nilaiUAS" name="nilaiUAS" min="0" max="100" required><br><br>
        <input type="submit" value="Hitung Nilai">
    </form> 
    <br>
    <table border="1">
        <tr>
            <th>Nilai Akhir</th>
            <th>Grade</th>
        </tr>
        <?php if (isset($programNilaiSiswa)) { ?>
            <tr>
                <td><?php echo $programNilaiSiswa->getNilaiSiswa(); ?></td>
                <td><?php echo $programNilaiSiswa->getGrade(); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
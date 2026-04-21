<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK204</title>
</head>
<body>

<?php
$nilai = "";
$hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST["nilai"];

    if ($nilai == "") {
        $hasil = "";
    } elseif ($nilai == 0) {
        $hasil = "Nol";
    } elseif ($nilai >= 1 && $nilai <= 9) {
        $hasil = "Satuan";
    } elseif ($nilai > 10 && $nilai < 20) {
        $hasil = "Belasan";
    } elseif ($nilai == 10 || $nilai >= 20 && $nilai < 100) {
        $hasil = "Puluhan";
    } elseif ($nilai >= 100 && $nilai < 1000) {
        $hasil = "Ratusan";
    } elseif ($nilai >= 1000) {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    }
}
?>

<form method="post">
    Nilai : <input type="number" name="nilai" value="<?php echo $nilai; ?>" required><br>
    <input type="submit" name="konversi" value="Konversi">
</form>

<?php
if ($hasil !== "") {
    echo "<h1>Hasil: $hasil</h1>";
}
?>

</body>
</html>
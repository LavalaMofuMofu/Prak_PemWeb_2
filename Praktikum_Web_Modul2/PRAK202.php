<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK202</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

<?php
$namaErr = $nimErr = $kelaminErr = "";
$nama = $nim = $kelamin = "";
$is_valid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid_nama = $valid_nim = $valid_kelamin = false;

    if (empty($_POST["nama"])) {
        $namaErr = "nama tidak boleh kosong";
    } else {
        $nama = ($_POST["nama"]);
        $valid_nama = true;
    }

    if (empty($_POST["nim"])) {
        $nimErr = "nim tidak boleh kosong";
    } else {
        $nim = ($_POST["nim"]);
        $valid_nim = true;
    }

    if (empty($_POST["kelamin"])) {
        $kelaminErr = "jenis kelamin tidak boleh kosong";
    } else {
        $kelamin = ($_POST["kelamin"]);
        $valid_kelamin = true;
    }

    if ($valid_nama && $valid_nim && $valid_kelamin) {
        $is_valid = true;
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nama: <input type="text" name="nama" value="<?php echo $nama;?>">
    <span class="error">* <?php echo $namaErr;?></span>
    <br>
    
    Nim: <input type="text" name="nim" value="<?php echo $nim;?>">
    <span class="error">* <?php echo $nimErr;?></span>
    <br>
    
    Jenis Kelamin :<span class="error">* <?php echo $kelaminErr;?></span><br>
    <input type="radio" name="kelamin" <?php if (isset($kelamin) && $kelamin=="Laki-Laki") echo "checked";?> value="Laki-Laki">Laki-Laki<br>
    <input type="radio" name="kelamin" <?php if (isset($kelamin) && $kelamin=="Perempuan") echo "checked";?> value="Perempuan">Perempuan<br>
    
    <input type="submit" name="submit" value="Submit">
</form>

<?php
// Menampilkan output jika semua field sudah valid
if ($is_valid) {
    echo "<h2>Output:</h2>";
    echo $nama . "<br>";
    echo $nim . "<br>";
    echo $kelamin . "<br>";
}
?>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK203</title>
</head>
<body>

<?php
$nilai = "";
$dari = "";
$ke = "";
$hasil = "";
$simbol = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST["nilai"];
    $dari = $_POST["dari"];
    $ke = $_POST["ke"];

    $celcius = 0;
    if ($dari == "Celcius") {
        $celcius = $nilai;
    } elseif ($dari == "Fahrenheit") {
        $celcius = ($nilai - 32) * 5/9;
    } elseif ($dari == "Rheamur") {
        $celcius = $nilai * 5/4;
    } elseif ($dari == "Kelvin") {
        $celcius = $nilai - 273.15;
    }

    if ($ke == "Celcius") {
        $hasil = $celcius;
        $simbol = "°C";
    } elseif ($ke == "Fahrenheit") {
        $hasil = ($celcius * 9/5) + 32;
        $simbol = "°F";
    } elseif ($ke == "Rheamur") {
        $hasil = $celcius * 4/5;
        $simbol = "°Re";
    } elseif ($ke == "Kelvin") {
        $hasil = $celcius + 273.15;
        $simbol = "K";
    }
}
?>

<form method="post">
    Nilai : <input type="number" step="any" name="nilai" value="<?php echo $nilai; ?>" required><br>
    
    Dari : <br>
    <input type="radio" name="dari" value="Celcius" <?php if($dari == "Celcius") echo "checked"; ?> required> Celcius <br>
    <input type="radio" name="dari" value="Fahrenheit" <?php if($dari == "Fahrenheit") echo "checked"; ?>> Fahrenheit <br>
    <input type="radio" name="dari" value="Rheamur" <?php if($dari == "Rheamur") echo "checked"; ?>> Rheamur <br>
    <input type="radio" name="dari" value="Kelvin" <?php if($dari == "Kelvin") echo "checked"; ?>> Kelvin <br>
    
    Ke : <br>
    <input type="radio" name="ke" value="Celcius" <?php if($ke == "Celcius") echo "checked"; ?> required> Celcius <br>
    <input type="radio" name="ke" value="Fahrenheit" <?php if($ke == "Fahrenheit") echo "checked"; ?>> Fahrenheit <br>
    <input type="radio" name="ke" value="Rheamur" <?php if($ke == "Rheamur") echo "checked"; ?>> Rheamur <br>
    <input type="radio" name="ke" value="Kelvin" <?php if($ke == "Kelvin") echo "checked"; ?>> Kelvin <br>
    
    <input type="submit" name="konversi" value="Konversi">
</form>

<?php
if ($hasil !== "") {
    echo "<h2>Hasil Konversi: " . $hasil . " $simbol</h2>";
}
?>

</body>
</html>
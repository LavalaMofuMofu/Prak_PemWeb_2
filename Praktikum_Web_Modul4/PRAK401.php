<?php
$panjang = "";
$lebar = "";
$nilai = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $nilai = $_POST['nilai'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK401</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 15px;
        }
        td {
            border: 1px solid black;
            padding: 5px 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="POST">
        Panjang : <input type="text" name="panjang" value="<?= htmlspecialchars($panjang) ?>"><br>
        Lebar : <input type="text" name="lebar" value="<?= htmlspecialchars($lebar) ?>"><br>
        Nilai : <input type="text" name="nilai" value="<?= htmlspecialchars($nilai) ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $nilai_array = explode(" ", $nilai);
        
        $ukuran_matriks = $panjang * $lebar;

        if ($ukuran_matriks == count($nilai_array)) {
            echo "<table>";
            $index = 0;
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . htmlspecialchars($nilai_array[$index]) . "</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    }
    ?>
</body>
</html>
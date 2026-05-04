<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 303</title>
    <style>
        img {
            width: 20px;
        }
    </style>
</head>
<body>

    <form action="" method="POST">
        Batas Bawah : <input type="number" name="bawah" value="<?= isset($_POST['bawah']) ? $_POST['bawah'] : '' ?>" required> <br>
        Batas Atas : <input type="number" name="atas" value="<?= isset($_POST['atas']) ? $_POST['atas'] : '' ?>" required> <br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];
        $i = $bawah;
        $url_bintang = "Gambar_Bintang.png";

        if ($bawah <= $atas) {
            do {
                if (($i + 7) % 5 == 0) {
                    echo "<img src='$url_bintang' alt='star'> ";
                } else {
                    echo $i . " ";
                }
                $i++;
            } while ($i <= $atas);
        } else {
            echo "Batas bawah harus lebih kecil atau sama dengan batas atas.";
        }
    }
    ?>

</body>
</html>
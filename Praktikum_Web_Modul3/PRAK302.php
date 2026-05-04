<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 302</title>
    <style>
        img {
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>

    <form action="" method="POST">
        Tinggi : <input type="number" name="tinggi" value="<?= isset($_POST['tinggi']) ? $_POST['tinggi'] : '' ?>" required> <br>
        Alamat Gambar : <input type="text" name="url" value="<?= isset($_POST['url']) ? $_POST['url'] : '' ?>" required> <br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $tinggi = $_POST['tinggi'];
        $url = $_POST['url'];

        $i = 1;
        while ($i <= $tinggi) {
            $j = 1;
            while ($j < $i) {
                echo "<img src='$url' style='visibility:hidden;'>";
                $j++;
            }

            $k = 1;
            while ($k <= ($tinggi - $i + 1)) {
                echo "<img src='$url'>";
                $k++;
            }

            echo "<br>";
            $i++;
        }
    }
    ?>

</body>
</html>
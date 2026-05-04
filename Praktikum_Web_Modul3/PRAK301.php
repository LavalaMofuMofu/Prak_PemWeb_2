<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 301</title>
    <style>
        .merah {
            color: red;
            font-weight: bold;
            font-size: 24px;
        }
        .hijau {
            color: green;
            font-weight: bold;
            font-size: 24px;
        }
    </style>
</head>
<body>

    <form action="" method="POST">
        Jumlah Peserta : <input type="number" name="jumlah" value="<?= isset($_POST['jumlah']) ? $_POST['jumlah'] : '' ?>" required> <br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <?php
    if (isset($_POST['cetak'])) {
        $jumlah = $_POST['jumlah'];
        $i = 1;

        while ($i <= $jumlah) {
            if ($i % 2 != 0) {
                echo "<br> <div class='merah'>Peserta ke-$i </div>";
            } else {
                echo "<br> <div class='hijau'>Peserta ke-$i </div>";
            }
            $i++;
        }
    }
    ?>

</body>
</html>
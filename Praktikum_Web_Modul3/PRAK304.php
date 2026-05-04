<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 304</title>
</head>
<body>

    <?php
    $jumlah = 0;

    if (isset($_POST['jumlah'])) {
        $jumlah = (int)$_POST['jumlah'];
    }

    if (isset($_POST['tambah'])) {
        $jumlah++;
    }

    if (isset($_POST['kurang'])) {
        $jumlah--;
    }

    $url_bintang = "Gambar_Bintang.png";

    if ($jumlah == 0) : ?>
        <form action="" method="post">
            Jumlah bintang <input type="number" name="jumlah" required> <br>
            <button type="submit" name="submit">Submit</button>
        </form>

    <?php 
    else : ?>
        <p>Jumlah bintang <?= $jumlah ?></p>
        
        <div style="margin-bottom: 10px;">
            <?php
            $i = 0;
            while ($i < $jumlah) {
                echo "<img src='$url_bintang' width='80' height='80' style='margin-right: 5px;'>";
                $i++;
            }
            ?>
        </div>

        <form action="" method="post">
            <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php endif; ?>

</body>
</html>
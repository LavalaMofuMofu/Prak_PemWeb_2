<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 305</title>
</head>
<body>

    <form action="" method="POST">
        <input type="text" name="kata" value="<?= isset($_POST['kata']) ? $_POST['kata'] : '' ?>" required>
        <button type="submit" name="submit">submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $kata = $_POST['kata'];
        $panjang = strlen($kata);

        echo "<h3>Input:</h3>";
        echo $kata;

        echo "<h3>Output:</h3>";
        for ($i = 0; $i < $panjang; $i++) {
            $karakter = $kata[$i];

            for ($j = 0; $j < $panjang; $j++) {
                if ($j == 0) {
                    echo strtoupper($karakter);
                } 
                else {
                    echo strtolower($karakter);
                }
            }
        }
    }
    ?>

</body>
</html>
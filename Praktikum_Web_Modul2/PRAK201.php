<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK201</title>
</head>
    <body>
        <form method="post">
        Nama: 1 <input type="text" name="nama1" value="<?= isset($_POST['nama1']) ? htmlspecialchars($_POST['nama1']) : ' ' ?>"> <br>
        Nama: 2 <input type="text" name="nama2" value="<?= isset($_POST['nama2']) ? htmlspecialchars($_POST['nama2']) : ' ' ?>"> <br>
        Nama: 3 <input type="text" name="nama3" value="<?= isset($_POST['nama3']) ? htmlspecialchars($_POST['nama3']) : ' ' ?>"> <br>
        <button type="Submit" name="submit" > Urutkan </button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $name1 = $_POST['nama1'];
            $name2 = $_POST['nama2'];
            $name3 = $_POST['nama3'];

            if ($name1 <= $name2 && $name1 < $name3) {
                if ($name2 <= $name3) {
                    $nama1 = $name1;
                    $nama2 = $name2;
                    $nama3 = $name3;
                }
                else {
                    $nama1 = $name1;
                    $nama2 = $name3;
                    $nama3 = $name2;
                }
            }
            else if ($name2 <= $name1 && $name2 < $name3) {
                if ($name1 <= $name3) {
                    $nama1 = $name2;
                    $nama2 = $name1;
                    $nama3 = $name3;
                }
                else {
                    $nama1 = $name2;
                    $nama2 = $name3;
                    $nama3 = $name1;
                }
            }
            else {
                if ($name1 <= $name2) {
                    $nama1 = $name3;
                    $nama2 = $name1;
                    $nama3 = $name2;
                }
                else {
                    $nama1 = $name3;
                    $nama2 = $name2;
                    $nama3 = $name1;
                }
            }
        }
        ?>
        <?php if (isset($_POST['submit'])): ?>
            <?php
                        echo "<h3>Output:</h3>";
                        echo $nama1 . "<br>";
                        echo $nama2 . "<br>";   
                        echo $nama3 . "<br>";
                        ?>
            <?php endif; ?>
    </body>
</html>
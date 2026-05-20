<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK402</title>
    <style>
        table {
            border-collapse: collapse;
            width: 600px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #cccccc;
        }
    </style>
</head>
<body>

<?php
$mahasiswa = [
    ["nama" => "Andi", 
    "nim" => "2101001", 
    "uts" => 87, 
    "uas" => 65],

    ["nama" => "Budi", 
    "nim" => "2101002", 
    "uts" => 76, 
    "uas" => 79],

    ["nama" => "Tono", 
    "nim" => "2101003", 
    "uts" => 50, 
    "uas" => 41],

    ["nama" => "Jessica", 
    "nim" => "2101004", 
    "uts" => 60, 
    "uas" => 75]
];

for ($i = 0; $i < count($mahasiswa); $i++) {
    $nilai_akhir = ($mahasiswa[$i]["uts"] * 0.4) + ($mahasiswa[$i]["uas"] * 0.6);
    $mahasiswa[$i]["akhir"] = $nilai_akhir;

    if ($nilai_akhir >= 80) {
        $huruf = "A";
    } elseif ($nilai_akhir >= 70 && $nilai_akhir <= 79.9) {
        $huruf = "B";
    } elseif ($nilai_akhir >= 60 && $nilai_akhir <= 69.9) {
        $huruf = "C";
    } elseif ($nilai_akhir >= 50 && $nilai_akhir <= 59.9) {
        $huruf = "D";
    } else {
        $huruf = "E";
    }
    $mahasiswa[$i]["huruf"] = $huruf;
}
?>

<table>
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Huruf</th>
    </tr>
    <?php
    foreach ($mahasiswa as $mhs) {
        echo "<tr>";
        echo "<td>" . $mhs["nama"] . "</td>";
        echo "<td>" . $mhs["nim"] . "</td>";
        echo "<td>" . $mhs["uts"] . "</td>";
        echo "<td>" . $mhs["uas"] . "</td>";
        echo "<td>" . $mhs["akhir"] . "</td>";
        echo "<td>" . $mhs["huruf"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
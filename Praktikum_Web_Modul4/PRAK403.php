<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK403</title>
    <style>
        table {
            border-collapse: collapse;
            width: 800px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #cccccc; 
        }
        .revisi {
            background-color: #ff0000; 
        }
        .tidak-revisi {
            background-color: #00b050; 
        }
    </style>
</head>
<body>

<?php
$mahasiswa = [
    [
        "no" => 1,
        "nama" => "Ridho",
        "mata_kuliah" => [
            ["nama_mk" => "Pemrograman I", "sks" => 2],
            ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],
    [
        "no" => 2,
        "nama" => "Ratna",
        "mata_kuliah" => [
            ["nama_mk" => "Basis Data I", "sks" => 2],
            ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_mk" => "Kalkulus", "sks" => 3]
        ]
    ],
    [
        "no" => 3,
        "nama" => "Tono",
        "mata_kuliah" => [
            ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_mk" => "Komputasi Awan", "sks" => 3],
            ["nama_mk" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];

for ($i = 0; $i < count($mahasiswa); $i++) {
    $total_sks = 0;
    
    foreach ($mahasiswa[$i]["mata_kuliah"] as $mk) {
        $total_sks += $mk["sks"];
    }
    
    $mahasiswa[$i]["total_sks"] = $total_sks;
    
    if ($total_sks < 7) {
        $mahasiswa[$i]["keterangan"] = "Revisi KRS";
        $mahasiswa[$i]["css_class"] = "revisi";
    } else {
        $mahasiswa[$i]["keterangan"] = "Tidak Revisi";
        $mahasiswa[$i]["css_class"] = "tidak-revisi";
    }
}
?>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
    </tr>
    
    <?php
    foreach ($mahasiswa as $mhs) {
        $jml_mk = count($mhs["mata_kuliah"]);
        
        for ($j = 0; $j < $jml_mk; $j++) {
            echo "<tr>";
            
            if ($j == 0) {
                echo "<td>" . $mhs["no"] . "</td>";
                echo "<td>" . $mhs["nama"] . "</td>";
                echo "<td>" . $mhs["mata_kuliah"][$j]["nama_mk"] . "</td>";
                echo "<td>" . $mhs["mata_kuliah"][$j]["sks"] . "</td>";
                echo "<td>" . $mhs["total_sks"] . "</td>";
                echo "<td class='" . $mhs["css_class"] . "'>" . $mhs["keterangan"] . "</td>";
            } 
            else {
                echo "<td> </td>";
                echo "<td> </td>";
                echo "<td>" . $mhs["mata_kuliah"][$j]["nama_mk"] . "</td>";
                echo "<td>" . $mhs["mata_kuliah"][$j]["sks"] . "</td>";
                echo "<td> </td>";
                echo "<td> </td>";
            }
            
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>
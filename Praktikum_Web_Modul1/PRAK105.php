<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone Samsung</title>
    <style>
        table {
            border: 1px solid black; 
            border-collapse: separate; 
            border-spacing: 2px;
        }
        th, td {
            border: 1px solid black; 
            text-align: left;        
            font-family: 'Times New Roman';
        }
        th {
            font-weight: bold;
            background-color: red;       
        }
    </style>
</head>
<body>

<?php
    $daftar_smartphone = array(
        "S22" => "Samsung Galaxy S22",
        "S22Plus" => "Samsung Galaxy S22+",
        "A03" => "Samsung Galaxy A03",
        "Xcover5" => "Samsung Galaxy Xcover 5"
    );
?>

<table>
    <tr>
        <th><h2>Daftar Smartphone Samsung</h2></th>
    </tr>
    
    <?php
    foreach ($daftar_smartphone as $kode => $nama_smartphone) {
        echo "<tr>";
        echo "<td>" . $nama_smartphone . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
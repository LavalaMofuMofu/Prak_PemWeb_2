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
        }
    </style>
</head>
<body>

<?php
    $daftar_smartphone = array(
        "Samsung Galaxy S22",
        "Samsung Galaxy S22+",
        "Samsung Galaxy A03",
        "Samsung Galaxy Xcover 5"
    );
?>

<table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    
    <?php
    foreach ($daftar_smartphone as $smartphone) {
        echo "<tr>";
        echo "<td>" . $smartphone . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
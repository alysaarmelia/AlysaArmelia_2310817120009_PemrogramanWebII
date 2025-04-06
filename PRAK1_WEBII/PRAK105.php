<?php
    $jenisSmartphone = array("S22" => "Samsung Galaxy S22", "S22+" => "Samsung Galaxy S22+", "A03" => "Samsung Galaxy A03", "Xcover5" => "Samsung Galaxy Xcover 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        table {
            font-family: 'Times New Roman';
            color: #232323;
        }
        table, th, td {
            border: 1px solid;
        }
        th {
            font-size: x-large;
            background-color: red;
            padding: 20px 0px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <tr>
            <td><?= $jenisSmartphone["S22"] ?></td>
        </tr>
        <tr>
            <td><?= $jenisSmartphone["S22+"] ?></td>
        </tr>
        <tr>
            <td><?= $jenisSmartphone["A03"] ?></td>
        </tr>
        <tr>
            <td><?= $jenisSmartphone["Xcover5"] ?></td>
        </tr>
    </table>
</body>
</html>
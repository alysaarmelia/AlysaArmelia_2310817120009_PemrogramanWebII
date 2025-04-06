<?php
    $jenishp = array("Samsung Galaxy S22", "Samsung Galaxy S22 Plus", "Samsung Galaxy A03", "Samsung Galaxy Xcover5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    table, th, td {
        border: 1px solid;
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
    <?php foreach ($jenishp as $i): ?>
    <tr>
        <td><?= $i?></td>
    </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
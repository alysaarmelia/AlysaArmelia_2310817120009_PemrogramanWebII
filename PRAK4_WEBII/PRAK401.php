<?php
$panjang = $_POST["panjang"] ?? "";
$lebar = $_POST["lebar"] ?? "";
$nilai = $_POST["nilai"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
    <style>
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }
    </style>
    <title>SOAL1</title>
</head>
<body>
    <form method="post">
        Panjang: <input type="number" name="panjang" value="<?= htmlspecialchars($panjang); ?>"><br>
        Lebar: <input type="number" name="lebar" value="<?= htmlspecialchars($lebar); ?>"><br>
        Nilai: <input type="text" name="nilai" value="<?= htmlspecialchars($nilai); ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <?php
    if (isset($_POST["cetak"])) {
        $isi = explode(" ", trim($nilai));
        if (count($isi) == $panjang * $lebar) {
            echo "<table>";
            $index = 0;
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . htmlspecialchars($isi[$index++]) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color:red;'>Panjang nilai tidak sesuai dengan ukuran matriks</p>";
        }
    }
    ?>
</body>
</html>
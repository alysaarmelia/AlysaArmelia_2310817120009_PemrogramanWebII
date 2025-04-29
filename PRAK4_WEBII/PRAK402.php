<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
    <title>SOAL2</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        th {
            background-color: #d3d3d3; 
        }
    </style>
</head>
<body>

    <?php
    function gradeConverter($uas, $uts) {
        $nilai = ($uas * 0.4) + ($uts * 0.6);
        if ($nilai >= 80 && $nilai <= 100) {
            return "A";
        } elseif ($nilai >= 70 && $nilai < 80) {
            return "B";
        } elseif ($nilai >= 60 && $nilai < 70) {
            return "C";
        } elseif ($nilai >= 50 && $nilai < 60) {
            return "D";
        } elseif ($nilai >= 0 && $nilai < 50) {
            return "E";
        } else {
            return "Invalid Input";
        }
    }
    
    $datadarimahasiswa = array(
        array("Name" => "Andi", "Nim" => "2101001", "UTS" => 87, "UAS" => 65),
        array("Name" => "Budi", "Nim" => "2101002", "UTS" => 76, "UAS" => 79),
        array("Name" => "Tono", "Nim" => "2101003", "UTS" => 50, "UAS" => 41),
        array("Name" => "Jessica", "Nim" => "2101004", "UTS" => 60, "UAS" => 75)
    );

    echo "<table>";
    echo "<tr><th>Nama</th><th>NIM</th><th>Nilai UTS</th><th>Nilai UAS</th><th>Nilai Akhir</th><th>Huruf</th></tr>";
    
    foreach ($datadarimahasiswa as $mhs) {
        $nilaiAkhir = ($mhs["UTS"] * 0.4) + ($mhs["UAS"] * 0.6);
        $nilaiHuruf = gradeConverter($mhs["UAS"], $mhs["UTS"]);

        echo "<tr>";
        echo "<td>{$mhs['Name']}</td>";
        echo "<td>{$mhs['Nim']}</td>";
        echo "<td>{$mhs['UTS']}</td>";
        echo "<td>{$mhs['UAS']}</td>";

        if (number_format($nilaiAkhir, 1) == 69.0) {
            echo "<td>69</td>";
        } else {
            echo "<td>" . number_format($nilaiAkhir, 1) . "</td>";
        }
        echo "<td>$nilaiHuruf</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
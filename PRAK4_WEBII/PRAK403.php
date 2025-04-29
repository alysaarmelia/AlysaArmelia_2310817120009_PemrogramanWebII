<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
    <title>SOAL3</title>
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
    $paramurid = [
        [
            'No' => 1,
            'Nama' => 'Ridho',
            'MataKuliah' => [
                ['MataKuliah' => 'Pemrograman I', 'SKS' => 2],
                ['MataKuliah' => 'Praktikum Pemrograman I', 'SKS' => 1],
                ['MataKuliah' => 'Pengantar Lingkungan Lahan Basah', 'SKS' => 2],
                ['MataKuliah' => 'Arsitektur Komputer', 'SKS' => 3],
            ],
        ],
        [
            'No' => 2,
            'Nama' => 'Raina',
            'MataKuliah' => [
                ['MataKuliah' => 'Basis Data I', 'SKS' => 2],
                ['MataKuliah' => 'Praktikum Basis Data I', 'SKS' => 1],
                ['MataKuliah' => 'Kalkulus', 'SKS' => 3],
            ],
        ],
        [
            'No' => 3,
            'Nama' => 'Tono',
            'MataKuliah' => [
                ['MataKuliah' => 'Rekayasa Perangkat Lunak', 'SKS' => 3],
                ['MataKuliah' => 'Analisis dan Perancangan Sistem', 'SKS' => 3],
                ['MataKuliah' => 'Komputasi Awan', 'SKS' => 3],
                ['MataKuliah' => 'Kecerdasan Bisnis', 'SKS' => 3],
            ],
        ],        
    ];

    foreach ($paramurid as $key => $murid) {
        $total = 0;
        foreach ($murid['MataKuliah'] as $mk) {
            $total += $mk['SKS'];
        }
        $paramurid[$key]['Total SKS'] = $total;
        $paramurid[$key]['Keterangan'] = ($total < 7) ? 'Revisi KRS' : 'Tidak Revisi';
    }
    echo "<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kullah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
    </tr>";

    foreach ($paramurid as $murid) {
        $rowCount = 0; 
        foreach ($murid['MataKuliah'] as $mk) {
            echo "<tr>";
            if ($rowCount === 0) {
                $color = ($murid['Keterangan'] === 'Revisi KRS') ? 'red' : 'green';
                echo "<td>{$murid['No']}</td>
                      <td>{$murid['Nama']}</td>
                      <td>{$mk['MataKuliah']}</td>
                      <td>{$mk['SKS']}</td>
                      <td>{$murid['Total SKS']}</td>
                      <td style='background-color: $color; color: black;'>{$murid['Keterangan']}</td>";
            } else {
                echo "<td></td>
                      <td></td>
                      <td>{$mk['MataKuliah']}</td>
                      <td>{$mk['SKS']}</td>
                      <td></td>
                      <td></td>";
            }
            $rowCount++;
            echo "</tr>";
        }
    }
    echo "</table>";
    ?>
</body>
</html>
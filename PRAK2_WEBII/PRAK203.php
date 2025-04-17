<?php
$hasil = "";
$satuan = [
    "Celcius" => "°C",
    "Fahrenheit" => "°F",
    "Reamur" => "°Re",
    "Kelvin" => "K"
];

function konversiSuhu($nilai, $mulai, $ke) {
    if ($mulai == $ke) return $nilai;

    switch($mulai) {
        case "Fahrenheit": $nilai = ($nilai - 32) * 5/9; break;
        case "Reamur":     $nilai = $nilai * 5/4; break;
        case "Kelvin":     $nilai = $nilai - 273.15; break;
    }

    switch($ke) {
        case "Fahrenheit": return ($nilai * 9/5) + 32;
        case "Reamur":     return $nilai * 4/5;
        case "Kelvin":     return $nilai + 273.15;
        default:           return $nilai;
    }
}

if (isset($_POST['konversi'])) {
    $nilai = floatval($_POST['nilai']);
    $mulai = $_POST['dari'];
    $ke = $_POST['ke'];
    $hasilKonversi = konversiSuhu($nilai, $mulai, $ke);
    $hasil = "Hasil Konversi: " . round($hasilKonversi, 1) . " " . $satuan[$ke];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Konversi Suhu</title>
</head>
<body>
    <h3>Output yang diinginkan:</h3>
    <form method="post">
        Nilai: <input type="text" name="nilai" value="<?= $_POST['nilai'] ?? '' ?>"><br><br>
        Dari:<br>
        <?php foreach ($satuan as $key => $symbol): ?>
            <input type="radio" name="dari" value="<?= $key ?>" <?= (($_POST['dari'] ?? 'Celcius') == $key) ? 'checked' : '' ?>> <?= $key ?><br>
        <?php endforeach; ?>
        <br>Ke:<br>
        <?php foreach ($satuan as $key => $symbol): ?>
            <input type="radio" name="ke" value="<?= $key ?>" <?= (($_POST['ke'] ?? 'Fahrenheit') == $key) ? 'checked' : '' ?>> <?= $key ?><br>
        <?php endforeach; ?>
        <br>
        <input type="submit" name="konversi" value="Konversi">
    </form>

    <?php if ($hasil): ?>
        <h3><?= $hasil ?></h3>
    <?php endif; ?>
</body>
</html>

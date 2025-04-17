<?php
$hasil = "";

if (isset($_POST['konversi'])) {
    $nilai = intval($_POST['nilai']);

    if ($nilai < 0 || $nilai >= 1000) {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    } elseif ($nilai == 0) {
        $hasil = "Nol";
    } elseif ($nilai >= 1 && $nilai <= 9) {
        $hasil = "Satuan";
    } elseif ($nilai >= 10 && $nilai <= 19) {
        $hasil = "Belasan";
    } elseif ($nilai >= 20 && $nilai <= 99) {
        $hasil = "Puluhan";
    } else {
        $hasil = "Ratusan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Konversi Bilangan</title>
</head>
<body>
    <h3>Output yang diinginkan:</h3>
    <form method="POST">
        <label>Nilai</label>
        <input type="text" name="nilai"><br>
        <input type="submit" value="Konversi" name="konversi"><br>
    </form>

    <?php if ($hasil): ?>
        <h2>Hasil: <?= strtolower($hasil) ?></h2>
    <?php endif; ?>
</body>
</html>


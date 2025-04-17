<?php
$pesanNama = "";
$pesanNim = "";
$pesanJenisKelamin = "";
$output = "";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'] ?? '';
    $nim = $_POST['nim'] ?? '';
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $valid = true;

    if ($nama == "") {
        $pesanNama = "nama tidak boleh kosong";
        $valid = false;
    }

    if ($nim == "") {
        $pesanNim = "nim tidak boleh kosong";
        $valid = false;
    }

    if ($jenis_kelamin == "") {
        $pesanJenisKelamin = "jenis kelamin tidak boleh kosong";
        $valid = false;
    }

    if ($valid) {
        $output = "<h2>Output</h2><p>$nama<br>$nim<br>$jenis_kelamin</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Input</title>
    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <form method="post">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $_POST['nama'] ?? '' ?>">
        <span class="error">* <?= $pesanNama ?></span><br><br>

        <label>NIM:</label>
        <input type="text" name="nim" value="<?= $_POST['nim'] ?? '' ?>">
        <span class="error">* <?= $pesanNim ?></span><br><br>

        <label>Jenis Kelamin:</label>
        <span class="error">* <?= $pesanJenisKelamin ?></span><br>
        <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?= (($_POST['jenis_kelamin'] ?? '') == 'Laki-Laki') ? 'checked' : '' ?>> Laki-Laki<br>
        <input type="radio" name="jenis_kelamin" value="Perempuan" <?= (($_POST['jenis_kelamin'] ?? '') == 'Perempuan') ? 'checked' : '' ?>> Perempuan<br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
    <?= $output ?>
</body>
</html>
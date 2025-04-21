<?php
$gambar = "";
$tinggi = 0;
function segitiga($nilai, $gambar) {
    $i = 1;
    while ($i <= $nilai) {
        $j = 1;
        while ($j < $i) {
            echo '<img src="'.$gambar.'" class="gambar" style="visibility: hidden">';
            $j++;
        }
        $x = $nilai;
        while ($x >= $i) {
                echo '<img src="'.$gambar.'" class="gambar">';
            $x--;
        }
        echo "<br>";
        $i++;
    }
}

if (isset($_POST['button'])) {
    $tinggi = $_POST['input_tinggi'];
    $gambar = $_POST['input_gambar'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK302</title>
    <style>
    .gambar{
      width: 20px;
      height: 20px;
    }
  </style>
</head>
<body>
    <form method="POST">
        <label>Tinggi : </label>
        <input type="text" name="input_tinggi"><br>
        <label> Alamat Gambar : </label>
        <input type="text" name="input_gambar"><br>
        <input type="submit" value="Cetak" name="button"><br></br>
        <?= segitiga($tinggi, $gambar); ?>
    </form>
</body>
</html>
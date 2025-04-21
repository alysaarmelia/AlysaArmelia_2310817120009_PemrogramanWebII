<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK303</title>
</head>
<body>
    <form action="" method="post">
        Batas Bawah : <input type="text" name="bawah"><br>
        Batas Atas : <input type="text" name="atas"><br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];
        $gambar_bintang = "star-images-9441.png";
        $i = $bawah;

        do {
            if ((($i + 7) % 5) == 0) {
                echo "<img src='$gambar_bintang' width='25' style='margin-right:5px;'>";
            } else {
                echo "$i&nbsp;";
            }
            $i++;
        } while ($i <= $atas);
    }
    ?>
</body>
</html>

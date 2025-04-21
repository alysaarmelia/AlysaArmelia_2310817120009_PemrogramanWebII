<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK301</title>
</head>
<body>
    <form action="" method="post">
        Jumlah Peserta: <input type="text" name="peserta">
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $jumlah = $_POST['peserta'];
        $i = 1;

        while ($i <= $jumlah) {
            if ($i % 2 == 0) {
                echo "<p style='color:green; font-size:20px; font-weight:bold;'>Peserta ke-$i</p>";
            } else {
                echo "<p style='color:red; font-size:20px;font-weight:bold;'>Peserta ke-$i</p>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>
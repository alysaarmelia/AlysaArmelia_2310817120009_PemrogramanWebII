<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRAK201</title>
</head>
<body>
    <form action="" method="post">
        Nama: 1 <input type="text" name="nama1"><br>
        Nama: 2 <input type="text" name="nama2"><br>
        Nama: 3 <input type="text" name="nama3"><br>
        <button type="submit" name="Urut">Urutkan</button> 
    </form>

    <?php
    if (isset($_POST['Urut'])) {
        $test = $_POST['nama1'];
        $test2 = $_POST['nama2'];
        $test3 = $_POST['nama3'];

        if ($test > $test2) {
            $temp = $test; $test = $test2; $test2 = $temp;
        }
        if ($test > $test3) {
            $temp = $test; $test = $test3; $test3 = $temp;
        }
        if ($test2 > $test3) {
            $temp = $test2; $test2 = $test3; $test3 = $temp;
        }

        echo "<br><b>Output:</b><br>";
        echo $test . "<br>" . $test2 . "<br>" . $test3;
    }
    ?>
</body>
</html>

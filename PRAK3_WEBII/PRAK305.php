<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PRAK305</title>
</head>
<body>
    <form method="post">
        <input type="text" name="teks">
        <input type="submit" value="submit">
    </form>
    <br>

    <?php
    if (isset($_POST['teks'])) {
        $teks = $_POST['teks'];
        $jumlah = strlen($teks);

        echo "<b>Input:</b><br><br> $teks <br><br>"; 
        echo "<b>Output:</b><br><br>";      

        $i = 0;
        while ($i < $jumlah) {
        $huruf = $teks[$i];
        echo strtoupper($huruf); 

        $ulang = 1;
        while ($ulang < $jumlah) {
            echo strtolower($huruf); 
            $ulang++;
            }
            $i++;
        }
    }
    ?>
</body>
</html>
<?php 
    function volume($panjang, $lebar, $tinggi){
        $volume = (1/3) * $panjang * $lebar * $tinggi;
        return $volume;
    }
    
    $panjang = 8.9;
    $lebar = 14.7;
    $tinggi = 5.4;
    
    $result = round(volume($panjang, $lebar, $tinggi), 3) . " m3";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volume Limas Persegi Panjang</title>
</head>
<body>
    <?=$result ?>
</body>
</html>
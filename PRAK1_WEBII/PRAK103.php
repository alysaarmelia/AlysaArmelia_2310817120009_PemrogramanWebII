<?php 
    function CtoF($c){
        $result = $c * 1.8 + 32;
        return $result;
    }
    function CtoR($c){
        $result = $c * 0.8;
        return $result;
    }
    function CtoK($c){
        $result = $c + 273.15;
        return $result;
    }
    $celcius = 37.841;
    $result = nl2br("Fahrenheit (F) = " . number_format(CtoF($celcius), 4, ',', '.') . "\nReamur (R) = " . number_format(CtoR($celcius), 4, ',', '.') . "\nKelvin (K) = " . number_format(CtoK($celcius), 4, ',', '.'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?=$result ?>
</body>
</html>
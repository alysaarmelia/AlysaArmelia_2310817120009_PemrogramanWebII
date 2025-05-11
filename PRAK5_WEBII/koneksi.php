<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database_name = "perpustakaan";

    $db = mysqli_connect($hostname, $username, $password, $database_name);

    if ($db->connect_error){
        echo "LU GA KONEK";
        die("ded");
    } 
?>
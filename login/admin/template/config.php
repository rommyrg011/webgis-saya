<?php 
    $domain = "localhost/webgis/login/admin/"; //link berdasarkan browser yang anda buka
    $host = "localhost";
    $user = "root"; //Database username
    $pass = ""; //Database password
    $db = "qgis"; //Database name

    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn){
        echo "Database connection error".mysqli_connect_error();
    }
?>
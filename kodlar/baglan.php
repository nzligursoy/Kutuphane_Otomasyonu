<?php
$server = "localhost";
$user = "284981";
$password = "123456789";
$database = "284981";
// Create connection
$baglanti = mysqli_connect($server, $user, $password, $database);
// Check connection
if (!$baglanti) {
    echo "Mysql sunucusu ile baglantı kurulamadı"; 
    echo  mysqli_connect_error();
    exit;
}
?>
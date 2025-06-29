<?php
// Your connection code
$host = 'localhost';
$db   = 'datablitz';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$link = mysqli_connect($host, $user, $pass, $db);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}


?>